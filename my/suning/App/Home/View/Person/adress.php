<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>我的易购-收货地址</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="./Public/Home/css/person2.css"/>
</head>
<body>	
	<!--头部开始-->
	{{include file='../Common/head1'}}
	<!--头部结束-->
	<!--右侧漂浮栏目二维码-->
	<div id="myTool">
		<a class="right1" href=""></a>
		<a class="right2" href="">
			问卷调查
		</a>
	</div>
	<div class="line"></div>
	<div id="nav">
		<div class="left">
			<div class="dt">账户管理</div>
			<div class="dd">
				<ul>
					<li >
						<span>·</span>
						<a href="{{U('person')}}">个人信息</a>
					</li>
					<li>
						<span>·</span>
						<a href="">我的拍卖</a>
					</li>
					<li>
						<span>·</span>
						<a class="a2" href="">我的二手</a>
					</li>
					<li>
						<span>·</span>
						<a href="">我的拍卖</a>
					</li>
					<li class="now">
						<span>·</span>
						<a href="">地址管理</a>
					</li>
					<li>
						<span>·</span>
						<a href="">校园用户</a>
					</li>
					<li>
						<span>·</span>
						<a href="">我的拍卖</a>
					</li>
				</ul>
			</div>
			<a class="last" href="">
				<em></em>
			</a>
		</div>
		<div class="right">
			<h2 class="right_title">地址管理</h2>
			<!--默认收货地址,新增收货地址-->
			<div class="default">
				<div class="add"></div>
				<!-- 未写完,需重新写 ========================================-->
				<div class="newadress">
					<!-- * 收货人 <input type="text" name="" id=""> -->
				</div>
			</div>
		</div>
		<!--收货地址-->
		<div class="all-url">
			<div class="title">
				<ul>
					<li class="on">
						<span>全部地址</span>
					</li>
					<li><span>配送地址</span></li>
					<li><span>配送地址</span></li>
				</ul>
				<div class="add-count">
					<em></em>
					<span>
						您已保存<i>0</i>个地址，还能增加
						<i>20</i>个新地址
					</span>
				</div>
			</div>
			<!--收货地址-->
			<div class="add-matter">
				<p>
					<img src="./Public/Home/images/noaddr.png" alt="" />
					<span>您还没有添加过地址哦~</span>
				</p>
			</div>
		</div>
	</div>
	<!--底部设置开始-->
	{{include file='../Common/foot1'}}
	<!--底部设置结束-->	
</body>
</html>
