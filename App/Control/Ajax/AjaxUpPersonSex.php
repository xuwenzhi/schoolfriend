<?php
//加载更多说说
session_start();//开启session
$UserId = $_SESSION['USERID'];
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$UserSex = $_POST['UserSex'];
$sql_update_sex = "update t_sfuser set SFUserSex = '".$UserSex."' where SFUserId = $UserId";
$sql_update_sex_result = $sqlHelper->execute_dql($sql_update_sex);
if($sql_update_sex_result!=""){
	echo "OK";
}else{
	echo "NO";
}
?>