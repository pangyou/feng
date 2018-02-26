<?php namespace Home\Controller; 
use Hdphp\Controller\Controller;

//后台公共控制器
class CommonController extends Controller{
	public function __construct(){
		//为了防止覆盖父级的构造方法
		parent::__construct();
	}
}