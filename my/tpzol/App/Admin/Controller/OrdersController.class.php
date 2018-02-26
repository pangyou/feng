<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 订单控制器
 */
class OrdersController extends CommonController {
    private $model;
    public function __construct(){
        // 防止父级构造方法被覆盖
        parent::__construct();
        // 实例化类型模型
        $this->model = D('Orders');
    }
    /**
     * 显示订单表数据
     */
    public function index(){
		// 获取订单表数据
		$data = $this->model->where("state not in('已完成')")->select();
		$this->assign('data',$data);
		// 载入订单页面
		$this->display();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 接收get传过来的oid
		$oid = I('get.oid');
		// 删除订单表中的数据
		$this->model->where("oid={$oid}")->delete();
		// 成功提示
		$this->success('删除成功');
	}
	/**
	 * 编辑
	 */
	public function edit(){
		// 二,修改
		if(IS_POST){
			// 验证通过,修改成功提示
			if($this->model->editData())$this->success('修改成功');
			// 修改失败提示
			$this->error($this->model->getError());
		}
		// 一,获取旧数据
		$oid = I('get.oid');
		// 查询对应数据
		$data = $this->model->where("oid={$oid}")->find();
		// 分配变量到页面
		$this->assign('data',$data);
		// 载入编辑页面
		$this->display();
	}
	/**
	 * 显示订单状态
	 */
	public function show(){
		$data = $this->model
				->where("state not in('已完成')")
				->select();
		// 分配变量到页面
		$this->assign('data',$data);
		// 载入订单状态页面
		$this->display();
	}
	/**
	 * 显示已完成订单
	 */
	public function finish(){
		$data = $this->model
				->where("state='已完成'")
				->select();
		// 分配变量到页面
		$this->assign('data',$data);
		// 载入页面
		$this->display();
	}
	/**
	 * 发货
	 */
	public function send(){
		$oid = Q('get.oid');
        // 2,修改订单状态
        $data = array('state'=>'已发货');
        // 修改
        $this->where("oid={$oid}")->save($data);
		// 发货成功提示
		$this->success('发货成功');
	}
}