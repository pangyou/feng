<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
/**
 * 内容控制器
 */
class ContentController extends Controller{
	public function index(){
		// 实例化标签模型
		$tagModel = new \Common\Model\Tag;
		// 实例化分类模型
		$cateModel = new \Common\Model\Cate;
		// 实例化文章模型
		$arcModel = new \Common\Model\Arc;
		// 获取要查看哪个文章的aid
		$aid = Q('get.aid',0,'intval');
		$cid = Q('get.cid',0,'intval');
		// 获取文章表和内容表关联,再和分类表关联后的数据
		// Db::table只能用get()********************
		$data = Db::table('article')
				->join('article_data','article_aid','=','aid')
                ->join('category','category_cid','=','cid')
				->where("aid={$aid}")
				->get();
		// 调取tag模型中的getTag方法,把标签数据压入然后获得包括标签的新数组
		$data = $tagModel->getTag($data);
		// 获取分类数据
		$cdata = $data[0];
		// 分配变量到页面
		View::with('cdata',$cdata);
		// sp($data);
		// 分配变量到页面,并载入显示模板
		View::with('data',$data[0])->make();
	}
}




 ?>