// JavaScript Document
$(document).ready(function(e) {
	 imgScroll.gradual({
		 'name':'list_center'
		 },3000)
	  imgScroll.gradual({
		 'name':'imgscroll6',
		 },4000) 
});
$(function(){
	$('.item1 ul li').hover(function(){
		$(this).find('.two_nav').show(100);
		},function(){
			$(this).find('.two_nav').hide(100);
		})
    // 所有图片闪一下
    // $('a img').hover(function() {
    //     $(this).animate({opacity:0.8},200);
    //     $(this).animate({opacity:1},200);
    // }, function() {
        
    // })
	// 四张图片轮播设置开始	
	var num=0;
	// 自动轮播
	function run(){
       num++;
       // 回路
       if(num>4){
       	// 回到顶点
       	   $(".son").css({left:0});
       	   num = 1;
       }
       // 获得新的left值
       var left = num * -1000;
       $("#fa .son").animate({left:left+"px"},1000);
	}
	// 定时器
    timer = setInterval(run,3000);
 	var c=0;
    $('#fa .next1').click(function(){
    	if(c==1){
     		return;
     	}
     	setTimeout(function(){
       	  c = 0;
        },500);
        c=1;
    	num++;	
    	if(num>4){
    		$('#fa .son').css({left:0});
    		num=1;
    	}
    	var left=-num*1000;
    	$('#fa .son').animate({left:left+'px'},500);
    })
    var c=0;
    $('#fa .pre1').click(function(){
    	clearInterval(timer);
    	if(c==1){
     		return;
     	}
     	setTimeout(function(){
       	  c = 0;
        },500);
        c=1;
    	num--;	
    	if(num<0){
    		$('.son').css({left:-4000+'px'});
    		num=3;
    	}
    	var left=num*-1000;
    	$('#fa .son').animate({left:left+'px'},500);
    })
    $('#fa').hover(function() {
    	$('#fa .pre1,.next1').css({display:'block'});
    	clearInterval(timer);
    }, function() {
    	$('#fa .pre1,.next1').css({display:'none'});
    	timer=setInterval(run,3000);
    })
    // 猜你喜欢效果设置开始
    var c=0;
    $('#like .mt a').hover(function() {
        clearInterval(timerl);
     	if(c==1){
     		return;
     	}
     	setTimeout(function(){
       	  c = 0;
        },1000);
        c=1;
     	$('#like .spacer i').css({left:'0px'});
     	$('#like .spacer i').animate({left:'845px'},1000);
     },function(){
        timerl=setInterval(like,2000);
     })
    $('#like .spacer i').hover(function() {
        clearInterval(timerl);
     	if(c==1){
     		return;
     	}
     	setTimeout(function(){
       	  c = 0;
        },1000);
        c=1;
     	$('#like .spacer i').css({left:'0px'});
     	$('#like .spacer i').animate({left:'845px'},1000);
        },function(){
        timerl=setInterval(like,2000);
     }) 
    function like(){
        $('#like .spacer i').css({left:'0px'});
        $('#like .spacer i').animate({left:'845px'},1000);
    }
    timerl=setInterval(like,2000);
    // 品质生活效果设置开始
    $('#stylelife .life1son1 a img').hover(function() {
    	$('#stylelife .life1son1 a img').stop().animate({right:'8px'},200);
    }, function() {
    	$('#stylelife .life1son1 a img').stop().animate({right:'0px'},200);
    })
    $('#stylelife .life3son1 a img').hover(function() {
    	$('#stylelife .life3son1 a img').stop().animate({left:'8px'},100);
    }, function() {
    	$('#stylelife .life3son1 a img').stop().animate({left:'0px'},100);
    })
    // 1Ftap切换设置开始
    $('#clothes .clothes_top_right ul li').hover(function() {
    	$(this).css({borderColor:'#C81623',background:'white'}).siblings('li').css({borderColor:'transparent',background:'transparent'});
    	$(this).find('.box').css({display:'block'});
    	$(this).siblings('li').find('.box').css({display:'none'});
    }, function() {
    }) 
     // 1Ftap切换设置结束
     // 2-10Ftap切换设置开始(不包括3,4,5)
    $('.beautiful_top_right ul li').hover(function() {
    	$(this).css({borderColor:'#C81623',background:'white'}).siblings('li').css({borderColor:'transparent',background:'transparent'});
    	$(this).find('.box').css({display:'block'});
    	$(this).siblings('li').find('.box').css({display:'none'});
    }, function() {
    })
     // 2-10Ftap切换设置结束
     // 3楼tap切换开始
     // 3楼tap切换结束  
     // 4楼tap切换开始
     // 4楼tap切换结束 
     // 5楼tap切换开始
     $('.F4_top_right li').hover(function() {
        $(this).css({borderColor:'#C81623',background:'white'}).siblings('li').css({borderColor:'transparent',background:'transparent'});
        $(this).find('.box').css({display:'block'});
        $(this).siblings('li').find('.box').css({display:'none'});
    }, function() {
    })
     // 5楼tap切换结束 
    // 2F个护美妆轮播图设置开始
    $('.imgscroll2f').each(function() {
            var js_t=this;
            var jq_t=$(this);
            js_t.num=0;
            js_t.run=function(){
                js_t.num++;
                if(js_t.num==5){            
                    jq_t.find('.all').css({left:0});
                    js_t.num=1;         
                }
                var l=-js_t.num*339;
                jq_t.find('.all').animate({left:l+"px"}, 500);
                if(js_t.num==4){
                    jq_t.find('li').eq(0).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                }else{
                    jq_t.find('li').eq(js_t.num).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                }
        
            }
            js_t.timer=setInterval(js_t.run,2000);
            // 移入停止
            jq_t.hover(function() {
                $('.pre2f').css({display:'block'});
                $('.next2f').css({display:'block'});
                clearInterval(js_t.timer);
                // console.log(js_t.num);
            }, function() {
                js_t.timer=setInterval(js_t.run,2000);
                $('.pre2f').css({display:'none'});
                $('.next2f').css({display:'none'});
            })
            // li手动切换
            jq_t.find('li').hover(function() {
                js_t.num=$(this).index();
                $(this).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                jq_t.find('.all').stop().animate({left:-js_t.num*339+"px"}, 500);       
            },function(){   
            })
            // 点击按钮切换
            var p=0;
            jq_t.find('.pre2f').click(function() {
                if(p==1){
                    return;
                }
                setTimeout(function(){
                    p=0;
                },500)
                p=1;
                js_t.num--;
                if(js_t.num<0){
                    jq_t.find('.all').css({left:'-1356px'});
                    js_t.num=3;
                }
                var l=-js_t.num*339;
                jq_t.find('.all').animate({left:l+'px'},500);
                jq_t.find('ul li').eq(js_t.num).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});        
            })
            var n=0;
            jq_t.find('.next2f').click(function() {
                if(n==1){
                    return;
                }
                setTimeout(function(){
                    n=0;
                },500)
                n=1;
                js_t.num++;
                if(js_t.num>4){
                    js_t.num=1;
                    jq_t.find('.all').css({left:0});
                }
                var l=-js_t.num*339;
                jq_t.find('.all').animate({left:l+'px'}, 500);
                if(js_t.num==4){
                    jq_t.find('ul li').eq(0).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                }else{
                    jq_t.find('ul li').eq(js_t.num).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                }
                

            })
        })
    // 2F个护美妆轮播图设置结束
    // 3F手机通讯轮播图设置开始
    $('.imgscroll3f').each(function() {
        var js_t=this;
        var jq_t=$(this);
        js_t.num=0;
        js_t.run=function(){
            js_t.num++;
            if(js_t.num==5){            
                jq_t.find('.all').css({left:0});
                js_t.num=1;         
            }
            var l=-js_t.num*439;
            jq_t.find('.all').animate({left:l+"px"}, 500);
            if(js_t.num==4){
                jq_t.find('li').eq(0).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
            }else{
                jq_t.find('li').eq(js_t.num).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
            }
        }
        js_t.timer=setInterval(js_t.run,2000);
        // 移入停止
        jq_t.hover(function() {
            jq_t.find('.pre3f').css({display:'block'});
            jq_t.find('.next3f').css({display:'block'});
            clearInterval(js_t.timer);
            // console.log(js_t.num);
        }, function() {
            js_t.timer=setInterval(js_t.run,2000);
            jq_t.find('.pre3f').css({display:'none'});
            jq_t.find('.next3f').css({display:'none'});
        })
        // li手动切换
        jq_t.find('li').hover(function() {
            js_t.num=$(this).index();
            $(this).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
            jq_t.find('.all').stop().animate({left:-js_t.num*439+"px"}, 500);       
        },function(){   
        })
        // 点击按钮切换
        var p=0;
        jq_t.find('.pre3f').click(function() {
            if(p==1){
                return;
            }
            setTimeout(function(){
                p=0;
            },500)
            p=1;
            js_t.num--;
            if(js_t.num<0){
                jq_t.find('.all').css({left:'-1756px'});
                js_t.num=3;
            }
            var l=-js_t.num*439;
            jq_t.find('.all').animate({left:l+'px'},500);
            jq_t.find('ul li').eq(js_t.num).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});        
        })
        var n=0;
        jq_t.find('.next3f').click(function() {
            if(n==1){
                return;
            }
            setTimeout(function(){
                n=0;
            },500)
            n=1;
            js_t.num++;
            if(js_t.num>4){
                js_t.num=1;
                jq_t.find('.all').css({left:0});
            }
            var l=-js_t.num*439;
            jq_t.find('.all').animate({left:l+'px'}, 500);
            if(js_t.num==4){
                jq_t.find('ul li').eq(0).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
            }else{
                jq_t.find('ul li').eq(js_t.num).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
            }
        })
    })
    // 3F手机通讯轮播图设置结束
    // 6F轮播图设置开始
    $('.imgscroll6f').each(function() {
            var js_t=this;
            var jq_t=$(this);
            js_t.num=0;
            js_t.run=function(){
                js_t.num++;
                if(js_t.num==5){            
                    jq_t.find('.all').css({left:0});
                    js_t.num=1;         
                }
                var l=-js_t.num*339;
                jq_t.find('.all').animate({left:l+"px"}, 500);
                if(js_t.num==4){
                    jq_t.find('li').eq(0).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                }else{
                    jq_t.find('li').eq(js_t.num).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                }
        
            }
            js_t.timer=setInterval(js_t.run,2000);
            // 移入停止
            jq_t.hover(function() {
                $('.pre2f').css({display:'block'});
                $('.next2f').css({display:'block'});
                clearInterval(js_t.timer);
                // console.log(js_t.num);
            }, function() {
                js_t.timer=setInterval(js_t.run,2000);
                $('.pre2f').css({display:'none'});
                $('.next2f').css({display:'none'});
            })
            // li手动切换
            jq_t.find('li').hover(function() {
                js_t.num=$(this).index();
                $(this).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                jq_t.find('.all').stop().animate({left:-js_t.num*339+"px"}, 500);       
            },function(){   
            })
            // 点击按钮切换
            var p=0;
            jq_t.find('.pre2f').click(function() {
                if(p==1){
                    return;
                }
                setTimeout(function(){
                    p=0;
                },500)
                p=1;
                js_t.num--;
                if(js_t.num<0){
                    jq_t.find('.all').css({left:'-1356px'});
                    js_t.num=3;
                }
                var l=-js_t.num*339;
                jq_t.find('.all').animate({left:l+'px'},500);
                jq_t.find('ul li').eq(js_t.num).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});        
            })
            var n=0;
            jq_t.find('.next2f').click(function() {
                if(n==1){
                    return;
                }
                setTimeout(function(){
                    n=0;
                },500)
                n=1;
                js_t.num++;
                if(js_t.num>4){
                    js_t.num=1;
                    jq_t.find('.all').css({left:0});
                }
                var l=-js_t.num*339;
                jq_t.find('.all').animate({left:l+'px'}, 500);
                if(js_t.num==4){
                    jq_t.find('ul li').eq(0).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                }else{
                    jq_t.find('ul li').eq(js_t.num).css({background:'#B61B1F'}).siblings('li').css({background:'#ccc'});
                }
                

            })
        })
    // 6F轮播图设置结束
    // 天天低价效果设置开始
    $('.dayday_left img').hover(function() {
    	 $(this).animate({right:'8px',bottom:'8px'}, 200);
    }, function() {
    	 $(this).stop().animate({right:'0px',bottom:'0px'}, 200);
    })
    var arr3=0;
    function run3(){
    	arr3++;	
       // 回路
       if(arr3==6){
       	// 回到顶点
       	   $(".dayday_right ul").css({top:0});
       	   arr3 = 1;
       }
       // 获得新的top值
       var top3 = arr3 * -141.5;
    	$('.dayday_right ul').animate({top:top3+'px'}, 200);
    }
    timer3=setInterval(run3,2000); 
    $('.dayday_right ul').hover(function() {
        clearInterval(timer3);
    }, function() {
        timer3=setInterval(run3,2000);
    })
    // 天天低价效果设置结束
    // 右侧菜单效果设置开始
    $('#right_title li').hover(function() {
        $(this).find('.right2_box').css({display:'block',background:'#c81623'});
        $(this).find('.right2_box').stop().animate({left:-60}, 500);
        
    }, function() {
        $(this).find('.right2_box').css({display:'block',background:'#7a6e6e'});
        $(this).find('.right2_box').stop().animate({left:0}, 500);
    })
    $('#right_title .right2_li6').click(function() {
        $("html,body").stop().animate({scrollTop:0},1000);
    })
    // 右侧菜单效果设置结束
    // 左侧楼层变色以及出现菜单设置开始
     $(window).scroll(function() {
	 	var re=$(window).scrollTop();
        $('#left_title li').click(function() {
            $(this).find('.wenzi').addClass('show');
            $(this).siblings('li').find('.wenzi').removeClass('show');
            $(this).find('a').addClass('hidden');
            $(this).siblings('li').find('a').removeClass('hidden');
        })
        // 点击左侧菜单回到相应楼层设置开始
        $('#left_title li').eq(0).click(function() {
           $("html,body").stop().animate({scrollTop:1774},3000);
        })
        $('#left_title li').eq(1).click(function() {
           $("html,body").stop().animate({scrollTop:2526},3000);
        })
        $('#left_title li').eq(2).click(function() {
           $("html,body").stop().animate({scrollTop:3274},3000);
        })
        $('#left_title li').eq(3).click(function() {
           $("html,body").stop().animate({scrollTop:3868},3000);
        })
        $('#left_title li').eq(4).click(function() {
           $("html,body").stop().animate({scrollTop:4484},3000);
        })
        $('#left_title li').eq(5).click(function() {
           $("html,body").stop().animate({scrollTop:5232},3000);
        })
        $('#left_title li').eq(6).click(function() {
           $("html,body").stop().animate({scrollTop:5848},3000);
        })
        $('#left_title li').eq(7).click(function() {
           $("html,body").stop().animate({scrollTop:6464},3000);
        })
        $('#left_title li').eq(8).click(function() {
           $("html,body").stop().animate({scrollTop:7094},3000);
        })
        $('#left_title li').eq(9).click(function() {
           $("html,body").stop().animate({scrollTop:7840},3000);
        })
        $('#left_title li').eq(10).click(function() {
           $("html,body").stop().animate({scrollTop:8458},3000);
        })
        // 点击左侧菜单回到相应楼层设置结束
	 	// 左侧出现楼层菜单设置开始
	 	if(re>1500){
	 		$('.clothes_top span').css({backgroundPosition:'0 -35px'});
	 		$('#left_title').css({display:'block'});
	 	}else{
	 		$('.clothes_top span').css({backgroundPosition:'0  0'});
	 		$('#left_title').css({display:'none'});
	 	}
	 	if (re>8900) {$('#left_title').css({display:'none'})};
	 	// 左侧出现楼层菜单设置结束
	 	if(re>2280){
	 		$('.beautiful_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('.beautiful_top span').css({backgroundPosition:'0  0'});
	 	}
	 	if(re>2990){
	 		$('.phones_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('.phones_top span').css({backgroundPosition:'0  0'});
	 	}
	 	if(re>3600){
	 		$('.F4_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('.F4_top span').css({backgroundPosition:'0  0'});
	 	}
	 	if(re>4200){
	 		$('#F5 .F4_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('#F5 .F4_top span').css({backgroundPosition:'0  0'});
	 	}
	 	if(re>5000){
	 		$('#F6 .F4_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('#F6 .F4_top span').css({backgroundPosition:'0  0'});
	 	}
	 	if(re>5600){
	 		$('#F7 .F4_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('#F7 .F4_top span').css({backgroundPosition:'0  0'});
	 	}
	 	if(re>6250){
	 		$('#F8 .F4_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('#F8 .F4_top span').css({backgroundPosition:'0  0'});
	 	}
	 	if(re>6900){
	 		$('#F9 .F4_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('#F9 .F4_top span').css({backgroundPosition:'0  0'});
	 	}
	 	if(re>7500){
	 		$('#F10 .F4_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('#F10 .F4_top span').css({backgroundPosition:'0  0'});
	 	}
	 	if(re>8100){
	 		$('#F11 .F4_top span').css({backgroundPosition:'0 -35px'});
	 	}else{
	 		$('#F11 .F4_top span').css({backgroundPosition:'0  0'});
	 	}
	 })
    // 左侧楼层变色设置结束
    // 图片效果设置开始
    $('#like a img').hover(function() {
    	$(this).animate({left:'10px'},500)
    }, function() {
    	$(this).stop().animate({left:'0px'},500)
    })
    $('#stylelife a img').hover(function() {
    	$(this).stop().animate({left:'5px'},500)
    }, function() {
    	$(this).stop().animate({left:'0px'},500)
    })
     $('#clothes .box img').hover(function() {
        $(this).stop().animate({top:'10px'},500)
    }, function() {
        $(this).stop().animate({top:'0px'},500)
    })
    $('#beautiful .box img').hover(function() {
        $(this).stop().animate({bottom:'10px'},500)
    }, function() {
        $(this).stop().animate({bottom:'0px'},500)
    })
    $('#phones .box img').hover(function() {
    	$(this).stop().animate({right:'10px'},500)
    }, function() {
    	$(this).stop().animate({right:'0px'},500)
    })
    $('#F4 .box img').hover(function() {
    	$(this).stop().animate({left:'10px'},500)
    }, function() {
    	$(this).stop().animate({left:'0px'},500)
    })
    $('#F5 .box img').hover(function() {
    	$(this).stop().animate({left:'10px',top:'10px'},500)
    }, function() {
    	$(this).stop().animate({left:'0px',top:'0'},500)
    })
    $('#F6 .box img').hover(function() {
    	$(this).stop().animate({left:'10px',bottom:'10px'},500)
    }, function() {
    	$(this).stop().animate({left:'0px',bottom:'0'},500)
    })
    $('#F7 .box img').hover(function() {
    	$(this).stop().animate({right:'10px',bottom:'10px'},500)
    }, function() {
    	$(this).stop().animate({right:'0px',bottom:'0'},500)
    })
    $('#F8 .box img').hover(function() {
    	$(this).stop().animate({width:'140px',bottom:'10px'},500)
    }, function() {
    	$(this).stop().animate({width:'130px',bottom:'0'},500)
    })
    $('#F9 .box img').hover(function() {
    	$(this).stop().animate({width:'140px',height:'140px'},500)
    }, function() {
    	$(this).stop().animate({width:'130px',height:'130px'},500)
    })
    $('#F10 .box img').hover(function() {
    	$(this).stop().animate({width:'140px',height:'140px',right:'10px',bottom:'10px'},500)
    }, function() {
    	$(this).stop().animate({width:'130px',height:'130px',right:'0px',bottom:'0px'},500)
    })
    $('#F11 .dv11 img').hover(function() {
    	$(this).stop().animate({right:'10px'}, 500);
        }, function() {
    	$(this).stop().animate({right:'0px'}, 500);
    })
    // 图片效果设置结束
    // F11轮播设置开始
    $('.imgscroll').each(function() {
		var js_t=this;
		var jq_t=$(this);
		js_t.num=0;
		js_t.run=function(){
			js_t.num++;
		 	if(js_t.num==5){ 			
		 		jq_t.find('.all').css({left:0});
		 		js_t.num=1;			
		 	}
		 	var l=-js_t.num*395;
		 	jq_t.find('.all').animate({left:l+"px"}, 500);
		 	if(js_t.num==4){
		 		jq_t.find('.li span').eq(0).stop().animate({width:'30px'}, 2000);
		 		jq_t.find('.li').siblings().find('span').css({width:0});
		 	}else{
				jq_t.find('.li span').eq(js_t.num).stop().animate({width:'30px'}, 2000);
		 		jq_t.find('.li').siblings('li').css({background:'#DDDDDD'}).find('span').css({width:0});
		 	}
	
		}
		js_t.timer=setInterval(js_t.run,4000);
		// 移入停止
		jq_t.hover(function() {
		 	clearInterval(js_t.timer);
		 	$(this).find('span').eq(js_t.num).stop().width(30)
		 	$(this).find('.all').stop().animate({left:-js_t.num*395+'px'},500)
		 	// console.log(js_t.num);
		}, function() {
		 	js_t.timer=setInterval(js_t.run,4000);
		 	$(this).find('span').eq(js_t.num).width(0);
		 	$(this).find('span').eq(js_t.num).animate({width:'30px'}, 2000)
		})
		// li手动切换
		var c=0;
		jq_t.find('.li').hover(function() {
			$(this).find('span').stop().width(30);
			$(this).siblings('li').find('span').stop().width(0)
			js_t.num=$(this).index();
			jq_t.find('.all').stop().animate({left:-js_t.num*395+"px"}, 500);		
		},function(){
			
		})
	})
    // F11轮播设置结束
    // top头部效果设置开始
    $('#top .top_left').hover(function() {
        $(this).find('em img').animate({transfrom:'rotate(180deg)'},1000);
    }, function() {
        
    })
    // top部分效果设置结束
})