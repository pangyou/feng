<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 友情连接控制器
 */
class LinkController extends CommonController{
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		$this->model = new \Common\Model\Link;
	}
	/**
	 * 友情连接显示
	 */
	public function index(){
		// 获得友情表的所有数据
		$data = $this->model->get();
		// 分配变量到页面
		View::with('data',$data);
		// 载入显示页面
		View::make();
	}
	/**
	 * 友情连接添加
	 */
	public function add(){
		// 点击添加
		if(IS_POST){
			// 调用模型的添加方法
			if($this->model->addData()){
				View::success('添加成功',U('index'));
			}
			// 如果验证不通过,就提示错误
			View::error($this->model->getError());
		}
		// 载入添加页面
		View::make();
	}
	/**
	 * 修改
	 */
	public function edit(){
		// 2,修改
		if(IS_POST){
			// 验证通过,提示修改成功,跳转回显示页面
			if($this->model->editData())View::success('修改成功',U('index'));
			// 验证不通过,提示错误
			View::error($this->model->getError());
		}
		$lid = Q('get.lid',0,'intval');
		// 1,获取旧数据
		$oldData = $this->model->where("lid=$lid")->find();
		// 分配变量到页面
		View::with('oldData',$oldData);
		// 载入修改页面
		View::make();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 接收get里面的lid
		$lid = Q('get.lid',0,'intval');
		// 2,删除
		$this->model->where("lid=$lid")->delete();
		// 删除成功提示
		View::success('删除成功');
	}
}