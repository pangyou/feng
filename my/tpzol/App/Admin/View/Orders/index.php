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
		<form action="" method="post">
		<table class="table table-hover">
			<tr class="active">
			  <th width="100">订单表ID</th>
			  <th>订单号</th>
			  <th width="100">收货地址</th>
			  <th width="100">收货人</th>
			  <th>收货人电话</th>
			  <th>订单时间</th>
			  <th>操作</th>
			</tr>
			<foreach name='data' item='v'>
			<tr>
				<td>{{$v['oid']}}</td>
				<td>{{$v['number']}}</td>
				<td>{{$v['address']}}</td>
				<td>{{$v['consignee']}}</td>
				<td>{{$v['phone']}}</td>
				<td>{{$v['otime']|date='Y-m-d',###}}</td>
				<td>
					<a href="{{:U('edit',array('oid'=>$v['oid']))}}" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定删除吗?')) location.href='{{:U('del',array('oid'=>$v['oid']))}}'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			</foreach>
		</table>
		</form>
	</body>
</html>
