<?php 
header("Content-Type:text/html; charset=utf8");
	require_once '../SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$ProvinceId = $_POST['ProvinceId'];//省份ID
	//获取
	$sql_get_school = "Select * from t_school where CityId = $ProvinceId";
	$arr_get_school = $sqlHelper->execute_dql2($sql_get_school);
	if(count($arr_get_school)!=0){
		echo json_encode($arr_get_school);//转换json数据
	}else{
		echo "0";
	}
?>