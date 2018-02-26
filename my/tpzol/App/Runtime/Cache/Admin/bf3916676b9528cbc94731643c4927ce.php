<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="/my/tpzol/Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="/my/tpzol/Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link rel="shortcut icon" href="/my/tpzol/Public/Admin/Flat/img/favicon.ico">
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
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td><?php echo ($v['gid']); ?></td>
				<td><a href=""><?php echo ($v['gname']); ?></a></td>
				<td style="text-align:center">
					<span>市场价: <del><?php echo ($v['mprice']); ?></del></span>
					<span>商城价: <?php echo ($v['sprice']); ?></span>
				</td>
				<td><?php echo ($v['total']); ?></td>
				<td><?php echo ($v['click']); ?></td>
				<td><?php echo (date('Y-m-d',$v['uptime'])); ?></td>
				<td>
					<a href="<?php echo U('GoodsList/index',array('gid'=>$v['gid']));?>" class="btn btn-sm btn-primary">货品列表</a>
					<a href="<?php echo U('edit',array('gid'=>$v['gid']));?>" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确定删除吗?')) location.href='<?php echo U('del',array('gid'=>$v['gid']));?>'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
		</table>
		</form>
	</body>
</html>