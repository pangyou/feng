<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

//后台默认控制器
class IndexController extends CommonController{
    /**
     * 默认后台首页
     */
    public function index(){
        // 载入后台首页
       View::make();
    }
    /**
      * 欢迎界面
      */ 
    public function welcome(){
        // 载入欢迎界面
    	View::make();
    }
    /**
      * 修改密码
      */ 
    public function updatePassword(){
    	if(IS_POST){
    		// 1,判断旧密码是否正确******
    		$oldPassword = Q('post.oldPassword','','md5');
    		// 获得当前用户登录的数据
    		$userData = Db::table('user')->WHERE("uid={$_SESSION['uid']}")->get();
    		// 如果密码错误
    		if($userData[0]['password'] != $oldPassword){
    			$this->error('原密码错误');
    		}
    		// 2,判断两次密码是否相同******
    		if(Q('post.newPassword')!= Q('post.confirmPassword')){
    			$this->error('两次输入的密码不相同');
    		}
    		// 3,修改密码********
    		$password = Q('post.newPassword','','md5');
    		// 原生sql修改语句UPDATE user SET password='{$password}' WHERE uid={$_SESSION['uid']};
    		Db::table('user')->WHERE("uid={$_SESSION['uid']}")->update(array('password' => $password));
    		// 删除session,让其重新登录
    		session_unset();
            // 销毁session
    		session_destroy();
    		// 跳转回登录页面
    		$url = U('Login/index');
    		$str = <<<str
<script>
parent.location.href = '{$url}';
</script>    		
str;
			echo $str;exit;
    	}
    	// 载入修改密码页面
    	View::make();
    }
}
