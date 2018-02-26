<?php namespace wechat;
/**
 * 微信菜单管理
 */
class Button extends WeChat{
	/**
	 * 创建菜单接口调用方法
	 */
	public function create($data){
		//一, 请求地址 get方式============================
		//$this->getAccessToken()表示 调用WeChat类中的  获取微信的 access_token的方法
		$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=' . $this->getAccessToken();
		// 调用框架的方法,通过post的方式提交获取返回的数据
		//二,接口调用 post方式=========================
		$res = Curl::post($url,$data);
		// 转化为json数据
		$res = json_decode($res,true);
		// 结果不为0时
		if($res['errcode']!=0){
			// 把错误压入
			$this->error = $res['errmsg'];
			// 返回假,让外面判断 controller/index.php
			return false;
		}
		// 返回真,让外面判断
		return true;
	}
	/**
	 * 删除菜单
	 */
	public function delMenu(){
		//请求地址
	    $url ="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=" . $this->getAceessToken();
		//返回的信息
		$msg = file_get_contents($url);
		return $msg;
	}
}
