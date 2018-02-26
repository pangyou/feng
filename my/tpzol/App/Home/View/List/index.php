<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/Home/css/list.css"/>
	</head>
	<body>
	<include file="./App/Home/View/Common/head.php"/>
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
						<foreach name="attr" key="k"  item="v">
						<dl>
							<dt>{$v['name']}:</dt>
							<dd>
								<ul>
									<?php
										$temp = $param;
										$temp[$k] = 0;	
									?>
									<li><a href="{{:U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}}" <?php if($param[$k] == 0): ?>class="hover"<?php endif ?>>不限</a></li>
									<foreach name="v['value']" item="vv">
									<?php
              							$temp[$k] =  $vv['gaid'];	
              						?>
									<li><a href="{{:U('List/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}}" <?php if($param[$k] == $value['gtid']): ?>class="hover"<?php endif ?> >{$vv['gavalue']}</a></li>
									</foreach>
								</ul>
							</dd>
						</dl>
						</foreach>
					</div>
				</div>
					
			</div>
				<!--商品属性结束-->
				<p class="link"></p>
			</div>
			<!--属性导航结束-->
			<div class="server">
				<img src="__PUBLIC__/Home/images/37.png"/>
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
					<foreach name="goods" item="v">
						<a href="{{:U('Content/index',array('gid'=>$v['gid'],'cid'=>$v['cid']))}}"><li>
							<img src="{{$v[pic_list]}}"}/>
							<div class="goods_title">
								<a href="{{:U('Goods/index',array('gid'=>$v['gid'],'cid'=>$v['cid']))}}"><span>[限时促销]</span> {{$v['gname']}}</a>
							</div>
							<span class="goods_price">¥{{$v['sprice']}}</span>
							<div class="volume">
								<span class="v_l">销售数<i>200</i></span>
								<span class="v_r">评价数<i>2</i></span>
							</div>
							<a class="shop" href="">星球通官方旗舰店</a>
							<div class="wai">
								<a href="">店铺总成交<span>587</span>笔</a>
							</div>
							<p class="like"><span>+</span> 关注</p>
						</li></a>
					</foreach>
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
