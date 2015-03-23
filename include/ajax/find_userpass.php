<?php
	//该页面用于寻找用户密码
	//从common.js传来的数据
	header("Content-Type:text/html; charset=utf8");
	$username = $_POST['username'];
	require_once '../SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$sql_find_pass = "Select SFUserEmail From t_sfuser Where SFUserLogin='".$username."'";
	$arr_find_pass = $sqlHelper->execute_dql2($sql_find_pass);
	if($arr_find_pass){
		echo $arr_find_pass[0]['SFUserEmail'];
	}else{
		
	}
?>