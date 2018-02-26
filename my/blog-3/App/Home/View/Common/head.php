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
      {{foreach from='$cateData' value='$v'}}
      <a href="l_{{$v['cid']}}.html" target="_blank"><span>{{$v['cname']}}</span><span class="en">{{$v['ctitle']}}</span></a>
      {{endforeach}}    
  </nav>
</header>