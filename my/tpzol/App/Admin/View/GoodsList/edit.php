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
		<a class="btn btn-primary" href="Javascript:window.history.go(-1)">返回上一步</a>
		<table class="table table-hover">
			<tr class="active">
			  <th width="100">货品ID</th>
			  <foreach name="typeData" item="v">
			  <th>{{$v['taname']}}</th>
			  </foreach>
			  <th>库存</th>
			  <th>货号</th>
			</tr>
			<tr>
				<td>{{$data['glid']}}</td>
				<?php foreach ($spec as $v) { ?>
				<td>
					<select name="combine[]" class="form-control">
						<option value="0">--请选择--</option>
						<!-- 颜色,尺寸 -->
						<foreach name="v" key="kk" item='va'>
						<option value="{{$kk}}" <if condition="in_array($kk,$data['combine'])" >selected</if> >{{$va}}</option>
						</foreach>
					</select>
				</td>
				<?php } ?>
				<td><input type="text" name="inventory" id="" value="{{$data['inventory']}}"></td>
				<td><input type="text" name="number" id="" value="{{$data['number']}}"></td>
			</tr>
		</table>
		<input type="hidden" name="glid" value="{{$_GET['glid']}}">
		<button class="btn btn-primary btn-block" type="submit">修改 </button>
		
		
		</form>
	</body>
</html>
