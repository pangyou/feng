<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 类型属性控制器
 */
class TypeAttrController extends CommonController {
    private $model;
    public function __construct(){
        // 防止父级构造方法被覆盖
        parent::__construct();
        // 实例化类型模型
        $this->model = D('TypeAttr');
    }
    /**
     * 显示
     */
    public function index(){
        // 接收传过来的tid
        $tid = I('get.tid',0,'intval');
    	// 获取对应的类型属性表数据
    	$data = $this->model->where("type_tid={$tid}")->select();
    	// 分配变量到页面
    	$this->assign('data',$data);
    	// 载入模板
    	$this->display();
    }
    /**
     * 添加
     */
    public function add(){
        // 点击添加
    	if(IS_POST){
            // 验证通过
    		if($this->model->addData()){
                // 把数组转为json形式
                echo json_encode(
                    array(
                        'status'=>1,
                        'message'=>'添加成功'
                        )
                );exit;
            }//验证失败,输出错误
            // 把数组转为json形式
            echo json_encode(
                array(
                    'status'=>0,
                    'message'=>$this->model->getError()
                )
            );exit;
    	}
    	// 载入模板
    	$this->display();
    }
    /**
     * 编辑
     */
    public function edit(){
    	// 2,修改
    	if(IS_POST){
    		 // 验证通过
            if($this->model->editData()){
                // 把数组转为json形式
                echo json_encode(
                    array(
                        'status'=>1,
                        'message'=>'修改成功'
                        )
                );exit;
            }//验证失败,输出错误
            // 把数组转为json形式
            echo json_encode(
                array(
                    'status'=>0,
                    'message'=>$this->model->getError()
                )
            );exit;
    	}
    	// 1,获取旧数据
    	// 接收传过来的taid
    	$taid = I('get.taid',0,'intval');
    	// 查询对应的数据
    	$oldData = $this->model->where("taid={$taid}")->find();
    	// 分配变量到页面
    	$this->assign('oldData',$oldData);
    	// 载入模板
    	$this->display();
    }
    /**
     * 删除
     */
    public function del(){
    	// 接收传过来的taid
    	$taid = I('get.taid',0,'intval');
    	// 删除对应的数据
    	$this->model->where("taid={$taid}")->delete();
    	// 成功提示
    	$this->success('删除成功');
    }
}