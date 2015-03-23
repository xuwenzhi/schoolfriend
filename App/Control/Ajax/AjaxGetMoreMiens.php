<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$AjaxPhoto = $_POST['AjaxPhoto'];
$AjaxPhoto = explode('-', $AjaxPhoto);
$PhotoCount = $AjaxPhoto[0];//图片个数
$PhotoType = $AjaxPhoto[1];//图片类别 
$PhotoCountLimit = $PhotoCount + 10;

$sql_get_more_photo = "Select * from t_photo where PhotoType = $PhotoType limit $PhotoCount,$PhotoCountLimit";

$arr_get_more_photo = $sqlHelper->execute_dql2($sql_get_more_photo);
if(count($arr_get_more_photo)!=0){
	//通过json输出
	echo json_encode($arr_get_more_photo);
}else{
	echo "0";
}
?>