<?php 
header("Content-Type:text/html; charset=utf8");
	require_once '../SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$ajaxImgInfor = $_POST['ajaxImgInfor'];//学校 ID 和 年份
	$ajaxImgInfor = explode('-', $ajaxImgInfor);
	$PhotoType = $ajaxImgInfor[0]; //学校ID
	$PhotoCurrentImg = $ajaxImgInfor[1];//年份
	//获取班级sql语句
	$sql_get_more_img = "Select * from t_photo where PhotoType = ".$PhotoType." order by PhotoTime desc limit $PhotoCurrentImg, 5";
	$arr_get_more_img = $sqlHelper->execute_dql2($sql_get_more_img);
	if(count($arr_get_more_img)!=0){
		echo json_encode($arr_get_more_img);//转换json数据
	}else{
		echo "0";
	}
?>