<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$ApplyCount = $_POST['ApplyCount'];
$ApplyCountLimit = $ApplyCount + 10;

$sql_get_more_apply = "Select ApplyId, ApplyUnit, ApplyTime From t_apply where ApplyETime>now() order by ApplyId desc Limit $ApplyCount,$ApplyCountLimit";

$arr_get_more_apply = $sqlHelper->execute_dql2($sql_get_more_apply);
if(count($arr_get_more_apply)!=0){
	for($i = 0; $i< count($arr_get_more_apply); $i++){
		$arr_get_more_apply[$i]['ApplyUnit'] = utf8Substr($arr_get_more_apply[$i]['ApplyUnit'], 0, 12)."...";
	}
	//通过json输出
	echo json_encode($arr_get_more_apply);
}else{
	echo "0";
}
?>