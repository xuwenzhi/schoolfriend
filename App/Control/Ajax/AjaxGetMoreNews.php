<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$NewsCount = $_POST['NewsCount'];
$NewsCountLimit = $NewsCount + 15;
//建立查询 将接下来的新闻公告获取
$sql_get_more_news = "Select NewsId, NewsTitle, NewsAddTime,NewsCategory,SFUserId From t_news order by NewsOrder desc,NewsId desc,NewsAddTime desc Limit $NewsCount, $NewsCountLimit ";
$arr_get_more_news = $sqlHelper->execute_dql2($sql_get_more_news);
if(count($arr_get_more_news)!=0){
	//如果需要加在更多新闻 存在
	for($i = 0; $i< count($arr_get_more_news); $i++){
		$arr_get_more_news[$i]['NewsTitle'] = utf8Substr($arr_get_more_news[$i]['NewsTitle'], 0, 12)."...";
	}
	//通过json输出
	echo json_encode($arr_get_more_news);
}else{
	echo "0";
}
?>