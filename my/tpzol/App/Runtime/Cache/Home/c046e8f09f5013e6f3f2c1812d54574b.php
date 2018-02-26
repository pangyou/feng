<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/my/tpzol/Public/Home/css/css.css"/>
		<script src="/my/tpzol/Public/Home/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/my/tpzol/Public/Home/js/js.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--页头开始-->
		<div id="header">
			<!--外100%宽开始-->
			<div class="h_outer">
				<!--页头内宽开始-->
				<div class="h_inside">
					<!--左侧登录开始-->
					<div class="login">
						<!--商城首页-->
						<span class="l_home"><a href="<?php echo U('Index/index');?>">商城首页</a></span>
						<?php if(!isset($_SESSION['aid'])): ?><!--登录-->
						<span class="l_login">Hi~欢迎来到ZOL商城，请<a href="<?php echo U('Login/index');?>">登录</a></span>
						<!--注册-->
						<span class="l_register"><a href="<?php echo U('Reg/index');?>">免费注册</a></span>
						<?php else: ?> 
						Hi~<?php echo ($_SESSION['nickname']); ?>欢迎回来 <a href="<?php echo U('Login/out');?>">退出</a><?php endif; ?>
					</div>
					<!--左侧登录结束-->
					<!--右侧导航开始-->
					<div class="menu">
						<ul>
							<li><a href="<?php echo U('Person/orders');?>">我的订单</a></li>
							<li><a href="<?php echo U('Person/index');?>">买家中心  ∨</a></li>
							<li><a href="<?php echo U('Person/carshow');?>">购物车<span>0</span>件</a></li>
							<li><a href="javascript:;">帮助中心</a></li>
							<li>|</li>
							<li class="li_phone"><a href="javascript:;">手机商城  ∨</a></li>
							<li><a href="javascript:;">中关村在线</a></li>
							<li><a href="javascript:;">商家入驻</a></li>
							<li><a href="javascript:;">联系客服</a></li>
						</ul>
					</div>
					<!--右侧导航结束-->
				</div>	
				<!--页头内宽结束-->
			</div>
			<!--外100%宽结束-->
		</div>
		<!--页头结束-->
		<div style="background:url(.//my/tpzol/Public/Home/images/03.jpg) top center no-repeat;">
			<!--搜索开始-->
			<div id="search">
				<!--logo开始-->
				<img class="logo" src="/my/tpzol/Public/Home/images/02.png"/>
				<!--logo结束-->
				
				<p>
					中关村在线旗下网上商城
				</p>
				<!--搜索框开始-->
				<div class="search_box">
					<form action="" method="post">
						<input type="text" class="s_text" name="search" id="" value="" />
						<input class="s_sub" type="submit" value="搜  索"/>
					</form>
					<span>     
						<a href="javascript:;">乐视1S</a>
						<a href="javascript:;">苹果 iPhone SE</a>
						<a href="javascript:;">魅蓝metal</a>
						<a href="javascript:;">iPhone6</a>
						<a href="javascript:;">三星A8000</a>
						<a href="javascript:;">iPhone 6s</a>
						<a href="javascript:;">ZOL商城承诺</a>
					</span>
					
				</div>
				<!--搜索框结束-->
				<img class="r_logo" src="/my/tpzol/Public/Home/images/04.jpg"/>
			</div>
			<!--搜索结束-->
			<?php  $cateData=D('Cate')->where('pid=0')->limit(5)->select(); ?>
			<!--导航栏开始-->
			<div class="nav_box">
				<h2 class="goods_cate">商品分类</h2>
				<ul>
					<li ><a class="color_red" href="<?php echo U('Index/index');?>">首页</a></li>
					<?php if(is_array($cateData)): foreach($cateData as $key=>$v): ?><li><a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo ($v['cname']); ?></a></li><?php endforeach; endif; ?>
				</ul>
				<a class="n_r" href="javascript:;">智能穿戴低至89元</a>
			</div>
			<!--导航栏结束-->
			<!--主导航开始-->
			<div id="nav">
				<!--导航左侧开始-->
				<div class="nav_l">
					<ul>
						<?php foreach ($cate as $v): ?>
						<li>
							<?php foreach ($v['_data'] as $va) { ?>
							<a style="margin-right: 15px; line-height: 39px;" class="a1" href="<?php echo U('List/Index',array(cid=>$va['cid']));?>"><?php echo ($va['cname']); ?></a>  
							<?php } ?>
							<div class="box">
								<dl class="service">
									<dt><a href="javascript:;">服务保障</a></dt>
									<dd>
										<a href="javascript:;">行货保证</a>
										<a href="javascript:;">发票保障</a>
										<a href="javascript:;">顺丰包邮</a>
										<a href="javascript:;">无忧退换</a>
										<a href="javascript:;">先行赔付</a>
									</dd>
								</dl>
								<?php foreach ($v['_data'] as $va) { ?>
								<dl>
									<dt>
										<a href=""><?php echo ($va['cname']); ?></a>
									</dt>
									<dd>
										<?php foreach ($va['_data'] as $vv) { ?>
										<a href=""><?php echo ($vv['cname']); ?></a>|
										<?php } ?>
									</dd>
								</dl>
								<?php } ?>
							</div>
						</li>
						<?php endforeach ?>
					</ul>
					<img src="/my/tpzol/Public/Home/images/06.gif"/>
				</div>
				<!--主导航左侧结束-->
				<!--主导航轮播图开始-->
				<div class="nav_m">
					<div class="lunbo">
						<ul>
							<li><a href=""><img src="/my/tpzol/Public/Home/images/07.jpg"/></a></li>
							<li><a href=""><img src="/my/tpzol/Public/Home/images/08.jpg"/></a></li>
							<li><a href=""><img src="/my/tpzol/Public/Home/images/09.jpg"/></a></li>
							<li><a href=""><img src="/my/tpzol/Public/Home/images/10.jpg"/></a></li>
							<li><a href=""><img src="/my/tpzol/Public/Home/images/11.jpg"/></a></li>
							<li><a href=""><img src="/my/tpzol/Public/Home/images/12.jpg"/></a></li>
							<li><a href=""><img src="/my/tpzol/Public/Home/images/07.jpg"/></a></li>
						</ul>
					</div>
				</div>
				<!--主导航轮播图结束-->
				<!--主导航右侧开始-->
				<div class="nav_r">
					<a href="http://go.zol.com/topic/5062097.html"><img src="/my/tpzol/Public/Home/images/13.jpg"/></a>
					<div class="notice">
						<h5>商城公告</h5>
						<ul>
							<li><a href="">[五一]iPhone 6s阶梯团 低至4680元</a></li>
							<li><a href="">[通知]红动六月大促省钱攻略</a></li>
							<li><a href="">[促销]佳能M2双镜头微单套机赠好礼</a></li>
							<li><a href="">[特惠]有华为P9摄影不再用相机</a></li>
							<li><a href="">[狂欢]大家都在买的手机</a></li>
							<li><a href="">[导购]数码欧洲杯 现场看球的感觉</a></li>

						</ul>	
					</div>
				</div>
				<!--主导航右侧结束-->
			</div>
			<!--主导航结束-->
		</div>
<!--内容主体开始-->
<div id="content">
	<!--精品团购开始-->
	<!--标题开始-->
	<div class="boutique">
			<h2>精品团购</h2>
			<span><a href="">更多团购></a></span>
	</div>
	<!--标题结束-->
	<!--商品开始-->
	<div class="goods">
		<ul>
			<li style="border-left: 1px solid #EDEDED;"><a href=""><img src="/my/tpzol/Public/Home/images/14.jpg"/></a></li>
			<li><a href=""><img src="/my/tpzol/Public/Home/images/15.jpg"/></a></li>
			<li><a href=""><img src="/my/tpzol/Public/Home/images/16.jpg"/></a></li>
			<li style="border-right: 1px solid #EDEDED;"><a href=""><img src="/my/tpzol/Public/Home/images/17.jpg"/></a></li>
		</ul>
	</div>
	<!--商品结束-->
	<!--精品团购结束-->
	<!--特色购开始-->
	<div class="feature">
		<h2 class="title">特色购</h2>
		<!--特色购商品开始-->
		<div class="feature_g">
			<!--左侧-->
			<div class="feature_g_l">
				<a href=""><img src="/my/tpzol/Public/Home/images/18.jpg"/></a>
			</div>
			<!--中间-->
			<div class="feature_g_m">
				<a href=""><img src="/my/tpzol/Public/Home/images/19.jpg"/></a>
				<a href=""><img src="/my/tpzol/Public/Home/images/20.jpg"/></a>
			</div>
			<!--右边-->
			<div class="feature_g_r">
				<ul>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/21.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/22.png"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/23.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/24.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/25.png"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/26.jpg"/></a></li>
				</ul>
			</div>
		</div>
		<!--特色购商品结束-->
	</div>
	<!--特色购结束-->
	<div class="ad">
		<a href=""><img src="/my/tpzol/Public/Home/images/ad.jpg" alt="" /></a>
	</div>
	<!--1楼开始-->
	<div class="f">
		<div class="boutique">
			<h2>1F  电脑数码</h2>
			<span><a href="">更多团购></a></span>
		</div>
		<div class="f_goods">
			<!--左侧-->
			<div class="f_goods_l">
				<a href=""><img src="/my/tpzol/Public/Home/images/27.jpg"/></a>
			</div>
			<!--中间-->
			<div class="f_goods_m">
				<div class="m_lunbo">
					<ul>
						<li><a href=""><img src="/my/tpzol/Public/Home/images/28.jpg"/></a></li>
						<li><a href=""><img src="/my/tpzol/Public/Home/images/29.jpg"/></a></li>
						<li><a href=""><img src="/my/tpzol/Public/Home/images/30.jpg"/></a></li>
					</ul>
				</div>
				<ul class="m_box">
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="/my/tpzol/Public/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="/my/tpzol/Public/Home/images/32.png"/></a>
					</li>
				</ul>
			</div>
			<!--右侧-->
			<div class="f_goods_r">
				<ul class="r_box">
					<!--调用商品表数据-->
					<?php foreach ($goods as $v) { ?>
					<li>
						<p><a href="<?php echo U('List/index',array('gid'=>$v['gid']));?>"><?php echo ($v['gname']); ?></a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="<?php echo ($v['pic_list']); ?>"/></a>
					</li>
					<?php } ?>
				</ul>
			</div>
			<!--底部品牌-->
			<div class="brand">
				<ul>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!--2楼结束-->
	<div class="ad">
		<a href=""><img src="/my/tpzol/Public/Home/images/ad.jpg" alt="" /></a>
	</div>
	<!--2楼开始-->
	<div class="f">
		<div class="boutique">
			<h2>3F  智能数码</h2>
			<span><a href="">更多团购></a></span>
		</div>
		<div class="f_goods">
			<!--左侧-->
			<div class="f_goods_l">
				<a href=""><img src="/my/tpzol/Public/Home/images/27.jpg"/></a>
			</div>
			<!--中间-->
			<div class="f_goods_m">
				<div class="m_lunbo">
					<ul>
						<li><a href=""><img src="/my/tpzol/Public/Home/images/28.jpg"/></a></li>
						<li><a href=""><img src="/my/tpzol/Public/Home/images/29.jpg"/></a></li>
						<li><a href=""><img src="/my/tpzol/Public/Home/images/30.jpg"/></a></li>
					</ul>
				</div>
				<ul class="m_box">
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="/my/tpzol/Public/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="/my/tpzol/Public/Home/images/32.png"/></a>
					</li>
				</ul>
			</div>
			<!--右侧-->
			<div class="f_goods_r">
				<ul class="r_box">
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="/my/tpzol/Public/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="/my/tpzol/Public/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="/my/tpzol/Public/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="/my/tpzol/Public/Home/images/32.png"/></a>
					</li>
				</ul>
			</div>
			<!--底部品牌-->
			<div class="brand">
				<ul>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="/my/tpzol/Public/Home/images/33.jpg"/></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!--3楼结束-->
</div>
<!--内容主体结束-->
<!--底部开始-->
<div id="footer">
	<!--底部外100%宽度开始-->
	<div class="footer_outer">
		<!--底部内宽开始-->
		<div class="footer_inside">
			<div class="footer_server">
				<img src="/my/tpzol/Public/Home/images/34.png"/>
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
			<img src="/my/tpzol/Public/Home/images/34.jpg"/>
			<img src="/my/tpzol/Public/Home/images/35.jpg"/>
			<img src="/my/tpzol/Public/Home/images/36.jpg"/>
		</div>
	</div>
</div>
<!--底部结束-->
	</body>
</html>