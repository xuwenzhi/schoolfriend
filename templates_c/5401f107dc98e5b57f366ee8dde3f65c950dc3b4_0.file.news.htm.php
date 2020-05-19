<?php
/* Smarty version 3.1.33, created on 2020-05-19 07:33:47
  from '/data/wwwroot/school.xuwenzhi.com/templates/news.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec31b5b92cc43_70953072',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5401f107dc98e5b57f366ee8dde3f65c950dc3b4' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/news.htm',
      1 => 1589844825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec31b5b92cc43_70953072 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/data/wwwroot/school.xuwenzhi.com/include/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'/data/wwwroot/school.xuwenzhi.com/include/smarty/libs/plugins/function.counter.php','function'=>'smarty_function_counter',),));
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
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery1.8.3.js" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/fonts.js" ><?php echo '</script'; ?>
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
        <!--热点文章-->
        <?php include_once ('/data/wwwroot/school.xuwenzhi.com/hotnews.php');?>

        </table>
        </td>
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
              <!-- 这里加入隐藏的 搜索框 -->
              <td colspan='4' align='center'>
              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" id='newSEO' height='50px' style="display:none;">
              <form action='news.php' method='get'>
              <tr><td align='center'>
              <!-- 按 新闻类别 -->
              	<select name='NewsCategory'>
              		<option value='11111'>类别</option>
              		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['NEWSCODENAME']->value, 'ncn');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ncn']->value) {
?>
              			<option value='<?php echo $_smarty_tpl->tpl_vars['ncn']->value['CodeId'];?>
'><?php echo $_smarty_tpl->tpl_vars['ncn']->value['CodeName'];?>
</option>
              		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              	</select>
              <!-- 按新闻标题的关键字 -->
              	<input type='text' name='NewsTitleKey' />
              	<input type='submit' name='NewsSEO' value='搜索' style="width:100px;"/>
              	</td>
              	</tr>
              	<tr><td align='right'><a id='closeNewsSeo' href='#closeNewsSeo'><img src='images/X1.jpg'/></a></td></tr>
              	</form>
             </table>
             <span><img src='images/1_01.jpg' width="100%" height="10px" id='newsSEOStart'/></span>
              </td>
            </tr>
            <!-- 这里将新闻公告显示 -->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['XWGG']->value, 'NEWS');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['NEWS']->value) {
?>
            <tr>
              <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
              <td>
              [<?php echo $_smarty_tpl->tpl_vars['NEWS']->value['NewsCategory'];?>
]
              </td>
              <td align='left'><a href='news_con.php?news_id=<?php echo $_smarty_tpl->tpl_vars['NEWS']->value['NewsId'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['NEWS']->value['type'];?>
' title='<?php echo $_smarty_tpl->tpl_vars['NEWS']->value['NewsTitle'];?>
'><?php echo $_smarty_tpl->tpl_vars['NEWS']->value['NewsTitle'];?>
</a> <img src="images/new.gif" width="15" height="6" align="absmiddle"></td>
              <td align='right'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['NEWS']->value['NewsAddTime'],"%Y-%m-%d");?>
</td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
          </td>
        </tr>
        <tr>
          <td height="22" colspan="3" align="center" bgcolor="#e6eaed">
          	<!--  这里放分页  -->
          	<?php if ($_smarty_tpl->tpl_vars['pageNow']->value == 1) {?>
　				<a href="news.php?pageNow=1&NewsCategory=<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['NewsCategory']->value)===null||$tmp==='' ? '11111' : $tmp))===null||$tmp==='' ? true : $tmp);?>
&NewsTitleKey=<?php echo $_smarty_tpl->tpl_vars['NewsTitleKey']->value;?>
"><font color=red>首页</font></a>　
			<?php } else { ?>
				<a href="news.php?pageNow=1&NewsCategory=<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['NewsCategory']->value)===null||$tmp==='' ? '11111' : $tmp))===null||$tmp==='' ? true : $tmp);?>
&NewsTitleKey=<?php echo $_smarty_tpl->tpl_vars['NewsTitleKey']->value;?>
">首页</a>　
			<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['pageNow']->value > 10) {?>
				<a href='news.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value-10;?>
&NewsCategory=<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['NewsCategory']->value)===null||$tmp==='' ? '11111' : $tmp))===null||$tmp==='' ? true : $tmp);?>
&NewsTitleKey=<?php echo $_smarty_tpl->tpl_vars['NewsTitleKey']->value;?>
'><<</a>
			<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['pageNow']->value != 1) {?>
				<a href='news.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value-1;?>
&NewsCategory=<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['NewsCategory']->value)===null||$tmp==='' ? '11111' : $tmp))===null||$tmp==='' ? true : $tmp);?>
&NewsTitleKey=<?php echo $_smarty_tpl->tpl_vars['NewsTitleKey']->value;?>
'>上一页</a>　
			<?php } else { ?>
				    上一页
			<?php }?>

			<?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'print'=>false,'assign'=>'mypage'),$_smarty_tpl);?>

			<?php
$_smarty_tpl->tpl_vars['__smarty_section_sec'] = new Smarty_Variable(array());
if (true) {
for ($__section_sec_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sec']->value['index'] = 0; $__section_sec_0_iteration <= 10; $__section_sec_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sec']->value['index']++){
?>   			<?php if ($_smarty_tpl->tpl_vars['pageStart']->value+$_smarty_tpl->tpl_vars['mypage']->value < $_smarty_tpl->tpl_vars['pageCount']->value) {?>
        	   	<a href='news.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageStart']->value+$_smarty_tpl->tpl_vars['mypage']->value+1;?>
&NewsCategory=<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['NewsCategory']->value)===null||$tmp==='' ? '11111' : $tmp))===null||$tmp==='' ? true : $tmp);?>
&NewsTitleKey=<?php echo $_smarty_tpl->tpl_vars['NewsTitleKey']->value;?>
'>[<?php echo $_smarty_tpl->tpl_vars['pageStart']->value+$_smarty_tpl->tpl_vars['mypage']->value+1;?>
]</a>
			<?php }?>
			<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

			<?php
}
}
?>

						<?php if ($_smarty_tpl->tpl_vars['pageNow']->value < $_smarty_tpl->tpl_vars['pageCount']->value) {?>
			　      <a href='news.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value+1;?>
&NewsCategory=<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['NewsCategory']->value)===null||$tmp==='' ? '11111' : $tmp))===null||$tmp==='' ? true : $tmp);?>
&NewsTitleKey=<?php echo $_smarty_tpl->tpl_vars['NewsTitleKey']->value;?>
'>下一页</a>
			<?php } else { ?>
				下一页
			<?php }?>


						<?php if ($_smarty_tpl->tpl_vars['pageNow']->value < $_smarty_tpl->tpl_vars['pageCount']->value-10) {?>
			<a href='news.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value+10;?>
&NewsCategory=<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['NewsCategory']->value)===null||$tmp==='' ? '11111' : $tmp))===null||$tmp==='' ? true : $tmp);?>
&NewsTitleKey=<?php echo $_smarty_tpl->tpl_vars['NewsTitleKey']->value;?>
'>>></a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['pageNow']->value == $_smarty_tpl->tpl_vars['pageCount']->value) {?>
　				<a href="news.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
&NewsCategory=<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['NewsCategory']->value)===null||$tmp==='' ? '11111' : $tmp))===null||$tmp==='' ? true : $tmp);?>
&NewsTitleKey=<?php echo $_smarty_tpl->tpl_vars['NewsTitleKey']->value;?>
"><font color=red>末页</font></a>
			<?php } else { ?>
			<a href="news.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
&NewsCategory=<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['NewsCategory']->value)===null||$tmp==='' ? '11111' : $tmp))===null||$tmp==='' ? true : $tmp);?>
&NewsTitleKey=<?php echo $_smarty_tpl->tpl_vars['NewsTitleKey']->value;?>
">末页</a>
			<?php }?>
　　　　			当前第<font color="red"><?php echo $_smarty_tpl->tpl_vars['pageNow']->value;?>
</font>页 共<font color="red"><?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
</font>页
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
