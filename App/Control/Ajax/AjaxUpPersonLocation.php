<?php
//加载更多说说
session_start();//开启session
$UserId = $_SESSION['USERID'];
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$UserLocation = $_POST['UserLocation'];
$sql_update_location = "update t_sfuser set SFUserPreAdd = '".$UserLocation."' where SFUserId = $UserId";
//echo $sql_update_location;
$sql_update_location_result = $sqlHelper->execute_dql($sql_update_location);
if($sql_update_location_result!=""){
	echo "OK";
}else{
	echo "NO";
}
?>