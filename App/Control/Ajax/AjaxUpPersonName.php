<?php
//加载更多说说
session_start();//开启session
$UserId = $_SESSION['USERID'];
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$UserTrueName = $_POST['UserTrueName'];
$sql_update_truename = "update t_sfuser set SFUserTrueName = '".$UserTrueName."' where SFUserId = $UserId";
$sql_update_truename_result = $sqlHelper->execute_dql($sql_update_truename);
if($sql_update_truename_result!=""){
	echo "OK";
}else{
	echo "NO";
}
?>