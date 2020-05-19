<?php
/* Smarty version 3.1.33, created on 2020-05-19 07:46:18
  from '/data/wwwroot/school.xuwenzhi.com/templates/mien_con.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec31e4a2445c9_09428498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc2b2df1dbc122c53b0b14fe7263d34f1e3eca47' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/mien_con.htm',
      1 => 1589844718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec31e4a2445c9_09428498 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/data/wwwroot/school.xuwenzhi.com/include/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|

哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<link href="images/css/text.css" rel="stylesheet" type="text/css" />
<link href="js/Picture/css/list.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 src="js/Picture/js/jquery-1.4.2.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/Picture/js/list.js"><?php echo '</script'; ?>
>
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
      
    </td>
    <td></td>
    <td valign="top" class="border">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="30" height="25" align="right" valign="bottom" background="images/bg1.jpg"><img 

src="images/tb2.gif"></td>
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">今昔风采</td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" 

width="9" height="9" align="absmiddle"> 首页 > 今昔风采&nbsp;</td>
      </tr>
      <tr></tr>
      <tr>
        <td colspan="3" valign="top">
        	<!-- 这里显示照片  -->
        	<table >
        		<tr><td>
     <div class="scrolltab">
		<span id="sLeftBtnA" class="sLeftBtnABan"></span>
		<span id="sRightBtnA" class="sRightBtnA"></span>
	<ul class="ulBigPic">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PHOTO']->value, 'photo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
?>
       		 <li  class='liSelected'>
				<span class='sPic'>
					<i class='iBigPic'><img src="<?php echo $_smarty_tpl->tpl_vars['photo']->value['PhotoAdd'];?>
"  width='560' height='420'/></i>
				</span>
				<span class='sSideBox'>
					<span class='sIntr'><?php echo $_smarty_tpl->tpl_vars['photo']->value['PhotoPresent'];?>
</span>
				</span>
			</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>

	
	<div class="dSmallPicBox">
		<div class="dSmallPic">
			<ul class="ulSmallPic" style="width:2646px;left:0px" rel="stop">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PHOTO']->value, 'photo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
?>
				<li>
				<span class='sPic'><img  src='<?php echo $_smarty_tpl->tpl_vars['photo']->value['PhotoAdd'];?>
' width='135px' height='100px'/>
				<span class="sTitle"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['photo']->value['PhotoPresent'],"18",true);?>
</span>
				</span>
				</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		</div>
		<span id="sLeftBtnB" class="sLeftBtnBBan"></span>
		<span id="sRightBtnB" class="sRightBtnB"></span>
	</div><!--dSmallPicBox end-->
</div>
        		</td></tr>
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
