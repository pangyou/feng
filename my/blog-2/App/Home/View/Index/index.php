<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>响应式-blog</title>
		<!--描述和摘要-->
		<meta name="Description" content=""/>
		<meta name="Keywords" content=""/>
		{{include file="../Common/head"}}
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
						{{foreach from="$arcData" value="$v"}}
						<article>
							<div class="_head">
								<h1>{{$v['title']}}</h1>
								<span>
								作者：
								{{$v['author']}}
								</span>
								•
								<!--pubdate表⽰示发布⽇日期-->
								<time pubdate="pubdate" datetime="{{date('Y-m-d',$v['sendtime'])}}">{{date('Y-m-d',$v['sendtime'])}}</time>
								•
								分类：
								<a href="l_{{$v['cid']}}.html">{{$v['cname']}}</a>
							</div>
							<div class="_digest">
							{{if value="$v['thumb']"}}
							<img src="{{$v['thumb']}}" style="max-height:110px;" class="img-responsive"/>
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
								{{foreach from="$v['tag']" value="$value"}}
									<a href="t_{{$value['tid']}}.html">{{$value['tname']}}</a>、
								{{endforeach}}
							</div>
						</article>
						{{endforeach}}
					</main>
					{{include file="../Common/right"}}
				</div>
			</div>
		</section>
		{{include file='../Common/foot'}}
	</body>
</html>