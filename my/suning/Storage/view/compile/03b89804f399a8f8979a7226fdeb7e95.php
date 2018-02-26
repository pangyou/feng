<div class="cart-list">
	<div class="love love1">
		<div class="love_title">
			<h3>
				<i></i>
				<span>买了该商品的人还买了</span>
			</h3>
		</div>
		<ul class="love_ul">
		<?php 
			// 数据猜你喜欢
			$goodsModel = new \Common\Model\Goods;
   			$like = $goodsModel->getWhere(41,10); 
			 ?>
			<?php foreach ($like as $v){?>
			<li>
				<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>">
					<img src="<?php echo $v['pic_list']?>" alt="" />
				</a>
				<p class="text">
					<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><?php echo $v['gname']?></a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong><?php echo $v['sprice']?></strong>
				</p>
				<p class="evaluation">
					<span><?php echo $v['click']?></span>
					人已购买
					<em></em>
				</p>
			</li>
			<?php }?>
		</ul>
	</div>
	<div class="love love2">
		<div class="love_title">
			<h3>
				<i></i>
				<span>猜你喜欢</span>
			</h3>
		</div>
		<ul class="love_ul">
		<?php 
			// 数据猜你喜欢
			$goodsModel = new \Common\Model\Goods;
   			$look = $goodsModel->getWhere(24,5); 
			 ?>
			 	<?php foreach ($look as $v){?>
			<li>
				<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>">
					<img src="<?php echo $v['pic_list']?>" alt="" />
				</a>
				<p class="text">
					<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><?php echo $v['gname']?></a>
				</p>
				<p class="price">
					<i>¥</i>
					<strong><?php echo $v['sprice']?></strong>
				</p>
				<p class="evaluation">
					<span><?php echo $v['click']?></span>
					人已购买
					<em></em>
				</p>
			</li>
			<?php }?>
		</ul>
	</div>
</div>
