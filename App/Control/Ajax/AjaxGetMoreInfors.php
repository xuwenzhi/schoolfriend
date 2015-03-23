<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$InforCount = $_POST['InforCount'];//当前显示的产品推介的最大ID
$InforCountLimit = $InforCount + 15;
//建立查询 将接下来的产品推介获取
$sql_get_more_infors = "Select InfoId, InfoTitle, InfoRTime,InfoType from t_information order by InfoOrder desc,InfoId desc Limit $InforCount, $InforCountLimit";
$arr_get_more_infors = $sqlHelper->execute_dql2($sql_get_more_infors);
if(count($arr_get_more_infors)!=0){
	//如果需要加在更多产品推介 存在
	for($i = 0; $i< count($arr_get_more_infors); $i++){
		$arr_get_more_infors[$i]['InfoTitle'] = utf8Substr($arr_get_more_infors[$i]['InfoTitle'], 0, 12)."...";
	}
	//通过json输出
	echo json_encode($arr_get_more_infors);
}else{
	echo "0";
}
?>