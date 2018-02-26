<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 品牌控制器
 */
class BrandController extends CommonController {
    private $model;
    public function __construct(){
        // 防止父级构造方法被覆盖
        parent::__construct();
        // 实例化类型模型
        $this->model = D('Brand');
    }
    /**
	 * 显示品牌
	 */
	public function index(){
		// 点击排序
		if(IS_POST){
			// 遍历通过POST提交的数据
			foreach ($_POST as $k => $v) {
				// 依次更改
				$this->model->where("bid={$k}")->save(array('bsort'=>$v));
			}
		}
		// 获得所有的品牌数据
		$data = $this->model->order('bsort','DESC')->select();
		// 分配变量到页面并载入模板页面
		$this->assign('data',$data)->display();
	}
	/**
	 * 添加
	 */
	public function add(){
		// 点击添加
		if(IS_POST){
			// 调用Brand里面的添加方法
			if($this->model->addData())$this->success('添加成功');
			$this->error($this->model->getError());
		}
		// 载入添加模板
		$this->display();
	}
	/**
	 * 编辑
	 */
	public function edit(){
		// 2,修改
		if(IS_POST){
			// 验证通过,提示修改成功,跳转回页面
			if($this->model->editData())$this->success('修改成功',U('index'));
			// 验证不通过,提示错误
			$this->error($this->model->getError());
		}
		// 1,获得旧数据
		// 接收get里面的bid
		$bid = I('get.bid',0,'intval');
		// 获得旧数据
		$oldData = $this->model->where("bid={$bid}")->find();
		// 分配变量到页面并载入模板页面
		$this->assign('oldData',$oldData)->display();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 获取要删除的bid
		$bid = I('get.bid',0,'intval');
		// 调用框架的删除方法
		$this->model->where("bid={$bid}")->delete();
		// 删除成功提示
		$this->success('删除成功');
	}
}