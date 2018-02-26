<div class="foryou">
			<div class="title">
				<h3>为您推荐</h3>
			</div>
			<!--轮播图,重新写-->
			<div class="imgscroll">
				<div class="all">
					<ul>
					<?php 
						// 实例化商品表
						$goodsModel = new \Common\Model\Goods;
						$foryou = $goodsModel->getWhere(58,5);
					 ?>
						<?php foreach ($foryou as $v){?>
						<li>
							<a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>">
							<img src="<?php echo $v['pic_list']?>" alt="" />
							</a>
							<p class="text"><a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>"><?php echo $v['gname']?></a></p>
							<span>
								<i>¥</i>
								<em><?php echo $v['sprice']?></em>
							</span>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>