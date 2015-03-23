<?php
//发表说手
session_start();//开启session
$UserId = $_SESSION['USERID'];
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$TalkContent = $_POST['TalkContent'];
$sql_insert_talk = "Insert into t_talk (TalkContent, TalkTime, SFUserId) values('".$TalkContent."', now(), $UserId)";
$sql_insert_talk_result = $sqlHelper->execute_dql($sql_insert_talk);
if($sql_insert_talk_result!=""){
	echo "OK";
}else{
	echo "NO";
}
?>