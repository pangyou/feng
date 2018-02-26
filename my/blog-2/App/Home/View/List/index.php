<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>列表页</title>
		<!--描述和摘要-->
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
		<!-- 载入公共头部 -->
		{{include file='../Common/head'}}
		<section>
			<div class="container">
				<div class="row">
					<!--标签规定文档的主要内容main-->
					<main class="col-md-8">
						<article>
							<div class="_head category_title">
								<h2>
										{{$name}}：
										<!--分类：-->
									{{$value}}
								</h2>
								<span>
									共 {{$count}} 篇文章 
								</span>
							</div>
						</article>
						{{foreach from='$data' value='$v'}}
						<article>
							<div class="_head">
								<h1>{{$v['title']}}</h1>
								<span>
								作者：
								{{$v['author']}}
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="">{{date('Y-m-d H:i:s',$v['sendtime'])}}</time>
								•
								分类：
								<a href="l_{{$v['cid']}}.html">{{$v['cname']}}</a>
							</div>
							<div class="_digest">
							{{if value="$v['thumb']!=NULL"}}
								<center><img src="{{$v['thumb']}}"  class="img-responsive"/></center>>
							{{endif}}
								<p>
									{{$v['digest']}}
								</p>
							</div>
							<div class="_more">
								<a href="c_{{$v['aid']}}.html" class="btn btn-default">阅读全文</a>
							</div>
							<div class="_footer">
								<i class="glyphicon glyphicon-tags"></i>
								{{foreach from="$v['tag']" value='$value'}}
								<a href="t_{{$value['tid']}}.html">{{$value['tname']}}</a>、
								{{endforeach}}
							</div>
						</article>
						{{endforeach}}
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