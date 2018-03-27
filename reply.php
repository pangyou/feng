<?php 

//1, 如何优化sql 查询 select id from user where phone='131' or phone = '139';
// SELECT id FROM user WHERE phone in('131','139');
//2,删除重复数据,确保只有一条
//DELETE FROM user WHERE id in(SELECT id FROM user GROUP BY name HAVING count(*)>1)
//答案?
// 
//3,每天3点执行一次 run.php 
// 1,  crontab -e 
// 2,  00 03 * * *   php run.php                  //分 时 日 月 周
// 3,   :wq

//4,求一个整数数组中 和最大 的连续 子数组
//例如 :  [1,2,-4,4,10,-3,4,-5,1] 的最大连续子数组是 [4,10,-3,4]
//思路 -- 找到最大和,最大和子数组开始下标,最大和子数组结束下标
//具体代码
$arr = [1,2,-4,4,10,-3,4,-5,1];
// $arr = [-5,-2,0,-3,-1];
// 假如数组 都为 负数 [-1,-2,-4,-3,-1]
$result = get_max_arr($arr);
p($result);
function get($arr){
	$curSum = $arr[0];
	//假设第一个值为最大和
	$maxSum = $arr[0];
	for($i = 1; $i < count($arr); $i++){
		if($curSum > 0) {
			$curSum += $arr[$i];
		}else {
			$curSum = $arr[$i];
		}
		if($curSum > $maxSum){
			$maxSum = $curSum;
		} 
	}
	return $maxSum;
}
function get_max_arr($arr){
	//最大和
	$max_num = $arr[0];
	//最大和子数组开始下标
	$max_i = '';
	//最大和子数组结束下标
	$max_j = '';
	$len = count($arr);
	for ($i=0; $i < $len; $i++) { 
		$sum = 0;
		for ($j=$i; $j < $len; $j++) {
			$sum += $arr[$j];
			if($sum > $max_num){
				$max_num = $sum;
				$max_i = $i;
				$max_j = $j;
			}
		}
	}
	$num = $max_j - $max_i + 1;//截取个数不包括尾数,所以加1
	$result = array_slice($arr,$max_i,$num);
	return $result;
}

//5,在php项目中 遇到的最大的技术问题,如何解决的
// 电子面单的实现
// 调研 快递100与快递鸟,比较后采用 快递鸟 接口实现下载电子面单.(因为公司项目本身就用了快递鸟的物流轨迹查询接口, 快递鸟的电子面单说明比较详细.)
//1,通过demo然后不停的调试,根据技术文档查看.
//2,测试环境可以下单后,让站点店长联系当地快递网点,获取韵达公司的网点编号和密码
//3,把相关配置修改为正式环境,然后调试.


function p($var){
	header("Content-type: text/html; charset=utf-8"); 
	echo '<pre style="padding: 5px;
		background: #ccc;
		border: 1px solid grey;
		border-radius: 5px;">';
    print_r($var);
    echo '</pre>';
}

 ?>