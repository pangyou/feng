<?php namespace Common\Model;
use Think\Model;
/**
  *  商品表模型
  */
class GoodsDetailModel extends Model{
	// 指定模型操作的表
	protected $tableName = 'goods_detail';
	// 自动完成
	protected $_auto = array(
		// 自动完成img的添加
		array('img','imgAdd',3,'callback')
	);
	/**
	 * 自动完成 图片添加方法=======================修改的时候用到
	 */
	public function imgAdd(){
		if(I('post.img')){
			// 获取商品图册数据
			$img = implode(',',I('post.img',array()));	
			return $img;
		}
		return '';
	}
}