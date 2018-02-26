<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 文章控制器
 */
class ArcController extends CommonController{
	private $model;
	// 构造方法
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 因为每个方法都要实例化Arc模型,所以在构造方法中实例化
		$this->model = new \Common\Model\Arc;

	}
	/**
	 * 文章显示
	 */
	public function index(){
		// 一,分页处理*****************
		// 统计总数 SELECT count(*) FROM....
		$total = Db::table('article')->join('category','category_cid','=','cid')->where('is_recycle=0')->count();
		// 执行分页
		$page = Page::row(5)->make($total);
		// 分配变量到页面
		View::with('page',$page);
		// 二,数据处理*****************
		// 1,获取文章表和分类表关联的数据
		// SELECT * FROM arcticle JOIN category ON category_cid=cid;
		$data =	Db::table('category')->join('article','category_cid','=','cid')->field('aid,title,cname,sendtime')->limit(Page::limit())->where('is_recycle=0')->get();
		// 分配变量到页面
		View::with('data',$data);
		// 载入显示页面
		View::make();
	}
	/**
	 * 文章添加
	 */
	public function add(){
		// 3,点击添加
		if(IS_POST){
			// 调用模型的添加方法
			if($this->model->addData()){
				// 验证通过,添加成功
				View::success('添加成功',U('index'));
			}
			// 如果验证不通过(如文章标题为空),就提示错误
			View::error($this->model->getError());
		}
		// 1,处理所属分类
		// 实例化分类模型
		$cateModel = new \Common\Model\Cate;
		// 获取分类表的数据,转化成树形
		$cateData = Data::tree($cateModel->get(),'cname');
		// 分配变量到页面
		View::with('cateData',$cateData);
		// 2,处理标签
		// 实例化标签模型
		$tagModel = new \Common\Model\Tag;
		// 获取标签表数据
		$tagData = $tagModel->get();
		// 分配变量到页面
		View::with('tagData',$tagData);
		// 载入添加页面
		View::make();
	}
	/**
	 * 文章编辑
	 */
	public function edit(){
		// 二,修改
		if(IS_POST){
			// 验证通过,提示修改成功,跳转回显示页面
			if($this->model->editData())View::success('修改成功',U('index'));
			// 验证不通过,提示错误
			View::error($this->model->getError());
		}
		// 1,处理所属分类
		// 实例化分类模型
		$cateModel = new \Common\Model\Cate;
		// 转化成树形
		$cateData = Data::tree($cateModel->get(),'cname');
		// 分配变量到页面
		View::with('cateData',$cateData);
		// 2,处理标签
		// 实例化标签模型
		$tagModel = new \Common\Model\Tag;
		// 获取标签表数据
		$tagData = $tagModel->get();
		// 分配变量到页面
		View::with('tagData',$tagData);
		// 3,获得旧数据
		// 接收get里面的aid
		$aid = Q('get.aid',0,'intval');
		// 获得文章表,文章内容表的旧数据
		$oldData = Db::table('article')->join('article_data','aid','=','article_aid')->where("aid=$aid")->get();
		View::with('oldData',$oldData[0]);
		// 4,获得当前文章选中了哪些标签
		// 实例化标签模型
		$arcTagModel = new \Common\Model\ArcTag;
		// 获得选中的标签tid
		// lists功能(返回一维数组，第一个字段做为键名使用，第 2 个字段做为键值)===========
		$tids = $arcTagModel->where("article_aid=$aid")->lists('tag_tid');
		// 如果用户没有选标签,那么给默认值为空数组,这样页面的in_array就不会报错了
		// Arc/edit.php页面中的in_array=========
		$tids = $tids ? $tids : array();
		// 分配变量到页面
		View::with('tids',$tids);
		// 载入修改页面
		View::make();
	}
	/**
	 * 文章删除进回收站
	 */
	public function del(){
		// 获得要删除的aid
		$aid = Q('get.aid',0,'intval');
		// 执行删除进回收站
		Db::table('article')->where("aid=$aid")->update(['is_recycle'=>'1']);
		// 成功提示
		View::success('删除成功',U('index'));
	}
	/**
	 * 文章还原
	 */
	public function reset(){
		// 获得要还原的aid
		$aid = Q('get.aid',0,'intval');
		// 执行还原操作
		Db::table('article')->where("aid=$aid")->update(['is_recycle'=>'0']);
		// 还原成功提示
		View::success('还原成功',U('show'));
	}
	/**
	 * 文章回收站显示
	 */
	public function show(){
		// 1,分页处理**********
		// 统计总数
		$total = Db::table('article')->join('category','category_cid','=','cid')->where('is_recycle=1')->count();
		// 执行分页
		$page = Page::row(2)->make($total);
		// 分配变量到页面
		View::with('page',$page);
		// 2,数据处理**************
		$data = Db::table('article')->join('category','category_cid','=','cid')->field('aid,title,cname,sendtime')->limit(Page::limit())->where('is_recycle=1')->get();
		// 分配变量到页面
		View::with('data',$data);
		// 载入回收站页面
		View::make();
	}
	/**
	 * 文章真正删除
	 */
	public function realDel(){
		// 1,接收get里面的aid
		$aid = Q('get.aid',0,'intval');
		// 2,删除,调用arc.php里面的自定义的del方法
		$this->model->del($aid);
		// 删除成功提示
		View::success('删除成功');
	}
}

 ?>