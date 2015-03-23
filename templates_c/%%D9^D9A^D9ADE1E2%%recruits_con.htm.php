<?php /* Smarty version 2.6.26, created on 2013-11-02 09:02:30
         compiled from recruits_con.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'recruits_con.htm', 44, false),array('modifier', 'date_format', 'recruits_con.htm', 79, false),array('function', 'counter', 'recruits_con.htm', 143, false),)), $this); ?>
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
		<?php $_from = $this->_tpl_vars['hotrecruit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotrecruit']):
?>
    	<tr>
        <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
        <td valign="bottom"><a href="recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['hotrecruit']['RecruitId']; ?>
" title="<?php echo $this->_tpl_vars['hotrecruit']['RecruitTitle']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['hotrecruit']['RecruitTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '24', "...", true) : smarty_modifier_truncate($_tmp, '24', "...", true)); ?>
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
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">招聘应聘</td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" 

width="9" height="9"> 首页 > 招聘应聘 &nbsp;</td>
      </tr>
      <tr>
        <td height="200" colspan="3" valign="top">
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
              <td></td>
              <td></td>
            </tr>
            <!-- 这里将招聘应聘显示 -->
            
            <tr>
              <?php $_from = $this->_tpl_vars['Recruits_Con']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Recruits_Con']):
?>
              <td align='left' colspan="3"><center>
              	<h3><?php echo $this->_tpl_vars['Recruits_Con']['RecruitTitle']; ?>
</h3>
                <p>作者:<?php echo $this->_tpl_vars['RecruitsWrite']; ?>
|<?php echo ((is_array($_tmp=$this->_tpl_vars['Recruits_Con']['RecruitETime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
 |浏览次数：<?php echo $this->_tpl_vars['Recruits_Con']['RecruitVisitTimes']; ?>
 </p>
                </center>
                <p>
                	<font size="+1"><b>职位信息</b></font>
                </p>
                <table>
                	<tr>
                    <td width="300" height="50"><font color="#333333">招聘职位：</font><?php echo $this->_tpl_vars['Recruits_Con']['RecruitPosition']; ?>
</td>
                    <td width='300'><font color="#333333">学历要求</font>：<?php echo $this->_tpl_vars['Recruits_Con']['RecruitDegree']; ?>
</td>
                    </tr>
                    <tr>
                    <td width="300" height="50"><font color="#333333">行业类型：</font><?php echo $this->_tpl_vars['RecruitsCategory']; ?>
</td>
                    <td><font color="#333333">是否兼职：</font><?php echo $this->_tpl_vars['RecruitJob']; ?>
</td>
                    </tr>
                    <tr>
                    <td width="300" height="50"><font color="#333333">发布区域：</font><?php echo $this->_tpl_vars['Recruits_Con']['RecruitLocation']; ?>
</td>
                    <td></td>
                    </tr>
                    <tr>
                    <td width="300" height="50"><font color="#333333">职位要求：</font><?php echo $this->_tpl_vars['Recruits_Con']['RecruitClaim']; ?>
</td>
                    <td></td>
                    </tr>
                </table>
                <p>
                	<font size="+1"><b>职位描述：</b></font>
                </p>
                <p>
                	<?php echo $this->_tpl_vars['Recruits_Con']['RecruitPContent']; ?>

                </p>
                <br/><br/>
                <!--如果是发布者本人访问则显示有谁感兴趣 如果不是就显示有多少人感兴趣不显示其名字-->
                <p align="right">
                	已有<b><?php echo $this->_tpl_vars['Num']; ?>
</b>人对其感兴趣
                </p>
                <?php if ($this->_tpl_vars['WriteUserId'] == $this->_tpl_vars['UserId']): ?>
                <?php if ($this->_tpl_vars['Num'] != 0): ?>
                <a name='place'></a>
                <table  width="75%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#d8e1e6" bgcolor="#f1f6fa">
                	<tr>
                    	<td><div align="center">姓名</div></td><td><div align="center">时间</div></td><td><div align="center">薪水</div></td><td><div align="center">要求</div></td><td><div align="center">是否兼职</div></td>
                	</tr>
                    <?php $_from = $this->_tpl_vars['Person']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Person']):
?>
                    <tr>
                    	<td><div align="center"><?php echo $this->_tpl_vars['Person']['SFUserId']; ?>
</div></td><td><div align="center"><?php echo $this->_tpl_vars['Person']['AcceptTime']; ?>
</div></td><td><div align="center"><?php echo $this->_tpl_vars['Person']['AcceptSalary']; ?>
</div></td><td><?php echo $this->_tpl_vars['Person']['AcceptClaim']; ?>
</td><td><div align="center"><?php echo $this->_tpl_vars['Person']['AcceptType']; ?>
</div></td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    <tr>
                    <td colspan='5' align='center'>
	            <?php if ($this->_tpl_vars['pageNow'] == 1): ?>
	　				<a href="recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['RecruitId']; ?>
&pageNow=1#place"><font color=red>首页</font></a>　
				<?php else: ?>
					<a href="recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['RecruitId']; ?>
&pageNow=1#place">首页</a>　
				<?php endif; ?>
								<?php if ($this->_tpl_vars['pageNow'] > 10): ?>
					<a href='recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['RecruitId']; ?>
&pageNow=<?php echo $this->_tpl_vars['pageNow']-10; ?>
'><<</a>
				<?php endif; ?>
								<?php if ($this->_tpl_vars['pageNow'] != 1): ?>
					<a href='recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['RecruitId']; ?>
&pageNow=<?php echo $this->_tpl_vars['pageNow']-1; ?>
#place'>上一页</a>　
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
?>   				<?php if ($this->_tpl_vars['pageStart']+$this->_tpl_vars['mypage'] < $this->_tpl_vars['pageCount']): ?>
	        	   	<a href='recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['RecruitId']; ?>
&pageNow=<?php echo $this->_tpl_vars['pageStart']+$this->_tpl_vars['mypage']+1; ?>
#place'>[<?php echo $this->_tpl_vars['pageStart']+$this->_tpl_vars['mypage']+1; ?>
]</a>
				<?php endif; ?>
				<?php echo smarty_function_counter(array(), $this);?>

				<?php endfor; endif; ?>
	
								<?php if ($this->_tpl_vars['pageNow'] < $this->_tpl_vars['pageCount']): ?>
				　      <a href='recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['RecruitId']; ?>
&pageNow=<?php echo $this->_tpl_vars['pageNow']+1; ?>
#place'>下一页</a>
				<?php else: ?>
					下一页
				<?php endif; ?>
	
	
								<?php if ($this->_tpl_vars['pageNow'] < $this->_tpl_vars['pageCount']-10): ?>
				<a href='recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['RecruitId']; ?>
&pageNow=<?php echo $this->_tpl_vars['pageNow']+10; ?>
'>>></a>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['pageNow'] == $this->_tpl_vars['pageCount']): ?>
	　				<a href="recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['RecruitId']; ?>
&pageNow=<?php echo $this->_tpl_vars['pageCount']; ?>
#place"><font color=red>末页</font></a>
				<?php else: ?>
				<a href="recruits_con.php?recruits_id=<?php echo $this->_tpl_vars['RecruitId']; ?>
&pageNow=<?php echo $this->_tpl_vars['pageCount']; ?>
#place">末页</a>
				<?php endif; ?>
　　　　			当前第<font color="red"><?php echo $this->_tpl_vars['pageNow']; ?>
</font>页 共<font color="red"><?php echo $this->_tpl_vars['pageCount']; ?>
</font>页
                    </td>
                   	</tr>
                </table>
                <?php endif; ?>
                <?php else: ?>
                <?php if ($this->_tpl_vars['UserLoginState'] == 1): ?> 
                	<!-- 如果不是本人登录 就会出现 一个 点击感兴趣的按钮  -->
                	<!--  定义一个等到的 ajax图 -->
                	<center>
                	<div id='RecruitLikeResult' style="width:300px;height:100px;display:none;background:white; z-index=200;position:absolute;">
					</div>
					</center>
					<!-- 定义一个层 用于填写对招聘信息感兴趣的信息 -->
                	<div id='RecruitLikeDiv'  style="display:none;width:600px;height:200px;border:5px solid blue;background-color:white;position:absolute;top:400px;" >
                		<table width='100%' height='200px' cellpadding="0" cellspacing="0" align="center">
                		<tr height='30px' bgcolor='blue'>
                		<td>
						<font size='3.0em' color='white' face='黑体'>&nbsp;申请职位</font></td>
           				 <td align='right'><a href='#recruit_like_cancel' id='recruit_like_cancel'><img src="images/X1.jpg" width='20px' height='20px'/></a>
      					  </td></tr>
                			<tr><td align="right">期望薪水:</td><td><input type='text' id='RecruitLikeSalay'/></td></tr>
                			<tr><td align="right">求职要求:</td><td><textarea rows='3' cols='30' id='RecruitClaim'/>例如:说明您的情况，但最最重要的是请留下您的电话号码（之后发布该照片信息的会员才会看到）</textarea></td></tr>
                			<tr><td align="right">申请求职:</td>
                			<td>
                				<input type='radio' name='RecruitType' id='RecruitType' value='1' checked='checked'>全职
                				<input type='radio' name='RecruitType' id='RecruitType' value='0'>兼职
                			</td>
                			</tr>
                			<tr><td colspan='2' align='center'><a href='#RecruitLike' id='RecruitLike'>提交</a></td></tr>
                		</table>
                	</div>
                	<p align='center'><a href='#MyLikeRecruit' id='LikeRecruitDiv'>感兴趣</a></p>
                	<!-- 这里将现在登录的用户  Id 隐藏在表单中 -->
                	<input type='hidden' id='UserId' value='<?php echo $this->_tpl_vars['UserId']; ?>
'/>
                	<input type='hidden' id='RecruitId' value='<?php echo $this->_tpl_vars['RecruitId']; ?>
'/>
                	<?php endif; ?>
                <?php endif; ?>
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