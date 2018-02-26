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
	    <style type="text/css">
			.dv1{
				height: 30px;
				background: url(./Public/Admin/images/path.png) repeat-x 0px 0px;
				color: #fff;
				font-size: 18px;
				padding-left: 20px;
				line-height: 30px;
			}
			.dv1 span{
				margin-left: 10px;
			}
			.return{
				font-size: 18px;
				text-align: center;
				display: block;
				width: 150px;
				height: 25px;
				line-height: 25px;		
				float: right;
				margin-right: 140px;
				padding: 0px;
				margin-top: 2px;
				background: #0066CC;
				opacity: 0.7;
				color: #fff;
				padding: 0 10px;
			}
			.return:hover{
				background: #004ECC;
				color: #fff;
			}
	    </style>
	</head>
	<body>
		<div class="dv1 form-group">
			您当前的位置是:<span>首页 > 类型管理 > 类型列表> 属性列表</span>

			<a href="Javascript:window.history.go(-1)" class="return">
				返回上一步
			</a>
		</div>

		<table class="table table-hover">
			<tr class="active">
			  <th width="100">属性ID</th>
			  <th width="100">属性名称</th>
			  <th width="100">属性类别</th>
			  <th>属性值</th>
			  <th width="210">操作</th>
			</tr>
			{{foreach from='$data' value='$v' }}
			<tr>
				<td>{{$v['taid']}}</td>
				<td>{{$v['taname']}}</td>
				<!-- 属性在上面(就是能修改的部分,规格在下面) -->
				<td>{{$v['class']}}</td>
				<td>{{$v['tavalue']}}</td>
				<td>
					<a href="{{U('edit',array('taid'=>$v['taid'],'tid'=>$_GET['tid']))}}" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确定删除吗?')) location.href='{{U('del',array('taid'=>$v['taid']))}}'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
		<a href="{{U('add',array('tid'=>$_GET['tid']))}}" class="btn btn-primary btn-block">添加属性</a>
	</body>
</html>
