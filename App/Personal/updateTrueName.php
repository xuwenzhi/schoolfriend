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
		$UserId = $_SESSION['USERID'];
		$TrueName = getUserFromTsfuser($UserId);
		
	?>
	<div id='page1' data-role='page'>
		<div data-role='header' data-position='fixed'>
			<h1>填写真实姓名</h1>
		</div>
		<div data-role='content'>
			<form  id='form1' action='Control/UpPersonName.php'  data-ajax='false' method='post'>
			<?php 
				if($TrueName!=""){
					echo "<input type='text' id='UserTrueName' name=='UserTrueName' autofocus='true'  value='".$TrueName."' data-inline='true'/>";
				}else{
					echo "<input type='text' id='UserTrueName' name=='UserTrueName' autofocus='true'  placeholder='填写真实姓名' data-inline='true'/>";				
				}
			?>
			<p>填写真实姓名，可享受诸多特权，方便您的生活，我们也会尊重您的隐私</p>			
			<div id='LoginInfor'></div>
			<input type='button' id='SubBtnTrueName' value='保存' >
			</form>
		</div>
	</div>
</body>
</html>