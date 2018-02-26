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
			  <th width="100">订单表ID</th>
			  <th>订单号</th>
			  <th width="100">收货地址</th>
			  <th width="100">收货人</th>
			  <th>收货人电话</th>
			</tr>
			<tr>
				<td>{{$data['oid']}}</td>
				<td><input type="text" name="number" value="{{$data['number']}}" id=""></td>
				<td><input type="text" name="address" value="{{$data['address']}}" id=""></td>
				<td><input type="text" name="consignee" value="{{$data['consignee']}}" id=""></td>
				<td><input type="text" name="phone" value="{{$data['phone']}}" id=""></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-block btn-primary" value="修改">
		<input type="hidden" name="oid" value="{{Q('get.oid')}}">
		</form>
	</body>
</html>
