<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//前台控制器
class IndexController extends Controller{
    //默认首页
    public function index(){
        // 一,分页处理*****************
        // 统计总数 SELECT count(*) FROM....
        $total = Db::table('article')->join('category','category_cid','=','cid')->where('is_recycle=0')->count();
        // 执行分页
        $page = Page::row(10)->make($total);
        // 分配变量到页面
        View::with('page',$page);
        // 二,数据处理*****************
        // 1,获取文章表和分类表关联的数据
        // SELECT * FROM arcticle JOIN category ON category_cid=cid;
        
        // 显示最新的5篇文章
        $arcData = Db::table('category')
                    ->join('article','category_cid','=','cid')
                    ->orderBy('sendtime','DESC')
                    ->limit(Page::limit())
                    ->where('is_recycle=0')
                    ->get();
					
        // 实例化标签模型
        $tagModel = new \Common\Model\Tag;
        // 调用模型获取标签的方法给原有的文章数据组合上标签
        $arcData = $tagModel->getTag($arcData);
        // 分配变量到页面
        View::with('arcData',$arcData);
        // 载入模板
        View::make();
    }
    public function code(){
        // 获取self文件里面的codelen的值
        $num = Config::get('self.codelen');
        //显示验证码
        Code::num($num)->make();
    }
}
