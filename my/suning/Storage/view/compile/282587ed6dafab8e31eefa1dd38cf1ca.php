<?php 
		// 实例化订单表
		$model = new \Common\Model\Orders;
		// 是否是登录状态,判断是哪个用户登录后的订单表
		$uid = isset($_SESSION['aid']) ? $_SESSION['aid'] : 0;
		// 待付款的商品个数
		$str = $model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0' and nstate='未付款'")
				->count();
		// 待确认收货的商品个数
		$str1 = $model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0' and nstate='已发货'")
				->count();
		// 待评价的订单
		// 待确认收货的商品个数
		$str2 = $model
				->join('order_list','oid','=','order_oid')
				->where("user_uid={$uid} and is_recycle='0' and nstate='已完成'")
				->count();
 ?>
<div class="state">
	<div class="tab">
		<ul class="l">
			<li class="now"><a href="<?php echo U('Person/orders')?>">全部订单</a></li>
			<li>
				<a href="<?php echo U('Person/nopay')?>">待付款</a><em><?php echo $str?></em>	
			</li>
			<li>
				<a href="<?php echo U('Person/nore')?>">待收货</a><em><?php echo $str1?></em>	
			</li>
			<li>
				<a href="<?php echo U('Person/nocom')?>">待评价</a><em><?php echo $str2?></em>	
			</li>
		</ul>
		<p class="r">
			<a href="<?php echo U('recycleShow')?>">
				<i></i>
				订单回收站
			</a>
		</p>
	</div>
	<div class="cont">
		<p class="l">
			<input class="l" type="text" placeholder="商品名称和订单号" name="" id="" />
		<button class="r">搜索订单</button>
		</p>
		<strong class="l">更多筛选条件</strong>
	</div>
</div>