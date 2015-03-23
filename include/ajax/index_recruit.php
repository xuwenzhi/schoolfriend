<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();

//建立从数据库中获取供求信息的sql语句
$sql_get_recruits = "Select RecruitPosition,RecruitId,RecruitTime from t_recruit  where RecruitETime>now() order by RecruitOrder desc limit 0, 12";
$arr_get_recruits = $sqlHelper->execute_dql2($sql_get_recruits);

echo json_encode($arr_get_recruits);

?>