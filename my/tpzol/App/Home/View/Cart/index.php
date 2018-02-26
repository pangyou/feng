<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/cart.css"/>
		<script src="__PUBLIC__/Home/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<title></title>
		<script type="text/javascript">
			$(function(){
//				全选------------------------------------------------全选
//				总管变量
				var cx_num = 0;
//				默认全部选中
				$('[type="checkbox"]').prop('checked',true);
				$("#checkbox").click(function(){
					if(cx_num == 0){
						//全选时候，让它的属性为false就不是选中状态
						$('.sonche').prop('checked',false);
//						总管变量变1
						cx_num = 1;
						$('.price i').html('¥' + 0.00);
						$('#sub').css({background:'#DAD7D7'});
					}else{
						//属性是true的时候，就是选中状态
						$('.sonche').prop('checked',true);
						cx_num = 0;
						var chec = $('.sonche:checked');
						//定义一个数组来接收所有的sid
						var sid = {};
						//定义一个数组用来存所有商品的数字
						var num ={};
						//循环，将值压入到数组中，然后发送给控制器惊醒相应的控制
						for ( var i=0;i<chec.length;i++) {
							num[i] = $('.num').eq(i).val();
							sid[i] = $('.other').eq(i).attr('sid');
						}
//						console.log(sid);
//						console.log(num);
						//发送ajax
						$.ajax({
							type:"post",
							url:"{:U('Cart/all')}",
							data:{sid:sid,xnum:num},
							//确定返回的必须是json类型
							dataType:'json',
							success:function(data){
//								把返回的总价发送上去
								$('.price i').html(data[0]);
//								显示颜色
								$('#sub').css({background:'#FFB934'});
							}
						});
					}
					
				})
//				单选----------------------------------------------------------------------单选
				$('.sonche').change(function(){
					//当单件商品取消选中的情况下，全选状态就要取消
					$("#checkbox").prop('checked',false);
					cx_num = 1;
					//获得选中的商品
					var c = $('.sonche:checked');
//					alert(c.length);
					//如果没有没有选中的商品，就把总价和数量变化
					if(c.length == 0){
						$('.price i').html(0);
						//把确认罚款的颜色变了
						$('.sub').css({background:'#DAD7D7'});
						return;
					}
					//定义一个空数组，用来存商品的序列号
					var sid ={};
					//定义一个空数组，用来存商品的数量
					var num ={};
					
					for(var i=0;i<c.length;i++){
						sid[i] = $('.sonche:checked').eq(i).parents('.other').attr('sid');
						num[i] = $('.sonche:checked').eq(i).parents('.other').find('.num').val();
					}
//					console.log(sid);
//					console.log(num);
					//发送ajax
					$.ajax({
						type:"post",
						url:"{:U('Cart/checked_one')}",
						data:{sid:sid,num:num},
						dataType:'json',
						success:function(data){
							$('.price i').html(data[0]);
							$('.sub').css({background:'#FFB934'});
						}
					});
				});
//				加号----------------------------------------------------------------加号
				$('.plus').click(function(){
					//获得下标
					var num = $(this).index('.plus');
//					alert(num);
					//让val值增加
					var val_num = parseInt($('.num').eq(num).val()) + 1;
					//将值赋给第几个数据的val值
					$('.num').eq(num).val(val_num);
					//获得点击的自由属性值，即小计值，并转整乘以相应的数量，得到新的小计值，然后将html替换
					var l_pri = parseInt($('.s-2').eq(num).html()) * val_num;
					//将小计值替换下来，使用新的值
					$('.s-5').eq(num).html(l_pri);
					//如果全没有选中商品的时候，发送一个ajax，但是不改变下面的价格
					//获得session中商品的序列号
					var sid = $('.other').eq(num).attr('sid');
					var c = $('.sonche:checked');
//					如果没有商品被选中
					if(c.length == 0){
						//发送ajax数据，
						$.ajax({
							type:"post",
							//查看CartController 中的add方法
							url:"{:U('Cart/plus')}",
							//发送了两个值，一个是session中序列号，另一个是改变之后的商品数量值
							data:{sid:sid,numb:val_num},
							dataType:'json',
							success:function(phpdata){
								$('.s-5').html(phpdata[0]);
								$('.sub').css({background:'#DAD7D7'});
							}
						});
						return;
					}
//					判断选中的
					//定义一个新数组来接收每个商品的唯一sid
					var s = {};
					//定义一个新数组来接收每个商品的数量
					var cx = {};
//					看选中了几个 把选中的sid和数量发到数组中
					for(var i=0;i<c.length;i++){
						sid[i] = $('.sonche:checked').eq(i).parents('.other').attr('sid');
						num[i] = $('.sonche:checked').eq(i).parents('.other').find('.num').val();
					}
//					发送异步
					$.ajax({
						type:"post",
						url:"{:U('Cart/pluss')}",
						data:{s:s,n:cx,sid:sid,num:val_num},
						dataType:'json',
						success:function(data){
							$('.s-5').html(data[0]);
							$('.price i').html(data[1]);
						}
					});
				});
//				减号---------------------------------------------------------------------减号
				$('.minus').click(function(){
					var num = $(this).index('.minus');
					//让val值减小
					var val_num = parseInt($('.num').eq(num).val()) - 1;
//					如果等于0就停止
					if(val_num == 0){
						return;
					}
					//将值赋给第几个数据的val值
					$('.num').eq(num).val(val_num);
					//获得点击的自由属性值，即小计值，并转整乘以相应的数量，得到新的小计值，然后将html替换
					var l_pri = parseInt($('.s-2').eq(num).html()) * val_num;
					//将小计值替换下来，使用新的值
					$('.s-5').eq(num).html(l_pri);
					//如果全没有选中商品的时候，发送一个ajax，但是不改变下面的价格
					//获得session中商品的序列号
					var sid = $('.other').eq(num).attr('sid');
					var c = $('.sonche:checked');
//					如果没有商品被选中
					if(c.length == 0){
						//发送ajax数据，
						$.ajax({
							type:"post",
							//查看CartController 中的add方法
							url:"{:U('Cart/plus')}",
							//发送了两个值，一个是session中序列号，另一个是改变之后的商品数量值
							data:{sid:sid,numb:val_num},
							dataType:'json',
							success:function(phpdata){
								$('.s-5').html(phpdata[0]);
								$('.sub').css({background:'#DAD7D7'});
							}
						});
						return;
					}
//					判断选中的
					//定义一个新数组来接收每个商品的唯一sid
					var s = {};
					//定义一个新数组来接收每个商品的数量
					var cx = {};
//					看选中了几个 把选中的sid和数量发到数组中
					for(var i=0;i<c.length;i++){
						sid[i] = $('.sonche:checked').eq(i).parents('.other').attr('sid');
						num[i] = $('.sonche:checked').eq(i).parents('.other').find('.num').val();
					}
//					发送异步
					$.ajax({
						type:"post",
						url:"{:U('Cart/pluss')}",
						data:{s:s,n:cx,sid:sid,num:val_num},
						dataType:'json',
						success:function(data){
							$('.s-5').html(data[0]);
							$('.price i').html(data[1]);
						}
					});
				});
//				删除-------------------------------------------------------------删除
				$('.del').click(function(){
					var sign = $(this).index('.del');
					var numb = $('.num').eq(sign).val();
					var sid = $('.other').eq(sign).attr('sid');
					var pri = $('.s-5').eq(sign).val();
					$.ajax({
						type:"post",
						url:"{:U('Cart/del')}",
						data:{sid:sid,pri:pri,numb:numb},
						dataType:'json',
						success:function(data){
							if(data.status == 1){
								$('.other').eq(sign).remove();
								$('.price i').html(data.phpdata.total);
							}
						}
					});
				});
			})
		</script>
	</head>
	<body>
		<include file="./App/Home/View/Common/head2.php"/>
		<!--搜索开始-->
			<div id="search">
				<!--logo开始-->
				<img class="logo" src="__PUBLIC__/Home/images/02.png"/>
				<!--logo结束-->
				
				<p>
					中关村在线旗下网上商城
				</p>
				<div class="flow">
					<ul>
						<li class="s_1">购物车</li>
						<li class="s_2" style="background: url(../__PUBLIC__/Home/images/50.png) no-repeat 86x 0px;">下订单</li>
						<li class="s_2">去付款</li>
						<li class="s_3">确认收货</li>
						<li class="s_4">评价</li>
					</ul>
				</div>
			</div>
		<!--搜索结束-->
			<!--内容开始-->
			<div id="form">
				<form action="{:U('Buynow/index')}" method="post">
					
			
				<!--表格开始-->
					<table class="table">
						<!--表格顶部标题开始-->
						<tr class="tr_top">
							<th class="th_1">
							</th>
							<th class="th_2">所选商品</th>
							<th class="th_3">单价（元）</th>
							<th class="th_4">数量</th>
							<th class="th_5">优惠</th>
							<th class="th_6">小计（元）</th>
							<th class="th_7">操作</th>
						</tr>
						<!--表格顶部标签结束-->
						<!--订单表格开始-->
							<!--空tr-->
							<foreach name="data" item="v">
								<tr class="empty"></tr>
								<foreach name="v" key="kk" item="vv">
									<!--商品详情-->
									<tr class="other" sid={$kk} >
										<td colspan="2" class="s-1">
											<label for=""><input type="checkbox" name="sonche[]" class="sonche"  value="{$kk}"/></label>
											<img src="{$vv['img']}"/>
											<a href=""><h3>{$vv['name']}</h3></a>
											<p><span>{$vv['v']}</span></p>
										</td>
										<!--单价-->
										<td class="s-2">{$vv['price']}</td>
										<!--选择数量-->
										<td class="s-3">
											<a class="plus" href="javascript:;"><span>+</span></a>
											<input type="text" name="num[]" class="num" value="{$vv['num']}" />
											<a class="minus" href="javascript:;"><span>-</span></a>
										</td>
										<!--优惠-->
										<td class="s-4">--</td>
										<!--小计-->
										<td class="s-5">{$vv['total']}</td>
										<!--操作-->
										<td class="s-6"><a class="del" href="javascript:;if(confirm('确定要删除吗?'))" tid="{$kk}">删除</a></td>
									</tr>
								</foreach>
							</foreach>
						<!--订单表格结束-->
					</table>
					<!--表格结束-->
					<div class="price">商品总价（不含运费）：<span>¥<i>{$data['total']}</i>.00</span></div>
					<div class="bot">
						<input type="checkbox" id="checkbox" />全选
						<a class="b_l" href="">批量删除</a>
						<input type="submit"  id="sub" value="去结算" />
					</div>
			</div>
			<!--内容结束-->
			<div id="foot">
			<p>
				<a href="">关于商城</a>丨
				<a href="">关于商城</a>丨
				<a href="">关于商城</a>丨
				<a href="">关于商城</a>丨
				<a href="">关于商城</a>丨
				<a href="">关于商城</a>丨
				<a href="">关于商城</a>
			</p>
			<span>©2016中关村在线 版权所有. 京ICP备09041801号-182 京ICP证010391号</span>
			<img src="__PUBLIC__/Home/images/34.jpg" alt="" />
			<img src="__PUBLIC__/Home/images/35.jpg" alt="" />
			<img src="__PUBLIC__/Home/images/36.jpg" alt="" />
		</div>
	</body>
</html>
