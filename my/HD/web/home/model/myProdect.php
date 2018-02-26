<?php namespace web\home\model;
use hdphp\model\Model;
/**
 * 快销售-秀我的产品  保存功能
 * @author 庞友  <1430650394@qq.com>
 */
class myProdect extends Model{
	//指定操作的表
	protected $table = "myprodect";
	//自动验证
	protected $validate= array(
		array('proname','required','请填写产品名称',3,3),
		array('solgan','required','请输入产品solgan',3,3),
		array('tag','required','请贴上公司名称',3,3),
		array('username','required','请输入售卖人姓名',3,3),
		array('tel','required','请输入售卖人电话',3,3),
		array('company','required','请输入公司名称',3,3),
		array('des','required','请填写产品描述',3,3),
		array('imgs','required','请点+击上传照片',3,3)
	); 
	/**
	 * 如果数据库中没有信息,就是添加--保存功能
	 */
	public function addData(){
		//1,验证不通过
		if(!$this->create()){
			$this->error = $this->getError();
			return false;
		}
		//2,验证通过,写入数据库
		return $this->add();
	}
	/**	
	 * 如果数据库中有信息,就是修改--保存功能
	 */
	public function editData(){
		//1,验证不通过
		if(!$this->create()){
			$this->error = $this->getError();
			return false;
		}
		//接收post里面的openid
		$openid = q('post.openid','');
		//查询对应的mid
		$mid = $this->where("openid={$openid}")->pluck('mid');
		//验证通过,执行修改方法
		return $this->where("mid={$mid}")->save();
	}
}