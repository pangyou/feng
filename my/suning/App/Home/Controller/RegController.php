<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//前台注册控制器
class RegController extends Controller{
    private $model;
    public function __construct(){
        // 防止父级被覆盖
        parent::__construct();
        $this->model = new \Common\model\User;
    }
    //默认登录首页
    public function index(){
        if(IS_POST){
        // 成功提示
            if($this->model->addData())View::success('注册成功',U('Login/index'));
            View::error($this->model->getError());
        }
    	// 载入页面
    	View::make();
    }
    // 验证码调取
    public function code(){
        //显示验证码
        // 设置宽高,字体大小
        Code::width(150)->height(42)->fontSize(20);
        Code::make();
    }
}