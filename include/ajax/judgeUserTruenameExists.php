<?php
//该页面用于判断用户在加入班级的时候 是否已经填写了真实姓名
header("Content-Type:text/html; charset=utf8");
$UserId = $_POST['UserId'];
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$sql_judge_user_truename = "Select SFUserTrueName from t_sfuser where SFUserId = $UserId";
$arr_judge_user_truename = $sqlHelper->execute_dql2($sql_judge_user_truename);
if($arr_judge_user_truename[0]['SFUserTrueName']==""){
	echo '1';
}else{
	echo '0';
}