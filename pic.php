<?php
	require_once 'include/init.php'';
	
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";
	
	
	
	
	$smarty->display("pic.htm");
?>