<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$RecruitUserLike = $_POST['RecruitUserLike'];
//echo $RecruitUserLike;
$RecruitUserLike = explode('-', $RecruitUserLike);
$RecruitUserLikeCount = $RecruitUserLike[0];
$RecruitUserLikeCountLimit = $RecruitUserLikeCount + 3;
$RecruitId = $RecruitUserLike[1];
//建立查询 将接下来的新闻公告获取
$sql_get_more_recruitlike = "Select * from t_accept where RecruitId=$RecruitId order by AcceptId desc limit $RecruitUserLikeCount, $RecruitUserLikeCountLimit";
//echo $sql_get_more_recruitlike;
$arr_get_more_recruitlikes = $sqlHelper->execute_dql2($sql_get_more_recruitlike);
if(count($arr_get_more_recruitlikes)!=0){
	//如果需要加在更多新闻 存在
	for($i = 0; $i< count($arr_get_more_recruitlikes); $i++){
		$arr_get_more_recruitlikes[$i]['SFUserId'] = getUserFromTsfuser($arr_get_more_recruitlikes[$i]['SFUserId']);
	}
	//通过json输出
	echo json_encode($arr_get_more_recruitlikes);
}else{
	echo "0";
}
?>