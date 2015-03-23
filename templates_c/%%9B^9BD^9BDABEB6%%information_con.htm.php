<?php /* Smarty version 2.6.26, created on 2013-10-15 07:57:48
         compiled from information_con.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'information_con.htm', 42, false),array('modifier', 'date_format', 'information_con.htm', 77, false),)), $this); ?>
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
          <?php $_from = $this->_tpl_vars['hotinformation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotinformation']):
?>
    	<tr>
        <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
        <td valign="bottom"><a href="information_con.php?info_id=<?php echo $this->_tpl_vars['hotinformation']['InfoId']; ?>
" title="<?php echo $this->_tpl_vars['hotinformation']['InfoTitle']; ?>
">		<?php echo ((is_array($_tmp=$this->_tpl_vars['hotinformation']['InfoTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '24', "...", true) : smarty_modifier_truncate($_tmp, '24', "...", true)); ?>
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
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">供求信息</td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" 

width="9" height="9"> 首页 > 供求信息 &nbsp;</td>
      </tr>
      <tr>
        <td height="200" colspan="3" valign="top">
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
              <td></td>
              <td></td>
            </tr>
            <!-- 这里将求职信息显示 -->
            
            <tr>
              <?php $_from = $this->_tpl_vars['GQXX']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gqxx_con']):
?>
              <td align='left' colspan="3"><center>
              	<h3><?php echo $this->_tpl_vars['gqxx_con']['InfoTitle']; ?>
</h3>
                <p>作者:<?php echo $this->_tpl_vars['gqxx_con']['SFUserName']; ?>
 |<?php echo ((is_array($_tmp=$this->_tpl_vars['gqxx_con']['InfoRTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
 | 浏览次数:<?php echo $this->_tpl_vars['gqxx_con']['InfoVisitTimes']; ?>
</p>
                </center>
                <table width="100%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#d8e1e6" bgcolor="#f1f6fa">
                	<tr><td width="15%"><div align="right">内容</div></td><td width="85%"><?php echo $this->_tpl_vars['gqxx_con']['InfoContent']; ?>
</td>
                <tr>
                <td>
                	<div align="right">配图</div></td>
                	<td>
                		<?php if ($this->_tpl_vars['gqxx_con']['InfoPictureAdd'] != ""): ?>
                			<img src='<?php echo $this->_tpl_vars['gqxx_con']['InfoPictureAdd']; ?>
' width="500px" height="350px"/>
                		<?php endif; ?>
                		<?php if ($this->_tpl_vars['gqxx_con']['InfoPictureAdd'] == ""): ?>
                			<center><img src='images/sad2.jpg' width="130px" height='80px'>暂无配图...</center>
                		<?php endif; ?>
                		
                	</td>
                </tr>	
                <tr>
                <td>
                	<div align="right">截止时间</div></td><td><?php echo $this->_tpl_vars['gqxx_con']['InfoETime']; ?>
</td>
                </tr>
                </table>
              </td>
              <?php endforeach; endif; unset($_from); ?>
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