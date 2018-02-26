<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
  * 分类管理控制器
  */ 
class CateController extends CommonController{
	// 定义一个分类管理属性,为了全局调用
	private $model;
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化  \Common\Model(命名空间)下面的控制器Cate
		$this->model = new \Common\Model\Cate;
	}
	/**
	 * 显示分类
	 */
	public function index(){
		// 只要Cate.php里面有表名,就可以获取所有数据
		// 获得所有的分类数据
		$data = $this->model->get();
		// 让数据呈树状形式显示
		$treeData = Data::tree($data,'cname','cid','pid');
		// sp($treeData);
		// 分配变量到页面
		View::with('data',$treeData);
		// 载入模板
		View::make();
	}
	/**
	 * 添加顶级分类
	 */
	public function add(){
		if(IS_POST){
			// sp($_POST);
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
	 * 添加子分类
	 */
	public function addSon(){
		if(IS_POST){
		// 调用模型的添加方法
			// sp($_POST);die;
			if($this->model->addData()){
				// 把数组转为json
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'添加成功'
					)
				);exit;
			}
			// 把数组转为json
			echo json_encode(
				array(
					'status'=>0,
					'message'=>$this->model->getError(),
				)
			);exit;
		}
		// 获得所属分类的名称和cid**********
		// 接收get里面的cid,默认值为0,强制转整
		$cid = Q('get.cid',0,'intval');
		// 原生sql语句SELECT cid,cname FROM category WHERE cid=$cid;
		// find放在最后,field可以放到where前面
		$data = $this->model->where("cid=$cid")->field('cid,cname')->find();
		// 分配变量到页面
		View::with('data',$data);
		// 载入添加页面
		View::make();

	}
	/**
	 * 编辑分类
	 */
	public function edit(){
		// 3,修改,if放上面少执行几步代码
		if(IS_POST){
			// 验证通过,提示修改成功,跳转回当前模块Admin,当前控制器Cate的默认页面
			if($this->model->editData()) {
				// 把数组转为json
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'添加成功'
					)
				);exit;
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
		// 默认0,强制转整(防止通过页面乱修改)
		$cid = Q('get.cid',0,'intval');
		// find只寻找一条数据,get寻找多个数据
		$oldData = $this->model->where("cid={$cid}")->find();
		// sp($oldData);
		// 分配变量到页面
		View::with('oldData',$oldData);
		// 2,获得所属分类(父级分类不能是自己和自己的子集)
		$cate = $this->model->getNoMy($cid);
		// 处理所属分类
		$cate = Data::tree($cate,'cname');
		// sp($cate);
		// 分配变量到页面
		View::with('cate',$cate);
		
		// 载入页面
		View::make();
	}
	/**
	 * 删除分类
	 */
	public function del(){
		// 接收get里面的cid
		$cid = Q('get.cid',0,'intval');
		// 1,在删除当前分类之前获得当前分类的pid
		$data = $this->model->where("cid=$cid")->find();
		$pid = $data['pid'];
		// 2,找到要删除的当前分类所有的子集,然后更改他们的pid为要删除分类的pid
		$this->model->where("pid=$cid")->update(array('pid'=>$pid));
		// 3,删除分类
		// 原生sql语句DELETE FROM category WHERE cid=$cid;
		$this->model->where("cid=$cid")->delete();
		// 删除成功提示
		View::success('删除成功');
	}
}





 ?>