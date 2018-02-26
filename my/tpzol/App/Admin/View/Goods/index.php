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
			  <th width="100">商品ID</th>
			  <th>商品名称</th>
			  <th style="text-align:center">价格</th>
			  <th width="60">库存</th>
			  <th width="100">点击次数</th>
			  <th width="120">上架时间</th>
			  <th width="210" style="text-align:center">操作</th>
			</tr>
			<foreach name='data' item='v'>
			<tr>
				<td>{{$v['gid']}}</td>
				<td><a href="">{{$v['gname']}}</a></td>
				<td style="text-align:center">
					<span>市场价: <del>{{$v['mprice']}}</del></span>
					<span>商城价: {{$v['sprice']}}</span>
				</td>
				<td>{{$v['total']}}</td>
				<td>{{$v['click']}}</td>
				<td>{{$v['uptime']|date='Y-m-d',###}}</td>
				<td>
					<a href="{{:U('GoodsList/index',array('gid'=>$v['gid']))}}" class="btn btn-sm btn-primary">货品列表</a>
					<a href="{{:U('edit',array('gid'=>$v['gid']))}}" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确定删除吗?')) location.href='{{:U('del',array('gid'=>$v['gid']))}}'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			</foreach>
		</table>
		</form>
	</body>
</html>
