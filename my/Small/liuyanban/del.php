<?php 
// 载入公用函数
include './function.php';
// 1载入数据库
$data = include './data.php';
// 2删除
// a.接收要删除的哪个的下标
$id = $_GET['id'];
// b.删除对应数组
unset($data[$id]);
// 3,重新写入数据库
// a,代码合法化
$phpCode = var_export($data,true);
// b,组合字符串
$str = <<<str
<?php
return {$phpCode};
?>
str;
// c,写入数据库
file_put_contents('./data.php', $str);
success('删除成功');

?>