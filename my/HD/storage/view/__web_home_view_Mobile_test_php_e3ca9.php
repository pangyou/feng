<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link href="resource/hdjs/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/hdjs/css/font-awesome.min.css" rel="stylesheet">
    <script src="resource/hdjs/js/jquery.min.js"></script>
    <script src="resource/hdjs/app/util.js"></script>
    <script src="resource/hdjs/require.js"></script>
    <script src="resource/hdjs/app/config.js"></script>
    <style>
		.ng-cloak{display:none;}
	</style>
</head>
<!-- ng-cloak 数据绑定前隐藏标签,绑定后显示标签,避免闪烁效应 -->
<body ng-controller="ctrl" ng-cloak class="ng-cloak">
	<h1>手机号归属地查询</h1>
	<form onsubmit="return false;">
	 	<div class="form-group">
			<label>手机号</label>
			<input type="tel" class="form-control input-lg" name="tel" >
		</div>
		<button class="btn btn-success btn-lg btn-block">开始查询</button>
	<input type='hidden' name='__TOKEN__' value='ba42b1960b6aa66e9f9797509f612266'/></form>
	<div ng-if="res.carrier">
		<h2> 查询结果</h2>
		<div class="form-group">
			<label class="col-sm-2 control-label">归属地</label>
			<div class="col-sm-10">
				<p class="form-control-static" ng-bind="res.province"></p>
			</div>
		</div>
	</div>
	<h2 ng-if="message">正在查询中...</h2>
</body>
</html>
<script>
	require(['angular','util'],function(angular,util){
		angular.module('myApp',[]).controller('ctrl',['$scope',function($scope){
			$scope.res={};
			$scope.message='';
			//表单post提交事件
			$("form").submit(function(){
				$scope.res={};
				$scope.message='正在查询中';
				$scope.$apply();
				//发异步
				$.post("<?php echo u('send')?>",$(this).serialize(),function(res){
					if(res.valid){
						//发送成功
						$scope.res = res.data.retData;
						console.log($scope.res);
						$scope.message='';
						$scope.$apply();
					}else{
						util.message(res.message,'','error');
					}
				},'json');
			})
		}])
		
		angular.bootstrap(document.body,['myApp'])
	});
</script>