<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>我的易购-个人信息</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="./Public/Home/css/person3.css"/>
</head>
<body>	
	<!--头部开始-->
		<div id="head">
		<div class="top">
			<div class="top_left">
				<a class="a1" href="http://127.0.0.1/suning/index.php?m=Home&c=Index&a=index">
					<i class="glyphicon glyphicon-home"></i>
					返回易购首页
				</a><b>|</b>
				<div class="box">	
					<span>网站导航</span>
					<em class="glyphicon glyphicon-menu-down"></em>
				</div>
				<a href="">商家入驻</a>
			</div>
			<div class="top_right">
				<ul>
					<li>
					                
					<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index">admin...</a>
										<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=orders">我的订单</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index">我的易购</a><em class="glyphicon glyphicon-menu-down"></em></li>
					<li class="gouwuche">
						<em class="glyphicon glyphicon-shopping-cart"></em>
						<a href="http://127.0.0.1/suning/index.php?m=Home&c=Content&a=cartshow">购物车</a>
						<span class="total_num" id='total_num'>
														<b>0</b>
						</span>
					</li>				
					<li>
						<em></em>
						<a href="">手机苏宁</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
					<li><a href="">易付宝</a></li>
					<li><a href="">政府采购</a></li>
					<li>
						<a href="">客户服务</a>
						<em class="glyphicon glyphicon-menu-down"></em>
					</li>
				</ul>
				
			</div>
		</div>
	</div>
	<div id="my">
		<div class="my">
			<div class="left">
				<a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index"></a>
			</div>
			<div class="right">
				<ul>
					<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=index">首页</a></li>
					<li><a href="http://127.0.0.1/suning/index.php?m=Home&c=Person&a=adress">账户管理</a><i></i></li>
					<li><a href="">消息</a></li>
				</ul>
				<form action="" method="post">
					<div class="search">
						<input type="text" name="" id="" />
						<a href=""></a>
					</div>
				</from>			
			</div>
		</div>
	</div>
	<!--头部结束-->
	<!--右侧漂浮栏目二维码-->
	<div id="myTool">
		<a class="right1" href=""></a>
		<a class="right2" href="">
			问卷调查
		</a>
	</div>
	<div class="line"></div>
	<div id="nav">
		<div class="left">
			<div class="dt">账户管理</div>
			<div class="dd">
				<ul>
					<li class="now">
						<span>·</span>
						<a href="">个人信息</a>
					</li>
					<li>
						<span>·</span>
						<a href="">我的拍卖</a>
					</li>
					<li>
						<span>·</span>
						<a class="a2" href="">我的二手</a>
					</li>
					<li>
						<span>·</span>
						<a href="">我的拍卖</a>
					</li>
					<li >
						<span>·</span>
						<a href="<?php echo U('adress')?>">地址管理</a>
					</li>
					<li>
						<span>·</span>
						<a href="">校园用户</a>
					</li>
					<li>
						<span>·</span>
						<a href="">我的拍卖</a>
					</li>
				</ul>
			</div>
			<a class="last" href="">
				<em></em>
			</a>
		</div>
		<div class="right">
			<h2 class="right_title">
				<strong>个人信息</strong>
				<span>其他说明：您的会员编号为：6158622617，您可以凭此编号到苏宁任一门店消费。</span>
			</h2>
			<div class="user">
				<div class="pro-file">
					<div class="son">
						<img src="./Public/Home/images/toux.jpg" alt="" />
						<a href="">编辑头像</a>
						<div class="bg"></div>
					</div>
					<a class="vip" href=""></a>
				</div>
				<div class="pro-info">
					<input type="text" placeholder="请设置用户名" class="acc" name="account"  id="" />
					<span id='sp1'>请输入用户名!</span>
					<p class="look">
						<a href="javascript:;">立即查看</a>
						账户安全状态
					</p>
				</div>
			</div>	
			<div class="true-name">
				<!--姓名-->
				<div class="item">
					<div class="iteml">
						<em>*</em>真实姓名：
					</div>
					<div class="itemr">
						<input type="text" class="text truename" name="truename"  id="" /> <span id='sp2'>请输入真实姓名1</span>
					</div>
				</div>
				<!--昵称-->
				<div class="item">
					<div class="iteml">
						昵称：
					</div>
					<div class="itemr">
						<?php if(isset($data['nickname'])){?>
                
						<input type="text" class="text" value="<?php echo $data['nickname']?>" name="nickname" id="" />
						<?php }else{?>
						<input type="text" class="text" value="" name="nickname" id="" />
						
               <?php }?>
					</div>
				</div>
				<!--性别-->
				<div class="item">
					<div class="iteml">
						<em>*</em>性别：
					</div>
					<div class="itemr gender">
						<input type="radio" class="sex" name="sex" checked id="" />
						<span>男</span>
						<input type="radio" class="sex" name="sex" id="" />
						<span>女</span>
						<input type="radio" class="sex" name="sex" id="" />
						<span>保密</span>
					</div>
				</div>
				<!--手机-->
				<div class="item">
					<div class="iteml">
						手机：
					</div>
					<div class="itemr phone">
						<?php if(isset($data['phone'])){?>
                
						<span><?php echo $data['phone']?></span>
						<?php }else{?>
						<span></span>
						
               <?php }?>
						<a href="javascript:;">修改</a>
					</div>
				</div>
				<!--邮箱-->
				<div class="item">
					<div class="iteml">
						邮箱：
					</div>
					<div class="itemr phone">
						<span>您的账号还没有绑定邮箱</span>
						<a href="javascript:;">立即绑定</a>
					</div>
				</div>
				<!--出生日期-->
				<div class="item">
					<div class="iteml">
						出生日期：
					</div>
					<div class="itemr birth">
						<input type="text" class="text" placeholder="如1991-04-05" name="" id="" />
						<i class="date"></i>
						<!-- <em class="line">-</em> -->
						<!--星座constellation-->
						<!-- <input type="text" class="constellation" value="星座" name="" id="" /> -->
					</div>
				</div>
				<!--居住地址-->
				<div class="item ct">
					<div class="iteml">
						<em>*</em>居住地址：
					</div>
					<div class="city">
						<!-- 城市联动 -->
						<select name="city[]" id="area1"></select>
						<select name="city[]" id="area2"></select>
						<select name="city[]" id="area3"></select>
						<input type="text" class="adress" placeholder="街道名称或小区名称" />
						<span id='sp3'>请填写省市区镇及详细地址!</span>
					</div>
				</div>
				<!--验证码-->
				<div class="item">
					<div class="iteml">
						<em>*</em>验证码：
					</div>
					<div class="itemr code">
						<input type="text" class="text code" name="" id="" />
						<a href="javascript:;"><img src="<?php echo U('code')?>" class="img" onclick="this.src = this.src + '&mt=' + Math.random()" title="看不清?点我换一张"></a>
						<span>看不清<a class="click" href="javascript:;">换一张</a></span>
						<em id='sp4'></em>
					</div>
				</div>
				<!--保存-->
				<div class="item">
					<div class="iteml"></div>
					<div class="itemr">
						<a class="btn-yellow" href="javascript:;">保存</a>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!--底部设置开始-->
	<div id="footer">
		<div class="footer3">
			<div class="footer3_con">
				<p class="p1">
					<a href="">苏宁云商</a><span>|</span>
					<a href="">苏宁互联</a><span>|</span>
					<a href="">苏宁金融</a><span>|</span>
					<a href="">易付宝</a><span>|</span>
					<a href="">PPTV</a><span>|</span>
					<a href="">红孩子</a><span>|</span>
					<a href="">缤购</a><span>|</span>
					<a href="">乐购仕</a><span>|</span>
					<a href="">苏宁物流</a><span>|</span>
					<a href="">苏宁美国</a><span>|</span>
					<a href="">苏宁香港</a><span>|</span>
					<a href="">手机苏宁</a>
				</p>
				<p class="p1">
					<a href="">关于苏宁易购</a><span>|</span>
					<a href="">联系我们</a><span>|</span>
					<a href="">诚聘英才</a><span>|</span>
					<a href="">供应商入驻</a><span>|</span>
					<a href="">苏宁联盟</a><span>|</span>
					<a href="">苏宁招标</a><span>|</span>
					<a href="">友情链接</a><span>|</span>
					<a href="">法律申明</a><span>|</span>
					<a href="">用户体验提升计划</a><span>|</span>
					<a href="">股东会员认证</a>
				</p>
				<p class="p2">Copyright© 2002-2016 ，苏宁云商集团股份有限公司版权所有
					<a href="">苏ICP备10207551号-4</a>
					<a href="">苏B1-20130131</a>
					<a href="">苏B2-20130391</a>出版物经营许可证新出发苏批字第A-243号
				</p>
				<div class="footer3_img">
					<a href=""><img src="./Public/Home/images/footer3a1.png" alt="" /></a>
					<a href=""><img src="./Public/Home/images/dianxin.jpg" alt="" /></a>
					<a href=""><img src="./Public/Home/images/unicom.png" alt="" /></a>
					<a href=""><img src="./Public/Home/images/dianzi.png" alt="" /></a>
				</div>
			</div>
		</div>
	</div>
	<!--底部设置结束-->	
	<script type="text/javascript" src="./Public/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="./Public/Home/js/area.js"></script>
	<script type="text/javascript">
		$(function(){
			//城市联动
			area.init('area');
			//修改的时候默认被选中效果
			area.selected('北京市','北京','东城区');
			// 点击切换图片
			$('.click').click(function() {
				// 获取图片地址
				var src = $('.img').attr('src');
				// 随机改变图片地址
				src = src + '&mt=' + Math.random();
				$('.img').attr('src',src);
			});
			$('.acc').blur(function() {
				var acc = $(this).val();
				if(acc == ''){
					$('#sp1').css({display:'inline-block'});
				}else{
					$('#sp1').css({display:'none'});
				}
			});
			$('.truename').blur(function() {
				var tr = $(this).val();
				if(tr == ''){
					$('#sp2').css({display:'inline-block'});
				}else{
					$('#sp2').css({display:'none'});
				}
			});
			$('.adress').blur(function() {
				var ad = $(this).val();
				if(ad == ''){
					$('#sp3').css({display:'inline-block'});
				}else{
					$('#sp3').css({display:'none'});
				}
			});
			$('.code').blur(function() {
				var code = $(this).val();
				
				$.ajax({
					url: "<?php echo U('check')?>",
					type: 'POST',
					dataType: 'json',
					data: {code:code},
					success:function(phpData){
						
						if(phpData == 1){
							$('#sp4').html('<em style="color:green">验证码正确<em>');
						}else{
							$('#sp4').html('<em style="color:red">验证码错误!<em>');
						}
						if(code == ''){
							$('#sp4').html('<em style="color:red">请输入验证码!<em>');
						}
					}
				})
				
				
			});


		})
	</script>
</body>
</html>
