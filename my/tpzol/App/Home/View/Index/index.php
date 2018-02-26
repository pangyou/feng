<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/css.css"/>
		<script src="__PUBLIC__/Home/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="__PUBLIC__/Home/js/js.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
<include file="./App/Home/View/Common/head.php"/>
			<!--主导航开始-->
			<div id="nav">
				<!--导航左侧开始-->
				<div class="nav_l">
					<ul>
						<?php foreach ($cate as $v): ?>
						<li>
							<?php foreach ($v['_data'] as  $va) { ?>
							<a style="margin-right: 15px; line-height: 39px;" class="a1" href="{{:U('List/Index',array(cid=>$va['cid']))}}">{{$va['cname']}}</a>  
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
								<?php foreach ($v['_data'] as  $va) { ?>
								<dl>
									<dt>
										<a href="">{{$va['cname']}}</a>
									</dt>
									<dd>
										<?php foreach ($va['_data'] as  $vv) { ?>
										<a href="">{{$vv['cname']}}</a>|
										<?php } ?>
									</dd>
								</dl>
								<?php } ?>
							</div>
						</li>
						<?php endforeach ?>
					</ul>
					<img src="__PUBLIC__/Home/images/06.gif"/>
				</div>
				<!--主导航左侧结束-->
				<!--主导航轮播图开始-->
				<div class="nav_m">
					<div class="lunbo">
						<ul>
							<li><a href=""><img src="__PUBLIC__/Home/images/07.jpg"/></a></li>
							<li><a href=""><img src="__PUBLIC__/Home/images/08.jpg"/></a></li>
							<li><a href=""><img src="__PUBLIC__/Home/images/09.jpg"/></a></li>
							<li><a href=""><img src="__PUBLIC__/Home/images/10.jpg"/></a></li>
							<li><a href=""><img src="__PUBLIC__/Home/images/11.jpg"/></a></li>
							<li><a href=""><img src="__PUBLIC__/Home/images/12.jpg"/></a></li>
							<li><a href=""><img src="__PUBLIC__/Home/images/07.jpg"/></a></li>
						</ul>
					</div>
				</div>
				<!--主导航轮播图结束-->
				<!--主导航右侧开始-->
				<div class="nav_r">
					<a href="http://go.zol.com/topic/5062097.html"><img src="__PUBLIC__/Home/images/13.jpg"/></a>
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
			<li style="border-left: 1px solid #EDEDED;"><a href=""><img src="__PUBLIC__/Home/images/14.jpg"/></a></li>
			<li><a href=""><img src="__PUBLIC__/Home/images/15.jpg"/></a></li>
			<li><a href=""><img src="__PUBLIC__/Home/images/16.jpg"/></a></li>
			<li style="border-right: 1px solid #EDEDED;"><a href=""><img src="__PUBLIC__/Home/images/17.jpg"/></a></li>
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
				<a href=""><img src="__PUBLIC__/Home/images/18.jpg"/></a>
			</div>
			<!--中间-->
			<div class="feature_g_m">
				<a href=""><img src="__PUBLIC__/Home/images/19.jpg"/></a>
				<a href=""><img src="__PUBLIC__/Home/images/20.jpg"/></a>
			</div>
			<!--右边-->
			<div class="feature_g_r">
				<ul>
					<li><a href=""><img src="__PUBLIC__/Home/images/21.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/22.png"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/23.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/24.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/25.png"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/26.jpg"/></a></li>
				</ul>
			</div>
		</div>
		<!--特色购商品结束-->
	</div>
	<!--特色购结束-->
	<div class="ad">
		<a href=""><img src="__PUBLIC__/Home/images/ad.jpg" alt="" /></a>
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
				<a href=""><img src="__PUBLIC__/Home/images/27.jpg"/></a>
			</div>
			<!--中间-->
			<div class="f_goods_m">
				<div class="m_lunbo">
					<ul>
						<li><a href=""><img src="__PUBLIC__/Home/images/28.jpg"/></a></li>
						<li><a href=""><img src="__PUBLIC__/Home/images/29.jpg"/></a></li>
						<li><a href=""><img src="__PUBLIC__/Home/images/30.jpg"/></a></li>
					</ul>
				</div>
				<ul class="m_box">
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="__PUBLIC__/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="__PUBLIC__/Home/images/32.png"/></a>
					</li>
				</ul>
			</div>
			<!--右侧-->
			<div class="f_goods_r">
				<ul class="r_box">
					<!--调用商品表数据-->
					<?php foreach ($goods as $v) { ?>
					<li>
						<p><a href="{{:U('List/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="{{$v['pic_list']}}"/></a>
					</li>
					<?php } ?>
				</ul>
			</div>
			<!--底部品牌-->
			<div class="brand">
				<ul>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!--2楼结束-->
	<div class="ad">
		<a href=""><img src="__PUBLIC__/Home/images/ad.jpg" alt="" /></a>
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
				<a href=""><img src="__PUBLIC__/Home/images/27.jpg"/></a>
			</div>
			<!--中间-->
			<div class="f_goods_m">
				<div class="m_lunbo">
					<ul>
						<li><a href=""><img src="__PUBLIC__/Home/images/28.jpg"/></a></li>
						<li><a href=""><img src="__PUBLIC__/Home/images/29.jpg"/></a></li>
						<li><a href=""><img src="__PUBLIC__/Home/images/30.jpg"/></a></li>
					</ul>
				</div>
				<ul class="m_box">
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="__PUBLIC__/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="__PUBLIC__/Home/images/32.png"/></a>
					</li>
				</ul>
			</div>
			<!--右侧-->
			<div class="f_goods_r">
				<ul class="r_box">
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="__PUBLIC__/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="__PUBLIC__/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="__PUBLIC__/Home/images/32.png"/></a>
					</li>
					<li>
						<p><a href="">魅蓝metal 时尚金属机身</a></p>
						<p>新品现货，赠高清贴膜</p>
						<a href=""><img src="__PUBLIC__/Home/images/32.png"/></a>
					</li>
				</ul>
			</div>
			<!--底部品牌-->
			<div class="brand">
				<ul>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
					<li><a href=""><img src="__PUBLIC__/Home/images/33.jpg"/></a></li>
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
