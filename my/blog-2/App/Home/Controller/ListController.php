<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
/**
 * 列表也控制器
 */
class ListController extends Controller{
	// 首页
	public function index(){
		// 1,获得分类或者是标签的名称
		// 获得点击的哪个分类的cid
		$cid = Q('get.cid',0,'intval');
		// 获得点击的哪个标签的tid
		$tid = Q('get.tid',0,'intval');
		// 实例化标签模型
		$tagModel = new \Common\Model\Tag;
		if($cid){
			// 实例化分类模型
			$cateModel = new \Common\Model\Cate;
			// 名称
			$name = '分类';
			// 值****************
			// pluck,直接取cid为$cid,并且键名是cname的值,取得的值是  字符串
			// get,和find都是取得的值都是   数组
			$value = $cateModel->where("cid={$cid}")->pluck('cname');
			// 下面有多少文章==================
			// (1)获得当前分类的所有子分类的cid
			$cids = $cateModel->getSon($cateModel->get(),$cid);
			// 把自己压进去
			$cids[] = $cid;
			// 转化为字符串形式
			$cids = implode(',',$cids);
			// (2)统计总数
			// 实例化文章模型
			$arcModel = new \Common\Model\Arc;
			// category_cid IN(20,21,22)
			// 获得总数
			$count = $arcModel->where("category_cid IN({$cids})")->count();
			// 获得文章数据
			$data = Db::table('article')->join('category','category_cid','=','cid')->where("category_cid IN({$cids})")->get();
			// 获得压入标签后的文章数据
			$data = $tagModel->getTag($data);
		}
		if($tid){
			// 名称
			$name = '标签';
			// 值
			$value = $tagModel->where("tid={$tid}")->pluck('tname');
			// 下面有多少文章
			// 实例化(文章,标签)中间表模型
			$arcTagModel = new \Common\Model\ArcTag;
			// 获得对应标签的总数
			$count = $arcTagModel->where("tag_tid={$tid}")->count();
			// 文章数据
			$data = Db::table('article_tag')
				->join('article','aid','=','article_aid')
				->join('category','category_cid','=','cid')
				->where("tag_tid={$tid}")
				->get();
			// 获得压入标签后的文章数据
			$data = $tagModel->getTag($data);
		}
		// 分配变量到页面
		View::with('name',$name);
		View::with('value',$value);
		View::with('count',$count);
		View::with('data',$data);
		// 载入页面
		View::make();
	}
}