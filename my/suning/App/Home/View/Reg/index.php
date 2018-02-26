<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>苏宁易购-苏宁云商网上商城，领先的综合网上购物商城，正品行货，全国联保，货到付款，让您尽享购物乐趣！</title>
<link rel="stylesheet" type="text/css" href="./Public/Home/css/reg.css"/>
<link href="./Public/Home/css/drag.css" rel="stylesheet" type="text/css"/>
<script src="./Public/Home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="./Public/Home/js/drag.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	// 拖动滑块效果
	$('#drag').drag();
})	
</script>
</head>
<body>
	<!--头部设置开始-->
	<div id="top">
		<a class="a1" href="{{U('Index/index')}}"><img src="./Public/Home/images/logo.png" alt="" /></a>
		<span class="sp1"></span>
		<p>
			我已经注册,马上<a href="{{U('Login/index')}}">登录></a>
		</p>
	</div>
	<!--头部设置结束-->	
	<!--内容部分设置开始-->	
	<div id="navall">
		<div id="nav">
			<ul>
				<li class="current">
					<i class="i1"></i>
					设置登录名
				</li>
				<li>
					<i class="i2"></i>
					设置账户信息
				</li>
				<li>
					<i class="i3"></i>
					注册成功
				</li>
			</ul>
		</div>
		<form action="" method="post">
		<div id="main">
			<div class="son">
				<div class="reg-text">
					<i></i>
					<input type="text" name="phone" placeholder="请输入您的手机号" />
				</div>
				<div class="son1">
					<!-- <div class="left"></div>
					<span>请按住滑块拖到最右边</span> -->
					<div id="drag"></div>
				</div>
				<div class="son2">
					<span>*&nbsp;用户名:</span>
					<input type="text" name="nickname" placeholder="请输入用户名" id="">
				</div>
				<div class="son2">
					<span>*&nbsp;密码:</span>
					<input type="password" name="password" placeholder="请输入密码" id="">
				</div>
				<div class="son2">
					<span>*&nbsp;验证码:</span>
					<input type="text" name="code" class="code"  placeholder="请输入验证码" id="">
					<img src="{{U('code')}}" class="img" onclick="this.src = this.src + '&mt=' + Math.random()" title="看不清?点我换一张">
				</div>
				<div class="auto">
					<input type="checkbox" name="auto"  id="" />同意
					<a href="">《苏宁易购会员章程》</a>
					<a href="">《易付宝协议》</a>及
					<a href="">《苏宁广告联盟在线协议》</a>
				</div>
				<div class="agree">
					<!-- <a href="">同意协议并注册</a> -->
					<input type="submit" value="同意并注册">
				</div>
				<div class="user">
					<a href="">企业用户注册</a>
				</div>
			</div>
		</div>
		</form>
	</div>
	<!--内容部分设置结束-->
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
