<?php
/* Smarty version 3.1.33, created on 2020-05-19 07:58:40
  from '/data/wwwroot/school.xuwenzhi.com/templates/recruits_con.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec321309a5217_23533339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1ff5fb1fe5c42823367482358bfef734bdfb33d' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/recruits_con.htm',
      1 => 1589846319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec321309a5217_23533339 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery1.8.3.js" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/fonts.js" ><?php echo '</script'; ?>
>
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
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, 'hotrecruit', 'hotrecruit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['hotrecruit']->value) {
?>
    	<tr>
        <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
        <td valign="bottom"><a href="recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['hotrecruit']->value['RecruitId'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['hotrecruit']->value['RecruitTitle'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['hotrecruit']->value['RecruitTitle'],"24","...",true);?>
</a></td>
    	</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, 'Recruits_Con', 'Recruits_Con');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Recruits_Con']->value) {
?>
              <td align='left' colspan="3"><center>
              	<h3><?php echo $_smarty_tpl->tpl_vars['Recruits_Con']->value['RecruitTitle'];?>
</h3>
                <p>作者:<?php echo $_smarty_tpl->tpl_vars['RecruitsWrite']->value;?>
|<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Recruits_Con']->value['RecruitETime'],"%Y-%m-%d");?>
 |浏览次数：<?php echo $_smarty_tpl->tpl_vars['Recruits_Con']->value['RecruitVisitTimes'];?>
 </p>
                </center>
                <p>
                	<font size="+1"><b>职位信息</b></font>
                </p>
                <table>
                	<tr>
                    <td width="300" height="50"><font color="#333333">招聘职位：</font><?php echo $_smarty_tpl->tpl_vars['Recruits_Con']->value['RecruitPosition'];?>
</td>
                    <td width='300'><font color="#333333">学历要求</font>：<?php echo $_smarty_tpl->tpl_vars['Recruits_Con']->value['RecruitDegree'];?>
</td>
                    </tr>
                    <tr>
                    <td width="300" height="50"><font color="#333333">行业类型：</font><?php echo $_smarty_tpl->tpl_vars['RecruitsCategory']->value;?>
</td>
                    <td><font color="#333333">是否兼职：</font><?php echo $_smarty_tpl->tpl_vars['RecruitJob']->value;?>
</td>
                    </tr>
                    <tr>
                    <td width="300" height="50"><font color="#333333">发布区域：</font><?php echo $_smarty_tpl->tpl_vars['Recruits_Con']->value['RecruitLocation'];?>
</td>
                    <td></td>
                    </tr>
                    <tr>
                    <td width="300" height="50"><font color="#333333">职位要求：</font><?php echo $_smarty_tpl->tpl_vars['Recruits_Con']->value['RecruitClaim'];?>
</td>
                    <td></td>
                    </tr>
                </table>
                <p>
                	<font size="+1"><b>职位描述：</b></font>
                </p>
                <p>
                	<?php echo $_smarty_tpl->tpl_vars['Recruits_Con']->value['RecruitPContent'];?>

                </p>
                <br/><br/>
                <!--如果是发布者本人访问则显示有谁感兴趣 如果不是就显示有多少人感兴趣不显示其名字-->
                <p align="right">
                	已有<b><?php echo $_smarty_tpl->tpl_vars['Num']->value;?>
</b>人对其感兴趣
                </p>
                <?php if ($_smarty_tpl->tpl_vars['WriteUserId']->value == $_smarty_tpl->tpl_vars['UserId']->value) {?>
                <?php if ($_smarty_tpl->tpl_vars['Num']->value != 0) {?>
                <a name='place'></a>
                <table  width="75%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#d8e1e6" bgcolor="#f1f6fa">
                	<tr>
                    	<td><div align="center">姓名</div></td><td><div align="center">时间</div></td><td><div align="center">薪水</div></td><td><div align="center">要求</div></td><td><div align="center">是否兼职</div></td>
                	</tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, 'Person', 'Person');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Person']->value) {
?>
                    <tr>
                    	<td><div align="center"><?php echo $_smarty_tpl->tpl_vars['Person']->value['SFUserId'];?>
</div></td><td><div align="center"><?php echo $_smarty_tpl->tpl_vars['Person']->value['AcceptTime'];?>
</div></td><td><div align="center"><?php echo $_smarty_tpl->tpl_vars['Person']->value['AcceptSalary'];?>
</div></td><td><?php echo $_smarty_tpl->tpl_vars['Person']->value['AcceptClaim'];?>
</td><td><div align="center"><?php echo $_smarty_tpl->tpl_vars['Person']->value['AcceptType'];?>
</div></td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <tr>
                    <td colspan='5' align='center'>
	            <?php if ($_smarty_tpl->tpl_vars['pageNow']->value == 1) {?>
	　				<a href="recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
&pageNow=1#place"><font color=red>首页</font></a>　
				<?php } else { ?>
					<a href="recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
&pageNow=1#place">首页</a>　
				<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['pageNow']->value > 10) {?>
					<a href='recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
&pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value-10;?>
'><<</a>
				<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['pageNow']->value != 1) {?>
					<a href='recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
&pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value-1;?>
#place'>上一页</a>　
				<?php } else { ?>
					    上一页
				<?php }?>
	
				<?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'print'=>false,'assign'=>'mypage'),$_smarty_tpl);?>

				<?php
$_smarty_tpl->tpl_vars['__smarty_section_sec'] = new Smarty_Variable(array());
if (true) {
for ($__section_sec_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sec']->value['index'] = 0; $__section_sec_0_iteration <= 10; $__section_sec_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sec']->value['index']++){
?>   				<?php if ($_smarty_tpl->tpl_vars['pageStart']->value+$_smarty_tpl->tpl_vars['mypage']->value < $_smarty_tpl->tpl_vars['pageCount']->value) {?>
	        	   	<a href='recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
&pageNow=<?php echo $_smarty_tpl->tpl_vars['pageStart']->value+$_smarty_tpl->tpl_vars['mypage']->value+1;?>
#place'>[<?php echo $_smarty_tpl->tpl_vars['pageStart']->value+$_smarty_tpl->tpl_vars['mypage']->value+1;?>
]</a>
				<?php }?>
				<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

				<?php
}
}
?>
	
								<?php if ($_smarty_tpl->tpl_vars['pageNow']->value < $_smarty_tpl->tpl_vars['pageCount']->value) {?>
				　      <a href='recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
&pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value+1;?>
#place'>下一页</a>
				<?php } else { ?>
					下一页
				<?php }?>
	
	
								<?php if ($_smarty_tpl->tpl_vars['pageNow']->value < $_smarty_tpl->tpl_vars['pageCount']->value-10) {?>
				<a href='recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
&pageNow=<?php echo $_smarty_tpl->tpl_vars['pageNow']->value+10;?>
'>>></a>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['pageNow']->value == $_smarty_tpl->tpl_vars['pageCount']->value) {?>
	　				<a href="recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
&pageNow=<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
#place"><font color=red>末页</font></a>
				<?php } else { ?>
				<a href="recruits_con.php?recruits_id=<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
&pageNow=<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
#place">末页</a>
				<?php }?>
　　　　			当前第<font color="red"><?php echo $_smarty_tpl->tpl_vars['pageNow']->value;?>
</font>页 共<font color="red"><?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
</font>页
                    </td>
                   	</tr>
                </table>
                <?php }?>
                <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['UserLoginState']->value == 1) {?> 
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
                	<input type='hidden' id='UserId' value='<?php echo $_smarty_tpl->tpl_vars['UserId']->value;?>
'/>
                	<input type='hidden' id='RecruitId' value='<?php echo $_smarty_tpl->tpl_vars['RecruitId']->value;?>
'/>
                	<?php }?>
                <?php }?>
              </td>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
<?php $_smarty_tpl->_subTemplateRender('file:bot.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html>
<?php }
}
