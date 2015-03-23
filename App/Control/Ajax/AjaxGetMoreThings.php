<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$ThingCount = $_POST['ThingCount'];
$ThingCountLimit = $ThingCount + 15;
//建立查询 将接下来的新闻公告获取
$sql_get_more_things = "Select ThingId, ThingTitle, ThingTime from t_thing order by ThingOrder desc,ThingId desc Limit $ThingCount, $ThingCountLimit";
$arr_get_more_things = $sqlHelper->execute_dql2($sql_get_more_things);
if(count($arr_get_more_things)!=0){
	//如果需要加在更多新闻 存在
	for($i = 0; $i< count($arr_get_more_things); $i++){
		$arr_get_more_things[$i]['ThingTitle'] = utf8Substr($arr_get_more_things[$i]['ThingTitle'], 0, 16)."...";
	}
	//通过json输出
	echo json_encode($arr_get_more_things);
}else{
	echo "0";
}
?>