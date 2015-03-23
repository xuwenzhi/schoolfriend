<?php
session_start();
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$UserId = $_SESSION['USERID'];//用户ID
$ClassId = $_POST['ClassId'];//要退出的班级ID
//下面构造该用户退出该班级
//不是那么容易  需要先获取到当前这个用户数据库中的ClassID中的字符串
$sql_get_user_classid = "Select ClassID from t_sfuser where SFUserId = $UserId";
$arr_get_user_classid = $sqlHelper->execute_dql2($sql_get_user_classid);
$DbClassId = $arr_get_user_classid[0]['ClassID'];//数据库中的ClassID的值
//需要在$DbClassId中识别出当前用户要删除的字符串
//首先$DbClassId 中出现了 用户要退出班级 ClassId的位置
$ClassStrpos = strpos($DbClassId, $ClassId, 0);//子字符串首次出现的位置


$DbClassIdLength = strlen($DbClassId);//数据库中的ClassID的长度
$ClassIdLength = strlen($ClassId)+1;//要删除的字符串的长度
if($DbClassIdLength == $ClassIdLength-1){
	$DbClassId = "";
}
else{
	//然后下面通过一个for循环来将$ClassId  在 $DvClassId  中删除
	for($i = $ClassStrpos; $i<$DbClassIdLength-$ClassIdLength; $i++){
		$DbClassId[$i] = $DbClassId[$i+$ClassIdLength];
	}
	//下面进行一下截取  将后面剩余的不要了 
	$DbClassId = substr($DbClassId, 0, $DbClassIdLength-$ClassIdLength);
}
//现在的$DbClassId 就是已经删除完班级的 ClassId 字符串了  现在执行修改数据库
$sql_update_classid = "update t_sfuser set ClassID = '".$DbClassId."' where SFUserId = $UserId";
$sql_update_classid_result = $sqlHelper->execute_dql($sql_update_classid);
if($sql_update_classid_result!=""){
	echo "OK";
	exit;
}else{
	echo "NO";
	exit;
}
?>