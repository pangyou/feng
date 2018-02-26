<!-- 头部开始--> 
	<div id="head">
		<div class="top">
			<div class="top_left">
				<a class="a1" href="<?php echo U('Index/index')?>">
					<i class="glyphicon glyphicon-home"></i>
					返回易购首页
				</a><b>|</b>
				<div class="box">	
					<span>网站导航</span>
				</div>
				<a href="javascript:;">商家入驻</a>
			</div>
			<div class="top_right">
				<ul>
					<li>
					<?php if(isset($_SESSION['aid'])){?>
                
					<a href="<?php echo U('Person/index')?>"><?php echo $_SESSION['nickname']?>...</a>
					<?php }else{?>
					<a href="<?php echo U('Login/index')?>">登录</a>
					
               <?php }?>
					</li>
					<li><a href="<?php echo U('Reg/index')?>">注册</a></li>
					<li><a href="<?php echo U('Person/orders')?>">我的订单</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li><a href="<?php echo U('Person/index')?>">我的易购</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li class="gouwuche">
						<em class="glyphicon glyphicon-shopping-cart"></em>
						<a href="<?php echo U('Content/cartshow')?>">购物车</a>
						<span class="total_num" id='total_num'>
							<!-- 写成$_SESSION['cart'] 会报错 -->
							<?php if(isset($_SESSION['cart']['goods'])){?>
                
								<b><?php echo count($_SESSION['cart']['goods'])?></b>
							<?php }else{?>
								<b>0</b>
							
               <?php }?>
						</span>
					</li>				
					<li>
						<em></em>
						<a href="javascript:;">手机苏宁</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
					<li><a href="javascript:;">易付宝</a></li>
					<li><a href="javascript:;">政府采购</a></li>
					<li>
						<a href="javascript:;">客户服务</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
	<!--头部结束-->
	<!--搜索区域设置开始-->
	<div id="search">
		<div class="left">
			<img src="./Public/Home/images/logo.png" alt="" />
			<img src="./Public/Home/images/logo1.gif" alt="" />
		</div>
		<div class="center">
			<div class="search">
				<i class="glyphicon glyphicon-search"></i>
				<from>
					<div class="search_box">
						<input type="text" id='search_keyword' placeholder="tcl,美的联合大促 49元定金翻n倍购"/>
					</div>
					<input type="submit" value="搜索" id="search_submit" />
				</from>
				<div class="search_bottom">
					<a class="a_yellow" href='javascript:;'>ZUK Z2</a>
					<a href="javascript:;">乐视手机</a>
					<a class="a_yellow" href="javascript:;">三星C5</a>
					<a href="javascript:;">魅蓝3</a>
				 	<a href="javascript:;">小米4S</a>					
				 	<a href="javascript:;">华为手机</a>
				 	<a href="javascript:;">荣耀4X</a>
				 	<a href="javascript:;">OPPO</a>
				 	<a class="a_yellow" href="javascript:;">努比亚Z11 Max</a>
				</div>
			</div>
		</div>
		<div class="right">
			<img src="./Public/Home/images/logo3.jpg" alt="" />
		</div>
	</div>
	<!--搜索区域设置结束-->
	<!--菜单设置开始-->
	<div id="list">
		<div class="left">
			<a href="javascript:;" class="a1">
				<span>全部商品分类</span>
				<em class="glyphicon glyphicon-menu-down"></em>
			</a>
		</div>
		<?php 
			// 一,分类表数据
        	// 导航条数据
			// 实例化分类表
			$cateModel = new \Common\Model\Cate;
    		$cate = $cateModel->where('pid=0')->get();

		 ?>
		<div class="right">
			<ul>
				<?php foreach ($cate as $k=>$v){?>
				<li><a href="<?php echo U('GoodsList/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?><?php if($k==4){?>
                 <i></i>
               <?php }?> </a></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<!--菜单设置结束