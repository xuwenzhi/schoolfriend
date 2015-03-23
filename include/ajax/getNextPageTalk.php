<?php
//该文件 用于处理 mytalk.php  中 点击 下一页 获取下一页的信息
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
session_start();//开启session
//该页面用于处理从 myinforedit.php 来临的页面 用于修改用户的基本资料
$user_id = $_SESSION['USERID'];//用户ID

$pageNow  = $_POST['pageNow'];//取得需要获取的页面的 页数
//建立这样的查询
$pageNow = $pageNow *5;
$sql_get_page_talk = "Select * from t_talk where SFUserId = $user_id order by TalkTime desc limit $pageNow , 5";
$arr_get_page_talk = $sqlHelper->execute_dql2($sql_get_page_talk);
//将信息以json方式输出
echo json_encode($arr_get_page_talk);
?>