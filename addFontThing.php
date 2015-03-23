<?php
//前台用于上传图片的文件   希望做的灵活一些
session_start();
//如果不存在 用户登录信息 跳转
if(!isset($_SESSION['USERID'])){
	echo '<script> alert("您还未登录，请先登录"); location.replace("../index.php")</script>';
	exit();
}
require_once 'include/ComFunction.php';
require_once 'include/smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";
require_once 'include/SqlHelper.class.php';
$sqlHelper = new SqlHelper();

//将用户ID session 分配给模板
$smarty->assign('USERID', $_SESSION['USERID']);
$smarty->display('addFontThing.htm');
?>