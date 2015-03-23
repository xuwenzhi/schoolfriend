<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();

//建立从数据库中获取供求信息的sql语句
$sql_get_apply = "select ApplyUnit,ApplyId,ApplyTime from t_apply where ApplyETime>now()  limit 0, 12";
$arr_get_apply = $sqlHelper->execute_dql2($sql_get_apply);

echo json_encode($arr_get_apply);

?>