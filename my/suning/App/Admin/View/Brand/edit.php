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
	    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
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
	    <script type="text/javascript" src="./Public/jquery-1.8.2.min.js"></script>
    		<script type="text/javascript">
    		$(function(){
    			$('#close_img').click(function() {
    				// 显示上传表单*********
    				$('#img_box').html('<input id="exampleInputEmail1" type="file" name="logo">');
    			});
    		})
    		</script>
	</head>
	<body>
		<div class="dv1 form-group">
			您当前的位置是:<span>首页 > 品牌管理 > 品牌列表 > 编辑品牌</span>

			<a href="Javascript:window.history.go(-1)" class="return">
				返回上一步
			</a>
		</div>
		<form method="post" action="" enctype="multipart/form-data">
		<div class="alert alert-success">编辑品牌</div>
		<div class="form-group">
			<label for="exampleInputEmail1">品牌名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入品牌名称" value="{{$oldData['bname']}}" name="bname">
		</div>
		<div class="form-group dv2">
			<label for="exampleInputEmail1" class="label1">是否热门</label>
			<input type="radio" class="radio" {{if value="$oldData['ishot'] == '是'" }}checked{{endif}} value="是" name="ishot" id="">
			<span>是</span> 
			<input type="radio" class="radio"{{if value="$oldData['ishot'] == '否'" }}checked{{endif}} value="否" name="ishot" id="">
			<span>否</span>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">LOGO品牌</label>
			<div id="img_box">
				<!-- 如果这篇文章有图片 -->
				{{if value="$oldData['logo']"}}
				<img src="{{$oldData['logo']}}" style="width:250px;height:auto;" alt="" id="img">
				<a id="close_img" href="javascript:;">x</a>
				<input type="hidden" name="logo" value="{{$oldData['logo']}}">
				{{else}}
				<!-- 没有图片显示上传表单 -->
				<input id="exampleInputEmail1" type="file" name="logo">
				{{endif}}
			</div>
		</div>
		<input type="hidden" name="bid" value="{{$_GET['bid']}}">
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
