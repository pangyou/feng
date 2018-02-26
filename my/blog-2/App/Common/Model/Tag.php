<?php namespace Common\Model;
use Hdphp\Model\Model;
/**
 * 标签操作模型
 */
class Tag extends Model{
	// 指定模型操作的表
	protected $table = 'tag';
	// 自动验证
	protected $validate = array(
		array('tname','required','标签名字不能为空',3,3),
	);
	/**
	 * 添加方法
	 */
	public function addData(){
		// 1,调用add方法之前,必须经过create,否则无法添加
		// 2,create才会触发自动验证
		// 验证通过,才执行添加方法
		if($this->create()){
			// 把字符串变为数组
			$tag = explode('|', Q('post.tname'));
			foreach ($tag as $tname) {
				// 键名为字段名,键值就是要插入的值
				$data = array('tname'=>$tname);
				// 调用框架add方法
				// sp($data);
				$this->add($data);
			}
			// 添加成功返回true
			return true;
		}
		// 验证不通过返回false
		return false;
	}
	/**
	 * 修改方法
	 */
	public function editData(){
		// 验证不通过,返回false
		if(!$this->create())return false;
		// 验证通过,修改数据,返回true
		$this->save();
		return true;
	}
	/**
	 * 传入文章数据获得标签,然后返出去
	 * 重点记====================
	 */
	public function getTag($data){
		// 把tag压入文章数据中,组合成新的数组
		foreach ($data as $k => $v) {
			$data[$k]['tag'] = Db::table('article_tag')
			->join('tag','tag_tid','=','tid')
			->where("article_aid={$v['aid']}")
			->get();
		}
		// 组合好的新数据返回出去,让外面接收
		return $data;
	}
}