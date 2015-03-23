<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$PhotoType = $_POST['PhotoType'];
$sql_get_photo_byPhotoType = "Select PhotoId, PhotoAdd, PhotoPresent, PhotoTime from t_photo where PhotoType=$PhotoType";
$arr_get_CodeName_from_mien = $sqlHelper->execute_dql2($sql_get_photo_byPhotoType);

if(count($arr_get_CodeName_from_mien)!=0){
	//通过json输出
	echo json_encode($arr_get_CodeName_from_mien);
}else{
	echo "0";
}
?>