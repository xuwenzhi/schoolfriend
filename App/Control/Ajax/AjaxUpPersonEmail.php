<?php
//加载更多说说
session_start();//开启session
$UserId = $_SESSION['USERID'];
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$UserEmail = $_POST['UserEmail'];
$sql_update_email = "update t_sfuser set SFUserEmail = '".$UserEmail."' where SFUserId = $UserId";
$sql_update_email_result = $sqlHelper->execute_dql($sql_update_email);
if($sql_update_email_result!=""){
	echo "OK";
}else{
	echo "NO";
}
?>