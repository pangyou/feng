<?php namespace Admin\Model;
use Think\Model;
/**
  *  登录模型
  */
class LoginModel extends Model{
	//	指定表
	protected $tableName='admin';
	//	自动验证
	protected $_validate = array(
	//	验证账号密码是否为空
		// 分别表示,字段名,规则,提示,      必须验证3
     array('username','require','账号不能为空!',1,'',3), 
     array('password','require','密码不能为空!',1,'',3),
   );
	/**
	 * 登录方法
	 */
	public function login(){
		// 触发自动验证,验证不通过,返回假
		if(!$data = $this->create()) return false;
		// 验证通过
		// 通过POST方式提交过来的用户名和密码
		$username = I('post.username');
		$password = I('post.password','','md5');
		$userData = $this->where("username='{$username}' and password='{$password}'")->select();
		// 如果用户名和密码不正确
		if(!$userData){
			// 把错误信息压入
			$this->error= '账号或密码不正确';
			// 返回假
			return false;
		} 
		// 如果正确,把aid 和aname写入session
		$_SESSION['uid'] = $userData[0]['uid'];
		$_SESSION['username'] = $userData[0]['username'];
		// 返回真,让外面接收
		return true;
	}
	/**
	 * 修改密码
	 */
	public function editPassword(){
		// 1,判断就密码是否正确
		// 接收post提交过来的旧密码
		$oldPassword = I('post.oldPassword','','md5');
		// 查询数据库
		$userData = $this->where("uid={$_SESSION['uid']}")->select();
		// 如果原密码错误
		if($userData[0]['password'] != $oldPassword){
			$this->error ='原密码错误';
			return false;
		}
		// 2,判断两次密码是否一样
		if(I('post.newPassword') != I('post.confirmPassword')){
			$this->error= '两次输入的密码不一样';
			return false;
		}
		// 3,修改
		$password = I('post.newPassword','','md5');
		$this->where("uid={$_SESSION['uid']}")->save(array('password'=>$password));
		// 修改成功后删除session,销毁session
		session_unset();
		session_destroy();
		// 父级跳转回登陆页面
		$url = U('Login/index');
		$str = <<<str
<script>
parent.location.href= '{$url}';
</script>
str;
		echo $str;
		return true;
	}
}
