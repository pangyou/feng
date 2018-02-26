<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/goods.css"/>
		<script src="__PUBLIC__/Home/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
//				点击规格--------------------------------------------------------------点击规格
//				点击属性规格选中,添加css属性同事其他选中的取消选中
//				抓取元素
				$('.spec .spec_1 a').click(function(){
//					点击增加css,同时去除其他CSS
					$(this).addClass('a_red').siblings('a').removeClass('a_red');
//					建立一个空变量
					var glid='';
//					循环选中的规格A标签拼接组合id
					$.each($('.a_red'), function() {
					glid += ',' + $(this).attr('gaid');
					});
//					获取当前商品的Gid					
					var gid=$('#gid').attr('gid');
//					获取商品价格
					var price=$('.price dd').attr('price');
//					当li的数量等于所选中标签的数量时,才发送异步继续后台查询
					var li=$('.spec .spec_1').length;
					var num=$('.a_red').length;
//					如果li的数量等于选择标签的数量
					if(num==li){
//						发送异步
						$.ajax({
//							发送到方法
							url:"{:U('Goods/ajaxx')}",
//							发送方式
							type:"post",
//							发送的数据
							data:{glid:glid,gid:gid,price:price},
//							发送数据类型
							dataType:'json',
//							返回数据
							success:function(phpData){
								if(!phpData.stock){
	//								如果返回的库存是空或者是0时 就输出商品已售完
									$('.stock').html('该商品已售完');
								}else{
	//								如果有库存输出库存数量
									$('.stock').html(phpData.stock);
									$('.price .price1_1').html(phpData.price);
								}
							}
						})
					}
				})
//				数量点击添加----------------------------------------------------------数量点击添加
				var n=$('#num').val();
				$('#num').change(function(){
					n=$('#num').val();
				})
//				点击+号数量增加
				$('#plus').click(function(){
					n++;
					$('#num').val(n);
				})
//				点击-号数量减少
				$('#minus').click(function(){
//					如果小于1就停止
					if(n>1){
						n--;
						$('#num').val(n);
					}
					
				})
//				点击添加到购物车-------------------------------------------------------添加点击购物车
				$('#sub_1').click(function(){
//					建立一个空变量
					var glid='';
					var v='';
//					循环选中的规格A标签拼接组合id
					$.each($('.a_red'), function() {
					glid += ',' + $(this).attr('gaid');
					v +=',' + $(this).html();
					});
//					获取当前商品的Gid					
					var gid=$('#gid').attr('gid');
					
//					获取商品价格
					var price=$('.price .price1_1').html();
//					获取商品数量
					var num=$("input[name='num']").val();
//					发送异步
					$.ajax({
//							发送到方法
						url:"{:U('Goods/ajaxxx')}",
//							发送方式
						type:"post",
//							发送的数据
						data:{glid:glid,v:v,gid:gid,price:price,num:num},
//							发送数据类型
						dataType:'json',
//							返回数据
						success:function(phpData){
//							跳转到购物车页面
							location.href = "{:U('Cart/index')}";
						}
					})
				})
			})
		</script>
	</head>
	<body>
	<include file="./App/Home/View/Common/head.php"/>
			<!--商品详情开始-->
			<div id="detail">
				<div class="d_l">
					
					<div class="l_img">
						<img class="bimg" src="{{$goodsData['img'][0]}}"/>
						<ul>
							<?php foreach ($goodsData['img'] as $k => $v) { ?>
							<li <?php if($k == 0):?>	class="red"<?php endif?>>
								<a href="javascript:;"><img src="{{$v}}"/></a>
							</li>
							<?php } ?>
						</ul>
						<div class="attention">
							<a href=""><i class="a_i1"></i>关注商品</a>
							<a href=""><i class="a_i2"></i>分享</a>
						</div>
					</div>
					<form action="{{:U('Cart/index')}}" method="post">
						
					
					<div class="l_r">
						<!--商品Gid-->
						<input type="hidden" name="gid" id="gid" gid="{{$goodsData['gid']}}" />
						<!--商品名称-->
						<input type="hidden" name="ganem" id="ganem" value="{{$goodsData['gname']}}" />
						
						<h3>
							{{$goodsData['gname']}}
						</h3>
						<div class="price">
							<dl class="price1">
								<dt>价格:</dt>
								<dd  price="{$goodsData['sprice']}">¥<span class="price1_1">{{$goodsData['sprice']}}</span></dd>
							</dl>
							<dl class="price2">
								<dt>全店优惠:</dt>
								<dd><span>满减</span>消费满 5000.00 元  ，  减 99.00 元</dd>
							</dl>
						</div>
						<div class="bai">
							<dl>
								<dt>评&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价:</dt>
								<dd>
									<a href="">购买评价<i>0</i></a>
									<span>|</span>
									<a href="">成交记录<i>0</i></a>
								</dd>
							</dl>
							<dl>
								<dt>服务保障:</dt>
								<dd>由 <a href="">三味腾达笔记本专营店</a>  发货并承诺提供以下服务保障</dd>
							</dl>
							<dl>
								<dt></dt>
								<dd><img src="__PUBLIC__/Home/images/44.png" alt="" /></dd>
							</dl>
							<div class="spec">
								<ul>
									<foreach name="data" item="v">
									<li class="spec_1">
										<span>{{$v['name']}}</span>
										<foreach name="v['value']" key="kk" item="vv">
										<a href="javascript:;" gaid="{{kk}}">{{$vv}}</a>
										<input type="hidden" name="gavalue[]" id="gavalue" value="{{$vv}}" />
										<input type="hidden" name="gaid[]" id="gaid" value="{{$kk}}" />
										</foreach>
									</li>
									</foreach>
								</ul>
								
							</div>
							<div class="num">
								<dl>
									<dt>购买数量:</dt>
									<dd>
										<a id="plus" href="javascript:;"><span>+</span></a>
										<input type="text" name="num" id="num" value="1" />
										<a id="minus" href="javascript:;"><span>-</span></a>
										件（限购15件）
									</dd>
								</dl>
								<dl>
									<dt>库&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;存:</dt>
									<dd class="stock" style="color: red;">选择规格后显示</dd>
								</dl>
								<div class="sub">
									<a id="sub" href="javascript:;">立即购买</a>
									<button type="submit" id="sub_1">加入购物车</button>
								</div>
							</div>
							
						</div>
					</div>
					</form>
				</div>
				<div class="d_r">
					<div class="shopname">
						<a href="">三味腾达笔记本专营店</a>
					</div>
					<div class="kefu">
						<p>在线客服:</p>
						<ul>
							<li>
								<img src="__PUBLIC__/Home/images/45.gif"/>
								和我联系
							</li>
							<li>
								<img src="__PUBLIC__/Home/images/45.gif"/>
								和我联系
							</li>
							<li>
								<img src="__PUBLIC__/Home/images/45.gif"/>
								和我联系
							</li>
							<li>
								<img src="__PUBLIC__/Home/images/45.gif"/>
								和我联系
							</li>
						</ul>
						<dl>
							<dt>客服电话:</dt>
							<dd>13241495000</dd>
							<dt></dt>
							<dd>13241495000</dd>
							<dt>接待时间:</dt>
							<dd>9:00-18:00</dd>
						</dl>
						<p>店铺30天退款率：<span>0.00%</span></p>
					</div>
					<div class="pingfen">
						<p>店铺动态评分：</p>
						<dl>
							<dt>描述:<span>5.0</span></dt>
							<dd><span>持平</span>同行 0.00%</dd>
							<dt>服务:<span>5.0</span></dt>
							<dd><span>持平</span>同行 0.00%</dd>
							<dt>物流:<span>5.0</span></dt>
							<dd><span>持平</span>同行 0.00%</dd>
						</dl>
					</div>
					<div class="r_sub">
						<a href="">进入店铺</a>
						<a href="">关注店铺</a>
					</div>
					</foreach>
				</div>
			</div>
			<!--商品详情结束-->
			<!--热门商品开始-->
			<div id="hot">
				<p>店铺热卖</p>
				<ul>
					<li>
						<img src="__PUBLIC__/Home/images/46.jpg"/>
						<a href=""><span class="title">【限时抢购】【顺丰包邮】ThinkPad </span></a>
						<span class="price">¥6399.00</span>
					</li>
					<li>
						<img src="__PUBLIC__/Home/images/46.jpg"/>
						<a href=""><span class="title">【限时抢购】【顺丰包邮】ThinkPad </span></a>
						<span class="price">¥6399.00</span>
					</li>
					<li>
						<img src="__PUBLIC__/Home/images/46.jpg"/>
						<a href=""><span class="title">【限时抢购】【顺丰包邮】ThinkPad </span></a>
						<span class="price">¥6399.00</span>
					</li>
					<li>
						<img src="__PUBLIC__/Home/images/46.jpg"/>
						<a href=""><span class="title">【限时抢购】【顺丰包邮】ThinkPad </span></a>
						<span class="price">¥6399.00</span>
					</li>
					<li>
						<img src="__PUBLIC__/Home/images/46.jpg"/>
						<a href=""><span class="title">【限时抢购】【顺丰包邮】ThinkPad </span></a>
						<span class="price">¥6399.00</span>
					</li>
					<li>
						<img src="__PUBLIC__/Home/images/46.jpg"/>
						<a href=""><span class="title">【限时抢购】【顺丰包邮】ThinkPad </span></a>
						<span class="price">¥6399.00</span>
					</li>
				</ul>
			</div>
			<!--热门商品结束-->
			<!--内容开始-->
			<div id="content">
				<div class="c_l">
					<dl>
						<dt><h4 class="l_cate">笔记本电脑</h4></dt>
						<dd>
							<a href="">ThinkPad</a>
						</dd>
						<dd>
							<a href="">ThinkPad</a>
						</dd>
						<dd>
							<a href="">ThinkPad</a>
						</dd>
						<dd>
							<a href="">ThinkPad</a>
						</dd>
					</dl>
				</div>
				<div class="c_r">
					<div class="recommend">
						<h3>商品介绍</h3>
						{$goodsData['detail']}
					</div>
				</div>
			</div>
			<!--内容结束-->
			<!--底部开始-->
			<div id="footer">
	<!--底部外100%宽度开始-->
	<div class="footer_outer">
		<!--底部内宽开始-->
		<div class="footer_inside">
			<div class="footer_server">
				<img src="__PUBLIC__/Home/images/34.png"/>
			</div>
		</div>
		<!--底部内宽结束-->
	</div>
	<!--底部外100%宽度结束-->
	<div class="footer_nav">
		<div class="footer_nav_inside">
			<p>
				合作伙伴:
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
				|
				<a href="">电子商务平台</a>
			</p>
			<p>
				<a href="">中关村在线</a>
				|
				<a href="">中关村在线</a>
				|
				<a href="">中关村在线</a>
				|
				<a href="">中关村在线</a>
				|
				<a href="">中关村在线</a>
				|
				<a href="">中关村在线</a>
				|
				<a href="">中关村在线</a>
				
			</p>
			<p>
				<a href="">关于ZOL商城</a>
				|
				<a href="">关于ZOL商城</a>
				|
				<a href="">关于ZOL商城</a>
				|
				<a href="">关于ZOL商城</a>
				|
				<a href="">关于ZOL商城</a>
				|
				<a href="">关于ZOL商城</a>
				|
				<a href="">关于ZOL商城</a>
			</p>
			<img src="__PUBLIC__/Home/images/34.jpg"/>
			<img src="__PUBLIC__/Home/images/35.jpg"/>
			<img src="__PUBLIC__/Home/images/36.jpg"/>
		</div>
	</div>
</div>
			<!--底部结束-->
	</body>
</html>
