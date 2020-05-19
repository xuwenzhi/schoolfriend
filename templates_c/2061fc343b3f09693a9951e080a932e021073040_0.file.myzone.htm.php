<?php
/* Smarty version 3.1.33, created on 2020-05-19 08:16:41
  from '/data/wwwroot/school.xuwenzhi.com/templates/myzone.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec325692fb428_68310870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2061fc343b3f09693a9951e080a932e021073040' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/myzone.htm',
      1 => 1589844713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec325692fb428_68310870 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|

哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<link href="../images/css/text.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 language='JavaScript'>
	$(document).ready(function(){
		
	});
<?php echo '</script'; ?>
>
</head>

<body topmargin="0" leftmargin="0">
<?php 
	require_once './top.php';
?>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0" class="bg1">
  <tr>
    <td width="11" height="11"></td>
    <td width="159"></td>
    <td width="9"></td>
    <td width="813"></td>
    <td width="11"></td>
  </tr>
  <tr>
    <td height="11"></td>
    <td colspan="3" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%" class="border"><table height="400" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="167" height="238" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="92" height="29" align="center" background="images/1_14.jpg" class="zi-bai14b">个人中心</td>
                <td width="67" align="right" background="images/1_15.jpg">&nbsp;</td>
              </tr>
              <tr>
                <td height="19" colspan="2" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td height="188" colspan="2" valign="top">
                <?php 
                   require_once './myMenu.php';
                ?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td width="167"></td>
          </tr>
        </table></td>
        <td width="1%">&nbsp;</td>
        <td width="82%" class="border"><table width="100%" border="0" cellpadding="0" cellspacing="0" height="400">
          <tr>
            <td width="30" height="25" align="right" valign="bottom" background="images/bg1.jpg"><img 

src="images/tb2.gif" /></td>
            <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">个人信息</td>
            <td align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" width="9" 

height="9" /> 首页 &gt; 个人中心 &gt; 个人信息&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">
           	 <table width="100%" border="0" cellspacing="0" cellpadding="10">
	              <tr>
	             	 <!-- 这里是通过jQuery load函数 load进来 -->
	                <td  valign="top">&nbsp;<br />
	                	<div id='myzone'>
	                		<!-- 这里用于显示信息 或者是 编辑信息 -->
	                		<!-- 在没有点击的时候 这里应显示一部分的信息 -->
	                		<!-- 打算这里放用户所在班级的信息 -->
	                	</div>
	                	<div id='loading'>
	                		
	                	</div>
	                </td>
	              </tr>
             </table></td>
           </tr>
          <tr>
            <td height="11"></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td></td>
  </tr>
  

  
  <tr>
    <td height="11"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
<?php $_smarty_tpl->_subTemplateRender('file:bot.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html>
<?php }
}
