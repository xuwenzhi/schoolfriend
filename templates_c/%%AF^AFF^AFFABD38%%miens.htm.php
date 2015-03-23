<?php /* Smarty version 2.6.26, created on 2013-11-02 09:02:37
         compiled from miens.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'miens.htm', 76, false),)), $this); ?>
<html>
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
        <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => "hotnews.php", 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

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
        			<?php $_from = $this->_tpl_vars['JXFC']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['jxfc']):
?>
        			<a href='mien_con.php?phototype=<?php echo $this->_tpl_vars['jxfc']['CodeId']; ?>
'>
        			<div id='Mien_Pic_Show'>
        				<img src='<?php echo ((is_array($_tmp=@$this->_tpl_vars['jxfc']['PhotoAdd'])) ? $this->_run_mod_handler('default', true, $_tmp, "images/noimg.JPG") : smarty_modifier_default($_tmp, "images/noimg.JPG")); ?>
' width='200px' height='180px'/><br>
        				<?php echo $this->_tpl_vars['jxfc']['CodeName']; ?>
<br>
        				<span style="position:relative;left:90px;">创建时间:<?php echo $this->_tpl_vars['jxfc']['PhotoTime']; ?>
</span>

        			</div>
        			</a>
        			<?php endforeach; endif; unset($_from); ?>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'bot.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>