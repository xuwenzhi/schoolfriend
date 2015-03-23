<?php
	require_once 'include/smarty/Smarty.class.php';
	$smarty = new Smarty();
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";

	$smarty->display("reg.htm");
?>