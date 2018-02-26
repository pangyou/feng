<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 类型管理控制器
 */
class OrdersController extends CommonController{
// 定义一个类型属性,为了全局调用
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化\Common\Model(命名空间)下的控制器Type
		$this->model = new \Common\Model\Orders;
	}
	public function index(){
		// 获取订单表数据
		$data = $this->model->where("state not in('已完成')")->get();
		View::with('data',$data);
		// sp($data);die;
		// 载入订单页面
		View::make();
	}
	/**
	 * 删除
	 */
	public function del(){
		$oid = Q('get.oid');
		// sp($oid);
		// 1,删除订单表中的数据
		$this->model->where("oid={$oid}")->delete();
		// 2,删除订单列表中的数据
		$orderListModel = new \Common\Model\OrderList;
		$orderListModel->where("order_oid={$oid}")->delete();
		View::success('删除成功');
	}
	/**
	 * 编辑
	 */
	public function edit(){
		// 二,修改
		if(IS_POST){
			// sp($_POST);
			if($this->model->editData())View::success('修改成功');
			View::error($this->model->getError());
		}
		// 一,获取旧数据
		$oid = Q('get.oid');
		$data = $this->model->where("oid={$oid}")->find();
		View::with('data',$data);

		// 载入编辑页面
		View::make();
	}
	/**
	 * 显示订单状态
	 */
	public function show(){
		$orderListModel = new \Common\Model\OrderList;
		// sp($_SESSION);
		$data = $orderListModel
				->join('orders','oid','=','order_oid')
				->where("nstate not in('已完成')")
				->get();
		// sp($data);die;
		View::with('data',$data);
		// 载入订单状态页面
		View::make();
	}
	/**
	 * 显示已完成订单
	 */
	public function finish(){
		// 获取订单列表数据
		$orderListModel = new \Common\Model\OrderList;
		// sp($_SESSION);
		$data = $orderListModel
				->join('orders','oid','=','order_oid')
				->where("nstate='已完成'")
				->get();
		// sp($data);die;
		View::with('data',$data);
		// 载入页面
		View::make();
	}
	
}