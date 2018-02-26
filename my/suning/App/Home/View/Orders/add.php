<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品成功加入购物车</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="./Public/Home/css/index1.css" />
<link rel="stylesheet" href="./Public/Home/css/gouwu.css" />
</head>
<body>
	<!-- 载入公共头部 -->
	{{include file='../Common/head2'}}
	<!--内容设置开始-->
	<div id="nav">
		<div class="son1">
			<div class="left">
				<h2>
					<i></i>
					已成功提交订单!
				</h2>
			</div>
			<div class="right">
				<a class="a1" href="{{U('Person/orders')}}">付款</a>
				<a class="a2" href="{{U('GoodsList/index')}}">继续购物</a>
			</div>
		</div>
		{{include file='../Common/like'}}
	</div>
	<!--内容设置结束-->
	<!--底部设置开始-->
	{{include file="../Common/foot"}}
	<!--底部设置结束-->	
	
</body>
</html>
