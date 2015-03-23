<?php
	//该文件用于处理 (添加) 例如 新闻公告   今昔趣事 供求信息  等等等的功能
	header("Content-Type:text/html; charset=utf8");
	session_start();
	require_once 'SqlHelper.class.php';
	require_once '../PubFunction.php';
	$sqlHelper = new SqlHelper();
	if(@$_POST['submitAddApply']!=""){
		//如果点击了添加
		$Title = $_POST['Title']; //标题
		$Claim = $_POST['Claim'];//内容
		$Type = $_POST['Type'];//是否兼职
		$ApplyETime = $_POST['ApplyETime'];//结束时间
		$Salary = $_POST['Salary'];//薪资
		$Location = $_POST['Location'];//发布区域
		$Trade = $_POST['Trade'];//行业
		$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']); //通过用户名来获取该用户的id
		$sql_insert_apply = "Insert into t_apply(ApplyUnit,ApplyTrade,ApplyClaim,ApplyType,ApplyETime,ApplySalary,ApplyLocation,SFUserId,ApplyTime)";
		$sql_insert_apply.=" Values('".$Title."','".$Trade."','".$Claim."','".$Type."','".$ApplyETime."','".$Salary."','".$Location."','".$UserId."',Now())";
		$insert_result = $sqlHelper->execute_dql($sql_insert_apply);
		if($insert_result != ""){
			echo '<script> alert("成功添加求职信息!"); location.replace("../bkapplys.php")</script>';
			exit();
		}else{
			echo '<script> alert("添加求职信息失败，请重试!"); location.replace("../addApply.php")</script>';
			exit();
		}
	}