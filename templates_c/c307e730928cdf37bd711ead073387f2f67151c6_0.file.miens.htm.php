<?php
/* Smarty version 3.1.33, created on 2020-05-19 07:46:12
  from '/data/wwwroot/school.xuwenzhi.com/templates/miens.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec31e44d2ef43_89194102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c307e730928cdf37bd711ead073387f2f67151c6' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/miens.htm',
      1 => 1589845116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec31e44d2ef43_89194102 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|

哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<link href="css/text.css" rel="stylesheet" type="text/css" />
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
      <tr>
      	<?php 
        	if(isset($_SESSION['USERID'])){
        		echo "<td colspan='3' height='25' align='right'><a href='UploadPic.php'>上传照片</a></td>";
        	}else{
        		echo "<td colspan='3' height='25' align='right'><a href='#'>登录上传照片</a></td>";
        	}
        ?>
      </tr>
      
      <tr>
        <td colspan="3" valign="top">
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        		<tr><td>
        			<!-- 这里面放  div  通过 浮动了 显示 相册的感觉 -->
        			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['JXFC']->value, 'jxfc');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['jxfc']->value) {
?>
        			<a href='mien_con.php?phototype=<?php echo $_smarty_tpl->tpl_vars['jxfc']->value['CodeId'];?>
'>
        			<div id='Mien_Pic_Show'>
        				<img src='<?php echo (($tmp = @$_smarty_tpl->tpl_vars['jxfc']->value['PhotoAdd'])===null||$tmp==='' ? "images/noimg.JPG" : $tmp);?>
' width='200px' height='180px'/><br>
        				<?php echo $_smarty_tpl->tpl_vars['jxfc']->value['CodeName'];?>
<br>
        				<span style="position:relative;left:90px;">创建时间:<?php echo $_smarty_tpl->tpl_vars['jxfc']->value['PhotoTime'];?>
</span>

        			</div>
        			</a>
        			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
