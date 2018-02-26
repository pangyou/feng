<?php namespace Home\Controller;
use Think\Controller;
/**
 * 内容控制器
 */
class ContentController extends Controller {
	private $model;
	private $typeModel;
	private $goodsAttrModel;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化商品表
		$this->model = D('Goods');
		//实例化属性表
		$this->typeAttrModel = D('TypeAttr');
		$this->goodsAttrModel = D('GoodsAttr');
	}
	/**
	 * 默认显示页
	 */
	public function index(){
		//一,处理商品数据*******************************
		//接收传过来的gid
		$gid = I('get.gid',0,'intval');
		//查询对应的数据
		$goodsData = $this->model
                    ->join('zol_goods_detail','goods_gid','=','gid')
                    ->where("goods_gid={$gid}")
                    ->find();
		//把图片转化为数组
		$goodsData['img'] = explode(',',$goodsData['img']);
		//分配对应的商品数据到页面
		$this->assign('goodsData',$goodsData);
		// 二,处理颜色,选择规格,购买方式等*******************
        // 1,获取类型属性表的数据
        // 查询对应的tid
        $tid = $this->model->where("gid={$gid}")->getField('type_tid');
        $typeAttrData = $this->typeAttrModel->where("class='规格' and type_tid={$tid}")->getField('taname',true);
        // 2,获取商品属性表的数据
        // 查询对应的taid
        $taids = $this->typeAttrModel->where("type_tid={$tid} and class='规格'")->getField('taid',true);
        foreach ($taids as $k => $v) {
            // 颜色数据和尺寸名字压入$k,对应的值压入$v
            $spec[] = array(
                'value'=>$this->goodsAttrModel
                        ->where("goods_gid={$gid} and type_attr_taid={$taids[$k]}")
                        ->getField('gaid,gavalue',true),
                'name'=>$typeAttrData[$k]
                );
        }
		

		
		//颜色尺寸等属性
		
		//分配变量到页面
		$this->assign('data',$spec);
		//载入页面
		$this->display();
	}
}