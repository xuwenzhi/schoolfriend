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
	 * 该文件主要处理点击  添加  / 修改/删除
	 */
	include_once "PubFunction.php";
	include_once "../include/SqlHelper.class.php";
	include_once "../include/ComFunction.php";
	$sqlHelper = new SqlHelper();
		//获取城市
	$arr_get_city = get_applyLocation();
	$citymax = count($arr_get_city);
	$arr_get_Tradename=  get_applyUnit();
	$trademax = count($arr_get_Tradename);
	//这里取得要修改文件的 ID   START ....
	if(isset($_GET['apply_id'])){
		$apply_id = $_GET['apply_id']; //取得要修改文件的 id
	}else{
		echo '<script> alert("链接非法，请重试"); location.replace("index.php")</script>';
	}
	//这里取得要修改文件的 ID   END ....
	
	//这里需要获取 该 文件需要修改的内容 的 标题 和内容 START
	//来构造sql语句  
	$sql_get_content = "Select * From t_apply where ApplyId = $apply_id";
	//暂时先放这两个内容的sql查询
	$arr_get_content = $sqlHelper->execute_dql2($sql_get_content); //获取招聘信息的各个内容
	$Title = $arr_get_content[0]['ApplyUnit'];  
	$Salary = $arr_get_content[0]['ApplySalary'];
	$Claim = $arr_get_content[0]['ApplyClaim'];
	$Location = $arr_get_content[0]['ApplyLocation'];
	$Etime = $arr_get_content[0]['ApplyETime'];
	if($arr_get_content[0]['ApplyType']==1) {
		$Type = "全职";
	}else {
		$Type = "兼职";
	}//是否兼职
	
	//这里需要获取 该 文件需要修改的内容 的 标题 和内容 END
	/*这里没有选择行业类别
	function get_recruit_trade_choice(){
		global  $arr_get_content;
		global  $sqlHelper;
		$sql_recruit_category = "Select TradeId,TradeName from t_trade where length(TradeId)=2";
		$arr_recruit_category = $sqlHelper->execute_dql2($sql_recruit_category);
		echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
		//下面通过循环输出新闻公告的类型 并且用单选框显示
		echo "<td align='right'>选择行业类别</td>";
		echo "<td>";
		echo "<select name='recruitCategory' >";
		for($i = 0; $i<count($arr_recruit_category); $i++){
			if($arr_get_content[0]['RecruitTrade'] == $arr_recruit_category[$i]['TradeId']){
				echo "<option value='".$arr_recruit_category[$i]['TradeId']."'  selected='selected'/>".$arr_recruit_category[$i]['TradeName']."</option>　　　";
			}else{
				echo "<option value='".$arr_recruit_category[$i]['TradeId']."'/>".$arr_recruit_category[$i]['TradeName']."</option>　　　";
			}
		}
		echo "</select>";
		echo "</td>";
		echo "</tr>";
	}
	*/
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
            	<form method="post" action="include/disposeApplys.php?apply_id=<?=$apply_id?>">
	                <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >是否兼职</td>
					  <td width="577">
                      <select name="applyJob">
                      <option value="0">兼职</option>
                      <option value="1">全职</option>
                      </select>
                      </td>
					</tr>
                    <tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>
            			<td align='right'>结束时间</td>
            			<td>
            				<input type="text" class="Wdate" id="FFirstDate" onClick="WdatePicker()" size="21" name="Etime" id="RaceON"  style="width:150px" value="<?php echo $Etime;?>"/>
            			</td>
            		</tr>
    				<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >标题</td>
					  <td width="577"><input type="text" name="Title" id="advTea" value="<?php echo $Title;?>" style="width:100%"/></td>
					</tr>
                    <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >薪资</td>
					  <td width="577"><input type="text" name="Salary" id="advTea" value="<?php echo $Salary;?>" style="width:100%"/></td>
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
    				  <td><textarea name="Claim" cols="80" rows="200px" id="textcontent"><?php echo $Claim; ?></textarea></td>
				   	<!--配置ckfinder--><script type="text/javascript">
				   	var editor = CKEDITOR.replace( 'textcontent' );
				  	  CKFinder.setupCKEditor( editor, { basePath : '../include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				    </script>
</tr>
            	<!-- 这里对信息进行 添加   /删除   /修改     END -->
			</td>
          </tr>
          <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td colspan='2' align="center" ><input type='submit' name='submitApply' value='提交修改' />　　　　　<input type='submit' name='deleteApply' value='删除'/></td>
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
