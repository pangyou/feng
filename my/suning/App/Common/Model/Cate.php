<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 分类操作模型
  */
class Cate extends Model{
	//	指定模型操作的表(固定写法)
	protected $table = 'category';
	//	自动验证(固定写法)
	protected $validate = array(
	//		array(字段名,验证方法,错误信息,验证条件,验证时间)
	array('cname','required','分类名字不能为空',3,3),
	array('csort','num:0,65535','分类排序必须是数字并且范围是0-65535',3,3)
	);
	//	此方法为自定义的放法
	/**
	* 添加方法
	*/
	public function addData(){
		// 方法一:
		//	 	1,调用add方法之前,必须经过create,否则无法添加
		//		2,create 才会触发自动验证
		//		验证通过,才执行添加
		// if($this->create()){
		// 	//			调用框架里面的方法
		// 	$this->add();
		// 	//			添加成功,返回true,让外面CateController里面的add等方法接收是否验证通过的结果
		// 	return true;
		// }
		// //		验证不通过,返回假
		// return false;
		// 方法二:
		if(!$this->create()) return false;
		// 更新缓存
		$this->updateCache();
		// 执行添加,并且返回真
		return $this->add();
	}
	/**
	* 修改
	*/
	public function editData(){
		//	  	例如标题为空的时候,验证不通过,返回假
		if(!$this->create()) return false;
		//		如果不想加where 条件就能修改,那么必须在页面放主键的隐藏域,必须有主键的表才能实现不加where条件
		// 更新缓存
		$this->updateCache();
		//调用框架里面的修改方法
		$this->save();
		//		验证通过,返回真
		return true;		
	}
    /**
	* 获得除了子集和子集的所有子集的分类
	*/ 
	public function getNoMy($cid){
		//	   	获得所有子集分类的cid
		$cids = $this->getSon($this->get(),$cid);
		//		把自己压进去
		$cids[] = $cid;
		//		变成字符串形式  21,22,23,20
		$strCids = implode(',',$cids);
		//		返回结果
		return $this->where("cid NOT IN({$strCids})")->get();
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
    /**
	* [getAll 获得所有的数据]
	* @return [type] [description]
	*/
	public function getAll(){
		// 第一次调取,不走if体
		static $cate = NULL;
		// 假如是第二次调取数据,调取的是静态变量(这样能更快)
		if($cate) return $cate;
		// 获取缓存(框架里的方法)
		$data = S('category');
		// 如果缓存不存在,那么查询数据库,重新设置缓存
		if(!$data){
			// 查询数据库
			// sp('走了数据库');
			$temp = $this->get();
			$data = array();
			foreach ($temp as $k => $v) {
			// 把cid主键作为键名,为了单独调用的时候传主键就可以了,而且单独查询不走数据库,查的是缓存,这样能更快
			$data[$v['cid']] = $v;
			}
			// 设置缓存
			S('category',$data);
		}
		// 存入静态变量
		$cate = $data;
		return $data;
	}
	/**
	 * 获得一条数据
	 */
	public function getOne($id){
		// 获取所有数据
		$data = $this->getAll();
		// 如果存在数据,就返回数据
		if(isset($data[$id])){
			return $data[$id];
		}
	}
	/**
	 * 更新缓存
	 */
	public function updateCache(){
		// 清除缓存
		Cache::del('category');
	}
	/**
	 * 获得多个数据
	 */
	public function getMany($arr){
		// 获得所有数据
		$data = $this->getAll();
		$new = array();
		// sp($data);
		// 重组数据
		foreach ($arr as $k => $v) {
			//把id作为键名
			$new[$v] = $data[$v];
		}
		//把数据返出去
		return $new;
	}
	/**
	 * 获得区间的数据
	 */
	public function getWhere($first,$last){
		$data = $this->getAll();
		$new = array();
		// 截取数组长度(从$first开始截取,截取几个)
		$new = array_slice($data,$first-1,$last);
		return $new;
	}
	/**
	 * 获得pid为0的数据
	 */
	public function gidZero(){
		$data = $this->getAll();
		// sp($data);
		$new = array();
		foreach ($data as $k => $v) {
			if($v['pid']==0){
				$new[] = $v;
			}
		}
		return $new;
	}
}	
