<?php namespace server;
/**
 * 微信消息处理类
 */
class Text{
	/**
	 * 默认回复消息
	 */
	public function reply($content){
		//获取关键词数据
		$keywords = Db::table('keyword')->orderBy('rank','DESC')->get();
		$replayContent = '';
		foreach ($keywords as $v) {
			switch($v['type']){
				case 1:
					//完全匹配
					if($v['keyword'] == $content){
						$replayContent = $v['content'];
						break 2;//向上跳两级(跳出循环)
					}; 
					break;
				case 0 :
					//模糊匹配  如  '电话多少啊'中有  '电话'
					if(mb_strstr($content, $v['keyword'])){
						$replayContent = $v['content'];
						break 2;
					}
					break;//防止访问不到
			}	
		}
		//把数据返出去
		return $replayContent;
	}
	
	
	
}