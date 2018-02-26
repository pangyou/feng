<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>{{$name}}-苏宁易购</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="./Public/Home/css/index1.css" />
<link rel="stylesheet" href="./Public/Home/css/list.css" />
</head>
<body>
	{{include file='../Common/head2'}}
	<!--内容设置开始-->
	<div id="search-main">
		<div class="F1">
			<div class="left"></div>
			<div class="right">
				<ul>
					<!-- 今日推荐数据 -->
				 	{{foreach from='$vivo' value='$v'}}
					<li>
						<a class="a1" href="{{U('Content/index',array('gid'=>$v['gid']))}}">
							<img src="{{$v['pic_list']}}" alt="" />
						</a>
						<div class="info1">
						<p>{{$v['gname']}}</p>
						<p class="money">
							<em>
								<b>¥</b>{{$v['sprice']}}
							</em>
						</p>
						</div>
					</li>
					{{endforeach}}
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
					// 调取分类表数据
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
					 	{{foreach from='$hot' value='$v'}}
						<li>
							<a class="b1" href="{{U('Content/Index',array('gid'=>$v['gid']))}}">
								<i></i>
								<img src="{{$v['pic_list']}}" alt="" />
							</a>
							<div class="introduce">
								<p class="limit">{{$v['gname']}}
									<i class="sell">直降100元！购机送配件礼包（数量有限，送完为止）！优质晒单送豪礼（券周五推送至账户，爱奇艺卡请联系客服领取）</i>
								</p>
								<p class="money">
									<em><b>¥</b><span>{{$v['sprice']}}</span></em>
									<i>免运费</i>
								</p>
							</div>
						</li>
						{{endforeach}}
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
								{{foreach from='$brand' value='$v'}}
								<a href="{{U('bidshow',array('bid'=>$v['bid']))}}"><img src="{{$v['logo']}}" alt="" /></a>
								{{endforeach}}
							</div>
							<div class="more-se">
								<a class="se" href="javascript:;">
									<span>多选</span>
									<b></b>
								</a>
								<a class="more" href="javascript:;">
									<span>更多</span>
									<b></b>
								</a>
							</div>
						</dd>
					</dl>
					<!-- 筛选  =================调取类型数据 -->
					{{foreach from="$attr" key='$k' value="$v"}}
					<dl class='son son3'>
						<dt>{{$v['name']}}</dt>
						<dd>
							<div class="price">
								<?php 
									$temp = $param;
									$temp[$k] = 0;
								 ?>
								<a <?php if($param[$k] == 0): ?>class="now"<?php endif ?> href="{{U('GoodsList/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}}">不限</a>
								{{foreach from="$v['value']" value='$va'}}
								<?php 
									$temp[$k] = $va['gaid'];
								 ?>
								<a <?php if($param[$k] == $va['gaid']): ?>class="now"<?php endif ?> href="{{U('GoodsList/index',array('cid'=>$_GET['cid'],'param'=>implode('_',$temp)))}}">{{$va['gavalue']}}</a>
								{{endforeach}}
							</div>
						</dd>
					</dl>
					{{endforeach}}
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
						{{if value="$finalGids"}}
						
						{{foreach from="$goods" value="$v"}}
						<li class="ul_li1">
							<div class="img1">
								<a href="{{U('Content/index',array('gid'=>$v['gid']))}}" target="_blank" ><img src="{{$v['pic_list'][0]}}" alt="" /></a>
							</div>
							<div class="img_change">
								{{foreach from="$v['pic_list']" value="$vv"}}
								<a href="{{U('Content/index',array('gid'=>$v['gid']))}}" target="_blank" ><img src="{{$vv}}" alt="" /></a>
								{{endforeach}}
								
							</div>
							<div class="res-info">
								<p class='money'>
									<em><b>¥</b>{{$v['sprice']}}</em>
									<i>抢</i>
								</p>
								<p class="sell-phone">
									<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a>
								</p>
								<p class="clickM">
									<i>评论</i>
									<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['click']}}</a>
									<a href="{{U('Content/index',array('gid'=>$v['gid']))}}" class="ashouchang">收藏</a>
								</p>
								<p class="sellerM">
									苏宁自营 等
									<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">3个商家</a>
								</p>
							</div>
						</li>
						{{endforeach}}
						{{else}}
						<p style="font-size:14px;color:#666;padding-left:100px;padding-top:60px;">对不起，没有符合条件的商品！</p>
						{{endif}}
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
	{{include file="../Common/foot"}}
	<!--底部设置结束-->
	
	<script type="text/javascript" src="./Public/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
	$(function(){
		//点击切换图片 效果 放大镜
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
