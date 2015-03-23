<?php
	session_start();
	if($_POST['Submit']!=""){
		require_once '../include/smarty/Smarty.class.php';
		require_once '../include/SqlHelper.class.php';
		require_once '../include/ComFunction.php';  //主要用到里面的 get_newstype_from_t_basecode()
		$sqlHelper = new SqlHelper();
		
		$ID = $_POST['ID'];
		//echo $ID;
		$sql_pagenow_news = "Select NewsId, NewsTitle,NewsAddTime From t_news where NewsId > $ID order by NewsOrder desc,NewsId desc,NewsAddTime desc limit 0, 10 ";
		//echo $sql_pagenow_news;
			
		$arr_pagenow_news = $sqlHelper->execute_dql2($sql_pagenow_news);
		echo json_encode($arr_pagenow_news);
		//echo  json_encode($assPage->pageArr);
	}
	if($_POST['UPID'] || $_POST['DOWNID']){
		if($_POST['UPID']!=""){
			
		}
		if($_POST['DOWNID']!=""){
		}
	}
?>