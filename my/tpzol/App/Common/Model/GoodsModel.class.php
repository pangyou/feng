<?php namespace Common\Model;
use Think\Model;
/**
  *  商品表模型
  */
class GoodsModel extends Model{
	// 指定模型操作的表
	protected $tableName = 'goods';
	// 自动验证
	protected $_validate = array(
		// array(字段名,验证方法,错误信息,验证条件,附加规则,验证时间)
		array('gname','require','商品名字不能为空',3,'',3)
	);
	// 自动完成
	protected $_auto = array(
		// 1是插入时验证
		array('uptime','time',1,'function'),
		// 自动完成uid的添加
		array('admin_uid','uid',3,'callback'),
		// 自动完成多图上传
		array('pic_list','picList',3,'callback'),
		// 自动完成type_tid的添加
		array('type_tid','typeTid',3,'callback'),
	);
	// 自动添加pic_list
	public function picList(){
		if(I('post.pic_list')){
			// 列表图的数据转化为字符串
			$picList =implode(',',I('post.pic_list'));
			return $picList;
		}
		// 防止报错,返回空字符串
		return '';
	}
	//自动添加type_tid
	public function typeTid(){
		if(I('post.category_cid')){
			$cid = I('post.category_cid');
			// 实例化分类表模型
			$cateModel = D('Cate');
			// 获取分类表数据中的tid
			$tid = $cateModel->where("cid={$cid}")->field('type_tid')->find();
			return $tid['type_tid'];
		}
		// 防止报错,返回0
		return 0;
	}
	// 自动添加uid
	public function uid(){
		// 返回session中的aid
		return $_SESSION['uid'];
	}
	/**
	  *  自定义添加方法
	  */
	public function addData(){
		// 1,调用add方法之前,必须经过create,否则无法添加
		// 2,只有经过create 才会触发自动验证
		if(!$this->create()) {
			return false;
		}
		// 实例化商品详细表
		$gModel = D('GoodsDetail');
		if(!$gModel->create()){
			// 把错误压入
			$this->error=$gModel->getError();
			return false;
		} 
		// 实例化商品属性表==========================
		$GoodsAttrModel = D('GoodsAttr');
		if(!$GoodsAttrModel->create()){
			// 把错误压入
			$this->error = $GoodsAttrModel->getError();
			return false;
		} 
		// 调用框架添加方法
		// 一===========添加商品表(添加的同时会返回一个$gid)
		$gid = $this->add();
		// 二=================添加商品属性表
		// 1获取商品属性所有数据,如果没有数据默认给一个空数组,防止报错
		$arr = I('post.attr') ? I('post.attr') : array();
		// 遍历添加商品属性
		foreach ($arr as $k => $v) {
			// 组合数据
			$data = array(
				//字段名 =>值
				'gavalue'=>$v,
				'added'=>0,
				'goods_gid'=>$gid,
				'type_attr_taid'=>$k
			);
			// 遍历添加
			$GoodsAttrModel->add($data);
		}
		// 删除没有选择属性的对应数据
		$GoodsAttrModel->where("goods_gid ={$gid} and gavalue='0'")->delete();
		// 2获取商品规格所有数据,如果没有数据默认给一个空数组,防止报错
		$arr2 = I('post.spec') ? I('post.spec') : array();
		// 遍历添加商品规格(因为页面重组的name是一个三维数组,所以为了获得数据需要遍历两次)
		foreach ($arr2 as $k => $v) {
			foreach ($v['gavalue'] as $key=>$value) {
				// 组合数据
				$data2 = array(
					//字段名 => 值
					'gavalue'=>$value,
					'added'=>$v['added'][$key],
					// 类型属性id
					'type_attr_taid'=>$k,
					'goods_gid'=>$gid,
				);
				// 遍历添加
				$GoodsAttrModel->add($data2);
			}	
		}
		// 三====================添加文章详细表
		// 获取商品图册数据===========是用自动完成???
		$img = implode(',',I('post.img',array()));	
		// 把gid压入文章详细表
		$data = array(
			//给默认值 '',防止报错
			'detail'=>I('post.detail',''),
			'service'=>I('post.service',''),
			'goods_gid'=>$gid,
			//尝试用自动添加方法,发现不行.改用组合添加(自动添加可以在修改的时候用)
			'img'=>$img
		);
		// 添加数据进文章详细表
		$g = $gModel->add($data);
		// 添加成功,返回true让外面TypeController里面的add等方法接收是否验证通过的结果
		return true;
	}
	/**
	 * 修改
	 */
	public function editData(){
		// 一,验证不通过
		// 如果不加where条件,记得在页面加主键的隐藏域
		// 1,调用add方法之前,必须经过create,否则无法添加
		// 2,只有经过create 才会触发自动验证
		if(!$this->create()) return false;
		// 实例化商品详细表
		$gModel = D('GoodsDetail');
		if(!$gModel->create()){
			// 把错误压入
			$this->error=$gModel->getError();
			return false;
		} 
		// 实例化商品属性表
		$GoodsAttrModel = D('GoodsAttr');
		if(!$GoodsAttrModel->create()){
			// 把错误压入
			$this->error = $GoodsAttrModel->getError();
			return false;
		}
		//验证通过
		// 二,修改=====================调用框架修改方法
		//1,有隐藏域在页面,不写where条件========可以修改
		$this->save();
		// 2,修改商品纤细表数据=========可以修改 在页面有隐藏域
		$gModel->save();
		// 3,获得商品属性表gaid
		// 删除属性表数据,同时删除货品列表,防止报错.(因为是再重新输入属性数据,所有属性表的gaid改变了,货品列表的gaid没变所以对应不上)
		// 获得商品表gid
		$gid = I('get.gid');
		$GoodsAttrModel->where("goods_gid={$gid}")->delete();
		// 删除货品列表对应的数据
		D('GoodsList')->where("goods_gid={$gid}")->delete();
		// 再重新输入属性表数据========可以修改
		$this->addAttr($gid);
		//修改成功, 验证通过,返回真
		return true;
	}
	/**
	 * 添加商品属性表(自定义方法)
	 */
	public function addAttr($gid){
		// 实例化商品属性表
		$GoodsAttrModel = D('GoodsAttr');
		// 二=================添加商品属性表
		// 1获取商品属性所有数据,如果没有数据默认给一个空数组,防止报错
		$arr = I('post.attr') ? I('post.attr') : array();
		// 遍历添加商品属性
		foreach ($arr as $k => $v) {
			// 组合数据
			$data = array(
				//字段名 =>值
				'gavalue'=>$v,
				// 'added'=>'0',可以不写,因为商品表该字段有默认值0
				'goods_gid'=>$gid,
				'type_attr_taid'=>$k
			);
			// 遍历添加
			$GoodsAttrModel->add($data);
		}
		// 删除没有选择属性的对应数据
		$GoodsAttrModel->where("goods_gid ={$gid} and gavalue='0'")->delete();
		// 2获取商品规格所有数据,如果没有数据默认给一个空数组,防止报错
		$arr2 = I('post.spec') ? I('post.spec') : array();
		// 遍历添加商品规格(因为页面重组的name是一个三维数组,所以为了获得数据需要遍历两次)
		foreach ($arr2 as $k => $v) {
			foreach ($v['gavalue'] as $key=>$value) {
				// 组合数据
				$data2 = array(
					//字段名 => 值
					'gavalue'=>$value,
					'added'=>$v['added'][$key],
					// 类型属性id
					'type_attr_taid'=>$k,
					'goods_gid'=>$gid,
				);
				// 遍历添加
				$GoodsAttrModel->add($data2);
			}	
		}

	}
}