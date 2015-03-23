<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();

//建立从数据库中获取供求信息的sql语句
$sql_get_information = "select InfoTitle,InfoId,InfoRTime,InfoType from t_information where InfoETime>now() and Visibility=1 order by InfoOrder desc limit 0, 11";
$arr_get_information = $sqlHelper->execute_dql2($sql_get_information);

echo json_encode($arr_get_information);

?>