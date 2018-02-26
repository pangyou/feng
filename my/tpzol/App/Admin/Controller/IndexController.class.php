<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 后台默认控制器
 */
class IndexController extends CommonController {
    // 后台首页
    public function index(){
        // 载入模板
       $this->display();
    }
    /**
     * 后台欢迎界面
     */
    public function welcome(){
        // 载入模板
        $this->display();
    }
}