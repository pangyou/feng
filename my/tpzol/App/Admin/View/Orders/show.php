<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="__PUBLIC__/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="__PUBLIC__/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link rel="shortcut icon" href="__PUBLIC__/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<form action="{{:U('OrderList/send')}}" method="post">
		<table class="table table-hover">
			<tr class="active">
			  <th width="120">订单表ID</th>
			  <th>订单号</th>
			  <th>订单状态</th>
			  <th>操作</th>
			</tr>
			<foreach name='data' item='v'>
			<tr>
				<td>{{$v['oid']}}</td>
				<td>{{$v['number']}}</td>
				<td>{{$v['state']}}</td>
				<td>
					<if condition="$v['state'] eq '待发货'">
					<a href="{{:U('Order/send',array('olid'=>$v['olid']))}}" class="btn btn-sm btn-primary">发货</a>
					</if>
				</td>
			</tr>
			</foreach>
		</table>
		</form>
	</body>
</html>
