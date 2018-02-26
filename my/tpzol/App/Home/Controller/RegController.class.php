<?php namespace Home\Controller;
use Think\Controller;
/**
 * 注册控制器
 */
class RegController extends Controller {
	private $model;
	// 构造函数
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化前台用户表
		$this->model = D('User');
	}
	/**
	 * 显示注册页面
	 */
    public function index(){
    	if(IS_POST){
    		// 如果验证通过,注册成功提示
    		if($this->model->addData())$this->success('注册成功',U('Login/index'));
    		// 如果验证不通过,提示错误
    		$this->error($this->model->getError());
    	}
        // 载入模板
       $this->display();
    }
     /**
     * 验证码
     */
    public function code(){
		$Verify = new \Think\Verify();
		// 字体大小
		$Verify->fontSize = 20;
		// 宽度
		$Verify->imageW = 150;
		// 高度
		$Verify->imageH = 40;
		// 字体个数
		$Verify->length   = 4;
		// 关闭曲线
		$Verify->useCurve = false;
		// 关闭杂点
		$Verify->useNoise= false;
		// 调用
		$Verify->entry();
	}
}