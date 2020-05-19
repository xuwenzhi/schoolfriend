<?php
/* Smarty version 3.1.33, created on 2020-05-19 07:43:28
  from '/data/wwwroot/school.xuwenzhi.com/templates/SetApply.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec31da0cc2202_22094118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f9254ca9d9f5eecdd92c54f6ca151f512c93a54' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/SetApply.htm',
      1 => 1589844700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec31da0cc2202_22094118 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
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
<?php echo '<script'; ?>
 language="javascript" type="text/javascript" src="js/DatePicker/WdatePicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="include/editor/editor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="include/ckfinder/ckfinder.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src="include/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language='javascript'>
	$(document).ready(function(){
		$("#SumbitApply").click(function(){
			//这里要判断用户是否填写了真实姓名
			//首先判断该用户是否已经输入了真实姓名
			var UserId = $("#UserId").val();
			var judge_user_truename = 1;
			$.ajax({
				type:"POST",
				dataType:"text",
				async:false,
				data:"UserId="+UserId,
				url:"include/ajax/judgeUserTruenameExists.php",
				success:function(data){
					if(data == '1'){
						alert('您还未填写真实姓名，发布求职信息需要填写真实姓名');
						judge_user_truename = 0;
					}
				}
			});
			if(judge_user_truename == 0){
				return false;
			}
			//如果填写了真实姓名提交表单
			$("#SetApplyForm").submit();
		});
	});
<?php echo '</script'; ?>
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
        <!--热点文章-->
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
        <td width="30" height="25" align="right" valign="bottom" background="images/bg1.jpg"><img 

src="images/tb2.gif" align="absmiddle"></td>
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">求职应聘 </td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" 

width="9" height="9"> 首页 >求职应聘 &nbsp;</td>
      </tr>
      <tr>
        <td width="600px" height="200" colspan="3" valign="top">
          
          <table width="98%"  align="center" border='0' cellpadding="0" cellspacing="0">
       		 <form action="include/disposeSetApply.php" method='post'  id='SetApplyForm'>
       	<tr>
          <td>求职标题</td>
          <td>
          	<input type='text' name='ApplyUnit' style="width:100%"  />
          </td>
       </tr>
        <tr>
          <td>求职岗位</td>
          <td><select name='Apply_Trade' id="Apply_Trade">
                 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Apply_Trade']->value, 'applytype');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['applytype']->value) {
?>
                      <option value='<?php echo $_smarty_tpl->tpl_vars['applytype']->value['TradeName'];?>
'><?php echo $_smarty_tpl->tpl_vars['applytype']->value['TradeName'];?>
</option>
                 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
             </select>
          </td>
       </tr>
       <tr>
       <td>期望薪资</td> 
       <td><input type="text" name="ApplySalary" id="ApplySalary"  size="5"/></span><span id="Salary" style="color:red;float:left;"></td>
       </tr>
		       <tr>
       <td>工作地点</td>
       <td><select name='ApplyLocation' id="ApplyLocation">
             <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Apply_Location']->value, 'applytype');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['applytype']->value) {
?>
              <option value='<?php echo $_smarty_tpl->tpl_vars['applytype']->value[0];?>
'><?php echo $_smarty_tpl->tpl_vars['applytype']->value[0];?>
</option>
               <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
       </td>
       </tr>
       <tr>
       	<td>是否兼职</td>
       	<td>
           <input type="radio" name="ApplyType" value='1'>是
           <input type="radio" name="ApplyType" value='0' checked='checked'/>否
        </td>
       </tr>
        <tr>        
	        <td>有效时间</td>
	        <td>
	        	<input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21'  name='ApplyEndTime' style='width:150px'/>
	        </td>
        </tr>
		<tr>
            <td>
               	要求(限制50字)
            </td>
            <td>
               <textarea name="ApplyClaim" cols="80" rows="200px" class='PicContent' id="textcontent"></textarea>
               <?php echo '<script'; ?>
 type="text/javascript">
       			 var editor = CKEDITOR.replace('textcontent');
       		 	CKFinder.setupCKEditor(editor, {basePath: 'include/ckfinder/', rememberLastFolder: false, toolbar: 'Basic'});
            <?php echo '</script'; ?>
>
            </td>
        </tr>
        <tr>
        <td colspan='2' align='center'>
                <input type='button' id='SumbitApply'  value='发布求职信息'/>
                <input type='hidden' id='UserId' value='<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
'/>
         </td>
    	</tr>
</form>
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
