<?php 
//载入qq核心文件
require './Connect2.1/API/qqConnectAPI.php';
/**
 * 因为没有用框架,暂时写成这样
 * 跳转到qq登录页面
 */
// 实例化qq接口
$qc = new QC();
$qc->qq_login();







 ?>