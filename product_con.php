<?php
session_start();
require_once 'include/smarty/Smarty.class.php';
require_once 'include/SqlHelper.class.php';
require_once 'include/ComFunction.php';
$smarty = new Smarty();
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";

$sqlHelper = new SqlHelper();
if(!isset($_GET['product_id'])){ //如果没有产品推介就提示连接非法
	echo '<script> location.replace("thing.php")</script>';
	exit();
}else{
	$productId = $_GET['product_id'];
	//调去产品推介的各项内容
	//建立查询
	$sql_get_product = "Select * from t_product where ProductId =$productId ";
	$arr_get_product = $sqlHelper ->execute_dql2($sql_get_product);
	//将添加人 从 t_sfuser 表中获取 
	$arr_get_product[0]['SFUserId'] = getUserFromT_class($arr_get_product[0]['SFUserId']);
	
	//将产品推介信息 分配给模板
	$smarty->assign("CPTJ", $arr_get_product);
	//获取产品推介的热点文章
	$sql_get_hotproduct = "Select ProductId,ProductName,ProductRTime,ProductOrder From t_product Order by ProductOrder desc,ProductRTime desc Limit 0,15";
	$arr_get_hotproduct = $sqlHelper->execute_dql2($sql_get_hotproduct);
	$smarty->assign("hotproduct",$arr_get_hotproduct);
	
	$smarty->display("product_con.htm");
	
}