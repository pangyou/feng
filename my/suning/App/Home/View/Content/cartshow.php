<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>苏宁易购-我的购物车</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="./Public/Home/css/index1.css" />
<link rel="stylesheet" href="./Public/Home/css/gouwu1.css" />
</head>
<body>
	<!--头部开始-->
	<div id="head">
		<div class="top">
			<div class="top_left">
				<a class="a1" href="{{U('Index/index')}}">
					<i class="glyphicon glyphicon-home"></i>
					返回易购首页
				</a><b>|</b>
				<div class="box">	
					<span>网站导航</span>
				</div>
				<a href="">商家入驻</a>
			</div>
			<div class="top_right">
				<ul>
					<li>
					{{if value="isset($_SESSION['aid'])"}}
					<a href="{{U('Login/index')}}">{{$_SESSION['nickname']}}...</a>
					{{else}}
					<a href="{{U('Login/index')}}">登录</a>
					{{endif}}
					</li>
					<li><a href="">注册</a></li>
					<li><a href="{{U('Person/orders')}}">我的订单</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li><a href="{{U('Person/index')}}">我的易购</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li class="gouwuche">
						<em class="glyphicon glyphicon-shopping-cart"></em>
						<a href="">购物车</a>
						<span class="total_num" id='total_num'>
							{{if value="isset($_SESSION['cart']['goods'])"}}
							<b>{{count($_SESSION['cart']['goods'])}}</b>
							{{else}}
							<b>0</b>
							{{endif}}
						</span>
					</li>				
					<li>
						<em></em>
						<a href="">手机苏宁</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
					<li><a href="">易付宝</a></li>
					<li><a href="">政府采购</a></li>
					<li>
						<a href="">客户服务</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
	<!--头部结束-->
	<!--步骤设置开始-->
	<div id="search">
		<div class="left">
			<img src="./Public/Home/images/logo.png" alt="" />
		</div>
		<div class="right">
			<ul class="step">
				<li class="now">
					<i>1</i>
					<span>我的购物车</span>
					<b></b>
				</li>
				<li>
					<i>2</i>
					<span>确认订单</span>
					<b></b>
				</li>
				<li>
					<i>3</i>
					<span>付款</span>
					<b></b>
				</li>
				<li>
					<i>4</i>
					<span>支付成功</span>
					<b></b>
				</li>
			</ul>
		</div>
	</div>
	<!--步骤区域设置结束-->
	<div id="cart-one">
		<div class="city">
			<span>送货至</span>
			<!-- 城市联动 -->
			<div class="citySelect">
				<select name="" id="area1"></select>
				<select name="" id="area2"></select>
				<select name="" id="area3"></select>
			</div>
		</div>
	</div>
	<form action="{{U('cartSub')}}" method="post">
	<div id="cart2">
		<div class="son1">
			<ul class="ul_son">
				<li class="li1">
					<input type="checkbox" class="radio input allcheck" checked  />
					<span>全选</span>
				</li>
				<li class="li2">商品信息</li>
				<li class="li3">单价(元)</li>
				<li class="li4">数量</li>
				<li class="li5">小计(元)</li>
				<li>操作</li>
			</ul>
		</div>
		{{foreach from="$data" key="$k" value='$v'}}
		<div class="son2">
			<div class="left">
				<!-- <input type="checkbox" class="input" checked name="" id="" /> -->
				<a href="">zjieyu/中大鳄鱼佳和盛专营店</a>
				<a class="bg" href=""></a>
			</div>
			<p class="price">运费:  ¥   0.00</p>
		</div>
		<div class="son3">
			<ul class="ul_son">
				<li class="li1">
					<input type="checkbox" class="radio input xuan dian" checked name="sid[]" value="{{$k}}" id="" />
					<a href=""><img src="{{$v['pic']}}" alt="" /></a>
				</li>
				<li class="li2">
					<a href="{{U('Content/index',array('gid'=>$v['id']))}}" target="_blank">{{$v['name']}}</a>
					{{foreach from="$v['options']" value='$vv'}}
					<span>{{$vv}}</span>
					{{endforeach}}
				</li>
				<li class="li3">
					<em>¥</em><span>{{$v['price']}}</span>
				</li>
				<li class="li4">
					<div class="num">
						<!-- <a class="reduce dian" href="{{U('cartUpdate',array('num'=>$v['num']-1,'sid'=>$k))}}">-</a> -->
						<a class="reduce dian" sid="{{$k}}" num="{{$v['num']}}" href="javascript:;">-</a>
						<input type="text" name="inputNum" class="inputNum" value="{{$v['num']}}" id="" />
						<!-- <a class="add dian" href="{{U('cartUpdate',array('num'=>$v['num']+1,'sid'=>$k))}}">+</a> -->
						<a class="add dian" sid="{{$k}}" num="{{$v['num']}}" href="javascript:;">+</a>
					</div>	
				</li>
				<!-- post提交的数值 -->
				<input type="hidden" name="inputNum" >
				<li class="li5">
					¥<strong>{{$v['total']}}</strong>
				</li>
				<li class="li6">
					<a href="">移入收藏</a>
					<a href="javascript:if(confirm('确定删除吗?'))location.href='{{U('Content/cartDel',array('sid'=>$k))}}'">删除</a>
					<a href="">查找相似</a>
				</li>
			</ul>
		</div>
		{{endforeach}}
		<div class="son4">
			<div class="left">
				<input type="checkbox" class="inputc input allcheck" checked />
				<a class="a1" href="">全选</a>
				<a class="a2" href="javascript:if(confirm('确定删除吗?'))location.href='{{U('Content/cartOut')}}'">删除全部商品</a>
			</div>
			<div class="right">
				<div class="dv1">
					<p class="price">
						<span>总价（含运费）：</span>
						{{if value="$_SESSION"}}
						¥<em>{{Cart::getTotalPrice()}}</em>
						{{else}}
						<em>0.00</em>
						{{endif}}
					</p>
					<p class="save">
						<a href="javascript:;">
							已选商品 
							{{if value="$_SESSION"}}
							<em id='em1'>{{count($_SESSION['cart']['goods'])}}</em>
							{{else}}
							<em id='em1'>0</em>
							{{endif}}
							件
						</a>
						<span>为您节省：<em>¥ 0.00</em></span>
						<span>运费（以结算页为准）：<em>¥ 0.00</em></span>
					</p>
				</div>
				{{if value="$_SESSION['cart']['total'] == 0"}}
				<div id="goods_exist">
					<a class="nogoods" href="javascript:;" style="" title="请至少选一件商品,再去结算">去结算</a>
				</div>
				{{else}}
				<div id="goods_exist">
					<input type="submit" class="jiesuan" value="去结算">
				</div>
				{{endif}}
			</div>
		</div>
	</div>
	</form>
	<script type="text/javascript" src="./Public/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
	$(function(){
		// 全部选中效果
		$('.allcheck').click(function() {
			var fathis = this;
			$('.input').each(function() {
				this.checked = fathis.checked;
			});
			// 总价
			var allmoneys = 0;
			// 个数
	    	var num = 0;
			// 点击全部选中改变总价
	   		$('.xuan').each(function() {
	   			if(this.checked){
	   				// 每一个当前选中的价格
		   			var allmoney = parseInt($(this).parents('.son3').find('.li5').find('strong').html());
		   			var nnum = $(this).length;
		   			num += nnum;
		   			allmoneys +=allmoney;
	   			}
	   		});
	   		$('.son4 .right .dv1 .price em').html(allmoneys);
	   		$('#em1').html(num);
	   		if(num == 0){
	   			$('#goods_exist').html('<a class="nogoods" href="javascript:;" style="" title="请至少选一件商品,再去结算">去结算</a>');
	   		}else{
	   			$('#goods_exist').html('<input type="submit" class="jiesuan" value="去结算">');
	   		}
		});
		// 数字加减效果
		 // 点击加一次数字加1
	    $('.add').live('click', function() {
	    	// 哪个商品的唯一sid和数量
	    	var sidnum ={
	    		'sid':$(this).attr('sid'),
	    		'num':$(this).parents('.li4').find('.inputNum').val()
	    	}; 
	    	// 数量
	    	var addthis = $(this).parents('.li4').find('.inputNum');
	    	// 价格
	    	var price = $(this).parents('.ul_son').find('.li3').find('span');
	    	var num = parseInt(addthis.val())+1;
	    	if(num>99){
	    		addthis.val()=99;
	    	}
	    	// 数量改变
	    	addthis.val(num);
	    	//点击+,小价格改变
	    	$(this).parents('.ul_son').find('.li5').find('strong').html(num*price.html());
	    	// 发异步
	    	$.ajax({
	    		url: "{{U('addp')}}",
	    		type: 'post',
	    		dataType: 'json',
	    		data:{sidnum:sidnum},
	    		// 因为可以不响应,所以不写省略
	    		// success:function(phpData){
	    		// }
	    	})
	    });
	    // 点击减 数字减一
	    $('.reduce').live('click', function() {
	    	// 哪个商品的唯一sid和数量
	    	var sidnum ={
	    		'sid':$(this).attr('sid'),
	    		'num':$(this).parents('.li4').find('.inputNum').val()
	    	}; 
	    	// 数量
	    	var redthis = $(this).parents('.li4').find('.inputNum');
	    	// 价格
	    	// 价格
	    	var price = $(this).parents('.ul_son').find('.li3').find('span');
	    	var num = parseInt(redthis.val())-1;
	    	if(num<1){
	    		redthis.val() = 1;
	    	}
	    	redthis.val(num);
	    	//点击-,小价格改变
	    	$(this).parents('.ul_son').find('.li5').find('strong').html(num*price.html());
	    	// 发异步
	    	$.ajax({
	    		url: "{{U('addpre')}}",
	    		type: 'post',
	    		dataType: 'json',
	    		data:{sidnum:sidnum},
	    		success:function(phpData){
	    		}
	    	})
	    });
	    // 改变总价格增加,和选框的改变
	    $('.add').live('click', function() {
	   		var allmoneys = 0;
	   		$('.xuan').each(function() {
	   			// 如果是勾选状态(可以不写==true)
	   			if(this.checked == true){
	   				// 每一个当前选中的价格
		   			var allmoney = parseInt($(this).parents('.son3').find('.li5').find('strong').html());
		   			allmoneys +=allmoney;
	   			}
	   		});
	   		$('.son4 .right .dv1 .price em').html(allmoneys);
	    });
	    // 改变总价格减少,和选框的改变
	    $('.dian').live('click', function() {
	    	var allmoneys = 0;
	    	var num = 0;
	   		$('.xuan').each(function() {
	   			if(this.checked){
	   				var nnum = $(this).length;
		   			num += nnum;
	   				// 每一个当前选中的价格
		   			var allmoney = parseInt($(this).parents('.son3').find('.li5').find('strong').html());
		   			allmoneys +=allmoney;
	   			}
	   		});
	   		$('#em1').html(num);
	   		$('.son4 .right .dv1 .price em').html(allmoneys);
	    });
	    $('.xuan').live('click', function() {
	    	// 获取商品数量(如果为0则不能选择)
	    	var num = $('#em1').html();
    		if(num == 0){
	   			$('#goods_exist').html('<a class="nogoods" href="javascript:;" style="" title="请至少选一件商品,再去结算">去结算</a>');
	   		}else{
	   			$('#goods_exist').html('<input type="submit" class="jiesuan" value="去结算">');
	   		}
	    });
	})
	</script>
	
	
	
	
	<!--猜你喜欢设置开始-->
	<div id="nav">
	{{include file='../Common/like'}}
	</div>
	<!--猜你喜欢设置结束-->
	<!--底部设置开始-->
	{{include file="../Common/foot"}}
	<!--底部设置结束-->	
	<script type="text/javascript" src="./Public/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./Public/Home/js/area.js"></script>
	<script type="text/javascript">
		$(function(){
			// 城市联动
			//初始化方法
			area.init('area');
			//修改的时候默认被选中效果
			area.selected('北京市','北京','东城区');
		})
	</script>
	
</body>
</html>
