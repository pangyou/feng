<?php namespace Common\Model;
use Think\Model;
/**
  *  品牌表模型
  */
class BrandModel extends Model{
    //	指定表
    protected $tableName='brand';
    	//	自动验证
    protected $_validate = array(
      	// 分别表示,字段名,规则,错误提示,验证条件,附加规则,必须验证3(验证时间)
         array('bname','require','分类名字不能为空!',3,'',3), 
     );
    // 自动完成
    protected $_auto = array(
      // 调用当前类的up方法处理上传
      // 字段名,自定义方法up,方法,必须验证,不管修改还是插入都要验证,  回调
      array('logo','up',3,'callback'),
    );
    /**
     * 添加
     */
    public function addData(){
        // 验证不通过,返回假
        if(!$this->create()) return false;
        // 执行添加,并且返回真
        return $this->add();
    }
    /**
     * 修改
     */
    public function editData(){
        // 验证不通过,返回假
        if(!$this->create()) return false;
        // 如果不想加where条件就能修改,必须在页面放主键的隐藏域,
        $this->save();
        // 验证通过,返回真
        return true;
    }
    /**
      * logo上传方法
      */ 
    public function up(){
        // 这步很重要!!!!!!!!=======
        // 如果有隐藏域,证明是修改,直接返回原地址
        if($logo = I('post.logo')) return $logo;
        // 实例化上传类
        $upload = new \Think\Upload();
        $upload->maxSize = 2000000;//最大上传大小
        $upload->exts = array('jpg','png','jpeg','gif','bmp');//设置上传类型
        $upload->rootPath = "Upload/images/";//设置上传目录
        // 调用框架上传方法
        $info = $upload->upload();
        if($info){//上传成功,获取上传文件信息
            // 此处return 的值会存入logo字段
            $path = '/tpzol/' . $upload->rootPath . $info['logo']['savepath'] . $info['logo']['savename'];
            return $path;
        }else{// 如果用户有上传,但是上传失败,
          // 用户不上传就不压错误,因为允许用户不上传
           if($_FILES['logo']['error'] != 4){
             // 这个时候把上传的错误压入到模型的error属性里面,这样外面控制器的getError方法就可以调取到错误
                $this->error = $upload->getError();
            }
        }
        // 返回空字符串给logo字段,防止报错
        return '';
    }
}