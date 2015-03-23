<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$RecruitCount = $_POST['RecruitCount'];
$RecruitCountLimit = $RecruitCount + 15;
//echo $RecruitCount;
//echo $RecruitCountLimit;
//建立查询 将接下来的新闻公告获取
$sql_get_more_recruit = "Select RecruitId, RecruitTitle, RecruitTime From t_recruit where RecruitETime>now() order by RecruitOrder desc,RecruitId desc Limit $RecruitCount, $RecruitCountLimit ";
//echo $sql_get_more_recruit;
$arr_get_more_recruit = $sqlHelper->execute_dql2($sql_get_more_recruit);
if(count($arr_get_more_recruit)!=0){
	//如果需要加在更多新闻 存在
	for($i = 0; $i< count($arr_get_more_recruit); $i++){
		$arr_get_more_recruit[$i]['RecruitTitle'] = utf8Substr($arr_get_more_recruit[$i]['RecruitTitle'], 0, 12)."...";
	}
	//通过json输出
	echo json_encode($arr_get_more_recruit);
}else{
	echo "0";
}
?>