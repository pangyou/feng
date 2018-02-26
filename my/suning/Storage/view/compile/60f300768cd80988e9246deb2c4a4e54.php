<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	    <!-- 1,载入jq前端库的ajax -->
	    <!-- 2,在CateController控制器添加json -->
	    <!-- 3,在form 第一行修改 -->
	    <script src="./Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	    <script src="./Public/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
	    <link rel="stylesheet" type="text/css" href="./Public/hdjs/hdjs.css"/>
	    <style type="text/css">
			.dv1{
				height: 30px;
				background: url(./Public/Admin/images/path.png) repeat-x 0px 0px;
				color: #fff;
				font-size: 18px;
				padding-left: 20px;
				line-height: 30px;
			}
			.dv1 span{
				margin-left: 10px;
			}
			.return{
				font-size: 18px;
				text-align: center;
				display: block;
				width: 150px;
				height: 25px;
				line-height: 25px;		
				float: right;
				margin-right: 140px;
				padding: 0px;
				margin-top: 2px;
				background: #0066CC;
				opacity: 0.7;
				color: #fff;
				padding: 0 10px;
			}
			.return:hover{
				background: #004ECC;
				color: #fff;
			}
	    </style>
	</head>
	<body>
		<div class="dv1 form-group">
			您当前的位置是:<span>首页 > 类型管理 > 添加类型</span>

			<a href="Javascript:window.history.go(-1)" class="return">
				返回上一步
			</a>
		</div>
		<form onsubmit="return hd_submit(this,'<?php echo U('add')?>','<?php echo U('index')?>')">
		<div class="alert alert-success">添加类型</div>
		<div class="form-group">
			<label for="exampleInputEmail1">类型名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入类型名称"  name="tname">
		</div>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
