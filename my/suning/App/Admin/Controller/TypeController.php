<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 类型管理控制器
 */
class TypeController extends CommonController{
// 定义一个类型属性,为了全局调用
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化\Common\Model(命名空间)下的控制器Type
		$this->model = new \Common\Model\Type;
	}
	/**
	 * 显示类型
	 */
	public function index(){
		// 获得所有的类型数据
		$data = $this->model->groupBy('tid','DESC')->get();
		// 分配变量到页面,并且载入页面
		View::with('data',$data)->make();
	}
	/**
	 * 添加类型
	 */
	public function add(){
		// 点击提交
		if(IS_POST){
			// 调用模型的添加方法
			if($this->model->addData()){
				// 把数组转为json形式
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'添加成功'
						)
				);exit;
			}
			// 把数组转为json形式
			echo json_encode(
				array(
					'status'=>0,
					'message'=>$this->model->getError()
				)
			);exit;
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
			// 如果验证通过
			if($this->model->editData()){
				// 把数组转为json形式
				echo json_encode(
					array(
						'status' =>1,
						'message'=>'修改成功'
					)
				);exit;
			}
			// 把数组转为json形式
			echo json_encode(
				array(
					'status' =>0,
					'message'=>$this->model->getError()
				)
			);exit;
		}
		// 1,获取旧数据
		// 获取要修改的tid
		// 默认值为0,强制转整
		$tid = Q('get.tid',0,'intval');
		// 获取旧数据
		$oldData = $this->model->where("tid=$tid")->find();
		// 分配变量到页面并载入模板
		View::with('oldData',$oldData)->make();
	}
	/**
	 * 删除
	 */
	public function del(){
		// 接收get里面的tid
		$tid = Q('get.tid',0,'intval');
		// 删除
		$this->model->where("tid=$tid")->delete();
		//实例化类型属性表
		$TypeAttr = new \Common\Model\TypeAttr;
		// 删除类型属性表
        $TypeAttr->where("type_tid={$tid}")->delete();
		// 成功提示
		View::success('删除成功');
	}
}