<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 后台公共控制器
 */
class CommonController extends Controller {
    //默认方法
    public function __construct(){
       // 防止父级构造方法被覆盖
    	parent::__construct();
    	// 判断是否是登录状态
    	if(!isset($_SESSION['uid'])){
    		// 没有登录, 就跳转回后台登录页面
            go(U('Login/index'));
    	}
    }
}