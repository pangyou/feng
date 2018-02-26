<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>苏宁易购:确认订单信息</title>
<link rel="stylesheet" href="./Public/Home/css/gouwu2.css" />
</head>
<body>
	<form action="<?php echo U('Orders/add')?>" method="post">
	<div id="head">
		<div class="logo">
			<img src="./Public/Home/images/logo.png"/>
		</div>
		<div class="right">
			<ul class="step">
				<li class="now">
					<i>1</i>
					<span>我的购物车</span>
					<b></b>
				</li>
				<li class="li2">
					<i>2</i>
					<span>确认订单</span>
					<b></b>
				</li>
				<li>
					<i>3</i>
					<span>付款</span>
					<b></b>
				</li>
				<li>
					<i>4</i>
					<span>支付成功</span>
					<b></b>
				</li>
			</ul>
		</div>
	</div>
	<div id="nav">
		<div class="step1">
			<div class="title">新增配送信息</div>
			<div class="son son1">
				<div class="left">
					<em>*</em><span>配送方式：</span>
				</div>
				<div class="right">
					<input type="radio" name="" class="check" checked id="" />
					<span>配送上门</span>
				</div>
			</div>
			<div class="son son2">
				<div class="left">
					<em>*</em><span>收货人：</span>
				</div>
				<div class="right">
					<input type="text" placeholder="姓名,如张三,Lily" class="text" name="username" id="username" value="" required="required" />
				</div>
			</div>
			<div class="son son3">
				<div class="left">
					<em>*</em><span>手机：</span>
				</div>
				<div class="right">
					<input type="text" placeholder="请填写正确的11位手机号码" class="text" name="phone" value="" required id=""  />
				</div>
			</div>
			<div class="son son4">
				<div class="left">
					<span>固定电话：</span>
				</div>
				<div class="right">
					<input type="text" placeholder="区号" class="text" name="telphone[]" id=""  />
					<em>-</em>
					<input type="text" class="text" placeholder="电话号码" name="telphone[]" id=""  />
					<em>-</em>
					<input type="text" class="text" placeholder="分机号码(选填)" name="telphone[]" id=""  />
				</div>
			</div>
			<div class="son son5">
				<div class="left">
					<em>*</em><span>所在地区：</span>
				</div>
				<div class="right">
					<div class="city">
						<select name="city[]" id="area1"></select>
						<select name="city[]" id="area2"></select>
						<select name="city[]" id="area3"></select>
					</div>
				</div>
			</div>	
			<div class="son son6">
				<div class="left">
					<em>*</em><span>详细地址：</span>
				</div>
				<div class="right">
					<input type="text" class="text6" required="required" placeholder="详细地址" name="city[]" value="" id="" />
				</div>
			</div>
			<div class="son son7">
				<div class="left"></div>
				<div class="right">
					<input type="checkbox" class="check" name="" id="" />
					<span>设为默认收货地址</span>
				</div>
			</div>
			<div class="son son8">
				<div class="left"></div>
				<div class="right">
					<a href="javascript:;">保存</a>
				</div>
			</div>
		</div>
		<div class="st step2">
			<div class="title">支付方式</div>
			<div class="son">
				<a class="a1" href="">在线支付<i></i></a>
				<a class="a2" href="">门店付款</a>
			</div>
		</div>
		<div class="st step3">
			<div class="title">商品服务信息<a href="<?php echo U('cartshow')?>">返回我的购物车修改</a></div>
			<div class="son">
				<ul class="ul">
					<li class="li1">
						<a class="a1" href="">zjieyu/中大鳄鱼佳和盛专营店</a>
						<a class="bg" href=""></a>
					</li>
					<li class="li2">服务信息</li>
					<li class="li3">单价</li>
					<li class="li4">数量</li>
					<li class="li5">小计</li>
				</ul>
				<?php foreach ($data as $k=>$v){?>
				<!-- sid隐藏域 -->
				<input type="hidden" name="sid[]" value="<?php echo $k?>">
				<ul class="ul ul1">
					<li class="li1">
						<a class="a1" href=""><img src="<?php echo $v['pic']?>"/></a>
						<p class="pname">
							<a href=""><?php echo $v['name']?></a>
						</p>
						<p class="return">
							<a href="">7天无理由退货</a>
							<?php foreach ($v['options'] as $vv){?>
							<span><?php echo $vv?></span>
							<?php }?>
						</p>
					</li>
					<li class="li2">支付完成后尽快为您发货</li>
					<li class="li3">¥ <?php echo $v['price']?></li>
					<li class="li4"><?php echo $v['num']?></li>
					<li class="li5">¥ <?php echo $v['total']?></li>
				</ul>
				<?php }?>
				<ul class="ul ul2">
					<li class="li1">
						<span>给卖家留言：</span>
						<input type="text" name="remarks" class="text" placeholder="选填：对本次交易的补充说明（所填内容建议已经和卖家达成一致意见）" id="" />
					</li>
					<li class="li2"><!-- <span>0/85</span> --></li>
					<li class="li3"><p>合计(含运费)</p></li>
					<li class="li4"></li>
					<li class="li5">
						<p>免运费</p>
						<p><span>¥ <?php echo $price?></span></p>
					</li>
				</ul>
			</div>
		</div>
		<div class="st step4">
			<div class="title">发票信息  <a class="edit" href="">修改</a></div>
			<div class="son">
				<?php if(isset($_SESSION['uid'])){?>
                
				<p> 发票类型: <span>普通发票:纸质</span> 发票抬头: <span id='uname'></span></p>
				<?php }else{?>
				<p><i></i>请先确认配送信息</p>
				
               <?php }?>
				
			</div>
		</div>
		<div class="st step5">
			<div class="title">结算信息</div>
			<div class="son">
				<div class="item">
					<i></i>
					<a href=""><b>使用优惠卷</b></a>(无可用优惠卷)
				</div>
				<div class="item">
					<i></i>
					<a href=""><b>使用推荐号</b></a>
				</div>
				<div class="item3">
				<?php if($_SESSION){?>
                
					<em class="now"><?php echo $num?></em>件商品总计：<b>¥<?php echo $price?></b>
				
               <?php }?>
				</div>
				<div class="item3">
					运费：<b>¥0.00</b>
				</div>
				<div class="item3">
					优惠：<b>¥0.00</b>
				</div>
				<div class="item3">
					优惠券/卡：<b>¥0.00</b>
				</div>
				<div class="item4">
					<input type="checkbox" name="" id="" />使用云钻
				</div>
				<div class="item4">
					<input type="checkbox" name="" id="" />找人代付
				</div>
			</div>
			<div class="last">
				<p class="price">
					应付金额：<em>¥<?php echo $price?></em>
				</p>
				<?php if($_SESSION){?>
                
				<p class="p3">
					<i></i>
					提交订单后尽快支付，商品才不会被人抢走哦！
					<input type="submit" class="sub" value="提交订单">
				</p>
				<?php }else{?>
				<p class="p2">
					<span>您需先选择配送地址，再提交订单</span>
				</p>
				<p class="p3">
					提交订单后尽快支付，商品才不会被人抢走哦！
					<a href="javascript:;">提交订单</a>
				</p>
				
               <?php }?>
			</div>
		</div>
	</div>
	<!-- 总价隐藏域 -->
	<input type="hidden" name="total_price" value="<?php echo $price?>">
	</form>
	<div id="myright">
		<a href="">
			<i></i>
			<em>问卷调查</em>
		</a>
	</div>


	<script type="text/javascript" src="./Public/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./Public/Home/js/area.js"></script>
	<script type="text/javascript" src="./area.js"></script>
	<script type="text/javascript">
		$(function(){
			// 城市联动
			//初始化方法
			area.init('area');
			//修改的时候默认被选中效果
			area.selected('北京市','北京','东城区');
			// 写名字效果
			$('input[name=username]').change(function() {
				var name = $('#username').val();
				$('#uname').html(name);
			});
			
		})
	</script>










</body>
</html>
