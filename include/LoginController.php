<?php
	//这里要将SESSION加入 并且还要注册一些SESSION变量
	header("Content-Type:text/html; charset=utf8");
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$UserLoginName = $_POST['UserLoginName'];  //登录名
	$UserLoginPass = md5($_POST['UserLoginPass']); //登录密码  并用md5加密
	//这里同样遵循注册时的要求 改变验证逻辑
	$sql_verify_login = "Select SFUserKey,SFUserId From t_sfuser Where SFUserLogin = '".$UserLoginName."'";
	$arr_virify_login = $sqlHelper->execute_dql2($sql_verify_login);

	$from_db_pass = $arr_virify_login[0]['SFUserKey'];  //取得数据库中该账户的密码
	//获取到该用户的ID
	if($from_db_pass == $UserLoginPass){
		//核实成功
		session_start();
		//session_register('USER'); //session变量      登录姓名
		//session_register('USERID');	//session变量      对应数据库的ID
		$_SESSION['USER'] = $UserLoginName;
		$_SESSION['USERID'] = $arr_virify_login[0]['SFUserId'];
		
		//这里将数据库t_sfuser表中的 SFUserState修改为1  即现在为登录状态
		$sql_update_loginstate = "update t_sfuser set SFUserState = 1 where SFUserId = $_SESSION[USERID]";
		$sqlHelper->execute_dql($sql_update_loginstate);
		
		//这里将该用户的登录时间写入数据库
		$sql_land_time = "Update t_sfuser Set SFULandTime = NOW(),SFULandTimes=SFULandTimes+1 Where SFUserID = $_SESSION[USERID]";//当前时间写入数据库
		$sqlHelper->execute_dql($sql_land_time);

		echo '<script> location.replace("../index.php")</script>';
		exit();
	}else{
		//密码输入错误
		echo '<script> alert("密码错误,请重新登录"); location.replace("../index.php")</script>';
		exit();
	}
?>