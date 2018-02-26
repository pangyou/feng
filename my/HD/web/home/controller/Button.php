<?php namespace web\home\controller;
use wechat\WeChat;
/**
 * 菜单类
 */
class Button{
	/**	
	 * 菜单创建方法
	 * api unauthorized hint: [ZnfSGa0429vr19]
	 */
	public function post(){
	    //清除缓存,防止token过期
	    //Cache::flush();
		if(IS_POST){
			//实例化微信类
		    $wx = new WeChat;
			//实例化具体的功能类--菜单类
			$button = $wx->instance('Button');
			//插入表的数据
			$data['id'] = 1;
			$data['createtime'] = time();
			$data['info'] = $_POST['data'];
			//把信息写入数据库
			Db::table('button')->replace($data);
			//菜单接口调用方法
			if($button->create($_POST['data'])){
				//成功提示,并且刷新下页面
				message('菜单创建成功','refresh','success');
			}else{//错误提示,并且返回上次页面
				message($button->getError(),'back','error');
			}
		}
		//查询id为1的所有info数据
		$buttonData = Db::table('button')->where('id',1)->pluck('info');
		//分配变量到页面
		View::with('button',$buttonData);
		//载入页面
		View::make();
	}
	
}

 ?>