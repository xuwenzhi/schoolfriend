<?php
	session_start();
	require_once 'include/smarty/Smarty.class.php';
	require_once 'include/SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$smarty = new Smarty();
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";
	
	//先将头像路径获取  之后再获取其他的
	$sql_person_infor = "Select SFUserAdd From t_sfuser Where SFUserId = $_SESSION[USERID]";
	$arr_peoson_infor = $sqlHelper->execute_dql2($sql_person_infor);
	
	$person_pic = $arr_peoson_infor[0]['SFUserAdd'];//头像路径
	$smarty->assign('pic_way',$person_pic );//分配头像路径
	$smarty->assign("UserName", $_SESSION['USER']); //分配用户名
	$smarty->assign("UserId", $_SESSION['USERID']);
	$smarty->display("myMenu.htm");
?>