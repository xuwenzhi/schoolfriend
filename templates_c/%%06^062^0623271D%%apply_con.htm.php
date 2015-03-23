<?php /* Smarty version 2.6.26, created on 2013-10-21 02:37:08
         compiled from apply_con.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'apply_con.htm', 41, false),)), $this); ?>
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
    <td width="11" height="6"></td>
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
          <?php $_from = $this->_tpl_vars['hotapply']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotapply']):
?>
    <tr>
        <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
        <td valign="bottom"><a href="apply_con.php?apply_id=<?php echo $this->_tpl_vars['hotapply']['ApplyId']; ?>
" title="<?php echo $this->_tpl_vars['hotapply']['ApplyUnit']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['hotapply']['ApplyUnit'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '24', "...", true) : smarty_modifier_truncate($_tmp, '24', "...", true)); ?>
</a></td>
    </tr>
		<?php endforeach; endif; unset($_from); ?>
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
        <td width="30" height="25" align="right" valign="bottom" background="images/bg1.jpg"><img src="images/tb2.gif" align="absmiddle"></td>
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">求职信息</td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" 

width="9" height="9"> 首页 > 求职信息 &nbsp;</td>
      </tr>
      <tr>
        <td height="200" colspan="3" valign="top">
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr height=10">
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <!-- 这里将求职信息显示 -->
            <p>
             <?php $_from = $this->_tpl_vars['apply_Con']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['apply_con']):
?>
             <tr><td><font size="+1"><b>求职信息</b></font></td></tr>
             <p><p>
            <tr height="10px"><td></td></tr>
              <td align='left'width="250px" colspan='2'>求职人： <?php echo $this->_tpl_vars['apply_con']['SFUserName']; ?>
</td>
              <tr height="10px"><td></td></tr>
              <tr><td align='left'width="250px"> 求职岗位： <?php echo $this->_tpl_vars['apply_con']['ApplyUnit']; ?>
 </td>
              <td> 期望薪资： <?php echo $this->_tpl_vars['apply_con']['ApplySalary']; ?>
 </td></tr>
              <tr height="10px"><td></td></tr> 
              <tr><td> 工作地点： <?php echo $this->_tpl_vars['apply_con']['ApplyLocation']; ?>
 </td>
             <td> 是否兼职：<?php echo $this->_tpl_vars['apply_con']['ApplyType']; ?>
</td></tr>
              <tr height="10px"><td></td></tr>
              <tr><td> 发布时间： <?php echo $this->_tpl_vars['apply_con']['ApplyTime']; ?>
 </td>
               <td> 有效时间： <?php echo $this->_tpl_vars['apply_con']['ApplyETime']; ?>
 </td></tr>
                             <tr height="10px"><td></td></tr>
               <tr height='10px'><td></td></tr>
               <tr><td><font size="+1"><b>求职要求</b></font></td></tr>
               <tr height='10px'><td></td></tr>
              <tr><td><?php echo $this->_tpl_vars['apply_con']['ApplyClaim']; ?>
 </td></tr>
            </table>
          </td>
        </tr>
                      <?php endforeach; endif; unset($_from); ?>
        <tr>
          <td height="11"></td>
        </tr>
    </table>
    </td>
    <td></td>
  </tr>

  <tr>
    <td height="11"></td>
    <td height="11"><input type='hidden' name='ApplyType' id="ApplyType" value=" <?php echo $this->_tpl_vars['apply_con']['ApplyType']; ?>
" /></td>
    <td></td>
    <td></td>
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