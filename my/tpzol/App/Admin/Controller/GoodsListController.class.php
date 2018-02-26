<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 货品列表控制器
 */
class GoodsListController extends CommonController{
	// 定义一个商品属性,为了全局调用
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化\Common\Model(命名空间)下的模型Goods
		$this->model = D('GoodsList');
	}
	/**
	 * 显示货品
	 */
	public function index(){
		// 点击保存添加
		if(IS_POST){
			// 如果没有选择颜色和尺寸
			if($_POST['gavalue'][0]==0)$this->error('颜色必须选择!');
			if($_POST['gavalue'][1]==0)$this->error('尺寸必须选择!');
			// 调用模型的添加方法
			if($this->model->addData()){
				$this->success('添加成功',U('index',array('gid'=>$_GET['gid'])));
			}
			$this->error($this->model->getError());
		}
		// 三,处理显示数据
		// 获取get传过来的gid
		$gid = I('get.gid',0,'intval');
		// 1,获取货品表里面的数据goods_list
		$data = $this->model
					->where("goods_gid={$gid}")
					->select();
		// 处理数据
		foreach ($data as $k => $v) {
			$data[$k]['combine'] = explode(',', $v['combine']);
		}
		// 实例化商品属性表
		$goodsAttrModel = D('GoodsAttr');
		// 处理显示数据
		foreach ($data as $k => $v) {
			foreach ($v['combine'] as $key => $value) {
				// 通过组合数据,获得对应的颜色和尺寸的gaid
				$gaid = $v['combine'][$key];
				$colorSize = $goodsAttrModel->where("gaid={$gaid}")->field("gavalue")->find();
				// 把对应颜色和尺寸压入原数据
				$data[$k]['combine'][$key] = implode(',', $colorSize);
			}
		}
		// ***************************下面已解决
		// 分配变量到页面
		$this->assign('data',$data);
		// 一,获取类型属性表的数据
		// 实例化类型属性表
		$typeAttrModel =D('TypeAttr');
		// 实例化商品表
		$goodsModel = D('Goods');
		// 查询对应的tid
		$tid = $goodsModel->where("gid={$gid}")->getField('type_tid');
		// 查询对应的类型属性的名字--- 颜色,尺寸
		$typeAttrData = $typeAttrModel->where("class='规格' and type_tid={$tid}")->getField('taname',true);
		// 二,获取商品属性表的数据
		// 查询对应的taid
		$taids = $typeAttrModel->where("type_tid={$tid} and class='规格'")->field('taid')->select();
		foreach ($taids as  $v) {
			$spec[]['gaid'] = $goodsAttrModel
					->where("goods_gid={$gid} and type_attr_taid={$v['taid']}")
					->getField('gaid,gavalue',true);
		}
		// 颜色数据和尺寸数据
		foreach ($spec as $k => $v) {
			$spec[$k]['taname'] = $typeAttrData[$k];
		}
		$this->assign('spec',$spec);
		// 载入模板
		$this->display();
	}
	/**
	 * 编辑
	 */
	public function edit(){
		// 四,修改
		if(IS_POST){
			// 获取编辑的glid
			if($this->model->editData())$this->success('修改成功',U('index',array('gid'=>$_GET['gid'])));
			$this->error($this->model->getError());
		}
		// 一,获取旧数据
		// 获取get传过来的glid
		$glid = I('get.glid',0,'intval');
		// 1,获取货品表里面的数据goods_list
		$data = $this->model
					->where("glid={$glid}")
					->find();
		// 处理数据
		$data['combine'] = explode(',', $data['combine']);
		// 分配原始数据到页面
		$this->assign('data',$data);
		// 二获取类型属性表的数据
		$gid = I('get.gid',0,'intval');
		// 实例化类型属性表
		$typeModel = D('TypeAttr');
		// 实例化商品表
		$goodsModel = D('Goods');
		// 查询对应的tid
		$tid = $goodsModel->where("gid={$gid}")->getField('type_tid');
		// 查询对应的数据
		$typeData = $typeModel->where("class='规格' and type_tid={$tid}")->select();
		// 处理数据,改变为数组字符串压入
		foreach ($typeData as $k => $v) {
			$typeData[$k]['tavalue'] = explode(',', $v['tavalue']);
		}
		// 分配变量到页面
		$this->assign('typeData',$typeData);
		// 三,获取商品属性表的数据
		// 查询对应的taid
		$taids = $typeModel->where("type_tid={$tid} and class='规格'")->getField('taid',true);
		// 实例化商品属性表
		$goodsAttrModel = D('GoodsAttr');
		// 获得对应的 属性id和值
		foreach ($taids as $k => $v) {
			$spec[] = $goodsAttrModel
					->where("goods_gid={$gid} and type_attr_taid={$taids[$k]}")
					->getField('gaid,gavalue',true);
		}
		// 颜色数据和尺寸数据
		$this->assign('spec',$spec);
		// 载入编辑页面
		$this->display();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 接收要删除的glid
		$glid = I('get.glid');
		// 删除数据
		$this->model->where("glid={$glid}")->delete();
		// 修改商品表的总数
		$this->model->editTotal();
		// 提示删除成功
		$this->success('删除成功');
	}
	/**
	 * 异步检测货品是否已存在
	 */
	public function check(){
		$gid = I('get.gid');
		// 实例化商品详细表
		$gModel = D('GoodsList');
		$combine = implode(',', I('get.gavalue'));
		$gData = $gModel->where("goods_gid={$gid} and combine='$combine'")->select();
		$gData = $gData ? 0 : 1;
		echo json_encode($gData);die;
	}
}