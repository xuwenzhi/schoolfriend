<?php
header("Content-Type:text/html; charset=utf8");
require_once '../SqlHelper.class.php';
require_once '../ComFunctions.php';
$sqlHelper = new SqlHelper();
$CheckRecruitLike = $_POST['CheckRecruitLike'];
//echo $RecruitUserLike;
$CheckRecruitLike = explode('-', $CheckRecruitLike);
$RecruitUserLikeUserId = $CheckRecruitLike[0];//用户ID
$RecruitId = $CheckRecruitLike[1];//该招聘信息ID
//打算在这里进行一下小插曲   如果点击感兴趣 一定要有真实姓名 才好 当然 如果没有真实姓名填写的话 也是可以的   只不过提示一下而已
$UserTrueName = getUserFromTsfuser($RecruitUserLikeUserId);

$sql_check_recruitlike = "Select * from t_accept where RecruitId=$RecruitId and SFUserId=$RecruitUserLikeUserId";
$arr_check_recruitlike = $sqlHelper->execute_dql2($sql_check_recruitlike);
if(count($arr_check_recruitlike)!=0){
	if($UserTrueName == ""){
		//真实姓名为空
		echo "namenull-1";
		exit;
	}else{
		//真实姓名存在
		echo "name-1";
		exit;
	}
}else{
	if($UserTrueName == ""){
		//真实姓名为空
		echo "namenull-0";
		exit;
	}else{
		//真实姓名存在
		echo "name-0";
		exit;
	}
}
?>