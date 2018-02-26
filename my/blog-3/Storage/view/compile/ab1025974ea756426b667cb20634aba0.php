<!doctype html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="./Public/Home/bts/css/bootstrap.min.css"/>
	<style type="text/css">
		body{
			background:#eeeeee;
		}
		a:hover{
			text-decoration: none;
		}
		.alert{
			text-align: center;
		}
		div.dv1{
			background: url(./Public/Home/images/top.jpg)no-repeat;
			padding-top: 150px;
			padding-bottom: 150px;
			background-position: center;
			box-shadow: 0px 0px 8px #c8c7c7;
			width: 1200px;
		}
		h1.dv1{
			color: white;
			font-size: 36px;	
		}
		h1.dv1 img{
			width: 50px;
			height: 50px;
		}
		._digest{
			margin-top: 20px;
		}
		._digest p{
			font-size: 18px;
			line-height: 1.7em;
			text-align: left;
			text-indent: 20px;
			text-overflow:ellipsis;
		/*white-space:nowrap;*/
			overflow:hidden; 
			height: 122px;
		}
		._footer{
			margin-top: 20px;
			border-top: 1px solid #eee;
			padding-top: 10px;
			text-align: left;
			color: #959595;
			border-bottom: 1px solid #CDCDCD;
			padding-bottom: 10px;
		}
		article{
			background: white;
			padding: 20px;
			text-align: center;
			border-radius:10px;	
			margin-bottom: 30px;
			border-radius: 5%;	
		}
		article a:hover{
			color:white;
			background: #ccc;
		}
		._footer .click,i{
			float: right;
		}
		._footer i{
			padding-top: 10px;
			padding-right: 10px;
		}
		a.btn-warning{
			font-weight: bold;
			color: black;
		}
		.img-responsive{
			margin-bottom: 20px;
		}
		/*右边设置开始*/
		.col-md-4 h4{
			position: relative;
			border-bottom: 1px solid #ebebeb;
			padding-bottom: 15px;
			position: relative;
			color: #000;
		}
		.col-md-4 h4:after{
			/*content: '';*/
			background: #1CAF9A;
			bottom: -1px;
			content: "";
			height: 1px;
			left: 0;
			position: absolute;
			width: 90px;
		}
		.col-md-4 a{
			color: #959595;
			border: 1px solid #ebebeb;
			margin: 0 5px 5px 0px;
			padding: 2px 7px;
			display: inline-block;
			transition: all 0.2s ease 0s;
		}
		.col-md-4 a:hover{
			background: #1CAF9A;
			color: white;
		}
		.right{
			background: white;
			padding: 20px;
			margin-bottom: 30px;
			border-radius: 5%;
		}
		.right .addarc{
			float: right;
		}
		._info{
			padding-top: 20px;
		}
		._info ul{
			padding: 0;
		}
		._info ul li{
			list-style: none;
			margin-top: 5px;
		}
		/*底部设置开始*/
		footer{
			width: 100%;
			height: 100%;
			background: #202020;
			padding: 30px 0;
			color: #959595;
			font-size: 12px;
		}
		footer ._title{
			position: relative;
			color: white;
			border-bottom: 1px solid #303030;
			padding-bottom: 15px;
			position: relative;
			color: white;
		}
		footer ._title:after{
			background: #1CAF9A;
			bottom: -1px;
			content: "";
			height: 1px;
			left: 0;
			position: absolute;
			width: 90px;
		}
		._single{
			border-bottom: 1px dashed #303030;
			padding: 10px 0;
		}
		footer a{
			color:  #199f8c;
		}
		footer a:hover{
			color: white;
		}
		.footer_tag a{
			border: 1px solid #303030;
			margin: 0 5px 5px 0px;
			padding: 2px 7px;
			display: inline-block;
			transition: all 0.2s ease 0s;
		}
		.footer_tag a:hover{
			background: #1CAF9A;
		}
		.footer_bottom{
			border-top: 1px solid #303030;
			text-align: center;
			background: #111111;
			min-height: 80px;
			font-size: 12px;
			padding-top: 30px;
			width: 100%;
			position: absolute;
		}
		.footer_bottom a{
			color: #199f8c;
			padding-left: 5px;
		}
		.footer_bottom a:hover{
			color: white;
		}
		/*头部设置开始*/
		#top{
			background: white;
			margin-bottom: 15px;
		}
		.topleft{
			float: left;
		}
		.topleft .img1{
			display: block;
			float: left;
			margin-top: 5px;
			width: 50px;
			height: 50px;
			border-radius: 50%;
		}
		.topleft .img2{
			width: 100px;
			height: 30px;
			display: block;
			float: left;
			margin-top: 15px;
			margin-left: 10px;
		}
		.topright{
			line-height: 60px;
			float: right;
		}
		.search{
			float: right;
			line-height: 60px;
			margin-right: 20px;
		}
	</style>
</head>
<title>胖友的博客(初级版)</title>
<body>
<div id="top">
	<div class="container">
		<div class="topleft">
			<a href="index.php"><img class="img1" src="./Public/Home/images/logo.jpg" alt=""></a>
			<a href="index.php"><img class="img2" src="./Public/Home/images/12.jpg" alt=""></a>
			
		</div>
		<div class="topright">
			<?php if(isset($_SESSION["username"])){?>
                
			<span>欢迎</span><?php echo $_SESSION["username"]?>回来
			<a href="./index.php?a=out">退出</a>
			<?php }else{?>
			<a href="index.php?a=login">登录</a>
			<b>|</b>
			<a href="index.php?a=reg">注册</a>
			
               <?php }?>
		</div>
		<form action="" method="post">
			<div class="search">
				<input type="text" style="line-height:25px;" name="search" id="">
				<input type="submit" title="请输入标题搜索" style="line-height:25px;" value="搜索">
			</div>
		</form>
	</div>
</div>
<div class="header">
	<div class="alert alert-success dv1 container" role="alert">
	</div>
		<div class="alert alert-success" role="alert">
		<?php  $das = Db::table('classify')->get(); ?>
		<?php foreach ($das as $v){?>
		<a href="
			<?php if($v["cname"]=="首页"){?>
                index.php
			<?php }else{?>index.php?a=show_one&id=<?php echo $v['cid']?>
			
               <?php }?>
		" class="btn btn-warning"><?php echo $v['cname']?></a>
		<?php }?>
	</div>
</div>