<?php
//加入班级
session_start();//开启session
$UserId = $_SESSION['USERID'];
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$RecruitLikeInfor  = $_POST['RecruitLikeInfor'];
$RecruitLikeInfor = explode('-',$RecruitLikeInfor);
$UserId = $_SESSION['USERID'];
$RecruitId = $RecruitLikeInfor[0];
$HopeSalary = $RecruitLikeInfor[1];
$HopeClaim = $RecruitLikeInfor[2];
$AcceptType = $RecruitLikeInfor[3];

$sql_insert_recruit_like = "Insert into t_accept(RecruitId, SFUserId, AcceptTime, AcceptSalary, AcceptClaim, AcceptType )";
$sql_insert_recruit_like .= " values($RecruitId, $UserId, now(), '".$HopeSalary."', '".$HopeClaim."',".$AcceptType." )";
$sql_insert_recruit_like_result = $sqlHelper ->execute_dql($sql_insert_recruit_like);
if($sql_insert_recruit_like_result != ""){
	echo "OK";
}else{
	echo "NO";
}
?>