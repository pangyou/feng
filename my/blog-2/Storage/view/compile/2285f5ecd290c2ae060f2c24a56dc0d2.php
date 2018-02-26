<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>内容页</title>
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
						<li  ><a href="index.html">首页</a></li>
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
						<article>
							<div class="_head">
								<h1><?php echo $data['title']?></h1>
								<span>
								作者：
								<a href=""><?php echo $data['author']?></a>
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="<?php echo date('Y-m-d H:i:s',$data['sendtime'])?>"><?php echo date('Y-m-d H:i:s',$data['sendtime'])?></time>
								•
								分类：
								<a href="<?php echo U('List/index',array('cid'=>$data['cid']))?>"><?php echo $data['cname']?></a>
							</div>
							<div class="_digest">
							<?php if($data['thumb']!=NULL){?>
                
								<center><img src="<?php echo $data['thumb']?>"  class="img-responsive"/></center>>
							
               <?php }?>
							<p><?php echo $data['content']?></p>
							</div>
							<div class="_footer">
								<i class="glyphicon glyphicon-tags"></i>
								<?php foreach ($data['tag'] as $v){?>
								<a href="<?php echo U('List/index',array('tid'=>$v['tid']))?>"><?php echo $v['tname']?></a>、
								<?php }?>
							</div>
						</article>
						<!-- 多说评论框 start -->
						<div class="ds-thread" data-thread-key="<?php echo $data['aid']?>" data-title="<?php echo $data['title']?>" data-url="<?php echo U('Content/index',array('aid'=>$data['aid']))?>"></div>
						<!-- 多说评论框 end -->
						<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
						<script type="text/javascript">
							var duoshuoQuery = {short_name:"hdpangyou"};
							(function() {
								var ds = document.createElement('script');
								ds.type = 'text/javascript';ds.async = true;
								ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
								ds.charset = 'UTF-8';
								(document.getElementsByTagName('head')[0] 
								 || document.getElementsByTagName('body')[0]).appendChild(ds);
							})();
						</script>
						<!-- 多说公共JS代码 end -->
					</main>
					<!-- 引入右边公共部分 -->
					<aside class="col-md-4 hidden-sm hidden-xs">
	
		<div class="_widget">
		<h4>分类列表</h4>
		<div>
							                
					<a href="l_1.html">关于我(1)</a>
											                
					<a href="l_2.html">个人日记(3)</a>
											                
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
		<!-- 引入底部公共部分 -->
		<footer class="hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h4 class="_title">最新文章</h4>
								<div id="" class="_single">
										<p><a href="c_6.html">爱情不容有错，即使错了那就重来</a></p>
					<time>2016-05-17</time>
										<p><a href="c_5.html">毛泽东: 最经典的一句话 , 80%的人都不知道</a></p>
					<time>2016-05-17</time>
										<p><a href="c_4.html">互联网术语知多少？ 不懂这些别说自己是做互联网的!</a></p>
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