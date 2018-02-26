<aside class="col-md-4 hidden-sm hidden-xs">
	<div class="_widget">
		<h4>关于自己</h4>
		<div class="_info">
			<p>多年一线开发经验与讲师经验。擅长引导思维，而不是一味灌输，新生代优秀青年讲师的代表...</p>
			<p>
				<i class="glyphicon glyphicon-volume-down"></i>
				目前就职于
				<a href="http://www.houdunwang.com" target="_blank">北京后盾网</a>
			</p>
		</div>
	</div>
	<?php 
    // 实例化分类模型
    $cateModel = new \Common\Model\Cate;
    // 获取分类表的数据
    $cateData = $cateModel->where('pid=0')->get();
    // 实例化文章模型
    $arcModel = new \Common\Model\Arc;
    // 重新组合分类表数据,把数量压入分类表中的count中
    // 写$v['cid'] 的时候注意 加上{}
    foreach ($cateData as $k => $v) {
        $cateData[$k]['count'] = $arcModel->where("category_cid={$v['cid']}")->count();
    }
	 ?>
	<div class="_widget">
		<h4>分类列表</h4>
		<div>
			<?php foreach ($cateData as $v){?>
				<?php if($v['count']){?>
                
					<a href="<?php echo U('List/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?>(<?php echo $v['count']?>)</a>
				<?php }else{?>
					<a href="<?php echo U('List/index',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?></a>
				
               <?php }?>
			<?php }?>
		
		</div>
	</div>
	<?php 
	// 实例化标签模型
	$tagModel = new \Common\Model\Tag;
	// 获取标签表的数据
	$tagData = $tagModel->get();
	 ?>
	<div class="_widget">
		<h4>标签云</h4>
		<div class="_tag">
			<?php foreach ($tagData as $v){?>
			<a href="<?php echo U('List/index',array('tid'=>$v['tid']))?>"><?php echo $v['tname']?></a>
			<?php }?> 
		</div>
	</div>
	<div class="_widget">
		<h4>热门文章</h4>
		<div>
			<?php 
			// 获取点击次数最多的五篇文章
			$arcData = $arcModel->limit(5)->orderBy('click','DESC')->get();
			 ?>
			<ul style="padding:0px;">
			<?php foreach ($arcData as $v){?>
				<li><a href="<?php echo U('List/index',array('aid'=>$v['aid']))?>"><?php echo $v['title']?></a></li>
			<?php }?>
			</ul>	
		</div>
	</div>	
</aside>