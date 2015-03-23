<?php
//该文件主要响应  myclass.php 中的 ajax事件
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();

$joinClass = $_POST['joinClass'];
$arr_join_class = explode('=', $joinClass);
$userid = $arr_join_class[0]; //用户id
$classid = $arr_join_class[1];//班级id

//首先将用户的 ClassId 的内容 取出来   为 1,2,3,4 此类型 所以 如果要修改 最好先取出来
$sql_get_user_classid = "Select ClassFriendId from t_sfuser where SFUserId = $userid";
$arr_get_user_classid = $sqlHelper->execute_dql2($sql_get_user_classid);

$userClassid = "";
//现在修改
if($arr_get_user_classid[0]['ClassFriendId']==""){  //如果之前没有参加任何班级
	$userClassid .= $classid;
}else{
	$userClassid = $arr_get_user_classid[0]['ClassFriendId'];//这是之前的ClassId
	$userClassid .= ",".$classid;
}
//将现在的ClassId 插入到表中
$sql_insert_classid = "update t_sfuser Set ClassFriendId = '".$userClassid."' where SFUserId = $userid";
$insert_result = $sqlHelper->execute_dql2($sql_insert_classid);
if($insert_result !=""){
	echo '1';
}else{
	echo '0';
}



?>