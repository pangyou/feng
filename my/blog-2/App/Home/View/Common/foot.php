<footer class="hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h4 class="_title">最新文章</h4>
				<?php 
				// 实例化文章表
				$arcModel = new \Common\Model\Arc;
				// 获得最新的三篇文章数据
				$arcData = $arcModel->orderBy('sendtime','DESC')->limit(3)->get();
				 ?>
				<div id="" class="_single">
					{{foreach from='$arcData' value='$v'}}
					<p><a href="c_{{$v['aid']}}.html">{{$v['title']}}</a></p>
					<time>{{date('Y-m-d',$v['sendtime'])}}</time>
					{{endforeach}}
				</div>	
			</div>
			<div class="col-sm-4 footer_tag">
				<div id="">
				<?php 
				// 实例化标签表
				$tagModel = new \Common\Model\Tag;
				// 获取标签表的数据
				$tagData = $tagModel->get();
				 ?>
					<h4 class="_title">标签云</h4>
					{{foreach from='$tagData' value='$v' }}
					<a href="t_{{$v['tid']}}.html">{{$v['tname']}}</a>
					{{endforeach}}
				</div>
			</div>
			<div class="col-sm-4">
				<h4 class="_title">友情链接</h4>
				<div id="" class="_single">
				<?php 
				// 实例化友情连接表
				$linkModel = new \Common\Model\Link;
				// 获取友情连接表的数据
				$linkData = $linkModel->get();
				 ?>
					{{foreach from='$linkData' value='$v'}}
					<p><a href="{{$v['url']}}" target="_blank">{{$v['lname']}}</a></p>
					{{endforeach}}
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="footer_bottom">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="javascript:;">{{Config::get('self.webname')}}</a>
				 | 
				<a href="javascript:;">{{Config::get('self.copy')}}</a>
				 |
				<a href="javascript:;">{{Config::get('self.adminemail')}}</a>
			</div>
		</div>
	</div>
</div>
<!--返回顶部自己写的插件-->
<script src="./Public/Home/js/backTop.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(function(){
		//插件使用
		$('.back_top').backTop({right:30});
	})
</script>
<div class="back_top hidden-xs hidden-md">
	<i class="glyphicon glyphicon-menu-up"></i>
</div>