<?php
	header("Content-Type:text/html; charset=utf8");
	session_start();//开启 session	
	require_once '../bkadmin/PubFunction.php';
	require_once '../include/SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
			$RecruitTrade = $_POST['recruitCategory'];  //行业类型
			$RecruitType = $_POST['recruitJob'];//是否兼职
			$RecruitETime = $_POST['recruitsEndTime'];//结束时间
			$RecruitPosition = $_POST['Position'];//招聘职位
			$RecruitClaim = $_POST['Claim'];//职位要求
			$RecruitLocation = $_POST['Location'];//发布区域
			$RecruitDegree = $_POST['Degree'];//学历要求
			$RecruitTitle = $_POST['Title'];//标题
			$RecruitPContent = $_POST['Content'];//职位描述
			if(isset($_SESSION['LoginUserCode'])){
				$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']); //通过用户名来获取该用户的id
			}
			if(isset($_POST['USERID'])){
				$UserId = $_POST['USERID'];
			}
			$sql_add_recruit = "Insert into t_recruit(SFUserId,RecruitTrade,RecruitTitle,RecruitPosition,RecruitPContent,RecruitClaim,RecruitLocation,RecruitDegree,RecruitTime,RecruitETime,RecruitType)";
			$sql_add_recruit.=" values($UserId,$RecruitTrade,'".$RecruitTitle."','".$RecruitPosition."','".$RecruitPContent."','".$RecruitClaim."','".$RecruitLocation."','".$RecruitDegree."',Now(),'".$RecruitETime."',$RecruitType)";
			$add_result = $sqlHelper->execute_dql($sql_add_recruit);
			if($add_result){
					echo'<script> alert("上传成功!"); location.replace ("../recruits.php") </script>'; exit();
			}else{
				echo'<script> alert("上传失败!"); location.replace ("../recruits.php") </script>'; exit();
			}

?>