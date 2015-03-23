<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';

$UserName = trim($_POST['UserName']);//ำรปงร๛
$UserPass = trim($_POST['UserPass']);//รÜย๋
$sqlHelper = new SqlHelper();

$sql_check_username = "Select SFUserId, SFUserKey from t_sfuser where SFUserLogin = '$UserName'";
//echo $sql_check_username;
$result_arr_check_username = $sqlHelper->execute_dql2($sql_check_username);
if(count($result_arr_check_username) == 0){
	echo "NOUSER";
}else{
	$UserPassFromDB = "";
	$UserPassFromDB = $result_arr_check_username[0]['SFUserKey'];
	if($UserPassFromDB == md5($UserPass)){
		echo $UserName."&".$result_arr_check_username[0]['SFUserId'];
	}else{
		echo "NO";
	}
}

?>