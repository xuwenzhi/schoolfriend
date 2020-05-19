<?php
	session_start();
	require_once 'include/init.php';
	require_once 'include/SqlHelper.class.php';
	require_once 'include/AssPage.class.php';
	require_once 'include/ComFunction.php';  //主要用到里面的 get_newstype_from_t_basecode()
	
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";
	
	$sqlHelper = new SqlHelper();
	$assPage = new AssPage();
	/*	引新闻公告
	 * 添加时间来获取新闻公告
	 * 每页显示 20个
	 */
	
	$assPage->pageSize = 15; //每页显示20个
	//下面查看是否存在pageNow
	if(isset($_GET['pageNow'])){
		$assPage->pageNow = $_GET['pageNow'];
	}else{
		$assPage->pageNow = 1;
	}
	
	//为了配合搜索的需要，在这里需要对搜索条件进行调整，都在URL中
	//	1新闻类别
	if(isset($_GET['NewsCategory'])){
		$NewsCategory = $_GET['NewsCategory'];
	}else{
		$NewsCategory = "";
	}
	//  2关键字 
	if(isset($_GET['NewsTitleKey'])){
		$NewsTitleKey = $_GET['NewsTitleKey'];
	}else{
		$NewsTitleKey ="";
	}
	$sql_where = " where";
	if($NewsCategory != "11111"){
		$sql_where .= " NewsCategory = $NewsCategory and ";
	}else{
		$sql_where.="";
	}
	if($NewsTitleKey !=""){
		$sql_where .= " locate('".$NewsTitleKey."', NewsTitle)<>0";
	}else{
		$sql_where = substr($sql_where, 0, strlen($sql_where)-5); //如果存在 新闻分类条件   但不存在 搜索关键字条件  去掉 and  
	}
	if($sql_where == " where" || $NewsCategory==""){//如果没有 搜索条件  
		$sql_where = "";
	}
	//查询出数据库中新闻公告的个数
	$sql_all_news_count = "Select count(NewsId) From t_news";
	$sql_all_news_count .=$sql_where;
	//建立查询 获取当前页面的数据
	$aa = ($assPage->pageNow-1)*$assPage->pageSize;//每一页的起始位置
	$bb = $aa+$assPage->pageSize;
	$sql_pagenow_news = "Select NewsId, NewsTitle, NewsAddTime,NewsCategory,SFUserId From t_news ";
	$sql_pagenow_news.=$sql_where;
	$sql_pagenow_news.= " order by NewsOrder desc,NewsId desc,NewsAddTime desc Limit $aa, $bb ";//建立该查询
	//执行改查询
	$sqlHelper->excute_dql_asspage($sql_all_news_count, $sql_pagenow_news, $assPage);

	//查询后 该页面的信息已经被保存到$assPage->pageArr中
	//分配一个分页的辅助变量
	if ($assPage->pageNow%10==0){
		$smarty->assign("pageStart", $assPage->pageNow);
	} else {
		$smarty->assign("pageStart", $assPage->pageNow-($assPage->pageNow%10));
	}
	for ($i = 0; $i<count($assPage->pageArr); $i++) {
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
