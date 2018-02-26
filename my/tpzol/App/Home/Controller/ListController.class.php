<?php namespace Home\Controller;
use Think\Controller;
/**
 * 前台默认控制器
 */
class ListController extends Controller {
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
		// 一,============处理数据======================
        // 1,获取列表图数据(商品数据)
        $cid = 	I('get.cid',0,'intval');
        // 获取分类的名字
        $name = $this->cateModel->where("cid={$cid}")->getField('cname');
        $this->assign('name',$name);
        // 为了获得该分类及该分类的子集的数据
        $listImg = $this->cateModel->select();
        // 获得所有子集cid
        $cids = $this->cateModel->getSon($listImg,$cid);
        // 把自己压入
        $cids[] = $cid;
        // 转化为字符串
        $cids = implode(',', $cids);
        // 查询对应的所有的商品数据(cid为自己和自己的所有子集的商品)
        $goods = $this->model->where("category_cid in({$cids})")->select();
        // 分配变量到页面
		$this->assign('goods',$goods);

		//载入列表页
		$this->display();
	}
}