<?php namespace web\home\controller;
use wechat\WeChat;
class Index {
	public function show() {
		//一进来就存入session中
		$_SESSION['openid'] = Weixin::instance('oauth')->snsapiBase();
		// 实例化 微信类
		$wx = new WeChat;
		// 实例化 具体的功能类  Button
		$button = $wx->instance('Button');
		// 组合数据
		$data = <<<str
{
     "button":[
     {	
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }
str;
		// 调用菜单类中的---菜单接口调用方法
    	// 返回一个真值或者 假
 		$d = $button->create($data);
		//载入模板
		View::make();
	}
}