<aside class="col-md-4 hidden-sm hidden-xs" >
	<?php 
    // 实例化分类模型
    $cateModel = new \Common\Model\Cate;
    // 获取分类表的数据
    $cateData = $cateModel->get();
  	// 实例化文章模型
    $arcModel = new \Common\Model\Arc;
    // 重新组合分类表数据,把数量压入分类表中的count中
    // 写$v['cid'] 的时候注意 加上{}
    foreach ($cateData as $k => $v) {
        $cateData[$k]['count'] = $arcModel->where("category_cid={$v['cid']}")->count();
	} 


	// 显示顶级分类,顶级分类中的总数
	 // 实例化分类模型
 //    $cateModel = new \Common\Model\Cate;
 //    // 获取分类表的数据
 //    $cateData = $cateModel->get();
 //  	// 实例化文章模型
 //    $arcModel = new \Common\Model\Arc;
 //    // sp($cateData);
	// $temp = array();
	// foreach ($cateData as $k => $v) {
	//// 改变$v的值,原数组才改变
	// 	if($v['pid']==0){
	// 		$v['count'] = count($cateModel->getSon($cateData,$v['cid']));
	// 		$temp[] = $v;
	// 	}
	// } 
	// sp($temp);


	 
	 ?>
	<div class="_widget">
		<h4>栏目</h4>
		<div>
			<ul style="padding:0px;">
			<?php foreach ($cateData as $v){?>
				<?php if($v['count']){?>
                
				<li><a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?>(<?php echo $v['count']?>)</a></li>
				<?php }else{?>
				<li><a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a></li>	
				
               <?php }?>
			<?php }?>
			</ul>
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
				<li><a href="t_<?php echo $v['tid']?>.html"><?php echo $v['tname']?></a></li>
			</ul>
			<?php }?> 
		</div>
	</div>
	<div class="_widget">
		<h4>阅读排行</h4>
		<div>
			<?php 
			// 获取点击次数最多的五篇文章
			$arcData = $arcModel->limit(5)->orderBy('click','DESC')->get();
			 ?>
			<ul style="padding:0px;">
			<?php foreach ($arcData as $v){?>
				<li><a href="c_<?php echo $v['aid']?>.html"><?php echo $v['title']?></a></li>
			<?php }?>
			</ul>	
		</div>
	</div>	
</aside>