<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>{{$name}}-苏宁易购</title>
<link rel="stylesheet" href="./Public/Home/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="./Public/Home/css/index1.css" />
<link rel="stylesheet" href="./Public/Home/css/list.css" />	
<link rel="stylesheet" href="./Public/Home/css/content.css" />
</head>
<body>
	{{include file='../Common/head2'}}
	<!--内容设置开始-->
	 	<!--路径-->
	<div class="wrapper">
		<div class="dvt">
			<a href="" class="category1">手机/数码/配件</a>
			<span class="sep">></span>
			<div class="dv1">
			<a href="">手机通讯</a>
			<i></i>
			</div>
			<span class="sep">></span>
			<div class="dv1">
			<a href="">手机通讯</a>
			<i></i>
			</div>
			<span class="sep">></span>
			<div class="dv1">
			<a href="">华为(HUAWEI)</a>
			<i></i>
			</div>
			<span class="sep">></span>
			<span>华为荣耀畅玩4X（Che1-CL20...</span>
		</div>
	</div>
	<!--具体图片文字介绍-->
	<!--wrapper  是  包装  的意思--> 
	<div class="wrapper proinfo">
		<div class="proinfo_left">
			<!--放大镜设置-->
			<div class="img">	
				<img id="imgleft" src="{{pathinfo($data['img'][0],PATHINFO_DIRNAME) . '/mid' .pathinfo($data['img'][0],PATHINFO_BASENAME)}}" alt="" />
				<div class="box" id='box'></div>
    			<div class="cover" id="cover"></div>
			</div>	
			<div id="imgright">
				<img id="imgright1" src="{{$data['img'][0]}}" alt="" />
			</div>
			<!--放大镜设置结束-->
			<div class="img_thumb">
				<ul>
					{{foreach from="$data['imgs']" value='$v'}}
					<li>
						<a href=""><img src="{{pathinfo($v['small'],PATHINFO_DIRNAME) . '/' .pathinfo($v['small'],PATHINFO_BASENAME)}}" mid="{{$v['mid']}}" big="{{$v['big']}}" alt="" /></a>
					</li>
					{{endforeach}}
				</ul>
			</div>
			<div class="share">
				<label>商品编码</label>
				<em>142929290</em>
				<div class="favorite">
					<a href="">
						<i></i>收藏
					</a>
				</div>
				<div class="fenx">
					<a href="">
						<i></i>分享
					</a>
				</div>
			</div>
		</div>
		<div class="proinfo_title">
			<h1> 
				<span>自营</span>{{$data['gname']}}
			</h1>
			<h2>商场同款，新品钜惠，7折封顶</h2>
			
		</div>
		<div class="proinfo_main">
			<div class="focus">
				<div class="son son1">
					<span>参考价</span>
					<del><i>¥</i>{{$data['mprice']}}</del>
				</div>
				<div class="son son2">
					<span>促销价</span>
					<div class="dahao">
						<i>¥</i>
						<span id='spanprice'>{{$sprice}}.</span>
						
						<em>00</em>
						<span class="sp2">大聚惠</span>
					</div>
				</div>
				<div class="son3">
					<div>累计评价</div>
					<a href="">{{$data['click']}}</a>
					<i>></i>
				</div>
			</div>
			<dl class="dv dv1">
				<dt>正在促销</dt>
				<dd>
					<label>云  钻</label>
					<p>
						购买可返134云钻 
						<a href="">看看能换啥</a>
					</p>
					<label>赠品</label>
					<p class="p2">
						<img src="./Public/Home/images/zp.jpg" alt="" />
						<a href="">三星(SAMSUNG) MicroSD手机...</a>
						<em>x1</em>
						<span>¥44.90</span>
					</p>
					<p class="p2 p3">
						<img src="./Public/Home/images/zp.jpg" alt="" />
						<a href="">荣耀7 TPU保护壳（透明）</a>
						<em>x1</em>
						<span>¥29.90</span>
					</p>
				</dd>
			</dl>
			<dl class="dv dv2">
				<dt><span>送至</span></dt>
				<dd>
					<!--城市联动-->
					<div class="city">
						<select name="" id="area1"></select>
					</div>
					<div class="city_right">
						<strong>现货</strong>
						<span>20:00前完成下单，预计明天（5月20日）送达</span>
					</div>
				</dd>
			</dl>
			<dl class="dv dv3">
				<dt>门店服务</dt>
				<dd>
					<p>
						<i></i>
						<a href="">急速达</a>
						<span>· 下单后2小时内送达，点击查看您所在地址是否支持</span>
					</p>
				</dd>
			</dl>
			<dl class="dv dv4">
				<dt><span>服务</span></dt>
				<dd>
					<p>
						<span>由"苏宁"销售和发货，并享受售后服务</span>
    					<a href=""><img src="./Public/Home/images/online.gif" alt="" /></a>
					</p>
				</dd>
			</dl>
			<form action="{{U('cartAdd',array('gid'=>$_GET['gid']))}}" method="post">
			{{foreach from="$spec" key='$k' value='$v'}}
			<dl class="dv dv5">
				<dt>{{$v['name']}}</dt>
				<dd>
					{{foreach from="$v['value']" key="$kk" value='$va'}}
					<a class="adda1"  gaid="{{$kk}}" href="javascript:;">
						<i></i>
						{{$va}}
					</a>
					{{endforeach}}
				</dd>
			</dl>
			{{endforeach}}
			<dl class="dv dv8">
				<dt>购买数量</dt>
				<dd>
					<a class="jian" href="javascript:;">-</a>
					<input type="text" name="inputNum" id="inputNum" value="1" id="" />
					<a class="jia" href="javascript:;">+</a>
					<span>正在促销，每人限购<em>99</em>件</span>
				</dd>
			</dl>
			<input type="hidden" name="gid" value="{{$_GET['gid']}}">
			<input type="hidden" name="combine" id="combine" >
			<input type="hidden" name="sprice" value="" id="sprice">
			<dl class="dv dv9">
				<dt>购买延保</dt>
				<dd>
					<a class="yiwai" href="javascript:;"><i class='i1'></i>延长保修1年 ¥99.00</a>
					<a class="yiwai" href="javascript:;"><i class='i2'></i>意外保障2年 ¥125.00</a>
					<a class="yiwai" href="javascript:;"><i class='i3'></i>意外保障3年 ¥175.00</a>
					<a class="xiangqing" href="">详情></a>
				</dd>
			</dl>
			<dl class="dv dv10">
				<dt>倒计时</dt>
				<!--三天后的倒计时-->		
				<dd id="timefather">
					<em> </em>
					<span>天</span>
					<em></em>
					<span>时</span>
					<em></em>
					<span>分</span>
					<em></em>
					<span>秒</span>
				</dd>
			</dl>
			<dl class='dv dv11'>
				<dt>您已选择</dt>
				<dd>
					<p id="namejson" ></p>
					<p class="goumai">
						<a class="son1" href="javascript:;">立即购买</a>
						<input class="submitCart" type="submit" value="加入购物车">
						<a class="son3" href="">
							<i class="i1"></i>
							客户端购买
							<i class="i2"></i>
						</a>
					</p>
				</dd>
			</dl>
			</form>
			<dl class="dv dv12">
				<dt>特色服务</dt>
				<dd>
					<p class="p1">
						<a href="">
							<i class='i1'></i>
							<em>政府采购</em>
						</a>
						<a href="">
							<i class='i2'></i>
							<em>7天无理由退货</em>
						</a>
						<a href="">
							<i class='i3'></i>
							<em>分期付款</em>
						</a>
						<a href="">
							<i class='i4'></i>
							<em>免运费</em>
						</a>
					</p>
					<p><a href="">请告诉我们更低的价格</a></p>
				</dd>
			</dl>
			<div class="proinfo_right">
				<div class="title">
					<h3><span>看了又看</span></h3>
				</div>
				<ul>
				<!-- 调取数据 $look -->
					{{foreach from='$look' value='$v'}}
					<li>
						<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">
							<img src="{{$v['pic_list']}}" alt="" />
						</a>
						<p class="price">
							<span>
								<i>¥</i>
								<em>{{$v['sprice']}}</em>
							</span>
							<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a>
						</p>
					</li>
					{{endforeach}}
					<div class="shangxia">
						<a class="shang" href=""></a>
						<a class="xia" href=""></a>
					</div>
				</ul>
			</div>
		</div>
	</div>
	<!--推荐搭配设置开始-->
	<div class="wrapper tabarea">
		<div class="titl">
			<li><a href="">推荐搭配</a></li>
		</div>
		<div class="cont">
			<div class="cont_left">
				<a href=""><img src="./Public/Home/images/cona4.jpg"/></a>
				<p class="title">
					<a href="">华为荣耀畅玩4X（Che1-CL20）晨曦金 全网通4G手机 双卡双待</a>
				</p>
				<p class="price">
					<em>¥</em>899.00
				</p>
				<i></i>
			</div>
			<div class="cont_nav">
				<a href="" class="current">精选搭配</a><span>|</span>
				<a href="">移动电源</a><span>|</span>
				<a href="">移动电源</a><span>|</span>
				<a href="">移动电源</a><span>|</span>
				<a href="">移动电源</a><span>|</span>
				<a href="">移动电源</a><span>|</span>
				<a href="">移动电源</a><span>|</span>
				<a href="">移动电源</a><span>|</span>
				<a href="">移动电源</a><span>|</span>
				<a href="">手机配件套装</a>
			</div>
			<!--此处写轮播图-->
			<div class="imgscroll">
				<a href="" class="btn-dir le">
					<i></i>
				</a>
				<a href="" class="btn-dir ri">
					<i></i>
				</a>
				<div class="all">
					<ul class="ul">
						<li class="li li1">
							<a href="">
								<img src="./Public/Home/images/cona0.jpg" alt="" />
							</a>
							<p class="title"><a href="">美逸（MEIYI） 线控自拍杆/自拍神器/迷你自拍器 MY-S1mini太空蓝</a></p>
							<p class="price">
								<span>套餐价：</span>
								<em>¥</em>19.00
							</p>
							<input type="checkbox" name="" class="check" id="" />
							<i class="i2"></i>
						</li>
						<li class="li">
							<a href="">
								<img src="./Public/Home/images/cona01.jpg" alt="" />
							</a>
							<p class="title"><a href="">金士顿(Kingston) TF存储卡 8G(CLASS4) 手机内存卡/存储卡</a></p>
							<p class="price">
								<span>套餐价：</span>
								<em>¥</em>16.90
							</p>
							<input type="checkbox" name="" class="check" id="" />
							<i class="i2"></i>
						</li>
						<li class="li">
							<a href="">
								<img src="./Public/Home/images/cona02.jpg" alt="" />
							</a>
							<p class="title"><a href="">aigo 爱国者 L131 双USB输出 13000毫安 数字显示 强光照明 通用移动电源/充电宝</a></p>
							<p class="price">
								<span>套餐价：</span>
								<em>¥</em>89.00
							</p>
							<input type="checkbox" name="" class="check" id="" />
							<i class="i2"></i>
						</li>
						<li class="li">
							<a href="">
								<img src="./Public/Home/images/cona03.jpg" alt="" />
							</a>
							<p class="title"><a href="">川宇 MicroSDXC 读卡器</a></p>
							<p class="price">
								<span>套餐价：</span>
								<em>¥</em>9.90
							</p>
							<input type="checkbox" name="" class="check" id="" />
						</li>
					</ul>
				</div>
			</div>
			<!--统计数量,加入购物车-->
			<div class="count">
				<p class="num">
					已搭配 <em>0</em>件
				</p>
				<div class="money">
					<span>套餐价</span>
					<p class="price">
						<em>¥</em>899.00
					</p>
				</div>
				<div class="handle">
					<a class="cart" href=""></a>
					<a href="" class="reset">清楚全部</a>
				</div>
			</div>
		</div>
	</div>
	<!--推荐搭配设置结束-->
	<!--商品详情设置开始-->
	<div id="mt15">
		<div class="left">
			<div class="son1">
				<div class="head">
					<div class="bg"></div>
					<div class="dianp">店铺装修中</div>
				</div>
				<div class="shangjia">
					<p>商家: <strong>苏宁自营</strong></p>
					<p>联系: <a href=""><img src="./Public/Home/images/online.gif" alt="" /></a></p>
				</div>
				<div class="last">
					<ul>
						<li>
							<p>商品</p>
							<p>
								<em>4.86</em>
								<i></i>
							</p>
						</li><li>
							<p>物流</p>
							<p>
								<em>4.86</em>
								<i></i>
							</p>
						</li>
						<li>
							<p>商品</p>
							<p>
								<em>4.86</em>
								<i></i>
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="son son2">
				<div class="head">看了最终买</div>
				<ul class="vab">
				<!-- 调取看了最终买数据 -->
					{{foreach from='$buy' value='$v'}}
					<li>
						<a href="{{U('Content/index',array('gid'=>$v['gid']))}}"><img src="{{$v['pic_list']}}"/></a>
						<p class="title">
							<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a>
						</p>
						<p class="price">
							<span><i>¥ </i>{{$v['sprice']}}</span>
						</p>
					</li>
					{{endforeach}}
				</ul>
			</div>
			<div class="son son3">
				<div class="head">手机排行榜</div>
				<ul class="hot-sort">
					<li class="current"><a href="">同位价</a></li>
					<li><a href="">同品牌</a></li>
					<li><a href="">同类别</a></li>
				</ul>
				<ul class="top-list">
					{{foreach from='$top' key='$k' value='$v'}}
					<li>
						<a href="{{U('Content/index',array('gid'=>$v['gid']))}}"><img src="{{$v['pic_list']}}"/></a>
						<p class="title">
							<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a>
						</p>
						<p class="price">
							<i>¥</i>{{$v['sprice']}}
						</p>
						<span {{if value="in_array($k,array(3,4,5))"}}class='sp2'{{endif}} >{{$k+1}}</span>
					</li>
					{{endforeach}}
				</ul>
			</div>
			<div class="son son4">
				<div class="head">相关分类</div>
				<ul class="last">
					{{foreach from='$related' key='$k' value='$v'}}
					{{if value="$k != 84 and $k !=86"}}
					<li><a href="{{U('GoodsList/index',array('cid'=>$k))}}">{{$v}}</a></li>
					{{endif}}
					{{endforeach}}
				</ul>
			</div>
			<div class="son son4">
				<div class="head">相关品牌</div>
				<ul class="last">
					{{foreach from='$brand' key='$k' value='$v'}}
					<li><a href="{{U('GoodsList/bidshow',array('bid'=>$k))}}">{{$v}}</a></li>
					{{endforeach}}
				</ul>
			</div>
		</div>
		<div class="right">
			<ul class="ul_top">
				<li class="current"><a href="">商品详情</a></li>
				<li><a href="">包装及参数</a></li>
				<li><a href="">评价(0)</a></li>
				<li><a href="">咨询(0)</a></li>
				<li><a href="">售后保障</a></li>
				<div class="line1"></div>
				<div class="line2"></div>
			</ul>
			<div class="sonfa">
				<div class="son1">
					<div class="head">
						<h4>核心参数</h4>
						<span><a href="">更多参数</a></span>
					</div>
					<ul class="cnt">
						<li>型号：Che1-CL20</li>
						<li>型号：Che1-CL20</li>
						<li>型号：Che1-CL20</li>
						<li>型号：Che1-CL20</li>
						<li>型号：Che1-CL20</li>
						<li>型号：Che1-CL20</li>
						<li>型号：Che1-CL20</li>
					</ul>
				</div>
			</div>
			
			<div class="product">
				<p><img src="./Public/Home/images/conn.jpg" alt="" /></p>
				<p><img src="./Public/Home/images/cona7.jpg" alt="" /></p>
				<p>卡1：移动4G/3G/2G联通4G/3G/2G电信4G/3G/2G；卡2：移动4G/3G/2G联通4G/3G/2G（备注：1.卡1和卡2同时只能设定其中一个卡为4G/3G，另一个为2G（GSM）2.卡1插入电信卡时，卡2只能为2G（GSM），且无法使用数据业务）</p>
				<p>
					<img src="./Public/Home/images/cona8.jpg" alt="" />
					<img src="./Public/Home/images/cona9.jpg" alt="" />
					<img src="./Public/Home/images/cona11.jpg" alt="" />
					<img src="./Public/Home/images/cona12.jpg" alt="" />
					<img src="./Public/Home/images/cona13.jpg" alt="" />
					<img src="./Public/Home/images/cona14.jpg" alt="" />
					<img src="./Public/Home/images/cona15.jpg" alt="" />
				</p>
			</div>
			<div class="service">
				<div class="head">
					<h3>售后保障</h3>
				</div>
				<div class="main">
					<div class="title">
						<h4>苏宁承诺</h4>
					</div>
					<ul class="spromise">
						<li>
							<img src="./Public/Home/images/cona16.jpg" alt="" />
							<p>正品保障</p>
						</li>
						<li>
							<img src="./Public/Home/images/cona16.jpg" alt="" />
							<p>正品保障</p>
						</li>
						<li>
							<img src="./Public/Home/images/cona16.jpg" alt="" />
							<p>正品保障</p>
						</li>
						<li>
							<img src="./Public/Home/images/cona16.jpg" alt="" />
							<p>正品保障</p>
						</li>
					</ul>
					<div class="after_service">
						<div class="title">
							<h4>售后服务</h4>
						</div>
						<div class="nav">
							<p>售后内容： 本产品全国联保，享受三包服务，质保期为：一年质保。<br />
如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！<br />
售后服务电话：400-830-8300 <br />
服务承诺： 苏宁易购向您保证销售商品均为正品行货并开具正规发票。凭苏宁易购发票，所有商品均可以享受生产厂家的全国联保服务或指定服务商联保服务，苏宁易购将严格按照国家三包政策以及本《退换货政策》，对所售商品履行换货和退货的义务。<br />

苏宁易购向您保证所售商品均为正品行货，与您亲临商场选购的商品享受相同的质量保证。本站为您提供具有竞争力的商品价格和服务保障，请放心购买！<br />

注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p>
						</div>
						<div class="title">
							<h4>退换货流程</h4>
							<span><a href="">退货细则及服务</a></span>
						</div>
						<div class="return">
							<img src="./Public/Home/images/return.jpg" alt="" />
						</div>
						<div class="title">
							<h4>温馨提示</h4>
						</div>
						<div class="declare">
							<p>1、网站为您提供的送货、安装、维修等服务可能需收取一定的服务费和远程费；<br />

2、服务中可能涉及的材料费请以服务工程师出示的报价单为准；<br />

3、亲爱的顾客，苏宁承诺所售产品均为正品，如您购物环节遇到任何问题，请第一时间联系客服人员，我们会尽心为您处理问题。<br />

4、请您收货后与快递人员一起开箱验货，确保产品完好，生产日期认可。如有问题请当场拒收。</p>
						</div>
						<div class="title">
							<h4>特别声明</h4>
						</div>
						<div class="declare">
							<p>本站商品信息均来自苏宁自营商品，其真实性、准确性和合法性由信息拥有者（厂商）负责。本站不提供任何保证，并不承担任何法律责任。因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，我司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。网站商品的功能参数仅供参考，请以实物为准，我司只能确保网站经营商品均为原厂正品行货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，敬请谅解！</p>
						</div>
					</div>
				</div>
			</div>
			<!--云钻设置开始-->
			<div class="good">
				<ul class="ul_son1">
					<li class="li1">
						<p class="p1">99 <span>%</span></p>
						<p class="p2">好评率</p>
						<p class="p3">大家印象</p>
					</li>
					<li class="li2">
						<img src="./Public/Home/images/cav1.png" alt="" />
						<div class="twol">
							<p class="percent">99%</p>
						</div>
						<div class="twor">
							<p class="caption">好评</p>
							<p class="count">(1230)人</p>
						</div>	
					</li>
					<li class="li2">
						<img src="./Public/Home/images/cav2.png" alt="" />
						<div class="twol">
							<p class="percent">99%</p>
						</div>
						<div class="twor">
							<p class="caption">中评</p>
							<p class="count">(120)人</p>
						</div>	
					</li>
					<li class="li2">
						<img src="./Public/Home/images/cav2.png" alt="" />
						<div class="twol">
							<p class="percent">99%</p>
						</div>
						<div class="twor">
							<p class="caption">差评</p>
							<p class="count">(120)人</p>
						</div>	
					</li>
					<li class="li3">
						<p class="info1">前10名发表评价可获
						<span>双倍云钻</span>!</p>
						<p class="info2"><a href=""></a></p>
						<p class="info3">
							<span>100云钻=1元</span>
							<a href="">云钻规则</a>
						</p>
					</li>
				</ul>
				<ul class="ul_son2">
					<li>
						<img src="./Public/Home/images/ul_son2.png" alt="" />
						<div class="comment">
							<p>
								<span class="num">88%</span>
								<span class="little">用户表示</span>
							</p>
							<p>拍照效果很好</p>
						</div>
					</li>
					<li>
						<img src="./Public/Home/images/ul_son2.png" alt="" />
						<div class="comment">
							<p>
								<span class="num">88%</span>
								<span class="little">用户表示</span>
							</p>
							<p>拍照效果很好</p>
						</div>
					</li>
					<li>
						<img src="./Public/Home/images/ul_son2.png" alt="" />
						<div class="comment">
							<p>
								<span class="num">88%</span>
								<span class="little">用户表示</span>
							</p>
							<p>拍照效果很好</p>
						</div>
					</li>
				</ul>
			</div>
			<!--全部评价-->
			<div class="all_comment">
				<ul class="ul_son3">
					<li class="now"><a href="">
							<em>全部</em><span>(12081)</span>
						</a>
					</li>
					<li><a href="">
							<em>好评</em><span>(272)</span>
						</a>
					</li>
					<li><a href="">
							<em>好评</em><span>(272)</span>
						</a>
					</li>
					<li><a href="">
							<em>好评</em><span>(272)</span>
						</a>
					</li>
					<li><a href="">
							<em>好评</em><span>(272)</span>
						</a>
					</li>
					<li><a href="">
							<em>好评</em><span>(272)</span>
						</a>
					</li>
					<li><a href="">
							<em>好评</em><span>(272)</span>
						</a>
					</li>
					<li><a href="">
							<em>好评</em><span>(272)</span>
						</a>
					</li>
				</ul>
				<div class="tips">
					<span>所有图片</span>
				</div>
				<!--轮播图,需要重写-->
				<div class="imgscroll">
					<a href=""><img src="./Public/Home/images/图像1.png" alt="" /></a>
				</div>
				<div class="filter">
					<div class="sort">
						<a href="">
							<i></i>
							<span>时间排序</span>
						</a>
					</div>
					<div class="mode">
						<input type="checkbox" checked name="" id="" />
						<span>趣评模式</span>
						<a href="">(介绍)</a>
					</div>
				</div>
				<!--评论层设置-->
				<div class="clist">
					<div class="clist_left">
						<img src="./Public/Home/images/pinlun.jpg" alt="" />
						<i></i>
						<p>150*****05</p>
					</div>
					<div class="clist_center">
						<div class="sonl1">
							<div class="star">
								<em></em>
							</div>
						</div>
						<p class="sonl2">说赠送内存卡来的，结果没有，说赠送保护壳呢，也没有，感觉不爽，要什么都没有，那会就选择别的了</p>
						<div class="sonl3">
							<div class="date">
								<span>2016-05-21 12:40:43</span>
							</div>
							<div class="answer">
								<a href="">回复<em>(10)</em></a>
							</div>
							<div class="useful">
								<a href="">
									<i></i>
									<span>有用</span>
									<em>(0)</em>
								</a>
							</div>
						</div>
					</div>
					<div class="clist_right">
						<p>颜色：晨曦金</p>
						<p>卖家：苏宁自营</p>
					</div>
				</div>
				<div class="clist">
					<div class="clist_left">
						<img src="./Public/Home/images/pinlun.jpg" alt="" />
						<i></i>
						<p>150*****05</p>
					</div>
					<div class="clist_center">
						<div class="sonl1">
							<div class="star">
								<em></em>
							</div>
						</div>
						<p class="sonl2">说赠送内存卡来的，结果没有，说赠送保护壳呢，也没有，感觉不爽，要什么都没有，那会就选择别的了</p>
						<div class="sonl3">
							<div class="date">
								<span>2016-05-21 12:40:43</span>
							</div>
							<div class="answer">
								<a href="">回复<em>(10)</em></a>
							</div>
							<div class="useful">
								<a href="">
									<i></i>
									<span>有用</span>
									<em>(0)</em>
								</a>
							</div>
						</div>
					</div>
					<div class="clist_right">
						<p>颜色：晨曦金</p>
						<p>卖家：苏宁自营</p>
					</div>
				</div>
				<div class="clist">
					<div class="clist_left">
						<img src="./Public/Home/images/pinlun.jpg" alt="" />
						<i></i>
						<p>150*****05</p>
					</div>
					<div class="clist_center">
						<div class="sonl1">
							<div class="star">
								<em></em>
							</div>
						</div>
						<p class="sonl2">说赠送内存卡来的，结果没有，说赠送保护壳呢，也没有，感觉不爽，要什么都没有，那会就选择别的了</p>
						<div class="sonl3">
							<div class="date">
								<span>2016-05-21 12:40:43</span>
							</div>
							<div class="answer">
								<a href="">回复<em>(10)</em></a>
							</div>
							<div class="useful">
								<a href="">
									<i></i>
									<span>有用</span>
									<em>(0)</em>
								</a>
							</div>
						</div>
					</div>
					<div class="clist_right">
						<p>颜色：晨曦金</p>
						<p>卖家：苏宁自营</p>
					</div>
				</div>
			</div>
			<!--分页设置开始-->
			<div class="fenye">
				<div class="fenye_left">
					<a href="">查看全部评论></a>
				</div>
			    <ul class="pagination">
				    <li>
				      <a href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				    <li>
				      <a href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				</ul>
			</div>
			<!--分页设置结束-->
			<!--全部咨询-->
			<img src="./Public/Home/images/kehu.jpg" alt="" />
			<div class="all_advice">
				<ul class="ul_son3">
					<li class="now">
						<em>全部咨询</em><span>(35)</span>
					</li>
					<li>
						<em>全部咨询</em><span>(35)</span>
					</li>
					<li>
						<em>全部咨询</em><span>(35)</span>
					</li>
					<li>
						<em>全部咨询</em><span>(35)</span>
					</li>
					<li>
						<em>全部咨询</em><span>(35)</span>
					</li>
				</ul>
				<!--具体咨询-->
				<div class="item">
					<div class="item_left">
						<div class="question">
							<i></i>
							<p class="nickname">189***48</p>
							<p class="content">我是中国电信老客户，每月是199元，费用，那我就是选择199就可以吗，</p>
						</div>
						<div class="answer">
							<i></i>
							<p class="nickname">苏宁自营</p>
							<p class="content">您好，您可以根据自身需求在页面选择套餐，页面会有套餐信息，有疑问可联系运营商客服哦~</p>
						</div>
					</div>
					<div class="item_right">
						<p>2016-05-18 12:23:30</p>
						<p>
							<a href="">满意(20)</a>
							<a href="">不满意(0)</a>
						</p>
					</div>
				</div>
				<div class="item">
					<div class="item_left">
						<div class="question">
							<i></i>
							<p class="nickname">189***48</p>
							<p class="content">我是中国电信老客户，每月是199元，费用，那我就是选择199就可以吗，</p>
						</div>
						<div class="answer">
							<i></i>
							<p class="nickname">苏宁自营</p>
							<p class="content">您好，您可以根据自身需求在页面选择套餐，页面会有套餐信息，有疑问可联系运营商客服哦~</p>
						</div>
					</div>
					<div class="item_right">
						<p>2016-05-18 12:23:30</p>
						<p>
							<a href="">满意(20)</a>
							<a href="">不满意(0)</a>
						</p>
					</div>
				</div>
				<div class="item">
					<div class="item_left">
						<div class="question">
							<i></i>
							<p class="nickname">189***48</p>
							<p class="content">我是中国电信老客户，每月是199元，费用，那我就是选择199就可以吗，</p>
						</div>
						<div class="answer">
							<i></i>
							<p class="nickname">苏宁自营</p>
							<p class="content">您好，您可以根据自身需求在页面选择套餐，页面会有套餐信息，有疑问可联系运营商客服哦~</p>
						</div>
					</div>
					<div class="item_right">
						<p>2016-05-18 12:23:30</p>
						<p>
							<a href="">满意(20)</a>
							<a href="">不满意(0)</a>
						</p>
					</div>
				</div>
			</div>
			<!--分页设置-->
			<div class="fenye">
			    <ul class="pagination">
				    <li>
				      <a href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				    <li>
				      <a href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				</ul>
			</div>
			<!--最近浏览-->
			<div class="history mt10">
				<div class="head">
					<h3>最近浏览</h3>
				</div>
				<!--需重写,设置为轮播图-->
				<div class="imgscroll">
					<a class="pre same" href=""></a>
					<a href="" class="same next"></a>
					<ul>
						<li class="li1">
							<a href="">
							<img src="./Public/Home/images/cona17.jpg"/> 
							</a> 
							<p class="title">
								<a href="">华为荣耀畅玩4X（Che1-CL20）晨曦金 全网通4G手机 双卡双待</a></p>
							<p class="price">
								<em>¥</em>899.00
							</p>
						</li>
					</ul>
				</div>
			</div>
			<!--猜你喜欢 数据-->
			<div class="like mt10">
				<div class="head">
					<h3>猜你喜欢</h3>
					<div class="like_right">
						
					</div>
				</div>
				<!--需重写,设置为轮播图-->
				<div class="imgscroll">
					<a class="pre same" href="javascript:;"></a>
					<a href="javascript:;" class="same next"></a>
					<ul>
						{{foreach from='$like' key='$k' value='$v'}}
						<li {{if value="$k eq 0" }} class="li1" {{endif}}>
							<a class="img_a" href="{{U('Content/index',array('gid'=>$v['gid']))}}">
							<img src="{{$v['pic_list']}}"/> 
							</a> 
							<p class="title">
								<a href="{{U('Content/index',array('gid'=>$v['gid']))}}">{{$v['gname']}}</a></p>
							<p class="price">
								<em>¥</em>{{$v['sprice']}}
								<span>大聚惠</span>
							</p>
						</li>
						{{endforeach}}
					</ul>
				</div>	
			</div>
		</div>
		
	</div>
	<!--商品详情设置结束-->
	<!--底部设置开始-->
	{{include file="../Common/foot"}}
	<!--底部设置结束-->
	
	<script type="text/javascript" src="./Public/Home/js/jquery-1.7.2.min.js"></script>
	<!-- 城市联动js -->
	<script type="text/javascript" src="./Public/Home/js/area.js"></script>
	<!--放大镜效果-->
	<script type="text/javascript" charset="utf-8">
	$(function(){
		// 1.抓取元素
		var left = document.getElementById('imgleft');
		var right = document.getElementById('imgright');
		var box = document.getElementById("box");
		var img = document.getElementById("imgright1");
		var cover = document.getElementById("cover");
		// 2.绑定事件
	    cover.onmousemove=function(e){
	         // 小块显示,右侧图显示
	         box.style.display = "block";
	         right.style.display = "block";
	         // 获得鼠标坐标位置
	         var ev = e || window.event;
	         var l = ev.offsetX || ev.layerX;
	         var t = ev.offsetY || ev.layerY;
			      // document.title = l +"|"+ t;
	         // 获得小色块的位置
	         var left = l - 100;
	         var top = t - 100;
	         // 色块范围的判断
	         if(left>220){
	         	left = 220;
	         }
	         if(left<0){
	         	left = 0;
	         }
	         if(top>180){
	         	top = 180;
	         }
	         if(top<0){
	         	top = 0;
	         }
	         // 把值赋给小色块
	         box.style.left = left + "px";
	         box.style.top = top + "px";
	         // 设置大图片的值
	         img.style.left = left * -1.4 + "px";
	         img.style.top = top * -2 + "px";
        }
	     cover.onmouseout=function(){
	    	 // 小块和右侧图消失
	         box.style.display = "none";
	         right.style.display = "none";
	    }
	    // 放大镜hover切换图片
	    $('.img_thumb li').hover(function() {
	    	// 改变小li的样式
			$(this).css({borderColor:'#f90'}).siblings('li').css({borderColor:'#eee'});
			// 获得小图的src
			var src = $(this).find('img').attr('src');
			// document.title = src;
			// 把小图的src赋值给中图和大图
			var mid = $(this).find('img').attr('mid');
			var big = $(this).find('img').attr('big');
			$('#imgleft').attr('src',mid);
			$('#imgright1').attr('src',big);
	    }, function() {
	    	
	    })
		//倒计时三天效果
	     // 抓取元素
	    var fa = document.getElementById('timefather');
	    var ems = fa.getElementsByTagName('em');
	    // 未来时间
	    var future_time = new Date(2016,7,15,12,30,30);
	    var str_future = future_time.getTime();
		function run2(){
		    // 获得日期对象
		    var now_time = new Date();
		    var str_now = now_time.getTime();
		    // 获得时间差
		    var str_cha = str_future - str_now;	    
		    // 获得天数
		    var d = parseInt(str_cha/(24*60*60*1000));
		    str_cha = str_cha%(24*60*60*1000);
		    // 获得小时
		    var h = parseInt(str_cha/(60*60*1000));
		    str_cha = str_cha%(60*60*1000);
		    // 获得分钟
		    var m = parseInt(str_cha/(60*1000));
		    str_cha = str_cha%(60*1000);
		    // 获得秒
		    var s =  parseInt(str_cha/1000);
		    // 把时间赋值给内容
		    ems[0].innerHTML = d;
		    ems[1].innerHTML = h;
		    ems[2].innerHTML = m;
		    ems[3].innerHTML = s;
		}    
	    setInterval(run2,1000);   
	    
	    // 点击加一次数字加1
	    $('.jia').live('click', function() {
	    	var num = parseInt($('#inputNum').val())+1;
	    	if($('#inputNum').val()>=99){
	    		return;
	    	}
	    	$('#inputNum').val(num);
	    });
	    // 点击减 数字减一
	    $('.jian').live('click', function() {

	    	var num = parseInt($('#inputNum').val())-1;
	    	if(parseInt($('#inputNum').val())<=1){
	    		return;
	    	}
	    	$('#inputNum').val(num);
	    	
	    });
	    // 点击选中,边框变为黄色
	    $('.adda1').live('click', function() {
	    	$(this).addClass('a1').siblings('.adda1').removeClass('a1');
	    	$(this).find('i').css({display:'block'});
	    	$(this).siblings('.adda1').find('i').css({display:'none'});
 			
	    })
	   	// 点击获取组合的数据
	   	var gid = <?php echo Q('get.gid',0,'intval'); ?>;
 		$('.adda1').live('click', function() {
			// 定义一个json
	    	var combin = {
	    		'gid' : gid,
	    		'comb' : '',
	    	}
	    	// 获得a1的位置
	    	$.each($('.dv5 .a1'),function() {
	    		combin.comb+=$(this).attr('gaid')+',';
	    	})
	    	// 把组合字段赋值给隐藏域
	    	$('#combine').val(combin.comb);
	    	// 更改页面商品价格
	    	// 发异步
	    	$.ajax({
	    		url: "{{U('check')}}",
	    		type: 'post',
	    		dataType: 'json',
	    		data: {comb: combin},
	    		success:function(phpData){
	    			var pric = <?php echo $sprice ?>;
	    			pric =  pric + phpData.son;
	    			// 改变价格
	    			$('#spanprice').html(pric+'.');
	    			// 改变价格传过去的value值
	    			$('#sprice').val(pric);
	    			// 出现颜色等字
	    			$('#namejson').html(phpData.name);
	    		}
	    	})
	    })

 		// 城市联动
 		//初始化方法
		area.init('area');
		//修改的时候默认被选中效果
		area.selected('北京市','北京','东城区');

	   
	  
	    
	})	
	</script>
	
</body>
</html>
