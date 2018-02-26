<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//内容页控制器
class ContentController extends CommonController{
    private $model;
    private $cateModel;
    private $GoodsListModel;
    private $goodsAttrModel;
    private $goodsModel;
    private $typeModel;
    // 构造方法
    public function __construct(){
        parent::__construct();
        // 实例化商品详细表
        $this->model = new \Common\Model\GoodsDetail;
        // 实例化分类表
        $this->cateModel = new \Common\Model\Cate;
        // 实例化货品列表
        $this->GoodsListModel = new \Common\Model\GoodsList;
        // 实例化商品属性表
        $this->goodsAttrModel = new \Common\Model\GoodsAttr;
        // 实例化商品表
        $this->goodsModel = new \Common\Model\Goods;
        // 实例化类型表
        $this->typeModel = new \Common\Model\TypeAttr;
    }
    /**
     * 显示内容页
     */
    public function index(){
        $gid = Q('get.gid',0,'intval');
        
        // 处理数据
        // 一,分类表数据
        // 导航条数据
        $cate = $this->cateModel->orderBy('csort','DESC')->limit(10)->where('pid=0')->get();
        View::with('cate',$cate);
        // 二，处理放大镜图片
        $data = $this->model
                    ->join('goods','goods_gid','=','gid')
                    ->where("goods_gid={$gid}")
                    ->find();
        // 把字符串转化为数组
        $data['img'] = explode(',', $data['img']);
        foreach ($data['img'] as $k => $v) {
            $sm = './Upload/Content/16/06/small'.basename($v);
            $md = './Upload/Content/16/06/mid'.basename($v);
            // 自动生成小图
            $data['imgs'][$k]['small'] = Image::thumb($v,$sm,60,60,6);
             // 自动生成中图
            $data['imgs'][$k]['mid'] = Image::thumb($v,$md,360,360,6);
            // 原图,(大图)
            $data['imgs'][$k]['big']=$v;
        }
        // 获取title的名字
        $name = $data['gname'];
        View::with('name',$name);
        // 分配变量到页面
        View::with('data',$data);
        // 三,处理颜色,选择规格,购买方式等
        // 1,获取类型属性表的数据
        // 查询对应的tid
        $tid = $this->goodsModel->where("gid={$gid}")->pluck('type_tid');
        // sp($tid);
        $typeData = $this->typeModel->where("class='规格' and type_tid={$tid}")->lists('taname');
        // 2,获取商品属性表的数据
        // 查询对应的taid
        $taids = $this->typeModel->where("type_tid={$tid} and class='规格'")->lists('taid');
        // sp($taids);die;
        foreach ($taids as $k => $v) {
            // 颜色数据和尺寸名字压入$k,对应的值压入$v
            $spec[] = array(
                'value'=>$this->goodsAttrModel
                        ->where("goods_gid={$gid} and type_attr_taid={$taids[$k]}")
                        ->lists('gaid,gavalue'),
                'name'=>$typeData[$k]
                );
        }
        // sp($spec);die;
        //********************************有bug 待完善************************
        // foreach ($spec as $k => $v) {
        //     foreach ($v as $kk => $vv) {
        //          $spec['颜色']['imgs'] = $data['imgs'];
        //     }
        // }
        View::with('spec',$spec);
        // sp($_SESSION);
        // sp($spec);die;
        // 商品价格
        $sprice = strstr($data['sprice'],'.',true);
        // 分配变量到页面
        View::with('sprice',$sprice);
        // 四,缓存数据(看了又看)
        $look = $this->goodsModel->getWhere(39,4);
        View::with('look',$look);
        // 五,看了最终买 数据
        $buy = $this->goodsModel->getWhere(43,4);
        View::with('buy',$buy);
        // 手机排行
        $top = $this->goodsModel->getWhere(47,6);
        View::with('top',$top);
        // 猜你喜欢数据
        $like = $this->goodsModel->getWhere(53,5);
        View::with('like',$like);

        // 相关分类
        $related = $this->cateModel->where("pid=13")->lists('cid,cname');
        View::with('related',$related);
        // sp($related);die;
        // 相关品牌
        $brandModel = new \Common\Model\Brand;
        $brand = $brandModel->lists('bid,bname');
        // sp($brand);
        View::with('brand',$brand);
    	// 载入模板
    	View::make();
    }
    /**
     * 添加到购物车
     */
    public function cartAdd(){
        if(Q('post.combine') == ''){
            View::error('颜色,选择规格 等不能为空');
        }
        // 接收post提交的gid
        $gid = Q('post.gid',0,'intval');
        // sp($_POST);die;
        // 查询商品表对应的商品数据
        $goods = $this->goodsModel->where("gid={$gid}")->find();
        // 接收post提交的combine(组合字段)
        $combine = Q('post.combine');
        // 去掉最左边的,
        $combine = rtrim($combine,',');
        // 图片转化为数组
        $img = explode(',', $goods['pic_list']);
        // 通过组合字段查询商品属性表中对应的值 (白色, S)
        $GoodsAttr = $this->goodsAttrModel->where("gaid in($combine)")->lists('gavalue');
        // 商品的数量
        $num = Q('post.inputNum');
        // 商品改变后的价格
        $sprice = Q('post.sprice');
        // sp($GoodsAttr);
        $data = array(
            'id'        => $gid, // 商品 ID 
            'name'      => $goods['gname'],// 商品名称 
            'num'       => $num, // 商品数量 
            'price'     => $sprice, // 商品价格 
            'pic'       => $img[0],//商品图册
            'options' => $GoodsAttr,// 其他参数如价格、颜色、可以为数组或字符串 

        );
        // 调用框架方法,添加商品到购物车 
        Cart::add($data);
        // sp($_SESSION);
        // 载入页面
        View::make();
    }
    /**
     * 购物车显示
     */
    public function cartshow(){
        // 处理数据
        if ($_SESSION) {
            $data = $_SESSION['cart']['goods'];
            // 为了防止报错
            $data = $data ? $data : array();
            // 分配变量到页面
            View::with('data',$data);
        }else{
            $data = array();
            // 分配变量到页面
            View::with('data',$data);
        }  
        // 载入购物车显示页面
        View::make();
    }
    /**
     * 清空购物车
     */
    public function cartOut(){
        // 清空购物车
        // 删除session
        unset($_SESSION['cart']);
        // 销毁session
        go(U('cartshow'));
    }
    /**
     * 删除单个购物车商品
     */
    public function cartDel(){
        // 接收get传过来的sid
        $sid = Q('get.sid');
        // 调用框架删除方法
        Cart::del($sid);
        // 删除直接刷新页面
        go(U('cartshow'));
    }
    /**
     * 异步点击加改变价格
     */
    public function addp(){
        // 获取到sid
        $sid = $_POST['sidnum']['sid'];
        // 获取到数量
        $num = $_POST['sidnum']['num'];
        $num = $num +1;
        if($num>99)$num=99;
        // 组合数据
        $data = array(
            'sid'=>$sid,
            'num'=>$num
        );
         // 调用框架更新购物车方法
        Cart::update($data);
        // 把更新后的数据返回去
        $this->ajax($data);
    }
    /**
     * 异步点击减改变价格
     */
    public function addpre(){
        // 获取到sid
        $sid = $_POST['sidnum']['sid'];
        // 获取到数量
        $num = $_POST['sidnum']['num'];
        $num = $num -1;
        if($num<1)$num=1;
        // 组合数据
        $data = array(
            'sid'=>$sid,
            'num'=>$num
        );
         // 调用框架更新购物车方法
        Cart::update($data);
        // 把更新后的数据返回去
        $this->ajax($data);
    }
    /**
     * 点击结算后的页面
     */
    public function cartSub(){
        if(!isset($_SESSION['aid']))View::success('请先登录',U('Login/index'));
        // 接收get传过来的sid
        $sid = Q('post.sid');
       // 处理数据
        foreach ($sid as $k => $v) {
            // 只要选中的数据
            $data[$v] = $_SESSION['cart']['goods'][$v];
        }
        // 总价格, 总数量
        $price = '';
        $num = '';
        foreach ($data as $k => $v) {
            $price += $v['total'];
            $num += $v['num'];
        }
        // 分配变量到页面
        View::with('price',$price);
        View::with('num',$num);
        // 分配变量到页面
        View::with('data',$data);
        // $aid = $_SESSION['aid'];
        // 查询aid对应的个人信息(地址等)
        // $orderModel = new \Common\Model\Orders;
        // $adress = $orderModel->where("user_uid={$aid}")->find();
        // View::with('adress',$adress);
        // 载入模板
        View::make();
    }
    /**
     * 异步接收发送过来的组合字段,处理后发送回去
     */
    public function check(){
        // 接收异步发送过来的数据
        $comb = Q('post.comb');
        $combine = $comb['comb'];
        // 处理组合字段 去掉最后一个,
        $combine = trim($combine,',');
        // 转化为数组
        $combine = explode(',', $combine);
        foreach ($combine as $k => $v) {
            // 查询对应的附加价格
            $added['son'][] = $this->goodsAttrModel->where("gaid={$v}")->pluck('added');
            // 获得对应的颜色等数据
            $added['name'][] = $this->goodsAttrModel->where("gaid={$v}")->pluck('gavalue');
        }
        // 定义一个空字符串,接收 组合后的总增加钱数
        $str = '';
        foreach ($added['son'] as $v) {
            // 把价格总数存入str字符串
            $str+=$v;
        }
        $newstr = '';
        // 把对应的颜色等数据存入
        foreach ($added['name'] as $vv) {
           $newstr .= '"'.$vv . '"&nbsp;&nbsp;';
        }
        // 把数据压入数组中
        $arr['son'] = $str;
        $arr['name'] = $newstr;
        // 把增加钱数返回给页面
        $this->ajax($arr);
    }
}