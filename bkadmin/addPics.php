<?php
//今昔风采  主要是 上传的图片 之类的事情
include_once "../include/ComFunction.php";
include_once "../include/SqlHelper.class.php";
$sqlHelper = new SqlHelper();
$type = $_GET['type']; //获取图片处理的类型  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/ComFunction.js"></script>
<script type="text/javascript" src="../include/editor/editor.js"></script>
<script type="text/javascript" src="../include/ckfinder/ckfinder.js"></script>
<script type='text/javascript' src="../include/ckeditor/ckeditor.js"></script>
<script type='text/javascript' src="../js/jquery1.8.3.js"></script>
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
<title>校友网后台管理系统</title>
</head>
<body>
<table width=100% border=0 align=center cellpadding=0 cellspacing=0 height="620">
  <tr>
    <td height="120" colspan="2" align="center">
     <div class="header_resize">
      <div class="logo"><img src="../images/1_03.jpg" width='100%' height="150px"/></div>
      <div class="clr"></div>                                      
    </td>
  </tr>
  <tr>
    <td width="140" height="524" align="center" bgcolor="#B8D1E5" valign="top">
    <?php include_once "menu.php";
    		//这里对管理员是否登录进行验证 	START
    	if(!LoginOK()){
			echo '<script> alert("您还未登录,无权限"); location.replace("index.php")</script>';
		exit();
		//这里对管理员是否登录进行验证 	END
    }
		//这里取得要修改文件的 ID   START ....
		if(isset($_GET['words_id'])){
			$words_id = $_GET['words_id']; //取得要修改文件的 id
		}
		//这里取得要修改文件的 ID   END ....
	?>
    </td>
    <td width="1128" height="404" align="center" valign="top"><table width="99%" border="0" cellspacing="1" cellpadding="4"  bgcolor="#CBD8E1">
      <tr bgcolor="#F3F8FC">
        <td height="510" align="center" valign="top">
        <table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
          <tr bgcolor="#F3F8FC">
            <td height="32" align="left" valign="top" bgcolor="#F3F8FC"><div id='mainTop4'><?php if($type ==1) {echo "上传今昔风采照片";} else if($type==3) {echo "修改今夕风采";}?></div></td>
          </tr>
          <tr align="left" valign="top" bgcolor="#F3F8FC">
            <td height="478">
           	 <table align='left' width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
           	 <form action="../include/disposeUploadPic.php?type=<?php echo $type; ?>"  enctype="multipart/form-data" method='post' id='uploadForm'>
           	 <tr  bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>
           	 <td width="10%" align='right'>
           	 	图片类别
           	 </td>
           	 <td width="90%" align='left'>
           	 	<?php
           	 	if($type == 1){
           	 		//如果type==1 的话 就需要从数据库中将图片的类型获取到  是老照片 还是 今日校园 还是 今日校友
           	 		$arr_get_miens_type = get_codeid_from_category(6);//获取到 今昔风采的类型 数组
           	 		if(count($arr_get_miens_type) != 0){
           	 			//通过 单选框来选出 需要上传照片的类型
           	 			for($i = 0 ; $i<count($arr_get_miens_type); $i++){
           	 				if($i == 0){
           	 					echo "<label><input type='radio' name='photo_type' value='".$arr_get_miens_type[$i]['CodeId']."' checked='checked' />".$arr_get_miens_type[$i]['CodeName']."</label>　　　";
           	 				}else{
           	 					echo "<label><input type='radio' name='photo_type' value='".$arr_get_miens_type[$i]['CodeId']."' />".$arr_get_miens_type[$i]['CodeName']."</label>";
           	 				}
           	 			}
           	 		}
           	 	} 
				//代表是修改今夕风采
				else if($type == 3) {
					global $sqlHelper;
					$sql_get_content = "Select PhotoId,PhotoAdd,PhotoPresent,PhotoType from t_photo where PhotoId = $words_id";
					$arr_get_content = $sqlHelper->execute_dql2($sql_get_content);
					$sql_photo_category = "Select CodeId,CodeName from t_basecode where CodeCategoryId = 6";
					$arr_photo_category = $sqlHelper->execute_dql2($sql_photo_category);
					for($i = 0; $i<count($arr_photo_category); $i++) {
						if($arr_get_content[0]['PhotoType'] == $arr_photo_category[$i]['CodeId']){
							echo "<label><input type='radio' name='photoCategory' value='".$arr_photo_category[$i]['CodeId']."' checked='checked'/>".$arr_photo_category[$i]['CodeName']."</label>　　　";
						}else{
								echo "<label><input type='radio' name='photoCategory' value='".$arr_photo_category[$i]['CodeId']."'/>".$arr_photo_category[$i]['CodeName']."</label>　　　";
						}
					}
				}
           	 	?>
           	 	</td>
           	 	</tr>
           	 	 <tr  bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>
           	 <td width="10%" align='right'>
           	 	选择图片
           	 </td>
           	 <td width="90%" align='left'>
           	 	<input type='file' name='ImgName' id="ImgName" value='浏览' onchange="filesize(this)" style="width:100%"/>
           	 	<?php 
           	 		if($type == 3){ 
           	 			echo "原文件名为:".substr($arr_get_content[0]['PhotoAdd'], 14, strlen($arr_get_content[0]['PhotoAdd']));
           	 			echo "<input type='hidden' name='orginal_pic' value='".$arr_get_content[0]['PhotoAdd']."' >";
           	 		}
           	 	?>
           	 </td>
           	 	</tr>
           	 	<!--  因如果是上传今昔风采 是没有图片标题的 所以暂时 先屏蔽掉
           	 	<tr  bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>
           	 		<td align='right'>图片标题</td>
           	 		<td><input type='text' name='PicTitle' style="width:100%" /></td>
           	 	</tr>
           	 	 -->
           	 	<tr  bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>
           	 		<td align='right'>图片描述(限制50字)</td>
           	 		<td><textarea name="PicContent" cols="80" rows="200px" class='PicContent' id="textcontent">
					<?php 
					if($type==3) {
						echo $arr_get_content[0]['PhotoPresent'];
					}
					?>
                    	</textarea>
                    </td>
           	 		<!--配置ckfinder--><script type="text/javascript">
				   	var editor = CKEDITOR.replace( 'textcontent' );
				  	  CKFinder.setupCKEditor( editor, { basePath : '../include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				    </script>
           	 	</tr>
           	 	<tr  bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>
           	 		<td align='center' colspan='2'>
                    <?php
						if($type==1) {
           	 				echo "<input type='button' name='UploadPicSubmit' id='UploadPicSubmit' value='上传图片'/>";
						}else if($type==3) {
							echo "<input type='hidden' name='words_id' value='".$_GET['words_id']."' />";
							echo "<input type='submit' name='submitWords' value='提交修改'/>";
							echo "<input type='submit' name='deleteWords' value='删除'/>";
						}
					?>
           	 			<?php
           	 				if(isset($_GET['dispose'])){
           	 					echo "<input type='submit' name='DeletePhoto' value='删除图片' />";
           	 				} 
           	 			?>
           	 		</td>
           	 	</tr>
           	 	</form>
           	 </table>
			</td>
          </tr>
        </table>
        </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="100" colspan="2" align="center" background="../images/icon/adminbg.jpg"><?include_once "bot.htm"?></td>
  </tr>
</table>
</body>
</html>