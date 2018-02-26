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
	</head>
	<body>
		<form action="<?php echo U('OrderList/send');?>" method="post">
		<table class="table table-hover">
			<tr class="active">
			  <th width="120">订单表ID</th>
			  <th>订单号</th>
			  <th>订单状态</th>
			  <th>操作</th>
			</tr>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td><?php echo ($v['oid']); ?></td>
				<td><?php echo ($v['number']); ?></td>
				<td><?php echo ($v['state']); ?></td>
				<td>
					<?php if($v['state'] == '待发货'): ?><a href="<?php echo U('Order/send',array('olid'=>$v['olid']));?>" class="btn btn-sm btn-primary">发货</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; ?>
		</table>
		</form>
	</body>
</html>