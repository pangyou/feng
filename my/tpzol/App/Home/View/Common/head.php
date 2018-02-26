		<!--页头开始-->
		<div id="header">
			<!--外100%宽开始-->
			<div class="h_outer">
				<!--页头内宽开始-->
				<div class="h_inside">
					<!--左侧登录开始-->
					<div class="login">
						<!--商城首页-->
						<span class="l_home"><a href="{{:U('Index/index')}}">商城首页</a></span>
						<if condition="!isset($_SESSION['aid'])">
						<!--登录-->
						<span class="l_login">Hi~欢迎来到ZOL商城，请<a href="{{:U('Login/index')}}">登录</a></span>
						<!--注册-->
						<span class="l_register"><a href="{{:U('Reg/index')}}">免费注册</a></span>
						<else /> 
						Hi~{{$_SESSION['nickname']}}欢迎回来 <a href="{{:U('Login/out')}}">退出</a>
						</if>
					</div>
					<!--左侧登录结束-->
					<!--右侧导航开始-->
					<div class="menu">
						<ul>
							<li><a href="{{:U('Person/orders')}}">我的订单</a></li>
							<li><a href="{{:U('Person/index')}}">买家中心  ∨</a></li>
							<li><a href="{{:U('Person/carshow')}}">购物车<span>0</span>件</a></li>
							<li><a href="javascript:;">帮助中心</a></li>
							<li>|</li>
							<li class="li_phone"><a href="javascript:;">手机商城  ∨</a></li>
							<li><a href="javascript:;">中关村在线</a></li>
							<li><a href="javascript:;">商家入驻</a></li>
							<li><a href="javascript:;">联系客服</a></li>
						</ul>
					</div>
					<!--右侧导航结束-->
				</div>	
				<!--页头内宽结束-->
			</div>
			<!--外100%宽结束-->
		</div>
		<!--页头结束-->
		<div style="background:url(./__PUBLIC__/Home/images/03.jpg) top center no-repeat;">
			<!--搜索开始-->
			<div id="search">
				<!--logo开始-->
				<img class="logo" src="__PUBLIC__/Home/images/02.png"/>
				<!--logo结束-->
				
				<p>
					中关村在线旗下网上商城
				</p>
				<!--搜索框开始-->
				<div class="search_box">
					<form action="" method="post">
						<input type="text" class="s_text" name="search" id="" value="" />
						<input class="s_sub" type="submit" value="搜  索"/>
					</form>
					<span>     
						<a href="javascript:;">乐视1S</a>
						<a href="javascript:;">苹果 iPhone SE</a>
						<a href="javascript:;">魅蓝metal</a>
						<a href="javascript:;">iPhone6</a>
						<a href="javascript:;">三星A8000</a>
						<a href="javascript:;">iPhone 6s</a>
						<a href="javascript:;">ZOL商城承诺</a>
					</span>
					
				</div>
				<!--搜索框结束-->
				<img class="r_logo" src="__PUBLIC__/Home/images/04.jpg"/>
			</div>
			<!--搜索结束-->
			<?php   
			//  	获取顶级分类数据
			$cateData=D('Cate')->where('pid=0')->limit(5)->select();
			?>
			<!--导航栏开始-->
			<div class="nav_box">
				<h2 class="goods_cate">商品分类</h2>
				<ul>
					<li ><a class="color_red" href="{{:U('Index/index')}}">首页</a></li>
					<foreach name="cateData" item="v">
					<li><a href="{{:U('List/index',array('cid'=>$v['cid']))}}">{{$v['cname']}}</a></li>
					</foreach>
				</ul>
				<a class="n_r" href="javascript:;">智能穿戴低至89元</a>
			</div>
			<!--导航栏结束-->