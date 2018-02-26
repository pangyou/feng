<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="/my/tpzol/Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="/my/tpzol/Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link rel="shortcut icon" href="/my/tpzol/Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
      <!--载入百度编辑器所需js文件-->
    	<script type="text/javascript" charset="utf-8" src="/my/tpzol/Public/Admin/ueditor1_4_3/ueditor.config.js"></script>
		<script type="text/javascript" charset="utf-8" src="/my/tpzol/Public/Admin/ueditor1_4_3/ueditor.all.min.js"> </script>
		<script type="text/javascript" charset="utf-8" src="/my/tpzol/Public/Admin/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
		<!-- 上传插件需要载入的文件 -->
	    <script type="text/javascript" src="/my/tpzol/Public/jquery-1.8.2.min.js"></script>
	    <script type="text/javascript" src="/my/tpzol/Public/uploadify/jquery.uploadify.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="/my/tpzol/Public/uploadify/uploadify.css">
	    <style type="text/css">
			.uploadify-button{
				font-size: 18px;
			}
			ul{
				height: 104px;
			}
			ul li {
				float: left;
				margin-right: 10px;
				list-style: none;
			}
			#a1,#a2,#a3,#a4,#a5,#a6{
				font-size: 18px;
				font-weight: bold;
				color: white;
				background: #004CCC;
			}
			#a1son,#a2son,#a3son,#a4son,#a5son,#a6son{
				margin-top: 10px;
			}
			#a1son img{
				height: 120px;
				width: 120px;
			}
			#a2son img{
				height: 120px;
				width: 120px;
			}
			#a3son img{
				height: 120px;
			}
			.box select{
				width: 220px;
				height: 30px;
			}
			.dv{
				height: 300px;
				overflow: auto;
			}
	    </style>
		<script type="text/javascript">
        $(function() {
        	// 上传插件1
            $('#f').uploadify({
                'method' : 'post',//上传方式
                'fileTypeDesc' : '上传文件',//上传描述
                'fileTypeExts' : '*.jpg;*.png;*gif',
                'swf'      : "/my/tpzol/Public/uploadify/uploadify.swf",
                'uploader' : '<?php echo U('uploads');?>',//指定服务器上传的方法
                'buttonText':'选择文件',
                'fileSizeLimit' : '2000KB',
                'uploadLimit' : 10,//上传文件数
                'width':155,
                'height':35,
                'successTimeout':10,//等待服务器响应时间
                'removeTimeout' : 0.2,//成功显示时间
                'onUploadSuccess' : function(file, data, response) {
                	// console.log(data);
                    //转为json
                    data=$.parseJSON(data);
                    //获得图片地址
                    var imageUrl = data.url;
                    var li="<li class='img_box'>";
                    li += "<img src='"+imageUrl+"'/>";
                    li += "<input type='hidden' name='pic_list[]' value='"+data.path+"'/><a class='close_img' href='javascript:;'>x</a>";
                    li += "</li>";
                    $("#uploadList ul").prepend(li);
                }
            });
			// 上传插件2 商品图册
			$('#f2').uploadify({
                'method' : 'post',//上传方式
                'fileTypeDesc' : '上传文件',//上传描述
                'fileTypeExts' : '*.jpg;*.png;*gif',
                'swf'      : "/my/tpzol/Public/uploadify/uploadify.swf",
                'uploader' : '<?php echo U('uploads');?>',//指定服务器上传的方法
                'buttonText':'选择文件',
                'fileSizeLimit' : '2000KB',
                'uploadLimit' : 10,//上传文件数
                'width':155,
                'height':35,
                'successTimeout':10,//等待服务器响应时间
                'removeTimeout' : 0.2,//成功显示时间
                'onUploadSuccess' : function(file, data, response) {
                    //转为json
                    data=$.parseJSON(data);
                    //获得图片地址
                    var imageUrl = data.url;
                    // alert(imageUrl);
                    var li="<li class='img_box'>";
                    li += "<img src='"+imageUrl+"'/>";
                    li += "<input type='hidden' name='img[]' value='"+data.path+"'/><a class='close_img' href='javascript:;'>x</a>";
                    li += "</li>";
                    $("#uploadList2 ul").prepend(li);
                }
            });
			// 点击显示,再点击隐藏
			var c = 1;
		    $("#a1").click(function(){
		    	// 判断进行显隐切换
		    	if(c==0){
		           $("#a1son").fadeIn("fast");
		           c=1;
		    	}else{
		           $("#a1son").fadeOut("fast");
		   		   c=0;
		    	}
		    });
		    var a=1;
		    $("#a2").click(function(){
		    	// 判断进行显隐切换
		    	if(a==0){
		           $("#a2son").fadeIn("fast");
		           a=1;
		    	}else{
		           $("#a2son").fadeOut("fast");
		   		   a=0;
		    	}
		    });
		    var b=1;
		    $("#a3").click(function(){
		    	// 判断进行显隐切换
		    	if(b==0){
		           $("#a3son").fadeIn("fast");
		           b=1;
		    	}else{
		           $("#a3son").fadeOut("fast");
		   		   b=0;
		    	}
		    });
		    var d=1;
		    $("#a4").click(function(){
		    	// 判断进行显隐切换
		    	if(d==0){
		           $("#a4son").fadeIn("fast");
		           d=1;
		    	}else{
		           $("#a4son").fadeOut("fast");
		   		   d=0;
		    	}
		    });
		    var e=1;
		    $("#a5").click(function(){
		    	// 判断进行显隐切换
		    	if(e==0){
		           $("#a5son").fadeIn("fast");
		           e=1;
		    	}else{
		           $("#a5son").fadeOut("fast");
		   		   e=0;
		    	}
		    });
		    var f=1;
		    $("#a6").click(function(){
		    	// 判断进行显隐切换
		    	if(f==0){
		           $("#a6son").fadeIn("fast");
		           f=1;
		    	}else{
		           $("#a6son").fadeOut("fast");
		   		   f=0;
		    	}
		    });

		    // 表单事件(商品属性)
		    $("select[name='category_cid']").change(function() {
		    	// 获取被选中的tid
		    	var tid =$("#cate option:selected").attr('tid');
		    	if(tid == 0)alert('顶级分类不能添加商品');
		    	$.ajax({
		    		// 请求地址
		    		url: "<?php echo U('check');?>",
		    		// 请求方式
		    		type: 'post',
		    		// 发送数据
		    		data:{t:tid},
		    		dataType:"json",
		    		// 得到服务器的响应
					//phpData 就是服务器响应的数据
		    		success:function(phpData){
		    			console.log(phpData);
		    			// 遍历json数据
		    			var htmls = '';
		    			var htmlg = '';
		    			$.each(phpData,function(k,v) {
		    				if(v.class=="属性"){
		    					var str = '<div class="box"><table class="table table-hover"><tbody><tr><td>'+v.taname+'</td><td><select name="attr['+v.taid+']" ><option value="0">--请选择--</option>';
			    				$.each(v.tavalue,function(kk,vv){
			    					str += '<option value="'+vv+'">'+vv+'</option>';
			    				})
			    				str += '</select></td></tr></tbody></table></div>'; 
			    				htmls += str;
		    				}else{
			    				var strg = '<div class="box"><table class="table table-hover t2"><tr class="tr2"><td>'+v.taname+'</td><td><select name="spec['+v.taid+'][gavalue][]" ><option value="0">--请选择--</option>';
			    				$.each(v.tavalue,function(kk,vv){
			    					strg += '<option value="'+vv+'">'+vv+'</option>';
			    				})
			    				strg += '</select></td><td>附加价格</td><td><input type="text" name="spec['+v.taid+'][added][]" ></td><td><a class="btn btn-sm btn-primary addl" href="javascript:;">添加规格</a></td></tr></table></div>'; 
			    				htmlg += strg;
			    			}

			    		})
    					$('#a5son').html(htmlg);
    					$('#a4son').html(htmls);
    				}
		    	})	
	
		   })
			// 添加规格
			$('.addl').live('click', function() {
				var r = $(this).parents('.tr2').clone();
				r.find('a').html('删除规格').attr('class','btn btn-sm btn-primary dell');
				$(this).parents('.t2').append(r);
			});
			// 删除规格
			$('.dell').live('click', function() {
				$(this).parents('.tr2').remove();
			});
			// 控制商品图册,控制列表图
			$('.close_img').live('click', function() {
				$(this).parents('.img_box').html('');
			});
        })
    </script>
	</head>
	<body>
		<form method="post" action="" enctype="multipart/form-data">
		<div class="alert alert-success">修改商品</div>
		<div class="alert alert-success">基本信息</div>
		<div class="form-group">
			<label for="exampleInputEmail1">所属分类</label>
			<select name="category_cid" id="cate" class="form-control">
				<option value="0">请选择</option>
				<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v['cid']); ?>" tid='<?php echo ($v['type_tid']); ?>'  <?php if($oldData['category_cid'] == $v['cid']): ?>selected<?php endif; ?> ><?php echo ($v['_name']); ?></option><?php endforeach; endif; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">所属品牌</label>
			<select name="brand_bid" class="form-control">
				<option value="0">请选择</option>
				<?php if(is_array($brand)): foreach($brand as $key=>$v): ?><option value="<?php echo ($v['bid']); ?>" <?php if($oldData['brand_bid']==$v['bid']): ?>selected<?php endif; ?>><?php echo ($v['bname']); ?></option><?php endforeach; endif; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">商品名称</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入商品名称"  name="gname" value="<?php echo ($oldData['gname']); ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">市场价</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入商品市场价" name="mprice" value="<?php echo ($oldData['mprice']); ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">商城价</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入商品商城价"  name="sprice" value="<?php echo ($oldData['sprice']); ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">库存</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入商品库存"  name="total" value="<?php echo ($oldData['total']); ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">单位</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入商品单位,如 件,个,双"  name="unit" value="<?php echo ($oldData['unit']); ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">点击次数</label>
			<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入商品点击次数"  name="click" value="<?php echo ($oldData['click']); ?>">
		</div>
		
		<div class="alert alert-success">
			<a id='a4' class="btn btn-sm btn-warning" href="javascript:;">商品属性</a>
			<div id="a4son">
				<?php if($AttrData): ?><div class="box">
					<table class="table table-hover">
						<tbody>
						<?php if(is_array($AttrData)): foreach($AttrData as $key=>$v): ?><tr>
							<td><?php echo ($v['taname']); ?></td>
							<td>
								<select name="attr[<?php echo ($v['taid']); ?>]" id="">
									<option value="0">--请选择--</option>
									<?php if(is_array($v['tavalue'])): foreach($v['tavalue'] as $key=>$va): ?><option value="<?php echo ($va); ?>" <?php if($v['gavalue'] == $va): ?>selected<?php endif; ?> ><?php echo ($va); ?></option><?php endforeach; endif; ?>
								</select>
							</td>
						</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div><?php endif; ?>
			</div>
		</div>	
		<div class="alert alert-success">
			<a id="a5" class="btn btn-sm btn-warning" href="javascript:;">商品规格</a>
			<div id="a5son">
			<!-- 页面调用 -->
				<?php if(AttrData2): ?><div class="box">
					<table class="table table-hover t2">
						<tbody>
						<?php if(is_array($AttrData2)): foreach($AttrData2 as $key=>$v): ?><tr class="tr2">
							<td><?php echo ($v['taname']); ?></td>
							<td>
								<select name="spec[<?php echo ($v['taid']); ?>][gavalue][]">
									<option value="0">--请选择--</option>
									<?php if(is_array($v['tavalue'])): foreach($v['tavalue'] as $key=>$va): ?><option value="<?php echo ($va); ?>" <?php if($v['gavalue'] == $va): ?>selected<?php endif; ?> ><?php echo ($va); ?></option><?php endforeach; endif; ?>
								</select>
							</td>
							<td>附加价格</td>
							<td><input type="text" name="spec[<?php echo ($v['taid']); ?>][added][]" id="" value="<?php echo ($v['added']); ?>"></td>
							<td>
							<a class="btn btn-sm btn-primary addl" href="javascript:;">添加规格</a>
							</td>
						</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div><?php endif; ?>
			</div>
		</div>
		<div class="alert alert-success">
			<a id="a1" class="btn btn-sm btn-warning" href="javascript:;">列表图</a>
			<div id="a1son">
				<!-- file表单 -->
			    <input id="f" type="file" multiple="true">
			    <span>类型: *.jpg,*.png,*gif 大小: 2000KB 数量: 10</span>
				<div id="uploadList">
			        <ul>
			        	<!-- 如果列表图有图片 -->
			        	<?php if($oldData['pic_list']): $img = explode(',', $oldData['pic_list']); ?>
						<?php if(is_array($img)): foreach($img as $key=>$v): ?><li class="img_box">
		        			<img src="<?php echo ($v); ?>" alt=""> 
		        			<input type="hidden" value="<?php echo ($v); ?>" name="pic_list[]">
		        			<a class="close_img" href="javascript:;">x</a>
		        		</li><?php endforeach; endif; endif; ?>
			        </ul>
			    </div>
			</div>
		</div>
		<div class="alert alert-success">
			<a id="a2" class="btn btn-sm btn-warning" href="javascript:;">商品图册</a>
			<div id="a2son">
				<!-- file表单 -->
			    <input id="f2" type="file" multiple="true">
			    <span>类型: *.jpg,*.png,*gif 大小: 2000KB 数量: 10</span>
				<div id="uploadList2">
			        <ul>
						<!-- 如果商品图册有图片 -->
			        	<?php if($oldGoodsDetail['img']): $imgt = explode(',', $oldGoodsDetail['img']); ?>
						<?php if(is_array($imgt)): foreach($imgt as $key=>$v): ?><li class="img_box">
		        			<img src="<?php echo ($v); ?>" alt=""> 
		        			<input type="hidden" value="<?php echo ($v); ?>" name="img[]">
		        			<a class="close_img" href="javascript:;">x</a>
		        		</li><?php endforeach; endif; endif; ?>
			        </ul>
			    </div>
			</div>
		</div>
		<div class="alert alert-success dv">
			<a id="a3" class="btn btn-sm btn-warning" href="javascript:;">商品详细</a>
			<div id="a3son">
				<!-- 调用百度编辑器   需要经过编码显示 -->
				<script id="editor" type="text/plain" style="width:100%;height:500px;" name="detail" value=""><?php echo html_entity_decode($oldGoodsDetail['detail']);?></script>
				<script>
			        UE.getEditor('editor', {
					    initialFrameWidth:1000,  //初始化编辑器宽度,默认800
					    initialFrameHeight:80
					});
			    </script>
			</div>
		</div>
		
		<div class="alert alert-success dv">
			<a id='a6' class="btn btn-sm btn-warning" href="javascript:;">售后服务</a>
			<div id="a6son">
				<!-- 调用百度编辑器    需要经过编码显示 -->
				<script id="editor2" type="text/plain" style="width:100%;height:500px;" name="service"><?php echo html_entity_decode($oldGoodsDetail['service']);?></script>
				<script>
			        UE.getEditor('editor2', {
					    initialFrameWidth:1000,  //初始化编辑器宽度,默认800
					    initialFrameHeight:80
					});
			    </script>
			</div>
		</div>
		<input type="hidden" name="gid" value="<?php echo ($_GET['gid']); ?>">
		<?php  $gid = I('get.gid'); $gsidD =D('GoodsDetail')->where("goods_gid={$gid}")->find(); $gsid = $gsidD['gsid']; ?>
		<input type="hidden" name="gsid" value="<?php echo ($gsid); ?>">
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>