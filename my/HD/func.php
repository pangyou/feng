<?php 
//自定义的一些方法
//打印
function sp($arr){
	header('Content-type:text/html;charset=utf8');
	echo '<pre style="background:#ccc;border:1 px solid grey;padding:10px;border-radius:5px;">';
	print_r($arr);
	echo '</pre>';exit;
}
function success($msg,$url=""){
	$str = <<<str
<script>
alert({$msg});
location.href = '{$url}';
</script>
str;
	echo $str;exit;
}
