<aside class="col-md-4 hidden-sm hidden-xs">
	
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
		<h4>分类列表</h4>
		<div>
			{{foreach from='$cateData' value='$v'}}
				{{if value="$v['count']"}}
					<a href="l_{{$v['cid']}}.html">{{$v['cname']}}({{$v['count']}})</a>
				{{else}}
					<a href="l_{{$v['cid']}}.html">{{$v['cname']}}</a>
				{{endif}}
			{{endforeach}}
		
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
			{{foreach from='$tagData' value='$v'}}
			<a href="t_{{$v['tid']}}.html">{{$v['tname']}}</a>
			{{endforeach}} 
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
			{{foreach from='$arcData' value='$v'}}
				<li><a href="c_{{$v['aid']}}.html">{{$v['title']}}</a></li>
			{{endforeach}}
			</ul>	
		</div>
	</div>	
</aside>