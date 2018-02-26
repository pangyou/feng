<?php namespace Admin\Controller;
use Think\Controller;
/**
 * 分类控制器
 */
class CateController extends CommonController {
    private $model;
    private $typeModel;
    public function __construct(){
        // 防止父级构造方法被覆盖
        parent::__construct();
        // 实例化类型模型
        $this->model = D('Cate');
        $this->typeModel = D('Type');
    }
    /**
     * 显示
     */
    public function index(){
         // 点击排序
        if(IS_POST){
            foreach ($_POST as $k => $v) {
                $this->model->where("cid={$k}")->save(array('csort'=>$v));
            }
        }
        // 获取所有分类表数据
        $data = $this->model->order("csort",'DESC')->select();
         // 让数据呈现树状形式---扩展的方法
        $Data = new \Org\Util\Data;
        $treeData = $Data->tree($data,'cname');
        // 分配变量到页面
        $this->assign('data',$treeData);
        // 载入模板
        $this->display();
    }
     /**
     * 添加
     */
    public function add(){
        // 2,点击添加
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
         // 1,获取所有的类型数据
        $type = $this->typeModel->select();
        // 分配变量到页面
        $this->assign('type',$type);
        // 载入模板
        $this->display();
    }
    /**
    * 添加子分类
    */
    public function addSon(){
        // 2,添加
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
        $type = $this->typeModel->select();
        // 分配变量到页面
        $this->assign('type',$type);
        // 接收get里面的cid,默认值为0,强制转整
        $cid = I('get.cid',0,'intval');
        // 这个方法快?
        // $data = $this->model->where("cid={$cid}")->getField('cid,cname');
        // find必须放在最后,查询一条记录
        $data = $this->model->where("cid={$cid}")->find();
        // 分配变量到页面并且载入模板
        $this->assign('data',$data)->display();
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
        // 默认值为0,强制转整
        $cid = I('get.cid',0,'intval');
        // find只寻找一条数据是一维数组,get寻找多个数据是二维数组  
        $oldData = $this->model->where("cid={$cid}")->find();
        // 分配变量到页面
        $this->assign('oldData',$oldData);
        // 2,获得所属分类(父级分类不能是自己和自己的子集)
        $cate = $this->model->getNoMy($cid);
         // 让数据呈现树状形式---扩展的方法
        $Data = new \Org\Util\Data;
        $cate = $Data->tree($cate,'cname');
        //3,所属类型
        $typeData = $this->typeModel->select();
        // 分配变量到页面
        $this->assign('typeData',$typeData);
        // 分配变量到页面并且载入模板
        $this->assign('cate',$cate)->display();
    }
    /**
     * 删除
     */
    public function del(){
        // 接收传过来的cid
        $cid = I('get.cid',0,'intval');
        // 1,在删除当前分类之前获得当前分类的pid
        $data = $this->model->where("cid={$cid}")->find();
        $pid = $data['pid'];
        // 2,找到要删除的当前分类所有的子集,然后更改他们的pid为要删除分类的pid
        $this->model->where("pid=${cid}")->save(array('pid'=>$pid));
        // 3,删除对应的数据
        $this->model->where("cid={$cid}")->delete();
        // 成功提示
        $this->success('删除成功');
    }
}