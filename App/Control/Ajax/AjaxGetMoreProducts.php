<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$ProductCount = $_POST['ProductCount'];//当前显示的产品推介的最大ID
$ProductCountLimit = $ProductCount + 15;
//建立查询 将接下来的产品推介获取
$sql_get_more_products = "Select ProductId, ProductName, ProductRTime from t_product where  ProductETime>now() and Visibility=1 order by ProductOrder desc,ProductId desc Limit $ProductCount, $ProductCountLimit";
$arr_get_more_products = $sqlHelper->execute_dql2($sql_get_more_products);
if(count($arr_get_more_products)!=0){
	//如果需要加在更多产品推介 存在
	for($i = 0; $i< count($arr_get_more_products); $i++){
		$arr_get_more_products[$i]['ProductName'] = utf8Substr($arr_get_more_products[$i]['ProductName'], 0, 12)."...";
	}
	//通过json输出
	echo json_encode($arr_get_more_products);
}else{
	echo "0";
}
?>