<?php
//加入班级
session_start();//开启session
$UserId = $_SESSION['USERID'];
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$ClassFriendId = $_POST['ClassFriendId'];
//这里先判断在该用户的ClassID  或者 ClassFriendId中是否已经存在了该班级 如果存在是不允许重复加入的
$judgeClassId = judgeRepeatClass($UserId, $ClassFriendId);
if($judgeClassId == 'ClassIDRepeat'){
	echo "ClassIDRepeat";
	exit;
}else if($judgeClassId == 'ClassFriendIDRepeat'){
	echo "ClassFriendIDRepeat";
	exit;
}
//首先判断该用户的ClassId之前有没有班级 如果有 可能是这样  65 如果没有 就是空的 
//至于这个判断 在ComFunctions.php中写一个函数来判断
$DbClassFriendId = judgeClassIdORClassFriendId($UserId, 'ClassFriendId'); //获取到当前用户的ClassID字段的值
if($DbClassFriendId!=""){
	$DbClassFriendId .= ",".$ClassFriendId;//组合成形如 65,66,70这样的字符串
	$sql_user_attention_class = "Update t_sfuser set ClassFriendId = '".$DbClassFriendId."' where  SFUserId = $UserId";
	//echo $sql_user_attention_class;
	$sql_user_attention_class_result = $sqlHelper->execute_dql($sql_user_attention_class);
	if($sql_user_attention_class_result!=""){
		echo "OK";
	}else{
		"NO";
	}
}else{
	$sql_user_attention_class = "Update t_sfuser set ClassFriendId = '".$ClassFriendId."' where  SFUserId = $UserId";
	$sql_user_attention_class_result = $sqlHelper->execute_dql($sql_user_attention_class);
	if($sql_user_attention_class_result!=""){
		echo "OK";
	}else{
		"NO";
	}
}


?>