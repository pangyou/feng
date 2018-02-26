<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 类型操作模型
  */
class Goods extends Model{
	// 指定模型操作的表
	protected $table = 'goods';
	// 自动验证
	protected $validate = array(
		// array(字段名,验证方法,错误信息,验证条件,验证时间)
		array('gname','required','商品名字不能为空',3,3)
	);
	// 自动完成
	protected $auto = array(
		array('uptime','time','function',3,1),
		// 最后一个1是插入时验证
		array('admin_uid','uid','method',3,1),
		// 自动完成多图上传
		array('pic_list','picList','method',3,3),
		// 自动完成type_tid的添加
		array('type_tid','typeTid','method',3,3),
	);

	// 自动添加pic_list
	public function picList(){
		if(Q('post.pic_list')){
			// 列表图的数据转化为字符串
			$picList =implode(',',Q('post.pic_list'));
			return $picList;
		}
		// 防止报错,返回空字符串
		return '';
	}
	//自动添加type_tid
	public function typeTid(){
		if(Q('post.category_cid')){
			$cid = Q('post.category_cid');
			// 实例化分类表模型
			$cateModel = new \Common\Model\Cate;
			// 获取分类表数据中的tid
			$tid = $cateModel->where("cid={$cid}")->field('type_tid')->find();
			return $tid['type_tid'];
		}
		// 防止报错,返回0
		return 0;
	}
	// 自动添加aid
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
		$gModel = new \Common\Model\GoodsDetail;
		if(!$gModel->create()){
			// 把错误压入
			$this->error=$gModel->getError();
			return false;
		} 
		// 实例化商品属性表==========================
		$GoodsAttrModel = new \Common\Model\GoodsAttr;
		if(!$GoodsAttrModel->create()){
			// 把错误压入
			$this->error = $GoodsAttrModel->getError();
			return false;
		} 
		// 更新缓存
		$this->updateCache();
		// 调用框架添加方法
		// 一===========添加商品表(添加的同时会返回一个$gid)
		$gid = $this->add();
		// 二=================添加商品属性表
		// 1获取商品属性所有数据,如果没有数据默认给一个空数组,防止报错
		$arr = Q('post.attr') ? Q('post.attr') : array();
		// 遍历添加商品属性
		foreach ($arr as $k => $v) {
			// 组合数据
			$data = array(
				//字段名 =>值
				'gavalue'=>$v,
				'added'=>0,//可以不写,因为商品表该字段有默认值0
				'goods_gid'=>$gid,
				'type_attr_taid'=>$k
			);
			// 遍历添加
			$GoodsAttrModel->add($data);
		}
		// 删除没有选择属性的对应数据
		$GoodsAttrModel->where("goods_gid ={$gid} and gavalue=''")->delete();
		// 2获取商品规格所有数据,如果没有数据默认给一个空数组,防止报错
		$arr2 = Q('post.spec') ? Q('post.spec') : array();
		// 遍历添加商品规格(因为页面重组的name是一个三维数组,所以为了获得数据需要遍历两次)
		foreach ($arr2 as $k => $v) {
			foreach ($v['gavalue'] as $key=>$value) {
				// 组合数据
				$data2 = array(
					//字段名 => 值
					'gavalue'=>$value,
					'added'=>$v['added'][$key]?:0,
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
		$img = implode(',',Q('post.img',array()));	
		// 把gid压入文章详细表
		$data = array(
			//给默认值 '',防止报错
			'detail'=>Q('post.detail',''),
			'service'=>Q('post.service',''),
			'goods_gid'=>$gid,
			//尝试用自动添加方法,发现不行.改用组合添加(自动添加可以在修改的时候用)
			'img'=>$img
		);
		// 添加数据进文章详细表
		$gModel->add($data);
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
		$gModel = new \Common\Model\GoodsDetail;
		if(!$gModel->create()){
			// 把错误压入
			$this->error=$gModel->getError();
			return false;
		} 
		// 实例化商品属性表
		$GoodsAttrModel = new \Common\Model\GoodsAttr;
		if(!$GoodsAttrModel->create()){
			// 把错误压入
			$this->error = $GoodsAttrModel->getError();
			return false;
		}
		// 更新缓存
		$this->updateCache();
		//验证通过
		// 二,修改=====================调用框架修改方法
		//1,有隐藏域在页面,不写where条件========可以修改
		$this->save();
		// 2,获得商品表gid
		$gid = Q('get.gid');
		// 获得商品详细表gsid
		$gsidD = $gModel->where("goods_gid={$gid}")->find();
		$gsid = $gsidD['gsid'];
		// 修改数据=========可以修改
		$gModel->where("gsid={$gsid}")->save();
		// 3,获得商品属性表gaid
		// 删除属性表数据,同时删除货品列表,防止报错.(因为是再重新输入属性数据,所有属性表的gaid改变了,货品列表的gaid没变所以对应不上)
		$GoodsAttrModel->where("goods_gid={$gid}")->delete();
		// 实例化货品列表
		$GoodsListModel = new \Common\Model\GoodsList;
		// 删除货品列表对应的数据
		$GoodsListModel->where("goods_gid={$gid}")->delete();
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
		$GoodsAttrModel = new \Common\Model\GoodsAttr;
		// 二=================添加商品属性表
		// 1获取商品属性所有数据,如果没有数据默认给一个空数组,防止报错
		$arr = Q('post.attr') ? Q('post.attr') : array();
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
		$GoodsAttrModel->where("goods_gid ={$gid} and gavalue=''")->delete();
		// 2获取商品规格所有数据,如果没有数据默认给一个空数组,防止报错
		$arr2 = Q('post.spec') ? Q('post.spec') : array();
		// 遍历添加商品规格(因为页面重组的name是一个三维数组,所以为了获得数据需要遍历两次)
		foreach ($arr2 as $k => $v) {
			foreach ($v['gavalue'] as $key=>$value) {
				// 组合数据
				$data2 = array(
					//字段名 => 值
					'gavalue'=>$value,
					'added'=>$v['added'][$key]?:0,
					// 类型属性id
					'type_attr_taid'=>$k,
					'goods_gid'=>$gid,
				);
				// 遍历添加
				$GoodsAttrModel->add($data2);
			}	
		}

	}
	/**
	 * 更新缓存
	 */
	public function updateCache(){
		// 清楚缓存
		Cache::del('goods');
	}
	/**
	 * 获得所有数据
	 */
	public function getAll(){
		// 第一次调取,不走if体
		static $goods = NULL;
		// 如果是第二次调取,调取的是静态变量,这样更快
		if($goods) return $goods;
		// 获取缓存
		$data = S('goods');
		// 如果不存在缓存数据,那么查询数据库,重新设置缓存
		if(!$data){
			// 查询数据库
			$temp = $this->get();
			$data = array();
			foreach ($temp as $k => $v) {
				// 把gid主键作为键名
				$data[$v['gid']] = $v;
			}
			// 设置缓存
			S('goods',$data);
		}
		// 存入静态变量
		$goods = $data;
		// 把数据返出去
		return $data;
	}
	/**
	 * 获得多个数据
	 */
	public function getMany($arr){
		// 获得所有数据
		$data = $this->getAll();
		$new = array();
		foreach ($arr as $v) {
			// 把gid主键作为键名
			$new[$v]=$data[$v];
		}
		// 把数据返出去
		return $new;
	}
	/**
	 * 获得区间数据
	 */
	public function getWhere($first,$last){
		$data = $this->getAll();
		$new = array();
		// 截取数组长度(从$first开始截取,截取几个)
		$new = array_slice($data,$first-1,$last);
		// sp($new);die;
		return $new;
	}
}