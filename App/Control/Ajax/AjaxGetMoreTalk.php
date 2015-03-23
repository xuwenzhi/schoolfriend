<?php
//加载更多说说
session_start();//开启session
$UserId = $_SESSION['USERID'];
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$TalkCount = $_POST['TalkCount'];//当前显示的产品推介的最大ID
$TalkCountLimit = $TalkCount + 5;
//建立查询 将接下来的产品推介获取
$sql_get_more_talk = "Select * from t_talk where SFUserId =$UserId order by TalkTime desc Limit $TalkCount, $TalkCountLimit";
$arr_get_more_talk = $sqlHelper->execute_dql2($sql_get_more_talk);
if(count($arr_get_more_talk)!=0){
	//通过json输出
	echo json_encode($arr_get_more_talk);
}else{
	echo "0";
}
?>