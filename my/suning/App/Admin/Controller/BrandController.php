<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 品牌管理控制器
 */
class BrandController extends CommonController{
//	定义一个品牌属性,为了全局调用
	private $model;
	public function __construct(){
//	    防止父级构造方法被覆盖
	parent::__construct();
//	实例化\Common\Model(命名空间)下面的控制器Brand
	$this->model = new \Common\Model\Brand;
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
				$this->model->where("bid={$k}")->update(array('sort'=>$v));
			}
		}
		// 获得所有的品牌数据
		$data = $this->model->orderBy('bid','ASC')->get();
		// 分配变量到页面并载入模板页面
		View::with('data',$data)->make();
	}
	/**
	 * 添加
	 */
	public function add(){
		// 点击添加
		if(IS_POST){
			// 调用Brand里面的添加方法
			if($this->model->addData())View::success('添加成功',U('index'));
			View::error($this->model->getError());
		}
		// 载入添加模板
		View::make();
	}
	/**
	 * 编辑
	 */
	public function edit(){
		// 2,修改
		if(IS_POST){
			// 验证通过,提示修改成功,跳转回页面
			if($this->model->editData())View::success('修改成功',U('index'));
			// 验证不通过,提示错误
			View::error($this->model->getError());
		}
		// 1,获得旧数据
		// 接收get里面的bid
		$bid = Q('get.bid',0,'intval');
		// 获得旧数据
		$oldData = $this->model->where("bid={$bid}")->get();
		// 分配变量到页面并载入模板页面
		View::with('oldData',$oldData[0])->make();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 获取要删除的bid
		$bid = Q('get.bid',0,'intval');
		// 更新缓存
		$this->model->updateCache();
		// 调用框架的删除方法
		$this->model->where("bid={$bid}")->delete();
		// 删除成功提示
		View::success('删除成功',U('index'));
	}
}	