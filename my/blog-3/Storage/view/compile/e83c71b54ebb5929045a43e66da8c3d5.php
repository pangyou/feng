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
		<table class="table table-hover">
			<tr class="active">
			  <th width="30">aid</th>
			  <th>标题</th>
			  <th width="100">分类</th>
			  <th width="200">操作</th>
			  <th>发表时间</th>
			</tr>
			<?php foreach ($data as $v){?>
			<tr>
				<td><?php echo $v['aid']?></td>
				<td><?php echo $v['title']?></td>
				<td><?php echo $v['cname']?></td>
				<td>
					<a href="<?php echo U('edit',array('aid'=>$v['aid']))?>" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定要删吗?')) location.href='<?php echo U('del',array('aid'=>$v['aid']))?>'" class="btn btn-sm btn-danger">删除</a>
				</td>
				<td><?php echo date('Y-m-d',$v['sendtime'])?></td>
			</tr>
			<?php }?>
		</table>
		<center>
		  <ul class="pagination" style="background: #ADD426;">
		   <?php echo $page?>
		  </ul>
		</center>
	</body>
</html>
