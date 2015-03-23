<?php
	header("Content-Type:text/html; charset=utf8");
	require_once '../../include/SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	//该页面用于处理用户点击  (修改) 文章  还是( 删除)文章  按钮 进行处理
	//如果点击删除按钮
	if(isset($_GET['do']) && $_GET['do']=="delete") {
		//取得要删除文章的类型  和id
		$recruits_id = $_GET['recruits_id']; //文章 id
		$sql_delete_recruit = "Delete From t_recruit where RecruitId = $recruits_id";
		//当然肯定还有其他的内容  这里先不做添加
		//下面执行删除sql语句
		$delete_result = $sqlHelper ->execute_dql($sql_delete_recruit);
		if($delete_result !=""){
				echo '<script> alert("删除成功!"); location.replace("../../myrecruits.php")</script>';
				exit();
		}else{
				echo '<script> alert("删除失败,请重试!"); location.replace("../../myrecruits.php")</script>';
				exit();
		}
	}
	if(@$_POST['deleteRecruits'] != ""){
		//取得要删除文章的类型  和id
		$recruits_id = $_GET['recruits_id']; //文章 id
		$sql_delete_recruit = "Delete From t_recruit where RecruitId = $recruits_id";
		//当然肯定还有其他的内容  这里先不做添加
		//下面执行删除sql语句
		$delete_result = $sqlHelper ->execute_dql($sql_delete_recruit);
		if($delete_result !=""){
				echo '<script> alert("删除成功!"); location.replace("../bkrecruits.php")</script>';
				exit();
		}else{
				echo '<script> alert("删除失败,请重试!"); location.replace("../bkrecruits.php")</script>';
				exit();
		}
		
	}
	//如果点击修改按钮
	if(@$_POST['submitRecruits'] != ""){
		//取得要修改文章的类型  和id
		$recruits_id = $_GET['recruits_id']; //文章 id
		$Title = $_POST['Title'];//文章标题
		$Content = $_POST['Content']; //文章内容
		$RecruitCate = $_POST['recruitCategory'];//行业类别  是序号
		$RecruitJob = $_POST['recruitJob'];//是否兼职 传 0 或 1
		$Postion = $_POST['Position'];//招聘职位
		$Claim = $_POST['Claim'];//职位要求
		$Location = $_POST['Location'];//发布区域
		$Degree = $_POST['Degree'];//学历要求
		$Etime = $_POST['Etime'];
		//下面根据不同的 id建立不同的 修改语句
		$sql_update_recruits = "Update t_recruit set RecruitTitle='".$Title."',RecruitPContent='".$Content."',RecruitTrade='".$RecruitCate."',RecruitType='".$RecruitJob."',RecruitPosition='".$Postion."',RecruitClaim='".$Claim."',RecruitDegree='".$Degree."',RecruitLocation='".$Location."',RecruitETime='".$Etime."' where RecruitId = $recruits_id";
		//这里还有其他类型的文章  这里先不做添加
		
		//执行修改的sql语句
		$update_result = $sqlHelper->execute_dql($sql_update_recruits);
		if($update_result != ""){
				echo '<script> alert("修改成功!"); location.replace("../bkrecruits.php")</script>';
				exit();
		}else{
				echo '<script> alert("修改失败,请重试!"); location.replace("../bkrecruits.php")</script>';
				exit();
		}
	}
?>