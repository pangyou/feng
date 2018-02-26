<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $name?>-苏宁易购</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="./Public/Home/css/index1.css" />
<link rel="stylesheet" href="./Public/Home/css/list.css" />
</head>
<body>
	<!-- 头部开始--> 
	<div id="head">
		<div class="top">
			<div class="top_left">
				<a class="a1" href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=Index&a=index">
					<i class="glyphicon glyphicon-home"></i>
					返回易购首页
				</a><b>|</b>
				<div class="box">	
					<span>网站导航</span>
				</div>
				<a href="javascript:;">商家入驻</a>
			</div>
			<div class="top_right">
				<ul>
					<li>
										<a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=Login&a=index">登录</a>
					
               					</li>
					<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=Reg&a=index">注册</a></li>
					<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=Person&a=orders">我的订单</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=Person&a=index">我的易购</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li class="gouwuche">
						<em class="glyphicon glyphicon-shopping-cart"></em>
						<a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=Content&a=cartshow">购物车</a>
						<span class="total_num" id='total_num'>
							<!-- 写成$_SESSION['cart'] 会报错 -->
							                
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
				<from>
					<div class="search_box">
						<input type="text" id='search_keyword' placeholder="tcl,美的联合大促 49元定金翻n倍购"/>
					</div>
					<input type="submit" value="搜索" id="search_submit" />
				</from>
				<div class="search_bottom">
					<a class="a_yellow" href='javascript:;'>ZUK Z2</a>
					<a href="javascript:;">乐视手机</a>
					<a class="a_yellow" href="javascript:;">三星C5</a>
					<a href="javascript:;">魅蓝3</a>
				 	<a href="javascript:;">小米4S</a>					
				 	<a href="javascript:;">华为手机</a>
				 	<a href="javascript:;">荣耀4X</a>
				 	<a href="javascript:;">OPPO</a>
				 	<a class="a_yellow" href="javascript:;">努比亚Z11 Max</a>
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
			<a href="javascript:;" class="a1">
				<span>全部商品分类</span>
				<em class="glyphicon glyphicon-menu-down"></em>
			</a>
		</div>
				<div class="right">
			<ul>
								<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=GoodsList&a=index&cid=75">服装城 </a></li>
								<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=GoodsList&a=index&cid=76">苏宁会员 </a></li>
								<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=GoodsList&a=index&cid=77">电器城 </a></li>
								<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=GoodsList&a=index&cid=78">苏宁超市 </a></li>
								<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=GoodsList&a=index&cid=79">红孩子母婴                 <i></i>
                </a></li>
								<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=GoodsList&a=index&cid=80">大聚惠 </a></li>
								<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=GoodsList&a=index&cid=81">苏宁金融 </a></li>
								<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=GoodsList&a=index&cid=82">海外购 </a></li>
								<li><a href="http://127.0.0.1/myProject/suning/index.php?m=Home&c=GoodsList&a=index&cid=83">中华特色馆 </a></li>
							</ul>
		</div>
	</div>
	<!--菜单设置结束
	<!--内容设置开始-->
	<div id="search-main">
		<div class="F1">
			<div class="left"></div>
			<div class="right">
				<ul>
					<!-- 今日推荐数据 -->
				 	<?php foreach ($vivo as $v){?>
					<li>
						<a class="a1" href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>">
							<img src="<?php echo $v['pic_list']?>" alt="" />
						</a>
						<div class="info1">
						<p><?php echo $v['gname']?></p>
						<p class="money">
							<em>
								<b>¥</b><?php echo $v['sprice']?>
							</em>
						</p>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<div class="path">
			<div class="path_left">
				<a href="">首页</a>
				<i>></i>
				<div class="son1">
					<a href="">手机/数码/配件</a>
					<i>></i>
					<?php 
					$cateModel = new \Common\Model\Cate;
					$cate = $cateModel->get();
					// 没写完....

					 ?>
					<a href="">手机通讯</a>
					<i>></i>

				</div>
				<span style="float:left">手机</span>
				<i>></i>
			</div>
			<div class="path_center">
				<a href="">
					<span>网络制式</span>
					<em>移动4G</em>
					<b></b>
				</a>
				
			</div>
			<div class="path_right">
				<a href="">清空筛选条件</a>
			</div>
			<span class="rt">
				共<strong>3774</strong>个结果
			</span>
		</div>
		<div class="search_result">
			<div class="left">
				<div id="navBar">
					<div class="title">
						<h2>手机/数码/配件</h2>
					</div>
					<div class="con">
						<div class="item">
							<div class="i-inner">
								<h3>
									<b></b>
									<a href="">手机通讯</a>
								</h3>
							</div>
						</div>
						
					</div>
				</div>
				<div id="aps_adboard">
					<h2 class="h2_title">
						<span class="sp1">
							<a href="">云台热卖</a>
						</span>
						<a class='_more' href="">更多</a>
					</h2>
					<ul class="clearfix">
					<!-- 热门推荐数据 -->
					 	<?php foreach ($hot as $v){?>
						<li>
							<a class="b1" href="<?php echo U('Content/Index',array('gid'=>$v['gid']))?>">
								<i></i>
								<img src="<?php echo $v['pic_list']?>" alt="" />
							</a>
							<div class="introduce">
								<p class="limit"><?php echo $v['gname']?>
									<i class="sell">直降100元！购机送配件礼包（数量有限，送完为止）！优质晒单送豪礼（券周五推送至账户，爱奇艺卡请联系客服领取）</i>
								</p>
								<p class="money">
									<em><b>¥</b><span><?php echo $v['sprice']?></span></em>
									<i>免运费</i>
								</p>
							</div>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<div class="right">
				<div class="fa">
					<!--品牌设置开始-->
					<dl class='son son1'>
						<dt>品牌</dt>
						<dd>
						<!-- 品牌表数据 -->
							<div class="dv1">
								<?php foreach ($brand as $v){?>
								<a href="<?php echo U('bidshow',array('bid'=>$v['bid']))?>"><img src="<?php echo $v['logo']?>" alt="" /></a>
								<?php }?>
							</div>
							<div class="more-se">
								<a class="se" href="">
									<span>多选</span>
									<b></b>
								</a>
								<a class="more" href="">
									<span>更多</span>
									<b></b>
								</a>
							</div>
						</dd>
					</dl>
					<!-- 筛选  =================调取类型数据 -->
					<?php foreach ($attr as $k=>$v){?>
					<dl class='son son3'>
						<dt><?php echo $v['name']?></dt>
						<dd>
							<div class="price">
								<?php 
									$temp = $param;
									$temp[$k] = 0;
								 ?>
								<a <?php if($param[$k] == 0): ?>class="now"<?php endif ?> href="<?php echo U('GoodsList/bidshow',array('bid'=>$_GET['bid'],'param'=>implode('_',$temp)))?>">不限</a>
								<?php foreach ($v['value'] as $va){?>
								<?php 
									$temp[$k] = $va['gaid'];
								 ?>
								<a <?php if($param[$k] == $va['gaid']): ?>class="now"<?php endif ?> href="<?php echo U('GoodsList/bidshow',array('bid'=>$_GET['bid'],'param'=>implode('_',$temp)))?>"><?php echo $va['gavalue']?></a>
								<?php }?>
							</div>
						</dd>
					</dl>
					<?php }?>
					
				</div>
				<div id="second-filter">
					<div class="left">
						<a href="" class="def">默认</a>
						<a href="">销量</a>
						<a href="">评价</a>
						<a href="">价格</a>
					</div>
					<div class="center">
						<span>收货地</span>
						<!--此处需要用下拉单重新写-->
						<a href="">北京</a>
					</div>
					<div class="rights">
						<!--选择区域喜欢不一样设置开始-->
						<div class="condi">
							<a class="a1" href="">
								<b></b>
								<span>喜欢不一young</span>	
							</a>
							<a href="">
								<b></b>
								<span>有货服务</span>
							</a>
							<a href="">
								<b></b>
								<span>苏宁服务</span>
							</a>
							<span class="gengduo">更多</span>
						</div>
						<!--小分页设置开始-->
						<div class="little_page">
							<span><i>1</i>/54</span>
							<a class="pa1" href=""><</a>
							<a class='pa2' href="">></a>
						</div>
					</div>
				</div>
				<div id="content">
					<ul class="content_ul">
					<!-- 调取数据库里的图片 -->
						<?php if($finalGids){?>
                
						<?php foreach ($goods as $v){?>
						<li class="ul_li1">
							<div class="img1">
								<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><img src="<?php echo $v['pic_list'][0]?>" alt="" /></a>
							</div>
							<div class="img_change">
								<?php foreach ($v['pic_list'] as $vv){?>
								<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><img src="<?php echo $vv?>" alt="" /></a>
								<?php }?>
								
							</div>
							<div class="res-info">
								<p class='money'>
									<em><b>¥</b><?php echo $v['sprice']?></em>
									<i>抢</i>
								</p>
								<p class="sell-phone">
									<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><?php echo $v['gname']?></a>
								</p>
								<p class="clickM">
									<i>评论</i>
									<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><?php echo $v['click']?></a>
									<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>" class="ashouchang">收藏</a>
								</p>
								<p class="sellerM">
									苏宁自营 等
									<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>">3个商家</a>
								</p>
							</div>
						</li>
						<?php }?>
						<?php }else{?>
						<p style="font-size:14px;color:#666;padding-left:100px;padding-top:60px;">对不起，没有符合条件的商品！</p>
						
               <?php }?>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
	<!--内容设置结束-->
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
	<!-- 点击切换图片 效果 放大镜-->
	<script type="text/javascript" src="./Public/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$('.img_change a').hover(
			function() {
				$(this).css({borderColor:'#f90'}).siblings('a').css({borderColor:'#eee'});
				var src = $(this).find('img').attr('src');
				
				$(this).parents('.ul_li1').find('.img1').find('a').find('img').attr('src',src);
		    }, function() {
		    	
		    }
		);


	});
	</script>
</body>
</html>
