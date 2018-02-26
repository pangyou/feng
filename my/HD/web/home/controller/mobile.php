<?php namespace web\home\controller;
class Mobile {
	/**
	 * 测试
	 */
	public function test(){
		//载入模板
	    View::make();
	}
	/**
	 * 获取归属地
	 */
	public function send(){
	    $tel = q('post.tel');
		//初始化curl
		$ch = curl_init();
		//请求地址
		$url = 'http://apis.baidu.com/apistore/mobilephoneservice/mobilephone?tel='.$tel;
		//自己的apikey 注册登录后在个人中心查看
		$header = array(
        	'apikey:c6938787c1a78fc278f838325174a4fd',
		);
		// 添加apikey到header
	    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    // 执行HTTP请求
	    curl_setopt($ch , CURLOPT_URL , $url);
	    $res = curl_exec($ch);
		//把数据转化为json
	    $data = json_decode($res,true);
		if($data['errMsg']=='success'){
			return ['valid'=>1,'data'=>$data];
		}else{
			return ['valid'=>0,'message'=>'获取失败，请检查手机号'];
		}
	}
}