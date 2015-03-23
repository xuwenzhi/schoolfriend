<?php
session_start();
require_once 'include/smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";
require_once 'include/SqlHelper.class.php';
require_once 'include/ComFunction.php';
$smarty->assign('USERID', $_SESSION['USERID']);
$arr_get_city = get_applyLocation();
$arr_get_Tradename=  get_applyUnit();
$smarty->assign('Apply_Location',$arr_get_city);
$smarty->assign('Apply_Trade',$arr_get_Tradename);
$smarty->display('SetApply.htm');
?>