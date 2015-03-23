<?php
	header("Content-Type:text/html; charset=utf8");
	require_once '../SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$tradeId = $_POST['bigTradeId'];//行业大类
	//获取行业小类的sql语句
	$sql_get_small_trade = "Select * from t_trade where TradeId like '".$tradeId."%' and TradeId <> '".$tradeId."'";
	$arr_get_small_trade = $sqlHelper->execute_dql2($sql_get_small_trade);
	echo json_encode($arr_get_small_trade);//转换json数据
?>