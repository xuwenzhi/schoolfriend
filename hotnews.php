<?php

	require_once 'include/smarty/Smarty.class.php';
	require_once 'include/SqlHelper.class.php';
	$smarty = new Smarty();
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";

	$sqlHelper = new SqlHelper();
	
	//调热点文章按浏览次数取得  
	$sql_get_hotnews = "Select NewsId, NewsTitle,NewsAddTime,NewsCategory From t_news order by NewsVisitTimes desc,NewsAddTime desc Limit 0, 10";
	$arr_get_hotnews = $sqlHelper->execute_dql2($sql_get_hotnews);
	$smarty->assign("RDWZ",$arr_get_hotnews);
	
	$smarty->display("hotnews.htm");
?>