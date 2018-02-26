<?php 
// 这是edit编辑函数
// 载入公用函数
include './function.php';
// 2修改文件
// a,载入数据库
$data = include './data.php';
// 获得要修改的下标
$id = $_GET['id'];
// 在用户提交的时候才修改
if(IS_POST) :
	// b,修改数据
	$data[$id] = $_POST;
	// c,重新写入数据库
	$phpCode = var_export($data,true);
	// 组合字符串
	$str = <<<str
<?php
return {$phpCode};
?>
str;
	file_put_contents('data.php', $str);
	success('修改成功');
endif;
// 1,获得旧数据
$oldData = $data[$id];
include './tpl/edit.html';

 ?>