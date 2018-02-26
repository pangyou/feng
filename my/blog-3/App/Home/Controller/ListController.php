<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
/**
 * 列表也控制器
 */
class ListController extends Controller{
	// 首页
	public function index(){
		// 实例化标签模型
		$tagModel = new \Common\Model\Tag;
		// 实例化分类模型
		$cateModel = new \Common\Model\Cate;
		// 实例化文章模型
		$arcModel = new \Common\Model\Arc;
		// 1,获得分类或者是标签的名称
		// 获得点击的哪个分类的cid
		$cid = Q('get.cid',0,'intval');
		
		$arcData = $arcModel->join('category','category_cid','=','cid')->where("cid={$cid}")->get();
		// sp($arcData);
		// 获取分类的数据
		$cdata = $cateModel->where("cid={$cid}")->get();
		// 分配变量到页面
		View::with('cdata',$cdata[0]);
		View::with('arcData',$arcData);
		// 载入页面
		View::make();
	}
}