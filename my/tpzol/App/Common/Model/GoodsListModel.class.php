<?php namespace Common\Model;
use Think\Model;
/**
  *  货品列表模型
  */
class GoodsListModel extends Model{
	// 指定模型操作的表
	protected $tableName = 'goods_list';
	// 自动完成
	// 自动验证
	protected $_validate = array(
		// 分别表示,字段名,规则,错误提示,验证条件,附加规则,必须验证3(验证时间)
		array('inventory','require','商品数量必须添加',3,'',3)
	);
	// 自动完成
	protected $_auto = array(
		// 字段名,自定义方法combineAdd,方法,必须验证,不管修改还是插入都要验证,  回调
		array('combine','combineAdd',3,'callback'),
	);
	/**
	 * 自动添加组合字段
	 */
	public function combineAdd(){
		if(I('post.combine')){
				// 获得组合字段数据
			$combine = implode(',',I('post.combine'));
			return $combine;
		}
		return '';
	}
	/**
	 * 自定义添加方法
	 */
	public function addData(){
		// 一,验证不通过
		// 货品表验证不通过,返回假
		if(!$this->create()){
			return false;
		}
		// 二,添加数据
		$gid = I('get.gid',0,'intval');
		// 处理数据
		$data = $this->proData($gid);
		// 添加
		$this->add($data);
		// 修改商品表的总数
		$this->editTotal();
		// 添加完成,返回真
		return true;
	}
	/**
	 * 修改
	 */
	public function editData(){
		// 一,验证不通过,返回假
		if(!$this->create()) {
			return false;
		}
		// 二,修改数据
		// 处理数据
		$data = I('post.');
		// 转换数组为字符串
		$combine = implode(',',I('post.combine'));
		// 将数据替换成字符串
		$data['combine'] = $combine;
		// 保存
		$this->save($data);
		// 修改商品表的总数
		$this->editTotal();
		// 修改成功,返回真
		return true;
	}
	/**
	 * 处理数据函数
	 */
	public function proData($gid){
		// 获得提交的数据
		$da = I('post.');
		// 获得组合字段
		$combine = implode(',',$da['gavalue']);
		$nu = time().$gid;
		$num = I('post.number',0,'intval');
		$num = $num ? $num : $nu;
		// 把组合字段写入货品列表goodsList表
		foreach ($da as $k => $v) {
			// 组合新数据
			$pdata = array(
				'combine'=>$combine,
				'number'=>$num,
				'inventory'=>$da['inventory'],
				'goods_gid'=>$gid
			);
		}
		return $pdata;
	}
	/**
	 * 自定义的方法,修改商品表的总数
	 */
	public function editTotal(){
		$gid = I('get.gid',0,'intval');
		// 获取总数
		$total = D('goods_list')->where("goods_gid={$gid}")->getField('inventory',true);
		// 填入商品表的总数
		$num = array_sum($total);
		// 调用框架修改方法  修改商品表总数
		$data =  D('Goods')->where("gid={$gid}")->save(array('total'=>$num));
		return $data;
	}
}