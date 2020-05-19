<?php
/* Smarty version 3.1.33, created on 2020-05-19 05:44:57
  from '/data/wwwroot/school.xuwenzhi.com/templates/UpLoadRecruits.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec301d9ae6499_40893185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2488a884946a790a7a58902fc3627000bcf5183f' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/UpLoadRecruits.htm',
      1 => 1589824248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec301d9ae6499_40893185 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|

哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<link href="css/text.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery1.8.3.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript" type="text/javascript" src="js/DatePicker/WdatePicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="include/editor/editor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="include/ckfinder/ckfinder.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src="include/ckeditor/ckeditor.js"><?php echo '</script'; ?>
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
         <?php include_once ('/data/wwwroot/school.xuwenzhi.com/hotnews.php');?>

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

src="images/tb2.gif"></td>
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">今昔风采</td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" 

width="9" height="9" align="absmiddle"> 首页 > 今昔风采&nbsp;</td>
      </tr>
      <tr height='10'>
      <td></td>
      </tr>
      <tr>
        <td colspan="3" valign="top">

        <table width="98%"  align="center" border='0' cellpadding="0" cellspacing="0">
        <form action="include/disposeUploadRec.php" method='post' >
           	 <tr>
           	 <td width="10%" align='right'>
           	 	行业类别
           	 </td>
           	 <td width="90%" align='left'>
           	 <select name='recruitCategory'>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TRADETYPE']->value, 'tradetype');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tradetype']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['tradetype']->value['TradeId'];?>
"><?php echo $_smarty_tpl->tpl_vars['tradetype']->value['TradeName'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
             </select>
           	 </td>
           	 </tr>
           	 <tr>
           	 <td width="10%" align='right'>
           	 	是否兼职
           	 </td>
           	 <td width="90%" align='left'>
           	 	<select name='recruitJob'>
                	<option value="1">全职</option>
                    <option value="0">兼职</option>
                </select>
           	 </td>
           	 </tr>
             <tr>
             	<td><div align="right">结束时间</div></td>
                <td><input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21' name='recruitsEndTime' style='width:150px'/></td>
             </tr>
             <tr>
             	<td><div align="right">招聘职位</div></td>
                <td><input type='text' name='Position' style='width:100%'/></td>
             </tr>
             <tr>
             	<td><div align="right">职业要求</div></td>
                <td><input type='text' name='Claim' style='width:100%'/></td>
             </tr>
             <tr>
             	<td><div align="right">发布区域</div></td>
                <td>
                <select name="Location">
               		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CITYTYPE']->value, 'citytype');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['citytype']->value) {
?>
                	<option value="<?php echo $_smarty_tpl->tpl_vars['citytype']->value['CityId'];?>
"><?php echo $_smarty_tpl->tpl_vars['citytype']->value['CityName'];?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                </td>
             </tr>
             <tr>
             	<td><div align="right">学历要求</div></td>
                <td><input type='text' name='Degree' style='width:100%'/></td>
             </tr>
             <tr>
             	<td><div align="right">标题</div></td>
                <td><input type="text" name="Title" id="advTea"  style="width:100%"/></td>
             </tr>
           	 <tr>
           	 	<td align='right'>职位描述</td>
           	 	<td><textarea name="Content" cols="80" rows="200px" class='PicContent' id="textcontent"></textarea></td>
           	 	<!--配置ckfinder-->
           	 	<?php echo '<script'; ?>
 type="text/javascript">
				   var editor = CKEDITOR.replace( 'textcontent' );
				  	 CKFinder.setupCKEditor( editor, { basePath : 'include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				<?php echo '</script'; ?>
>
           	 	</tr>
           	 	<tr>
				<!--   这里将SESSION 传递给处理页面  -->
				<input type='hidden' name='USERID' value="<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
" />
           	 		<td align='center' colspan='2'>
           	 			<input type='submit' name='uploadsubmit' value='发布信息'/>
           	 		</td>
           	 	</tr>
           	 	</form>
        </table>
        </td>
        </tr>
        <tr>
          <td height="11"></td>
        </tr>
    </table>
    
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
