<?php namespace Home\Controller;
use Think\Controller;
/**
 * 前台默认控制器
 */
class IndexController extends Controller {
	private $model;
	private $cateModel;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化商品表
		$this->model = D('Goods');
		// 实例化分类表
		$this->cateModel = D('Cate');
	}
    public function index(){
    	$cate = $this->cateModel->select();
    	$Data = new \Org\Util\Data;
    	// 调用扩展方法
    	$cate=$Data->channelLevel($cate);
    	// 分配变量到页面
    	$this->assign('cate',$cate);
		//查询商品信息
		$goods = $this->model->select();
		//分配变量到页面
		$this->assign('goods',$goods);
        // 载入模板
        $this->display();
    }
}