<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="/tpzol/Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="/tpzol/Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link rel="shortcut icon" href="/tpzol/Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	    
	</head>
	<body>
	<!-- action="javascript:void(0);" -->
		<form action="" method="post" name="from">
			<a class="btn btn-primary" href="Javascript:window.history.go(-1)">返回上一步</a>
		<table class="table table-hover">
			<tr class="active">
			  <th width="100">货品ID</th>
			  <?php if(is_array($spec)): foreach($spec as $key=>$v): ?><th><?php echo ($v['taname']); ?></th><?php endforeach; endif; ?>
			  <th>库存</th>
			  <th>货号</th>
			  <th width="210">操作</th>
			</tr>
			<?php foreach ($data as $v) { ?>
			<tr class="active">
				<td><?php echo ($v['glid']); ?></td>
				<!-- 调取控制器数据 -->
				<?php if(is_array($v['combine'])): foreach($v['combine'] as $key=>$va): ?><td><?php echo ($va); ?></td><?php endforeach; endif; ?>
				<td><?php echo ($v['inventory']); ?></td>
				<td><?php echo ($v['number']); ?></td>
				<td>
					<a href="<?php echo U('edit',array('glid'=>$v['glid'],'gid'=>$_GET['gid']));?>" class="btn btn-sm btn-warning">修改</a>
					<a href="javascript:if(confirm('确定删除吗?')) location.href='<?php echo U('del',array('glid'=>$v['glid'],'gid'=>$_GET['gid']));?>'" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php } ?>
			<tr class="active">
				<td>添加货品</td>
				<!-- 调取控制器数据 -->
				<?php foreach ($spec as $v) { ?>
				<td>
					<select name="gavalue[]" class="form-control">
						<option value="0">--请选择--</option>
						<!-- 颜色,尺寸 -->
						<?php if(is_array($v['gaid'])): foreach($v['gaid'] as $k=>$vv): ?><option value="<?php echo ($k); ?>"><?php echo ($vv); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
				<?php } ?>
				<td><input type="text" placeholder='必须填写' required='' name="inventory" id=""></td>
				<td><input type="text" placeholder="可以不写货号,自动生成" name="number" id=""></td>
				<td></td>
			</tr>
		
		</table>
		<button class="btn btn-primary" id="add" type="submit">保存添加 </button>
		
		</form>

			<script type="text/javascript" src="/tpzol/Public/jquery-1.8.2.min.js"></script>
			<script type="text/javascript">
			$(function(){
				var sel = $('select[name="gavalue[]"]');
				var len = sel.length;
				// 异步添加
				sel.change(function () {
					var remote = {
						'gid' : <?php echo $_GET['gid'] ?>,
						'gavalue' : {}
					};
					for (var i = 0; i < len; ++i)
					{
						if (sel.eq(i).val() == 0)
						{
							return;
						}
						else
						{
							remote.gavalue[i] = sel.eq(i).val();
						}
					}
					// alert(sel.val());
					 // 发异步
					$.ajax({
		    			// 请求地址
						url : "<?php echo U('check');?>",
						// 请求方式
						type : 'get',
						// 传过去的值
						data : remote,
						// 返回json类型
						dataType : 'json',
						success : function(phpData)
						{
							if (phpData == 0)
							{
								alert('货品已存在，如果要修改库存，请点击修改');
								for (var i = 0; i < len; ++i)
								{
									sel.eq(i).val(0);
								}
							}
						}
					})
				});
			})
			</script>
	</body>
</html>