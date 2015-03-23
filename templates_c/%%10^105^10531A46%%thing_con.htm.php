<?php /* Smarty version 2.6.26, created on 2013-09-28 08:09:32
         compiled from thing_con.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'thing_con.htm', 42, false),array('modifier', 'date_format', 'thing_con.htm', 78, false),array('modifier', 'default', 'thing_con.htm', 107, false),)), $this); ?>
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
        <?php $_from = $this->_tpl_vars['hotthing']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotthing']):
?>
    <tr>
        <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
        <td valign="bottom"><a href="thing_con.php?thing_id=<?php echo $this->_tpl_vars['hotthing']['ThingId']; ?>
" title="<?php echo $this->_tpl_vars['hotthing']['thingTitle']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['hotthing']['ThingTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '24', "...", true) : smarty_modifier_truncate($_tmp, '24', "...", true)); ?>
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
              <?php $_from = $this->_tpl_vars['Thing_Con']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Thing_con']):
?>
              <td colspan="3">
              	<center>
              	<h3><?php echo $this->_tpl_vars['Thing_con']['ThingTitle']; ?>
</h3>
                <p>作者:<?php echo $this->_tpl_vars['ThingWrite']; ?>
 |<?php echo ((is_array($_tmp=$this->_tpl_vars['Thing_con']['ThingTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
 | 浏览次数 <?php echo $this->_tpl_vars['Thing_con']['ThingVisitTimes']; ?>
</p>
                </center>
                <p>
                	<?php echo $this->_tpl_vars['Thing_con']['ThingContent']; ?>

                </p>
              </td>
              <?php endforeach; endif; unset($_from); ?>
            </tr>
            </tr>
            <tr height='10px'>
            <td>
            </td>
            </tr>
            <tr>
            <td>
           	 	<font size="+1"><b>涉及到的人</b></font><br>　　　　
            <?php $_from = $this->_tpl_vars['RELATEDUSER']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['relateduser']):
?>
				<?php echo $this->_tpl_vars['relateduser']['username']; ?>
,
            <?php endforeach; endif; unset($_from); ?>
            </td>
            </tr>
            <tr height='10px'>
            <td>
            </td>
            </tr>
            <tr>
            <td>
            	<font size="+1"><b>其他有关他们的趣事</b></font><br>
            	<?php $_from = $this->_tpl_vars['OTHERTHING']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['otherthing']):
?>
            		<a href='thing_con.php?thing_id=<?php echo $this->_tpl_vars['otherthing']['ThingId']; ?>
'><?php echo ((is_array($_tmp=@$this->_tpl_vars['otherthing']['ThingTitle'])) ? $this->_run_mod_handler('default', true, $_tmp, "暂时没有与他/她相关的趣事，您可以选择添加") : smarty_modifier_default($_tmp, "暂时没有与他/她相关的趣事，您可以选择添加")); ?>
</a><br>
            	<?php endforeach; endif; unset($_from); ?>
            	
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'bot.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>