<!DOCTYPE html>
<html>
<head>
    <title>校友网注册</title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.0.1.min.css" 
           rel="Stylesheet" type="text/css" />
    <script src="Js/jquery-1.6.4.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.0.1.js" 
           type="text/javascript"></script>
    <script src="Js/index_reg_login.js" 
           type="text/javascript"></script><!-- 原本希望能直接把验证加进去 但是还是先弄别的吧 -->
    <script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
    <script type="text/javascript">
		//
    </script>
    <style> 
//没有通过验证
input:invalid {
 background-position:right center;
 background-repeat:no-repeat;
 background-image:url("Images/ThumbDown.png");//鄙视大拇指
}
//通过验证
input:required:valid{
 background-position:right center;
 background-repeat:no-repeat;
 background-image:url("Images/ThumbUp.png");//竖起大拇指
}

input[type=number]{
	text-align:right;
}
input[type=number]:invalid:out-of-range, input[type=number]:invalid {
	 background-position:left center;
 background-repeat:no-repeat;
 background-image:url("Images/ThumbDown.png");
}

input[type=number]:valid:in-range{
	 background-position:left center;
 	background-repeat:no-repeat;
 	background-image:url("Images/ThumbUp.png");
}
</style> 
</head>
<body>
	<div id='page1' data-role='page'>
		<div data-role='header'>
			<h1>校友网注册</h1>
		</div>
		<div data-role='content' class='content'>
		<!-- 注册表单 -->
        <form method="post" action="Control/RegUser.php" id='regform' method='post'>
			<fieldset id="contactFields">
			<label for="UserRegName">账　　户</label>
			<input type="text" name="UserRegName" id="UserRegName" required  autofocus maxlength="15" size="15" placeholder="6-15位英文和数字组成的字符" /></p>
			
			<label for="UserRegPass1">密　　码</label>
			<input type="text" name="UserRegPass1"  id="UserRegPass1" required pattern="^[a-zA-Z0-9]{6,15}$" maxlength="15" size="15" placeholder='6-15位英文和数字组成的字符' /></p>
			
			<label for="UserRegPass2">确认密码</label>
			<input type="tel" name="UserRegPass2" id="UserRegPass2" required pattern="^[a-zA-Z0-9]{6,15}$" maxlength="15" size="15" placeholder='核实您的密码' /></p>
			
			<label for="UserEmail">电子邮箱</label>
			<input type="email"  name="UserEmail" id="UserEmail" required maxlength="100"  placeholder='填写邮箱可用于找回密码' 
			/></p><!-- 邮箱的正则 pattern="/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i" -->
			<input type="submit" value="提交信息"/>
			</fieldset>
		</form> 
		</div>
		<div data-role='footer'>
			<h1>copyright &copy; azxuwen</h1>
		</div>
	</div>
</body>
</html>