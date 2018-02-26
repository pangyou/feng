<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
/**
 * 网站配置控制器
 */
class WebsetController extends CommonController{
	private $model;
	public function __construct(){
		// 防止父级构造方法被覆盖
		parent::__construct();
		$this->model = new \Admin\Model\WebSet;
	}
	// 默认显示页面
	public function index(){
		if(IS_POST){
			// 循环所有POST提交过来的数据,如果改变的只有一条,只重新更改一条(框架自带的机制)
			foreach (Q('post.') as $name => $value) {
				// 原生sql
				// UPDATE webset SET value='后盾bolg教学' WHERE name='webname'
				$this->model->where("name='{$name}'")->save(array('value'=>$value));
			}
			// 返回合法的php代码
			$phpCode = var_export($_POST,true);
			// 组合数据
			$str = <<<str
<?php
return {$phpCode};
str;
			//	 更改配置项文件
			file_put_contents('./Config/self.php', $str);
			// 修改成功提示
			View::success('修改成功');		
		}
		// 获得所有的数据
		$data = $this->model->get();
		// 分配变量到页面
		View::with('data',$data);
		// 载入显示页面
		View::make();
	}
}







 ?>