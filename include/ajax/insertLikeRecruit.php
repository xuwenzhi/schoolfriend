<?php
//用于响应 对招聘信息感兴趣  处理文件在 js/fonts.js中
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$RecruitLike = $_POST['RecruitLike'];
$arr_recruit_like = explode('-', $RecruitLike);
$UserId = $arr_recruit_like[0]; //用户Id
$RecruitId = $arr_recruit_like[1];//招聘Id
$RecruitSalary = $arr_recruit_like[2];//薪水
$RecruitClaim = $arr_recruit_like[3];//要求
$RecruitType = $arr_recruit_like[4]; //全职还是兼职

//首先先建立一个查询 判断这个人是不是之前已经感兴趣过了 
$sql_judge = "Select count(AcceptId) from t_accept where SFUserId = $UserId and RecruitId = $RecruitId";
$arr_judge = $sqlHelper->execute_dql2($sql_judge);
if($arr_judge[0][0]!=0){
	echo "second";
	exit();
}

$sql_insert_recruit_like = "insert into t_accept(RecruitId,SFUserId, AcceptTime,AcceptSalary,AcceptClaim,AcceptType)";
$sql_insert_recruit_like .=" values(".$RecruitId.", ".$UserId.", now(),'".$RecruitSalary."', '".$RecruitClaim."', $RecruitType)";
$result_insert = $sqlHelper->execute_dql($sql_insert_recruit_like);
if($result_insert!=""){
	echo "1";
}else{
	echo "0";
}