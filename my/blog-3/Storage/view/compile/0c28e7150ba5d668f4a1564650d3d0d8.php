<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人博客</title>
<meta name="keywords" content="个人博客模板,博客模板" />
<meta name="description" content="优雅、稳重、大气,低调。" />
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
   <?php foreach ($arcData as $v){?>
    <div class="wz">
    <h3><?php echo $v['title']?></h3>
    <p class="dateview"><span><?php echo date('Y-m-d',$v['sendtime'])?></span><span>作者：<?php echo $v['author']?></span><span>分类：[<a href="l_<?php echo $v['cid']?>.html" target="_blank"><?php echo $v['cname']?></a>]</span></p>
    <?php if($v['thumb']){?>
                
    <figure><img src="<?php echo $v['thumb']?>"></figure>
    
               <?php }?>
    <ul>
      <p><?php echo $v['digest']?></p>
      <a title="阅读全文" href="c_<?php echo $v['aid']?>.html" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <div class="clear"></div>
    </div>
    <?php }?>
   <!--end-->    
  </div>
  <!--右边公共部分-->
  <aside class="right"> 
      <div class="my">
        <h2>关于<span>博主</span></h2>
        <div id="my_img"></div>
        <ul>
            <li>博主：安然</li>
            <li>职业:web前端、网站运营、PHP</li>
            <li>简介：一个不断学习和研究，web前端和SEO,PHP技术的90后草根站长.</li>
        </ul>
      </div>
      <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
      <div class="news">
        <h3 class="ph">
          <p>点击<span>排行</span></p>
        </h3>
        <ul class="paih">
                              <li><a href="c_3.html" target="_blank" title="一个不断学习和研究，web前端和SEO技术的90后草根站长。" target="_blank">一个不断学习和研究，web前端和SEO技术的90后草根站长。</a></li>
                    <li><a href="c_5.html" target="_blank" title="毛泽东: 最经典的一句话 , 80%的人都不知道" target="_blank">毛泽东: 最经典的一句话 , 80%的人都不知道</a></li>
                    <li><a href="c_4.html" target="_blank" title="互联网术语知多少？ 不懂这些别说自己是做互联网的!" target="_blank">互联网术语知多少？ 不懂这些别说自己是做互联网的!</a></li>
                    <li><a href="c_1.html" target="_blank" title="因为你还有梦想！所以不要向这个世界认输！" target="_blank">因为你还有梦想！所以不要向这个世界认输！</a></li>
                    <li><a href="c_2.html" target="_blank" title="终于把O2O、C2C、B2B、B2C的区别讲清楚了" target="_blank">终于把O2O、C2C、B2B、B2C的区别讲清楚了</a></li>
                  </ul>
        <h3>
          <p>用户<span>关注</span></p>
        </h3>
        <ul class="rank">
                          <li><a href="c_1.html" title="因为你还有梦想！所以不要向这个世界认输！" target="_blank">因为你还有梦想！所以不要向这个世界认输！</a></li>
                  <li><a href="c_2.html" title="终于把O2O、C2C、B2B、B2C的区别讲清楚了" target="_blank">终于把O2O、C2C、B2B、B2C的区别讲清楚了</a></li>
                  <li><a href="c_3.html" title="一个不断学习和研究，web前端和SEO技术的90后草根站长。" target="_blank">一个不断学习和研究，web前端和SEO技术的90后草根站长。</a></li>
                  <li><a href="c_4.html" title="互联网术语知多少？ 不懂这些别说自己是做互联网的!" target="_blank">互联网术语知多少？ 不懂这些别说自己是做互联网的!</a></li>
                  <li><a href="c_5.html" title="毛泽东: 最经典的一句话 , 80%的人都不知道" target="_blank">毛泽东: 最经典的一句话 , 80%的人都不知道</a></li>
                </ul>
        <h3 class="links">
          <p>友情<span>链接</span></p>
        </h3>
        <ul class="website">
                             <li><a href="http://www.baidu.com" target="_blank">百度</a></li>
                  <li><a href="http://www.sina.com.cn" target="_blank">新浪</a></li>
                  <li><a href="http://www.jd.com" target="_blank">京东</a></li>
                </ul> 
      </div>
  </aside>
</article>
 
  <!--<embed src="./Public/1.mp3" style="display:none" hidden="true" autostart="true" loop="true">-->
	<!--自动播放,循环播放,隐藏显示条-->
<audio src="./Public/1.mp3" id="aud" loop  autoplay></audio>
    <!-- 引入公共底部 -->
    <!-- 底部公共部分 -->
  <footer>
    <p><span>Design By:<a href="http://www.jsdaima.com" target="_blank">安然</a></span><span>网站地图</span><span><a href="javascript:;">网站统计</a></span></p>
  </footer>
  <script src="js/nav.js"></script>
  <!--百度分享-->
  <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
  </body>
</html>
