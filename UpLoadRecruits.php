<?php
//前台用于上传图片的文件   希望做的灵活一些
session_start();
require_once 'include/init.php';

$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";
require_once 'include/SqlHelper.class.php';
$sqlHelper = new SqlHelper();
require_once 'include/ComFunction.php';

//将用户ID session 分配给模板
$smarty->assign('USERID', $_SESSION['USERID']);

//获取行业类别的分类
$arr_get_trade_type = get_tradeid_from_category();//获取到 行业类别的类型 数组
//将行业类别分配给模板
$smarty->assign('TRADETYPE', $arr_get_trade_type);
//获取市
$arr_get_city_type = get_cityid_from_category();
//将市分配给模版
$smarty->assign('CITYTYPE',$arr_get_city_type);

$smarty->display('UpLoadRecruits.htm');
?>