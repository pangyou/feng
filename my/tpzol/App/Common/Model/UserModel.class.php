<?php namespace Common\Model;
use Think\Model;
/**
  *  前台用户表模型
  */
class UserModel extends Model{
    //	指定表
    protected $tableName='user';
    	//	自动验证
    protected $_validate = array(
      	// 分别表示,字段名,规则,错误提示,验证条件,附加规则,必须验证3(验证时间)
         array('nickname','require','用户名不能为空!',3,'',3), 
         array('password','require','密码必须填写',3,'',3),
         array('phone','require','手机号必须填写',3,'',3),
         array('code','require','验证码必须填写',3,'',3),
     );
    /**
   * 添加方法
   */
  public function addData(){
        // 验证不通过,返回假
        if(!$this->create())return false;
        //接收填写好的用户名,密码,验证码,手机
        $nickname = I('post.nickname');
        $password = I('post.password','','md5');
        $phone = I('post.phone');
        $code = I('post.code');
        // 数据库中是否有这个用户名
        $userData = $this->where("nickname='{$nickname}'")->select();
        $userData = $userData ? 1 : 0;
        if($userData){
            $this->error = '该用户名已被注册';
            return false;
        }
        // 执行插入数据库******
        $data = array(
            'nickname'=>$nickname,
            'upassword'=>$password,
            'phone'=>$phone,
        );
        // 添加成功,返回真
        $this->add($data);
        return true;
    }
}