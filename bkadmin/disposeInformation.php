<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../include/editor/editor.js"></script>
<script type="text/javascript" src="../include/ckfinder/ckfinder.js"></script>
<script type='text/javascript' src="../include/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="../js/DatePicker/WdatePicker.js"></script>
<title>校友网后台管理系统</title>
</head>
<?php
	/*
	 * 该文件主要处理点击  删除  和 修改  供求信息
	 */
	include_once "PubFunction.php";
	include_once "../include/SqlHelper.class.php";
	$sqlHelper = new SqlHelper();
	//这里应该获取到要修改的文件的内容的类型  如 新闻公告type=1 今昔风采type=2 .... START
	//取得修改的类型
	if(!isset($_GET['information_id'])){
		echo '<script> alert("链接非法!"); location.replace("../bkinformations.php")</script>';
		exit();
	}
	$information_id = $_GET['information_id'];
	
	$sql_get_informations = "Select * from t_information where InfoId = $information_id";
	$arr_get_content = $sqlHelper->execute_dql2($sql_get_informations); //获取标题和内容
	$Title = $arr_get_content[0]['InfoTitle']; 
	$Content = $arr_get_content[0]['InfoContent'];
	$InformationType = $arr_get_content[0]['InfoType'];//信息类型
	$InforETime = $arr_get_content[0]['InfoETime']; //截止时间
	$InfoPicAdd = $arr_get_content[0]['InfoPictureAdd']; //图片地址
?>
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
	?></td>
    <td width="1128" height="404" align="center" valign="top"><table width="99%" border="0" cellspacing="1" cellpadding="4"  bgcolor="#CBD8E1">
      <tr bgcolor="#F3F8FC">
        <td height="510" align="center" valign="top">
        <table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
          <tr bgcolor="#F3F8FC">
            <td height="32" align="left" valign="top" bgcolor="#F3F8FC"><div id='mainTop4'>信息处理</div></td>
          </tr>
          <tr align="left" valign="top" bgcolor="#F3F8FC">
            <td height="478">
            	<!-- 这里对信息进行 添加   /删除   /修改     START -->
            	<table width="85%" border="0" align="left" cellpadding="4" cellspacing="1"  bgcolor="#CBD8E1">
            	<form action="include/disposeAddWords.php?type=3&do=update"  enctype="multipart/form-data"  method="post" >
            		<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>
            		<td align='right'>活动截止时间</td>
            		<td>
            		<input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21' name='GoodsEndTime' id='RaceON' value='<?php echo $InforETime;?>'  style='width:150px'/>
            		</td>
            		</tr>
            		<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>
            		<td align='right'>添加图片</td>
            		<td>
            		<input type='file' name='information_pic'   style='width:150px'/>  <input type='text' value='原图片地址为 : <?php echo $InfoPicAdd;?>' style='width:350px'>
            		</td>
            		</tr>
            		<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>
            		<td align='right'>信息类型</td>
            		<td>
            		<select name='InforType'>
            		<?php
            			if($InformationType == '供'){
            				echo "<option value='供' checked='checked'>供</option>";
            				echo "<option value='求'>求</option>";
            			}else{
            				echo "<option value='求' checked='checked'>求</option>";
            				echo "<option value='供'>供</option>";
            			}
            		?>
            			
            		</select>
            		</td>
            		</tr>
    				<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >标题</td>
					  <td width="577"><input type="text" name="Title" id="advTea" value="<?php echo $Title;?>" style="width:100%"/></td>
					</tr>
   				    <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
  					  <td height="163" align="right">内容</td>
    				  <td><textarea name="Content" cols="80" rows="200px" id="textcontent"><?php echo $Content; ?></textarea></td>
				   	<!--配置ckfinder--><script type="text/javascript">
				   	var editor = CKEDITOR.replace( 'textcontent' );
				  	  CKFinder.setupCKEditor( editor, { basePath : '../include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				    </script>
</tr>
            	<!-- 这里对信息进行 添加   /删除   /修改     END -->
			</td>
          </tr>
          <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td colspan='2' align="center" ><input type='submit' name='submitUpdateInfor' value='提交修改' />　　　　　<input type='submit' name='deleteInfor' value='删除'/></td>
					  <input type='hidden' name='inforId' value='<?php echo $information_id;?>' />
		  </tr>
          </form>
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
