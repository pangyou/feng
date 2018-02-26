<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//列表页控制器
class GoodsListController extends CommonController{
    private $model;
    private $cateModel;
    private $brand;
    // 构造方法
    public function __construct(){
        // 防止父级构造方法被覆盖
        parent::__construct();
        // 实例化商品表
        $this->model = new \Common\Model\Goods;
        // 实例化分类表
        $this->cateModel = new \Common\Model\Cate;
        // 实例化品牌表
        $this->brand = new \Common\Model\Brand;
    }
    /**
     * 显示列表页(通过分类进入)
     */
    public function index(){
        // 一,============处理数据======================
        // 1,获取列表图数据(商品数据)
        $cid = Q('get.cid',0,'intval');
        // 获取分类的名字
        $name = $this->cateModel->where("cid={$cid}")->pluck('cname');
        View::with('name',$name);
        // 为了获得该分类及该分类的子集的数据
        $listImg = $this->cateModel->get();
        // sp($listImg);
        // 获得所有子集cid
        $cids = $this->cateModel->getSon($listImg,$cid);
        // 把自己压入
        $cids[] = $cid;
        // 转化为字符串
        $cids = implode(',', $cids);
        // 查询对应的所有的商品数据(cid为自己和自己的所有子集的商品)
        $goods = $this->model->where("category_cid in({$cids})")->get();
        foreach ($goods as $k => $v) {
            // 把列表图转化为数组
            $goods[$k]['pic_list'] = explode(',', $v['pic_list']);
        }
        // 分配变量到页面
        View::with('goods',$goods);
        // 2,今日推荐数据(用缓存)
        $vivo = $this->model->getMany(array(16,17,18,19,20));
        View::with('vivo',$vivo);
        // 3,热门推荐数据
        $hot = $this->model->getWhere(24,5);
        View::with('hot',$hot);
        // 4,品牌数据(用缓存)
        $brand = $this->brand->getMany(array(1,20,21,22,23,24,25,26,30,31,32,33));
        View::with('brand',$brand);
        // 二,====================筛选数据=======================
        // a,显示筛选的属性
        // 1,获取当前分类的子分类的cid(上面已有)
        // 2,通过cid找到gid
        $gids = $this->model
                ->where("category_cid in({$cids})")
                ->lists('gid');
        // ************************************(找不到商品在页面提示)
        // 3,通过gid找到商品属性
        // 实例化商品属性表
        $goodsAttrModel = new \Common\Model\GoodsAttr;
        // 防止报错**************************(没有商品的时候)
        if($gids){
            $goodsAttr = $goodsAttrModel
                    ->where("goods_gid in(". implode(',', $gids) .")")
                    ->groupBy('gavalue')
                    ->get();

            foreach ($goodsAttr as $k => $v) {
                if($v['gavalue'] != 0){
                    $goodsAttr[$k] = $v;
                }
            }

             // 把taid作为键名
            $sameTemp = array();
            foreach ($goodsAttr as $v) {
                 $sameTemp[$v['type_attr_taid']][] = $v;    
            }   
            // 重组数组为array('name'=>'名称','value'=>'名称对应的值') 
            $attr = array();
            // 实例化类型属性表
            $typeAttrModel = new \Common\Model\TypeAttr;
            // 获取taid对应的名称
            foreach ($sameTemp as $k =>$v) {
                $attr[] = array(
                    'name'=>$typeAttrModel->where("taid={$k}")->pluck('taname'),
                    'value'=>$v
                );
            }
            // 分配变量到页面
            View::with('attr',$attr);
            // b,===================根据属性筛选商品========================
            // 1,获得显示数量
            $num = count($attr);
            //0_0_0_0_0_0_0_0_0_0_0_0_0
            // 2,处理get传的参数param
            // array_fill 从第0 个开始,填充 $num个  0
            // 防止报错用isset
            $param = isset($_GET['param']) ? explode('_', $_GET['param']) : array_fill(0, $num, 0);
            // 分配变量到页面
            View::with('param',$param);
            //3.根据param参数进行筛选(最后获得的商品gids)
            //第一个参数是为了根据param参数进行筛选,第二个参数是为了确保是当前分类下的gid
            $finalGids = $this->filter($param,$gids);
            View::with('finalGids',$finalGids);
            // 防止报错*********************************(如果搜索不到商品,在页面判断)
            if($finalGids){
                // 转化为字符串
                $finalGids = implode(',', $finalGids);
                // 查询筛选的商品
                if($param){
                    //查询对应的商品
                    $goods = $this->model->where("gid in({$finalGids})")->get();
                    foreach ($goods as $k => $v) {
                        // 把列表图转化为数组
                        $goods[$k]['pic_list'] = explode(',', $v['pic_list']);
                    }
                    // 分配变量到页面
                    View::with('goods',$goods);
                }
            }
        }else{
            $attr = array();
            View::with('attr',$attr);
            $finalGids = array();
            View::with('finalGids',$finalGids);
        }
        // 载入模板
    	View::make();
    }
    /**
     * 显示 品牌点击后的数据
     */
    public function bidshow(){
        // 1,品牌数据
        $bid = Q('get.bid');
        // 获取品牌对应的gid
        $gids = $this->model->where("brand_bid={$bid}")->lists('gid');
         // 获取品牌的名字
        $name = $this->brand->where("bid={$bid}")->pluck('bname');
        View::with('name',$name);
        $goods = $this->model->where("brand_bid={$bid}")->get();
        foreach ($goods as $k => $v) {
            // 把列表图转化为数组
            $goods[$k]['pic_list'] = explode(',', $v['pic_list']);
        }
        View::with('goods',$goods);
         // 2今日推荐数据(用缓存)
        $vivo = $this->model->getMany(array(16,17,18,19,20));
        View::with('vivo',$vivo);
        // 3,热门推荐数据
        $hot = $this->model->getWhere(24,5);
        View::with('hot',$hot);
        // 4,品牌数据(用缓存)
        $brand = $this->brand->getMany(array(1,20,21,22,23,24,25,26,30,31,32,33));
        View::with('brand',$brand);
        // 筛选数据*******************
        // 防止报错**************************(没有商品的时候)
        $goodsAttrModel = new \Common\Model\GoodsAttr;
        if($gids){
            $goodsAttr = $goodsAttrModel
                    ->where("goods_gid in(". implode(',', $gids) .")")
                    ->groupBy('gavalue')
                    ->get();
            foreach ($goodsAttr as $k => $v) {
                if($v['gavalue'] != 0){
                    $goodsAttr[$k] = $v;
                }
            }
             // 把taid作为键名
            $sameTemp = array();
            foreach ($goodsAttr as $v) {
                 $sameTemp[$v['type_attr_taid']][] = $v;    
            }     
            // 重组数组为array('name'=>'名称','value'=>'名称对应的值') 
            $attr = array();
            // 实例化类型属性表
            $typeAttrModel = new \Common\Model\TypeAttr;
            // 获取taid对应的名称
            foreach ($sameTemp as $k =>$v) {
                $attr[] = array(
                    'name'=>$typeAttrModel->where("taid={$k}")->pluck('taname'),
                    'value'=>$v
                );
            }
            // 分配变量到页面
            View::with('attr',$attr);
            // b,===================根据属性筛选商品========================
            // 1,获得显示数量
            $num = count($attr);
            //0_0_0_0_0_0_0_0_0_0_0_0_0
            // 2,处理get传的参数param
            // array_fill 从第0 个开始,填充 $num个  0
            // 防止报错用isset
            $param = isset($_GET['param']) ? explode('_', $_GET['param']) : array_fill(0, $num, 0);
            // 分配变量到页面
            View::with('param',$param);
            //3.根据param参数进行筛选(最后获得的商品gids)
            //第一个参数是为了根据param参数进行筛选,第二个参数是为了确保是当前分类下的gid
            $finalGids = $this->filter($param,$gids);
            View::with('finalGids',$finalGids);
            // 防止报错*********************************(如果搜索不到商品,在页面判断)
            if($finalGids){
                // 转化为字符串
                $finalGids = implode(',', $finalGids);
                // 查询筛选的商品
                if($param){
                    //查询对应的商品
                    $goods = $this->model->where("gid in({$finalGids})")->get();
                    foreach ($goods as $k => $v) {
                        // 把列表图转化为数组
                        $goods[$k]['pic_list'] = explode(',', $v['pic_list']);
                    }
                    // 分配变量到页面
                    View::with('goods',$goods);
                }
            }
        }else{
            $attr = array();
            View::with('attr',$attr);
            $finalGids = array();
            View::with('finalGids',$finalGids);
        }

        // 载入品牌页面
        View::make();
    }
    /**
     * 筛选
     * 第一个参数$param是根据get的值进行筛选
     * 第二个参数$cidGids是通过 cid 找到的gids
     */
    public function filter($param,$cidGids){
        // 用来接收gids
        $gids = array();
        // 实例化商品属性表
        $goodsAttrModel = new \Common\Model\GoodsAttr;
        // 循环param参数
        foreach ($param as $gaid) {
            // 如果不为0,也就是不是 '不限'的时候
            if($gaid){
                // 拿到属性的值
                $gavalue = $goodsAttrModel->where("gaid={$gaid}")->pluck('gavalue');
                $gids[] = $goodsAttrModel->where("gavalue='{$gavalue}'")->lists('goods_gid');
            }
        }
        // 如果gids存在,防止报错
        if($gids){
            // 取交集
            $temp = $gids[0];
            // 第一次时,(第0个)自己和自己交集(结果还是自己,再赋值回去)
            // 第二次时,0 和1 交集,结果赋值给temp,
            // 第三次时,0和1的结果,和2交集...
            foreach ($gids as $v) {
                $temp = array_intersect($temp, $v);
            }
            // 确保是当前分类的cid
            $finalGids =array_intersect($temp, $cidGids);
        }else{//全部是  '不限' 的时候
            $finalGids = $cidGids;
        }
        // 最后的结果返出去
        return $finalGids;
    }
}