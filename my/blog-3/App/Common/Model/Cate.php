<?php namespace Common\Model;
// 命名空间导入
use Hdphp\Model\Model;
/**
  * 分类操作模型
  */ 
class Cate extends Model{
	// 指定模型操作的表(固定写法)
	protected $table = 'category';
	// 自动验证(固定写法)
	protected $validate = array(
		// array(字段名,验证方法,错误信息,验证条件,验证时间)
		array('cname','required','分类名称不能为空',3,3),
		array('ctitle','required','分类标题不能为空',3,3),
		array('csort','num:0,65535','分类排序必须是数字并且范围是0-65535',3,3),
	);
	// 此方法是自定义的,未来想添加的时候直接调用这个方法就可以添加
	public function addData(){
		// 1,调用add方法之前,必须经过create,否则无法添加
		// 2,create才会触发自动验证
		// 验证通过,才执行添加
		if($this->create()){
			// 经过$this->create(),会把数据存入data中
			// sp($this->data);
			// 调用框架里面的添加方法
			$this->add();
			// ===========$this->add()返回false???============
			// p($this->add());
			// 添加成功,返回true,让外面CateControler里面的add等方法接收
			return true;
		}
		return false;
	}
	/**
	 * 修改
	 */
	public function editData(){
		// 例如标题为空的时候,验证不通过,返回假
		if(!$this->create())return false;
		// 如果不想加where就能修改,那么必须在页面放主键的隐藏域
		// 调用框架里面的修改方法
		$this->save();
		// 验证通过,返回真
		return true;
	}
	/**
	 * 获得除了子集和自己所有的子集的分类
	 */
	public function getNoMy($cid){
		// 获得所有子集分类的cid
		$cids = $this->getSon($this->get(),$cid);
		// 把自己压进去
		$cids[] = $cid;
		// 变成字符串形式 21,22,23,20
		$strCids = implode(',', $cids);
		// 返回结果
		return $this->where("cid NOT IN($strCids)")->get();
	}
	/**
	 * 不确定性,就用递归
	 * 递归获得所有的子集的cid
	 * @param $data 全部分类数据
	 * @param $cid 当前分类的cid
	 */
	public function getSon($data,$cid){
		$temp = array();
		foreach ($data as $v) {
			// 找到了子集
			if($v['pid'] == $cid){
				$temp[] = $v['cid'];
				$temp = array_merge($temp,$this->getSon($data,$v['cid']));
			}
		}
		// 把数据返出去,让外面(getNoMy)接收
		return $temp;
	}
}


 ?>