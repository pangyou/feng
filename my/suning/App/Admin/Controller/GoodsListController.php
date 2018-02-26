<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 货品管理控制器
 */
class GoodsListController extends CommonController{
	// 定义一个商品属性,为了全局调用
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化\Common\Model(命名空间)下的控制器GoodsList
		$this->model = new \Common\Model\GoodsList;
	}
	/**
	 * 显示货品
	 */
	public function index(){
		// 点击保存添加
		if(IS_POST){
			// 如果没有选择颜色和尺寸
			if($_POST['gavalue'][0]==0)View::error('颜色必须选择!');
			if($_POST['gavalue'][1]==0)View::error('尺寸必须选择!');
			// 调用模型的添加方法
			if($this->model->addData()){
				View::success('添加成功',U('index',array('gid'=>$_GET['gid'])));
			}
			View::error($this->model->getError());
		}
		// 三,处理显示数据
		// 获取get传过来的gid
		$gid = Q('get.gid',0,'intval');
		// 实例化商品属性表
		$goodsAttrModel = new \Common\Model\GoodsAttr;
		// 1,获取货品表里面的数据goods_list
		$data = $this->model
					->where("goods_gid={$gid}")
					->get();
		// 处理数据
		foreach ($data as $k => $v) {
			$data[$k]['combine'] = explode(',', $v['combine']);
		}
		// sp($data);die;
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
		// 分配变量到页面
		View::with('data',$data);
		// 一,获取类型属性表的数据
		// 实例化类型属性表
		$typeModel = new \Common\Model\TypeAttr;
		// 实例化商品表
		$goodsModel = new \Common\Model\Goods;
		// 查询对应的tid
		$tid = $goodsModel->where("gid={$gid}")->pluck('type_tid');
		// sp($tid);
		$typeData = $typeModel->where("class='规格' and type_tid={$tid}")->lists('taname');
		// 二,获取商品属性表的数据
		// 查询对应的taid
		$taids = $typeModel->where("type_tid={$tid} and class='规格'")->lists('taid');
		foreach ($taids as $k => $v) {
			$spec[] = $goodsAttrModel
					->where("goods_gid={$gid} and type_attr_taid={$taids[$k]}")
					->lists('gaid,gavalue');
		}
		// 颜色数据和尺寸数据
		foreach ($spec as $k => $v) {
			$spec[$k]['taname'] = $typeData[$k];
		}
		View::with('spec',$spec);
		// 载入模板
		View::make();
	}
	/**
	 * 编辑
	 */
	public function edit(){
		// 四,修改
		if(IS_POST){
			// 获取编辑的glid
			if($this->model->editData())View::success('修改成功',U('index',array('gid'=>$_GET['gid'])));
			View::error($this->model->getError());
		}
		// 一,获取旧数据
		// 获取get传过来的glid
		$glid = Q('get.glid',0,'intval');
		// 实例化商品属性表
		$goodsAttrModel = new \Common\Model\GoodsAttr;
		// 1,获取货品表里面的数据goods_list
		$data = $this->model
					->where("glid={$glid}")
					->find();
		// 处理数据
		$data['combine'] = explode(',', $data['combine']);
		// 分配原始数据到页面
		View::with('data',$data);
		// 二获取类型属性表的数据
		$gid = Q('get.gid',0,'intval');
		// 实例化类型属性表
		$typeModel = new \Common\Model\TypeAttr;
		// 实例化商品表
		$goodsModel = new \Common\Model\Goods;
		// 查询对应的tid
		$tid = $goodsModel->where("gid={$gid}")->pluck('type_tid');
		// 查询对应的数据
		$typeData = $typeModel->where("class='规格' and type_tid={$tid}")->get();
		// 处理数据,改变为数组字符串压入
		foreach ($typeData as $k => $v) {
			$typeData[$k]['tavalue'] = explode(',', $v['tavalue']);
		}
		// 分配变量到页面
		View::with('typeData',$typeData);
		// 三,获取商品属性表的数据
		// 查询对应的taid
		$taids = $typeModel->where("type_tid={$tid} and class='规格'")->lists('taid');
		// 获得对应的 属性id和值
		foreach ($taids as $k => $v) {
			$spec[] = $goodsAttrModel
					->where("goods_gid={$gid} and type_attr_taid={$taids[$k]}")
					->lists('gaid,gavalue');
		}
		// 颜色数据和尺寸数据
		View::with('spec',$spec);
		// 载入编辑页面
		View::make();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 接收要删除的glid
		$glid = Q('get.glid');
		// 删除数据
		$this->model->where("glid={$glid}")->delete();
		// 修改商品表的总数
		$this->model->editTotal();
		// 提示删除成功
		View::success('删除成功');
	}
	/**
	 * 异步检测货品是否已存在
	 */
	public function check(){
		$gid = Q('get.gid');
		// 实例化商品详细表
		$gModel = new \Common\Model\GoodsList;
		$combine = implode(',', Q('get.gavalue'));
		$gData = $gModel->where("goods_gid={$gid} and combine='$combine'")->get();
		$gData = $gData ? 0 : 1;
		$this->ajax($gData);
	}
}