<?php namespace Common\Model;
use Think\Model;
/**
  *  商品表模型
  */
class GoodsAttrModel extends Model{
	// 指定模型操作的表
	protected $tableName = 'goods_attr';
	// 自动完成
	protected $_auto = array(
		array('added','price',3,'callback')
	);
	/**
	 * 自动完成 价格添加方法
	 */
	public function price(){
		if(I('post.spec')){
			foreach (I('post.spec') as $k => $v) {
				foreach ($v['gavalue'] as $key=>$value) {	
					return $v['added'][$key];
				}	
			}
		}
		// 防止报错,返回0
		return 0;
	}
}