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
						{{foreach from='$foryou' value='$v'}}
						<li>
							<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">
							<img src="{{$v['pic_list']}}" alt="" />
							</a>
							<p class="text"><a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a></p>
							<span>
								<i>¥</i>
								<em>{{$v['sprice']}}</em>
							</span>
						</li>
						{{endforeach}}
					</ul>
				</div>
			</div>
		</div>