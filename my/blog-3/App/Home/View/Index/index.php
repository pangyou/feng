<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人博客</title>
<meta name="keywords" content="个人博客模板,博客模板" />
<meta name="description" content="优雅、稳重、大气,低调。" />
<!-- 载入公共头部 -->
{{include file='../Common/head'}}
<!--end header-->
<div class="banner">
  <section class="box">
    <ul class="texts">
      <p class="p1">纪念我们:</p>
      <p class="p2">终将逝去的青春</p>
      <p class="p3">By:安然</p>
    </ul>
  </section>
</div>
<!--end banner-->
<article>
  <h2 class="title_tj">
    <p>博主<span>推荐</span></p>
  </h2>
  <div class="bloglist left">
   <!--文章部分-->
   {{foreach from='$arcData' value="$v"}}
    <div class="wz">
    <h3>{{$v['title']}}</h3>
    <p class="dateview"><span>{{date('Y-m-d',$v['sendtime'])}}</span><span>作者：{{$v['author']}}</span><span>分类：[<a href="l_{{$v['cid']}}.html" target="_blank">{{$v['cname']}}</a>]</span></p>
    {{if value="$v['thumb']"}}
    <figure><img src="{{$v['thumb']}}"></figure>
    {{endif}}
    <ul>
      <p>{{$v['digest']}}</p>
      <a title="阅读全文" href="c_{{$v['aid']}}.html" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <div class="clear"></div>
    </div>
    {{endforeach}}
   <!--end-->    
  </div>
  <!--右边公共部分-->
  {{include file='../Common/right'}} 
  <!--<embed src="./Public/1.mp3" style="display:none" hidden="true" autostart="true" loop="true">-->
	<!--自动播放,循环播放,隐藏显示条-->
<audio src="./Public/1.mp3" id="aud" loop  autoplay></audio>
    <!-- 引入公共底部 -->
  {{include file='../Common/foot'}}
