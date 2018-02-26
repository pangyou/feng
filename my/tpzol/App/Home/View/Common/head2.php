<!--页头开始-->
		<div id="header">
			<!--外100%宽开始-->
			<div class="h_outer">
				<!--页头内宽开始-->
				<div class="h_inside">
					<!--左侧登录开始-->
					<div class="login">
						<!--商城首页-->
						<span class="l_home"><a href="">商城首页</a></span>
						<if condition="!isset($_SESSION['aid'])">
						<!--登录-->
						<span class="l_login">Hi~欢迎来到ZOL商城，请<a href="{{:U('Login/index')}}">登录</a></span>
						<!--注册-->
						<span class="l_register"><a href="{{:U('Reg/index')}}">免费注册</a></span>
						<else /> 
						Hi~{$_SESSION['nickname']}欢迎回来 <a href="{{:U('Login/out')}}">退出</a>
						</if>
					</div>
					<!--左侧登录结束-->
					<!--右侧导航开始-->
					<div class="menu">
						<ul>
							<li><a href="">我的订单</a></li>
							<li><a href="">买家中心  ∨</a></li>
							<li><a href="">购物车<span style="color: red;">{$_SESSION['cart']['total_rows']}</span>件</a></li>
							<li><a href="">帮助中心</a></li>
							<li>|</li>
							<li class="li_phone"><a href="">手机商城  ∨</a></li>
							<li><a href="">中关村在线</a></li>
							<li><a href="">商家入驻</a></li>
							<li><a href="">联系客服</a></li>
						</ul>
					</div>
					<!--右侧导航结束-->
				</div>	
				<!--页头内宽结束-->
			</div>
			<!--外100%宽结束-->
		</div>
		<!--页头结束-->
			