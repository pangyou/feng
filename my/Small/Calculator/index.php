<?php 
	$num1=isset($_POST['num1']) ? $_POST['num1'] : 0;
	$num2=isset($_POST['num2']) ? $_POST['num2'] : 0;
	$ys=isset($_POST['ys']) ? $_POST['ys'] : 0;
	switch ($ys) {
		case '+':
			$result=$num1 + $num2;
			break;
		case '-':
			$result=$num1 - $num2;
			break;
		case '*':
			$result=$num1 * $num2;
			break;
		case '/':
			$result=$num1 / $num2;
			break;
	}
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<style type="text/css">
 		*{
 			padding: 0;margin: 0;
 		}
 		#box{
 			width: 220px;
 			height: 290px;
 			border: 1px solid black;
 			margin: 0 auto;
 		}
 		.top{
 			width: 220px;
 			height: 50px;
 			font-size: 30px;
 			line-height: 50px;
 			position: relative;
 		}
 		.topall{
 			width: 55px;
 			height: 50px;
 			float: left;
 		}
 		.nav{
 			width: 220px;
 			height: 240px;
 		}
 		.fa{
 			width: 220px;
 			height: 240px;
 		}
 		.fa li{
 			list-style: none;
 			float: left;
 			background: #ccc;
 			width: 59px;
 			height: 59px;
 			border-right: 1px solid black;
 			border-top: 1px solid black;
 			text-align: center;
 			line-height: 60px;
 			font-size: 30px;
 			color: black;
 			font-weight: bold;
 			position: relative;
 			cursor: pointer;
 		}
 		.fa .li2a{
 			width: 39px;
 			color: white;
 			background: #1E1B1B;
 		}
 		#li3 input{
 			background: orange;
 			border: none;
 			width: 59px;
 			height: 59px;
 			cursor: pointer;
 			position: absolute;
 			left: 0px;
 			top: 0px;
 		}
 		#box li.c{
 			background: pink;
 		}
		#num1{
			width: 220px;
			height: 50px;
			line-height: 20px;
			position: absolute;
			left: 0;top: 0;
			border: none;
			font-size: 20px;
			background: #0B5A0F;
			z-index: 2;
			display: none;
			color: white;
			overflow: auto;
			text-align: right;
		}
		#num2{
			width: 220px;
			height: 50px;
			line-height: 50px;
			font-size: 20px;
			float: right;
			border: none;
			position: absolute;
			right: 0;
			top: 0;
			z-index: 4;
			background: yellow;
			color: red;
			overflow: auto;
			text-align: right;
			display: none;
		}
		#ys{
			width: 220px;
			height: 50px;
			line-height: 20px;
			font-size: 50px;
			color: blue;
			border: none;
			text-align: right;
			position: absolute;
			right: 0;
			top: 0px;
			z-index: 3;
			display: none;
		}
		.result{
			width: 220px;
			height: 50px;
			line-height: 50px;
			position: absolute;
			right: 0;
			bottom: 0;
			z-index: 1;
			background: purple;
			text-align: right;
		}
 	</style>
 	<script type="text/javascript" src='../jquery-2.1.4.min.js'></script>
 	<script type="text/javascript">
	$(function(){	
		$('li').click(function() {
			$(this).addClass('c').siblings('li').removeClass('c');
		})
		var a=0;
		$('.li').click(function(){
			if(a==0){
			$('#num1').css({display:'block'});
			var linum=$(this).html();
			var num1=$('input[name=num1]').val();
			var countnum1=num1+linum;
			$('input[name=num1]').val(countnum1);
		}else{
			// 写入num2
			$('#num2').css({display:'block'});
			var linum2=$(this).html();
			var num2=$('input[name=num2]').val();
			var countnum2=num2+linum2;
			$('input[name=num2]').val(countnum2);
		}
		})
		var s=0;
		$('.li2a').click(function(){
			if(s==1){
				return;
			}
			a=1;
			s=1;
			$('#ys').css({display:'block'});
			var linum3=$(this).html();
			var num3=$('input[name=ys]').val();
			var countnum3=num3+linum3;
			$('input[name=ys]').val(countnum3);

		})
		$('#submit').click(function() {
			$('.result').css({display:'block'});
			$('.result').siblings().css({display:'none'});
		})


		
	})	
	</script>
 </head>
 <body>
 	<form action="" method="post">
		<div id="box">
			<div class="top">
				<input type="text" name="num1" id="num1"  />
				<input type="text" name="ys" id="ys">
				<input type="text" name="num2" id="num2"  />
				<div class="result"><?php echo $result; ?></div>
			</div>
			<div class="nav">
				<ul class="fa">
					<li class="li li7">7</li>
					<li class="li li8">8</li>
					<li class="li li9">9</li>
					<li class="li2a">+</li>
					<li class="li li4">4</li>
					<li class="li li5">5</li>
					<li class="li li6">6</li>
					<li class="li2a">-</li>
					<li class="li li1">1</li>
					<li class="li li2">2</li>
					<li class="li li3">3</li>
					<li class="li2a">*</li>
					<li class="li li10">.</li>
					<li class="li li0">0</li>
					<li id="li3">
						<input type="submit" id="submit" value="=">
					</li>
					<li class="li2a">/</li>		
				</ul>
			</div>
		</div>
	</form>
 </body>
 </html>