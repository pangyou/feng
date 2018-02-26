<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 后台默认控制器
 */
class LoginController extends Controller {
	private $model;
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化Login模型   框架D方法   自动寻找路径
		$this->model = D('Login');
	}
    // 登录
    public function index(){
    	// 如果点击登录
    	if(IS_POST){
    		// 如果验证没通过,提示错误
    		if(!$this->model->login()) $this->error($this->model->getError());
    		// 验证通过,提示登录成功,跳转到后台首页
    		$this->error('登录成功',U('Index/index'));
    	}
        // 载入模板
       $this->display();
    }
    /**
     * 修改密码
     */
    public function updatePassword(){
        // 点击修改
        if(IS_POST){
            // 如果验证没通过,提示错误
            if(!$this->model->editPassword()) $this->error($this->model->getError());
        }
        // 载入模板
        $this->display();
    }
    /**
     * 退出
     */
    public function out(){
        // 删除session
        session_unset();
        // 销毁session
        session_destroy();
        // 退出提示
        $this->success('退出成功',U('index'));
    }
}