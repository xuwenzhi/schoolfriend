<?php
//该文件主要响应  myclass.php 中的 ajax事件 
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$ProvinceId = $_POST['ProvinceId']; //省份ID
//建立查询
$sql_get_university = "Select SchoolId, SchoolName from t_school where CityId = $ProvinceId";
$arr_get_university = $sqlHelper ->execute_dql2($sql_get_university);

echo json_encode($arr_get_university);
?>
