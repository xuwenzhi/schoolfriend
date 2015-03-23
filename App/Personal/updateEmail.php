<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>校友网</title>
<meta name="viewport" content="width=device-width" /> 
<link  href="../Css/jquery.mobile-1.0.1.min.css" rel="Stylesheet" type="text/css" />
<script src="../Js/jquery-1.6.4.js" type="text/javascript"></script>
<script src="../Js/index_reg_login.js" type="text/javascript"></script><!-- 原本希望能直接把验证加进去 但是还是先弄别的吧 -->
<link  href="../Css/index.css" rel="Stylesheet" type="text/css" />
<script src="Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>

<body>
	<?php
		session_start();
		require_once '../Control/SqlHelper.class.php';
		require_once '../Control/ComFunctions.php';
		$sqlHelper = new SqlHelper();
		$UserId = $_SESSION['USERID'];
		$sql_get_email = "Select SFUserEmail from t_sfuser where SFUserId = $UserId";
		$arr_get_email = $sqlHelper->execute_dql2($sql_get_email);
		$UserEmail = $arr_get_email[0][SFUserEmail];
	?>
	<div id='page1' data-role='page'>
		<div data-role='header'  data-position='fixed'>
			<h1>填写邮件</h1>
		</div>
		<div data-role='content'>
			<form  id='fosrm1'  method='post'>
			<?php 
			if($UserEmail!=""){
				echo "<input type='text' id='UserEmail' name=='UserEmail' required autofocus='true' pattern='/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i' value='".$UserEmail."' data-inline='true'/>";
			}else{
				echo "<input type='text' id='UserEmail' name=='UserEmail' required autofocus='true' pattern='/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i' placeholder='填写正确的电子邮箱' data-inline='true'/>";
			}
			?>
			<p>填写Email，有助于实时获取本站的信息，信息决定成败</p>		
			<div id='UpdateInfor'></div>
			<input type='button' id='SubBtnEmail' value='保存' >
			</form>
		</div>

	</div>
</body>
</html>