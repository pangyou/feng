<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 商品详细表操作模型
  */
class GoodsDetail extends Model{
	// 指定模型操作的表
	protected $table = 'goods_detail';
	// 自动完成
	protected $auto = array(
		array('img','imgAdd','method',3,3),
	);
	/**
	 * 自动完成 图片添加方法=======================修改的时候用到
	 */
	public function imgAdd(){
		if(Q('post.img')){
			// 获取商品图册数据
			$img = implode(',',Q('post.img',array()));	
			return $img;
		}
		return '';
	}
}