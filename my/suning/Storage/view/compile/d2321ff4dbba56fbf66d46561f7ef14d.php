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
	</head>
	<body>
		<form action="" method="post">
		<table class="table table-hover">
			<tr class="active">
			  <th width="100">分类ID</th>
			  <th>分类名称</th>
			  <th>分类排序</th>
			  <th width="210">操作</th>
			</tr>
			<?php foreach ($data as $v){?>
			<tr>
				<td><?php echo $v['cid']?></td>
				<td><?php echo $v['_name']?></td>
				<td><input type="text" name="<?php echo $v['cid']?>" value="<?php echo $v['csort']?>"></td>
				<td>
					<a href="<?php echo U('addSon',array('cid'=>$v['cid']))?>" class="btn btn-sm btn-primary">添加子类</a>
					<a href="<?php echo U('edit',array('cid'=>$v['cid']))?>" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定删除吗?')) location.href='<?php echo U('del',array('cid'=>$v['cid']))?>'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
		<button class="btn btn-primary btn-block" type="submit">排序 </button>
		</form>
	</body>
</html>
