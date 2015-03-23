<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>校友网</title>
<meta name="viewport" content="width=device-width" /> 
<link  href="../Css/jquery.mobile-1.0.1.min.css" rel="Stylesheet" type="text/css" />
<script src="../Js/jquery-1.6.4.js" type="text/javascript"></script>
<link  href="../Css/index.css" rel="Stylesheet" type="text/css" />
<script src="../Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>

<body>
	<?php
		session_start();
		require_once '../Control/SqlHelper.class.php';
		require_once '../Control/ComFunctions.php';
		$sqlHelper = new SqlHelper();
	?>
	<div id='page1' data-role='page'>
		<div data-role='header'  data-position='fixed'>
		<a href='../Me.php' data-ajax='false' data-role='button' data-icon='arrow-l'>返回</a>
			<h1>选择主题</h1>
		</div>
		<div data-role='content'>
	    <select name="selTheme" id="selTheme" data-native-menu="false"> 
		    <option value="">选择主题</option> 
			<option value="a">黑</option> 
			<option value="b">蓝</option> 
			<option value="c">白</option> 
			<option value="d">灰</option> 
			<option value="e">黄</option> 
	    </select>
		</div>
		<div data-role='footer' data-position='fixed'>
			<h2><center>copyright &copy; AZXUWEN 哈尔滨理工大学</center></h2>
		</div>
	</div><!-- page -->
</body>
</html>