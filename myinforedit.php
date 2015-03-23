<head>
<script language='JavaScript'>
	$(document).ready(function(){
		//编辑个人基本资料的表单的验证
		  $("#UserTrueName").focus(function(){
			  $("#TrueNameValidate").html("");
		  });
		  //当输入用户真实姓名表单 失去焦点时 
		  $("#UserTrueName").blur(function(){
			  if(!checkStr($(this).val())){
				  $("#TrueNameValidate").html("<font color='red'>请填写标准中文名字</font>");
			  }
		  });
		  //当输入QQ时
		  $("#UserQQ").focus(function(){
			  $("#QQValidate").html("");
		  });
		  //当失去QQ框的焦点时
		  $("#UserQQ").blur(function(){
			  if(!validateQQ($(this).val())){
				  $("#QQValidate").html("<font color='red'>请填写正确的QQ号码</font>");
			  }
		  });
		  //QQ  END
		  //当输入邮箱时
		  $("#UserEmail").focus(function(){
			  $("#EmailValidate").html("");
		  });
		  $("#UserEmail").blur(function(){
			  if(!validateEmail($(this).val())){
				  $("#EmailValidate").html("<font color='red'>请输入有效的电子邮箱</font>");
			  }
		  });
		  //验证电话号码
		  $("#UserPerPhone").focus(function(){
			  $("#PhoneValidate").html("");
		  });
		  $("#UserPerPhone").blur(function(){
			  if(!validatePhone($(this).val())){
				  $("#PhoneValidate").html("<font color='red'>请输入有效的电话号码</font>");
			  }
		  });
		  
		//装载编辑文件后 取消编辑的链接事件
		  $("#per_infor_cancel").click(function(){
			  $("#myzone").load('myinfor.php');
		  });

			//点击保存 进行验证
		  $("#per_infor_protect").click(function(){
			  //如果对其提示其填写错误 一定要在其填写的情况下  因为这些信息 在数据库中 是允许为空的
			  var UserTrueName = $("#UserTrueName").val();
			  var UserQQ = $("#UserQQ").val();
			  var UserEmail = $("#UserEmail").val();
			  var UserPerPhone = $("#UserPerPhone").val();
			  if(UserTrueName.length >0){
				  if(!checkStr(UserTrueName)){
					  alert('请填写有效中文名称');
					  return false;
				  }
			  }
			  if(UserQQ.length >0){
				  if(!validateQQ(UserQQ)){
					  alert('请填写有效QQ号码');
					  return false;
				  }
			  }
			  if(UserEmail.length >0){
				  if(!validateEmail(UserEmail)){
					  alert('请填写有效电子邮箱');
					  return false;
				  }
			  }
			  if(UserPerPhone.length >0){
				  if(!validatePhone(UserPerPhone)){
					  alert('请填写有效手机号码');
					  return false;
				  }
			  }
			  //通过jQuery+ajax来实现无刷新保存数据 用户的基本信息
			    var UserTrueName = $("#UserTrueName").val(); //真实姓名
			    var UserSex = $("input[name='UserSex']:checked").val();//性别
				var UserHomeTown = $("#UserHomeTown").val();//故乡
				var UserPreTown = $("#UserPreTown").val(); //现居地
				var UserQQ = $("#UserQQ").val();//QQ
				var UserEmail = $("#UserEmail").val();
				var UserPerPhone = $("#UserPerPhone").val();//个人电话
				var UserLikes = $("#UserLikes").val();//个人偏好
				//下面构造 生日格式 YYYY-MM-DD
				var year = $("#BirYear").val();
				var month = $("#BirMonth").val();
				var day = $("#BirDay").val();
				var UserBirTime = year+"-"+month+"-"+day;
				//构造需要发送的数据
				//暂时先不保存 用户的喜好
				var ajaxUserInfo = UserTrueName+"="+UserSex+"="+UserHomeTown+"="+UserPreTown+"="+UserQQ+"="+UserEmail+"="+UserPerPhone+"="+UserBirTime;
			  $.ajax({
					type:"POST",   /*   设置传送方式为POST  */
					url: "include/ajax/EditPersonalInfor.php",			/*   处理文件   */
					data: "username="+ajaxUserInfo,	/*   这里是将文本框中的值传递给 username */
					success:function(data){		/*  服务器返回的数据 处理  */
						$("#update_user_result").html("<font color='red' size='2' face='宋体'>保存成功!</font>");//这里清空 显示层不好使
						$("#update_user_result").slideUp(700);
					},
					beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
						var result = "<img src='images/loading.gif'>";
						$(result).appendTo("#update_user_result");
						$("#update_user_result").show('fast');
					},
					complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
						//var result = "<img src='images/loading.gif'>";
						//$("#update_user_result").html("");//这里清空 显示层不好使
						//$("").appendTo("#update_user_result");
					}
				});
		  });
		  //我的基本资料部分  END
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
//获取用户基本信息的  START
	$sql_get_users_infor = "Select * from t_sfuser Where SFUserId = $_SESSION[USERID]";
	$arr_get_users_infor = $sqlHelper->execute_dql2($sql_get_users_infor);
//获取用户基本信息的  END

//将获取到的信息分配
$UserTrueName = $arr_get_users_infor[0]['SFUserTrueName']; //真实姓名
//取出的生日要进行分离出 年 月 日
$UserBirYear = substr($arr_get_users_infor[0]['SFUserBirthday'], 0, 4);
if(substr($arr_get_users_infor[0]['SFUserBirthday'], 5, 1) == '0'){
	$UserBirMonth = substr($arr_get_users_infor[0]['SFUserBirthday'], 6, 1);
}else{
	$UserBirMonth = substr($arr_get_users_infor[0]['SFUserBirthday'], 5, 2);
}
if(substr($arr_get_users_infor[0]['SFUserBirthday'], 8, 1) == '0'){
	$UserBirDay = substr($arr_get_users_infor[0]['SFUserBirthday'], 9, 1);
}else{
	$UserBirDay = substr($arr_get_users_infor[0]['SFUserBirthday'], 8, 2);
}
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
<!-- 下面的表格 的table width 一定要为数字 不要为带px的 -->
<table id="person_info" width="780" border="0" align="center" cellpadding="0" cellspacing="0" class="biaoge">
	<!-- 这里加入编辑个人基本信息的表单 -->
	
     <tr>
     <!-- 这里加入一个层 用于显示 点击保存之后的效果 -->
<center><div id='update_user_result' style="display:none;position:absolutely;top:-10px;background-color:white;width:100px; height:100px;">
</div></center>
     	<td width="181" height="34" ><div align="right"><strong>真实姓名:</strong></div></td>
     	<td width="577" height="34" >
     		<input type='text' id='UserTrueName' name='UserTrueName' value='<?=$UserTrueName?>' />
     		<span id='TrueNameValidate'></span>
     	</td>
     </tr>
     <tr>
        <td height="34"><div align="right"><strong>性别:</strong></div></td>
        <td>
        <?php
       		 if($arr_get_users_infor[0]['SFUserSex'] == 1){
       		 	echo "<label><input type='radio' value='1' id='UserSex' name='UserSex' checked='checked'/>男 </label>";
       		 	echo "<label><input type='radio' value='0' id='UserSex' name='UserSex'/>女</label>";
       		 }else{
       		 	echo "<label><input type='radio' value='1' id='UserSex' name='UserSex'/>男 </label>";
       		 	echo "<label><input type='radio' value='0' id='UserSex' name='UserSex'  checked='checked'/>女</label>";
       	     }
        ?>	
        </td>
     </tr>
     <tr>
        <td height="34"><div align="right"><strong>生日:</strong></div></td>
        <td>
        <!-- 这里编辑用户的出生日期  -->
        	<select id='BirYear' name='BirYear'>
        	<?php
        		//获取当前年
        		$pre_year = date("Y");
        		echo "<option value='1111'>选择年份</option>";
        		for($i = $pre_year; $i>=$pre_year-50; $i--){
        			if($i == $UserBirYear){
        				echo "<option value=$i selected='selected'>".$i."</option>";
        			}else{
        				echo "<option value=$i>".$i."</option>";
        			}
        		}
        	?>
        	</select>
        	<!-- 月份 -->
        	<select id='BirMonth' name=''BirMonth''>
        	<?php
        		echo "<option value='1111'>选择月份</option>";
        		for($i = 1; $i<=12; $i++){
        			if($i == $UserBirMonth){
        				echo "<option value=$i selected='selected'>".$i."</option>";
        			}else{
        				echo "<option value=$i>".$i."</option>";
        			}
        		}
        	?>
        	</select>
        	<!-- 出生天 -->
        	<select id='BirDay' name='BirDay'>
        	<?php
        	//因为每年每月对应的天数是不同的  这里用二级联动要更好一些
        		echo "<option value='1111'>选择日期</option>";
        		for($i = 1; $i<=31; $i++){
        			if($i == $UserBirDay){
        				echo "<option value=$i selected='selected'>".$i."</option>";
        			}else{
        				echo "<option value=$i>".$i."</option>";
        			}
        		}
        	?>
        	</select>
        	
        </td>
     </tr>
     <tr>
         <td height="34" ><div align="right"><strong>故乡:</strong></div></td>
         <td height="34" ><input type='text' id='UserHomeTown' name='UserHomeTown' value='<?=$UserHometown?>' ></td>
     </tr>
     <tr>
         <td height="34" ><div align="right"><strong>现居地:</strong></div></td>
         <td height="34" ><input type='text' id='UserPreTown' name='UserPreTown' value='<?= $UserPrePlace?>' ></td>
     </tr>
    
     <tr>
         <td height="34" ><div align="right"><strong>QQ:</strong></div></td>
         <td height="34" ><input type='text' id='UserQQ' name='UserQQ' value='<?=$UserQQ?>'/>
         <span id='QQValidate'></span></td>
     </tr>
     <tr>
         <td height="34" ><div align="right"><strong>邮箱:</strong></div></td>
         <td height="34" ><input type='text' id='UserEmail' name='UserEmail' value='<?=$UserEmail; ?>'/>
          <span id='EmailValidate'></span></td>
         <td width="22"></td>
     </tr>
     <tr>
        <td height="34"><div align="right"><strong>个人电话:</strong></div></td>
        <td><input type='text' name='UserPerPhone' id='UserPerPhone' value='<?=$UserPerPhone?>'/>
         <span id='PhoneValidate'></span></td>
     </tr>
     <tr>
        <td height="34"><div align="right"><strong>个人爱好:</strong></div></td>
        <td>
        <input type='text' name='UserLikes' value='
        	<?php
        	for($i = 0; $i<count($arr_user_like_name); $i++){
        		echo $arr_user_like_name[$i]['CodeName'].",";
        	}
        	 ?>' />
        	 <?php  require_once 'UserLikes.php'?>
        </td>
     </tr>
     <tr>
     <!-- 点击保存 后者 取消 -->
        <td height="34" colspan='2'  align="center"><a href='#submit' id='per_infor_protect'><img src='images/protect_btn.jpg'></a>
        <a href='#cancel' id='per_infor_cancel'><img src='images/cancel_pro.jpg'></a>  
     </tr>
</table>

