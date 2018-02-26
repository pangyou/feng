<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 类型属性操作模型
  */
class TypeAttr extends Model{
	// 指定模型操作的表
	protected $table = 'type_attr';
	// 自动验证
	protected $validate = array(
		// array(字段名,验证方法,错误信息,验证条件,验证时间)
		array('taname','required','属性名字不能为空',3,3),
		array('class','required','属性类型不能为空',3,3),
		array('tavalue','required','属性值不能为空',3,3),
	);
	/**
	 * 自定义添加方法
	 */
	public function addData(){
		// 1,调用add方法之前,必须经过create,否则无法添加
		// 2,只有经过create 才会触发自动验证
		if($this->create()){
			// 调用框架添加方法
			$this->add();
			// 添加成功,返回true让外面TypeController里面的add等方法接收是否验证通过的结果
			return true;
		}
		// 验证不通过,返回假
		return false;
	}
	/**
	 * 修改
	 */
	public function editData(){
		// 验证不通过,返回假
		if(!$this->create()) return false;
		// 不加where,记得在页面加主键的隐藏域
		// 调用框架修改方法
		$this->save();
		// 修改成功,返回真
		return true;
	}
}