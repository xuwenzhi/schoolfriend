<?php
session_start();
header("Content-Type:text/html; charset=utf8");
require_once 'SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$UserId = $_SESSION['USERID'];//申请人
$RecruitId = $_GET['RecruitId'];//招聘信息的ID

//获取表单信息
$AcceptSalary = $_POST['HopeSalary'];//期望薪资
$AcceptClaim = $_POST['HopeClaim'];//期望的要求
$AcceptType = $_POST['RecruitType'];//是否兼职

//插入数据库
$sql_insert_recruit_like = "Insert into t_accept(RecruitId, SFUserId, AcceptTime, AcceptSalary, AcceptClaim, AcceptType)";
$sql_insert_recruit_like .=" values(".$RecruitId.", ".$UserId.", now(),'".$AcceptSalary."','".$AcceptClaim."', ".$AcceptType.")";
$sql_insert_recruit_like_result = $sqlHelper->execute_dql($sql_insert_recruit_like);

if($sql_insert_recruit_like_result!=""){
	echo '<script> alert("操作成功!"); history.go(-1) ;</script>';
	exit();
}else{
	echo '<script> alert("操作失败，请重试"); history.go(-1) ;</script>';
	exit();
}

?>