<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
</head>
<body>
	<div id="imgs"></div>
	<button onclick="phone()">+</button>
<script type="text/javascript">
	// 点击获取图片信息
	function phone(){
		wx.chooseImage({
			count:3,//默认可以选择9
			sizeType:['original','compressed'],//可以指定是原图还是压缩图，默认二者都有
			sourceType:['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
			success: function (res) {//获取成功
		    		$("<img src='"+res.localIds[0]+"'/>").appendTo('#imgs');
		        var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
		    }
		})
	}
</script>
</body>
</html>
<script type="text/javascript">
	// 使用js-sdk页面必须先注入配置信息
	wx.config({
		debug:false,//关闭调试模式
		appId:'<?php echo $data["appId"]?>',//公众号唯一标识
		timestamp:'<?php echo $data["timestamp"]?>',//生成签名的时间戳
		nonceStr:'<?php echo $data["nonceStr"]?>',//生成签名的随机串
		signature:'<?php echo $data["signature"]?>',//签名
		jsApiList:['onMenuShareTimeline','chooseImage']//需要使用的js接口列表
	})
	// 通过redy接口处理验证
	wx.ready(function(){
		// 获取'分享到朋友圈'按钮点击状态以及自定义分享内容接口
		wx.onMenuShareTimeline({
			title:'这是分享的标题',//分享标题
			link:'http://www.jsdaima.com',//分享链接
			imgUrl:'https://www.baidu.com/img/baidu_jgylogo3.gif',//分享的图片
			success:function(){//确认分享后执行的回调函数

			},
			cancel:function(){//取消分享后执行的回调函数

			}
		})
	})


</script>