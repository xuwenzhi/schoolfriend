/*
 * 该js文件主要用于用户的个人空间使用
 */
$(document).ready(function(){
	 /*
	   * 上传照片
	   */
	  
	  $("#up_pic").click(function(event){
		  var left = $(event.target).offset().left+250;
		  var top = $(event.target).offset().top-150;
		  $('#update_pic_div').css({ top: top + $(event.target).height() + "px" , left: left });  
		  $("#update_pic_div").show('fast');
	  });
	  //点击取消  层消失
	  $("#update_pic_cancel").click(function(){
		  $("#update_pic_div").hide('fast');
	  });
	  //用户点击确定 上传
	  $("#update_pic_yes").click(function(){
		  var file = document.getElementById('perfon_pic').value; //取得用户添加的图片名称
		  //如果没有选择图片
		   if(file == ""){
		       alert("请选择照片");
		       return false;
		   }
		  //这里对图片的扩展名进行验证   这里是一段正则表达式
	      if(!/\.(gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG)$/i.test(file)){
	          alert("图片类型必须是.gif,jpeg,jpg,png中的一种");
	          return false;
	      }
	      //下面验证图片的大小是否标准
	  
	      $("#postPersonPic").submit();//提交表单 
	  });
	  
	//我的基本资料部分  START
	  $("#myinfor").click(function(){
		  $("#myzone").load('myinfor.php');
	  });
	  
	  
	  //我的关注部分   START
	  $("#myattention").click(function(){	
		  $("#myzone").load('myattention.php'); //将可以编辑的页面调过来
	  });
	  //我的工作信息部分  START 
	  $("#mycompany").click(function(){
		  $("#myzone").load('myjob.php');
	  });
	  //我的工作信息部分  END
	  $("#edit_job").click(function(){	 
		  $("#myzone").load('myjobedit.php'); //将可以编辑的页面调过来
	  });
  
	  //我的班级部分  START
	  $("#myclass").click(function(){
		  $("#myzone").load('myclass.php'); //将可以编辑的页面调过来
	  });
	  
	  //我的班级部分  END
	  
	 //我的说说部分  START
	 $("#mytalk").click(function(){
		 $("#myzone").load('mytalk.php');
	 });
	 //我的说说部分  END
	  
	  //密码修改部分  START
	  $("#passChange").click(function(event){
		  var left = $(event.target).offset().left+230;
		  var top = $(event.target).offset().top-250;
		  $('#PassChangeDiv').css({ top: top + $(event.target).height() + "px" , left: left });  
		  $("#PassChangeDiv").show('fast');
	  });
	  $("#cancel_update").click(function(){
		  $("#PassChangeDiv").hide('fast');
	  });
	  //用户点击修改密码后
	  $("#changePass").click(function(event){
		  var UserId = $("#HidUserId").val(); //用户ID
		  var UserOldPass = $("#UserOldPass").val();//用户原密码
		  var UserNewPass1 = $("#UserNewPass1").val(); //用户新密码
		  var UserNewPass2 = $("#UserNewPass2").val(); //用户确认密码
		  if(UserId == ""){
			  location.replace("../index.php");
		  }
		  if(UserNewPass1 != UserNewPass2){
			  alert("两次密码输入不一致，请重新输入");
			  event.stopPropagation(); 
			  return false;
		  }
		  if(UserNewPass1.length<6 || UserNewPass1.length>15){
			  alert('密码长度在6-15位');
			  event.stopPropagation(); 
			  return false;
		  }
		  if(!UserNewPass1.match(/^\w+((-\w+)|(\.\w+))*$/)){
			  alert('密码应为字母和数字组成');
			  event.stopPropagation(); 
			  return false;
		  }
		  //组合变量   用户ID 原密码  新密码
		  var passchangGroup = UserId +"="+UserOldPass+"="+UserNewPass1;
		  //通过ajax来修改密码
		  $.ajax({
			  url:"include/ajax/PassChange.php",
			  type:"POST",
			  data:"passchangGroup="+passchangGroup,
			  success:function(data){
				  if(data == "Yes"){
					  alert("修改成功!");
				  }
				  if(data == "No"){
					  alert('修改失败');
				  }
				  if(data == "nopass"){
					  alert("原密码输入错误");
				  }
			  }
		  });
	  });
	  //密码修改部分  END
	  $("#pre").click(function(){
			alert($("#pageNow").val());
		});
		
});