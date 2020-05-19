<?php
	session_start();//开启session
	require_once 'include/init.php';
	require_once 'include/SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";
	//调新闻公告
	$sql_news_index = "Select NewsId, NewsTitle,NewsAddTime,NewsCategory From t_news order by NewsOrder desc,NewsId desc Limit 0, 13";
	$arr_news_index = $sqlHelper->execute_dql2($sql_news_index);
	$smarty->assign("index_news", $arr_news_index);
	//调昔日趣事
	$sql_thing_index = "Select ThingId,ThingTitle,ThingTime From t_thing order by ThingId Limit 0,11";
	$arr_thing_index = $sqlHelper->execute_dql2($sql_thing_index);
	//print_r($arr_thing_index);
	$smarty->assign("index_thing",$arr_thing_index);
	
	//调产品推介
	$sql_get_product = "select ProductId, ProductName, ProductRTime from t_product where ProductETime>now() and Visibility=1 order by ProductOrder desc limit 0, 11";
	$arr_get_product = $sqlHelper->execute_dql2($sql_get_product);
	$smarty->assign("product", $arr_get_product);
	
	//调招聘信息
	$sql_get_recruits = "Select RecruitPosition,RecruitId,RecruitTime from t_recruit  where RecruitETime>now() order by RecruitOrder desc limit 0, 11";
	$arr_get_recruits = $sqlHelper->execute_dql2($sql_get_recruits);
	$smarty->assign("recruits", $arr_get_recruits);
	
	//调今昔风采 也就是 老照片
	$sql_get_miens = "Select PhotoAdd,PhotoType,PhotoId from t_photo where Visibility = 1 order by PhotoTime desc";
	$arr_get_miens = $sqlHelper->execute_dql2($sql_get_miens);
	$smarty->assign("JXFC", $arr_get_miens);
	$smarty->display("index.htm");
?>
