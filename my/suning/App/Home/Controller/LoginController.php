<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//前台登录控制器
class LoginController extends Controller{
    //默认登录首页
    public function index(){
    	if(IS_POST){
            // sp($_POST);die;
			// 接收post里面的username
    		$nickname = Q('post.nickname');
    		// 接收密码,(1,给密码默认值防止null类型,2,然后md5加密,)
    		$password = Q('post.password','','md5');
    		// 查询数据库,原生sql语句
    		// SELECT * FROM user WHERE username='{$username}' AND password='{$password}'
    		$userData = Db::table('user')->where("nickname='{$nickname}' AND upassword='{$password}'")->get();
    		if($userData){
    			// 把从数据库拿到的信息存入到session
  			 // ============用到哪里去了,这个很重要!!!================
   			 // uid(1,用在检测是否是登录状态,2,修改密码时需要用到)
   			 // username(1,用在修改密码时)
    			$_SESSION['aid'] = $userData[0]['aid'];
    			$_SESSION['nickname'] = $userData[0]['nickname'];
                // 如果用户点击自动登录(则7天免登录)
                if(isset($_POST['auto'])){
                    setcookie(session_name(),session_id(),time()+3600*24*7,'/');
                }else{//如果用户没有点击7天免登录,那么cookie的有效时间就是会话时间
                    setcookie(session_name(),session_id(),0,'/');
                }
    			// 跳转到后台首页
    			$this->success('登录成功',U('Home/Index/index'));
    		}else{
                $this->error('密码或用户名错误');
            }
    	}
    	// 载入登录模板
    	View::make();
    }
     /**
       *  退出
       */
    public function out(){
    	// 删除session
    	session_unset();
        // 销毁session
    	session_destroy();
    	// 跳转回登录页面
    	// 因为前面没写,表示默认当前模块,默认当前控制器的方法
    	// 可以写成 U('Home/Login/index')
    	go(U('Index/index'));
    }
}