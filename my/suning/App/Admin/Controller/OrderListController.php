<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 类型管理控制器
 */
class OrderListController extends CommonController{
// 定义一个类型属性,为了全局调用
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化\Common\Model(命名空间)下的控制器Type
		$this->model = new \Common\Model\OrderList;
	}
	public function index(){
		$oid = Q('get.oid',0,'intval');
		// 获得所有的订单数据
		$data = $this->model
		->join('goods','gid','=','goods_gid')
		->orderBy('olid','DESC')
		->where("order_oid={$oid}")
		->get();
		// 分配变量到页面
		// sp($data);die;
		View::with('data',$data);
		// 载入订单列表显示页面
		View::make();
	}
	/**
	 * 编辑
	 */
	public function edit(){
		$olid = Q('get.olid',0,'intval');
		$oid = Q('get.oid',0,'intval');
		// 二,修改
		if(IS_POST){
			if($this->model->editData())View::success('修改成功',U('index',array('olid'=>$olid)));
			View::error('修改失败',U('edit',array('olid'=>$olid)));
		}
		// 一,获取旧数据
		$data = $this->model
		->join('goods','gid','=','goods_gid')
		->orderBy('olid','DESC')
		->where("order_oid={$oid} and olid={$olid}")
		->get();
		// 分配变量到页面
		View::with('data',$data[0]);
		// 载入模板
		View::make();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 接收要删除的olid
		$olid = Q('get.olid',0,'intval');
		// 删除订单列表中的数据
		$this->model->where("olid={$olid}")->delete();
		View::success('删除成功');
	}
	/**
	 * 发货
	 */
	public function send(){
		// 发货成功
		if($this->model->change())View::success('发货成功');
		// 发货失败
		View::error($this->model->getError());
	}
}