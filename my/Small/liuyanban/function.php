<?php 
// 公用函数
header('Content-type:text/html;charset=utf-8');
// 打印函数
function p($var){
	echo '<pre style="border:1px solid grey;border-radius:8px;background:#ccc">';
	print_r($var);
	echo '</pre>';
}
// 定义是否是post提交
define('IS_POST',$_SERVER['REQUEST_METHOD'] == 'POST' ? true : false);

// 成功提示函数
// 跳转在当前页面(location.href)就不会有刷新重复提交问题
function success($meg){
	$jsStr = <<<str
<script>
alert('{$meg}');
location.href = '1.php';
</script>
str;
echo $jsStr;
}
function success2($meg){
	$jsStr = <<<str
<script>
alert('{$meg}');
location.href = '2.php';
</script>
str;
echo $jsStr;
}


?>

