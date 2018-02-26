<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 类型控制器
 */
class TypeController extends CommonController {
    private $model;
    private $TypeAttr;
    public function __construct(){
        // 防止父级构造方法被覆盖
        parent::__construct();
        // 实例化类型模型
        $this->model = D('Type');
        // 实例化类型属性模型
        $this->TypeAttr = D('TypeAttr');
    }
    public function index(){
        // 查询数据库中的所有数据
        $data = $this->model->select();
        // 分配变量到页面,并且载入模板
        $this->assign('data',$data);
        $this->display();
    }
    /**
     * 添加类型
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
            // 验证通过,修改成功提示
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
        $tid = I('get.tid',0,'intval');
        $oldData = $this->model->where("tid={$tid}")->find();
        // 分配变量到页面
        $this->assign('oldData',$oldData);
    	// 载入模板
    	$this->display();
    }
    /**
     * 删除
     */
    public function del(){
        // 接收get传过来的tid
        $tid = I('get.tid',0,'intval');
        // 执行删除方法
        // 删除类型表
        $this->model->where("tid={$tid}")->delete();
        // 删除类型属性表
        $this->TypeAttr->where("type_tid={$tid}")->delete();
        // 删除成功提示
        $this->success('删除成功');
    }
}