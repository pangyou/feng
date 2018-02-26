<?php namespace Common\Model;
use Hdphp\Model\Model;
/**
 * 友情连接操作模型
 */
class Link extends Model{
	// 指定模型操作的表(固定写法)
	protected $table = 'link';
	// 自动验证
	protected $validate = array(
		array('lname','required','友情连接名字不能为空',3,3),
		array('url','http','友情连接地址不能为空或者格式错误',3,3),
	);
	// 自动完成
	protected $auto = array(
		// 调用当前类的up方法处理上传,自动上传
		array('logo','up','method',3,3),
		// 自动记录添加时间
		array('addtime','time','function',3,3),
	);
	/**
	 * 自定义的添加方法
	 */
	public function addData(){
		// 一,验证************
		// link表验证不通过,返回假
		if(!$this->create()) return false;
		// 如果有上传压入的错误,返回假
		if($this->error) return false;
		// 二,添加********
		$this->add();
		// 添加成功,返回真
		return true;
	}
	/**
	 * 自定义修改函数
	 */
	public function editData(){
		// 验证不通过,返回假
		if(!$this->create())return false;
		// 如果有上传压入的错误,返回假
		if($this->error) return false;
		// 验证通过,修改数据
		$this->save();
		// 修改成功,返回真
		return true;
	}
	/**
	 * logo的上传方法***************
	 */
	public function up(){
		// 这步很重要!!!!*************
		// 如果有隐藏域,证明是修改,直接返回原地址
		if($logo = Q('post.logo'))return $logo;
		// $_FILES能打印出来才能上传
		// sp($_FILES);die;
		// 图片设置,类型,大小
		$files = Upload::type('jpg,png,gif,jpeg,bmp')->size(2000000)->make();
		// 如果上传成功
		if($files){
			// 此处return的值会存入logo字段
			return $files[0]['path'];
		}else{//否则上传失败
			// 如果用户有上传但是上传失败,用户不上传就不压错误,因为允许不上传
			if($_FILES['logo']['error'] !=4){
				// 这个时候把上传的错误压入到模型的error属性里面,这样外面控制器的getError方法就可以调取到错误
				$this->error = Upload::getError();
			}
			// 返回空字符串给logo字段
			return '';
		}
	}
}