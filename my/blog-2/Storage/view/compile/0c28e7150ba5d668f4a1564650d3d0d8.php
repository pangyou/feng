<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>响应式-blog</title>
		<!--描述和摘要-->
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
		<!--载入公共模板-->
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="./Public/Home/org/bootstrap-3.3.5-dist/css/bootstrap.min.css" />
	<script src="./Public/Home/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./Public/Home/org/bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="./Public/Home/css/index.css" />
	<link rel="stylesheet" type="text/css" href="./Public/Home/css/backTop.css"/>
</head>
<body>
<header>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>安然BLOG</h1>
				<small>anran</small>
			</div>
		</div>
	</div>
</header>
<nav role="navigation" class="navbar navbar-default">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" >
			
				<div class="navbar-header">
					
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
					
						<span class="sr-only">切换导航</span>
						
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
								<div class="collapse navbar-collapse" id="example-navbar-collapse">
					<ul class="_menu" >
						<li                  class="_active"
                ><a href="index.html">首页</a></li>
												<li  ><a href="l_1.html">关于我</a></li>
												<li  ><a href="l_2.html">个人日记</a></li>
												<li  ><a href="l_3.html">SEO技术</a></li>
												<li  ><a href="l_4.html">WEB前端</a></li>
												<li  ><a href="l_5.html">留言板</a></li>
											</ul>
				</div>
			</div>
		</div>
	</div>
</nav>
		<section>
			<div class="container">
				<div class="row">
					<!--标签规定文档的主要内容main-->
					<main class="col-md-8">
						<article class="_carousel">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
							    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
							  </ol>
							
							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
							    <div class="item active">
							      <img src="./Public/Home/images/1.jpg">
							    </div>
							    <div class="item">
							       <img src="./Public/Home/images/2.jpg">
							    </div>
							  </div>
							
							  <!-- Controls -->
							  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							  </a>
							  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							  </a>
							</div>
						</article>
						<?php foreach ($arcData as $v){?>
						<article>
							<div class="_head">
								<h1><?php echo $v['title']?></h1>
								<span>
								作者：
								<?php echo $v['author']?>
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="<?php echo date('Y-m-d',$v['sendtime'])?>"><?php echo date('Y-m-d',$v['sendtime'])?></time>
								•
								分类：
								<a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a>
							</div>
							<div class="_digest">
							<?php if($v['thumb']){?>
                
							<img src="<?php echo $v['thumb']?>" style="max-height:110px;" class="img-responsive"/>
							
               <?php }?>
								<p>
									<?php echo $v['digest']?>
								</p>
							</div>
							<div class="_more">
								<a href="c_<?php echo $v['aid']?>.html" class="btn btn-default">阅读全文</a>
							</div>
							<div class="_footer">
								<i class="glyphicon glyphicon-tags"></i>
								<?php foreach ($v['tag'] as $value){?>
									<a href="t_<?php echo $value['tid']?>.html"><?php echo $value['tname']?></a>、
								<?php }?>
							</div>
						</article>
						<?php }?>
					</main>
					<aside class="col-md-4 hidden-sm hidden-xs">
	
		<div class="_widget">
		<h4>分类列表</h4>
		<div>
							                
					<a href="l_1.html">关于我(1)</a>
											                
					<a href="l_2.html">个人日记(5)</a>
											                
					<a href="l_3.html">SEO技术(1)</a>
																<a href="l_4.html">WEB前端</a>
				
               							                
					<a href="l_5.html">留言板(1)</a>
									
		</div>
	</div>
		<div class="_widget">
		<h4>标签云</h4>
		<div class="_tag">
						<a href="t_1.html">赞</a>
						<a href="t_2.html">工作</a>
						<a href="t_3.html">效率</a>
						<a href="t_4.html">记忆</a>
						<a href="t_5.html">公司</a>
			 
		</div>
	</div>
	<div class="_widget">
		<h4>热门文章</h4>
		<div>
						<ul style="padding:0px;">
							<li><a href="c_3.html">一个不断学习和研究，web前端和SEO技术的90后草根站长。</a></li>
							<li><a href="c_5.html">毛泽东: 最经典的一句话 , 80%的人都不知道</a></li>
							<li><a href="c_4.html">互联网术语知多少？ 不懂这些别说自己是做互联网的!</a></li>
							<li><a href="c_1.html">因为你还有梦想！所以不要向这个世界认输！</a></li>
							<li><a href="c_2.html">终于把O2O、C2C、B2B、B2C的区别讲清楚了</a></li>
						</ul>	
		</div>
	</div>	
</aside>
				</div>
			</div>
		</section>
		<footer class="hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h4 class="_title">最新文章</h4>
								<div id="" class="_single">
										<p><a href="c_9.html">关于面试中遇到的笔试题</a></p>
					<time>2016-07-21</time>
										<p><a href="c_8.html">高并发处理</a></p>
					<time>2016-07-21</time>
										<p><a href="c_6.html">爱情不容有错，即使错了那就重来</a></p>
					<time>2016-05-17</time>
									</div>	
			</div>
			<div class="col-sm-4 footer_tag">
				<div id="">
									<h4 class="_title">标签云</h4>
										<a href="t_1.html">赞</a>
										<a href="t_2.html">工作</a>
										<a href="t_3.html">效率</a>
										<a href="t_4.html">记忆</a>
										<a href="t_5.html">公司</a>
									</div>
			</div>
			<div class="col-sm-4">
				<h4 class="_title">友情链接</h4>
				<div id="" class="_single">
														<p><a href="http://www.baidu.com" target="_blank">百度</a></p>
										<p><a href="http://www.sina.com.cn" target="_blank">新浪</a></p>
										<p><a href="http://www.jd.com" target="_blank">京东</a></p>
									</div>
			</div>
		</div>
	</div>
</footer>
<div class="footer_bottom">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="javascript:;">后盾blog教学</a>
				 | 
				<a href="javascript:;">个人demo</a>
				 |
				<a href="javascript:;">1430650394@qq.com</a>
			</div>
		</div>
	</div>
</div>
<!--返回顶部自己写的插件-->
<script src="./Public/Home/js/backTop.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(function(){
		//插件使用
		$('.back_top').backTop({right:30});
	})
</script>
<div class="back_top hidden-xs hidden-md">
	<i class="glyphicon glyphicon-menu-up"></i>
</div>
	</body>
</html>