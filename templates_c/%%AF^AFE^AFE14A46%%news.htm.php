<?php /* Smarty version 2.6.26, created on 2013-11-20 06:22:07
         compiled from news.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'news.htm', 96, false),array('modifier', 'default', 'news.htm', 106, false),array('function', 'counter', 'news.htm', 121, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|
哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<link href="./images/css/text.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.8.3.js" ></script>
<script type="text/javascript" src="js/fonts.js" ></script>
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
        <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => "hotnews.php", 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

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
              		<?php $_from = $this->_tpl_vars['NEWSCODENAME']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ncn']):
?>
              			<option value='<?php echo $this->_tpl_vars['ncn']['CodeId']; ?>
'><?php echo $this->_tpl_vars['ncn']['CodeName']; ?>
</option>
              		<?php endforeach; endif; unset($_from); ?>
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
            <?php $_from = $this->_tpl_vars['XWGG']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['NEWS']):
?>
            <tr>
              <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
              <td>
              [<?php echo $this->_tpl_vars['NEWS']['NewsCategory']; ?>
]
              </td>
              <td align='left'><a href='news_con.php?news_id=<?php echo $this->_tpl_vars['NEWS']['NewsId']; ?>
&type=<?php echo $this->_tpl_vars['NEWS']['type']; ?>
' title='<?php echo $this->_tpl_vars['NEWS']['NewsTitle']; ?>
'><?php echo $this->_tpl_vars['NEWS']['NewsTitle']; ?>
</a> <img src="images/new.gif" width="15" height="6" align="absmiddle"></td>
              <td align='right'><?php echo ((is_array($_tmp=$this->_tpl_vars['NEWS']['NewsAddTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
            </table>
          </td>
        </tr>
        <tr>
          <td height="22" colspan="3" align="center" bgcolor="#e6eaed">
          	<!--  这里放分页  -->
          	<?php if ($this->_tpl_vars['pageNow'] == 1): ?>
　				<a href="news.php?pageNow=1&NewsCategory=<?php echo ((is_array($_tmp=@$this->_tpl_vars['NewsCategory'])) ? $this->_run_mod_handler('default', true, $_tmp, '11111', true) : smarty_modifier_default($_tmp, '11111', true)); ?>
&NewsTitleKey=<?php echo $this->_tpl_vars['NewsTitleKey']; ?>
"><font color=red>首页</font></a>　
			<?php else: ?>
				<a href="news.php?pageNow=1&NewsCategory=<?php echo ((is_array($_tmp=@$this->_tpl_vars['NewsCategory'])) ? $this->_run_mod_handler('default', true, $_tmp, '11111', true) : smarty_modifier_default($_tmp, '11111', true)); ?>
&NewsTitleKey=<?php echo $this->_tpl_vars['NewsTitleKey']; ?>
">首页</a>　
			<?php endif; ?>
						<?php if ($this->_tpl_vars['pageNow'] > 10): ?>
				<a href='news.php?pageNow=<?php echo $this->_tpl_vars['pageNow']-10; ?>
&NewsCategory=<?php echo ((is_array($_tmp=@$this->_tpl_vars['NewsCategory'])) ? $this->_run_mod_handler('default', true, $_tmp, '11111', true) : smarty_modifier_default($_tmp, '11111', true)); ?>
&NewsTitleKey=<?php echo $this->_tpl_vars['NewsTitleKey']; ?>
'><<</a>
			<?php endif; ?>
						<?php if ($this->_tpl_vars['pageNow'] != 1): ?>
				<a href='news.php?pageNow=<?php echo $this->_tpl_vars['pageNow']-1; ?>
&NewsCategory=<?php echo ((is_array($_tmp=@$this->_tpl_vars['NewsCategory'])) ? $this->_run_mod_handler('default', true, $_tmp, '11111', true) : smarty_modifier_default($_tmp, '11111', true)); ?>
&NewsTitleKey=<?php echo $this->_tpl_vars['NewsTitleKey']; ?>
'>上一页</a>　
			<?php else: ?>
				    上一页
			<?php endif; ?>

			<?php echo smarty_function_counter(array('start' => 0,'skip' => 1,'print' => false,'assign' => 'mypage'), $this);?>

			<?php unset($this->_sections[$this->_tpl_vars['sec']]);
$this->_sections[$this->_tpl_vars['sec']]['name'] = $this->_tpl_vars['sec'];
$this->_sections[$this->_tpl_vars['sec']]['loop'] = is_array($_loop=10) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections[$this->_tpl_vars['sec']]['show'] = true;
$this->_sections[$this->_tpl_vars['sec']]['max'] = $this->_sections[$this->_tpl_vars['sec']]['loop'];
$this->_sections[$this->_tpl_vars['sec']]['step'] = 1;
$this->_sections[$this->_tpl_vars['sec']]['start'] = $this->_sections[$this->_tpl_vars['sec']]['step'] > 0 ? 0 : $this->_sections[$this->_tpl_vars['sec']]['loop']-1;
if ($this->_sections[$this->_tpl_vars['sec']]['show']) {
    $this->_sections[$this->_tpl_vars['sec']]['total'] = $this->_sections[$this->_tpl_vars['sec']]['loop'];
    if ($this->_sections[$this->_tpl_vars['sec']]['total'] == 0)
        $this->_sections[$this->_tpl_vars['sec']]['show'] = false;
} else
    $this->_sections[$this->_tpl_vars['sec']]['total'] = 0;
if ($this->_sections[$this->_tpl_vars['sec']]['show']):

            for ($this->_sections[$this->_tpl_vars['sec']]['index'] = $this->_sections[$this->_tpl_vars['sec']]['start'], $this->_sections[$this->_tpl_vars['sec']]['iteration'] = 1;
                 $this->_sections[$this->_tpl_vars['sec']]['iteration'] <= $this->_sections[$this->_tpl_vars['sec']]['total'];
                 $this->_sections[$this->_tpl_vars['sec']]['index'] += $this->_sections[$this->_tpl_vars['sec']]['step'], $this->_sections[$this->_tpl_vars['sec']]['iteration']++):
$this->_sections[$this->_tpl_vars['sec']]['rownum'] = $this->_sections[$this->_tpl_vars['sec']]['iteration'];
$this->_sections[$this->_tpl_vars['sec']]['index_prev'] = $this->_sections[$this->_tpl_vars['sec']]['index'] - $this->_sections[$this->_tpl_vars['sec']]['step'];
$this->_sections[$this->_tpl_vars['sec']]['index_next'] = $this->_sections[$this->_tpl_vars['sec']]['index'] + $this->_sections[$this->_tpl_vars['sec']]['step'];
$this->_sections[$this->_tpl_vars['sec']]['first']      = ($this->_sections[$this->_tpl_vars['sec']]['iteration'] == 1);
$this->_sections[$this->_tpl_vars['sec']]['last']       = ($this->_sections[$this->_tpl_vars['sec']]['iteration'] == $this->_sections[$this->_tpl_vars['sec']]['total']);
?>   			<?php if ($this->_tpl_vars['pageStart']+$this->_tpl_vars['mypage'] < $this->_tpl_vars['pageCount']): ?>
        	   	<a href='news.php?pageNow=<?php echo $this->_tpl_vars['pageStart']+$this->_tpl_vars['mypage']+1; ?>
&NewsCategory=<?php echo ((is_array($_tmp=@$this->_tpl_vars['NewsCategory'])) ? $this->_run_mod_handler('default', true, $_tmp, '11111', true) : smarty_modifier_default($_tmp, '11111', true)); ?>
&NewsTitleKey=<?php echo $this->_tpl_vars['NewsTitleKey']; ?>
'>[<?php echo $this->_tpl_vars['pageStart']+$this->_tpl_vars['mypage']+1; ?>
]</a>
			<?php endif; ?>
			<?php echo smarty_function_counter(array(), $this);?>

			<?php endfor; endif; ?>

						<?php if ($this->_tpl_vars['pageNow'] < $this->_tpl_vars['pageCount']): ?>
			　      <a href='news.php?pageNow=<?php echo $this->_tpl_vars['pageNow']+1; ?>
&NewsCategory=<?php echo ((is_array($_tmp=@$this->_tpl_vars['NewsCategory'])) ? $this->_run_mod_handler('default', true, $_tmp, '11111', true) : smarty_modifier_default($_tmp, '11111', true)); ?>
&NewsTitleKey=<?php echo $this->_tpl_vars['NewsTitleKey']; ?>
'>下一页</a>
			<?php else: ?>
				下一页
			<?php endif; ?>


						<?php if ($this->_tpl_vars['pageNow'] < "{".($this->_tpl_vars['pageCount'])."-10"): ?>
			<a href='news.php?pageNow=<?php echo $this->_tpl_vars['pageNow']+10; ?>
&NewsCategory=<?php echo ((is_array($_tmp=@$this->_tpl_vars['NewsCategory'])) ? $this->_run_mod_handler('default', true, $_tmp, '11111', true) : smarty_modifier_default($_tmp, '11111', true)); ?>
&NewsTitleKey=<?php echo $this->_tpl_vars['NewsTitleKey']; ?>
'>>></a>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['pageNow'] == $this->_tpl_vars['pageCount']): ?>
　				<a href="news.php?pageNow=<?php echo $this->_tpl_vars['pageCount']; ?>
&NewsCategory=<?php echo ((is_array($_tmp=@$this->_tpl_vars['NewsCategory'])) ? $this->_run_mod_handler('default', true, $_tmp, '11111', true) : smarty_modifier_default($_tmp, '11111', true)); ?>
&NewsTitleKey=<?php echo $this->_tpl_vars['NewsTitleKey']; ?>
"><font color=red>末页</font></a>
			<?php else: ?>
			<a href="news.php?pageNow=<?php echo $this->_tpl_vars['pageCount']; ?>
&NewsCategory=<?php echo ((is_array($_tmp=@$this->_tpl_vars['NewsCategory'])) ? $this->_run_mod_handler('default', true, $_tmp, '11111', true) : smarty_modifier_default($_tmp, '11111', true)); ?>
&NewsTitleKey=<?php echo $this->_tpl_vars['NewsTitleKey']; ?>
">末页</a>
			<?php endif; ?>
　　　　			当前第<font color="red"><?php echo $this->_tpl_vars['pageNow']; ?>
</font>页 共<font color="red"><?php echo $this->_tpl_vars['pageCount']; ?>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'bot.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>