<?php namespace wechat;
//因为在同一个目录下,可以不写 use wechat;
class Message extends WeChat{
	//判断用户关注事件
	public function isSubscribe(){
		//消息类型是 event(事件),并且事件类型是  subscribe   才是用户关注事件
		return $this->message->MsgType=='event' && $this->message->Event =='subscribe';
	}
	
	//判断用户取消关注事件
	public function isUnsubscribe(){
		//消息类型是 event,并且事件类型是 unsubscribe     才是用户取消关注事件
		return $this->message->MsgType=='event' && $this->message->Event =='unsubscribe';
	}
	//判断用户发的消息是否文本
	public function isTextMessage(){
		//消息类型是  text   就是文本消息
		return $this->message->MsgType =='text';
	}
	//回复文本消息方法
	public function text($content){
		$time = time();
		//会员的openid
		$toUser=$this->message->FromUserName;
		//公众号
		$fromUser=$this->message->ToUserName;
		$xml=<<<str
		<xml>
	<ToUserName><![CDATA[{$toUser}]]></ToUserName>
	<FromUserName><![CDATA[{$fromUser}]]></FromUserName>
	<CreateTime>{$time}</CreateTime>
	<MsgType><![CDATA[text]]></MsgType>
	<Content><![CDATA[{$content}]]></Content>
	</xml>
str;
	echo $xml;
	exit;
	}
}
