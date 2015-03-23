<?php
//该文件主要响应  myclass.php 中的 ajax事件
//用于判断 用户是否重复加入 班级 或者 关注 班级
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$judgeVars = $_POST['judgeClassExists'];
$arr_judge_vars = explode('=', $judgeVars);
//$arr_judge_vars[0]  主要用于区分是用于判断  加入班级  还是  关注班级
if($arr_judge_vars[0] == 'judgeJoin'){
	//如果判断的是  是否重复加入班级
	$sql_judge_join = "Select count(SFUserId) from t_sfuser where (ClassID like '%".$arr_judge_vars[2]."' or ClassID like '%".$arr_judge_vars[2]."%' or ClassID like '".$arr_judge_vars[2]."%') and SFUserId = $arr_judge_vars[1]";
	$arr_judge_join = $sqlHelper->execute_dql2($sql_judge_join);
	echo $arr_judge_join[0][0];
}
if($arr_judge_vars[0] == 'judgeAtt'){
	$sql_judge_join = "Select count(SFUserId) from t_sfuser where (ClassFriendID like '%".$arr_judge_vars[2]."' or ClassFriendID like '%".$arr_judge_vars[2]."%' or ClassFriendID like '".$arr_judge_vars[2]."%') and SFUserId = $arr_judge_vars[1]";
	$arr_judge_join = $sqlHelper->execute_dql2($sql_judge_join);
	echo $arr_judge_join[0][0];
}