<?php namespace Common\Model;
/**
 * 命名空间导入
 */
 use Hdphp\Model\Model;
 /**
  * 订单操作模型
  */
class OrderList extends Model{
	// 指定模型操作的表
	protected $table = 'order_list';
	// 自动完成
	protected $auto = array(
		array('goods_gid','addGid','method',3,3)
	);
	// 自动添加gid
	public function addGid(){
		// 接收get传过来的olid
		$olid = Q('get.olid',0,'intval');
		// p($olid);
		// 实例化订单列表
		$OrderListModel = new \Common\Model\OrderList;
		// 查询对应的gid
		$gid = $OrderListModel->where("olid={$olid}")->pluck('goods_gid');
		// sp($gid);
		return $gid;
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
	 /**
    * 发货,改变订单状态
    */
    public function change(){
       /* 
        // 1,因为没有传数据过来,不需要验证
        if(!$data=$this->create()){
            sp($data);
            return false;
        } */
        $olid = Q('get.olid');
        // 2,修改订单状态
        $data = array('nstate'=>'已发货');
        // 修改
        $this->where("olid={$olid}")->update($data);

        // // 如果订单列表中的状态都是已发货,则修改订单表中的状态为已发货
        // $aa = $this->where("olid={$olid}")->get();
        // // sp($aa);
        // foreach ($aa as $v) {
        // 	if($v['nstate']=='已发货'){
        // 		$aa = 1;
        // 		$oid = $v['order_oid'];
        // 	}
        // }
        // if($aa){
        // 	$orderModel = new \Common\Model\Orders;
        // 	$orderModel->where("oid={$oid}")->update(array('state'=>'已发货'));
        // }
        // 修改成功,返回真
        return true;
    }
}