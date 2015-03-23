<?php /* Smarty version 2.6.26, created on 2014-02-12 18:32:59
         compiled from mien_con.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'mien_con.htm', 73, false),)), $this); ?>
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
<script src="js/Picture/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/Picture/js/list.js"></script>
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
        <?php $_from = $this->_tpl_vars['PHOTO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photo']):
?>
       		 <li  class='liSelected'>
				<span class='sPic'>
					<i class='iBigPic'><img src="<?php echo $this->_tpl_vars['photo']['PhotoAdd']; ?>
"  width='560' height='420'/></i>
				</span>
				<span class='sSideBox'>
					<span class='sIntr'><?php echo $this->_tpl_vars['photo']['PhotoPresent']; ?>
</span>
				</span>
			</li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>

	
	<div class="dSmallPicBox">
		<div class="dSmallPic">
			<ul class="ulSmallPic" style="width:2646px;left:0px" rel="stop">
			<?php $_from = $this->_tpl_vars['PHOTO']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photo']):
?>
				<li>
				<span class='sPic'><img  src='<?php echo $this->_tpl_vars['photo']['PhotoAdd']; ?>
' width='135px' height='100px'/>
				<span class="sTitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['photo']['PhotoPresent'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '18', true) : smarty_modifier_truncate($_tmp, '18', true)); ?>
</span>
				</span>
				</li>
			<?php endforeach; endif; unset($_from); ?>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'bot.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>