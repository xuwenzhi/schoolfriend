<?php
	header("Content-Type:text/html; charset=utf8");
	session_start();
	session_destroy();
	echo '<script> alert("退出成功!"); location.replace("index.php")</script>';
	exit();
?>