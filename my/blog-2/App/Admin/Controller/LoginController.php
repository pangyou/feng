<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

//后台登录控制器
class LoginController extends Controller{

	//构造函数
	public function __init()
	{
	}
    //默认登录首页
    public function index(){
    	if(IS_POST){
    		// 接收post里面的username
    		$username = Q('post.username');
    		// 接收密码,(1,给密码默认值防止null类型,2,然后md5加密,)
    		$password = Q('post.password','','md5');
    		// 查询数据库,原生sql语句
    		// SELECT * FROM user WHERE username='{$username}' AND password='{$password}'
    		$userData = Db::table('user')->WHERE("username='{$username}' AND password='{$password}'")->get();
    		if($userData){
    			// 把从数据库拿到的信息存入到session
   // ============用到哪里去了,这个很重要!!!================
    // uid(1,用在检测是否是登录状态,2,修改密码时需要用到)
    // username(1,用在修改密码时)
    			$_SESSION['uid'] = $userData[0]['uid'];
    			$_SESSION['username'] = $userData[0]['username'];
    			// 跳转到后台首页
    			$this->success('登录成功',U('Admin/Index/index'));
    		}else{
                $this->error('密码或用户名错误');
            }
    	}
    	// 载入登录页面
       	View::make();
    }
    // 退出
    public function out(){
    	// 删除session
    	session_unset();
        // 销毁session
    	session_destroy();
    	// 跳转回登录页面
    	// 因为前面没写,表示默认当前模块,默认当前控制器的方法
    	// 可以写成 U('Admin/Login/index')
    	go(U('index'));
    }
}