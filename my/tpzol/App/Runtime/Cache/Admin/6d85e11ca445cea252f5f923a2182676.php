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
	    </style>
	</head>
	<body>
		<div class="dv1 form-group">
			您当前的位置是:<span>首页 > 类型管理 > 类型列表</span>
		</div>
		<table class="table table-hover">
			<tr class="active">
			  <th width="100">类型ID</th>
			  <th>类型名称</th>
			  <th width="210">操作</th>
			</tr>
			<?php if(is_array($data)): foreach($data as $k=>$v): ?><tr>
				<td><?php echo ($v['tid']); ?></td>
				<td><?php echo ($v['tname']); ?></td>
				<td>
					<a href="<?php echo U('TypeAttr/index',array('tid'=>$v['tid']));?>" class="btn btn-sm btn-primary">属性列表</a>
					<a href="<?php echo U('edit',array('tid'=>$v['tid']));?>" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确定删除吗?')) location.href='<?php echo U('del',array('tid'=>$v['tid']));?>'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
		</table>
	</body>
</html>