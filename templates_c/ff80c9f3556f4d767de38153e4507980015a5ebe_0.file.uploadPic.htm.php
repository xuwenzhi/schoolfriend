<?php
/* Smarty version 3.1.33, created on 2020-05-19 06:51:29
  from '/data/wwwroot/school.xuwenzhi.com/templates/uploadPic.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec311714a98e7_92714981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff80c9f3556f4d767de38153e4507980015a5ebe' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/uploadPic.htm',
      1 => 1589824248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:bot.htm' => 1,
  ),
),false)) {
function content_5ec311714a98e7_92714981 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|

哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<link href="css/text.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery1.8.3.js"><?php echo '</script'; ?>
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
 language="javascript">
	$(document).ready(function(){
		//用户点击确定 上传
		  $("#UploadPicSubmit").click(function(event){
			  var file = document.getElementById('ImgName').value; //取得用户添加的图片名称
			  //如果没有选择图片
			   if(file == ""){
			       alert("请选择照片");
			       event.stopPropagation(); 
			       return false;
			   }
			  //这里对图片的扩展名进行验证   这里是一段正则表达式
		      if(!/\.(gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG)$/i.test(file)){
		          alert("图片类型必须是.gif,jpeg,jpg,png中的一种");
		          event.stopPropagation(); 
		          return false;
		      }
		      //原本想这里这通过JS来判断 图片描述的内容的长度是否标准 但是应该是由于 cdfinder的插件的原因  取不到值
		      //下面提交表单
		      $("#uploadForm").submit();//提交表单 
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
          <?php include_once ('/data/wwwroot/school.xuwenzhi.com/hotnews.php');?>

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
      <tr height='10'>
      <td></td>
      </tr>
      <tr>
        <td colspan="3" valign="top">

        <table width="98%"  align="center" border='0' cellpadding="0" cellspacing="0">
        <form action="include/disposeUploadPic.php?type=1&do=update"  enctype="multipart/form-data" method='post' id='uploadForm'>
           	 <tr>
           	 <td width="10%" align='right'>
           	 	图片类别
           	 </td>
           	 <td width="90%" align='left'>
           	 <select name='photo_type'>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MIENSTYPE']->value, 'mienstype');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mienstype']->value) {
?>
					<option value='<?php echo $_smarty_tpl->tpl_vars['mienstype']->value['CodeId'];?>
'><?php echo $_smarty_tpl->tpl_vars['mienstype']->value['CodeName'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
           	 </td>
           	 </tr>
           	 <tr>
           	 <td width="10%" align='right'>
           	 	选择图片
           	 </td>
           	 <td width="90%" align='left'>
           	 	<input type='file' name='ImgName' id="ImgName" value='浏览' onChange="filesize(this)" style="width:100%"/>
           	 </td>
           	 </tr>
           	 <tr>
           	 	<td align='right'>图片描述(限制50字)</td>
           	 	<td><textarea name="PicContent" cols="80" rows="200px" class='PicContent' id="textcontent"></textarea></td>
           	 	<!--配置ckfinder-->
           	 	<?php echo '<script'; ?>
 type="text/javascript">
				   var editor = CKEDITOR.replace( 'textcontent' );
				  	 CKFinder.setupCKEditor( editor, { basePath : 'include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				<?php echo '</script'; ?>
>
           	 	</tr>
           	 	<tr>
				<!--   这里将SESSION 传递给处理页面  -->
				<input type='hidden' name='USERID' value="<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
" />
           	 		<td align='center' colspan='2'>
           	 			<input type='button' name='UploadPicSubmit' id="UploadPicSubmit" value='上传图片'/>
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
