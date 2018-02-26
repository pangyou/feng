<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/tpzol/Public/Home/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/tpzol/Public/Home/css/login.css"/>
	</head>
	<body>
		<!--顶部开始-->
		<div id="top">
			<div id="search">
				<!--logo开始-->
				<a href="<?php echo U('Index/index');?>"><img class="logo" src="/tpzol/Public/Home/images/02.png"/></a>
				<!--logo结束-->
				<p>
					ZOL商城中关村在线旗下网上商城
				</p>
				<div class="register">
					还没有ZOL商城账号？<a href="<?php echo U('Reg/index');?>">立即注册</a>
				</div>
				
			</div>
		</div>
		<!--顶部结束-->
		<!--注册开始-->
		<div id="login">
			<div class="l_l">
				<img src="/tpzol/Public/Home/images/54.jpg"/>
			</div>
			<div class="l_r">
				<h3>登录ZOL商城</h3>
				<div class="denglu">
					<form action="" method="post">
						<input type="text" name="nickname" placeholder="手机号/邮箱/用户名" id="" value="" />
						<input type="password" name="password" placeholder="密码" id="" value="" />
						<p><a href="javascript:;">忘记密码?</a></p>
						<input class="sub" type="submit" value="登   录"/>
					</form>
				</div>
			</div>
		</div>
		<!--注册结束-->
		<!--底部开始-->
		<div id="foot">
			<div class="foot_inside">
				关于ZOL商城
				<span>|</span>
				联系我们
				<span>|</span>
				帮助中心
			</div>
		</div>
		<!--底部开始-->
	</body>
</html>