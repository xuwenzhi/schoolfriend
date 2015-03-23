<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>校友网</title>
<meta name="viewport" content="width=device-width" /> 
<link  href="Css/jquery.mobile-1.0.1.min.css" rel="Stylesheet" type="text/css" />
<script src="Js/jquery-1.6.4.js" type="text/javascript"></script>
<script src="Js/index_reg_login.js" type="text/javascript"></script><!-- 原本希望能直接把验证加进去 但是还是先弄别的吧 -->
<link  href="Css/index.css" rel="Stylesheet" type="text/css" />
<script src="Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>

<body>
	<div id='page1' data-role='page'>
		<div data-role='header'  data-position='fixed'>
			<h1>校友网登录</h1>
		</div>
		<div data-role='content'>
			<table height='100px' width='100%'>
				<tr><td><center><h2>哈尔滨理工大学</h2></center></td></tr>
			</table>
			<form  id='form1' action='Control/LoginControl.php'  data-ajax='false' method='post'>
			<input type='text' id='UserName' name='UserName' placeholder='登录账号' data-inline='true'/><br/>
			<input type='password' id='UserPass' name='UserPass' placeholder='登录密码' data-inline='true'/>
			<div id='LoginInfor'></div>
			<input type='button' id='SubBtn' value='登录' >
			</form>
		</div>

		<div data-role='footer' data-position='fixed'>
		<div data-role='navbar'>
		<ul>
			<li><a href='reg.php' data-icon='plus' data-rel='dialog'>注册账号</a></li>
			<li><a href='#'  data-icon='search'>找回密码</a></li>
		</ul>
		<script>
	$(function(){
		//当点击登录时
		$("#SubBtn").click(function(){
			var frmData = $("#form1").serialize();//serialize()函数可以轻松地以UserName=azxuwen&Password=123456这样的方式获取到
			$.ajax({
				type:'post',
				url:'Control/Ajax/AjaxLoginControl.php',
				cache:false,
				data:frmData,
				success:function(data){
					if(data == 'NO'){
						$("#LoginInfor").html('<font color=red>密码错误！</font>');
					}else if(data == 'NOUSER'){
						$("#LoginInfor").html('<font color=red>不存在该用户！</font>');
					}else{
						//登录成功
						$("#form1").submit();
					}
				}
			});
		});
	});
</script>
		</div>
			<h1>copyright&copy;azxuwen</h1>
		</div>
	</div>
</body>
</html>