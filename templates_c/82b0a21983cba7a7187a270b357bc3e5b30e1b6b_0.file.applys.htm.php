<?php
/* Smarty version 3.1.33, created on 2020-05-19 07:42:28
  from '/data/wwwroot/school.xuwenzhi.com/templates/applys.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec31d64277a13_02884086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82b0a21983cba7a7187a270b357bc3e5b30e1b6b' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/applys.htm',
      1 => 1589845346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec31d64277a13_02884086 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/data/wwwroot/school.xuwenzhi.com/include/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'/data/wwwroot/school.xuwenzhi.com/include/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),2=>array('file'=>'/data/wwwroot/school.xuwenzhi.com/include/smarty/libs/plugins/function.counter.php','function'=>'smarty_function_counter',),));
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
        <td width="218" align="right" background="images/1_09.jpg"><img src="images/more.gif" width="44" height="13"align="absmiddle">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
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
        <td width="30" height="25" align="right" valign="bottom" background="images/bg1.jpg"><img src="images/tb2.gif" align="absmiddle"></td>
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">求职信息</td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" width="9" height="9"> 首页 > 求职信息&nbsp;<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
</td>
      </tr>
       <tr>
      	<?php 
        	if(isset($_SESSION['USERID'])){
        		echo "<td colspan='3' height='25' align='right'><a href='MyApply.php'>我的求职</a>　　<a href='SetApply.php'>发布求职信息</a></td>";
        	}else{
        		echo "<td colspan='3' height='25' align='right'><a href='#'>登录发布求职信息</a></td>";
        	}
        ?>
      </tr>
      <tr>
        <td height="200" colspan="3" valign="top">
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
              <td></td>
              <td></td>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['QZXX']->value, 'qzxx');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['qzxx']->value) {
?>
            	<tr>
            		<td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
		            <td align='left'><a href='apply_con.php?apply_id=<?php echo $_smarty_tpl->tpl_vars['qzxx']->value['ApplyId'];?>
' title='<?php echo $_smarty_tpl->tpl_vars['qzxx']->value['ApplyUnit'];?>
'><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['qzxx']->value['ApplyUnit'],43,"...",true);?>
</a> <img src="images/new.gif" width="15" height="6" align="absmiddle"></td>
		            <td align='right'><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['qzxx']->value['ApplyTime'],"%Y-%m-%d");?>
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
　				<a href="applys.php?pageNow=1"><font color=red>首页</font></a>　
			<?php } else { ?>
				<a href="applys.php?pageNow=1">首页</a>　
			<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['pageNow']->value > 10) {?>
				<a href='applys.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value-10;?>
'><<</a>
			<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['pageNow']->value != 1) {?>
				<a href='applys.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value-1;?>
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
        	   	<a href='applys.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageStart']->value+$_smarty_tpl->tpl_vars['mypage']->value+1;?>
'>[<?php echo $_smarty_tpl->tpl_vars['pageStart']->value+$_smarty_tpl->tpl_vars['mypage']->value+1;?>
]</a>
			<?php }?>
			<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

			<?php
}
}
?>

						<?php if ($_smarty_tpl->tpl_vars['pageNow']->value < $_smarty_tpl->tpl_vars['pageCount']->value) {?>
			　      <a href='applys.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value+1;?>
'>下一页</a>
			<?php } else { ?>
				下一页
			<?php }?>



						<?php if ($_smarty_tpl->tpl_vars['pageNow']->value < $_smarty_tpl->tpl_vars['pageCount']->value-10) {?>
			<a href='applys.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value+10;?>
'>>></a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['pageNow']->value == $_smarty_tpl->tpl_vars['pageCount']->value) {?>
　				<a href="applys.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
"><font color=red>末页</font></a>
			<?php } else { ?>
			<a href="applys.php?pageNow=<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
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
