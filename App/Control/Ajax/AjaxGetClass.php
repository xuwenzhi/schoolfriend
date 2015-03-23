<?php 
header("Content-Type:text/html; charset=utf8");
	require_once '../SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$JoinClassId = $_POST['JoinClassId'];//学校 ID 和 年份
	$JoinClassId = explode('-', $JoinClassId);
	$SchoolId = $JoinClassId[0]; //学校ID
	$Year = $JoinClassId[1];//年份
	//获取班级sql语句
	$sql_get_class = "Select * from t_class where SchoolId = $SchoolId and GoSTime = $Year";
	//echo $sql_get_class;
	$arr_get_class = $sqlHelper->execute_dql2($sql_get_class);
	if(count($arr_get_class)!=0){
		echo json_encode($arr_get_class);//转换json数据
	}else{
		echo "0";
	}
?>