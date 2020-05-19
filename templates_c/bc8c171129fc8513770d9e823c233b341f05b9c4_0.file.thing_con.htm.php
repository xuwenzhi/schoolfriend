<?php
/* Smarty version 3.1.33, created on 2020-05-19 07:44:07
  from '/data/wwwroot/school.xuwenzhi.com/templates/thing_con.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec31dc7909644_90049988',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc8c171129fc8513770d9e823c233b341f05b9c4' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/thing_con.htm',
      1 => 1589845074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec31dc7909644_90049988 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/data/wwwroot/school.xuwenzhi.com/include/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'/data/wwwroot/school.xuwenzhi.com/include/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, 'hotthing', 'hotthing');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['hotthing']->value) {
?>
    <tr>
        <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
        <td valign="bottom"><a href="thing_con.php?thing_id=<?php echo $_smarty_tpl->tpl_vars['hotthing']->value['ThingId'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['hotthing']->value['thingTitle'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['hotthing']->value['ThingTitle'],"24","...",true);?>
</a></td>
    </tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>        </td>
        </tr>
    </table></td>
      </tr>
      </table>
    </td>
    <td></td>
    <td valign="top" class="border">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="30" height="25" align="right" valign="bottom" background="images/bg1.jpg"><img 

src="images/tb2.gif" align="absmiddle"></td>
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">昔日趣事</td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" 

width="9" height="9"> 首页 > 昔日趣事 &nbsp;</td>
      </tr>
      <tr>
        <td height="200" colspan="3" valign="top">
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
              <td></td>
              <td></td>
            </tr>
            <!-- 这里将昔日趣事显示 -->
            
            <tr>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, 'Thing_Con', 'Thing_con');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Thing_con']->value) {
?>
              <td colspan="3">
              	<center>
              	<h3><?php echo $_smarty_tpl->tpl_vars['Thing_con']->value['ThingTitle'];?>
</h3>
                <p>作者:<?php echo $_smarty_tpl->tpl_vars['ThingWrite']->value;?>
 |<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Thing_con']->value['ThingTime'],"%Y-%m-%d");?>
 | 浏览次数 <?php echo $_smarty_tpl->tpl_vars['Thing_con']->value['ThingVisitTimes'];?>
</p>
                </center>
                <p>
                	<?php echo $_smarty_tpl->tpl_vars['Thing_con']->value['ThingContent'];?>

                </p>
              </td>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tr>
            </tr>
            <tr height='10px'>
            <td>
            </td>
            </tr>
            <tr>
            <td>
           	 	<font size="+1"><b>涉及到的人</b></font><br>　　　　
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RELATEDUSER']->value, 'relateduser');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['relateduser']->value) {
?>
				<?php echo $_smarty_tpl->tpl_vars['relateduser']->value['username'];?>
,
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </td>
            </tr>
            <tr height='10px'>
            <td>
            </td>
            </tr>
            <tr>
            <td>
            	<font size="+1"><b>其他有关他们的趣事</b></font><br>
            	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['OTHERTHING']->value, 'otherthing');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['otherthing']->value) {
?>
            		<a href='thing_con.php?thing_id=<?php echo $_smarty_tpl->tpl_vars['otherthing']->value['ThingId'];?>
'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['otherthing']->value['ThingTitle'])===null||$tmp==='' ? "暂时没有与他/她相关的趣事，您可以选择添加" : $tmp);?>
</a><br>
            	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            	
            </td>
            </tr>　
            </table>
          </td>
        </tr>
        
        <tr>
          <td height="11"></td>
        </tr>
    </table>
    </td>
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
