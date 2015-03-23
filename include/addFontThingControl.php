<?php
//完成昔日趣事的上传
header("Content-Type:text/html; charset=utf8");
session_start();//开启 session
require_once 'SqlHelper.class.php';
$sqlHelper = new SqlHelper();
	if($_POST['submitAddThing']!=""){
		//如果点击了添加昔日趣事 按钮
		$Title = $_POST['Title'];//标题
		$Content = $_POST['Content'];//内容
		$Time = $_POST['ThingEndTime'];//发生时间
		
		//相关的人 是一个下拉列表框 用一个数组来获取它 
		$RelatedId = $_POST['RelatedId'];//相关的人
		$RelatedUserId = "";
		for($i=0; $i<count($RelatedId); $i++){
			$RelatedUserId.=$RelatedId[$i];
			if($i == count($RelatedId)-1){
				break;
			}
			$RelatedUserId.=",";
		}
		//构造语句 添加
		$sql_add_thing = "Insert into t_thing(ThingTitle,ThingContent,SFUserId,ThingTime,ThingVisitTimes,ThingOrder,RelatedId,ThingHTime)";
		$sql_add_thing .= " values('".$Title."','".$Content."','".$_SESSION['USERID']."',now(),0,0,'".$RelatedUserId."','".$Time."' )";
		$result_add_thing = $sqlHelper->execute_dql($sql_add_thing);
		if($result_add_thing!=""){
			echo'<script> alert("添加成功!"); location.replace ("../thing.php") </script>'; exit();
		}else{
			echo'<script> alert("添加失败!"); location.replace ("../addFontThing.php") </script>'; exit();
		}
	}
?>