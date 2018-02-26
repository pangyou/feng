<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//订单控制器
class OrdersController extends CommonController{
    private $model;
    // 构造方法
    public function __construct(){
        // 防止父级构造方法被覆盖
        parent::__construct();
        // 实例化订单表
        $this->model = new \Common\Model\Orders;
    }
    /**
     * 显示订单页
     */
    public function index(){
        // 载入页面
        View::make();
    }
    /**
     * 提交订单
     */
    public function add(){
        if(IS_POST){
            if($this->model->addData())go(U('add'));
            View::error('添加失败');
        }
        // 载入页面
        View::make();
    }
}