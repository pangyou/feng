<?php 
// 打印函数
function p($arr){
	header('Content-Type:text/html;charset=utf-8');
	echo "<pre style='background:#ccc;border-radius:10px;padding:10px;border:1px solid grey;'>";
	print_r($arr);
	echo '</pre>';
}
// 跳转函数
function go($url){
	$str = <<<str
<script>
location.href = '{$url}';
</script>
str;
	echo $str;
}














 ?>