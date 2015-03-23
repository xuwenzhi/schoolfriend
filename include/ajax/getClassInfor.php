<?php
//该文件主要响应  myclass.php 中的 ajax事件
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
$sqlHelper = new SqlHelper();

$ClassId= $_POST['ClassId'];
//建立班级信息的查询
$sql_classinfor = "Select * from t_class where ClassId = $ClassId";
$arr_classinfor = $sqlHelper->execute_dql2($sql_classinfor);//从 t_class表中获取的信息
//查找当前班级有多少人加入
$sql_student_count = "Select count(SFUserId) from t_sfuser where ClassId  like '%".$ClassId."%' or ClassId  like '".$ClassId."%' or ClassId  like '%".$ClassId."'";
$arr_student_count = $sqlHelper->execute_dql2($sql_student_count);
$student_count = $arr_student_count[0][0]; //班级人数

//查找当前班级有多少人关注
$sql_student_att_count = "Select count(SFUserId) from t_sfuser where ClassFriendId  like '%".$ClassId."%' or ClassFriendId  like '".$ClassId."%' or ClassFriendId  like '%".$ClassId."'";
$arr_student_att_count = $sqlHelper->execute_dql2($sql_student_att_count);
$student_att_count = $arr_student_att_count[0][0];//关注人数

//获取学校名称
$sql_school_name = "Select SchoolName from t_school where SchoolId = ".$arr_classinfor[0]['SchoolId']."";
$arr_school_name = $sqlHelper->execute_dql2($sql_school_name);
$school_name = $arr_school_name[0]['SchoolName']; //学校名称

//获取创建人姓名
$sql_user_name = "Select SFUserTrueName from t_sfuser where SFUserId = ".$arr_classinfor[0]['SFUserId']."";
$arr_user_name = $sqlHelper->execute_dql2($sql_user_name);
if(count($arr_user_name) != 0){
	$user_name = $arr_user_name[0]['SFUserTrueName'];  //创建人
}else{
	$user_name = "";
}

echo "<tr><td align='center'>班级名称:</td><td>".$arr_classinfor[0]['ClassName']."</td></tr>";
echo "<tr><td align='center'>所属学校:</td><td>".$school_name."</td></tr>";
echo "<tr><td align='center'>所属学院:</td><td>".$arr_classinfor[0]['CollegeName']."</td></tr>";
echo "<tr><td align='center'>所属系:</td><td>".$arr_classinfor[0]['MajorName']."</td></tr>";
echo "<tr><td align='center'>入学年份:</td><td>".$arr_classinfor[0]['GoSTime']."</td></tr>";
echo "<tr><td align='center'>创建人:</td><td>".$user_name."</td></tr>";
echo "<tr><td align='center'>创建时间:</td><td>".$arr_classinfor[0]['ClassCDate']."</td></tr>";
echo "<tr><td align='center'>班级介绍:</td><td>".$arr_classinfor[0]['ClassContent']."</td></tr>";
echo "<tr><td align='center'>班级人数:</td><td>".$student_count."</td></tr>";
echo "<tr><td align='center'>被关注数:</td><td>".$student_att_count."</td></tr>";
echo "<input type='hidden' name='HidClassId' id='HidClassId' value=".$arr_classinfor[0]['ClassId']." />";

?>
