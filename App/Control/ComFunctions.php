<?php
//截取utf8字符串
function utf8Substr($str, $from, $len)
{
	return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
			'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
			'$1',$str);
}


//下面通过UserId来获取新闻添加人的真实姓名
function getUserFromTsfuser($userid){
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_get_username = "Select SFUserTrueName  from t_sfuser where SFUserId = $userid";
		$arr_get_username = $sqlHelper ->execute_dql2($sql_get_username);
		if(count($arr_get_username)!=0){
			return $arr_get_username[0]['SFUserTrueName'];
		}
		return "";
	}
	//下面通过UserId来获取用户的头像地址
	function getUserAddFromTsfuser($userid){
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_get_userlook = "Select SFUserAdd from t_sfuser where SFUserId = $userid";
		$arr_get_userlook = $sqlHelper ->execute_dql2($sql_get_userlook);
		if(count($arr_get_userlook)!=0){
			return $arr_get_userlook[0]['SFUserAdd'];
		}
		return "";
	}

//从t_basecode 中根据CodeCategoryId获取CodeName
function getCodeNameFromt_basecode($CodeCategoryId){
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
 	$sql_get_CodeName = "Select CodeName,CodeId from t_basecode where CodeCategoryId = $CodeCategoryId";
 	$arr_get_CodeName = $sqlHelper->execute_dql2($sql_get_CodeName);
 	return $arr_get_CodeName;
}


//从t_basecode 中根据CodeId获取CodeName
function getCodeNameByCodeId($CodeId){
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$sql_get_CodeName = "Select CodeName from t_basecode where CodeId = $CodeId";
	$arr_get_CodeName = $sqlHelper->execute_dql2($sql_get_CodeName);
	return $arr_get_CodeName[0][0];
}


//从t_trade 中根据TradeId获取TradeName
function getTradeNameByTradeId($TradeId){
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$sql_get_TradeName = "Select TradeName from t_trade where TradeId = $TradeId";
	$arr_get_TradeName = $sqlHelper->execute_dql2($sql_get_TradeName);
	return $arr_get_TradeName;
}

//从t_idcode中获取全国省市
function getProvince(){
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$sql_get_province = "select * from t_idcode where length(CityId) =2";
	$arr_get_province = $sqlHelper->execute_dql2($sql_get_province);
	return $arr_get_province;
}



//通过学校ＩＤ来获取学校名称
function getSchoolNameById($SchoolId){
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$sql_get_schoolname = "select SchoolName from t_school where SchoolId = $SchoolId";
	$arr_get_schoolname = $sqlHelper->execute_dql2($sql_get_schoolname);
	return $arr_get_schoolname[0]['SchoolName'];
}

//该函数用于判断 用户是否加入了或者关注了这个班级 通过SFUserId 和ClassID 来判断
function judgeUserBelongClass($UserId, $ClassId){
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$sql_judgeUserBelongClass = "select  SFUserId from t_sfuser where SFUserId = $UserId and (locate('".$ClassId."', ClassID)<>0 or locate('".$ClassId."', ClassFriendId)<>0)";
	$arr_judgeUserBelongClass = $sqlHelper->execute_dql2($sql_judgeUserBelongClass);
	if(count($arr_judgeUserBelongClass)!=0){
		return true;
	}else{
		return false;
	}
} 

//获取省份的数组
function getProvinces(){
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	$sql_get_provinces = "Select * from t_idcode where length(CityId) = 2";
	$arr_get_provinces = $sqlHelper->execute_dql2($sql_get_provinces);
	if(count($arr_get_provinces)!=0){
		return $arr_get_provinces;
	} else{
		return false;
	}
}

//构造一个数组 从今年到之前多少多少年的数组
function getYears($PreYear, $NextYear){  //$PreYear = 10  $NextYear = 10  也就是当前年份 的前十年到后十年的范围
	$NowYear = date('Y');
	$arr_years = array();
	for($i = ($NowYear+$NextYear),$j=0; $i >= ($NowYear - $PreYear);$j++, $i--){
		$arr_years[$j] = $i;
	}
	return $arr_years;
}
//做一个判断 判断当前用户的ClassId 或者ClassFriendId中是否已经存在用户要加入或者关注的班级 不允许重复加入

function judgeRepeatClass($UserId, $ClassId){
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	//建立查询
	$sql_judge_repeat_classid = "Select count(SFUserId) from t_sfuser where SFUserId = $UserId and (locate('".$ClassId."', ClassID)<>0)";
	$arr_judge_repeat_classid = $sqlHelper -> execute_dql2($sql_judge_repeat_classid);
	if($arr_judge_repeat_classid[0][0] != 0){
			return "ClassIDRepeat";
	}

	$sql_judge_repeat_classfriendid = "Select count(SFUserId) from t_sfuser where SFUserId = $UserId and (locate('".$ClassId."', ClassFriendId)<>0)";
	$arr_judge_repeat_classfriendid = $sqlHelper -> execute_dql2($sql_judge_repeat_classfriendid);
	if($arr_judge_repeat_classfriendid[0][0] != 0){
		return "ClassFriendIDRepeat";
	}
	return "OK";
} 


//判断用户的ClassId  或者是ClassFriendId 是什么格式      AjaxJoinClass.php 用到
function judgeClassIdORClassFriendId($UserId, $ClassType){
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	if($ClassType == 'ClassId'){
		$sql_judge_class_id = "Select ClassID from t_sfuser where SFUserId = $UserId";
		$arr_judge_class_id = $sqlHelper->execute_dql2($sql_judge_class_id);
		return $arr_judge_class_id[0]['ClassID'];
		exit;
	}
	if($ClassType == 'ClassFriendId'){
		$sql_judge_class_id = "Select ClassFriendId from t_sfuser where SFUserId = $UserId";
		$arr_judge_class_id = $sqlHelper->execute_dql2($sql_judge_class_id);
		return $arr_judge_class_id[0]['ClassFriendId'];
	}
	return "";
}





?>