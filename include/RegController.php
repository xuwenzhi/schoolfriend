<?php
	//处理注册
	header("Content-Type:text/html; charset=utf8");
	require_once 'SqlHelper.class.php';
	//此处不用再次验证 该用户名已存在 在reg.php中已经处理过
	$UserName = $_POST['UserRegName'];  //取得用户名
	$PassWord = md5($_POST['UserRegPass1']);  //取得密码  并用md5() 加密
	$sqlHelper = new SqlHelper();
	//快速注册 只写入  用户名和密码     或者邮箱
	//如果填写邮箱 就写入
	if($_POST['UserEmail']!=""){
		$sql_insert_user = "Insert Into t_sfuser(SFUserLogin, SFUserKey,SFUserTime,SFULandTime,SFULandTimes,SFUserAdd,SFUserEmail) Values('".$UserName."', '".$PassWord."', NOW(), NOW(), 0, 'upload/images/defaultPhoto.jpg', '$_POST[UserEmail]')";
	}
	//如果没有填写邮箱 就不写入
	else{
		$sql_insert_user = "Insert Into t_sfuser(SFUserLogin, SFUserKey,SFUserTime,SFULandTime,SFULandTimes,SFUserAdd) Values('".$UserName."', '".$PassWord."', NOW(), NOW(), 0, 'upload/images/defaultPhoto.jpg')";
	}
	$result_insert_user = $sqlHelper->execute_dql($sql_insert_user);
	if($result_insert_user){
		//注册成功
		echo '<script> alert("注册成功!"); location.replace("../index.php")</script>';
		exit();
	}else{
		//注册失败
		echo '<script> alert("注册失败，请从新注册!"); location.replace("../index.php")</script>';
		exit();
	}
?>