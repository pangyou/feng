<?php namespace Common\Model;
use Think\Model;
/**
  *  类型模型
  */
class TypeModel extends Model{
	//	指定表
	protected $tableName='type';
		//	自动验证
	protected $_validate = array(
		// 分别表示,字段名,规则,提示, 验证条件,附加规则, 必须验证3(验证时间)
     array('tname','require','类型名字不能为空!',3,'',3), 
   );
	/**
	 * 添加
	 */
	public function addData(){
		// 验证不通过,返回假
		if(!$this->create())return false;
		// 验证通过,执行添加方法
		$this->add();
		// 返回真
		return true;
	}
	/**
	 * 修改
	 */
	public function editData(){
		// 验证不通过,返回假
		if(!$this->create())return false;
		// 验证通过,执行添加方法,记得在页面加一个tid 的隐藏域
		// 如果不加隐藏域, 需要加上where条件
		$this->save();
		// 返回真
		return true;
	}
}