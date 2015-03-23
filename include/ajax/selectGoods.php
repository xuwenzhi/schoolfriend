<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$bigGoodValue = $_POST['bigGoodValue'];

//通过商品大类到数据库中将商品小类调取出来
$sql_get_goods_small_value = "Select  GoodName, GoodsId from t_goods where GoodsId like '".$bigGoodValue."%' and GoodsId <> '".$bigGoodValue."' ";
$arr_get_goods_small_value = $sqlHelper->execute_dql2($sql_get_goods_small_value);
echo json_encode($arr_get_goods_small_value);
?>
