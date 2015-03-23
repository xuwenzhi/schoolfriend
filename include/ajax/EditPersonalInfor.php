<?php
	require_once '../SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	session_start();//开启session
	//该页面用于处理从 myinforedit.php 来临的页面 用于修改用户的基本资料
	$user_id = $_SESSION['USERID'];//用户ID
	
	//获取上一页的信息
	$userinfo =  $_POST['username'];//为一个字符串
	$arr_user_info = explode("=", $userinfo);
	//构造Sql语句
	$sql_update_user_info = " Update t_sfuser Set";
	$sql_update_user_info.= " SFUserTrueName = '".$arr_user_info[0]."',";  //真实姓名
	$sql_update_user_info.= " SFUserSex= $arr_user_info[1]".",";	//性别
	$sql_update_user_info.= " HomeTown = '".$arr_user_info[2]."',";	//故乡
	$sql_update_user_info.= " SFUserPreAdd = '".$arr_user_info[3]."',";	//现居地
	$sql_update_user_info.= " SFUserQq = '".$arr_user_info[4]."',";	//QQ号码
	$sql_update_user_info.= " SFUserEmail = '".$arr_user_info[5]."',";	//邮箱
	$sql_update_user_info.= " SFUserTel='".$arr_user_info[6]."',";	//电话号码
	$sql_update_user_info.= " SFUserBirthday = '".$arr_user_info[7]."'";	//生日
	$sql_update_user_info.=" where SFUserId = $user_id ;";
	$result = $sqlHelper->execute_dql($sql_update_user_info);
	if($result){
		echo 1;  //如果成功 输入 1  反应给 myinforedit.php
	}else{
		echo 0;
	}
?>