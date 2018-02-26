<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 货品操作模型
  */
class GoodsList extends Model{
	// 指定模型操作的表
	protected $table = 'goods_list';
	// 自动验证
	protected $validate = array(
		array('number','商品数量必须添加',3,3)
	);
	// 自动完成
	protected $auto = array(
		array('combine','combineAdd','method',3,3),
	);
	/**
	 * 自动添加组合字段
	 */
	public function combineAdd(){
		if(Q('post.combine')){
				// 获得组合字段数据
			$combine = implode(',',Q('post.combine'));
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
		$gid = Q('get.gid','','intval');
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
		$data = Q('post.');
		// 转换数组为字符串
		$combine = implode(',',Q('post.combine'));
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
		$da = Q('post.');
		// 获得组合字段
		$combine = implode(',',$da['gavalue']);
		$nu = time().$gid;
		$num = Q('post.number','','intval');
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
		$gid = Q('get.gid','','intval');
		// 实例化商品表
		$goodsModel = new \Common\Model\Goods;
		// 获取总数
		$total =Db::table('goods_list')->where('goods_gid',$gid)->lists('inventory');
		// 填入商品表的总数
		$num=array_sum($total);
		// 调用框架修改方法
		$da = $goodsModel->where("gid={$gid}")->update(array('total'=>$num));
		return $da;
	}
	
}