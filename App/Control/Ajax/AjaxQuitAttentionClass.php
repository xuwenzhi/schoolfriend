<?php
session_start();
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$UserId = $_SESSION['USERID'];//用户ID
$ClassFriendId = $_POST['ClassId'];//要取消关注的班级ID
//下面构造该用户退出该班级
//不是那么容易  需要先获取到当前这个用户数据库中的ClassID中的字符串
$sql_get_user_classfriendid = "Select ClassFriendId from t_sfuser where SFUserId = $UserId";
$arr_get_user_classfriendid = $sqlHelper->execute_dql2($sql_get_user_classfriendid);
$DbClassFriendId = $arr_get_user_classfriendid[0]['ClassFriendId'];//数据库中的ClassID的值
//需要在$DbClassId中识别出当前用户要删除的字符串
//首先$DbClassId 中出现了 用户要退出班级 ClassId的位置
$ClassFriendStrpos = strpos($DbClassFriendId, $ClassFriendId, 0);//子字符串首次出现的位置
//先来执行一个判断 如果在该用户的DbClassID 中没有找到用户要退出的班级的ID 应该给一个提示 说明 信息加载出错
/*
if($ClassFriendStrpos === false){
	echo "InforError";
	exit;
}
*/

$DbClassFriendIdLength = strlen($DbClassFriendId);//数据库中的ClassID的长度
$ClassFriendIdLength = strlen($ClassFriendId)+1;//要删除的字符串的长度
if($DbClassFriendIdLength == $ClassFriendIdLength-1){
	$DbClassFriendId = "";
}
else{
	//然后下面通过一个for循环来将$ClassId  在 $DvClassId  中删除
	for($i = $ClassFriendStrpos; $i<$DbClassFriendIdLength-$ClassFriendIdLength; $i++){
		$DbClassFriendId[$i] = $DbClassFriendId[$i+$ClassFriendIdLength];
	}
	//下面进行一下截取  将后面剩余的不要了 
	$DbClassFriendId = substr($DbClassFriendId, 0, $DbClassFriendIdLength-$ClassFriendIdLength);
}
//现在的$DbClassId 就是已经删除完班级的 ClassId 字符串了  现在执行修改数据库
$sql_update_classfriendid = "update t_sfuser set ClassFriendId = '".$DbClassFriendId."' where SFUserId = $UserId";
$sql_update_classfriendid_result = $sqlHelper->execute_dql($sql_update_classfriendid);
if($sql_update_classfriendid_result!=""){
	echo "OK";
	exit;
}else{
	echo "NO";
	exit;
}
?>