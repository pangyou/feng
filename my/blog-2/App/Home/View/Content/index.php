<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>内容页</title>
		<!--描述和摘要-->
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
		{{include file='../Common/head'}}
		<section>
			<div class="container">
				<div class="row">
					<!--标签规定文档的主要内容main-->
					<main class="col-md-8">
						<article>
							<div class="_head">
								<h1>{{$data['title']}}</h1>
								<span>
								作者：
								<a href="">{{$data['author']}}</a>
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="{{date('Y-m-d H:i:s',$data['sendtime'])}}">{{date('Y-m-d H:i:s',$data['sendtime'])}}</time>
								•
								分类：
								<a href="{{U('List/index',array('cid'=>$data['cid']))}}">{{$data['cname']}}</a>
							</div>
							<div class="_digest">
							{{if value="$data['thumb']!=NULL"}}
								<center><img src="{{$data['thumb']}}"  class="img-responsive"/></center>>
							{{endif}}
							<p>{{$data['content']}}</p>
							</div>
							<div class="_footer">
								<i class="glyphicon glyphicon-tags"></i>
								{{foreach from="$data['tag']" value='$v'}}
								<a href="{{U('List/index',array('tid'=>$v['tid']))}}">{{$v['tname']}}</a>、
								{{endforeach}}
							</div>
						</article>
						<!-- 多说评论框 start -->
						<div class="ds-thread" data-thread-key="{{$data['aid']}}" data-title="{{$data['title']}}" data-url="{{U('Content/index',array('aid'=>$data['aid']))}}"></div>
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
					{{include file='../Common/right'}}
				</div>
			</div>
		</section>
		<!-- 引入底部公共部分 -->
		{{include file='../Common/foot'}}
	</body>
</html>