<?php namespace Home\Controller;
use Think\Controller;
/**
 * 登录控制器
 */
class LoginController extends Controller {
    /**
     * 默认方法---显示登录页面
     */
    public function index(){
    	if(IS_POST){
			// 接收post里面的nickname
    		$nickname = I('post.nickname','');
    		// 接收密码,(1,给密码默认值防止null类型,2,然后md5加密,)
    		$password = I('post.password','','md5');
    		// 查询数据库
    		$userData = D('User')->where("nickname='{$nickname}' AND upassword='{$password}'")->select();
            // 如果数据库中有记录
    		if($userData){
    			// 把从数据库拿到的信息存入到session
    			$_SESSION['aid'] = $userData[0]['aid'];
    			$_SESSION['nickname'] = $userData[0]['nickname'];
    			// 跳转到前台首页
    			$this->error('登录成功',U('Index/index'));
    		}else{
                $this->error('密码或用户名错误');
            }
    	}
        // 载入模板
       $this->display();
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