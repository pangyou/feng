<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/tpzol/Public/Home/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/tpzol/Public/Home/css/register.css"/>
		<script src="/tpzol/Public/Home/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			
		</script>
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
					还没有ZOL商城账号？<a href="<?php echo U('Login/index');?>">立即登录</a>
				</div>
				
			</div>
		</div>
		<!--顶部结束-->
		<!--注册开始-->
		<div id="register">
			<div class="title">
				30秒快速注册，加入ZOL商城
			</div>
			<div class="r_l">
				<form action="" method="post">
					<dl>
						<dt><em>*</em>&nbsp;&nbsp;账号:</dt>
						<dd><input class="chang" type="text" name="nickname" placeholder="请输入账号" id="" value="" /></dd>
						<dd style="height: 40px; line-height: 40px;text-indent: 10px;"></dd>
					</dl>
					<dl>
						<dt><em>*</em>&nbsp;&nbsp;密码:</dt>
						<dd><input class="chang" type="password" name="password" placeholder="请输入密码" id="" value="" /></dd>
					</dl>
					<dl>
						<dt><em>*</em>&nbsp;&nbsp;手机号:</dt>
						<dd><input class="chang" type="text" name="phone" placeholder="请输入手机号" id="" value="" /></dd>
					</dl>
					<dl>
						<dt><em>*</em>&nbsp;&nbsp;验证码:</dt>
						<dd><input class="duan chang" type="text" name="code" placeholder="请输入验证码" id="" value="" /></dd>
						<dd><img src="<?php echo U('Reg/code');?>" title="看不清?点我换一张"  onclick="this.src = this.src + '?' + Math.random()"/></dd>
					</dl>
					<input class="sub" type="submit" value="注册"/>
				</form>
			</div>
			<div class="r_r">
				<img src="/tpzol/Public/Home/images/55.png"/>
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
	</head>
	<body>
	</body>
</html>