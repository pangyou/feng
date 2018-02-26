<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/myProject/tpzol/Public/Home/css/list.css"/>
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
		<div style="background:url(.//myProject/tpzol/Public/Home/images/03.jpg) top center no-repeat;">
			<!--搜索开始-->
			<div id="search">
				<!--logo开始-->
				<img class="logo" src="/myProject/tpzol/Public/Home/images/02.png"/>
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
				<img class="r_logo" src="/myProject/tpzol/Public/Home/images/04.jpg"/>
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
			<!--属性导航开始-->
			<div id="catenav">
				<!--面包屑开始-->
				<p class="bread">
					<a href="">首页</a>   >
				</p>
				<!--面包屑结束-->
				<!--商品属性开始-->
				<div class="catenav_box">
					<div class="item">
						<?php if(is_array($attr)): foreach($attr as $k=>$v): ?><dl>
							<dt>{$v['name']}:</dt>
							<dd>
								<ul>
									<?php
 $temp = $param; $temp[$k] = 0; ?>
									<li><a href="{:U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}" <?php if($param[$k] == 0): ?>class="hover"<?php endif ?>>不限</a></li>
									<?php if(is_array($v['value'])): foreach($v['value'] as $key=>$vv): $temp[$k] = $vv['gaid']; ?>
									<li><a href="{:U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}" <?php if($param[$k] == $value['gtid']): ?>class="hover"<?php endif ?> >{$vv['gavalue']}</a></li><?php endforeach; endif; ?>
								</ul>
							</dd>
						</dl><?php endforeach; endif; ?>
					</div>
				</div>
					
			</div>
				<!--商品属性结束-->
				<p class="link"></p>
			</div>
			<!--属性导航结束-->
			<div class="server">
				<img src="/myProject/tpzol/Public/Home/images/37.png"/>
			</div>
			<!--列表主体内容开始-->
			<div id="content">
				<!--属性选手开始-->
				<div class="sort">
					<ul>
						
						<li><a class="click" href="">默认</a></li>
						<li><a href="">高人气</a></li>
						<li><a href="">高销量</a></li>
						<li><a href="">价格由高到低</a></li>
						<li><a href="">价格由低到高</a></li>
						<li><a href="">发货地</a></li>
						<li class="price">
							<div class="price1"><input type="text" name="price1" id="" value="$" /></div>
							<i>  -  </i>
							<div class="price1"><input type="text" name="price1" id="" value="$" /></div>
						</li>
						<li class="screening">
							<div class="check">
								<input type="checkbox" name="checkbox[]" id="" value="" />  限时抢购
							</div>
							<div class="check">
								<input type="checkbox" name="checkbox[]" id="" value="" />  限时抢购
							</div>
						</li>
						
					</ul>
				</div>
				<!--属性选择结束-->
				<!--商品开始-->
				<ul class="list_goods">
					<?php if(is_array($goods)): foreach($goods as $key=>$v): ?><a href="{:U('Goods/index',array('gid'=>$v['gid'],'cid'=>$v['cid']))}"><li>
							<img src="{$v['listimg']}"}/>
							<div class="goods_title">
								<a href="{:U('Goods/index',array('gid'=>$v['gid'],'cid'=>$v['cid']))}"><span>[限时促销]</span> {$v['gname']}</a>
							</div>
							<span class="goods_price">¥{$v['sprice']}</span>
							<div class="volume">
								<span class="v_l">销售数<i>200</i></span>
								<span class="v_r">评价数<i>2</i></span>
							</div>
							<a class="shop" href="">星球通官方旗舰店</a>
							<div class="wai">
								<a href="">店铺总成交<span>587</span>笔</a>
							</div>
							<p class="like"><span>+</span> 关注</p>
						</li></a><?php endforeach; endif; ?>
				</ul>
				<!--商品结束-->
				<div class="page">
					<ul>
						<li><a href="">上一页</a></li>
						<li><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">4</a></li>
						<li><a href="">5</a></li>
						<li><a href="">下一页</a></li>
					</ul>
				</div>
			</div>
			<!--列表主体内容结束-->
			<!--底部开始-->
<div id="footer">
	<!--底部外100%宽度开始-->
	<div class="footer_outer">
		<!--底部内宽开始-->
		<div class="footer_inside">
			<div class="footer_server">
				<img src="/myProject/tpzol/Public/Home/images/34.png"/>
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
			<img src="/myProject/tpzol/Public/Home/images/34.jpg"/>
			<img src="/myProject/tpzol/Public/Home/images/35.jpg"/>
			<img src="/myProject/tpzol/Public/Home/images/36.jpg"/>
		</div>
	</div>
</div>
<!--底部结束-->
	</body>
</html>