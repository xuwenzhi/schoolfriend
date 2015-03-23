$(document).ready(function(){
	//所有的表单事件 
	//当焦点在此表单上的时候
  $("#UserLoginName").focus(function(){
    $(this).css("background-color","#EDFFFF");
	$(this).val("");
  });
  $("#UserLoginPass").focus(function(){
	    $(this).css("background-color","#EDFFFF");
		$(this).val("");
	  });
  $("#verifyCode").focus(function(){
	  $(this).css("background-color","#EDFFFF");
		$(this).val("");
  });
  //当焦点离开表单的时候
  $("input").blur(function(){
	  $(this).css("background", "white");
  });

  $("#UserLoginName").blur(function(){
    $(this).css("background-color","#ffffff");
	if(!$.trim(this.value)==""){
		$(this).val(this.value);
	}else{
		$(this).val("用户名");
		}
  });
  $("#UserLoginPass").blur(function(){
    $(this).css("background-color","#ffffff");
	if(!$.trim(this.value)==""){
		$(this).val(this.value);
	}else{
			$(this).val("******");
	}
  });
  
  //用户注册表单验证
  //点击重置
  $("#Reset").click(function(){
	  $("#ResetHidden").trigger("click");
  });
  //用户名验证部分
  $("#UserRegName").focus(function(){
	  $(this).keyup(function(){
		  $("#UserNameCheck").html("<font size='2.0em' color='red'>6到15位的英文字母或数字组成</font>");
		  var UserLength = $(this).val().length;  //用户名长度
		  var UserString = $(this).val();		//用户名内容
		  if(UserLength <= 0){
			  $("#UserNameCheck").html("<font size='2.0em' color='red'>还未填写用户名</font>");
		  }
		  else if(UserLength >= 15){
			  $("#UserNameCheck").html("<font size='2.0em' color='red'>用户名过长</font>");
		  }
		//这里加入ajax的东西，如果数据库中存在该用户输入的合法id，便要给予提示
		  else{
			  $.ajax({
				  type:"POST",
				  url:"./include/ajax/user_exists.php",
				  dataType:"text",
				  data:"NewID="+UserString,
				  success:function(data){
					  if(data >= 1){
						  $("#UserNameCheck").html("<font size='2.0em' color='red'>该用户名已被占用，请您从新输入</font>");
					  }
				  }
			  });
		  }
	  });
  });
  $("#UserRegName").blur(function(){
	  $(this).css("background", "white");
	  var UserLength = $(this).val().length;  //用户名长度
	  var UserString = $(this).val();		//用户名内容
	  if(UserLength <= 0){
		  $("#UserNameCheck").html("<font size='2.0em' color='red'>还未填写用户名</font>");
	  }
	  else if(UserLength >= 15){
		  $("#UserNameCheck").html("<font size='2.0em' color='red'>用户名过长</font>");
	  }
	  else if(!wordOrcount(UserString)){
		  $("#UserNameCheck").html("<font size='2.0em' color='red'>用户名只能由字母或数字组成</font>");
	  }
	  else{
		  $("#UserNameCheck").html("");
	  }  
  });
  //密码验证部分
  $("#UserRegPass1").focus(function(){
	  $(this).keyup(function(){
		  $("#UserPassCheck1").html("<font size='2.0em' color='red'>6到15位的英文字母或数字组成</font>");
		  var UserLength = $(this).val().length;  //密码长度
		  var UserString = $(this).val();		//密码内容
		  if(UserLength < 0){   //如果密码长度为0
			  $("#UserPassCheck1").html("<font size='2.0em' color='red'>还未填写密码</font>");
		  }
		  if(UserLength >= 15){  //如果密码长度过长
			  $("#UserPassCheck1").html("<font size='2.0em' color='red'>密码过长</font>");
		  }
	  });
  });
  $("#UserRegPass1").blur(function(){
	  $(this).css("background", "white");
	  var UserLength = $(this).val().length;  //密码长度
	  var UserString = $(this).val();		//密码内容
	  if(UserLength <= 0){
		  $("#UserPassCheck1").html("<font size='2.0em' color='red'>还未填写密码</font>");
	  }
	  else if(UserLength >= 15){
		  $("#UserPassCheck1").html("<font size='2.0em' color='red'>密码过长</font>");
	  }
	  else if(!wordOrcount(UserString)){
		  $("#UserPassCheck1").html("<font size='2.0em' color='red'>密码只能由字母或数字组成</font>");
	  }
	  else{
		  $("#UserPassCheck1").html("");
	  }  
  });
  //输入第二个密码的事件
  $("#UserRegPass2").focus(function(){
	  $(this).keyup(function(){
		  var UserPass1 = $("#UserRegPass1").val(); //取得第一次输入的密码
		  var UserPass2 = $(this).val();
	  });
  });
  $("#UserRegPass2").blur(function(){
	  $(this).css("background", "white");
	  var UserPass1 = $("#UserRegPass1").val(); //取得第一次输入的密码
	  var UserPass2 = $(this).val();
	  if(UserPass2 == UserPass1){
		  $("#UserPassCheck2").html("");
	  }
	  else{
		  $("#UserPassCheck2").html("<font size='2.0em' color='red'>两次输入密码不一致</font>");
	  }
  });
  $("#UserEmail").focus(function(){
	  $(this).keyup(function(){
		  $("#UserEmailCheck").html("<font size='2.0em' color='red'>填写邮箱用于找回密码</font>");
	  });
  });
  $("#UserEmail").blur(function(){
	  $("#UserEmailCheck").html("");
	  if(!validateEmail($(this).val())){
		  $("#UserEmailCheck").html("<font size='2.0em' color='red'>邮箱不是有效的</font>");
	  }
  });
  
  //用户点击注册链接
  //1  首先要对用户的注册信息进行验证
  $("#UserReg").click(function(event){
	  var UserRegName = $("#UserRegName").val();//用户名
	  var UserPass1 = $("#UserRegPass1").val(); //first 密码
	  var UserPass2 = $("#UserRegPass2").val(); //second 密码
	  var UserEmail = $("#UserEmail").val(); //用户填写的邮箱
	  //检查是否填写用户名
	  if(UserRegName.length <=0){
		  alert('未填写用户名');
		  event.stopPropagation(); 
		  return false;
	  }
	  //检查用户长度
	  if(UserRegName.length <6 || UserRegName.length>15){
		  alert('用户名长度应为6到15位');
		  event.stopPropagation(); 
		  return false;
	  }
	  //检查用户名是否是数字和字母组成的
	  if(!wordOrcount(UserRegName)){
		  alert('用户名为英文字母或数字组成');
		  event.stopPropagation(); 
		  return false;
	  }
	  //检查用户名是否已经注册过
	  var temp_data = 0; //因为ajax进行的是异步操作 全局变量是无法局部化的 所以加上  async:false,
	  $.ajax({
		  type:"POST",
		  url:"./include/ajax/user_exists.php",
		  dataType:"text",
		  data:"NewID="+UserRegName,
		  async:false,   //这里加上
		  success:function(data){
			  if(data >= 1){
				  alert('该用户名已被占用，请重新选择');
				  temp_data = 1;
			  }
		  }
	  });
	  if(temp_data == 1){
		  event.stopPropagation(); 
		  return false;
	  }
	  //检查填写密码是否填写
	  if(UserPass1.length <=0 || UserPass2.length <=0){
		  alert('您未填写密码');
		  event.stopPropagation(); 
		  return false;
	  }
	  //检查密码长度
	  if(UserPass1.length<6 || UserPass1.length>15 ||UserPass2.length<6 || UserPass2.length>15 ){
		  alert('为了您的密码安全，请填写6到15位长度的密码');
		  event.stopPropagation(); 
		  return false;
	  }
	  //检查两次密码填写是否一致
	  if(UserPass1 != UserPass2){
		  alert('两次密码填写不正确');
		  event.stopPropagation(); 
		  return false;
	  }
	  if(!validateEmail($("#UserEmail").val())){
		  alert('邮箱格式不正确,请从新填写');
		  event.stopPropagation(); 
		  return false;
	  }
	  //上面全部符合要求
	  //2  提交表单
	  $("#regForm").submit();
  });
  

  
  //生成验证码 当用户点击验证码框 弹出层来显示验证码
  $("#verifyCode").focus(function(event){
	  var code = createCode() ; //获取到随机验证码
	  //将验证码显示在层中
	  /*   下面定义层的位置   */
	  var offset = $(event.target).offset();  
	  offset.top+=8;
	  offset.left-=5;
	  $("#checkCode").val(code);
      $('#divTop').css({ top: offset.top + $(event.target).height() + "px", left: offset.left });  
      $('#divTop').show('fast');  
      $(code).appendTo("#code");
      //点击空白处或者自身隐藏弹出层，下面分别为滑动和淡出效果。        
  }); 
  $("#verifyCode").blur(function(){
	  $("#divTop").hide("fast");
  });
  //用户输入到第四个验证码 层自动消失
  $("#verifyCode").keyup(function(){
	  var code = $(this).val();
	  if(code.length>=4){
		  $("#divTop").hide("fast");
		  return false;
	  }
  });
  //当用户点击 backspace 
  $("#verifyCode").bind("keydown", "backspace", function (ev) {
	  var code = $(this).val();
 	 if(ev.which == '8' && code.length<=4){
 		$("#divTop").show("fast");
 	 }
   });
 
  
  //处理用户登录
  $("#UserLogin").click(function(event){
	  //首先检测用户是否输入了用户名和密码 
	  var UserLoginName = $("#UserLoginName").val(); //登录名
	  var UserLoginPass = $("#UserLoginPass").val();  //密码
	  if(UserLoginName == '用户名'){
		  alert("请填写用户名");
		  event.stopPropagation(); 
		  return false;
	  }
	  if(UserLoginPass == '******'){
		  alert('请填写密码');
		  event.stopPropagation(); 
		  return false;
	  }
	//检查用户名是否存在  作为增加用户体验
	  var temp_data = 0; //因为ajax进行的是异步操作 全局变量是无法局部化的 所以加上  async:false,
	  $.ajax({
		  type:"POST",
		  url:"./include/ajax/user_exists.php",
		  dataType:"text",
		  data:"NewID="+UserLoginName,
		  async:false,   //这里加上
		  success:function(data){
			  if(data == 0){
				  alert('不存在该用户，请确保您填写正确');
				  temp_data = 1;
			  }
		  }
	  });
	  if(temp_data == 1){
		  event.stopPropagation(); 
		  return false;
	  }
	  //检测用户输入的验证码是否正确
	  var UserCode = $("#verifyCode").val(); 	//用户填写的验证码
	  var ProgramCode = $("#checkCode").val();	//程序生成的验证码
	  UserCode = UserCode.replace(/[ ]/g,"");	 //替换所有空格！ 
	  ProgramCode = ProgramCode.replace(/[ ]/g,"");
	  UserCode = UserCode.toLowerCase(); //将验证码转换成小写
	  ProgramCode = ProgramCode.toLowerCase();
	  if(!(UserCode == ProgramCode)){
		  alert('验证码填写错误，请重新填写');
		  event.stopPropagation(); 
		  return false;
	  }	  
	  $("#loginForm").submit();   //允许登录
  });
  
  //找回密码 弹出层
  $("#forgetPass").toggle(function(){
	  $("#findPass").slideDown("slow");
  },function(){
	  $("#findPass").slideUp("slow");
  });
  //用户输入找回密码的账号  并点击提交
  $("#top_fp").click(function(){
	  var find_username = $("#UserName").val();
	 //这希望通过ajax实现页面无刷新显示信息
	  $.ajax({
		  type:"POST",
		  dataType:"text",
		  url:"./include/ajax/find_userpass.php",
		  data:"username="+find_username,
		  success:function(data){ 
			  //返回的 data为忘记密码的 账户的 邮箱
			  if(data ==""){
				  $("#find_result").html("<font size='2.0em' color='red'>您输入的账户不存在，请从新填写</font>");
			  }else{
				  //如果到达这里  就应该调用 发邮件的PHP文件  并且要取得那个文件生成的验证码
				  var VerifyCode = createCode();  //生成验证码
				  $("#CheckVerifyCode").val(VerifyCode);//页面隐藏值 得到 生成的验证码
				  var UserEmail = data;//邮箱地址
				  $.ajax({
					  type:"POST",
					  dataType:"text",
					  url:"./include/PHPMailer/sendMail.php",
					  data:"MailInfor="+VerifyCode+"-"+UserEmail,
					  success:function(){
						  alert('请查看您的邮箱');
					  }
				  });
				  $("#find_result").html("<font size='2.0em' color='red'>我们已经向您的邮箱发送了验证码，请将验证码填入下方的文本框中</font>");
				  $("#findpass_code").show('fast');
			  }
		  }
	  });
  });
  $("#SubmitCode").click(function(){
	  //输入验证码   点击 提交验证码 这里主要进行验证
	  var UserCode = $("#UserVerifyCode").val();//用户输入验证码
	  var JsVerifyCode = $("#CheckVerifyCode").val();
	  if(UserCode != JsVerifyCode){
		  alert('验证码填写错误，无法更改密码');
	  }else{
		  $("#newPass").show("fast");//修改密码框出现
	  }
	  //点击提交新密码
	  $("#SubmitNewPass").click(function(event){
		  var UserLoginCode = $("#UserName").val();//用户名
		  var NewPass1 = $("#NewPass1").val();//新密码
		  var NewPass2 = $("#NewPass2").val();//新密码
		  if(NewPass1.length <6 || NewPass2.length<6){
			  alert('您提交的密码过短，建议在6-15位');
			  event.stopPropagation(); 
			  return false;
		  }
		  if(NewPass1.length>15 || NewPass2.length>15){
			  alert('您提交的密码过长，建议在6-15位');
			  event.stopPropagation(); 
			  return false;
		  }
		  if(NewPass1 != NewPass2){
			  alert('两次密码输入不一致，请确认');
			  event.stopPropagation(); 
			  return false;
		  }
		  $.ajax({
			  type:"POST",
			  dataType:"text",
			  url:"./include/ajax/FindUpdatePass.php",
			  data:"UpdatePass="+UserLoginCode+"-"+NewPass1,
			  success:function(data){
				  if(data == '1'){
					  alert('修改成功！');
					  $("#findPass").slideUp("slow");
				  }else{
					  alert('修改失败');
				  }
			  }
		  });
	  });
	  
  });
  

});

