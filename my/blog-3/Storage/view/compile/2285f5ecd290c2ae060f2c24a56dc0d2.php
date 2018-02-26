<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>安然博客</title>
<meta name="keywords" content="个人博客,安然个人博客" />
<meta name="description" content="安然个人博客，是记录博主学习和成长的一个自媒体博客。主要分享互联网上最前沿的web前端技术和SEO技术，同时博客也免费提供网站模板下载和个人博客模板下载。" />
<!-- 引入公共头部 -->
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
    <span>您当前的位置:</span>
    <a href="index.html" class="n1">网站首页</a>
    <a href="l_<?php echo $cdata['cid']?>.html" class="n2"><?php echo $cdata['cname']?></a>
  </h1>
  <div class="index_about">
        <h2 class="c_titile"><?php echo $data['title']?></h2>
        <p class="box_c">
          <span class="d_time">发布时间：<?php echo date('Y-m-d',$data['sendtime'])?></span>
          <span>编辑：<?php echo $data['author']?></span>
          <span>互动QQ：<a href="javascript:;">1430650394</a></span>
        </p>
        <ul class="infos">
          <p><?php echo $data['content']?></p>
        </ul>
        <div class="keybq">
        <p><span>关键字词</span>：<?php echo $data['keywords']?></p>
        
  </div>
    <div class="ad"> </div>
    <?php // 实例化文章模型
        $arcModel = new \Common\Model\Arc; 
        $aid = Q('get.aid',0,'intval');
        // 按顺序截取上一条文章
        $arcData = $arcModel->limit(1)->orderBy('aid','DESC')->where("aid<{$aid}")->get();
      ?>
    <div class="nextinfo">
      <?php if($arcData!=NULL){?>
                
      <p>上一篇：
          <a href="c_<?php echo $arcData[0]['aid']?>.html"><?php echo $arcData[0]['title']?></a>
      </p>
      
               <?php }?>
      <?php 
      // 按顺序截取下一条文章
        $arcData = $arcModel->limit(1)->orderBy('aid','ASC')->where("aid>{$aid}")->get();
       ?>
       <?php if($arcData!=NULL){?>
                
      <p>下一篇：<a href="c_<?php echo $arcData[0]['aid']?>.html"><?php echo $arcData[0]['title']?></a></p>
      
               <?php }?>
    </div>
    <div class="comment" style="padding:20px;">
      <!-- 多说评论框 start -->
            <div class="ds-thread" data-thread-key="<?php echo $data['aid']?>" data-title="<?php echo $data['title']?>" data-url="<?php echo U('Content/index',array('aid'=>$data['aid']))?>"></div>
            <!-- 多说评论框 end -->
            <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
            <script type="text/javascript">
            var duoshuoQuery = {short_name:"blogmzy"};
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
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
      <?php 
      
        // 获取点击次数最多的五篇文章
        $arcData = $arcModel->limit(5)->orderBy('sendtime','ASC')->get();
       ?>
        <?php foreach ($arcData as $v){?>
        <li><a href="c_<?php echo $v['aid']?>.html" title="<?php echo $v['title']?>"><?php echo $v['title']?></a></li>
        <?php }?>
      </ul>
    </div>
  </div>
  <aside class="right">
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
    <!-- Baidu Button END -->
    <div class="blank"></div>
    <div class="news">
      <h3>
        <p>栏目<span>最新</span></p>
      </h3>
      <ul class="rank">
      <?php 
      // 按aid降序取五篇文章
          $arcData = $arcModel->limit(5)->orderBy('aid','DESC')->get();
       ?>
        <?php foreach ($arcData as $v){?>
        <li><a href="c_<?php echo $v['aid']?>.html"><?php echo $v['title']?></a></li>
        <?php }?>
      </ul>
      <h3 class="ph">
        <p>点击<span>排行</span></p>
      </h3>
      <ul class="paih">
      <?php $arcData = $arcModel->limit(5)->orderBy('click','DESC')->get(); ?>
      <?php foreach ($arcData as $v){?>
        <li><a href="c_<?php echo $v['aid']?>.html"><?php echo $v['title']?></a></li>
      <?php }?>
      </ul>
    </div>
  </aside>
</article>
<footer>
  <p><span>Design By:<a href="" target="_blank">安然</a></span><span>网站地图</span><span><a href="/">网站统计</a></span></p>
</footer>
<script src="js/nav.js"></script>
</body>
</html>