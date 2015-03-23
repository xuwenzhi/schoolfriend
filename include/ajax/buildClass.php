<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();

$build_class_vars = $_REQUEST['buildClassVar'];
$arr_class_vars = explode('=', $build_class_vars);//转换成数组

//构造增加班级的语句
$sql_build_class = "Insert into t_class(ClassName,SchoolId,GoSTime,CollegeName,MajorName,ClassCDate,ClassContent,SFUserId,ClassOrder) values(";
$sql_build_class.= "'".$arr_class_vars[1]."', ".$arr_class_vars[2].", '".$arr_class_vars[3]."',";
$sql_build_class.= "'".$arr_class_vars[4]."', '".$arr_class_vars[5]."',NOW(), '".$arr_class_vars[6]."', ".$arr_class_vars[0].", 0)";
$build_class_result = $sqlHelper->execute_dql($sql_build_class);//添加班级
if( $build_class_result!=""){
	//既然创建成功了班级   该创建人也要在班级中  所以这里要进行处理  START
	//首先取得刚刚创建 的班级的  ID
	$classid = mysql_insert_id();  //通过该函数 获取刚刚执行 sql语句的 ID
	$user_id = $arr_class_vars[0];
	$sql_connect_builder_member = "Select ClassId from t_sfuser where SFUserId = $user_id";
	$arr_connect_builder_member = $sqlHelper->execute_dql2($sql_connect_builder_member);
	
	$userClassid = "";
	//现在修改
	if(count($arr_connect_builder_member)!=0){
		if($arr_connect_builder_member[0]['ClassId']==""){  //如果之前没有参加任何班级
			$userClassid .= $classid;
		}else{
			$userClassid = $arr_connect_builder_member[0]['ClassId'];//这是之前的ClassId
			$userClassid .= ",".$classid;
		}
	}
	//将现在的ClassId 插入到表中
	$sql_insert_classid = "update t_sfuser Set ClassId = '".$userClassid."' where SFUserId = $user_id";
	$insert_result = $sqlHelper->execute_dql2($sql_insert_classid);
	//既然创建成功了班级   该创建人也要在班级中  所以这里要进行处理  END
		echo 1;
}else{
	echo 0;
}