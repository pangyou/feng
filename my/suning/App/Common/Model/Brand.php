<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 品牌操作模型
  */
class Brand extends Model{
//	指定模型操作的表(固定写法)
	protected $table = 'brand';
//	自动验证(固定写法)
	protected $validate = array(
//		array(字段名,验证方法,错误信息,验证条件,验证时间)
		array('bname','required','品牌名字不能为空',3,3),
	);
	// 自动完成
	protected $auto = array(
		// 调用当前类的up方法处理上传
		// 缩略图,自定义方法up,方法,必须验证,不管修改还是插入都要验证
		array('logo','up','method',3,3),
	);
	/**
	 * 添加
	 */
	public function addData(){
		// 验证不通过,返回假
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
		// 验证不通过,返回假
		if(!$this->create()) return false;
		// 更新缓存
		$this->updateCache();
		// 如果不想加where条件就能修改,必须在页面放主键的隐藏域,
		$this->save();
		// 验证通过,返回真
		return true;
	}
	/**
	  * logo上传方法
	  */ 
	public function up(){
		// 这步很重要!!!!!!!!=======
		// 如果有隐藏域,证明是修改,直接返回原地址
		if($logo = Q('post.logo')) return $logo;
		// 调用框架上传方法
		$files = Upload::type('jpg,png,jpeg,gif,bmp')->size(2000000)->make();
		// 如果上传成功
		if($files){
			// 此处return 的值会存入logo字段
			return $files[0]['path'];
		}else{
			// 否则上传失败
			// 如果用户有上传,但是上传失败,
			// 用户不上传就不压错误,因为允许用户不上传
			if($_FILES['logo']['error'] != 4){
				// 这个时候把上传的错误压入到模型的error属性里面,这样外面控制器的getError方法就可以调取到错误
				$this->error = Upload::getError();
			}
			// 返回空字符串给logo字段
			return '';
		}
	}
	/**
	 * 更新缓存
	 */
	public function updateCache(){
		// 清除缓存
		Cache::del('brand');
	}
	/**
	 * 获得所有数据
	 */
	public function getAll(){
		// 第一个调取,不走if
		static $brand = NULL;
		// 第二次调取,直接返回静态变量,这样更快
		if($brand) return $brand;
		// 获取缓存
		$data = S('brand');
		// 如果缓存不存在,查询数据库,重新设置缓存
		if(!$data){
			// 查询数据库
			$temp = $this->get();
			// 临时数组
			$data = array();
			foreach ($temp as $k => $v) {
				$data[$v['bid']] = $v;
			}
			// 设置缓存
			S('brand',$data);
		}
		// 存入静态变量
		$brand = $data;
		// 把数据返出去
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
	  *  获取区间数据
	  */
	public function getWhere($first,$last){
		$data = $this->getAll();
		// 截取数组长度
		$new= array_slice($data,$first-1,$last-1);
		return $new;
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
}