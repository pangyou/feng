<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>我的易购</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="./Public/Home/css/person.css"/>
</head>
<body>	
	<!--头部开始-->
	{{include file='../Common/head1'}}
	<!--头部结束-->
	<!--右侧漂浮栏目二维码-->
	<div id="myTool">
		<a class="right1" href=""></a>
		<a class="right2" href=""></a>
	</div>
	
	<div class="line"></div>
	<!--内容设置开始-->
	<div id="nav">
		{{include file='../Common/left'}}
		<div class="center">
			<div class="ce-left">
				<div class="son1">
					<img src="./Public/Home/images/pinlun.jpg" alt="" />
				</div>
				<div class="son2">
					<p class="name">
						{{if value="isset($_SESSION['nickname'])"}}
						<span>{{$_SESSION['nickname']}}...</span>
						{{else}}
						<span>文字歌手...</span>
						{{endif}}

						<em>新人</em>
						<a class="a1" href="">我的收货地址</a>
					</p>
					<p class="safe">  
						<span>账户安全:</span>
						<em>中</em>  
						<a class="a1" href="">立即提升</a>
					</p>
					<p class="safe">
						
					</p>
				</div>
			</div>
			<div class="ce-right">
				<div class="dv">
					<div class="dv_title">
						<h3>我的资产</h3>
					</div>
					<a class="myself" href="">显示余额及收益</a>
					<div class="img">
						
					</div>
				</div>
				<div class="dv dv2">
					<div class="dv_title">
						<h3>我的任性付</h3>
					</div>
					<a class="myself" href="">显示余额及收益</a>
					<div class="img">
						
					</div>
				</div>
			</div>
		</div>
		<div class="right">
			

		</div>
		<!--为您推荐-->
		{{include file='../Common/personfor'}}
	</div>
	<!--底部设置开始-->
	{{include file='../Common/foot1'}}
	<!--底部设置结束-->	
</body>
</html>
