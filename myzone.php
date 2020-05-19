<?php
	require_once 'judgeLogin.php';  //引文件     判断用户是否登录 和用户恶意修改url
	require_once 'include/init.php';
	
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";
	
	//这里该用户所在班级的成员发表的说说调出来
	
	$smarty->display("myzone.htm");
?>