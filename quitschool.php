<?php
	header("Content-Type:text/html; charset=utf8");
	session_start();
	include_once 'include/SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	//将用户登录的状态修改为 0 
	$sql_update_loginstate = "update t_sfuser set SFUserState = 0 where SFUserId = $_SESSION[USERID]";
	$sqlHelper->execute_dql($sql_update_loginstate);
	session_destroy();
	echo '<script> alert("退出成功!"); location.replace("index.php")</script>';
	exit();
?>