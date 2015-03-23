<?php /* Smarty version 2.6.26, created on 2013-10-13 12:44:27
         compiled from reg.htm */ ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|

哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<link href="./images/css/text.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="0" leftmargin="0">
<?php 
	require_once './top.php';
 ?>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0" class="bg1">
  <tr>
    <td width="11" height="11"></td>
    <td></td>
    <td width="11"></td>
    <td width="650"></td>
    <td width="11"></td>
  </tr>
  <tr>
    <td height="11"></td>
    <td valign="top">
      <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="325" valign="top" class="border"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="97" height="29" align="center" background="images/1_09.jpg" class="zi-lan14b">热点文章</td>
        <td width="218" align="right" background="images/1_09.jpg"><img src="images/more.gif" width="44" height="13" 

align="absmiddle">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => "hotnews.php", 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

        </table></td>
        </tr>
    </table></td>
      </tr>
      </table>
    </td>
    <td></td>
    <td class="border">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="30" height="25" align="right" valign="bottom" background="images/bg1.jpg"><img 

src="images/tb5.gif"></td>
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">会员注册</td>
        <td align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" width="9" 

height="9" align="absmiddle"> 首页 > 会员注册&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><br>
        <table width="75%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#d8e1e6" bgcolor="#f1f6fa">
        <form action="include/RegController.php" method="post" id='regForm' name='form1'>
          <tr>
            <td width="25%" height="25" align="right">用户名：</td>
            <td><input name="UserRegName" id='UserRegName' type="text"><span id='UserNameCheck'></span></td>
            <!-- 上一行的span用于验证显示 -->
          </tr>
          <tr>
            <td height="25" align="right">密码：</td>
            <td><input name="UserRegPass1" id='UserRegPass1' type="password"><span id='UserPassCheck1'></span></td>
          </tr>
          <tr>
            <td height="25" align="right">重复密码：</td>
            <td><input name="UserRegPass2" id='UserRegPass2' type="password"><span id='UserPassCheck2'></span></td>
          </tr>
          <tr>
            <td height="25" align="right">电子邮箱：</td>
            <td><input name="UserEmail" id='UserEmail' type="text"><span id='UserEmailCheck'></span></td>
          </tr>
          
          <tr>
            <td height="35" colspan="2" align="center"><label>
            <input type='reset' id='ResetHidden' style='display:none; '/>
             <a id="UserReg" href='#' >注册</a>
             <a id="Reset" href='#' >重置</a>
             <!-- 这里将链接作为了提交表单      -->
            </label></td>
            </tr>
            </form>
        </table>       
        <br></td>
        </tr>
        <tr>
          <td height="11"></td>
        </tr>
    </table>
    </td>
    <td></td>
  </tr>
  </table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'bot.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>