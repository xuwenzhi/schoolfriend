<?php
	header("Content-Type:text/html; charset=utf8");
	$username = $_POST['NewID'];  //取得用户输入的用户名
	require_once '../SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$sql_check_user = "Select count(SFUserId) From t_sfuser Where SFUserLogin = '".$username."'";
	$arr = $sqlHelper->execute_dql2($sql_check_user);
	echo $arr[0][0];
?>