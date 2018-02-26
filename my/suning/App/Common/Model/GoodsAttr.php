<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 货品操作模型
  */
class GoodsAttr extends Model{
	// 指定模型操作的表
	protected $table = 'goods_attr';
	// 自动完成
	protected $auto = array(
		array('added','price','method',3,3)
	);
	/**
	 * 自动完成 价格添加方法
	 */
	public function price(){
		if(Q('post.spec')){
			foreach (Q('post.spec') as $k => $v) {
				foreach ($v['gavalue'] as $key=>$value) {	
					return $v['added'][$key];
				}	
			}
		}
		// 防止报错,返回0
		return 0;
	}
}