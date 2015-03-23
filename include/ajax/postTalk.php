<?php
//该文件用于发表说说  响应的文件是  mytalk.php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();

$TalkGroup = $_POST['TalkGroup'];
$arr_talk_group = explode('-', $TalkGroup);

$UserId = $arr_talk_group[0];//用户 ID
$Talk = $arr_talk_group[1];//发表说说内容
//构造sQL语句
$sql_insert_talk = "Insert into t_talk(TalkContent, SFUserId, TalkTime)";
$sql_insert_talk .= "values('$Talk',$UserId, now())";

$result_talk =  $sqlHelper->execute_dql($sql_insert_talk);
if($result_talk!=""){
	echo "1";
}else{
	echo "0";
}