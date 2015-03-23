<?php 
header("Content-Type:text/html; charset=utf8");
	require_once '../SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$Province = $_POST['Province'];//省份ID
	//获取城市sql语句
	$sql_get_city = "Select * from t_idcode where CityId like '".$Province."%' and CityId <> '".$Province."'";
	$arr_get_city = $sqlHelper->execute_dql2($sql_get_city);
	if(count($arr_get_city)!=0){
		echo json_encode($arr_get_city);//转换json数据
	}else{
		echo "0";
	}
?>