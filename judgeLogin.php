<?php
	/*
	 * 该文件用于检测用户是否登录  和 恶意修改url
	 */
session_start();//开启session
header("Content-Type:text/html; charset=utf8");
//个人空间 首先判断是否存在登录用户
if(!isset($_SESSION['USER'])){
	//不存在登录用户
	echo '<script> alert("非法链接!"); location.replace("index.php")</script>';
	exit();
}
//这样还是不行 因为通过修改url就能够进入其他人的个人空间
//这里的解决办法是 让$_GET['login_order']  与 $_SESSION['USERID'] 进行比较 如果不相符 就跳出
if(isset($_GET['login_order'])){
	$user_id = $_GET['login_order'];
}
if($user_id != $_SESSION['USERID']){
	echo '<script>history.go(-1)</script>';  //如果用户恶意修改url 则返回上一页
	exit();
}
?>