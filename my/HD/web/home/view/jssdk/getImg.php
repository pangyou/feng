<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta id="myViewport" name="viewport" content="target-densitydpi=device-dpi,width=750,user-scalable=no"/>
	<meta name="apple-touch-web-app-capable" content="yes"/>
	<meta name="format-detection" content="telephone=no"/>
	<title>快销售</title>
	 <!-- 1,载入jq前端库的ajax --> 
    <!-- 2,在CateController控制器添加json --> 
    <!-- 3,在form 第一行修改 -->
	<script src="./resource/home/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./resource/home/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="./resource/home/hdjs/hdjs.css"/>
	<link rel="stylesheet" type="text/css" href="{{__VIEW__}}/jssdk/jssdk.css"/>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
</head>
<body>
<form onsubmit="return hd_submit(this,'{{u('getImg')}}')">
	<header>
		<div id="top">
			<a class="pre" href=""></a>
			<span>快销售-秀我的产品</span>
			<button type="submit" class="save">保存</button>
		</div>
	</header>
	<main>
		<div class="container">
			<div id="name">
				<input type="text" class="text1" name="proname" value="{{$oldData['proname']}}" placeholder="请填写产品名称*"/>
				<input type="text" placeholder="请输入产品solgan*" name="solgan" value="{{$oldData['solgan']}}"/>
			</div>
			<div id="imgs">
				<a href="javascript:;" onclick="phone()">
					<img class="imgfirst" src="./resource/images/img1.png"/>
				</a>
			</div>
			<div class="des">
				<textarea name="des" value="{{$oldData['des']}}"></textarea>
			</div>
			<div id='com'>
				<h4>填写公司名称</h4>
				<div class="fa1" id="fa1"></div>
				<div class="fa2">
					<input id="addName" type="text" name="tag" value="{{$oldData['tag']}}"/>
					<a href="javascript:;" onclick="play();">贴上公司名称</a>
				</div>
				<p class="bottom">*公司名称与公司名称请用逗号分割</p>
			</div>
			<div id="tel">
				<h4>联系客服</h4>
				<div class="dv1">
					联系姓名<em>*</em><input type="text" name="username" value="{{$oldData['username']}}" placeholder="售卖人姓名" />
					联系电话<em>*</em> <input type="text" class="input2" placeholder="售卖人电话" name="tel" value="{{$oldData['tel']}}" />
				</div>
				<div class="dv2">
					<label for="">公司名称<em>*</em></label> <input type="text" placeholder="例如北京鸭嘴兽君科技有限公司" name="company" value="{{$oldData['company']}}" />
				</div>
			</div>
		</div>
	</main>
	<input type="hidden" name="imgs" id="addimgs" value="{{$oldData['imgs']}}" />
	<input type="hidden" name="openid" value="{{$data['openid']}}"/>
</form>
<script type="text/javascript">
	//上传照片
	function phone(){
		// 拍照选取图片接口
		wx.chooseImage({
			count:9,//默认可以选择9
			sizeType:['original','compressed'],//可以指定是原图还是压缩图，默认二者都有
			sourceType:['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
			success: function (res) {//获取成功
		        var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
		        var str = '';
		        $.each(localIds, function(k,v) {
		        	$("<img class='new' src='"+v+"'/>").appendTo('#imgs');
		        	str += v + ',';
		        	$('#addimgs').val(str);
		        });
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
		appId:'{{$data["appId"]}}',//公众号唯一标识
		timestamp:'{{$data["timestamp"]}}',//生成签名的时间戳
		nonceStr:'{{$data["nonceStr"]}}',//生成签名的随机串
		signature:'{{$data["signature"]}}',//签名
		jsApiList:['onMenuShareTimeline','chooseImage']//需要使用的js接口列表
	})
	//解决texteare  一行显示
	var placeholder = '请填写产品描述：（例如：口袋有才致力于共享经济的理念改善技术服务的效率，打造一个社会化的技术人力库。是目前国内领先的付费制技术服务平台。当你遇到任何技术的问题，都可以找到一个合适的技术达人，交付一点费用，帮你搞定，让技术达人为你解决技术相关难题。）';
	$('textarea').val(placeholder);
	$('textarea').focus(function() {
	    if ($(this).val() == placeholder) {
	        $(this).val('');
	    }
	});
	$('textarea').blur(function() {
	    if ($(this).val() == '') {
	        $(this).val(placeholder);
	    }
	});
	//点击贴上公司标签的效果
	function play(){
		//获取内容
		var word = document.getElementById("addName").value;
		if(word != ''){
		// 发异步
			$.post('{{u("change")}}',{word:word},function(res){
				var str='';
				$.each(res, function(k,v) {
					str += '<span class="son"><i tid='+k+' class="close">x</i>'+v+'</span>';
				});
				$('#fa1').html(str);
				$('#fa1').css({display:'block'});
			},'json');
		}
	};
	//点击消失事件
	$(document).on("click",".close",function(){
		$(this).parents('.son').css({display:'none'});
	});
	//文本框失去焦点时的效果
	$('input[type=text]').blur(function(){
		this.style.color = 'black';
		this.style.border = "none";
	})
	//文本框获取焦点时的效果
	$('input[type=text]').focus(function(){
		this.style.color = '#999';
		this.style.border = "1px solid #ccc";
	})
	//信息框失去焦点时的效果
	$('textarea').blur(function(){
		this.style.color = 'black';
		this.style.border = "none";
		$('.des-cont').css({display:'block'});
	})
	//信息框获取焦点时的效果
	$('textarea').focus(function(){
		this.style.color = '#999';
		this.style.border = "1px solid #ccc";
		$('.des-cont').css({display:'none'});
	})
//	$("#form").submit(function () {
//		return false;
//	});
	//点击保存,异步保存
//	function save(){
//		//发送的数据-获取ok
//		var data = $("#form").serializeArray();
//		//发异步
//		$.post('{{u("save")}}',{data:data},function(res){
//			console.log(res);
//			//失败提示
////			if(!res) message($this->model->getError(),'back','error');
////			//成功提示,并且刷新下页面
////			message('保存成功','refresh','success');
//		},'json');
//	}
</script>