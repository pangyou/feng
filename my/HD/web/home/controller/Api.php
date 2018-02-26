<?php namespace web\home\controller;
use wechat\WeChat;
/**
 * 微信处理的接口
 */
class Api{
	//微信处理实例对象
	protected $wx;
	//构造方法
	public function __construct(){
		//实例化微信处理的公共类
		$this->wx = new WeChat;
		//执行里面的  微信接入绑定  方法
		$data = $this->wx->signature();
	}
	/**
	 * handler 方法
	 * 处理 微信的操作------
	 */
	public function handler(){
		//实例化具体的功能类  --- Message功能类
		$message = $this->wx->instance('Message'); 
		//关注时回复  --- 调用Mesage类中的 方法
		if($message->isSubscribe()){
			$message->text('感谢关注哥的公众号');
		}
		//文本消息回复   --- 调用Mesage类中的 方法
		if($message->isTextMessage()){
			//实例化消息类
			$TextServer = new \server\text();
			//调用消息类中的 回复方法
			$replyContent = $TextServer->reply($this->wx->message->Content);
			//如果没有关键词匹配时回复默认消息
			if(!$replyContent){
				//默认回复的消息
				$defaultContent = Db::table('setting')->pluck('default_message');
				$replyContent = $TextServer->reply($defaultContent)?:$defaultContent;
			} 
			$message->text($replyContent);
		}
	}
}
