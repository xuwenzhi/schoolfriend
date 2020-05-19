<?php
session_start();
require_once 'include/init.php';
require_once 'include/SqlHelper.class.php';
require_once 'include/ComFunction.php';

$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";
$sqlHelper = new SqlHelper();
if(!isset($_GET['apply_id'])){ 
	echo '<script> location.replace("applys.php")</script>';
	exit();
}else{
	$apply_id = $_GET['apply_id'];
	$sql_apply_con = "Select * from t_apply where ApplyId = $apply_id";
	$arr_apply_con = $sqlHelper->execute_dql2($sql_apply_con);
	$arr_apply_con[0]['SFUserName'] = getUserFromT_class($arr_apply_con[0]['SFUserId']);
    $arr_apply_con[0]['ApplyType'] = $arr_apply_con[0]['ApplyType']==1?"是":"否";
	$smarty->assign("apply_Con", $arr_apply_con);
	
	//分配招聘应聘的热点文章
	$sql_get_hotapply = "Select ApplyId,ApplyUnit,ApplyTime From t_apply Order by ApplyTime desc";
	$arr_get_hotapply = $sqlHelper->execute_dql2($sql_get_hotapply);
	$smarty->assign("hotapply",$arr_get_hotapply);
	
	$smarty->display("apply_con.htm");
}