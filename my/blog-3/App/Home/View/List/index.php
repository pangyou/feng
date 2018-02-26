<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SEO技术—安然博客</title>
<meta name="keywords" content="个人博客,安然个人博客," />
<meta name="description" content="" />
<!-- 载入公共头部 -->
{{include file='../Common/head'}}
<article class="blogs">
    <h1 class="t_nav">
      <span>可以简单理解为提升网站自然排名、改进用户体验、提高转化率的网站优化行为</span>
      <a href="index.html" class="n1">网站首页</a>
      <a href="l_{{$cdata['cid']}}.html" class="n2">{{$cdata['cname']}}</a>
    </h1>
<div class="bloglist left">
   <!--wz-->
   {{foreach from='$arcData' value='$v'}}
    <div class="wz">
    <h3>{{$v['title']}}</h3>
    <p class="dateview">
      <span>{{date('Y-m-d',$v['sendtime'])}}</span>
      <span>作者：{{$v['author']}}</span>
      <span>分类：[<a href="l_{{$v['cid']}}.html">{{$v['cname']}}</a>]</span></p>
      {{if value="$v['thumb']"}}
     <figure><img src="{{$v['thumb']}}" style="max-width:740px;"></figure>
    {{endif}}
    <ul>
      <p>
        {{$v['digest']}}
      </p>
      <a title="阅读全文" href="c_{{$v['aid']}}.html" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <div class="clear"></div>
    </div>
    {{endforeach}}
   <!--end--> 
</div>
<!--right-->
<aside class="right">
 <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
   <div class="rnav">
      <ul>
       <li class="rnav1"><a href="#">SEO基础入门</a></li>
       <li class="rnav2"><a href="#">SEO进阶优化</a></li>
       <li class="rnav3"><a href="#">SEO实战案例</a></li>
       <li class="rnav4"><a href="#">SEO心得笔记</a></li>
     </ul>      
    </div>
    
<div class="news">
    <h3 class="ph">
      <p>精心<span>推荐</span></p>
    </h3>
    <ul class="paih">
          <?php 
              // 实例化文章模型
              $arcModel = new \Common\Model\Arc;
              // 获取点击次数最多的五篇文章
              $arcData = $arcModel->limit(5)->orderBy('click','DESC')->get();
           ?>
      {{foreach from='$arcData' value='$v'}}
      <li><a href="c_{{$v['aid']}}.html" title="{{$v['title']}}" target="_blank">{{$v['title']}}</a></li>
      {{endforeach}}
    </ul>
     <h3>
      <p>用户<span>关注</span></p>
    </h3>
    <ul class="rank">
    <?php 
    // 按时间发表顺序,取5篇文章
        $arcData=$arcModel->limit(5)->orderBy('sendtime','DESC')->get(); 
    ?>
    {{foreach from='$arcData' value='$v'}}
      <li><a href="c_{{$v['aid']}}.html" title="{{$v['title']}}" target="_blank">{{$v['title']}}</a></li>
    {{endforeach}}
    </ul>   
    </div> 
</aside>
</article>
{{include file='../Common/foot'}}