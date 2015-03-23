<?php
//该文件 由Common.js来  然后主要是处理用户找回  并 修改 密码
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$passchangGroup = $_POST['UpdatePass'];//从Personal.js传来  用户 ID  原密码 新密码
$arrchangGroup = explode('-', $passchangGroup);
$userName = $arrchangGroup[0];
$userNewPass = $arrchangGroup[1];
//构造sql语句 判断原密码是否正确

//如果存在该用户 改密码 就进行修改密码
$sql_update_pass = "Update t_sfuser Set SFUserKey = '".md5($userNewPass)."' where SFUserLogin = '".$userName."'";//修改密码sql
$update_result = $sqlHelper->execute_dql($sql_update_pass);
if($update_result!=""){
	echo "1";
}else{
	echo "0";
}

?>