<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SEO技术—安然博客</title>
<meta name="keywords" content="个人博客,安然个人博客," />
<meta name="description" content="" />
<!-- 载入公共头部 -->
<link href="./Public/Home/css/index.css" rel="stylesheet">
<link href="./Public/Home/css/style.css" rel="stylesheet">
<link href="./Public/Home/css/new.css" rel="stylesheet">
<script type="text/javascript" src=""></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav">
      <a href="index.html"><span>首页</span><span class="en">Home</span></a>
                  <a href="l_1.html" target="_blank"><span>关于我</span><span class="en">About</span></a>
            <a href="l_2.html" target="_blank"><span>个人日记</span><span class="en">Diary</span></a>
            <a href="l_3.html" target="_blank"><span>SEO技术</span><span class="en">Seo</span></a>
            <a href="l_4.html" target="_blank"><span>WEB前端</span><span class="en">Web</span></a>
            <a href="l_5.html" target="_blank"><span>留言板</span><span class="en">Gustbook</span></a>
          
  </nav>
</header>
<article class="blogs">
    <h1 class="t_nav">
      <span>可以简单理解为提升网站自然排名、改进用户体验、提高转化率的网站优化行为</span>
      <a href="index.html" class="n1">网站首页</a>
      <a href="l_<?php echo $cdata['cid']?>.html" class="n2"><?php echo $cdata['cname']?></a>
    </h1>
<div class="bloglist left">
   <!--wz-->
   <?php foreach ($arcData as $v){?>
    <div class="wz">
    <h3><?php echo $v['title']?></h3>
    <p class="dateview">
      <span><?php echo date('Y-m-d',$v['sendtime'])?></span>
      <span>作者：<?php echo $v['author']?></span>
      <span>分类：[<a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a>]</span></p>
      <?php if($v['thumb']){?>
                
     <figure><img src="<?php echo $v['thumb']?>" style="max-width:740px;"></figure>
    
               <?php }?>
    <ul>
      <p>
        <?php echo $v['digest']?>
      </p>
      <a title="阅读全文" href="c_<?php echo $v['aid']?>.html" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <div class="clear"></div>
    </div>
    <?php }?>
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
      <?php foreach ($arcData as $v){?>
      <li><a href="c_<?php echo $v['aid']?>.html" title="<?php echo $v['title']?>" target="_blank"><?php echo $v['title']?></a></li>
      <?php }?>
    </ul>
     <h3>
      <p>用户<span>关注</span></p>
    </h3>
    <ul class="rank">
    <?php 
    // 按时间发表顺序,取5篇文章
        $arcData=$arcModel->limit(5)->orderBy('sendtime','DESC')->get(); 
    ?>
    <?php foreach ($arcData as $v){?>
      <li><a href="c_<?php echo $v['aid']?>.html" title="<?php echo $v['title']?>" target="_blank"><?php echo $v['title']?></a></li>
    <?php }?>
    </ul>   
    </div> 
</aside>
</article>
  <!-- 底部公共部分 -->
  <footer>
    <p><span>Design By:<a href="http://www.jsdaima.com" target="_blank">安然</a></span><span>网站地图</span><span><a href="javascript:;">网站统计</a></span></p>
  </footer>
  <script src="js/nav.js"></script>
  <!--百度分享-->
  <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
  </body>
</html>