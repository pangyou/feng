	<div id="head">
		<div class="top">
			<div class="top_left">
				<a class="a1" href="{{U('Index/index')}}">
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
					{{if value="isset($_SESSION['aid'])"}}
					<a href="{{U('Person/index')}}">{{$_SESSION['nickname']}}...</a>
					{{else}}
					<a href="{{U('Login/index')}}">登录</a>
					{{endif}}
					<li><a href="{{U('orders')}}">我的订单</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li><a href="{{U('index')}}">我的易购</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li class="gouwuche">
						<em class="glyphicon glyphicon-shopping-cart"></em>
						<a href="{{U('Content/cartshow')}}">购物车</a>
						<span class="total_num" id='total_num'>
							<?php 
							$num = Cart::getTotalNums();
							$num = $num ? $num : 0;
					  		?>
							<b>{{$num}}</b>
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
				<a href="{{U('index')}}"></a>
			</div>
			<div class="right">
				<ul>
					<li><a href="{{U('index')}}">首页</a></li>
					<li><a href="{{U('adress')}}">账户管理</a><i></i></li>
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