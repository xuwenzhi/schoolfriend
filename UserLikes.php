<?php
	header("Content-Type:text/html; charset=utf8");
	//该页面用于显示数据库中已经存在的标签  热点  用户的偏好
	require_once 'include/SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	//建立查询
	$sql_user_like ="Select CodeOrder,CodeName from t_basecode where CodeCategoryId = 5";
	$arr_user_like = $sqlHelper->execute_dql2($sql_user_like);
	//通过一个循环输出
	for($i=0; $i < count($arr_user_like);$i++){
		echo "<span id='user_like_tags'>".$arr_user_like[$i]['CodeName']."</span>"."   ";
	}
?>