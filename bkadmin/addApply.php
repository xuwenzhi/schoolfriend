<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.8.3.js" ></script>
<script type='text/javascript' src="js/getSmallGoods.js"></script>
<script type="text/javascript" src="../include/editor/editor.js"></script>
<script type="text/javascript" src="../include/ckfinder/ckfinder.js"></script>
<script type='text/javascript' src="../include/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="../js/DatePicker/WdatePicker.js"></script>
<title>校友网后台管理系统</title>
</head>
<?php
	include_once "PubFunction.php";
	include_once "../include/SqlHelper.class.php";
	include_once '../include/ComFunction.php';
	$sqlHelper = new SqlHelper();
	//获取城市
	$arr_get_city = get_applyLocation();
	$citymax = count($arr_get_city);
	$arr_get_Tradename=  get_applyUnit();
	$trademax = count($arr_get_Tradename);
	
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
	?>
    </td>
    <td width="1128" height="404" align="center" valign="top"><table width="99%" border="0" cellspacing="1" cellpadding="4"  bgcolor="#CBD8E1">
      <tr bgcolor="#F3F8FC">
        <td height="510" align="center" valign="top">
        <table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
          <tr bgcolor="#F3F8FC">
            <td height="32" align="left" valign="top" bgcolor="#F3F8FC"><div id='mainTop4'>
            添加求职信息
            </div></td>
          </tr>
          <tr align="left" valign="top" bgcolor="#F3F8FC">
            <td height="478">	
            	<!-- 该页面用于添加文章 -->
            	<table width="85%" border="0" align="left" cellpadding="4" cellspacing="1"  bgcolor="#CBD8E1">
            	<form action="include/disposeAddApply.php"  enctype="multipart/form-data"  method="post" >
                	<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >是否兼职</td>
					  <td width="577">
                      <select name="Type">
                      <option value="1">全职</option>
                      <option value="0">兼职</option>
                      </select>
                      </td>
					</tr>
                    <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >结束时间</td>
					  <td width="577"><input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21' name='ApplyETime' id='RaceON'  style='width:150px'/></td>
					</tr>
    				<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >标题</td>
					  <td width="577"><input type="text" name="Title" id="advTea"  style="width:100%"/></td>
					</tr>
                    <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >薪资</td>
					  <td width="577"><input type="text" name="Salary" id="advTea"  style="width:100%"/></td>
					</tr>
                    <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >求职行业</td>
					  <td width="577">
                      <select name="Trade"/>
                      <?php
					  for($i=0;$i<$trademax;$i++) {
                      echo "<option value=".$arr_get_Tradename[$i]['TradeName'].">".$arr_get_Tradename[$i]['TradeName']."</option>";
					  }
					  ?>
                      </select>
                      </td>
					</tr>
                    <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >发布区域</td>
					  <td width="577">
                      <select name="Location"/>
                      <?php
					  for($i=0;$i<$citymax;$i++) {
                      	echo "<option value=".$arr_get_city[$i]['CityName'].">".$arr_get_city[$i]['CityName']."</option>";
					  }
					  ?>
                      </select>
                      </td>
					</tr>
   				    <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
  					  <td height="163" align="right">要求</td>
    				  <td><textarea name="Claim" cols="80" rows="200px" id="textcontent"></textarea></td>
				   	<!--配置ckfinder--><script type="text/javascript">
				   	var editor = CKEDITOR.replace( 'textcontent' );
				  	  CKFinder.setupCKEditor( editor, { basePath : '../include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				    </script>
</tr>
            	<!-- 这里对信息进行 添加   /删除   /修改     END -->
			</td>
          </tr>
          <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td colspan='2' align="center" ><input type='submit' name='submitAddApply' value='提交内容' /></td>
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