<?php
session_start();
header("Content-Type:text/html; charset=utf8");
require_once '../include/SqlHelper.class.php';
$sqlHelper = new SqlHelper();
if(isset($_GET['do'])&&$_GET['do']=="delete") {
	
	$apply_id=$_GET['apply_id'];
	$sql_delete_apply="Delete From t_apply Where ApplyId = $apply_id";
	$delete_result = $sqlHelper ->execute_dql($sql_delete_apply);
		if($delete_result !=""){
				echo '<script> alert("删除成功!"); location.replace("../MyApply.php")</script>';
				exit();
		}else{
				echo '<script> alert("删除失败,请重试!"); location.replace("../MyApply.php")</script>';
				exit();
		}
}else {


	$SFUserId = $_SESSION['USERID'];//发布人
	$ApplyUnit = $_POST['ApplyUnit'];//求职标题
	$Apply_Trade = $_POST['Apply_Trade'];//行业 ID
	$ApplySalary = $_POST['ApplySalary'];//薪水
	$ApplyLocation = $_POST['ApplyLocation'];//地点
	$ApplyType = $_POST['ApplyType'];//是否兼职
	$ApplyClaim = $_POST['ApplyClaim'];//要求
	$ApplyETime=$_POST['ApplyEndTime'];//结束时间

	$sql_add_apply_pic = "Insert Into t_apply (SFUserId,ApplyTrade,ApplyUnit,ApplySalary,ApplyClaim,ApplyLocation,ApplyTime,ApplyETime,ApplyType)
Values($SFUserId,'$Apply_Trade','$ApplyUnit','$ApplySalary','$ApplyClaim','$ApplyLocation',now(),'$ApplyETime',$ApplyType)";
	$add_result = $sqlHelper->execute_dql($sql_add_apply_pic);

	if ($add_result!="") {
    	echo'<script> alert("发布成功!"); location.replace ("../applys.php") </script>';
    	exit();
	} else {
    	echo'<script> alert("发布失败!"); location.replace ("../SetApply.php") </script>';
   		exit();
	}
}

?>
