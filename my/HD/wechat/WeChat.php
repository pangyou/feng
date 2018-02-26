<?php namespace wechat;
/**
 * 微信处理的公共类
 * @author 庞友 <1430650394@qq.com>
 */
class WeChat{
	//微信服务器使用的TOKEN
	private $token;
	//错误信息
	protected $error;
	//微信消息
	public $message;
	//构造方法
	public function __construct(){
		//获取配置项中的token    ---在system中的wechat.php文件获取
		$this->token = c('wechat.token');
		//获取用户发送的消息
		$this->message = $this->getMessage();
	}
	/**
	 * 获取微信服务器发来的消息（官网消息或用户消息)
	 */
	protected function getMessage(){
		if ( isset( $GLOBALS['HTTP_RAW_POST_DATA'] ) ) {
            $post = $GLOBALS['HTTP_RAW_POST_DATA'];
			//解析微信发来的POST/XML数据
            return simplexml_load_string( $post, 'SimpleXMLElement', LIBXML_NOCDATA );
        }
	}
	/**
	 * 微信接入,这是第一个功能==================================
	 * 微信接口整合验证进行绑定
	 */
	public function signature(){
		if(empty($_GET['echostr']) || empty($_GET["signature"]) || empty($_GET["timestamp"]) || empty($_GET["nonce"])){
			return ;
		}
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
		$token = $this->token;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if( $tmpStr == $signature ){
			echo $_GET["echostr"];exit;
		}else{
			return false;  
		}
	}
	/**
	 * 实例化具体的功能类
	 */
	public function instance($name){
		//把名字连上命名空间       防止转义'  
		$class = '\wechat\\'.$name;
		//如传入名字 Message  则结果为  return  \wechat\Message;
		return 	new $class;
	}
	/**
	 * 获取错误信息
	 */
	public function getError(){
		return $this->error;
	}
	/**
	 * 获取微信的 access_token
	 * 这是第二个功能=========================================
	 */
	public function getAccessToken(){
		$access_token = Cache::get('access_token');
		// 如果缓存 存在时不需要从微信再获取了
		if($access_token) return $access_token;
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.c('wechat.appid').'&secret='.c('wechat.AppSecret');
		// 获取数据
		$res = Curl::get($url);
		// 把数据转化为json
		$res = json_decode($res,true);
		// 设置缓存
		Cache::set('access_token',$res['access_token'],7200);
		// 把获取到的 access_token返出去
		return $res['access_token'];
	}
	/**
	 * 第三个功能================================
	 * 调取本地的图片功能--分享到朋友圈
	 * 获取微信的jsapi_ticket
	 */
	public function getJsapiTicket(){
		//获取缓存里面的jsapi_ticket
		$jsapi_ticket = Cache::get('jsapi_ticket');
		// 如果缓存存在时,不需要从微信再获取
		if($jsapi_ticket) return $jsapi_ticket;
		// 不存在就从微信获取
		$url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$this->getAccessToken()."&type=jsapi";
		$res = Curl::get($url);
		// 解码
		$res = json_decode($res,true);
		if($res['errcode'] == 0){
			// 设置缓存,过去7200s
			Cache::set('jsapi_ticket',$res['ticket'],7200);
			// 把获取微信的jsapi_ticket 返出去
			return $res['ticket'];
		}
	}
}
