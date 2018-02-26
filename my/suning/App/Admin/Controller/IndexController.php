<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

//后台默认控制器
class IndexController extends CommonController{
    /**
     * 默认后台首页
     */
    public function index(){
    	// sp($_SESSION);
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
			//1.判断旧密码是否正确****
			$oldPassword = Q('post.oldPassword','','md5');
			//获得当前用户登陆的数据
			$userData = Db::table('admin')->where("uid={$_SESSION['uid']}")->get();
			//如果原密码错误
			if($userData[0]['password'] != $oldPassword){
				$this->error('原密码错误');
			}
			//2.判断两次密码是否相同****
			if(Q('post.newPassword') != Q('post.confirmPassword')){
				$this->error('两次密码不相同');
			}
			//3.修改****
			$password = Q('post.newPassword','','md5');
			//UPDATE admin SET apassword='{$password}' WHERE aid={$_SESSION['aid']};
			Db::table('admin')->where("uid={$_SESSION['uid']}")->update(array('password'=>$password));
			//删除session,让其重新登陆
			session_unset();
			session_destroy();
			//跳转到登陆页面
			$url = U('Login/index');
			$str = <<<str
<script>
parent.location.href = '{$url}';
</script>
str;
			echo $str;exit;
		}
	    View::make();
	}
	 /**
	  * uploadify异步上传
	  */
	public function upload(){
	    $file = Upload::path('Upload/Content/' . date('y/m'))->make();
	    if (empty($file)) {
	        // 相当于：echo json_encode(Upload::getError());exit;
	        $this->ajax(Upload::getError());       
	    } else {
	        /** $file内部就是以下这个数组
	            $file = array(
	                0 => array(
		                'path' => 'Upload/Content/15/8/123981239172.jpg'    ,
		                'url' => 'http://localhost/cms_edu/Upload/Content/15/8/123981239172.jpg',
		                'image' => 1
	            ),
	        );**/
	        //上传成功，把上传好的信息返给js 也就是uploadify
	        $data = $file[0];
	        // 自动生成小图,中图
	        // foreach ($file as $k => $v) {
	        //     // 自动生成小图
	        //     $data['imgs'][$k]['small']=Image::thumb($v,'./Upload/Content/16/06/small'.basename($v),60,60,6);
	        //     // 自动生成中图
	        //     $data['imgs'][$k]['mid']=Image::thumb($v,'./Upload/Content/16/06/mid'.basename($v),360,360,6);
	        //     // 原图,(大图)
	        //     $data['imgs'][$k]['big']=$v;
	        // }
	        // 相当于：echo json_encode($data);exit;
	        $this->ajax($data);
	    }
	}
}
