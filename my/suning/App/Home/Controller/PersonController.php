<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//个人中心控制器
class PersonController extends CommonController{
	private $model;
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		// 实例化订单表
		$this->model = new \Common\Model\Orders;
	}
	public function index(){
		// 载入个人中心首页
		View::make();
	}
	/**
	 * 订单中心页面
	 */
	public function orders(){
		// 是否是登录状态,判断是哪个用户登录后的订单表
		$uid = isset($_SESSION['aid']) ? $_SESSION['aid'] : 0;
		// 分页处理
		// 统计总数 SELECT count(*) FROM....
		$total = $this->model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0'")
				->count();
		// 执行分页
		$page = Page::row(6)->make($total);
		// 分配变量到页面
		View::with('page',$page);
		// 查询对应的订单表数据(为了拿到图片,关联订单列表)
		$data = $this->model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0'")
				->orderBy('otime','DESC')
				->limit(Page::limit())
				->get();
		// 分配变量到页面
		View::with('data',$data);
		// 载入页面
		View::make();
	}
	// 显示回收站订单
	public function recycleShow(){
		// 是否是登录状态,判断是哪个用户登录后的订单表
		$uid = isset($_SESSION['aid']) ? $_SESSION['aid'] : 0;
		// 查询对应的订单表数据(为了拿到图片,关联订单列表)
		$data = $this->model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='1'")
				->get();
		// 分配变量到页面
		View::with('data',$data);
		// 载入页面
		View::make();
	}
	/**
	 * 删除订单到回收站
	 */
	public function recycle(){
		$olid = Q('get.olid');
		// 实例化订单列表
		$orderListModel = new \Common\Model\OrderList;
		$orderListModel->where("olid={$olid}")->update(array('is_recycle'=>'1'));
		go(U('orders'));
	}
	/**
	 * 还原订单
	 */
	public function rest(){
		$olid = Q('get.olid');
		// 实例化订单列表
		$orderListModel = new \Common\Model\OrderList;
		$orderListModel->where("olid={$olid}")->update(array('is_recycle'=>'0'));
		go(U('orders'));
	}
	/**
	 * 真正删除订单
	 */
	public function del(){
		$olid = Q('get.olid');
		$orderListModel = new \Common\Model\OrderList;
		// 删除
		$orderListModel->where("olid={$olid}")->delete();
		go(U('orders'));

	}
	/**
	 * 付款
	 */
	public function payMoney(){
		$olid = Q('get.olid');
		 // 修改订单状态
        $data = array('nstate'=>'已付款');
        $orderListModel = new \Common\Model\OrderList;
        // 修改
        $orderListModel->where("olid={$olid}")->update($data);
        View::success("付款成功",U('Person/orders'));
	}
	/**
	 * 确认收货
	 */
	public function confirm(){
		$olid = Q('get.olid');
		 // 修改订单状态
        $data = array('nstate'=>'已完成');
        $orderListModel = new \Common\Model\OrderList;
        // 修改
        $orderListModel->where("olid={$olid}")->update($data);
        View::success("收货成功");
	}
	/**
	 * 收货地址
	 */
	public function adress(){
		// 载入页面
		View::make();
	}
	/**
	 * 个人信息
	 */
	public function person(){
		// 未写完,待更新
		if(IS_POST){
			if($this->model->addPerson())View::success('添加成功');
			View::error('添加失败');
		}
		// 个人数据
		$userModel = new \Common\Model\User;
		if(isset($_SESSION['aid'])){
			$aid = $_SESSION['aid'];
			$data = $userModel->where("aid={$aid}")->find();
			View::with('data',$data);
		}else{
			$data = array();
			View::with('data',$data);
		}
		
		View::make();
	}
	/**
	 * 验证码调用
	 */
	public function code(){
		//显示验证码
        // 设置宽高,字体大小
        Code::width(64)->height(26)->fontSize(16);
        Code::make();
	}
	/**
	 * 处理异步发过来的数据
	 */
	public function check(){
		// 验证码
		$code = Q('post.code');
		// 转为小写
		$code = strtolower($code);
		$new = $_SESSION['code'];
		$new = strtolower($new);
		// sp($new);
		// sp($code);
		if($code != $new){
			echo 0;exit;
		}
		echo 1;exit;
	}
	/**
	 * 显示未付款
	 */
	public function nopay(){
		// 是否是登录状态,判断是哪个用户登录后的订单表
		$uid = isset($_SESSION['aid']) ? $_SESSION['aid'] : 0;
		// 统计总数 SELECT count(*) FROM....
		$total = $this->model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0' and nstate='未付款'")
				->count();
		// 执行分页
		$page = Page::row(3)->make($total);
		// 分配变量到页面
		View::with('page',$page);
		// 查询对应的订单表数据
		$data = $this->model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0' and nstate='未付款'")
				->limit(Page::limit())
				->get();
		View::with('data',$data);
		// 载入模板
		View::make();
	}
	/**
	 * 显示待收货
	 */
	public function nore(){
		// 是否是登录状态,判断是哪个用户登录后的订单表
		$uid = isset($_SESSION['aid']) ? $_SESSION['aid'] : 0;
		// 统计总数 SELECT count(*) FROM....
		$total = $this->model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0' and nstate='已发货'")
				->count();
		// 执行分页
		$page = Page::row(3)->make($total);
		// 分配变量到页面
		View::with('page',$page);
		// 查询对应的订单表数据
		$data = $this->model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0' and nstate='已发货'")
				->limit(Page::limit())
				->get();
		View::with('data',$data);
		// 载入模板
		View::make();
	}
	/**
	 * 显示待评价
	 */
	public function nocom(){
		// 是否是登录状态,判断是哪个用户登录后的订单表
		$uid = isset($_SESSION['aid']) ? $_SESSION['aid'] : 0;
		// 统计总数 SELECT count(*) FROM....
		$total = $this->model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0' and nstate='已完成'")
				->count();
		// 执行分页
		$page = Page::row(3)->make($total);
		// 分配变量到页面
		View::with('page',$page);
		// 查询对应的订单表数据
		$data = $this->model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0' and nstate='已完成'")
				->limit(Page::limit())
				->get();
		View::with('data',$data);
		// 载入模板
		View::make();
	}






} 