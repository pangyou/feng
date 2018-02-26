<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>订单中心_交易管理_我的易购</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="./Public/Home/css/person1.css"/>
</head>
<body>	
	<!--头部开始-->
		<div id="head">
		<div class="top">
			<div class="top_left">
				<a class="a1" href="http://127.0.0.1/suning/index.php?m=Home&c=Index&a=index">
					<i class="glyphicon glyphicon-home"></i>
					返回易购首页
				</a><b>|</b>
				<div class="box">	
					<span>网站导航</span>
					<em class="glyphicon glyphicon-menu-down"></em>
				</div>
				<a href="">商家入驻</a>
			</div>
			<div class="top_right">
				<ul>
					<li>
					                
					<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index">admin...</a>
										<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=orders">我的订单</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index">我的易购</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li class="gouwuche">
						<em class="glyphicon glyphicon-shopping-cart"></em>
						<a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=cartshow">购物车</a>
						<span class="total_num" id='total_num'>
														<b>0</b>
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
	<div id="my">
		<div class="my">
			<div class="left">
				<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index"></a>
			</div>
			<div class="right">
				<ul>
					<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index">首页</a></li>
					<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=adress">账户管理</a><i></i></li>
					<li><a href="">消息</a></li>
				</ul>
				<form action="" method="post">
					<div class="search">
						<input type="text" name="" id="" />
						<a href=""></a>
					</div>
				</from>			
			</div>
		</div>
	</div>
	<!--头部结束-->
	<!--右侧漂浮栏目二维码-->
	<div id="myTool">
		<a class="right1" href=""></a>
		<a class="right2" href=""></a>
	</div>
	<div class="line"></div>
	<div id="nav">
		<div class="left">
			<div class="dt">
				<i></i>
				<a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=cartshow">我的购物车</a>
			</div>
			<div class="dt">
				<i class="i2"></i>
				<span>订单中心</span>
			</div>
			<div class="dd">
				<ul>
					<li class="now"><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=orders">我的订单</a></li>
					<li><a href="">我的秒杀</a></li>
					<li><a class="a2" href="">我的二手</a></li>
					<li><a href="">我的试用</a></li>
					<li><a href="">我的拍卖</a></li>
				</ul>
			</div>
			<div class="dt">
				<i style='background-position: 1px -29px;'></i>
				<span>我的资产</span>
			</div>
			<div class="dd">
				<ul>
					<li ><a href="">我的云钻</a></li>
					<li><a href="">我的金融</a></li>
					<li><a class="a2" href="">我的优惠券</a></li>
					<li><a href="">我的苏宁卡</a></li>
					<li><a href="">我的任性付</a></li>
				</ul>
			</div>
			<div class="dt">
				<i style='background-position: 1px -43px;'></i>
				<span>关注中心</span>
			</div>
			<div class="dd">
				<ul>
					<li ><a href="">我的收藏</a></li>
					<li><a href="">我的足迹</a></li>
					<li><a class="a2" href="">我的评价</a></li>
				</ul>
			</div>
			<div class="dt">
				<i style='background-position: 1px -71px;'></i>
				<span>自助服务</span>
			</div>
			<div class="dd">
				<ul>
					<li ><a href="">退换货</a></li>
					<li><a href="">意见/建议</a></li>
					<li><a class="a2" href="">维修/保养</a></li>
					<li><a href="">修改订单</a></li>
					<li><a href="">我的咨询</a></li>
					<li><a href="">帮客预约</a></li>
				</ul>
			</div>
			<div class="dt">
				<i style='background-position: 1px -58px;'></i>
				<span>特色服务</span>
			</div>
			<div class="dd">
				<ul>
					<li ><a href="">我的预约</a></li>
					<li><a class="a2" href="">我的S码</a></li>
				</ul>
			</div>
			<a class="last" href="">
				<em></em>
			</a>
		</div>
		<div class="right">
			<div class="right_title">
				<h2 class="l">我的订单</h2>
				<div class="category l">
					<h3>
						<span>网上订单</span>
					</h3>
				</div>
				<div class="menu l">
					<h3>
						<span>其他订单</span>
					</h3>
					<!--隐藏区域设置-->
				</div>
			</div>
			<div class="main">
				<div class="state">
	<div class="tab">
		<ul class="l">
			<li class="now"><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=orders">全部订单</a></li>
			<li>
				<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=nopay">待付款</a><em>3</em>	
			</li>
			<li>
				<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=nore">待收货</a><em>3</em>	
			</li>
			<li>
				<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=nocom">待评价</a><em>3</em>	
			</li>
		</ul>
		<p class="r">
			<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=recycleShow">
				<i></i>
				订单回收站
			</a>
		</p>
	</div>
	<div class="cont">
		<p class="l">
			<input class="l" type="text" placeholder="商品名称和订单号" name="" id="" />
		<button class="r">搜索订单</button>
		</p>
		<strong class="l">更多筛选条件</strong>
	</div>
</div>
				<?php if(isset($_SESSION['aid'])){?>
                
				<div class="order-table">
					<ul class="ul">
						<li class="li1">
							<h3>订单商品</h3>
						</li>
						<li class="li2">
							<h3>支付总金额</h3>
						</li>
						<li class="li2">
							<h3>订单状态</h3>
						</li>
						<li class="li2">
							<h3>操作</h3>
						</li>
					</ul>
					<?php foreach ($data as $v){?>
					<div class="tableall">
						<table class="table">
							<tbody>
								<tr class="tr">
									<td class="td">
										<div>
											<em>下单时间：</em>
											<span><?php echo date('Y-m-d',$v['otime'])?></span>
										</div>
										<div>
											<em>订单编号：</em>
											<span><?php echo $v['number']?></span>
										</div>
										<div>
											<em>卖家：</em>
											<span>苏宁自营</span>
											<a class="tupian" href=""></a>
										</div>
										<a class="huishou" href="javascript:if(confirm('确定删除吗?'))location.href='<?php echo U('del',array('olid'=>$v['olid']))?>'"></a>
									</td>
								</tr>
								<tr class="infotwo">
									<td class="td2">
										<a class="a1" href="">
											<img src="<?php echo $v['oimg']?>" alt="">
										</a>
										<p>
											<a class="a2" href=""></a>
										</p>
									</td>
									<td class="price td3">
										<p class="p1"><i>¥</i><em><?php echo $v['subtotal']?></em></p>
										<p class="p2">在线支付</p>
									</td>
									<td class="actuality td3">
										<p class="p1"><?php echo $v['nstate']?></p>
										<?php if($v['nstate']=='未付款'){?>
                
										<p class="p2">
											<a href="<?php echo U('payMoney',array('olid'=>$v['olid']))?>">付款</a>
										</p>
										<p class="p2"><a href="">查看详情</a></p>
										<?php }else if($v['nstate']=='已付款'){?>
										<p class="p2">待发货</p>
										<p class="p2"><a href="">查看详情</a></p>
										<?php }else if($v['nstate']=='已发货'){?>
										<p class="p2"><a href="javascript:if(confirm('确认收货吗?'))location.href='<?php echo U('confirm',array('olid'=>$v['olid']))?>'">确认收货</a></p>
										<p class="p2"><a href="">查看详情</a></p>
										<?php }else if($v['nstate']=='已完成'){?>
										<p class="p2"><a href="javascript:;">评价</a></p>
										<p class="p2"><a href="">查看详情</a></p>
										
               <?php }?>
									</td>
									<td class="touch td3">
										<?php if($v['nstate']=='已完成'){?>
                
										<a class="again" href="">再次购买</a>
										
               <?php }?>
										<a class="again"  href="<?php echo U('rest',array('olid'=>$v['olid']))?>">还原</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<?php }?>
					<!--分页设置开始-->
					<div id="fenye">
					  <ul class="pagination">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
					</div>
					<!--分页设置结束-->
				</div>
				<?php }else{?>
				<div class="load">
					<p class="pic">
						<img src="./Public/Home/images/load-3.png"/>
					</p>
					<p class="load-text">嗷~暂时没有您想要的订单~</p>
					<p class="load-open">
						推荐您去：
						<a href="<?php echo U('Index/index')?>">首页</a>逛逛
					</p>
				</div>
				
               <?php }?>
			</div>
		</div>
		<!--为您推荐-->
		<div class="foryou">
			<div class="title">
				<h3>为您推荐</h3>
			</div>
			<!--轮播图,重新写-->
			<div class="imgscroll">
				<div class="all">
					<ul>
																	<li>
							<a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=60">
							<img src="Upload/Content/16/06/23941465807785.jpg" alt="" />
							</a>
							<p class="text"><a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=60">华为Mate S（CRR-UL00）双4G臻享32G版（极昼金）</a></p>
							<span>
								<i>¥</i>
								<em>2399.00</em>
							</span>
						</li>
												<li>
							<a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=61">
							<img src="Upload/Content/16/06/26051465807926.jpg" alt="" />
							</a>
							<p class="text"><a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=61">华为麦芒4 RIO-AL00 全网通4G手机 晨曦金</a></p>
							<span>
								<i>¥</i>
								<em>2299.00</em>
							</span>
						</li>
												<li>
							<a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=62">
							<img src="Upload/Content/16/06/26011465808171.jpg" alt="" />
							</a>
							<p class="text"><a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=62">荣耀畅玩5X（KIW-TL00H）（2GB RAM）移动4G版（暗夜灰）</a></p>
							<span>
								<i>¥</i>
								<em>999.00</em>
							</span>
						</li>
												<li>
							<a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=63">
							<img src="Upload/Content/16/06/59111465808330.jpg" alt="" />
							</a>
							<p class="text"><a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=63">华为 G7Plus  RIO-UL00双4G（香槟银）</a></p>
							<span>
								<i>¥</i>
								<em>1699.00</em>
							</span>
						</li>
												<li>
							<a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=64">
							<img src="Upload/Content/16/06/48571465808489.jpg" alt="" />
							</a>
							<p class="text"><a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=index&gid=64">华为 P8max 移动联通标配版双4G（银色）</a></p>
							<span>
								<i>¥</i>
								<em>1988.00</em>
							</span>
						</li>
											</ul>
				</div>
			</div>
		</div>
	</div>
	<!--底部设置开始-->
	<div id="footer">
		<div class="footer3">
			<div class="footer3_con">
				<p class="p1">
					<a href="">苏宁云商</a><span>|</span>
					<a href="">苏宁互联</a><span>|</span>
					<a href="">苏宁金融</a><span>|</span>
					<a href="">易付宝</a><span>|</span>
					<a href="">PPTV</a><span>|</span>
					<a href="">红孩子</a><span>|</span>
					<a href="">缤购</a><span>|</span>
					<a href="">乐购仕</a><span>|</span>
					<a href="">苏宁物流</a><span>|</span>
					<a href="">苏宁美国</a><span>|</span>
					<a href="">苏宁香港</a><span>|</span>
					<a href="">手机苏宁</a>
				</p>
				<p class="p1">
					<a href="">关于苏宁易购</a><span>|</span>
					<a href="">联系我们</a><span>|</span>
					<a href="">诚聘英才</a><span>|</span>
					<a href="">供应商入驻</a><span>|</span>
					<a href="">苏宁联盟</a><span>|</span>
					<a href="">苏宁招标</a><span>|</span>
					<a href="">友情链接</a><span>|</span>
					<a href="">法律申明</a><span>|</span>
					<a href="">用户体验提升计划</a><span>|</span>
					<a href="">股东会员认证</a>
				</p>
				<p class="p2">Copyright© 2002-2016 ，苏宁云商集团股份有限公司版权所有
					<a href="">苏ICP备10207551号-4</a>
					<a href="">苏B1-20130131</a>
					<a href="">苏B2-20130391</a>出版物经营许可证新出发苏批字第A-243号
				</p>
				<div class="footer3_img">
					<a href=""><img src="./Public/Home/images/footer3a1.png" alt="" /></a>
					<a href=""><img src="./Public/Home/images/dianxin.jpg" alt="" /></a>
					<a href=""><img src="./Public/Home/images/unicom.png" alt="" /></a>
					<a href=""><img src="./Public/Home/images/dianzi.png" alt="" /></a>
				</div>
			</div>
		</div>
	</div>
	<!--底部设置结束-->	
</body>
</html>
