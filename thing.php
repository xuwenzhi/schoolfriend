<?php
	session_start();
	require_once 'include/init.php';
	require_once 'include/SqlHelper.class.php';
	require_once 'include/AssPage.class.php';
	
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";
	
	$sqlHelper = new SqlHelper();
	$assPage = new AssPage();
	/*	引昔日趣事
	 * 添加时间来获取昔日趣事
	 * 每页显示 20个
	 */
	
	$assPage->pageSize = 20; //每页显示20个
	//下面查看是否存在pageNow
	if(isset($_GET['pageNow'])){
		$assPage->pageNow = $_GET['pageNow'];
	}else{
		$assPage->pageNow = 1;
	}
	//查询出数据库中昔日趣事的个数
	$sql_all_thing_count = "Select count(ThingId) From t_thing";
	//建立查询 获取当前页面的数据
	$aa = ($assPage->pageNow-1)*$assPage->pageSize;//每一页的起始位置
	$bb = $aa+$assPage->pageSize;
	$sql_pagenow_thing = "Select ThingId, ThingTitle, ThingTime From t_thing order by ThingOrder desc,ThingId desc Limit $aa, $bb ";//建立该查询
	//执行改查询
	$sqlHelper->excute_dql_asspage($sql_all_thing_count, $sql_pagenow_thing, $assPage);
	//查询后 该页面的信息已经被保存到$assPage->pageArr中
	
	//分配一个分页的辅助变量
	if($assPage->pageNow%10==0){
		$smarty->assign("pageStart", $assPage->pageNow);
	}else{
		$smarty->assign("pageStart", $assPage->pageNow-($assPage->pageNow%10));
	}
	
	//分配信息至模板
	$smarty->assign("XRQS" ,$assPage->pageArr); //分配昔日趣事
	$smarty->assign("pageCount", $assPage->pageCount);//将页数分配
	$smarty->assign("pageSize", $assPage->pageSize);//将页面 记录数 分配
	$smarty->assign("pageNow", $assPage->pageNow); //将页面的当前页 分配
	
	
	$smarty->display("thing.htm");
?>