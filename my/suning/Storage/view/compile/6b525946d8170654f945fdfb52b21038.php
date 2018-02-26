<div id="head">
		<div class="top">
			<div class="top_left">
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
						<?php 
								$num = Cart::getTotalNums();
								$num = $num ? $num : 0;
						  ?>
							<b><?php echo $num?></b>
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
				<form action="<?php echo U('GoodsList/index')?>" method="post">
					<div class="search_box">
						<input type="text" name="search" id='search_keyword' placeholder="tcl,美的联合大促 49元定金翻n倍购"/>
					</div>
					<input type="submit" value="搜索" id="search_submit" />
				</form>
				<div class="search_bottom">
					<a class="a_yellow" href='javascript:;'>万人抢空调</a>
					<a href="">525元拍汽车</a>
					<a class="a_yellow" href="javascript:;">下单立享5折</a>
					<a href="javascript:;">笔记本85折起</a>
				 	<a href="javascript:;">儿童节省薪礼</a>					
				 	<a href="javascript:;">抢冰箱预定</a>
				 	<a href="javascript:;">40寸智能999</a>
				 	<a href="javascript:;">小电劲爆五折</a>
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
			<a href="javascript:;"class="a1">
				<span>全部商品分类</span>
				<span class="sp1"></span>
			</a>
		</div>
		<?php 
			// 一,分类表数据
        	// 导航条数据
			// 实例化分类表
			$cateModel = new \Common\Model\Cate;
    		$cate = $cateModel->gidZero();
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