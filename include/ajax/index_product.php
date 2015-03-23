<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();

//建立从数据库中获取供求信息的sql语句
$sql_get_product = "select ProductName,ProductId,ProductRTime from t_product where ProductETime>now() and Visibility=1 order by ProductOrder desc limit 0, 12";
$arr_get_product = $sqlHelper->execute_dql2($sql_get_product);

echo json_encode($arr_get_product);

?>