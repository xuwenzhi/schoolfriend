<?php
/* Smarty version 3.1.33, created on 2020-05-19 08:17:41
  from '/data/wwwroot/school.xuwenzhi.com/templates/news_con.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec325a5e5a001_24644086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54915221e190672a03118cf0e273e421db54d221' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/news_con.htm',
      1 => 1589844700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec325a5e5a001_24644086 (Smarty_Internal_Template $_smarty_tpl) {
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RDWZ']->value, 'hotnews');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['hotnews']->value) {
?>
       	<tr>
        	<td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
        	<td valign="bottom"><a href="news_con.php?news_id=<?php echo $_smarty_tpl->tpl_vars['hotnews']->value['NewsId'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['TYPE']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['hotnews']->value['NewsTitle'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['hotnews']->value['NewsTitle'],"24","...",true);?>
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
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">新闻公告</td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" 

width="9" height="9"> 首页 > 新闻公告 &nbsp;</td>
      </tr>
      <tr>
        <td width="600px" height="200" colspan="3" valign="top">
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
              <td></td>
              <td></td>
            </tr>
            <!-- 这里将新闻公告显示 -->
            
            <tr>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['News_Con']->value, 'News_con');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['News_con']->value) {
?>
              <td align='left' colspan="3"><center>
              	<h3><?php echo $_smarty_tpl->tpl_vars['News_con']->value['NewsTitle'];?>
</h3>
                <p>作者:<?php echo $_smarty_tpl->tpl_vars['NewsWrite']->value;?>
 |<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['News_con']->value['NewsAddTime'],"%Y-%m-%d");?>
 | 浏览次数 <?php echo $_smarty_tpl->tpl_vars['News_con']->value['NewsVisitTimes'];?>
</p>
                </center>
                <p>
                	<?php echo $_smarty_tpl->tpl_vars['News_con']->value['NewsContent'];?>

                </p>
              </td>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
