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
	</head>
	<body>
		<form onsubmit="return hd_submit(this,'<?php echo U('add');?>','<?php echo U('index');?>')">
		<div class="alert alert-success">添加分类</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类名称" required="" name="cname">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">所属分类</label>
			<select name="pid" class="form-control">
				<option value="0">顶级分类</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">所属类型</label>
			<select name="type_tid" class="form-control">
				<option value="0">请选择</option>
				<?php if(is_array($type)): foreach($type as $key=>$v): ?><option value="<?php echo ($v['tid']); ?>"><?php echo ($v['tname']); ?></option><?php endforeach; endif; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">分类排序</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序" required="" name="csort" value="100">
		</div>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>