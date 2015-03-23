<?php /* Smarty version 2.6.26, created on 2013-07-30 14:40:28
         compiled from top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'top.tpl', 13, false),)), $this); ?>
<head>
<script type="text/javascript" src="js/jquery1.8.3.js" ></script>
<script type="text/javascript" src="js/ComFunction.js" ></script>
<script type="text/javascript" src="js/Common.js" ></script>
<link href="./images/css/text.css" rel="stylesheet" type="text/css" />
</head>

<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <form action="include/LoginController.php" method="post" name="form1" id="loginForm">
    <td height="30" align="right" background="images/1_01.jpg">用户名：
      <input name="UserLoginName" type="text" id="UserLoginName" size="6"  style='width:45px;height:20px;' value='用户名' >
    密码：<?php echo ((is_array($_tmp=@$this->_tpl_vars['UserLoginState'])) ? $this->_run_mod_handler('default', true, $_tmp, 'no title') : smarty_modifier_default($_tmp, 'no title')); ?>

    图书类别：<?php echo $this->_tpl_vars['arr'][0]; ?>

	图书名称：<?php echo $this->_tpl_vars['arr']['name']; ?>

	图书单价：<?php echo $this->_tpl_vars['arr']['unit_price']['price']; ?>
<?php echo $this->_tpl_vars['arr']['unit_price']['unit']; ?>


      <input name="UserLoginPass" type="password" id="UserLoginPass" size="6"  style='width:45px;height:20px;' value='******'>
      验证码：
      <!-- 这里实现验证码功能 -->
      <div id="divTop" style=" background-color:white; border: solid 1px blue; position:absolute; display:none; width:50px; height:30px;">
      	<center><input type='text' readonly="readonly"  name='code' id="checkCode" style="width:50px"/></center>
      </div>
      <input name="textfield" type="text" id="verifyCode" size="6" style='width:35px;height:20px;' value='点击生成验证码'>
      
       <a id='UserLogin' href='#'>登录</a> <a href="reg.php">注册</a> <a href="#" id='forgetPass' >忘记密码</a></td>
       <!--找回密码的层 设置  -->
       <div id='findPass' style='display:none;margin:0 auto;width:76%;height:100px;position:absolutely; left:200px;border:1px solid red;'>
       		<center>我们珍惜有你的日子，校友网珍惜有你的存在。<br/>
       		<input type='text' name='finduser' id='finduser' value='输入您的用户名' ><br/>
       		<a href='#' id='top_fp'>提交</a><br><br/>
       		<span id='find_result'></span>
       		</center>
       </div>
  </form>
  </tr>
  <tr>
    <td><img src="images/1_03.jpg"></td>
  </tr>
  <tr>
    <td height="31" align="center" background="images/1_04.jpg" class="zi-bai14b"><a href="index.php" class="a-bai14b">首页</a> | <a href="news.php" class="a-bai14b">新闻公告</a> | 供求信息 | 产品推介 | 招聘应聘 | 昔日趣事 | 今昔风采 </td>
  </tr>
</table>