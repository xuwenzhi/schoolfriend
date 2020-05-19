<?php
/* Smarty version 3.1.33, created on 2020-05-19 08:17:39
  from '/data/wwwroot/school.xuwenzhi.com/templates/hotnews.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec325a3989970_57138910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '806357a0f321c25df2efe582c7c48a1221c5f5aa' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/hotnews.htm',
      1 => 1589844714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec325a3989970_57138910 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/data/wwwroot/school.xuwenzhi.com/include/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RDWZ']->value, 'hotnews');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['hotnews']->value) {
?>
    <tr>
        <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
        <td valign="bottom"><a href="news_con.php?news_id=<?php echo $_smarty_tpl->tpl_vars['hotnews']->value['NewsId'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['hotnews']->value['NewsCategory'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['hotnews']->value['NewsTitle'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['hotnews']->value['NewsTitle'],"24","...",true);?>
</a></td>
    </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
