<?php
//该文件主要响应  myclass.php 中的 ajax事件
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();

//从myclass.php中传过来的数据 有 年份 和 学校ID 并且用 = 连接
$Year_SchoolId = $_POST['Year_SchoolId'];
$arr_year_schoolid = explode('=', $Year_SchoolId);
//建立查询
$sql_get_class = "Select ClassId,ClassName from t_class where SchoolId = $arr_year_schoolid[1] and GoSTime = $arr_year_schoolid[0]";
$arr_get_class = $sqlHelper->execute_dql2($sql_get_class);
//生成json数据
echo json_encode($arr_get_class);
?>