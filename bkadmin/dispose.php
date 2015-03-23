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
	 * 该文件主要处理点击  添加  / 修改/删除 新闻公告 和 今昔风采的文件
	 */
	include_once "PubFunction.php";
	include_once "../include/SqlHelper.class.php";
	$sqlHelper = new SqlHelper();
	//这里应该获取到要修改的文件的内容的类型  如 新闻公告type=1 今昔风采type=2 .... START
	//取得修改的类型
	if(isset($_GET['type'])){
		$type = $_GET['type'];  //修改内容类型
	}else{
		$type = "";
	}
	//这里应该获取到要修改的文件的内容的类型  如 新闻公告type=1 今昔风采type=2 .... END
	//这里取得要修改文件的 ID   START ....
	if(isset($_GET['words_id'])){
		$words_id = $_GET['words_id']; //取得要修改文件的 id
	}else{
		echo '<script> alert("链接非法，请重试"); location.replace("index.php")</script>';
	}
	//这里取得要修改文件的 ID   END ....
	
	//这里需要获取 该 文件需要修改的内容 的 标题 和内容 START
	//通过 $type的不同的值 来构造sql语句  
	$sql_get_content = "";
	if($type == 1){
		$sql_get_content = "Select NewsId,NewsTitle,NewsContent,NewsCategory from t_news where NewsId = $words_id";
	}else if($type == 2){
		$sql_get_content = "Select ThingId,ThingTitle,ThingContent,ThingHTime from t_thing where ThingId = $words_id";
	}
	//暂时先放这两个内容的sql查询
	$arr_get_content = $sqlHelper->execute_dql2($sql_get_content); //获取标题和内容
	$Title = $arr_get_content[0][1];  //注意这种取法  该二维数组中的第二个键值 并不是 数据库中的字段名 而是使用的数据  可以增加通用性
	$Content = $arr_get_content[0][2];
	//这里需要获取 该 文件需要修改的内容 的 标题 和内容 END
	function get_news_type_choice(){
		global  $arr_get_content;
		global  $sqlHelper;
		$sql_news_category = "Select CodeId,CodeName from t_basecode where CodeCategoryId = 8";
		$arr_news_category = $sqlHelper->execute_dql2($sql_news_category);
		echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
		//下面通过循环输出新闻公告的类型 并且用单选框显示
		echo "<td align='right'>选择类别</td>";
		echo "<td>";
		for($i = 0; $i<count($arr_news_category); $i++){
			if($arr_get_content[0]['NewsCategory'] == $arr_news_category[$i]['CodeId']){
				echo "<label><input type='radio' name='newsCategory' value='".$arr_news_category[$i]['CodeId']."' checked='checked'/>".$arr_news_category[$i]['CodeName']."</label>　　　";
			}else{
				echo "<label><input type='radio' name='newsCategory' value='".$arr_news_category[$i]['CodeId']."'/>".$arr_news_category[$i]['CodeName']."</label>　　　";
			}
		}
		echo "</td>";
		echo "</tr>";
	}
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
            	<form method="post" action="include/disposeWords.php?type=<?=$type?>&words_id=<?=$words_id?>">
            	<?php 
            		//如果是新闻公告的话 就要存在一个 选择新闻类别的 单选框
            		if($type == 1){
            			get_news_type_choice();
            		}
            		if($type == 2){
            			echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
            			//下面通过循环输出新闻公告的类型 并且用单选框显示
            			echo "<td align='right'>发生时间</td>";
            			echo "<td align='left'><input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21' value='".$arr_get_content[0]['ThingHTime']."' name='ThingHTime' style='width:150px'/></td>";
            			echo "</tr>";
            		}
				?>
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
					  <td colspan='2' align="center" ><input type='submit' name='submitWords' value='提交修改' />　　　　　<input type='submit' name='deleteWords' value='删除'/></td>
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
