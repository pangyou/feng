<?php namespace Common\Model;
use Think\Model;
/**
  *  类型属性模型
  */
class CateModel extends Model{
	//	指定表
	protected $tableName='category';
		//	自动验证
	protected $_validate = array(
		// 分别表示,字段名,规则,错误提示,验证条件,附加规则,必须验证3(验证时间)
     array('cname','require','分类名字不能为空!',3,'',3), 
     // 怎么验证不了数字范围
     // array('csort','number:0,65535','分类排序必须是数字并且范围是0-65535',1,'',3)
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
	/**
	* 获得除了子集和子集的所有子集的分类
	*/ 
	public function getNoMy($cid){
		//	   	获得所有子集分类的cid
		$cids = $this->getSon($this->select(),$cid);
		//		把自己压进去
		$cids[] = $cid;
		//		变成字符串形式  21,22,23,20
		$strCids = implode(',',$cids);
		//		返回结果
		return $this->where("cid NOT IN({$strCids})")->select();
	}
	/**
	* 不确定性,就用递归
	* 递归获得所有的子集的cid
	* @params $data 全部分类数
	* @params $cid 当前分类的cid
	*/
	public function getSon($data,$cid){
		//	   	不能用静态变量,因为如果用了静态变量,第二次调用的时候不能获得想要的子集(第二次调用,已经存在有第一次的值)
		//	   	设置一个空数组,为了能合并
		$temp = array();
		//			遍历分类数据,为了获得具体的cid
		foreach ($data as $v) {
			//找到了子集
			if($v['pid'] == $cid){
				//					把子集压入空数组
				$temp[] = $v['cid'];
				//					数组合并,进入递归
				$temp = array_merge($temp,$this->getSon($data,$v['cid']));
			}
		}
		//这步很重要================
		//把数据返出去,让外面(getNoMy)接收
		return $temp;
    }
}