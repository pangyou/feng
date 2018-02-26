<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 商品控制器
 */
class GoodsController extends CommonController{
// 定义一个商品属性,为了全局调用
	private $model;
	private $cateModel;
	private $brandModel;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化\Common\Model(命名空间)下的模型Goods
		$this->model = D('Goods');
		// 实例化分类表模型
		$this->cateModel = D('Cate');
		// 实例化品牌表
		$this->brandModel = D('Brand');
	}
	/**
	 * 显示品牌
	 */
	public function index(){
		// 获得所有的商品数据
		$data = $this->model
				->group('gid','DESC')
				->select();
		// 分配变量到页面并且载入模板
		$this->assign('data',$data)->display();
	}
	/**
	 * 添加
	 */
	public function add(){
		// 点击提交
		if(IS_POST){
			// 调用模型的添加方法
			if($this->model->addData())$this->success('添加成功');
			// 验证不通过,添加失败,返回错误
			$this->error($this->model->getError());
		}
		// 1,获取分类表的数据
		$cate = $this->cateModel->select();
		 // 让数据呈现树状形式---扩展的方法
        $Data = new \Org\Util\Data;
        $cate = $Data->tree($cate,'cname');
		// 分配变量到页面
		$this->assign('cate',$cate);
		// 2,获取品牌表的数据
		$brand = $this->brandModel->select();
		// 分配变量到页面
		$this->assign('brand',$brand);
		// 载入添加页面
		$this->display();
	}
	/**
	 * 修改
	 */
	public function edit(){
		// 二,修改
		// 点击提交
		if(IS_POST){
			// 调用模型的修改方法
			if($this->model->editData())$this->success('修改成功',U('index'));
			$this->error($this->model->getError());
		}
		// 一,获得旧数据
		//a, 获取要修改的gid
		$gid = I('get.gid',0,'intval');
		// 获取商品表旧数据
		$oldData = $this->model->where("gid={$gid}")->find();
		// 分配变量到页面
		$this->assign('oldData',$oldData);
		// 2,获取品牌表的数据
		// 获取品牌表的数据
		$brand = $this->brandModel->select();
		// 分配变量到页面
		$this->assign('brand',$brand);
		// 3,获取分类表数据
		$cate = $this->cateModel->select();
		// 让数据呈现树状形式---扩展的方法
        $Data = new \Org\Util\Data;
        $cate = $Data->tree($cate,'cname');
		// 分配变量到页面
		$this->assign('cate',$cate);
		// b,获取商品详细表数据
		$oldGoodsDetail = D('GoodsDetail')->where("goods_gid={$gid}")->find();
		// 分配变量到页面
		$this->assign('oldGoodsDetail',$oldGoodsDetail);
		// 4,获取商品属性表数据   属性数据
		$AttrData = M('type')
					->join('zol_type_attr on tid = type_tid')
					->join('zol_goods_attr on taid=type_attr_taid')
					->where("goods_gid={$gid} and class='属性'")
					->select();
		// 处理类型属性表的数据
		foreach ($AttrData as $k => $v) {
			// 组合新数组
			// $temp[$v['taname']] =explode(',', $v['tavalue']);
			$AttrData[$k]['tavalue'] = explode(',', $v['tavalue']);
		}
		// 分配变量到页面
		$this->assign('AttrData',$AttrData);
		// 获取商品属性表数据 规格数据
		$AttrData2 = M('type')
					->join('zol_type_attr on tid = type_tid')
					->join('zol_goods_attr on taid=type_attr_taid')
					->where("goods_gid={$gid} and class='规格'")
					->select();
		foreach ($AttrData2 as $k => $v) {
			// 组合新数组
			// $temp[$v['taname']] =explode(',', $v['tavalue']);
			$AttrData2[$k]['tavalue'] = explode(',', $v['tavalue']);
		}	
		// 分配变量到页面	
		$this->assign('AttrData2',$AttrData2);
		// 载入模板
		$this->display();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 接收get里面的gid
		$gid = I('get.gid',0,'intval');
		// 删除
		$this->model->where("gid={$gid}")->delete();
		// 删除商品详细表
		D('GoodsDetail')->where("goods_gid={$gid}")->delete();
		// 删除属性表数据
		D('GoodsAttr')->where("goods_gid={$gid}")->delete();
		// 删除货品列表
		D('GoodsList')->where("goods_gid={$gid}")->delete();
		// 删除成功
		$this->success('删除成功');
	}
	/**
	  * 异步响应所属分类(属性和类型)
	  */ 
	public function check(){
		//接收到通过js异步发送过来的cid
		$tid = I('post.t',0,'intval');
		// 获取类型属性表的数据
		$TypeAttr = D('TypeAttr')->where("type_tid={$tid}")->select();
		// 处理类型属性表的数据
		foreach ($TypeAttr as $k => $v) {
			// 组合新数组
			$TypeAttr[$k]['tavalue'] = explode(',', $v['tavalue']);
		}
		// 判断数据是否存在,不存在返回空数组
		$TypeAttr = $TypeAttr ? $TypeAttr : array();
		// 返回json给异步
		$this->ajaxReturn($TypeAttr);
	}	
	 /**
	  * uploadify异步上传
	  */
	public function uploads(){
		// 实例化上传类-----------用谷歌打开才能调错*********************
        $upload = new \Think\Upload();
	    $upload->maxSize = 2000000;//最大上传大小
        $upload->exts = array('jpg','png','gif');//设置上传类型
        $upload->rootPath = "Upload/images/";//设置上传目录
	    // 调用框架上传方法
        $info = $upload->upload();
	    if (!$info) {
	        // 相当于：echo json_encode($upload->getError());exit;
	        $this->ajaxReturn($upload->getError());       
	    } else {
	        // 重组 path地址
	        $temp = array();
	    	$temp['Filedata']['path'] = '/tpzol/' . $upload->rootPath . $info['Filedata']['savepath'].$info['Filedata']['savename'];
				//			url地址
			$temp['Filedata']['url'] = $_SERVER['HTTP_ORIGIN'].'/tpzol/'. $upload->rootPath .$info['Filedata']['savepath'].$info['Filedata']['savename'];
			$data=$temp['Filedata']; 
			// 相当于：echo json_encode($data);exit;
	        //上传成功，把上传好的信息返给js 也就是uploadify
	        $this->ajaxReturn($data);
	       
	       
	    }
	}	
}