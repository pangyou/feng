<?php namespace Home\Controller;
use Think\Controller;
/**
 * 购物车控制器
 */
class CartController extends Controller {
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化商品表
		$this->model = D('Goods');
	}
	/**
	 * 默认显示页
	 */
	public function index(){
		//载入模板
		$this->display();
	}
}