<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 后台公共控制器
 */
class CommonController extends Controller{
	public function __construct(){
		// 为了防止覆盖父级的构造方法
		parent::__construct();
		// 方法一:
		// // 如果用户没有登录
		// if(!isset($_SESSION['aid'])){
		// 	// 跳转到登录页面
		// 	go(U('Admin/Login/index'));
		// }
		// 方法二:权限分配
		// 然后在配置项修改rbac的相关数据
		// 判断是否登录
		if(!Rbac::isLogin())go(U('Login/index'));
		// 判断是否有权限
		if(!Rbac::verify())
		View::error('没有权限,不要乱点!',U('Index/welcome'));
	}
}

 ?>