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
<script>
/*
	$(function(){
		//当点击登录时
		$("#SubBtn").click(function(){
			alert('aaa');
			var frmData = $("#form1").serialize();//serialize()函数可以轻松地以UserName=azxuwen&Password=123456这样的方式获取到
			$.ajax({
				type:'post',
				url:'Control/Ajax/AjaxUpPersonName.php',
				cache:false,
				data:frmData,
				success:function(data){
					
				}
			});
		});
	});*/
</script>
<script src="Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>

<body>
<?php
	session_start();
	require_once '../Control/SqlHelper.class.php';
	require_once '../Control/ComFunctions.php';
	$sqlHelper  = new SqlHelper();
	$sql_get_usersex = "Select SFUserSex from t_sfuser where SFUserId = $_SESSION[USERID]";
	$arr_get_usersex = $sqlHelper->execute_dql2($sql_get_usersex);
	$UserSex = $arr_get_usersex[0]['SFUserSex']; 
?>
	<div id='page1' data-role='page'>
		<div data-role='header'  data-position='fixed'>
			<h1>选择性别</h1>
		</div>
		<div data-role='content'>
			<form  id='form1'  method='post'>
			<select id='UserSex' data-role='slider'>
				<?php 
					if($UserSex == 0){
						echo "<option value='0' selected='selected'>女</option>";
						echo "<option value='1'>男</option>";
					}else{
						echo "<option value='0'>女</option>";
						echo "<option value='1' selected='selected'>男</option>";
					}
				?>
			</select>
			<p>选择性别</p>			
			<div id='LoginInfor'></div>
			<input type='button' id='SubBtnSex' value='保存' >
			</form>
		</div>

	</div>
</body>
</html>