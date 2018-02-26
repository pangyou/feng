<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 类型操作模型
  */
class User extends Model{
	// 指定模型操作的表
	protected $table = 'user';
	// 自动验证
	protected $validate = array(
		array('nickname','required','用户名必须填写',3,3),
		array('password','required','密码必须填写',3,3),
		array('phone','required','手机号必须填写',3,3),
	);
	/**
	 * 用户注册成功
	 */
	public function addData(){
		// 验证不通过,返回假
		if(!$this->create())return false;
	 	//接收填写好的用户名,密码,验证码,手机
        $nickname = Q('post.nickname');
        $password = Q('post.password','','md5');
        $phone = Q('post.phone');
        $code = Q('post.code');
        // 数据库中是否有这个用户名
        $userData = $this->where("nickname='{$nickname}'")->get();
        $userData = $userData ? 1 : 0;
        if($userData){
            View::success('该用户名已被注册');
        }
        // 执行插入数据库******
        $data = array(
            'nickname'=>$nickname,
            'password'=>$password,
            'phone'=>$phone,
        );
        $this->add($data);
        // 清楚缓存
        $this->clear_cache();
        return true;
	}
}