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
		<form action="<?php echo U('OrderList/send')?>" method="post">
		<table class="table table-hover">
			<tr class="active">
			  <th width="120">订单列表ID</th>
			  <th>订单号</th>
			  <th>订单状态</th>
			  <th>操作</th>
			</tr>
			<?php foreach ($data as $v){?>
			<tr>
				<td><?php echo $v['olid']?></td>
				<td><?php echo $v['number']?></td>
				<td><?php echo $v['nstate']?></td>
				<td>
					<a href="<?php echo U('del',array('oid'=>$v['oid']))?>" class="btn btn-sm btn-primary">删除</a>
				</td>
			</tr>
			<?php }?>
		</table>
		</form>
	</body>
</html>
