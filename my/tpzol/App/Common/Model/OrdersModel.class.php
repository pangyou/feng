<?php namespace Common\Model;
use Think\Model;
/**
  *  订单表模型
  */
class OrdersModel extends Model{
    //	指定表
    protected $tableName='orders';
    // 自动完成
	protected $_auto = array(
		// 自动完成gid的添加
		array('goods_gid','addGid',3,'callback'),
		// 自动添加时间
		array('otime','time','time',3,'function'),
		// 自动添加用户id
		array('user_uid','addUid','method',3,'callback')
	);
	/**
     * 自动添加用户uid方法
     */
	public function addUid(){
		return $_SESSION['uid'];
	}
	// 自动添加gid
	public function addGid(){
		// 接收get传过来的oid
		$oid = I('get.oid',0,'intval');
		// 查询对应的gid
		$gid = D('Orders')->where("oid={$oid}")->getField('goods_gid');
		return $gid;
	}
	/**
	 * 提交订单方法
	 */
	public function addData(){
		if(!$this->create()){
            // 验证不通过,返回假
            return false;
        }
        // 一,把提交的信息存入订单表
        // 城市地址 最后的地址,城市地址  加上详细地址
        $adress = implode(',', I('post.city'));
        $time = time();
        $orderData = array(
            'consignee'=>Q('post.username'),//收货人
            'number'=>Cart::getOrderId(),//自动生成的订单号
            'address'=>$adress,//收货地址
            'phone'=>I('post.phone'),//收货人电话
            'total_price'=>Q('post.total_price'),//总价格
            'otime'=>$time,//提交时间(自动完成)
            'user_uid'=>$_SESSION['aid'],//用户id
            'remarks'=>I('post.remarks'),//备注
        );
        $oid = $this->add($orderData);
        // 验证通过,执行添加方法
        // 二,把购物车中的信息存入订单表,然后删除购物车中的SESSION
        $sid = I('post.sid');
        foreach (I('post.sid') as $k => $v) {
            // 只选中的数据
            $data[$v] = $_SESSION['cart']['goods'][$v];
        }
        foreach ($data as $k => $v) {
            $new[$k] = array(
                'goods_gid'=>$v['id'],//商品的gid
                'count'=>$v['num'],//数量
                'subtotal'=>$v['total'],//价格小计
                'explain'=>I('post.remarks'),//备注
                'order_oid'=>$oid,//订单表的oid
                'oimg' => $v['pic'],//订单图
                'num'=>Cart::getOrderId(),//自动生成的订单号
            );
        }
        foreach ($new as $k => $v) {
            // 遍历添加入订单列表
            $orderListModel->add($v);
        }
        // 清除购物车中的SESSION
        foreach ($data as $k => $v) {
             // 调用框架删除方法
            Cart::del($k);
        }
        return true;
	}
	/*
	 * 修改方法
	 */
	public function editData(){
		// 验证不通过
		if(!$this->create())return false;
		// 调用框架修改方法
		$this->save();
		return true;
	}
    
}