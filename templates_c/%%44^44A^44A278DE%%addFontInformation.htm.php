<?php /* Smarty version 2.6.26, created on 2013-10-15 05:08:07
         compiled from addFontInformation.htm */ ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|

哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<link href="css/text.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.8.3.js"></script>
<script type="text/javascript" src="include/editor/editor.js"></script>
<script type="text/javascript" src="include/ckfinder/ckfinder.js"></script>
<script type='text/javascript' src="include/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="js/DatePicker/WdatePicker.js"></script>
<script language="javascript">
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
</script>
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
        <td width="88" align="center" valign="bottom" background="images/bg1.jpg" class="zi-hei14b">供求信息</td>
        <td width="82%" align="right" background="images/bg1.jpg" class="zi-hui12"><img src="images/tb3.gif" 

width="9" height="9" align="absmiddle"> 首页 > 供求信息&nbsp;</td>
      </tr>
      <tr height='10'>
      <td></td>
      </tr>
      <tr>
        <td colspan="3" valign="top">
		<table width="98%"  align="center" border='0' cellpadding="0" cellspacing="0">
        <form action="include/addFontInforControl.php"  enctype="multipart/form-data" method='post' id='uploadForm'>
				<tr>
            	<td width="50" align='right'>截止时间</td>
            	<td width="587">
            	<input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21' name='GoodsEndTime'  style='width:150px' />
            	</td>
            	</tr>
            	<tr>
            	<td align='right'>添加图片</td>
            	<td>
            	<input type='file' name='information_pic' value='浏览...'  style='width:150px'/>
            	</td>
            	</tr>
            	<tr>
            	<td align='right'>信息类型</td>
            	<td>
            	<select name='InforType'>
            	<option value='供'>供</option>
            	<option value='求'>求</option>
            	</select>";
            	</td>
            	</tr>
            	<tr>
					  <td width="50" align="right" >标题</td>
					  <td width="587"><input type="text" name="Title" id="advTea"  style="width:100%"/></td>
					</tr>
   				<tr>
  					  <td height="163" align="right">内容</td>
    				  <td><textarea name="Content" cols="80" rows="200px" id="textcontent"></textarea></td>
				   	<!--配置ckfinder--><script type="text/javascript">
				   	var editor = CKEDITOR.replace( 'textcontent' );
				  	  CKFinder.setupCKEditor( editor, { basePath : '../include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				    </script>
				</tr>
				<tr>
					<td align='center' colspan='2'><input type='submit'  name='submitAddinfor' value='添加信息' /></td>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'bot.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>