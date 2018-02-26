<?php namespace Common\Model;
use Hdphp\Model\Model;
/**
 * 文章操作模型
 */
class Arc extends Model{
	// 指定模型操作的表
	protected $table = 'article';
	// 自动验证(固定写法)需要通过create方法才触发
	protected $validate = array(
		array('title','required','文章标题不能为空',3,3),
		array('category_cid','required','分类选择不能为空',3,3),
	);
	// 自动完成,需要通过create方法才触发
	protected $auto = array(
		// 依次表示发表时间,时间函数time(),函数,必须验证,插入时验证
		array('sendtime','time','function',3,1),
		// 最后一个2修改时验证
		array('updatetime','time','function',3,2),
		// 调用当前类的up方法处理上传
		// 依次表示缩略图,自定义方法up,方法,必须验证3, 不管修改还是插入都要验证3
		array('thumb','up','method',3,3),
		// 最后一个1是插入时验证
		array('user_uid','uid','method',3,1),
	);
	/**
	 * thumb的上传方法******************
	 */
	public function up(){
		// 这步很重要!!!!!!!!=================
		// 如果有隐藏域,证明是修改,直接返回原地址
		if($thumb =Q('post.thumb')) return $thumb;
		// $_FILES能打印出来才能上传
		// sp($_FILES);exit;
		$files = Upload::type('jpg,png,gif,jpeg,bmp')->size(2000000)->make();
		// 如果上传成功
		if($files){
			// 此处return的值会存入thumb字段
			return $files[0]['path'];
		}else{//否则上传失败
			// 如果用户有上传但是上传失败,用户不上传就不压错误,因为允许用户不上传
			if($_FILES['thumb']['error'] !=4){
				// 这个时候把上传的错误压入到模型的error属性里面,这样外面控制器的getError方法就可以调取到错误
				$this->error = Upload::getError();
			}
			// 返回空字符串给thumb字段
			return '';
		}
	}
	/**
	 * 自动完成的最后一个数组,uid方法
	 */
	public function uid(){
		return $_SESSION['uid'];
	}
	/**
	 * 添加方法
	 */
	public function addData(){
		// 一,验证=======================
		// 表article验证失败 返回假
		if(!$this->create()) return false;
		// 如果有上传压入的错误 返回假
		if($this->error) return false;
		// 表article_data验证失败 返回假
		$arcDataModel = new \Common\Model\ArcData;
		if(!$arcDataModel->create()){
			// 把arcData模型里面的错误压入当前模型,因为控制器调用的就是当前模型的错误
			$this->error = $arcDataModel->getError();
			// 验证失败,返回假
			return false;
		}
		// 二,添加==================
		// 1,添加article表,add方法会返回自增id
		$aid = $this->add();
		// 2,添加article_tag中间表
		$arcTagModel = new \Common\Model\ArcTag;
		// 循环提交过来的标签tid,默认给空数组防止循环报错
		foreach (Q('post.tid',array()) as $tid) {
			// 重新组合数据
			$data = array(
				'article_aid' => $aid,
				'tag_tid' => $tid,
			);
			// 调用框架add方法,把数据传入
			$arcTagModel->add($data);
		}
		// 3,添加article_data表
		// 重新组合数据
		$data = array(
			'keywords' => Q('post.keywords'),
			'des' => Q('post.des'),
			'content' => Q('post.content'),
			'article_aid' => $aid,
		);	
		// 调用框架add方法,把数据传入
		$arcDataModel->add($data);
		// 添加成功返回true
		return true;
	}
	/**
	 * 修改方法
	 */
	public function editData(){
		// 一,验证***********
		// 表article验证不通过返回假
		if(!$this->create()) return false;
		// 如果有上传压入的错误,返回假
		if($this->error) return false;
		// 表article_data验证失败,返回假
		// 实例化文章内容表
		$arcDataModel = new \Common\Model\ArcData;
		if(!$arcDataModel->create()){
			// 把arcData模型里面的错误压入当前模型,因为控制器调用的就是当前模型的错误
			$this->error = $arcDataModel->getError();
			// 验证失败,返回假
			return false;
		} 
		// 二,修改*********************
		// 调用框架里的修改方法,记得在页面加隐藏域
		// 修改article数据
		$this->save();
		// 获取修改的aid
		$aid = Q('post.aid',0,'intval');
		// 修改article_data数据
		$arcDataModel->where("article_aid=$aid")->save();
		// 修改article_tag数据(中间表)
		// (1)先删除
		// 实例化中间表
		$arcTagModel = new \Common\Model\ArcTag;
		// 删除中间表的数据
		$arcTagModel->where("article_aid=$aid")->delete();
		// (2)再添加
		foreach (Q('post.tid',array()) as $tid) {
			$data = array(
				'article_aid' =>$aid,
				'tag_tid' =>$tid,
			);
			$arcTagModel->add($data);
		}
		// 验证通过,修改成功,返回真
		return true;
	}
	/**
	 * 删除方法
	 */
	public function del($aid){
		// 1,删除article
		$this->where("aid=$aid")->delete();
		// 2,删除article_data
		// 实例化文章内容表
		$arcDataModel = new \Common\Model\ArcData;
		// 删除表中article_aid为$aid的数据
		$arcDataModel->where("article_aid=$aid")->delete();
		// 3,删除article_tag
		// 实例化中间表article_tag
		$arcTagModel = new \Common\Model\ArcTag;
		// 删除表中article_aid为$aid的数据
		$arcTagModel->where("article_aid=$aid")->delete();
	}
}