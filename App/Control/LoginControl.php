<?php
session_start();
//session_register('USER'); //session变量      登录姓名
//session_register('USERID');	//session变量      对应数据库的ID
header("Content-Type:text/html; charset=utf8");
require_once 'SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$UserLoginName = trim($_POST['UserName']);  //登录名
//获取到用户的ID 
$sql_get_userid = "Select SFUserId from t_sfuser where SFUserLogin = '".$UserLoginName."'";


$arr_get_userid = $sqlHelper->execute_dql2($sql_get_userid);
$UserId = $arr_get_userid[0]['SFUserId'];

//设置session变量
$_SESSION['USER'] = $UserLoginName;
$_SESSION['USERID'] = $UserId;

//这里将数据库t_sfuser表中的 SFUserState增加1  即现在为登录状态
$sql_update_loginstate = "update t_sfuser set SFUserState = 1 where SFUserId = $_SESSION[USERID]";
$sqlHelper->execute_dql($sql_update_loginstate);

//这里将该用户的登录时间，和登录次数+1写入数据库
$sql_land_time = "Update t_sfuser Set SFULandTime = NOW(),SFULandTimes=SFULandTimes+1 Where SFUserID = $_SESSION[USERID]";//当前时间写入数据库
$sqlHelper->execute_dql($sql_land_time);


//将该用户的这次登录时间 修改进log.xml文件
//这里应该做一个判断 如果是新用户 要添加到xml文件中去 如果是老用户 就要对其中的时间进行修改
/*
$dom = new DOMDocument();
$dom->load("../config/log.xml");
$users = $dom->getElementsByTagName("user");
$usertime = $users->item(0); 	
$stu_name = $usertime->getElementsByTagName("time");  	
$stu_name->item(0)->nodeValue = date('Y-m-d');

$dom->save("../config/log.xml");//千万不要忘记保存回源文件

最后决定这个想法撤销 
徐文志  2013/10/29
*/
//获取当前用户登录的次数 如果没有登录过 就介绍一下校友网
$sql_get_userlogin_times = "select SFULandTimes from t_sfuser where SFUserId = $UserId";
$arr_get_userlogin_times = $sqlHelper->execute_dql2($sql_get_userlogin_times);
if(isset($_GET['LoginPage'])){
	if($_GET['LoginPage'] == 'Recruit_Con' && isset($_GET['Id'])){		
			header("Location: ../Recruit_Con.php?RecruitId=".$_GET[Id]."");//这样成功实现了页面的回访了
			//echo "<script> history.go(-1) </script>";
			exit();
			//原本希望能够记录 页面的文件名 和 ID 然后通过Header()执行跳转 结果发现 在header()中无法加入变量 这样就会做成死的  最后想到了通过JS来
			//执行向前一个页面跳转
	}else{
		//如果只有网页标志 没有 ID
	}
}else{
	header('Location: ../index.php');
}

?>
