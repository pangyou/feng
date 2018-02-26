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
			  <th>订单ID</th>
			  <th>订单名称</th>
			  <th>购买数量</th>
			  <th>价格小计</th>
			  <th>备注</th>
			</tr>
			<tr>
				<td>{{$data['olid']}}</td>
				<td><input type="text" name="gname" value="{{$data['gname']}}" id=""></td>
				<td><input type="text" name="count" value="{{$data['count']}}" id=""></td>
				<td><input type="text" name="subtotal" value="{{$data['subtotal']}}" id=""></td>
				<td><input type="text" name="explain" value="{{$data['explain']}}" id=""></td>
			</tr>
			
		</table>
		<input type="submit" class="btn btn-block btn-primary" value="修改">
		<input type="hidden" name="olid" value="{{Q('get.olid')}}">
		</form>
	</body>
</html>
