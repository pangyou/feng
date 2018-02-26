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
	{{include file="../Common/head"}}
	<!--菜单设置结束-->
	<!--二级菜单开始-->
	<div id="menu">
		<div class="menu">
			<div class="menu_left">
				<ul>
					{{foreach from='$cate' value='$v'}}
					<li>
						{{foreach from="$v['_data']" value="$vv"}}
						<a href="{{U('GoodsList/index',array('cid'=>$vv['cid']))}}" class="a1">{{$vv['cname']}}</a>
						{{endforeach}}
						<div class="box">
							<div class="box_list">
								{{foreach from="$v['_data']" value="$va"}}
								{{foreach from="$va['_data']" value="$vb"}}
								<dl>
									
									<dt><a href="{{U('GoodsList/index',array('cid'=>$vb['cid']))}}">{{$vb['cname']}}</a></dt>
									<dd>
										<?php foreach ($vb['_data'] as $key => $value) { ?>
										<a {{if value="in_array($key,array(15,19,18,36,40,50,43,48,68,84,85,130,131,135,141))"}}class="yellow"{{endif}}href="{{U('GoodsList/index',array('cid'=>$value['cid']))}}" target="_blank">{{$value['cname']}}</a>
										<?php }  ?>
									</dd>
								</dl>
								{{endforeach}}
								{{endforeach}}
							</div>
						</div>
					</li>
					{{endforeach}}
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
				{{foreach from='$brand' key='$k' value='$v'}}
				<li {{if value="in_array($k,array(0,1,6,7,12,13))"}} class="li1" {{endif}}>
					<a href="{{U('GoodsList/index',array('bid'=>$v['bid']))}}"><img src="{{$v['logo']}}" alt="" /></a>
					<i></i>
				</li>
				{{endforeach}}
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
			 {{foreach from='$like' value='$v'}}
			<li>
				<a href="{{U('Content/index',array('gid'=>$v['gid']))}}"><img src="{{$v['pic_list']}}" alt="" /></a>
				<p>{{$v['gname']}}</p>
				<span>
					<i>¥</i>
					<em>{{$v['sprice']}}</em>
				</span>
			</li>
			{{endforeach}}
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
					{{foreach from='$catefta' value='$v'}}
					<a href="{{U('GoodsList/index',array('cid'=>$v['cid']))}}">{{$v['cname']}}</a>
					{{endforeach}}
				</div>
				<div class="hot_word_right">
					{{foreach from='$cateftb' value='$v'}}
					<a href="{{U('GoodsList/index',array('cid'=>$v['cid']))}}">{{$v['cname']}}</a>
					{{endforeach}}
				</div>
			</div>
			<div class="last_img">
				<a href="javascript:;"><img src="./Public/Home/images/1fa2.jpg" alt="" /></a>
			</div>
		</div>
		<div class="side_right">
			<ul class="side_right_list">
				<!-- 1F数据 -->
				{{foreach from='$clothes' value='$v'}}
				<li>
					<p class="side_img"> 
						<a href="{{U('Content/index',array('gid'=>$v['gid']))}}"><img src="{{$v['pic_list']}}" alt="" /></a>
					</p>
					<p class="side_name">
						<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a>
					</p>
				</li>
				{{endforeach}}
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
					{{foreach from='$cate1' value='$v'}}
					<a href="{{U('GoodsList/index',array('cid'=>$v['cid']))}}">{{$v['cname']}}</a>
					{{endforeach}}
				</div>
				<div class="hot_word_right">
					{{foreach from='$cate2' value='$v'}}
					<a href="{{U('GoodsList/index',array('cid'=>$v['cid']))}}">{{$v['cname']}}</a>
					{{endforeach}}
					
				</div>
			</div>
		</div>
		<div class="side_right">
			<ul class="side_right_list">
			 <!-- 2楼手机数据 -->
			 	{{foreach from='$phone' value='$v'}}
				<li>
					<p class="side_img"> 
						<a href="{{U('Content/index',array('gid'=>$v['gid']))}}"><img src="{{$v['pic_list']}}" alt="" /></a>
					</p>
					<p class="side_name">
						<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a>
					</p>
				</li>
				{{endforeach}}
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
				{{foreach from='$goodsc' key='$k' value='$v'}}
				<li class="li li{{$k+1}}">
					<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">
						<img src="{{$v['pic_list']}}" alt="" />
						<b></b>
					</a>
				</li>
				{{endforeach}}
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
	{{include file='../Common/foot'}}
	<!--底部设置结束-->
	<!--右侧公共部分设置开始-->
	<div id="sid_right">
		<div class="son1">
			<div class="top">
				<a href="{{U('Content/cartshow')}}">
					<i class='i1'></i>
					<span>购物车</span>
					{{if value="$_SESSION"}}
					<i>{{count($_SESSION['cart']['goods'])}}</i>
					{{else}}
					<i>0</i>
					{{endif}}
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











