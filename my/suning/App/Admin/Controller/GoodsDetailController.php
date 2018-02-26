<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 商品详细管理控制器
 */
class GoodsDetailController extends CommonController{
// 定义一个商品属性,为了全局调用
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化\Common\Model(命名空间)下的控制器Goods
		$this->model = new \Common\Model\Goods;
	}
}