<?php namespace Common\Model;
use Think\Model;
/**
  *  类型属性模型
  */
class TypeAttrModel extends Model{
	//	指定表
	protected $tableName='type_attr';
		//	自动验证
	protected $_validate = array(
		// 分别表示,字段名,规则,提示, 验证条件,附加规则, 必须验证3(验证时间)
     array('taname','require','类型属性名字不能为空!',3,'',3), 
   );
	/**
	 * 添加
	 */
	public function addData(){
		// 验证不通过,返回假
		if(!$this->create())return false;
		// 在页面有tpye_tid的隐藏域
		// 验证通过,返回真(并且执行添加)
		return $this->add();
	}
	/**
	 * 修改
	 */
	public function editData(){
		// 验证不通过,返回假
		if(!$this->create())return false;
		// 验证通过,返回真,记得在页面加一个taid的隐藏域
		$this->save();
		return true;
	}
}