<?php
session_start();
require_once 'include/smarty/Smarty.class.php';
require_once 'include/SqlHelper.class.php';
$smarty = new Smarty();
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";

$sqlHelper = new SqlHelper();
if(!isset($_GET['news_id'])){ //如果没有新闻公告id就回到新闻列表
	echo '<script> location.replace("news.php")</script>';
	exit();
}else{
	$news_id = $_GET['news_id'];
	
	//增加浏览次数
	$sql_add_visittimes = "update t_news set NewsVisitTimes=NewsVisitTimes+1 Where NewsId = $news_id";
	$sqlHelper->execute_dql($sql_add_visittimes);
	
	//建立查询来获取到该新闻内容
	$sql_news_con = "Select * from t_news where NewsId = $news_id";
	//获取新闻信息
	$arr_news_con = $sqlHelper->execute_dql2($sql_news_con);
	//查询到新闻的作者    肯定是真是姓名
	$sql_news_writer = "Select SFUserTrueName From t_sfuser where SFUserId = ".$arr_news_con[0]['SFUserId']."";
	$arr_news_writer = $sqlHelper->execute_dql2($sql_news_writer);
	//分配新闻作者
	$smarty->assign("NewsWrite", $arr_news_writer[0]['SFUserTrueName']);
	//分配新闻信息
	$smarty->assign("News_Con", $arr_news_con);
	
	//分配新闻类别的热点文章
	if(isset($_GET['type'])){
		$type = $_GET['type'];
	}
	$sql_news_hot = "Select * From t_news where NewsCategory = $type order by NewsVisitTimes desc,NewsAddTime desc Limit 0, 10";
	$arr_news_hot = $sqlHelper->execute_dql2($sql_news_hot);
	$smarty->assign("RDWZ",$arr_news_hot);
	$smarty->assign("TYPE", $type);
	
	$smarty->display("news_con.htm");
}