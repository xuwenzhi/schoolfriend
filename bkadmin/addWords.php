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
	//获取需要添加的文章的类型 START
	if(!isset($_GET['type'])){
		echo '<script> alert("链接非法"); location.replace("index.php")</script>';
		exit();
	}else{
		$type = $_GET['type'];//将需要添加的文章类型 赋给  $type
	}
	//获取需要添加的文章的类型 END
?>
<Script Language="JavaScript">
    var Width=window.screen.availWidth;
    var Height=window.screen.availHeight-145;
//    document.write("<body><table width=100% border=0 align=center cellpadding=0 cellspacing=0 height="+Height+">");
</script>
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
            	<?php
            		//这里用于提示管理员 这里添加的文章的类型  
            		if($_GET['type']==1){
            			echo "添加新闻公告";
            		} else if($_GET['type']==2){
            			echo "添加今昔风采";
            		}else if($_GET['type'] == 3){
            			echo "添加供求信息";
            		}else if($_GET['type'] == 4) {
						echo "添加招聘信息";
					}
            	?>
            </div></td>
          </tr>
          <tr align="left" valign="top" bgcolor="#F3F8FC">
            <td height="478">	
            	<!-- 该页面用于添加文章 -->
            	<table width="85%" border="0" align="left" cellpadding="4" cellspacing="1"  bgcolor="#CBD8E1">
            	<form action="include/disposeAddWords.php?type=<?php echo $_GET['type']?>"  enctype="multipart/form-data"  method="post" >
            		<?php
            			//这里用于显示 如果添加的是 新闻公告  就会有一个公告的分类  这里就要选出此次添加的新闻的类型  来自 t_basecode
            			if($type == 1){
	            	 		$sql_news_category = "Select CodeId,CodeName from t_basecode where CodeCategoryId = 8";
	            	 		$arr_news_category = $sqlHelper->execute_dql2($sql_news_category);
	            	 		echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
	            	 		//下面通过循环输出新闻公告的类型 并且用单选框显示
	            	 		echo "<td align='right'>选择类别</td>";
	            	 		echo "<td>";
	            	 		for($i = 0; $i<count($arr_news_category); $i++){
	            	 			if($i == 0){
	            	 				echo "<label><input type='radio' name='newsCategory' value='".$arr_news_category[$i]['CodeId']."' checked='checked'/>".$arr_news_category[$i]['CodeName']."</label>　　　";
	            	 			}else{
	            	 				echo "<label><input type='radio' name='newsCategory' value='".$arr_news_category[$i]['CodeId']."'/>".$arr_news_category[$i]['CodeName']."</label>";
	            	 			}
	            	 		}
	            	 		echo "</td>";
	            	 		echo "</tr>";
            			}else if($type == 2){
            				//添加昔日趣事
            				echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
            				echo "<td align='right'>发生时间</td>";
            				echo "<td align='left'><input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21' name='ThingHTime' style='width:150px'/></td>";
            			}
            			else if($type == 3){
            				//此时添加 商品供求信息
            				echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
            				echo "<td align='right'>活动截止时间</td>";
            				echo "<td>";
            				echo "<input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21' name='GoodsEndTime' id='RaceON'  style='width:150px'/>";
            				echo "</td>";
            				echo "</tr>";
            				echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
            				echo "<td align='right'>添加图片</td>";
            				echo "<td>";
            				echo "<input type='file' name='information_pic'   style='width:150px'/>";
            				echo "</td>";
            				echo "</tr>";
            				echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
            				echo "<td align='right'>信息类型</td>";
            				echo "<td>";
            				echo "<select name='InforType'>";
            				echo "<option value='供'>供</option>";
            				echo "<option value='求'>求</option>";
            				echo "</select>";
            				echo "</td>";
            				echo "</tr>";
            				
            			}else if($type == 4) {
            					getTradeType();
								echo "<tr bgcolor='F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
					  			 	echo "<td width='86' align='right' >是否兼职</td>";
									echo "<td width='577'>";
				                      echo "<select name='recruitJob'>";
                				      echo "<option value='0'>兼职</option>";
				                      echo "<option value='1'>全职</option>";
                				      echo "</select>";
                      				echo "</td>";
								echo "</tr>";
								
								echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
            						echo "<td align='right'>结束时间</td>";
            						echo "<td>";
            						echo "<input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21' name='recruitsStartTime' id='RaceON'  style='width:150px'/>";
            						echo "</td>";
            					echo "</tr>";
								
			      				echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
									echo "<td width='86' align='right' >招聘职位</td>";
					  				echo "<td width='577'><input type='text' name='Position' style='width:100%'/></td>";
								echo "</tr>";
								
			          			echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
					  				echo "<td width='86' align='right' >职业要求</td>";
						  			echo "<td width='577'><input type='text' name='Claim' style='width:100%'/></td>";
								echo "</tr>";
								
								echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
					 	 			echo "<td width='86' align='right' >发布区域</td>";
						  			echo "<td width='577'><input type='text' name='Location' style='width:100%'/></td>";
								echo "</tr>";
								
								echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
					  				echo "<td width='86' align='right' >学历要求</td>";
						  			echo "<td width='577'><input type='text' name='Degree' style='width:100%'/></td>";
								echo "</tr>";
						}
            		?>
    				<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >标题</td>
					  <td width="577"><input type="text" name="Title" id="advTea"  style="width:100%"/></td>
					</tr>
   				    <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
  					  <td height="163" align="right">内容</td>
    				  <td><textarea name="Content" cols="80" rows="200px" id="textcontent"></textarea></td>
				   	<!--配置ckfinder--><script type="text/javascript">
				   	var editor = CKEDITOR.replace( 'textcontent' );
				  	  CKFinder.setupCKEditor( editor, { basePath : '../include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				    </script>
</tr>
            	<!-- 这里对信息进行 添加   /删除   /修改     END -->
			</td>
          </tr>
          <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td colspan='2' align="center" ><input type='submit' name='submitAddWords' value='提交内容' /></td>
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