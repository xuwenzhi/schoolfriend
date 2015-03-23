<head>
<script language='JavaScript'>
	$(document).ready(function(){
		//点击编辑的事件
		  $("#edit_pic").click(function(){
			  $("#myzone").load('myinforedit.php'); //装载可以编辑的文件
		  });
		  //当鼠标滑过 myzone.htm中 id为myzone的div时  显示编辑链接
		  $("#myzone").hover(function(){
				$("#edit_person_infor").show("fast");
		  },function(){
				$("#edit_person_infor").hide("fast");
		  });
	});
</script>
</head>
<?php
header("Content-Type:text/html; charset=utf8");
require_once 'include/SqlHelper.class.php';
//该文件主要用于 myMenu中调用 通过 jQuery的load函数 显示在 myzone中 
session_start();//开启session
//在此文件中 同样能够获得session  这是一件好事  所以就可以通过session 来获取到 关于用户的各项信息

//这里要识别是不是存在用户登录 如果不是 提示非法链接 START
if(!isset($_SESSION['USER'])){
	echo '<script> alert("非法链接");location.replace("index.php")</script>';
	exit();
}
//这里要识别是不是存在用户登录 如果不是 提示非法链接 END

$sqlHelper = new SqlHelper();

//用户基本信息的查询  START
	$sql_get_users_infor = "Select * from t_sfuser Where SFUserId = $_SESSION[USERID]";
//用户基本信息的查询  END


//获取用户基本信息
$arr_get_users_infor = $sqlHelper->execute_dql2($sql_get_users_infor);

//将获取到的信息分配 START
$UserTrueName = $arr_get_users_infor[0]['SFUserTrueName']; //真实姓名
if($arr_get_users_infor[0]['SFUserSex'] == 1){
	$UserSex = "男";	//性别
}else{
	$UserSex = "女";
}
$UserBirthday = $arr_get_users_infor[0]['SFUserBirthday']; // 生日
$UserHometown = $arr_get_users_infor[0]['Hometown'];// 故乡
$UserPrePlace = $arr_get_users_infor[0]['SFUserPreAdd'];//现居地
$UserEmail = $arr_get_users_infor[0]['SFUserEmail'];// 邮箱
$UserQQ = $arr_get_users_infor[0]['SFUserQq'];// QQ
$UserPerPhone = $arr_get_users_infor[0]['SFUserTel']; //个人电话 
$UserHobbyString = $arr_get_users_infor[0]['SFUserLike'];// 个人喜好   这是一个字符串  具体的爱好 在基础代码中 t_basecode
//将获取到的信息分配 END
$arr_user_like_id = array();
$arr_user_like_id = explode(',', $UserHobbyString); //将用户的喜好编号 取出  并放在数组中
$arr_user_like_name = array();
//建立一个查询 来查询该用户的所有爱好
//这个查询是通过一个循环来建立的
$sql_user_like = "Select CodeName From t_basecode where CodeCategoryId=5 and ( ";
for($i = 0; $i<count($arr_user_like_id);$i++){
	if($i < count($arr_user_like_id)-1){
		$sql_user_like .= "CodeId = ".$arr_user_like_id[$i]." or ";
	}else{
		$sql_user_like .= "CodeId = ".$arr_user_like_id[$i];
	}
}
$sql_user_like.=")";
$arr_user_like_name = $sqlHelper->execute_dql2($sql_user_like);
?>

<!-- 这里放一个编辑的框 并且是隐藏的   用于编辑-->
      <div id='edit_person_infor'  style="display:none;position:absolute;left:1080px;width:100px;height:50px;">
           <a href='#edit' id='edit_pic'><img src="./images/edit_infor.jpg" ></a>
      </div>
<!-- 下面的表格 的table width 一定要为数字 不要为带px的 -->
<table id="person_info" width="780" border="0" align="center" cellpadding="0" cellspacing="0" class="biaoge">
     <tr>
     	<td height="38" width='24%' ><div align="right"><strong>真实姓名:</strong></div></td>
     	<td width="76%" height="38" ><?=$UserTrueName?></td>
     </tr>
     <tr>
        <td height="31" width='24%' ><div align="right"><strong>性别:</strong></div></td>
        <td height="31"><?=$UserSex?></td>
     </tr>
     <tr>
        <td height="30" width='24%' ><div align="right"><strong>生日:</strong></div></td>
        <td height="30"><?=$UserBirthday?></td>
     </tr>
     <tr>
         <td height="32" width='24%'  ><div align="right"><strong>故乡:</strong></div></td>
         <td height="32" ><?=$UserHometown?></td>
     </tr>
     <tr>
         <td height="26" width='24%' ><div align="right"><strong>现居地:</strong></div></td>
         <td height="26" ><?=$UserPrePlace?></td>
     </tr>
     <tr>
         <td height="30" width='24%' ><div align="right"><strong>QQ:</strong></div></td>
         <td height="30" ><?=$UserQQ?></td>
     </tr>
     <tr>
         <td height="25" width='24%' ><div align="right"><strong>邮箱:</strong></div></td>
         <td height="25" ><?=$UserEmail?></td>
     </tr>
     <tr>
        <td height="27" width='24%' ><div align="right"><strong>个人电话:</strong></div></td>
        <td height="27"><?=$UserPerPhone?></td>
     </tr>
     <tr>
        <td height="81" width='24%' ><div align="right"><strong>兴趣爱好:</strong></div></td>
        <td height="81">
        	<?php
        		for($i = 0; $i<count($arr_user_like_name); $i++){
        			echo $arr_user_like_name[$i]['CodeName']."    ";
        		} 
        	?>
        </td>
     </tr>
</table>

	