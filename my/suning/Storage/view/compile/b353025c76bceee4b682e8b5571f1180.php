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
		<div id="head">
		<div class="top">
			<div class="top_left">
				<a class="a1" href="http://127.0.0.1/suning/index.php?m=Home&c=Index&a=index">
					<i class="glyphicon glyphicon-home"></i>
					返回易购首页
				</a><b>|</b>
				<div class="box">	
					<span>网站导航</span>
					<em class="glyphicon glyphicon-menu-down"></em>
				</div>
				<a href="">商家入驻</a>
			</div>
			<div class="top_right">
				<ul>
					<li>
					                
					<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index">admin...</a>
										<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=orders">我的订单</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index">我的易购</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li class="gouwuche">
						<em class="glyphicon glyphicon-shopping-cart"></em>
						<a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=cartshow">购物车</a>
						<span class="total_num" id='total_num'>
														<b>0</b>
						</span>
					</li>				
					<li>
						<em></em>
						<a href="">手机苏宁</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
					<li><a href="">易付宝</a></li>
					<li><a href="">政府采购</a></li>
					<li>
						<a href="">客户服务</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
	<div id="my">
		<div class="my">
			<div class="left">
				<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index"></a>
			</div>
			<div class="right">
				<ul>
					<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index">首页</a></li>
					<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=adress">账户管理</a><i></i></li>
					<li><a href="">消息</a></li>
				</ul>
				<form action="" method="post">
					<div class="search">
						<input type="text" name="" id="" />
						<a href=""></a>
					</div>
				</from>			
			</div>
		</div>
	</div>
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
						<a href="<?php echo U('person')?>">个人信息</a>
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
	<div id="footer">
		<div class="footer3">
			<div class="footer3_con">
				<p class="p1">
					<a href="">苏宁云商</a><span>|</span>
					<a href="">苏宁互联</a><span>|</span>
					<a href="">苏宁金融</a><span>|</span>
					<a href="">易付宝</a><span>|</span>
					<a href="">PPTV</a><span>|</span>
					<a href="">红孩子</a><span>|</span>
					<a href="">缤购</a><span>|</span>
					<a href="">乐购仕</a><span>|</span>
					<a href="">苏宁物流</a><span>|</span>
					<a href="">苏宁美国</a><span>|</span>
					<a href="">苏宁香港</a><span>|</span>
					<a href="">手机苏宁</a>
				</p>
				<p class="p1">
					<a href="">关于苏宁易购</a><span>|</span>
					<a href="">联系我们</a><span>|</span>
					<a href="">诚聘英才</a><span>|</span>
					<a href="">供应商入驻</a><span>|</span>
					<a href="">苏宁联盟</a><span>|</span>
					<a href="">苏宁招标</a><span>|</span>
					<a href="">友情链接</a><span>|</span>
					<a href="">法律申明</a><span>|</span>
					<a href="">用户体验提升计划</a><span>|</span>
					<a href="">股东会员认证</a>
				</p>
				<p class="p2">Copyright© 2002-2016 ，苏宁云商集团股份有限公司版权所有
					<a href="">苏ICP备10207551号-4</a>
					<a href="">苏B1-20130131</a>
					<a href="">苏B2-20130391</a>出版物经营许可证新出发苏批字第A-243号
				</p>
				<div class="footer3_img">
					<a href=""><img src="./Public/Home/images/footer3a1.png" alt="" /></a>
					<a href=""><img src="./Public/Home/images/dianxin.jpg" alt="" /></a>
					<a href=""><img src="./Public/Home/images/unicom.png" alt="" /></a>
					<a href=""><img src="./Public/Home/images/dianzi.png" alt="" /></a>
				</div>
			</div>
		</div>
	</div>
	<!--底部设置结束-->	
</body>
</html>
