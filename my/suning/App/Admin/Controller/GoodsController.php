<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 商品管理控制器
 */
class GoodsController extends CommonController{
// 定义一个商品属性,为了全局调用
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化\Common\Model(命名空间)下的控制器Goods
		$this->model = new \Common\Model\Goods;
	}
	/**
	 * 显示商品
	 */
	public function index(){
		// 获得所有的商品数据
		$data = $this->model
				->groupBy('gid','DESC')
				->get();
		// 分配变量到页面并且载入模板
		View::with('data',$data)->make();
	}
	/**
	 * 添加
	 */
	public function add(){
		// 点击提交
		if(IS_POST){
			//sp($_POST);die;
			// 调用模型的添加方法
			if($this->model->addData())View::success('添加成功',U('index'));
			// 验证不通过,添加失败,返回错误
			View::error($this->model->getError());
		}
		// 1,获取分类表的数据
		// 实例化分类表模型
		$cateModel = new \Common\Model\Cate;
		// 获取分类表数据
		$cate = $cateModel->get();
		// 让数据呈现为树状形式
		$cate = Data::tree($cate,'cname');
		// 分配变量到页面
		View::with('cate',$cate);
		// 2,获取品牌表的数据
		// 实例化品牌表
		$brandModel = new \Common\Model\Brand;
		// 获取品牌表的数据
		$brand = $brandModel->get();
		// 分配变量到页面
		View::with('brand',$brand);
		// 载入添加页面
		View::make();
	}
	/**
	 * 修改
	 */
	public function edit(){
		// 二,修改
		// 点击提交
		if(IS_POST){
			// sp($_POST);die;
			// 调用模型的修改方法
			if($this->model->editData())View::success('修改成功',U('index'));
			View::error($this->model->getError());
		}


		// 一,获得旧数据
		//a, 获取要修改的gid
		$gid = Q('get.gid',0,'intval');
		// 获取商品表旧数据
		$oldData = $this->model->where("gid={$gid}")->find();
		// sp($oldData);die;
		// 2,获取品牌表的数据
		// 实例化品牌表
		$brandModel = new \Common\Model\Brand;
		// 获取品牌表的数据
		$brand = $brandModel->get();
		// 分配变量到页面
		View::with('brand',$brand);
		// 3,获取分类表数据
		$cateModel = new \Common\Model\Cate;
		// 获取分类表数据
		$cate = $cateModel->get();
		// 让数据呈现为树状形式
		$cate = Data::tree($cate,'cname');
		// 分配变量到页面
		View::with('cate',$cate);
		// b,获取详细表数据
		$oldGoodsDetailModel = new \Common\Model\GoodsDetail;
		// 获得商品详细表所有数据
		$oldGoodsDetail = $oldGoodsDetailModel->where("goods_gid={$gid}")->find();
		// 分配变量到页面
		View::with('oldGoodsDetail',$oldGoodsDetail);
		// 4,获取商品属性表数据   属性数据
		$AttrData = Db::table('type')
					->join('type_attr','tid','=','type_tid')
					->join('goods_attr','taid','=','type_attr_taid')
					->where("goods_gid={$gid} and class='属性'")
					->get();
		// 处理类型属性表的数据
		foreach ($AttrData as $k => $v) {
			// 组合新数组
			// $temp[$v['taname']] =explode(',', $v['tavalue']);
			$AttrData[$k]['tavalue'] = explode(',', $v['tavalue']);
		}
		// 分配变量到页面
		View::with('AttrData',$AttrData);
		// 获取商品属性表数据 规格数据
		$AttrData2 = Db::table('type')
					->join('type_attr','tid','=','type_tid')
					->join('goods_attr','taid','=','type_attr_taid')
					->where("goods_gid={$gid} and class='规格'")
					->get();
		foreach ($AttrData2 as $k => $v) {
			// 组合新数组
			// $temp[$v['taname']] =explode(',', $v['tavalue']);
			$AttrData2[$k]['tavalue'] = explode(',', $v['tavalue']);
		}	
		// 分配变量到页面	
		View::with('AttrData2',$AttrData2);
		// 分配变量到页面并且载入模板
		View::with('oldData',$oldData)->make();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 清楚缓存
		$this->model->updateCache();
		// 接收get里面的gid
		$gid = Q('get.gid',0,'intval');
		// 删除
		$this->model->where("gid={$gid}")->delete();
		// 实例化商品详细表
		$gModel = new \Common\Model\GoodsDetail;
		// 删除详细表数据
		$gModel->where("goods_gid={$gid}")->delete();
		// 实例化商品属性表==========================
		$GoodsAttrModel = new \Common\Model\GoodsAttr;
		// 删除属性表数据
		$GoodsAttrModel->where("goods_gid={$gid}")->delete();
		// 删除成功
		View::success('删除成功');
	}
	/**
	  * 异步响应所属分类(属性)
	  */ 
	public function check(){
		//接收到通过js异步发送过来的cid
		$tid = Q('post.t',0,'intval');
		// 实例化类型属性表
		$TypeAttrModel = new \Common\Model\TypeAttr;
		// 获取类型属性表的数据
		$TypeAttr = $TypeAttrModel->where("type_tid={$tid}")->get();
		// 处理类型属性表的数据
		foreach ($TypeAttr as $k => $v) {
			// 组合新数组
			// $temp[$v['taname']] =explode(',', $v['tavalue']);
			$TypeAttr[$k]['tavalue'] = explode(',', $v['tavalue']);
		}
		// 判断数据是否存在,不存在返回空数组
		$TypeAttr = $TypeAttr ? $TypeAttr : array();
		// 返回json给异步
		$this->ajax($TypeAttr);
	}		
}