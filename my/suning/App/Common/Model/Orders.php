<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 订单操作模型
  */
class Orders extends Model{
	// 指定模型操作的表
	protected $table = 'orders';
	// 自动完成
	protected $auto = array(
		// 自动添加时间
		array('otime','time','function',3,1),
		// 自动添加用户id
		array('user_uid','addUid','method',3,3)
	);
    /**
     * 自动添加用户id方法
     */
	public function addUid(){
        // sp($_SESSION['uid']);die;
		return $_SESSION['aid'];
	}
	/**
	 * 提交订单方法
	 */
	public function addData(){

		if(!$this->create()){
            // 验证不通过,返回假
            return false;
        }
         // 实例化订单列表
        $orderListModel = new \Common\Model\OrderList;
        if(!$orderListModel->create()){
            // 把错误压入
            $this->error = $orderListModel->getError();
            return false;
        }
        // 一,把提交的信息存入订单表
        // 城市地址 最后的地址,城市地址  加上详细地址
        $adress = implode(',', Q('post.city'));
        // sp(Q('post.'));
        // sp($adress);
        $time = time();
        $orderData = array(
            'consignee'=>Q('post.username'),//收货人
            'number'=>Cart::getOrderId(),//自动生成的订单号
            'address'=>$adress,//收货地址
            'phone'=>Q('post.phone',0,'intval'),//收货人电话
            'total_price'=>Q('post.total_price'),//总价格
            'otime'=>$time,//提交时间(自动完成)
            'user_uid'=>$_SESSION['aid'],//用户id
            'remarks'=>Q('post.remarks'),//备注
        );
        $oid = $this->add($orderData);
        // 验证通过,执行添加方法
        // 二,把购物车中的信息存入订单列表,然后删除购物车中的SESSION
        $sid = Q('post.sid');
        foreach (Q('post.sid') as $k => $v) {
            // 只要选中的数据
            $data[$v] = $_SESSION['cart']['goods'][$v];
        }
        foreach ($data as $k => $v) {
            $new[$k] = array(
                'goods_gid'=>$v['id'],//商品的gid
                'count'=>$v['num'],//数量
                'subtotal'=>$v['total'],//价格小计
                'explain'=>Q('post.remarks'),//备注
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
    /**
     * 修改
     */
    public function editData(){
        // 1,验证不通过,返回假
        if(!$this->create())return false;
        // 2,验证通过,修改数据
        $this->save();
        return true;
    }
   
}