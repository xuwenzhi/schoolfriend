<?php
//用于删除说说
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
//首先获取要删除说说的 ID
$TalkId = $_POST['TalkId'];
//建立删除SQL语句
$sql_delete_talk = "delete from t_talk where TalkId = $TalkId";
//执行删除
$sql_delete_talk_result = $sqlHelper->execute_dql($sql_delete_talk);
if($sql_delete_talk_result!=""){
	echo "OK";
}else{
	echo "NO";
}
?>