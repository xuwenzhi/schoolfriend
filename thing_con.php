<?php
session_start();
require_once 'include/smarty/Smarty.class.php';
require_once 'include/SqlHelper.class.php';
require_once 'include/ComFunction.php';
$smarty = new Smarty();
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";

$sqlHelper = new SqlHelper();
if(!isset($_GET['thing_id'])){ //如果没有新闻公告id就回到新闻列表
	echo '<script> location.replace("thing.php")</script>';
	exit();
}else{
	$thing_id = $_GET['thing_id'];
	
	//增加浏览次数
	$sql_add_visittimes = "update t_thing set ThingVisitTimes=ThingVisitTimes+1 Where ThingId = $thing_id";
	$sqlHelper->execute_dql($sql_add_visittimes);
	
	//建立查询来获取到该新闻内容
	$sql_thing_con = "Select * from t_thing where ThingId = $thing_id";
	//获取昔日趣事信息
	$arr_thing_con = $sqlHelper->execute_dql2($sql_thing_con);
	//查询到作者    肯定是真是姓名
	$sql_thing_writer = "Select SFUserTrueName From t_sfuser where SFUserId = ".$arr_thing_con[0]['SFUserId']."";
	$arr_thing_writer = $sqlHelper->execute_dql2($sql_thing_writer);
	//分配作者
	$smarty->assign("ThingWrite", $arr_thing_writer[0]['SFUserTrueName']);
	//分配昔日趣事信息
	$smarty->assign("Thing_Con", $arr_thing_con);
	
	$arr_userid = array();
	//下面通过获取到的 RelatedId  来获取到 该用户的其他趣事
	if(strlen($arr_thing_con[0]['RelatedId'])!=0){
		if(substr_count($arr_thing_con[0]['RelatedId'], ',') != 0){
			$arr_userid = explode(',',$arr_thing_con[0]['RelatedId']);
		}else{
			$arr_userid[0] = $arr_thing_con[0]['RelatedId'];
		}
	}
	$arr_user_name = array();
	if(count($arr_userid)!=0){	
		for($i = 0; $i<count($arr_userid); $i++){
			$arr_user_name [$i]['username'] = getUserFromT_class($arr_userid[$i]);
		}
	}
	//将涉及到的人 的真实姓名分配给 模板
	$smarty->assign("RELATEDUSER", $arr_user_name);
	
	
	//所有该昔日趣事涉及的用户 ID 已经存储到 $arr_userid数组中
	//下面通过for循环来构造查询语句
	$arr_get_other_thing = array();
	$sql_get_other_thing = "Select ThingTitle,ThingId from t_thing where ";
	if(count($arr_userid)!=0){
		for($i = 0; $i<count($arr_userid); $i++){
			$sql_get_other_thing .= "(RelatedId like '%".$arr_userid[$i]."%' or RelatedId like '%".$arr_userid[$i]."' or RelatedId like '".$arr_userid[$i]."%')";
			if($i < count($arr_userid)-1){
				$sql_get_other_thing.= " or ";
			}else{
				$sql_get_other_thing.= "  ";
			}
		}
	}
	$sql_get_other_thing .=" and ThingId <> $thing_id order by ThingVisitTimes desc,ThingId desc limit 0, 3";

	$arr_get_other_thing_tmp = $sqlHelper->execute_dql2($sql_get_other_thing); //每个用户所涉及的昔日趣事
	$arr_get_other_thing = array_merge($arr_get_other_thing_tmp, $arr_get_other_thing);
	$smarty->assign("OTHERTHING", $arr_get_other_thing);
	
	

	//分配昔日趣事的热点文章
	$sql_get_hotthing = "Select ThingId,ThingTitle,ThingTime,ThingOrder From t_thing Order by ThingOrder desc,ThingTime desc Limit 0,15";
	$arr_get_hotthing = $sqlHelper->execute_dql2($sql_get_hotthing);
	$smarty->assign("hotthing",$arr_get_hotthing);	
	
	
	
	
	$smarty->display("thing_con.htm");
}