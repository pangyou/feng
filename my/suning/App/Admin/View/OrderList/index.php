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
			  <th>订单列表ID</th>
			  <th>订单名称</th>
			  <th width="100">购买数量</th>
			  <th width="100">价格小计</th>
			  <th>备注</th>
			  <th>操作</th>
			</tr>
			{{foreach from='$data' value='$v'}}
			<tr>
				<td>{{$v['olid']}}</td>
				<td>{{$v['gname']}}</td>
				<td>{{$v['count']}}</td>
				<td>{{$v['subtotal']}}</td>
				<td>{{$v['explain']}}</td>
				<td>
					<a href="{{U('edit',array('olid'=>$v['olid'],'oid'=>Q('get.oid')))}}" class="btn btn-sm btn-warning">编辑</a>
					<a href="javascript:if(confirm('确定删除吗?')) location.href='{{U('del',array('olid'=>$v['olid']))}}'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
		</form>
	</body>
</html>
