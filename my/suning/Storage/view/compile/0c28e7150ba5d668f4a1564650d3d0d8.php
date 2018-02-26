<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>苏宁易购(Suning) -综合网上购物商城,正品行货,全国联保,货到付款！</title>
	<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="./Public/Home/css/index1.css" />
</head>
<body>
	<!--头部开始-->
	<a href="javascript:;" class="top_active"></a>
	<div id="head">
		<div class="top">
			<div class="top_left">
				<div class="box">
					<span>网站导航</span>
				</div>
				<a href="javascript:;">商家入驻</a>
			</div>
			<div class="top_right">
				<ul>
					<li>
										<a href="http://123.207.140.146/my/suning/index.php?m=Home&c=Login&a=index">登录</a>
					
               					</li>
					<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=Reg&a=index">注册</a></li>
					<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=Person&a=orders">我的订单</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=Person&a=index">我的易购</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li class="gouwuche">
						<em class="glyphicon glyphicon-shopping-cart"></em>
						<a href="http://123.207.140.146/my/suning/index.php?m=Home&c=Content&a=cartshow">购物车</a>
						<span class="total_num" id='total_num'>
													<b>0</b>
						</span>
					</li>				
					<li>
						<em></em>
						<a href="javascript:;">手机苏宁</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
					<li><a href="javascript:;">易付宝</a></li>
					<li><a href="javascript:;">政府采购</a></li>
					<li>
						<a href="javascript:;">客户服务</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
	<!--头部结束-->
	<!--搜索区域设置开始-->
	<div id="search">
		<div class="left">
			<img src="./Public/Home/images/logo.png" alt="" />
			<img src="./Public/Home/images/logo1.gif" alt="" />
		</div>
		<div class="center">
			<div class="search">
				<i class="glyphicon glyphicon-search"></i>
				<form action="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index" method="post">
					<div class="search_box">
						<input type="text" name="search" id='search_keyword' placeholder="tcl,美的联合大促 49元定金翻n倍购"/>
					</div>
					<input type="submit" value="搜索" id="search_submit" />
				</form>
				<div class="search_bottom">
					<a class="a_yellow" href='javascript:;'>万人抢空调</a>
					<a href="">525元拍汽车</a>
					<a class="a_yellow" href="javascript:;">下单立享5折</a>
					<a href="javascript:;">笔记本85折起</a>
				 	<a href="javascript:;">儿童节省薪礼</a>					
				 	<a href="javascript:;">抢冰箱预定</a>
				 	<a href="javascript:;">40寸智能999</a>
				 	<a href="javascript:;">小电劲爆五折</a>
				</div>
			</div>
		</div>
		<div class="right">
			<img src="./Public/Home/images/logo3.jpg" alt="" />
		</div>
	</div>
	<!--搜索区域设置结束-->
	<!--菜单设置开始-->
	<div id="list">
		<div class="left">
			<a href="javascript:;"class="a1">
				<span>全部商品分类</span>
				<span class="sp1"></span>
			</a>
		</div>
				<div class="right">
			<ul>
								<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index&cid=75">服装城 </a></li>
								<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index&cid=76">苏宁会员 </a></li>
								<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index&cid=77">电器城 </a></li>
								<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index&cid=78">苏宁超市 </a></li>
								<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index&cid=79">红孩子母婴                 <i></i>
                </a></li>
								<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index&cid=80">大聚惠 </a></li>
								<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index&cid=81">苏宁金融 </a></li>
								<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index&cid=82">海外购 </a></li>
								<li><a href="http://123.207.140.146/my/suning/index.php?m=Home&c=GoodsList&a=index&cid=83">中华特色馆 </a></li>
							</ul>
		</div>
	</div>
	<!--菜单设置结束-->
	<!--二级菜单开始-->
	<div id="menu">
		<div class="menu">
			<div class="menu_left">
				<ul>
					<?php foreach ($cate as $v){?>
					<li>
						<?php foreach ($v['_data'] as $vv){?>
						<a href="<?php echo U('GoodsList/index',array('cid'=>$vv['cid']))?>" class="a1"><?php echo $vv['cname']?></a>
						<?php }?>
						<div class="box">
							<div class="box_list">
								<?php foreach ($v['_data'] as $va){?>
								<?php foreach ($va['_data'] as $vb){?>
								<dl>
									
									<dt><a href="<?php echo U('GoodsList/index',array('cid'=>$vb['cid']))?>"><?php echo $vb['cname']?></a></dt>
									<dd>
										<?php foreach ($vb['_data'] as $key => $value) { ?>
										<a <?php if(in_array($key,array(15,19,18,36,40,50,43,48,68,84,85,130,131,135,141))){?>
                class="yellow"
               <?php }?>href="<?php echo U('GoodsList/index',array('cid'=>$value['cid']))?>" target="_blank"><?php echo $value['cname']?></a>
										<?php }  ?>
									</dd>
								</dl>
								<?php }?>
								<?php }?>
							</div>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
			<div class="menu_center">
				<!--第一个轮播图-->
				<div class="imgscroll2">
					<div class="imglist">
						<li class="imgurl"><img src="./Public/Home/images/lb.jpg" /></li>
						<li class="imgurl"><img src="./Public/Home/images/lb2a.jpg" /></li>
						<li class="imgurl"><img src="./Public/Home/images/lb3.jpg" /></li>
						<li class="imgurl"><img src="./Public/Home/images/lb4.jpg" /></li>
						<li class="imgurl"><img src="./Public/Home/images/lb5.jpg" /></li>
						<li class="imgurl"><img src="./Public/Home/images/lb6.jpg" /></li>
					</div>
					<div class="imgdesc">
						<li class="hover"></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</div>
				</div>
			</div>
			<div class="menu_right">
				<div class="menu_right_son">
					<ul>
						<li class="yellow">
							<a href="javascript:;">公告</a>
							<span class='left'></span>
							<span class="right"></span>
						</li>
						<li><a href="javascript:;">足球</a></li>		
						<li><a href="javascript:;">APP</a></li>
					</ul>
					<div class="info1">
						<p class="yellow"><a href="javascript:;"><em>[促销]</em> 爆款配件1元秒 仅此一天</a></p>
						<p><a href="javascript:;"><em>[促销]</em>猛戳领518元任性红包</a></p>
						<p><a href="javascript:;"><em>[促销]</em>6.1元超低价 玩爆儿童节</a></p>
						<p><a href="javascript:;"><em>[促销]</em>庆六一游戏装备 9.9元起</a></p>
						<p><a href="javascript:;"><em>[公告]</em>免邮服务升级公告</a></p>
					
					</div>
					<div class="info2">
						<a href="javascript:;">
							<i class='glyphicon glyphicon-yen'></i>
							<em>充话费</em>
						</a>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-envelope'></i>
							<em>还款</em>
						</a>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-inbox'></i>
							<em>火车票</em>
						</a>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-barcode'></i>
							<em>充流量</em>
						</a>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-tint'></i>
							<em>水电煤</em>
						</a>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-briefcase'></i>
							<em>理财</em>
						</a>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-credit-card'></i>
							<em>消费贷款</em>
						</a>
						<a href="javascript:;">
							<i class=' glyphicon glyphicon-list-alt'></i>
							<em>球票</em>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--二级菜单结束-->
	<!--第二个轮播图设置开始-->
	<div class="imgscroll1">
		<div id="fa">
			<div class="pre1"><</div>
			<div class="next1">></div>
			<div class="all">
				<div class="son son0">
					<img src="./Public/Home/images/lbb1.jpg" alt="" />
					<img src="./Public/Home/images/lbb2.jpg" alt="" />
					<img src="./Public/Home/images/lbb3.png" alt="" />
					<img src="./Public/Home/images/lbb4.png" alt="" />		
				</div>
				<div class="son son1">
					<img src="./Public/Home/images/lbaa1.jpg" alt="" />
					<img src="./Public/Home/images/lbaa2.png" alt="" />
					<img src="./Public/Home/images/lbaa3.jpg" alt="" />
					<img src="./Public/Home/images/lbaa4.jpg" alt="" />
				</div>
				<div class="son son2">
					<img src="./Public/Home/images/lbbb1.jpg" alt="" />
					<img src="./Public/Home/images/lbbb2.jpg" alt="" />
					<img src="./Public/Home/images/lbbb3.png" alt="" />
					<img src="./Public/Home/images/lbbb4.png" alt="" />
				</div>
				<div class="son son3">
					<img src="./Public/Home/images/lbcc4.jpg" alt="" />
					<img src="./Public/Home/images/lbcc3.png" alt="" />
					<img src="./Public/Home/images/lbcc2.jpg" alt="" />
					<img src="./Public/Home/images/lbcc1.jpg" alt="" />
				</div>
				<div class="son son4">
					<img src="./Public/Home/images/lbb1.jpg" alt="" />
					<img src="./Public/Home/images/lbb2.jpg" alt="" />
					<img src="./Public/Home/images/lbb3.png" alt="" />
					<img src="./Public/Home/images/lbb4.png" alt="" />	
				</div>
			</div>
		</div>
	</div>
	<!--轮播图设置结束-->
	<!--第二屏设置开始-->
	<div id="second">
		<div class="title">
			<h3>放心去喜欢</h3>
		</div>
		<div class="second_left">
			<a href="javascript:;"><img src="./Public/Home/images/like1.jpg" alt="" /></a>
			<a href="javascript:;"><img src="./Public/Home/images/2.png" alt="" /></a>
		</div>
		<div class="second_right">
			<ul>
				<li><a href="javascript:;"><img src="./Public/Home/images/like2.jpg" alt="" /></a></li>
			  	<li><a href="javascript:;"><img src="./Public/Home/images/like3.jpg" alt="" /></a></li>		
			  	<li><a href="javascript:;"><img src="./Public/Home/images/like4.jpg" alt="" /></a></li>
			  	<li><a href="javascript:;"><img src="./Public/Home/images/like5.jpg" alt="" /></a></li>
			  	<li><a href="javascript:;"><img src="./Public/Home/images/like6.jpg" alt="" /></a></li>		
			  	<li><a href="javascript:;"><img src="./Public/Home/images/like7.png" alt="" /></a></li>
			  	<li><a href="javascript:;"><img src="./Public/Home/images/like8.jpg" alt="" /></a></li>
			  	<li><a href="javascript:;"><img src="./Public/Home/images/like9.jpg" alt="" /></a></li>		
			</ul>
		</div>
	</div>
	<!--第二屏设置结束-->
	<!--第三屏设置开始-->
	<div id="three">
		<div class="title">
			<h3>大牌盛宴</h3>
		</div>
		<div class="left">
			<a href="javascript:;"><img src="./Public/Home/images/4.jpg" alt="" /></a>
		</div>
		<div class="right">
			<ul>
			<!-- 调取品牌表数据 -->
				<?php foreach ($brand as $k=>$v){?>
				<li <?php if(in_array($k,array(0,1,6,7,12,13))){?>
                 class="li1" 
               <?php }?>>
					<a href="<?php echo U('GoodsList/index',array('bid'=>$v['bid']))?>"><img src="<?php echo $v['logo']?>" alt="" /></a>
					<i></i>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
	<!--第三屏设置结束-->
	<div id="adv1">
		<a href="javascript:;"><img src="./Public/Home/images/2.jpg" alt="" /></a>
	</div>
	<!--猜你喜欢部分设置开始-->
	<div id="like">
		<div class="title">
			<h3>猜你喜欢</h3>
			<a href="javascript:;" class="title_right">
				<i class='glyphicon glyphicon-heart'></i>
				换一换
			</a>
		</div>
		<ul>
		<!-- 猜你喜欢数据 -->
			 <?php foreach ($like as $v){?>
			<li>
				<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><img src="<?php echo $v['pic_list']?>" alt="" /></a>
				<p><?php echo $v['gname']?></p>
				<span>
					<i>¥</i>
					<em><?php echo $v['sprice']?></em>
				</span>
			</li>
			<?php }?>
		</ul>
	</div>
	<!--猜你喜欢部分设置结束-->
	<!--1楼设置开始-->
	<div id="F1">
		<div class="Ftitle">
			<h3>F1 服装百货</h3>
			<ul class="floorTab">
				<li class="on">
					<a href="javascript:;"><em>热门活动</em></a>
					<span></span>
				</li>
				<li>
					<a href="javascript:;"><em>绅士男装</em></a>
					<span></span>
				</li>
				<li>
					<a href="javascript:;"><em>女装内衣</em></a>
					<span></span>
				</li>
				<li>
					<a href="javascript:;"><em>运动户外</em></a>
					<span></span>
				</li>
				<li>
					<a href="javascript:;"><em>鞋包装配</em></a>
					<span></span>
				</li>
			</ul>
		</div>
		<div class="side">
			<a href="javascript:;" title="红谷品牌日" class="side_img">
				<img src="./Public/Home/images/1fa1.jpg" alt="" />
			</a>
			<ul class="entrances">
				<li>
					<a href="javascript:;">
						<i class=' glyphicon glyphicon-user'></i>
						<em>服装城</em>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class='glyphicon glyphicon-time'></i>
						<em>钟表馆</em>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class='glyphicon glyphicon-briefcase'></i>
						<em>皮具箱包</em>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class='glyphicon glyphicon-dashboard'></i>
						<em>运动馆</em>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class=' glyphicon glyphicon-gift'></i>
						<em>珠宝馆</em>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class='glyphicon glyphicon-floppy-disk'></i>
						<em>家具馆</em>
					</a>
				</li>
			</ul>
			<div class="hot_word">
				<div>
					<?php foreach ($catefta as $v){?>
					<a href="<?php echo U('GoodsList/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?></a>
					<?php }?>
				</div>
				<div class="hot_word_right">
					<?php foreach ($cateftb as $v){?>
					<a href="<?php echo U('GoodsList/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?></a>
					<?php }?>
				</div>
			</div>
			<div class="last_img">
				<a href="javascript:;"><img src="./Public/Home/images/1fa2.jpg" alt="" /></a>
			</div>
		</div>
		<div class="side_right">
			<ul class="side_right_list">
				<!-- 1F数据 -->
				<?php foreach ($clothes as $v){?>
				<li>
					<p class="side_img"> 
						<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><img src="<?php echo $v['pic_list']?>" alt="" /></a>
					</p>
					<p class="side_name">
						<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><?php echo $v['gname']?></a>
					</p>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
	<!--1楼设置结束-->
	<!--2楼设置开始-->
	<div id="F2">
		<div class="Ftitle">
			<h3>F2 手机通讯</h3>
			<ul class="floorTab">
				<li class="on">
					<a href="javascript:;"><em>热门活动</em></a>
					<span></span>
				</li>
				<li>
					<a href="javascript:;"><em>潮机推荐</em></a>
					<span></span>
				</li>
				<li>
					<a href="javascript:;"><em>手机配件</em></a>
					<span></span>
				</li>
				<li>
					<a href="javascript:;"><em>智能手环</em></a>
					<span></span>
				</li>
			</ul>
		</div>
		<div class="side">
			<a class="side_img" href="javascript:;">
				<img src="./Public/Home/images/2fa1.jpg" alt="" />
			</a>
			<ul class="entrances">
				<li>
					<a href="javascript:;">
						<i class='glyphicon glyphicon-phone'></i>
						<em>热卖手机</em>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class='glyphicon glyphicon-pushpin'></i>
						<em>手机配件</em>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<i class='glyphicon glyphicon-record'></i>
						<em>营业厅</em>
					</a>
				</li>
			</ul>
			<div class="hot_word">  
			<!-- 分类表数据 -->
				<div>
					<?php foreach ($cate1 as $v){?>
					<a href="<?php echo U('GoodsList/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?></a>
					<?php }?>
				</div>
				<div class="hot_word_right">
					<?php foreach ($cate2 as $v){?>
					<a href="<?php echo U('GoodsList/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?></a>
					<?php }?>
					
				</div>
			</div>
		</div>
		<div class="side_right">
			<ul class="side_right_list">
			 <!-- 2楼手机数据 -->
			 	<?php foreach ($phone as $v){?>
				<li>
					<p class="side_img"> 
						<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><img src="<?php echo $v['pic_list']?>" alt="" /></a>
					</p>
					<p class="side_name">
						<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><?php echo $v['gname']?></a>
					</p>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
	<!--2楼设置结束-->
	<!-- 3楼设置开始 -->
	<div id="F3">
		<div class="Ftitle">
			<h3>F3 潮流新品秀</h3>
		</div>
		<div class="imgscroll3">
			<a href="javascript:;" class="pre"><</a>
			<a href="javascript:;" class="next">></a>
			<ul class="all">
				<!-- 调取五个商品 -->
				<?php foreach ($goodsc as $k=>$v){?>
				<li class="li li<?php echo $k+1?>">
					<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>">
						<img src="<?php echo $v['pic_list']?>" alt="" />
						<b></b>
					</a>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
	<!-- 3楼设置结束 -->
	<!--社区开始-->
	<div id="community">
		<div class="last_floor">
			<div class="left">
				<div class="_head">
					<a href="javascript:;">进入社区</a>
					<span></span>
				</div>
				<ul class="main">
					<li>
						<a href="javascript:;">
							<i class='glyphicon-tree-deciduous glyphicon glyphicon-cd '></i>
							全部板块
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-king'></i>
							官方专区
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-scissors'></i>
							母婴美妆
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-sunglasses'></i>
							享易购
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-object-align-vertical'></i>
							酷玩专区
						</a>
					</li>
					<li>
						<a href="javascript:;">
							<i class='glyphicon glyphicon-globe'></i>
							服务大厅
						</a>
					</li>
				</ul>
			</div>
			<div class="right">
				<div class="all">
					<div class="item">
						<!--最热度设置开始-->
						<div class="hots">
							<div class="hots_left">
								<a href="javascript:;">
									<img src="./Public/Home/images/lastf.jpg"/>
								</a>
							</div>
							<div class="hots_right">
								<h4 class="hots_rightH4">最热度</h4>
								<ul class="item_list">
									<li>
										<span></span>
										<a href="javascript:;">【辣妈酷娃】有种快乐 非宝莫属</a>
									</li>
									<li>
										<span></span>
										<a href="javascript:;">【野餐】咸香好吃的葱香饼干</a>
									</li>
									<li>
										<span></span>
										<a href="javascript:;">【晒】给辛勤的安装师傅点赞</a>
									</li>
									<li>
										<span></span>
										<a href="javascript:;">【家装】装修解决方案看这里！</a>
									</li>
									<li>
										<span></span>
										<a href="javascript:;">【干净新生活】棒棒哒净水器</a>
									</li>
									<li>
										<span></span>
										<a href="javascript:;">【烹饪】温暖整个冬天的糖芋苗</a>
									</li>
									<li>
										<span></span>
										<a href="javascript:;">【幸福】和宝宝超时空的约定</a>
									</li>
									<li>
										<span></span>
										<a href="javascript:;">【约】绚丽多彩的春天来了</a>
									</li>
								</ul>
							</div>
						</div>
						<!--最热度设置结束-->
						<!--晒单设置开始-->
						<div class="share">
							<h4>晒单</h4>
							<ul class="share_item">
								<li>
									<div class="face">
										<a href="javascript:;">
											<img src="./Public/Home/images/lastf1.jpg"/>
										</a>
									</div>
									<dl class="name">
										<dt>
											<img src="./Public/Home/images/lastf2.jpg" alt="" />
											<span>188******76</span>
										</dt>
										<dd>
											<a href="javascript:;">很好看，实际的机子比图片更好看，颜色是雅典白，很飘逸的感觉。</a>
										</dd>
									</dl>
								</li>
								<li>
									<div class="face">
										<a href="javascript:;">
											<img src="./Public/Home/images/lastf3.jpg"/>
										</a>
									</div>
									<dl class="name">
										<dt>
											<img src="./Public/Home/images/lastff2.jpg" alt="" />
											<span>阿誉***</span>
										</dt>
										<dd>
											<a href="javascript:;">这是我第一次做智能类互动机器人的评测。仅从入门者的角度分享了自己的一些感受，希望对其他玩友提供一些参考价值。</a>
										</dd>
									</dl>
								</li>
							</ul>
						</div>
						<!--晒单设置结束-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--社区结束-->
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
	<!--右侧公共部分设置开始-->
	<div id="sid_right">
		<div class="son1">
			<div class="top">
				<a href="<?php echo U('Content/cartshow')?>">
					<i class='i1'></i>
					<span>购物车</span>
					<?php if($_SESSION){?>
                
					<i><?php echo count($_SESSION['cart']['goods'])?></i>
					<?php }else{?>
					<i>0</i>
					
               <?php }?>
				</a>
			</div>
		</div>
		<div class="son2">
			
		</div>
	</div>
	<!--右侧公共部分设置结束-->







	
<script type="text/javascript" src="./Public/Home/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="./Public/Home/js/jquery.imgscroll.min.js"></script> 
<script type="text/javascript">
$(function(){
//	第一个轮播图设置(还差鼠标点击左右)
//	 轮播图设置开始
	imgScroll.gradual({
		 'name':'imgscroll2'
		 },3000)
	
	var c=['#EF7631','#DDBC82','#CEE9F0','#86DEF5','#EC1D25','#9E3BF8'];
	// 背景自动切换颜色
	var nu=0;
	function run(){
		nu++;if(nu>=6)nu=0;
		$("#menu").css({background:c[nu]});
	}
	timer=setInterval(run,3000)
	// 鼠标移入轮播图时,停止定时器
	$('#menu .menu_center').mouseover(function() {
		clearInterval(timer);
	})
	// 鼠标移出轮播图时,背景继续同步变色
	$('#menu .menu_center').mouseout(function() {
		$('.imgscroll2 .imgdesc li').mouseover(function(){nu=$(this).index();});
		timer=setInterval(run,3000)
	})
	 // 鼠标在li中移动背景同时变化颜色
	 timer1=setInterval(function(){
	 	$('#menu .imgscroll2 .imgdesc li').mouseover(function(){nu=$(this).index();});
	 	$("#menu").css({background:c[nu]});
	 },0)
	 // 轮播图设置结束
	// 四张图片轮播设置开始	
	var num=0;
	var yidon=1190;
	// 自动轮播
	function runf2(){
       num++;
       // 回路
       if(num>4){
       	// 回到顶点
       	   $(".son").css({left:0});
       	   num = 1;
       }
       // 获得新的left值
       var left = num * -yidon;
       $("#fa .son").animate({left:left+"px"},1000);
	}
	// 定时器
    timerf2 = setInterval(runf2,3000);
 	var b=0;
    $('#fa .next1').click(function(){
    	if(b==1){
     		return;
     	}
     	setTimeout(function(){
       	  b = 0;
        },500);
        b=1;
    	num++;	
    	if(num>4){
    		$('#fa .son').css({left:0});
    		num=1;
    	}
    	var left=-num*yidon;
    	$('#fa .son').animate({left:left+'px'},500);
    })
    var d=0;
    $('#fa .pre1').click(function(){
    	clearInterval(timerf2);
    	if(d==1){
     		return;
     	}
     	setTimeout(function(){
       	  d = 0;
        },500);
        d=1;
    	num--;	
    	if(num<0){
    		$('.son').css({left:-yidon*4+'px'});
    		num=3;
    	}
    	var left=num*-yidon;
    	$('#fa .son').animate({left:left+'px'},500);
    })
    $('#fa').hover(function() {
    	$('#fa .pre1,.next1').css({display:'block'});
    	clearInterval(timerf2);
    }, function() {
    	$('#fa .pre1,.next1').css({display:'none'});
    	timerf2=setInterval(runf2,3000);
    })
	 // 四张图片轮播设置结束
	 // tap切换设置效果开始
	 $('.floorTab li a').hover(function() {
	 	$(this).parents('li').addClass('on');
	 	$(this).parents('li').siblings('li').removeClass('on');
	 }, function() {
	 	
	 });

	 // tap切换设置效果结束
	 
	 
	 
	 
	 
	 // 潮流新品秀轮播图设置效果
	 // 为了多运动做准备所以用each
	$('.imgscroll3').each(function() {
		// 声明变量分别保存当前,因为js能改变值,jq不能
		var js_t = this;
		var jq_t = $(this);
		// 定义一个空数组,为了将运动的状态保存进去
		var start = []; 
		// 透明度
		var opacity = [0.6,0.3,0,0.3,0.6];
		// console.log(opacity);
		// 将状态存入(宽度,高度,left值,top值,z-index)
		start.push(['160px','240px','0px','60px',10]);
		start.push(['187px','280px','100px','30px',20]);
		start.push(["200px","300px","234px","0px",30]);
		start.push(["187px","280px","400px","30px",20]);
		start.push(["160px","240px","533px","60px",10]);
		// console.log(start);
		// 第1,2,3,4,5号元素移动
		js_t.m = 0;
		js_t.n = 1;
		js_t.x = 2;
		js_t.y =3;
		js_t.z =4;
		// 运动函数
		js_t.right=function(){
			// 判断范围
			js_t.m++;
			if(js_t.m>4)js_t.m=0;
			js_t.n++;
			if(js_t.n>4)js_t.n=0;
			js_t.x++;
			if(js_t.x>4)js_t.x=0;
			js_t.y++;
			if(js_t.y>4)js_t.y=0;
			js_t.z++;
			if(js_t.z>4)js_t.z=0;
			jq_t.find('.li1').css('z-index',start[js_t.m][4]).animate({'width':start[js_t.m][0],'height':start[js_t.m][1],'left':start[js_t.m][2],'top':start[js_t.m][3]},150);
			jq_t.find('.li2').css('z-index',start[js_t.n][4]).animate({'width':start[js_t.n][0],'height':start[js_t.n][1],'left':start[js_t.n][2],'top':start[js_t.n][3]},150);
			jq_t.find('.li3').css('z-index',start[js_t.x][4]).animate({'width':start[js_t.x][0],'height':start[js_t.x][1],'left':start[js_t.x][2],'top':start[js_t.x][3]},150);
			jq_t.find('.li4').css('z-index',start[js_t.y][4]).animate({'width':start[js_t.y][0],'height':start[js_t.y][1],'left':start[js_t.y][2],'top':start[js_t.y][3]},150);
			jq_t.find('.li5').css('z-index',start[js_t.z][4]).animate({'width':start[js_t.z][0],'height':start[js_t.z][1],'left':start[js_t.z][2],'top':start[js_t.z][3]},150);
			jq_t.find('.li1 b').css({opacity:opacity[js_t.m]});
			jq_t.find('.li2 b').css({opacity:opacity[js_t.n]});
			jq_t.find('.li3 b').css({opacity:opacity[js_t.x]});
			jq_t.find('.li4 b').css({opacity:opacity[js_t.y]});
			jq_t.find('.li5 b').css({opacity:opacity[js_t.z]});
		}
		// 定时器启动
		js_t.timer = setInterval(js_t.right,2000);
		// 鼠标移入停止,移出继续播放
		jq_t.hover(function() {
			clearInterval(js_t.timer);
			jq_t.find('.next').css({display:'block'});
			jq_t.find('.pre').css({display:'block',textDecoration:'none'});
		}, function() {
			js_t.timer = setInterval(js_t.right,2000);
			jq_t.find('.next').css({display:'none'});
			jq_t.find('.pre').css({display:'none'});
		});
		// 点击右边箭头
		jq_t.find('.next').click(function() {
			js_t.right();
		});
		js_t.left=function(){
			// 判断范围
			js_t.m--;
			if(js_t.m<0)js_t.m=4;
			js_t.n--;
			if(js_t.n<0)js_t.n=4;
			js_t.x--;
			if(js_t.x<0)js_t.x=4;
			js_t.y--;
			if(js_t.y<0)js_t.y=4;
			js_t.z--;
			if(js_t.z<0)js_t.z=4;
			jq_t.find('.li1').css('z-index',start[js_t.m][4]).animate({'width':start[js_t.m][0],'height':start[js_t.m][1],'left':start[js_t.m][2],'top':start[js_t.m][3]},150);
			jq_t.find('.li2').css('z-index',start[js_t.n][4]).animate({'width':start[js_t.n][0],'height':start[js_t.n][1],'left':start[js_t.n][2],'top':start[js_t.n][3]},150);
			jq_t.find('.li3').css('z-index',start[js_t.x][4]).animate({'width':start[js_t.x][0],'height':start[js_t.x][1],'left':start[js_t.x][2],'top':start[js_t.x][3]},150);
			jq_t.find('.li4').css('z-index',start[js_t.y][4]).animate({'width':start[js_t.y][0],'height':start[js_t.y][1],'left':start[js_t.y][2],'top':start[js_t.y][3]},150);
			jq_t.find('.li5').css('z-index',start[js_t.z][4]).animate({'width':start[js_t.z][0],'height':start[js_t.z][1],'left':start[js_t.z][2],'top':start[js_t.z][3]},150);
			jq_t.find('.li1 b').css({opacity:opacity[js_t.m]});
			jq_t.find('.li2 b').css({opacity:opacity[js_t.n]});
			jq_t.find('.li3 b').css({opacity:opacity[js_t.x]});
			jq_t.find('.li4 b').css({opacity:opacity[js_t.y]});
			jq_t.find('.li5 b').css({opacity:opacity[js_t.z]});
		}
		// 点击左边的箭头
		jq_t.find('.pre').click(function() {
			js_t.left();
		});
	});
})
</script>






</body>
</html>











