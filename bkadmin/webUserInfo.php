<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin_style.css" rel="stylesheet" type="text/css" />
<title>校友网后台管理系统</title>
<script type="text/javascript" src="js/jquery1.8.3.js" ></script>
<script type="text/javascript" src="js/bkWebInfo.js" ></script><!--  用于本页的js代码  -->
</head>
<?php

	//获取省份（从数据库中获取） START
	function getClassFromProvince(){
		global  $sqlHelper;
		$sql_get_provinces = "Select * from t_idcode where length(CityId) = 2";//从 t_idcode中获取省份
		$arr_get_provinces = $sqlHelper->execute_dql2($sql_get_provinces);//保存着省份的数组
		for($i = 0; $i<count($arr_get_provinces); $i++){
			echo "<option value=".$arr_get_provinces[$i]['CityId'].">".$arr_get_provinces[$i]['CityName']."</option>";
		}
	}
	//获取省份（从数据库中获取） END
	
	include_once "PubFunction.php";
	include_once '../include/ComFunction.php';
	include_once "../include/SqlHelper.class.php";
	include_once '../include/AssPage.class.php';
	$sqlHelper = new SqlHelper();
	$assPage = new AssPage();
	$assPage->pageSize=15;//每页显示 15个  
	if(isset($_GET['pageNow'])){	//指定 pageNow
		$assPage->pageNow = $_GET['pageNow'];
	}else{
		$assPage->pageNow = 0;
	}

	/*
	 * 下面通过不同的情况来构造SQL语句
	 */
	//这里需要获取到 URL里面当点击搜索之后 该页面中的检索条件   UserState  UserSex  LoginTimes
	
	if(!isset($_GET['UserState']) && !isset($_GET['UserSex']) && !isset($_GET['LoginTimes']) && !isset($_GET['University'])){
		//这里刚刚进入该页面并没有任何的检索条件时的 情况
		$sql_count = "Select * from t_sfuser";
		$sql_num = $sqlHelper->excute_Record_Exist($sql_count);
		//建立查询当前用户的信息     登录名  真实姓名  登录次数 创建时间  
		$sql_get_all_users = "Select SFUserId,SFUserLogin,SFUserTime,SFULandTimes,SFUserTrueName,SFUserSex from t_sfuser order by SFUserTime desc";//根据创建时间倒序的顺序获取用户信息
		$arr_get_all_users = $sqlHelper->execute_dql2($sql_get_all_users);
	}else{
	
	//当有检索条件时
	//判断登录状态	
	if(isset($_GET['UserState'])) {
		$UserState=$_GET['UserState'];
	}else {
		$UserState="";
	}
	//判断性别
	if(isset($_GET['UserSex'])) {
		$UserSex=$_GET['UserSex'];
	}else {
		$UserSex="";
	}
	//判断登录次数
	if(isset($_GET['LoginTimes'])) {
		$LoginTimes=$_GET['LoginTimes'];
	}else {
		$LoginTimes="";
	}
	//判断大学
	if(isset($_GET['University'])) {
		$University=$_GET['University'];
	}else {
		$University="";
	}
	//执行sql语句
	$sql_count = "Select * from t_sfuser";
	if($UserState!=""||$UserSex!=""||$LoginTimes!=""||$University!="") {
		//这里肯定有一个不为空
		$sql_where=" Where ";
		if($UserState!="11111") {
			$sql_where.="SFUserState=".$UserState." and ";
		}
		if($UserSex!="11111") {
			$sql_where.="SFUserSex=".$UserSex." and ";
		}
		if($University!="11111") {
			$sql_where.="SchoolID=".$University." and ";
		}
		if($LoginTimes!="筛选登录次数") {
			$sql_where.="SFULandTimes >= ".$LoginTimes." and ";
		}
	}
	@$sql_count.=$sql_where;
	$sql_count = substr($sql_count, 0, strlen($sql_count)-4);//去掉末尾的  "and " 
	$sql_num = $sqlHelper->excute_Record_Exist($sql_count);
	//查询信息
	@$sql_get_all_users = "Select * from t_sfuser".$sql_where." order by SFUserTime desc";//根据创建时间倒序的顺序获取用户信息
	$arr_get_all_users = $sqlHelper->execute_dql2($sql_count);
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
	?>
    </td>
    <td width="1128" height="404" align="center" valign="top"><table width="99%" border="0" cellspacing="1" cellpadding="4"  bgcolor="#CBD8E1">
      <tr bgcolor="#F3F8FC">
        <td height="510" align="center" valign="top">
        <table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
          <tr bgcolor="#F3F8FC">
            <td height="32" align="left" valign="top" bgcolor="#F3F8FC"><div id='mainTop4'>用户信息</div></td>
          </tr>
          <tr align="left" valign="top" bgcolor="#F3F8FC">
            <td height="478">
            	<table  width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
            	<tr  bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
            		<td colspan='5' align='right'><?php onlineUser(); ?></td>
            	</tr>
            	<form action='webUserInfo.php' method='get' id='form1'>
                	<tr  bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
                		<td>
                    		<!-- 所属学校 -->
                    		<select id='Province' onchange="getUniversity()">
								<option value='11111'>选择省份</option>
							<?php
								//省份的二级联动
								getClassFromProvince();
							?>
							</select>
							<select id='University' name='University' onchange='getClassFromYear()' >
								<option value='11111'>选择大学</option>
							</select>
                    	</td>
                    	<td>
                    		<!-- 当前是否在线 -->
                    		<select name='UserState'>
                    			<option value='11111'>是否在线</option>
                    			<option value='0'>当前不在线</option>
                    			<option value='1'>当前在线</option>
                    		</select>
                    	</td>
                    	<td>
                    		<!-- 用户性别 -->
                    		<select name='UserSex'>
                    			<option value='11111'>选择性别</option>
                    			<option value='1'>男</option>
                    			<option value='0'>女</option>
                    		</select>
                    	</td>
                    	<td>
                    		<!-- 登录次数 -->
                    		<input type='text' name='LoginTimes' id='LoginTimes'  value='筛选登录次数' style="width:90px"/>次
                    	</td>
                    	<td>
                    		<input type='button' id="WebInfoButton" name='submitFindUsers' value='搜索' />
                    	</td>
                    </tr>
                  </form>
                  <tr>
                  <!--显示用户信息-->
                  <table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
                  <tr  bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
                  	<td>登录名</td>
                    <td>真实姓名</td>
                    <td>性别</td>
                    <td>注册时间</td>
                    <td>登录次数</td>
                  </tr>
                  <?php
				  if($sql_num!=0) { 
				  	   for($i=0;$i<$sql_num;$i++) {
				  ?>
                  <tr  bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
                  	<td><?php echo $arr_get_all_users[$i]['SFUserLogin']?></td>
                    <td><?php echo $arr_get_all_users[$i]['SFUserTrueName']?></td>
                    <td><?php if($arr_get_all_users[$i]['SFUserSex']==1)echo "男";else echo "女";?></td>
                    <td><?php echo $arr_get_all_users[$i]['SFUserTime']?></td>
                    <td><?php echo $arr_get_all_users[$i]['SFULandTimes']?></td>
                  </tr>
                  <?php
						}
					}
					else {
						echo "<tr height='400' bgcolor='white'><td colspan='5' align='center'><font color='black'><img src='../images/sad2.jpg' />无符合条件用户!</font></td></tr>";
					}
                  ?>
                  </table>
                  </tr>
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
