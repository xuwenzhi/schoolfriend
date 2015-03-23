<?php
	header("Content-Type:text/html; charset=utf8");
	require_once '../SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	session_start();//开启session
	//该页面用于处理从 myinforedit.php 来临的页面 用于修改用户的基本资料
	$user_id = $_SESSION['USERID'];//用户ID
	
	//从文件myjobedit.php中获取的变量
	$userJob = $_POST['userJob'];  
	//将变量转换成数组
	$userJob = explode('=', $userJob);
	//下面构造sql语句 将用户的信息填写进数据库
	$sql_user_job = "Update t_sfuser Set ";
	$sql_user_job .= "LastDegree =".$userJob[0].","; //学历
	$sql_user_job .= "SFUserRank =".$userJob[1].",";//职称
	$sql_user_job .= "SFUserPosition='".$userJob[2]."',";//职位
	$sql_user_job .= "SFUserWTel='".$userJob[3]."',";
	$sql_user_job .= "SFUserCompany='".$userJob[4]."',";
	$sql_user_job .= "SFUserRelasion=".$userJob[5].",";
	$sql_user_job .= "CompanyTrade ='".$userJob[6]."',";
	$sql_user_job .= "CompanyType =".$userJob[7].",";
	$sql_user_job .= "CompanyAdd ='".$userJob[8]."',";
	$sql_user_job .= "CompanyPresent ='".$userJob[9]."',";
	$sql_user_job .= "SFUserExperience ='".$userJob[10]."'";
	$sql_user_job .= " where SFUserId = $user_id";
	$jobResult = $sqlHelper->execute_dql($sql_user_job);
	if($jobResult){
		echo 1;
	}else{
		echo 0;
	}
?>