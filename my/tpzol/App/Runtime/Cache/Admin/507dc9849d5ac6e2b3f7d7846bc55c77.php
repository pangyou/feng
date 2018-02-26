<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="/tpzol/Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="/tpzol/Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link rel="shortcut icon" href="/tpzol/Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	    <!-- 1,载入jq前端库的ajax -->
	    <!-- 2,在CateController控制器添加json -->
	    <!-- 3,在form 第一行修改 -->
	    <script src="/tpzol/Public/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	    <script src="/tpzol/Public/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
	    <link rel="stylesheet" type="text/css" href="/tpzol/Public/hdjs/hdjs.css"/>
		<style type="text/css">
			.dv1{
				height: 30px;
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
			input.radio{
				position: relative;
				top: 2px;
				margin-right: 5px;
				float: left;
			}
			.label1{
				float: left;
				margin-right: 10px;
			}
			.dv2{
				height: 48px;
			}
			.dv2 span{
				float: left;
				margin-right: 5px;
			}
	    </style>
	</head>
	<body>
		<div class="dv1 form-group">
			您当前的位置是:<span>首页 > 类型管理 > 类型列表 > 属性列表 > 添加属性</span>

			<a href="Javascript:window.history.go(-1)" class="return">
				返回上一步
			</a>
		</div>
		<form onsubmit="return hd_submit(this,'<?php echo U('add');?>','<?php echo U('TypeAttr/index',array('tid'=>$_GET['tid']));?>')">
		<div class="alert alert-success">添加属性</div>
		<div class="form-group">
			<label for="exampleInputEmail1">属性名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入属性名称"  name="taname">
		</div>
		<div class="form-group dv2">
			<label for="exampleInputEmail1" class="label1">属性类别</label>
			<input type="radio" class="radio" value="属性" checked name="class" id="">
			<span>属性</span> 
			<input type="radio" class="radio" value="规格" name="class" id="">
			<span>规格</span>
		</div>
		<div class="form-group"><span></span> 
			<label for="exampleInputEmail1">属性值(添加多个属性值请按照,分开)</label>
			<textarea name="tavalue" rows="5" cols=""  class="form-control" placeholder="添加多个属性值请按照,分开"></textarea>
		</div>
		<input type="hidden" name="type_tid" value="<?php echo ($_GET['tid']); ?>">
		<button class="btn btn-primary btn-block" type="submit"> 添加 </button>
		</form>
	</body>
</html>