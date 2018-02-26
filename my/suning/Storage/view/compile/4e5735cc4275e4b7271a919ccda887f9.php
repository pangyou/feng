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
				<a class="a1" href="<?php echo U('Index/index')?>">
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
					<?php if(isset($_SESSION['aid'])){?>
                
					<a href="<?php echo U('Login/index')?>"><?php echo $_SESSION['nickname']?>...</a>
					<?php }else{?>
					<a href="<?php echo U('Login/index')?>">登录</a>
					
               <?php }?>
					</li>
					<li><a href="">注册</a></li>
					<li><a href="<?php echo U('Person/orders')?>">我的订单</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li><a href="<?php echo U('Person/index')?>">我的易购</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li class="gouwuche">
						<em class="glyphicon glyphicon-shopping-cart"></em>
						<a href="">购物车</a>
						<span class="total_num" id='total_num'>
							<?php if(isset($_SESSION['cart']['goods'])){?>
                
							<b><?php echo count($_SESSION['cart']['goods'])?></b>
							<?php }else{?>
							<b>0</b>
							
               <?php }?>
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
	<form action="<?php echo U('cartSub')?>" method="post">
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
		<?php foreach ($data as $k=>$v){?>
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
					<input type="checkbox" class="radio input xuan dian" checked name="sid[]" value="<?php echo $k?>" id="" />
					<a href=""><img src="<?php echo $v['pic']?>" alt="" /></a>
				</li>
				<li class="li2">
					<a href="<?php echo U('Content/index',array('gid'=>$v['id']))?>" target="_blank"><?php echo $v['name']?></a>
					<?php foreach ($v['options'] as $vv){?>
					<span><?php echo $vv?></span>
					<?php }?>
				</li>
				<li class="li3">
					<em>¥</em><span><?php echo $v['price']?></span>
				</li>
				<li class="li4">
					<div class="num">
						<!-- <a class="reduce dian" href="<?php echo U('cartUpdate',array('num'=>$v['num']-1,'sid'=>$k))?>">-</a> -->
						<a class="reduce dian" sid="<?php echo $k?>" num="<?php echo $v['num']?>" href="javascript:;">-</a>
						<input type="text" name="inputNum" class="inputNum" value="<?php echo $v['num']?>" id="" />
						<!-- <a class="add dian" href="<?php echo U('cartUpdate',array('num'=>$v['num']+1,'sid'=>$k))?>">+</a> -->
						<a class="add dian" sid="<?php echo $k?>" num="<?php echo $v['num']?>" href="javascript:;">+</a>
					</div>	
				</li>
				<!-- post提交的数值 -->
				<input type="hidden" name="inputNum" >
				<li class="li5">
					¥<strong><?php echo $v['total']?></strong>
				</li>
				<li class="li6">
					<a href="">移入收藏</a>
					<a href="javascript:if(confirm('确定删除吗?'))location.href='<?php echo U('Content/cartDel',array('sid'=>$k))?>'">删除</a>
					<a href="">查找相似</a>
				</li>
			</ul>
		</div>
		<?php }?>
		<div class="son4">
			<div class="left">
				<input type="checkbox" class="inputc input allcheck" checked />
				<a class="a1" href="">全选</a>
				<a class="a2" href="javascript:if(confirm('确定删除吗?'))location.href='<?php echo U('Content/cartOut')?>'">删除全部商品</a>
			</div>
			<div class="right">
				<div class="dv1">
					<p class="price">
						<span>总价（含运费）：</span>
						<?php if($_SESSION){?>
                
						¥<em><?php echo Cart::getTotalPrice()?></em>
						<?php }else{?>
						<em>0.00</em>
						
               <?php }?>
					</p>
					<p class="save">
						<a href="javascript:;">
							已选商品 
							<?php if($_SESSION){?>
                
							<em id='em1'><?php echo count($_SESSION['cart']['goods'])?></em>
							<?php }else{?>
							<em id='em1'>0</em>
							
               <?php }?>
							件
						</a>
						<span>为您节省：<em>¥ 0.00</em></span>
						<span>运费（以结算页为准）：<em>¥ 0.00</em></span>
					</p>
				</div>
				<?php if($_SESSION['cart']['total'] == 0){?>
                
				<div id="goods_exist">
					<a class="nogoods" href="javascript:;" style="" title="请至少选一件商品,再去结算">去结算</a>
				</div>
				<?php }else{?>
				<div id="goods_exist">
					<input type="submit" class="jiesuan" value="去结算">
				</div>
				
               <?php }?>
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
	    		url: "<?php echo U('addp')?>",
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
	    		url: "<?php echo U('addpre')?>",
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
	<div class="cart-list">
	<div class="love love1">
		<div class="love_title">
			<h3>
				<i></i>
				<span>买了该商品的人还买了</span>
			</h3>
		</div>
		<ul class="love_ul">
								<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=43">
					<img src="Upload/Content/16/06/35271465799469.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=43">美特斯邦威男短袖T恤2016夏装新款男装休闲针织印花圆领T恤226419</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>99.00</strong>
				</p>
				<p class="evaluation">
					<span>6</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=44">
					<img src="Upload/Content/16/06/85331465800131.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=44">OPPO A53m 金属大屏 拍照手机 全网通4G手机 金色</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>1599.00</strong>
				</p>
				<p class="evaluation">
					<span>222</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=45">
					<img src="Upload/Content/16/06/84881465800342.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=45">OPPO A37 2GB+16GB内存版 玫瑰金 全网通4G手机 双卡双待</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>1299.00</strong>
				</p>
				<p class="evaluation">
					<span>123</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=46">
					<img src="Upload/Content/16/06/2091465800585.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=46">OPPO A33 美颜拍照 移动4G手机 白色 2GB+16GB</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>999.00</strong>
				</p>
				<p class="evaluation">
					<span>233</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=47">
					<img src="Upload/Content/16/06/63131465800847.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=47">OPPO A31 美颜拍照 移动4G手机 白色 16G</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>799.00</strong>
				</p>
				<p class="evaluation">
					<span>234</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=48">
					<img src="Upload/Content/16/06/41465801059.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=48">OPPO R7s Plus 6.0英寸 闪充大屏拍照 移动4G手机 金色 4G+64G</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>2999.00</strong>
				</p>
				<p class="evaluation">
					<span>14</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=49">
					<img src="Upload/Content/16/06/36531465801193.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=49">OPPO R7s 长续航闪充  大屏拍照 移动4G手机 玫瑰金色 4GB+32GB</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>2499.00</strong>
				</p>
				<p class="evaluation">
					<span>23</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=50">
					<img src="Upload/Content/16/06/50331465801504.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=50">华硕手机电神5000 Zenfone Max(32GB)白</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>899.00</strong>
				</p>
				<p class="evaluation">
					<span>23</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=51">
					<img src="Upload/Content/16/06/6691465801747.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=51">华硕手机 Selfie ZD551KL(1.5G/3G/16G)蓝钻</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>1799.00</strong>
				</p>
				<p class="evaluation">
					<span>213</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=52">
					<img src="Upload/Content/16/06/91661465805173.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=52">华为P9(EVA-AL00) 32GB 流光金 全网通</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>3188.00</strong>
				</p>
				<p class="evaluation">
					<span>130</span>
					人已购买
					<em></em>
				</p>
			</li>
					</ul>
	</div>
	<div class="love love2">
		<div class="love_title">
			<h3>
				<i></i>
				<span>猜你喜欢</span>
			</h3>
		</div>
		<ul class="love_ul">
					 				<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=26">
					<img src="Upload/Content/16/06/86281465546602.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=26">lagogo 拉谷谷 夏季可爱不规则波点洋装两件套3BB940G732</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>71.00</strong>
				</p>
				<p class="evaluation">
					<span>23</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=27">
					<img src="Upload/Content/16/06/45691465546970.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=27">lagogo 拉谷谷 夏季镂空花朵翻领短袖连衣裙3BB945H733</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>69.00</strong>
				</p>
				<p class="evaluation">
					<span>23</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=28">
					<img src="Upload/Content/16/06/19991465547153.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=28">lagogo 拉谷谷 夏季新款淑女碎花修身舒适连衣裙3BB940G918</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>69.00</strong>
				</p>
				<p class="evaluation">
					<span>23</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=29">
					<img src="Upload/Content/16/06/73191465547381.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=29">lagogo 拉谷谷 夏季双层印花淑女洋装4BB666B812</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>134.00</strong>
				</p>
				<p class="evaluation">
					<span>24</span>
					人已购买
					<em></em>
				</p>
			</li>
						<li>
				<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=30">
					<img src="Upload/Content/16/06/1001465547652.jpg" alt="" />
				</a>
				<p class="text">
					<a href="http://kyouyuan.club/my/suning/index.php?m=Home&c=Content&a=index&gid=30">Lagogo/拉谷谷夏季新名媛淑女纯色镶钻洋装连衣裙EBB953G705</a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong>175.00</strong>
				</p>
				<p class="evaluation">
					<span>12</span>
					人已购买
					<em></em>
				</p>
			</li>
					</ul>
	</div>
</div>

	</div>
	<!--猜你喜欢设置结束-->
	<!--底部设置开始-->
	<div id="footer">
		<div class="footer1">
			<div class="promise">
				<dl>
					<dt></dt>
					<dd>
						<p><strong>正品保障</strong></p>
						<p>正品保障，提供发票</p>
					</dd>
				</dl>
				<dl>
					<dt class='dt2'></dt>
					<dd>
						<p><strong>极速物流</strong></p>
						<p>极速物流,急速送达</p>
					</dd>
				</dl>
				<dl>
					<dt class='dt3'></dt>
					<dd>
						<p><strong>无忧售后</strong></p>
						<p>7天无理由退换货</p>
					</dd>
				</dl>
				<dl>
					<dt class='dt4'></dt>
					<dd>
						<p><strong>特色服务</strong></p>
						<p>私人定制家电套餐</p>
					</dd>
				</dl>
				<dl>
					<dt class='dt5'></dt>
					<dd>
						<p><strong>帮助中心</strong></p>
						<p>您的购物指南</p>
					</dd>
				</dl>			
			</div>
			<div class="help_box">
				<dl>
					<dt>购物指南</dt>
					<dd><a href="javascript:;">导购演示</a></dd>
					<dd><a href="javascript:;">免费注册</a></dd>
					<dd><a href="javascript:;">会员等级</a></dd>
					<dd><a href="javascript:;">常见问题</a></dd>
					<dd><a href="javascript:;">品牌大全</a></dd>
				</dl>
				<dl>
					<dt>支付方式</dt>
					<dd><a href="javascript:;">易付宝支付</a></dd>
					<dd><a href="javascript:;">网银支付</a></dd>
					<dd><a href="javascript:;">快捷支付</a></dd>
					<dd><a href="javascript:;">分期付款</a></dd>
					
					<dd><a href="javascript:;">货到付款</a></dd>
					<dd><a href="javascript:;">任性付支付</a></dd>
				</dl>
				<dl>
					<dt>物流配送</dt>
					<dd><a href="javascript:;">免运费政策</a></dd>
					<dd><a href="javascript:;">配送服务承诺</a></dd>
					<dd><a href="javascript:;">签收验货</a></dd>
					<dd><a href="javascript:;">物流查询</a></dd>
				</dl>
				<dl>
					<dt>售后服务</dt>
					<dd><a href="javascript:;">退换货政策</a></dd>
					<dd><a href="javascript:;">退换货流程</a></dd>
					<dd><a href="javascript:;">购买延保服务</a></dd>
					<dd><a href="javascript:;">退款说明</a></dd>
					<dd><a href="javascript:;">退换货申请</a></dd>
					<dd><a href="javascript:;">维修/保养</a></dd>
				</dl>
				<dl>
					<dt>商家服务</dt>
					<dd><a href="javascript:;">商家入驻</a></dd>
					<dd><a href="javascript:;">培训中心</a></dd>
					<dd><a href="javascript:;">信息公告</a></dd>
					<dd><a href="javascript:;">广告服务</a></dd>
					<dd><a href="javascript:;">商家帮助</a></dd>
					<dd><a href="javascript:;">服务市场</a></dd>
				</dl>
			</div>
			<div class="app">
				<p>易购客户端</p>
				<a href="javascript:;">
					<img src="./Public/Home/images/app.png" alt="" />
				</a>
			</div>
		</div>
		<div class="footer2">
			<div class="footer2_con">
				<div class="left">
					<dl>
						<dt>	
							<a href="javascript:;"><img src="./Public/Home/images/footer2.png" alt="" /></a>
						</dt>
						<dd>
							<p class="p1"><a href="javascript:;">政府采购</a></p>
							<p class="p2"><a href="javascript:;">为企业用户量身定做的采购平台，优选苏宁易购全站商品，为企业采购提供专业化的一站式采购解决方案。</a></p>
						</dd>
					</dl>
					<dl>
						<dt>	
							<a href="javascript:;"><img src="./Public/Home/images/f2.png" alt="" /></a>
						</dt>
						<dd>
							<p class="p1"><a href="javascript:;">苏宁众包</a></p>
							<p class="p2"><a href="javascript:;">以苏宁全渠道包销为主要特点，整合全社会众包资源，扶持创新企业，推广创新产品。</a></p>
						</dd>
					</dl>
				</div>
				<div class="right">
					<dl>
						<dt></dt>
						<dd>
							<p class="p1">身边苏宁</p>
							<p class="p2">全国300个城市1600家门店3000个服务点为您提供最贴心的服务！</p>
							<a href="javascript:;"></a>
						</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="footer3">
			<div class="footer3_con">
				<p class="p1">
					<a href="javascript:;">苏宁云商</a><span>|</span>
					<a href="javascript:;">苏宁互联</a><span>|</span>
					<a href="javascript:;">苏宁金融</a><span>|</span>
					<a href="javascript:;">易付宝</a><span>|</span>
					<a href="javascript:;">PPTV</a><span>|</span>
					<a href="javascript:;">红孩子</a><span>|</span>
					<a href="javascript:;">缤购</a><span>|</span>
					<a href="javascript:;">乐购仕</a><span>|</span>
					<a href="javascript:;">苏宁物流</a><span>|</span>
					<a href="javascript:;">苏宁美国</a><span>|</span>
					<a href="javascript:;">苏宁香港</a><span>|</span>
					<a href="javascript:;">手机苏宁</a>
				</p>
				<p class="p1">
					<a href="javascript:;">关于苏宁易购</a><span>|</span>
					<a href="javascript:;">联系我们</a><span>|</span>
					<a href="javascript:;">诚聘英才</a><span>|</span>
					<a href="javascript:;">供应商入驻</a><span>|</span>
					<a href="javascript:;">苏宁联盟</a><span>|</span>
					<a href="javascript:;">苏宁招标</a><span>|</span>
					<a href="javascript:;">友情链接</a><span>|</span>
					<a href="javascript:;">法律申明</a><span>|</span>
					<a href="javascript:;">用户体验提升计划</a><span>|</span>
					<a href="javascript:;">股东会员认证</a>
				</p>
				<p class="p2">Copyright© 2002-2016 ，苏宁云商集团股份有限公司版权所有
					<a href="javascript:;">苏ICP备10207551号-4</a>
					<a href="javascript:;">苏B1-20130131</a>
					<a href="javascript:;">苏B2-20130391</a>出版物经营许可证新出发苏批字第A-243号
				</p>
				<div class="footer3_img">
					<a href="javascript:;"><img src="./Public/Home/images/footer3a1.png" alt="" /></a>
					<a href="javascript:;"><img src="./Public/Home/images/dianxin.jpg" alt="" /></a>
					<a href="javascript:;"><img src="./Public/Home/images/unicom.png" alt="" /></a>
					<a href="javascript:;"><img src="./Public/Home/images/dianzi.png" alt="" /></a>
				</div>
			</div>
		</div>
	</div>
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
