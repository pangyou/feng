<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="/tpzol/Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link rel="shortcut icon" href="/tpzol/Public/Admin/Flat/img/favicon.ico">
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
			  <th width="100">订单表ID</th>
			  <th>订单号</th>
			  <th>收货地址</th>
			  <th width="100">收货人</th>
			  <th>收货人电话</th>
			</tr>
			<tr>
				<td><?php echo ($data['oid']); ?></td>
				<td><input style="width:200px" type="text" name="number" value="<?php echo ($data['number']); ?>"></td>
				<td><input style="width:250px" type="text" name="address" value="<?php echo ($data['address']); ?>"></td>
				<td><input type="text" name="consignee" value="<?php echo ($data['consignee']); ?>"></td>
				<td><input type="text" name="phone" value="<?php echo ($data['phone']); ?>"></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-block btn-primary" value="修改">
		<input type="hidden" name="oid" value="{{Q('get.oid')}}">
		</form>
	</body>
</html>