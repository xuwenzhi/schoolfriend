<?php /* Smarty version 2.6.26, created on 2014-02-18 20:08:30
         compiled from top.htm */ ?>
<head>
<script type="text/javascript" src="js/jquery1.8.3.js" ></script>
<script type="text/javascript" src="js/ComFunction.js" ></script>
<script type="text/javascript" src="js/Common.js" ></script>
<link href="./images/css/text.css" rel="stylesheet" type="text/css" />
</head>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
<!-- 这里通过php文件传送过来的变量来判断登录状态         当未登录时-->
<?php if ($this->_tpl_vars['UserLoginState'] == 0): ?>
  <tr>
  <form action="include/LoginController.php" method="post" name="form1" id="loginForm">
    <td height="30" align="right" background="images/1_01.jpg">用户名：
      <input name="UserLoginName" type="text" id="UserLoginName" size="6"  style='width:45px;height:20px;' value='用户名' >
    密码：
      <input name="UserLoginPass" type="password" id="UserLoginPass" size="6"  style='width:45px;height:20px;' value='******'>
      验证码：
      <!-- 这里实现验证码功能  弹出层   START-->
      <div id="divTop" style=" background-color:white; border: solid 1px blue; position:absolute; display:none; width:50px; height:30px;">
      	<center><input type='text' readonly="readonly"  name='code' id="checkCode" style="width:50px"/></center>
      </div>
       <!-- 这里实现验证码功能  弹出层   eNd-->
      <input name="textfield" type="text" id="verifyCode" size="6" style='width:35px;height:20px;' value='点击生成验证码'>
      
       <a id='UserLogin' href='#'>登录</a> <a href="reg.php">注册</a> <a href="#" id='forgetPass' >忘记密码</a></td>
       
       <!--找回密码的层 设置  -->
       <div id='findPass' style='display:none;margin:0 auto;width:74%;height:150px;position:absolutely; left:200px;border:5px solid blue;background-color:#E6FFFF'>
       <center>1:填写用户名---------------------->2:填写验证码------------------------->3:修改密码</center>
       		<center>
       		1:用户名:<input type='text' name='UserName' id='UserName' value='' >
       		<a href='#' id='top_fp'>提交</a><br><br/>
       		<span id='find_result'></span>
       		<div id='findpass_code' style="display:none;">
       			2:验证码:<input type='text' name='UserVerifyCode' id='UserVerifyCode' value='' >
       			<a href='#Pass' id='SubmitCode' >提交验证码</a>
       			<br/>
       		</div>
       		<input type='hidden' id='CheckVerifyCode' value=''><!-- 这个隐藏的框 用于记录生成的验证码 将来和用户输入的进行对比 -->
       		<br>
       		<div id='newPass' style="display:none">
       			3:新密码:<input type='text' name='NewPass1' id='NewPass1'/>
       			确认密码:<input type='text' name='NewPass2' id='NewPass2'/>
       			<a href='#Pass' id='SubmitNewPass' >提交新密码</a>
       		</div>
				
       		</center>
       </div>
       
  </form>
  </tr>
  <!-- 当已经登录时 -->
<?php else: ?>
	<tr><td height="30" align="right" background="images/1_01.jpg">
		<!-- 欢迎 -->欢迎您 <?php echo $this->_tpl_vars['NowUserName']; ?>
		
		<!-- 我的空间 --><a href='myzone.php?login_order=<?php echo $this->_tpl_vars['UserId']; ?>
'>我的空间</a>
		<!-- 注册新用户 --><a href='reg.php'>注册</a>
		<!-- 退出 -->   <a href='quitschool.php'>退出</a>
	</td></tr>
<?php endif; ?>

  <tr>
    <td><img src="images/1_03.jpg"></td>
  </tr>
  <tr>
    <td height="31" align="center" background="images/1_04.jpg" class="zi-bai14b"><a href="index.php" class="a-bai14b">首页</a> | <a href="news.php" class="a-bai14b">新闻公告</a>| <a href='products.php'  class="a-bai14b">产品推介</a> | <a href='informations.php'  class="a-bai14b">供求信息</a>  | <a href='recruits.php'  class="a-bai14b">招聘应聘</a> |<a href='applys.php'  class="a-bai14b">求职应聘</a> |<a href="thing.php" class="a-bai14b">昔日趣事</a> | <a href="miens.php" class="a-bai14b">今昔风采</a> </td>
  </tr>
</table>