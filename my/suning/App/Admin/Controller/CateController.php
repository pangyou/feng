<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 分类管理控制器
 */
class CateController extends CommonController{
//	定义一个分类管理属性,为了全局调用
	private $model;
	public function __construct(){
//	    防止父级构造方法被覆盖
	parent::__construct();
//	实例化\Common\Model(命名空间)下面的控制器Cate
	$this->model = new \Common\Model\Cate;
	}
	/**
	 * 显示分类
	 */
	 public function index(){
        // 点击排序
        if(IS_POST){
            foreach ($_POST as $k => $v) {
                $this->model->where("cid={$k}")->update(array('csort'=>$v));
            }
        }
    //	只要Cate.php里面有表名就可以获取所有数据
    //	获得所有的分类数据
    	$data = $this->model->orderBy('cid','DESC')->get();
    //	让数据呈现树状形式
    	$treeData = Data::tree($data,'cname','cid','pid');
    //	分配变量到页面
    	View::with('data',$treeData)->make();
	 }
	 /**
	  * 添加顶级分类
	  */
	public function add(){
      //	点击提交
	  	if(IS_POST){
        //	调用模型的方法
	  	    if($this->model->addData()){
            //	把数组转为json
				echo json_encode(
					array(
						'status' => 1,
						'message' => '添加成功'
					)
				);exit;
	  	    }
		    echo json_encode(
		   	    array(
					'status' =>0,
					'message' => $this->model->getError()
			    )	
		    );exit;
	  	}
        // 1,获取所有的类型数据
        $typeModel = new \Common\Model\Type;
        $type = $typeModel->get();
        // 分配变量到页面
        View::with('type',$type);
        //载入添加页面
		View::make();
    }
    /**
     * 添加子分类
     */
    public function addSon(){
    	if(IS_POST){
    		// 调用模型的添加方法
    		if($this->model->addData()){
    			// 把数组转为json
    			echo json_encode(
    				array(
    				'status' =>1,
    				'message'=>'添加成功'
    				)
    			);exit;
    		}
    		echo json_encode(
    			array(
    				'status'=>0,
    				'message'=>$this->model->getError()
    			)
    		);exit;
    	}
        // 1,获取所有的类型数据
        $typeModel = new \Common\Model\Type;
        $type = $typeModel->get();
        // 分配变量到页面
        View::with('type',$type);
    	// 接收get里面的cid,默认值为0,强制转整
    	$cid = Q('get.cid',0,'intval');
    	// find必须放在最后,field可以放到where前面
    	$data = $this->model->where("cid=$cid")->field('cid','cname')->find();
    	// 分配变量到页面并且载入模板
    	View::with('data',$data)->make();
    }
    /**
     * 编辑分类
     */
    public function edit(){
    	// 3,修改,if放上面少执行几步代码
    	if(IS_POST){
    		// 验证通过,提示修改成功,跳转回当前模块Admin,当前控制器Cate的默认页面
    		if($this->model->editData()){
    			// 把数组转为json
    			echo json_encode(array(
    					'status'=>1,
    					'message'=>'修改成功'
				));exit;
    		}
    		echo json_encode(array(
    			'status'=>0,
    			'message'=>$this->model->getError(),
    		));exit;
    	}
		
    	// 1,获取旧数据
    	// 默认值为0,强制转整
    	$cid = Q('get.cid',0,'intval');
    	// find只寻找一条数据是一维数组,get寻找多个数据是二维数组	
    	$oldData = $this->model->where("cid={$cid}")->find();
    	// 分配变量到页面
    	View::with('oldData',$oldData);
    	// 2,获得所属分类(父级分类不能是自己和自己的子集)
    	$cate = $this->model->getNoMy($cid);
    	// 处理所属分类
    	$cate = Data::tree($cate,'cname');

        // sp($oldData);die;
        //3,所属类型
        $typeModel = new \Common\Model\Type;
        $typeData = $typeModel->get();
        // 分配变量到页面
        View::with('typeData',$typeData);
    	// 分配变量到页面并且载入模板
    	View::with('cate',$cate)->make();
    }
    /**
     * 删除分类
     */
    public function del(){
        // 更新缓存
        $this->model->updateCache();
    	// 接收get里面的cid
    	$cid = Q('get.cid',0,'intval');
    	// 1,在删除当前分类之前获得当前分类的pid
    	$data = $this->model->where("cid=$cid")->find();
    	$pid = $data['pid'];
    	// 2,找到要删除的当前分类所有的子集,然后更改他们的pid为要删除分类的pid
    	$this->model->where("pid=$cid")->update(array('pid'=>$pid));
    	// 3,删除分类
    	$this->model->where("cid=$cid")->delete();
    	// 删除成功提示
    	View::success('删除成功');
    }
}	

 ?>