<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link href="/HD/resource/hdjs/css/bootstrap.min.css" rel="stylesheet">
    <link href="/HD/resource/hdjs/css/font-awesome.min.css" rel="stylesheet">
    <script src="/HD/resource/hdjs/js/jquery.min.js"></script>
    <script src="/HD/resource/hdjs/app/util.js"></script>
    <script src="/HD/resource/hdjs/require.js"></script>
    <script src="/HD/resource/hdjs/app/config.js"></script>
    <link rel="stylesheet" href="{{__VIEW__}}/button/css.css" />
</head>
<body>
	<div class="row" id="hd" ng-controller="ctrl">
		<form action="" method="post" ng-cloak class="ng-cloak">
		<div class="col-xs-5">
			<div class="mobile">
					<dl>
						<dt ng-repeat="v in data.button">
							<a href="#">@{{v.name}}</a>
							<ul>
								<li ng-repeat="s in v.sub_button"><a href="javascript:;" ng-bind="s.name"></a></li>
							</ul>
						</dt>
					</dl>
			</div>
		</div>
		<div class="col-xs-7">
			<div class="topMenu" ng-repeat="(k,v) in data.button">
				按钮名称：<input type="text" ng-model="v.name"/><br/>
				<label  ng-if="v.type=='click'">
				 关键词: <input type="text" ng-model="v.key"/><br />
				</label>
				<label  ng-if="v.type=='view'">
				 网址: <input type="text" ng-model="v.url" ng-if="v.type=='view'"/><br />
				</label>
				<br />
				<strong>类型:</strong> 
				关键词:@{{v.type}}
				<input type="radio" ng-model="v.type" value="click" />
				网址:
				<input type="radio" ng-model="v.type" value="view" />
				<h2>子菜单</h2>
				<div ng-repeat="s in v.sub_button">
					按钮名称：<input type="text" ng-model="s.name"/>
					<a href="javascript:;" ng-click="delSubButton(k,s)">(X)</a>
					<br/>
					<label  ng-if="s.type=='click'">
					 关键词: <input type="text" ng-model="s.key"/><br />
					</label>
					<label  ng-if="s.type=='view'">
					 网址: <input type="text" ng-model="s.url" ng-if="s.type=='view'"/><br />
					</label>
					<br />
					<strong>类型:</strong> 
					关键词:@{{s.type}}
					<input type="radio" ng-model="s.type" value="click" />
					网址:
					<input type="radio" ng-model="s.type" value="view" />
				</div>
				<button ng-click="addSubMenu(v)" type="button">添加子级菜单</button>
			</div>
			<button ng-click="addTopMenu()" type="button">添加一级菜单</button>
		</div>
		<textarea hidden name="data" rows="" cols=""></textarea>
		<button class="btn btn-danger">生成菜单</button>
		</form>
	</div>
</body>
</html>
<script>

	require(['angular','util','underscore'],function(angular,util,_){
		angular.module('myApp',[]).controller('ctrl',['$scope',function($scope){
			$scope.data=<?php echo $button?:'{"button":[]}'?>;
			//删除子菜单
			$scope.delSubButton=function(index,subMenu){
				$scope.data.button[index].sub_button = _.without($scope.data.button[index].sub_button,subMenu);
			}
			//添加子菜单
			$scope.addSubMenu=function(item){
				var menu = {	"type":"view","name":"","url":""}
				if(!item.sub_button){
					item.sub_button=[];
				}
				if(item.sub_button.length>=5){
					util.message('子菜单最多为5个','','warning');
					return ;
				}
				item.sub_button.push(menu);
			}
			//添加顶级菜单
			$scope.addTopMenu=function(){
				if($scope.data.button.length>=3){
					util.message('一级菜单最多有三个','','warning');
					return;
				}
				var menu={ "type":"click",
          				"name":"","key":""};
				$scope.data.button.push(menu)
			}
			$('form').submit(function(){
				if($scope.data.button.length==0){
					util.message('菜单至少一个','','error');
					return false;
				}
				var json = angular.toJson($scope.data);
				$("[name='data']").val(json);
			})
		}]);
		angular.bootstrap(document.getElementById('hd'),['myApp']);
	})
	
	
</script>