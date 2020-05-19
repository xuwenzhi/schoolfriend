<head>
<script type="text/javascript" src="js/jquery1.8.3.js" ></script>
<script language="javascript">
	alert("sb");
</script>
</head>
<?php
	require_once 'include/SqlHelper.class.php';
	require_once 'include/smarty/smarty.class.php';
	
	$sqlHelper = new SqlHelper();
	$sql = "Select * from t_class";
	$arr = $sqlHelper->execute_dql2($sql);
	$smarty->assign("vars",$arr[1]['ClassName']);
	$smarty->display("test1.htm");
?>