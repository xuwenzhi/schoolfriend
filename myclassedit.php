<head>
<script type="text/javascript" src="js/Personal.js" ></script>
</head>
<?php
	header("Content-Type:text/html; charset=utf8");
	require_once 'include/SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	session_start();
	//这里要识别是不是存在用户登录 如果不是 提示非法链接 START
	if(!isset($_SESSION['USER'])){
		echo '<script> alert("非法链接");location.replace("index.php")</script>';
		exit();
	}
	//这里要识别是不是存在用户登录 如果不是 提示非法链接 END
	//用户基本信息的查询  START
	$sql_get_users_infor = "Select * from t_sfuser Where SFUserId = $_SESSION[USERID]";
	//用户基本信息的查询  END
	
	//获取用户基本信息
	$arr_get_users_infor = $sqlHelper->execute_dql2($sql_get_users_infor);
	
	//获取到工作信息 START
	
	//我的关注信息调出来
	
	//获取到工作信息 END
?>
<!-- 这里放一个编辑的框 并且是隐藏的   用于编辑-->
      <div id='edit_person_infor'  style="display:none;position:absolute;left:1080px;width:100px;height:50px;">
           <a href='#class' id='edit_class'><img src="./images/edit_infor.jpg" ></a>
      </div>
<table  width="780" border="0" align="center" cellpadding="0" cellspacing="0" class="biaoge">
     <tr>
     	<td height="34" width='28%' ><div align="center">我的班级:</div></td>
     	<td height="34" ><input type='text' value='我的班级'></td>
     </tr>
     
</table>