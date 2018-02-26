<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 标签控制器
 */
class TagController extends CommonController{
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		$this->model = new \Common\Model\Tag;
	}
	/**
	 * 显示标签
	 */
	public function index(){
		// 获取所有标签的数据
		$data = $this->model->orderBy('tid')->get();
		// 分配变量到页面
		View::with('data',$data);
		// 载入默认页面(显示页面)
		View::make();
	}
	/**
	 * 标签添加
	 */
	public function add(){
		// 点击添加
		if(IS_POST){
			// 调用模型的添加方法
			if($this->model->addData()){
				// 把数组转为json
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'添加成功'
					)
				);exit;
			}
			// 如果验证不通过,就提示错误
			// 把数组转为json
			echo json_encode(
				array(
					'status'=>0,
					'message'=>$this->model->getError(),
				)
			);exit;
		}
		// 载入添加页面
		View::make();
	}
	/**
	 * 标签修改
	 */
	public function edit(){
		// 2,修改
		if(IS_POST){
			// 验证通过,提示修改成功,跳转回显示页面
			if($this->model->editData()){
			// 把数组转为json
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'添加成功'
					)
				);exit;;
			}
			// 验证不通过,提示错误
			// 把数组转为json
			echo json_encode(
				array(
					'status'=>0,
					'message'=>$this->model->getError(),
				)
			);exit;
		}
		// 1,获得旧数据
		// a,获取点击的哪个标签的tid
		$tid = Q('get.tid',0,'intval');
		// b,获取标签为$tid的数据
		$oldData = $this->model->where("tid=$tid")->find();
		// 分配变量到页面
		View::with('oldData',$oldData);		
		// 载入修改页面
		View::make();
	}
	/**
	 * 标签删除
	 */
	public function del(){
		// 1,接收get里面的tid
		$tid = Q('get.tid',0,'intval');
		// 2,删除
		$this->model->where("tid=$tid")->delete();
		// 删除成功提示
		View::success('删除成功');
	}
}






 ?>