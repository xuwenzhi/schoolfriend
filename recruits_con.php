<?php
require_once 'include/smarty/Smarty.class.php';
require_once 'include/SqlHelper.class.php';
require_once 'include/AssPage.class.php';
require_once 'include/ComFunction.php';
$smarty = new Smarty();
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";	
	

$sqlHelper = new SqlHelper();

//检验登录状态
session_start();
$UserLoginState = "0"; //记录用户登录状态
if(!isset($_SESSION['USER'])){
	$UserLoginState = '0';  //为0 没有登录
}else{
	$UserLoginState = '1';  //为1 现有登录
}

$smarty->assign("UserLoginState",$UserLoginState); //向模板传送登录状态
$smarty->assign("NowUserName", @$_SESSION['USER']);
$smarty->assign("UserId", @$_SESSION['USERID']);

if(!isset($_GET['recruits_id'])){ //如果没有新闻公告id就回到新闻列表
	echo '<script> location.replace("recruits.php")</script>';
	exit();
}else{
	$recruits_id = $_GET['recruits_id'];
	//增加浏览次数
	$sql_add_visittimes = "update t_recruit set RecruitVisitTimes=RecruitVisitTimes+1 Where RecruitId = $recruits_id";
	$sqlHelper->execute_dql($sql_add_visittimes);
	
	//建立查询来获取到该内容
	$sql_recruits_con = "Select * from t_recruit where RecruitId = $recruits_id";
	//获取信息
	$arr_recruits_con = $sqlHelper->execute_dql2($sql_recruits_con);
	//分配信息作者的Id号
	$UserId = $arr_recruits_con[0]['SFUserId'];
	$smarty->assign("WriteUserId",$UserId);
	//查询到信息的作者    肯定是真是姓名
	$sql_recruits_writer = getUserFromT_class($arr_recruits_con[0]['SFUserId']);
	//分配信息作者
	$smarty->assign("RecruitsWrite", $sql_recruits_writer);
	//分配信息
	$smarty->assign("Recruits_Con", $arr_recruits_con);
	//分配信息的行业类别
	$sql_recruits_category = "Select TradeName From t_trade where TradeId = ".$arr_recruits_con[0]['RecruitTrade']."";
	$arr_recruits_category = $sqlHelper->execute_dql2($sql_recruits_category);
	$smarty->assign("RecruitsCategory",$arr_recruits_category[0]['TradeName']);
	//分配信息是否兼职  1代表兼职  0代表全职
	if($arr_recruits_con[0]['RecruitType']==1) {
		$smarty->assign("RecruitJob","兼职");
	}else {
		$smarty->assign("RecruitJob","全职");
	}
	
	
	$assPage = new AssPage();
	$assPage->pageSize = 5;
	if(isset($_GET['pageNow'])){
		$assPage->pageNow = $_GET['pageNow'];
	}else{
		$assPage->pageNow = 1;
	}
	//分配有多少人感兴趣 从t_accept表中调取
	$sql_get_num = "Select count(SFUserId) From t_accept Where RecruitId = $recruits_id ";
	$arr_get_num = $sqlHelper->execute_dql2($sql_get_num);
	$smarty->assign("Num", $arr_get_num[0][0]);
	
	if($arr_get_num[0][0]!=0){
		//分配感兴趣人的信息
		$aa = ($assPage->pageNow-1)*$assPage->pageSize;//每一页的起始位置
		$bb = $aa+$assPage->pageSize;
		$sql_get_person = "Select * From t_accept Where RecruitId = $recruits_id limit $aa, $bb";
		$sqlHelper->excute_dql_asspage($sql_get_num, $sql_get_person, $assPage);
		//获取真实姓名
		if(count($assPage->pageArr)!=0){
			for($i=0;$i<count($assPage->pageArr[0][0]);$i++) {
				if($assPage->pageArr[$i]['SFUserId']) {
					$assPage->pageArr[$i]['SFUserId'] = getUserFromT_class($assPage->pageArr[$i]['SFUserId']);
				}
			}
		}
		//获取是否兼职	
		if(count($assPage->pageArr) !=0){
			for($i=0;$i<count($assPage->pageArr[0][0]);$i++) {
				if($assPage->pageArr[$i]['AcceptType']==1) {
					$assPage->pageArr[$i]['AcceptType']="全职";
				}else {
					$assPage->pageArr[$i]['AcceptType']="兼职";
				}
			}
		}
		$smarty->assign('RecruitId', $recruits_id);
		$smarty->assign("Person",$assPage->pageArr);
		$smarty->assign("pageCount", $assPage->pageCount);//将页数分配
		$smarty->assign("pageSize", $assPage->pageSize);//将页面 记录数 分配
		$smarty->assign("pageNow", $assPage->pageNow); //将页面的当前页 分配
	}
	
	//分配招聘信息的热点文章
	$sql = new SqlHelper();//这里新建了一个对象 不知道为什么上面的对象使用不了 还是已经过期了 被回收了
	$sql_get_hotrecruit = "Select RecruitId,RecruitTitle,RecruitTime,RecruitOrder From t_recruit Order by RecruitOrder desc Limit 0,15";
	$arr_get_hotrecruit = $sql->execute_dql2($sql_get_hotrecruit);
	$smarty->assign("hotrecruit",$arr_get_hotrecruit);
	
	
	
	$smarty->display("recruits_con.htm");
}