<?
	session_start();
	require_once 'include/smarty/Smarty.class.php';
	require_once 'include/SqlHelper.class.php';
	require_once 'include/ComFunction.php';
	$smarty = new Smarty();
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";	
	$sqlHelper = new SqlHelper();
	
	if(!isset($_GET['infor_id'])){
		echo '<script> location.replace("informations.php")</script>';
		exit();
	}
	$infor_id = $_GET['infor_id'];
	//增加浏览次数
	$sql_add_visittimes = "update t_information set InfoVisitTimes=InfoVisitTimes+1 Where InfoId = $infor_id";
	$sqlHelper->execute_dql($sql_add_visittimes);
	
	//调供求信息内容
	$sql_get_infor_con = "Select * from t_information where InfoId = $infor_id";
	$arr_get_infor_con = $sqlHelper->execute_dql2($sql_get_infor_con);
	$arr_get_infor_con[0]['SFUserName'] = getUserFromT_class($arr_get_infor_con[0]['SFUserId']);
	
	$smarty->assign("GQXX", $arr_get_infor_con);
	//分配信息至模板
	//分配供求信息的热点文章
	$sql_get_horinformation = "Select InfoId,InfoTitle,InfoRTime,InfoOrder From t_information Order by InfoOrder desc,InfoRTime desc Limit 0,15";
	$arr_get_hotinformation = $sqlHelper->execute_dql2($sql_get_horinformation);
	$smarty->assign("hotinformation",$arr_get_hotinformation);

	$smarty->display('information_con.htm');
	
?>