<?php
//该文件 由Personal.js来  然后主要是处理用户修改密码
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$passchangGroup = $_POST['passchangGroup'];//从Personal.js传来  用户 ID  原密码 新密码
$arrchangGroup = explode('=', $passchangGroup);
$userid = $arrchangGroup[0];
$useroldpass = $arrchangGroup[1];
$usernewpass = $arrchangGroup[2];
//构造sql语句 判断原密码是否正确
$sql_judge_oldpass = "Select SFUserId from t_sfuser where SFUserId = $arrchangGroup[0] and SFUserKey = '".md5($arrchangGroup[1])."'";
$result = $sqlHelper->execute_dql2($sql_judge_oldpass);
if(count($result) == 0){
	echo "nopass";
}else{
	//如果存在该用户 改密码 就进行修改密码
	$sql_update_pass = "Update t_sfuser Set SFUserKey = '".md5($arrchangGroup[2])."' where SFUserId = $arrchangGroup[0]";//修改密码sql
	$update_result = $sqlHelper->execute_dql($sql_update_pass);
	if($update_result){
		echo "Yes";
	}else{
		echo "No";
	}
}
?>