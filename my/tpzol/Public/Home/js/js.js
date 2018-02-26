$(function(){
//	------------------------轮播图--开始-----------------------------
//	1.自动切换
	var num=0
	function run(){
		
		num++
//		回流判断
		if(num==7){
			$('.lunbo ul').css({left:"0px"});
			num=1;
		}
		var l=num*-740;
//		设置动画
		$('.lunbo ul').animate({left:l+"px"},1500);
		
	}
	// 定时器
	timer = setInterval(run,3000);
//	鼠标移入停止
	$('.lunbo').hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(run,3000);
	});
//	------------------------轮播图--结束-----------------------------
//	------------------------图片向左飘逸--开始------------------------
	$('.f_goods_m .m_box li').mouseover(function(){
		$(this).find('img').stop().animate({top:'-10px'},300);
		
	})
	$('.f_goods_m .m_box li').mouseleave(function(){
		$(this).find('img').stop().animate({top:'0px'},300);
		
	})
	
	$('.f_goods_r .r_box li').mouseover(function(){
		$(this).find('img').stop().animate({top:'-10px'},300);
		
	})
	$('.f_goods_r .r_box li').mouseleave(function(){
		$(this).find('img').stop().animate({top:'0px'},300);
		
	})
//	------------------------图片向左飘逸--开始------------------------
//	个人中心--订单和地址切换开始
	$('.t_dizhi').click(function(){
		$('.table').hide();
		$('.site').show();
	})
//	个人中心--订单和地址切换结束
})
