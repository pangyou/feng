<?php namespace web\home\controller;
use wechat\WeChat;
/**
 * 调取本地图片功能--朋友圈分享
 * @author 庞友  <1430650394@qq.com>
 */
class jsSdk {
	protected $db;
	private $model;
	// 构造方法
	public function __construct(){
		// 实例化微信类
		$this->db = new WeChat;
		//实例化微信  保存功能类
		$this->model = new \web\home\model\myProdect;
	}
	/**
	 * 获取本地图片显示页面--以及分享到朋友圈
	 */
	public function getImg(){
		if(IS_POST){
			//如果添加成功,返回1 
			if($this->model->addData()){//成功提示
				// 把数组转为json形式
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'保存成功'
						)
				);exit;
			};
			//失败提示
			// 把数组转为json形式
			echo json_encode(
				array(
					'status'=>0,
					'message'=>$this->model->getError()
				)
			);exit;

		}
		// 需要的信息
		$data['timestamp']=time();//获得时间
		$data['nonceStr']=md5(microtime(true));//随机字符串
		$data['appId']=c('wechat.appid');//获取appid
		$data['url']=__URL__;//获得当前地址
		//调用微信类的  获取微信的 jsapi_ticket 方法
		$data['jsapi_ticket']=$this->db->getJsapiTicket(); 
		$data['signature']=$this->getSignature($data);//获得signature
		//获取openid
		$openid = Weixin::instance('oauth')->snsapiBase();
		//会员的openid
		$data['openid'] = $openid;
		//获取旧数据
		$oldData = $this->model->where("openid='{$openid}'")->get();
		if(!$oldData){//如果没有旧数据,证明是添加
			$oldData = array();
		}
		//分配变量到页面
		View::with('oldData',$oldData[0]);
		// 分配变量到页面并载入模板
		View::with('data',$data)->make();
	}
	/**
	 * 获取signature
	 */
	private function getSignature($data){
		// 排序
		ksort($data);
		$url = '';
		// 组合地址为手册要求的形式
		foreach ($data as $k => $v) {
			if($k == 'appId')continue;
			$url .= strtolower($k) . '=' . $v. '&';
		}
		// 去掉最后一个多余的 &
		$url = substr($url, 0,-1);
		// sha1加密数据返出去
		return sha1($url);
	}
	/**
	 * 异步处理添加的标签
	 */
	public function change(){
		//接收post传过来的值
		$word = q('post.word');
		//转化为数组--注意 要使用 中文的 逗号,不然在移动端测试不了
		$data = explode('，', $word);
		echo json_encode($data);
		exit;
	}
}