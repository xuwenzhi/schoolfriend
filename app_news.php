<?php
	
	session_start();
	require_once 'include/init.php'';
	require_once 'include/SqlHelper.class.php';
	require_once 'include/ComFunction.php';  //主要用到里面的 get_newstype_from_t_basecode()
	$sqlHelper = new SqlHelper();
	
	

	$sql_pagenow_news = "Select NewsId, NewsTitle, NewsAddTime,NewsCategory,SFUserId From t_news ";
	$sql_pagenow_news.=$sql_where;
	$sql_pagenow_news.= " order by NewsOrder desc,NewsId desc,NewsAddTime desc Limit $aa, $bb ";//建立该查询
	//echo $sql_pagenow_news;
	//执行改查询
	$sqlHelper->excute_dql_asspage($sql_all_news_count, $sql_pagenow_news, $assPage);
	//查询后 该页面的信息已经被保存到$assPage->pageArr中
	
	//分配一个分页的辅助变量
	if($assPage->pageNow%10==0){
		$smarty->assign("pageStart", $assPage->pageNow);
	}else{
		$smarty->assign("pageStart", $assPage->pageNow-($assPage->pageNow%10));
	}
	for($i = 0; $i<count($assPage->pageArr); $i++){
		$assPage->pageArr[$i]['type'] = $assPage->pageArr[$i]['NewsCategory'];
	}
	
	//这里对获取到的数组进行一个处理 希望能将其中取到的 新闻的类型 1  2  从t_basecode中获取到的 
	for($i = 0; $i<count($assPage->pageArr); $i++){
		$assPage->pageArr[$i]['NewsCategory'] = get_newstype_from_t_basecode($assPage->pageArr[$i]['NewsCategory']);
	}
	
	//分配新闻类别 和 新闻关键字
	if(isset($_GET['NewsCategory'])){
		if($_GET['NewsCategory']!="11111"){
			$smarty->assign('NewsCategory', $_GET['NewsCategory']);
		}
	}
	if(isset($_GET['NewsTitleKey'])){
		if($_GET['NewsTitleKey']!=""){
			$smarty->assign('NewsTitleKey', $_GET['NewsTitleKey']);
		}
	}
	//分配信息至模板
	$smarty->assign("XWGG" ,$assPage->pageArr); //分配新闻公告
	$smarty->assign("pageCount", $assPage->pageCount);//将页数分配
	$smarty->assign("pageSize", $assPage->pageSize);//将页面 记录数 分配
	$smarty->assign("pageNow", $assPage->pageNow); //将页面的当前页 分配
	
	
	//获取到新闻公告的类别
	$arr_get_news_codename = get_codeid_from_category(8);//主要用于进行搜索使用
	$smarty->assign("NEWSCODENAME", $arr_get_news_codename);
	
	//echo  json_encode($assPage->pageArr);
		
	$smarty->display("news.htm");
?>