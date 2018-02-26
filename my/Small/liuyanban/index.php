<?php 
// 载入公用函数
include 'function.php';
// 1载入数据库
$data =include 'data.php';
if(IS_POST):
// 2追加一条
	$data[] = $_POST;
	// 3,重新写入数据库
	// 代码合法化
	$phpCode = var_export($data,true);
	// 组合字符串
$str = <<<str
<?php
return {$phpCode};
?>
str;
// 写入数据
file_put_contents('data.php', $str);
// 重新用js跳转
success('添加成功');
endif;

// 载入页面
include './tpl/index.html';

 ?>