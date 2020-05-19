<?php
//require 'include/init.php';
require_once 'include/smarty/libs/SmartyBC.class.php';
$smarty = new SmartyBC();
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";

//检验登录状态
session_start();
$UserLoginState = "0"; //记录用户登录状态
if(!isset($_SESSION['USER'])){
	$UserLoginState = '0';  //为0 没有登录
}else{
	$UserLoginState = '1';  //为1 现有登录
}

$smarty->assign("UserLoginState",$UserLoginState); //向模板传送登录状态
$smarty->assign("NowUserName", $_SESSION['USER']);
$smarty->assign("UserId", $_SESSION['USERID']);

$smarty->display("top.htm"); //分配模板
