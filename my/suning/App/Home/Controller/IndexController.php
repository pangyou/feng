<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//前台首页控制器
class IndexController extends CommonController{
    private $model;
    private $cateModel;
    private $typeModel;
    private $goodsDetail;
    // 构造方法
    public function __construct(){
        parent::__construct();
        // 实例化商品表
        $this->model = new \Common\Model\Goods;
        // 实例化分类表
        $this->cateModel = new \Common\Model\Cate;
        // 实例化类型表
        $this->typeModel = new \Common\Model\Type;
        // 实例化商品详细表
        $this->goodsDetail = new \Common\Model\GoodsDetail;

    }
    //默认首页
    public function index(){
        // sp($_SESSION);
		// 处理数据
        // 左侧菜单以及隐藏菜单=============处理数据=====自己的写法
        // $cate = $this->cateModel->where("pid=0")->get();
        // foreach ($cate as $k => $v) {
        //     // 每次截取两条数据
        //     $limit = $this->cateModel->where('pid=0')->limit($k*2,2)->get();
        //     // 如果数据存在就压入空数组
        //     if($limit){
        //         $data[] = $limit;
        //     }
        // }
        // // sp($data);
        // foreach ($data as $k => $v) {
        //     foreach ($v as $key => $value) {
        //         // 查询一级分类的cid
        //         $cid = $value['cid'];
        //         // 获得分类的子集对应的数据
        //         $catetwo = $this->cateModel->where("pid={$cid}")->get();
        //         // 压入原数组
        //         $data[$k][$key]['fa'] = $catetwo;
        //     }
        // }
        // foreach ($data as $k => $v) {
        //     foreach ($v as $kk => $vv) {
        //         foreach ($vv['fa'] as $key => $value) {
        //             // 查询二级分类的cid
        //             $cid = $value['cid'];
        //             // 获得对应三级分类的数据
        //             $cateth = $this->cateModel->where("pid={$cid}")->get();
        //             // 压入原数组
        //             $data[$k][$kk]['fa'][$key]['son'] = $cateth;
        //         }
        //     }
        // }
        // 获取数据(二级菜单)
        $cate = $this->cateModel->getAll();
         // 框架方法组合成的数组,
        $cate=Data::channelLevel($cate);
        // 分配变量到页面
        View::with('cate',$cate);
        // 获取logo数据
        // 实例化品牌表
        $brandModel = new \Common\Model\Brand;
        // 获取品牌表缓存数据
        $brand = $brandModel->getWhere(2,19);
        // 分配变量到页面
        View::with('brand',$brand);
        // 猜你喜欢数据
        // 随机调取6个商品
        $like = $this->model->getMany(array(2,11,12,24,25,26));
        View::with('like',$like);
        // 服装1F数据(调取八个商品)(因为数据库中少了两条数据,所以从25开始截取)
        $clothes = $this->model->getWhere(25,8);
        View::with('clothes',$clothes);
        // 调取分类表对应的数据(1F左侧数据)
        $cate1 = $this->cateModel->getWhere(86,8);
        $cate2 = $this->cateModel->getWhere(94,8);
        View::with('cate1',$cate1);
        View::with('cate2',$cate2);
       // 2F商品获取八个商品数据
        $phone = $this->model->getMany(array(13,14,15,16,17,18,19,20));
        // 调取分类表对应的数据(2F左侧数据)
        $catefta = $this->cateModel->getWhere(15,8);
        $cateftb = $this->cateModel->getWhere(36,8);
        View::with('catefta',$catefta);
        View::with('cateftb',$cateftb);
        View::with('phone',$phone);
       // 调取潮流新品推荐
        $goodsc = $this->model->getWhere(80,5);
        View::with('goodsc',$goodsc);
    	// 载入首页
        View::make();
		
    }
    /**
     * 调取验证码
     */
    public function code(){
    // 获取self文件里面的codelen的值
    $num = Config::get('self.codelen');
    //显示验证码
    Code::num($num)->make();
    }
}
