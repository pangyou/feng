<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>订单中心_交易管理_我的易购</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="./Public/Home/css/person1.css"/>
</head>
<body>	
	<!--头部开始-->
	{{include file="../Common/head1"}}
	<!--头部结束-->
	<!--右侧漂浮栏目二维码-->
	<div id="myTool">
		<a class="right1" href=""></a>
		<a class="right2" href=""></a>
	</div>
	<div class="line"></div>
	<div id="nav">
		{{include file='../Common/left'}}
		<div class="right">
			<div class="right_title">
				<h2 class="l">我的订单</h2>
				<div class="category l">
					<h3>
						<span>网上订单</span>
					</h3>
				</div>
				<div class="menu l">
					<h3>
						<span>其他订单</span>
					</h3>
					<!--隐藏区域设置-->
				</div>
			</div>
			<div class="main">
				{{include file='../Common/person1'}}
				{{if value="isset($_SESSION['aid'])"}}
				<div class="order-table">
					<ul class="ul">
						<li class="li1">
							<h3>订单商品</h3>
						</li>
						<li class="li2">
							<h3>支付总金额</h3>
						</li>
						<li class="li2">
							<h3>订单状态</h3>
						</li>
						<li class="li2">
							<h3>操作</h3>
						</li>
					</ul>
					{{foreach from='$data' value='$vv'}}
					<div class="tableall">
						<table class="table">
							<tbody>
								<tr class="tr">
									<td class="td">
										<div>
											<em>下单时间：</em>
											<span>{{date('Y-m-d',$vv['otime'])}}</span>
										</div>
										<div>
											<em>订单编号：</em>
											<span>{{$vv['num']}}</span>
										</div>
										<div>
											<em>卖家：</em>
											<span>苏宁自营</span>
											<a class="tupian" href=""></a>
										</div>
										<a class="huishou" href="javascript:if(confirm('确定删除吗?'))location.href='{{U('recycle',array('olid'=>$vv['olid']))}}'"></a>
									</td>
								</tr>
								<tr class="infotwo">
									<td class="td2">
										<a class="a1" href="">
											<img src="{{$vv['oimg']}}" alt="">
										</a>
										<p>
											<a class="a2" href=""></a>
										</p>
									</td>
									<td class="price td3">
										<p class="p1"><i>¥</i><em>{{$vv['subtotal']}}</em></p>
										<p class="p2">在线支付</p>
									</td>
									<td class="actuality td3">
										<p class="p1">{{$vv['nstate']}}</p>
										{{if value="$vv['nstate']=='未付款'"}}
										<p class="p2">
											<a href="{{U('payMoney',array('olid'=>$vv['olid']))}}">付款</a>
										</p>
										<p class="p2"><a href="">查看详情</a></p>
										{{elseif value="$vv['nstate']=='已付款'"}}
										<p class="p2">待发货</p>
										<p class="p2"><a href="">查看详情</a></p>
										{{elseif value="$vv['nstate']=='已发货'"}}
										<p class="p2"><a href="javascript:if(confirm('确认收货吗?'))location.href='{{U('confirm',array('olid'=>$vv['olid']))}}'">确认收货</a></p>
										<p class="p2"><a href="">查看详情</a></p>
										{{elseif value="$vv['nstate']=='已完成'"}}
										<p class="p2"><a href="javascript:;">评价</a></p>
										<p class="p2"><a href="">查看详情</a></p>
										{{endif}}
									</td>
									<td class="touch td3">
										{{if value="$vv['nstate']=='已完成'"}}
										<a class="again" href="">再次购买</a>
										{{endif}}
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					{{endforeach}}
					<!--分页设置开始-->
					<div id="fenye">
					  <ul class="pagination">
					   {{$page}}
					  </ul>
					</div>
					<!--分页设置结束-->
				</div>
				{{else}}
				<div class="load">
					<p class="pic">
						<img src="./Public/Home/images/load-3.png"/>
					</p>
					<p class="load-text">嗷~暂时没有您想要的订单~</p>
					<p class="load-open">
						推荐您去：
						<a href="{{U('Index/index')}}">首页</a>逛逛
					</p>
				</div>
				{{endif}}
			</div>
		</div>
		<!--为您推荐-->
		{{include file='../Common/personfor'}}
	</div>
	<!--底部设置开始-->
	{{include file='../Common/foot1'}}
	<!--底部设置结束-->	
</body>
</html>
