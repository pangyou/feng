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
      <?php $cateData = Db::table('category')->get(); ?>
      <?php foreach ($cateData as $v){?>
      <a href="l_<?php echo $v['cid']?>.html" target="_blank"><span><?php echo $v['cname']?></span><span class="en"><?php echo $v['ctitle']?></span></a>
      <?php }?>    
  </nav>
</header>