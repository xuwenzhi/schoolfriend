<?php
//本页显示 用户自己发不过的 供求信息
session_start();
require_once 'include/init.php'';
require_once 'include/SqlHelper.class.php';
require_once 'include/AssPage.class.php';

$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";
$sqlHelper = new SqlHelper();
$assPage = new AssPage();

//如果不存在 用户登录信息 跳转
if(!isset($_SESSION['USERID'])){
	echo '<script> alert("您还未登录，请先登录"); location.replace("index.php")</script>';
	exit();
}
$UserId = $_SESSION['USERID'];
$assPage->pageSize = 15; //每页显示15个
//下面查看是否存在pageNow
if(isset($_GET['pageNow'])){
	$assPage->pageNow = $_GET['pageNow'];
}else{
	$assPage->pageNow = 1;
}
//查询出数据库中新闻公告的个数
$sql_all_information_user = "Select count(InfoId) From t_information where SFUserId = $UserId";
//建立查询 获取当前页面的数据
$aa = ($assPage->pageNow-1)*$assPage->pageSize;//每一页的起始位置
$bb = $aa+$assPage->pageSize;
$sql_pagenow_informations_user = "Select InfoId, InfoTitle, InfoType,InfoRTime From t_information where SFUserId =  $UserId order by InfoId desc Limit $aa, $bb ";//建立该查询
//执行改查询
$sqlHelper->excute_dql_asspage($sql_all_information_user, $sql_pagenow_informations_user, $assPage);
//查询后 该页面的信息已经被保存到$assPage->pageArr中
//分配一个分页的辅助变量
if($assPage->pageNow%10==0){
	$smarty->assign("pageStart", $assPage->pageNow);
}else{
	$smarty->assign("pageStart", $assPage->pageNow-($assPage->pageNow%10));
}
//分配信息至模板
$smarty->assign("MYGQXX" ,$assPage->pageArr); //分配
$smarty->assign("pageCount", $assPage->pageCount);//将页数分配
$smarty->assign("pageSize", $assPage->pageSize);//将页面 记录数 分配
$smarty->assign("pageNow", $assPage->pageNow); //将页面的当前页 分配


$smarty->display("myGoodsInfor.htm");
?>