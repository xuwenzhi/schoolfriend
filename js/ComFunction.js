/*
	此JS文件用于提供公用函数
*/
//验证字符串为数字或字母  START
function wordOrcount(str){
	//str为被验证字符串
	var s = /^[0-9a-zA-Z]*$/; //字母和数字的正则
	return s.test(str); //如果为数字和字母 则返回true
}
//验证字符串为数字或字母  END

//验证中文名称的正则START
function checkStr(str){ 
	// [\u4E00-\uFA29]|[\uE7C7-\uE7F3]汉字编码范围 
	var re1 = new RegExp("^([\u4E00-\uFA29]|[\uE7C7-\uE7F3])*$"); 
	if (!re1.test(str)){ 
		return false; 
	} 
	return true; 
} 
//验证中文名称的正则END
//验证QQ号码  START
function validateQQ(str)
{
    var result=str.match(/[1-9][0-9]{4,}/);
    if(result==null) 
    	return false;
    return true;
}
//验证QQ号码 END
//验证邮箱 START
function validateEmail(str)
{
   var result=str.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/);
	if(result==null) {
		return false;
	}
    return true;
}
//验证邮箱  END
//验证0000-0000000类似的电话 正则  START
//咱不合格
function validateWPhone(str){
	var result=str.match("((d{3,4})|d{3,4}-)?d{7,8}(-d{3})*");
	if(result==null) {
		return false;
	}
    return true;
}
//验证0000-0000000类似的电话 正则  END
//验证电话号码START
function   validatePhone(str){  
	 var re;
     var ss=str;
     re= /[1-9][0-9]{10,}/;
     if(re.test(ss))
      return true;
     else
     {
      return false;
     }
} 
//验证电话号码 END

//生成随机验证码  START
function createCode()   
{    
  var code = "";   
  var codeLength = 4;//验证码的长度   
  var checkCode = document.getElementById("checkCode");   
  var selectChar = new Array('2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','j','k','m','n','o','p','q','r','s','t','u','v','w','x','y','A','B','C','D','E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z');//所有候选组成验证码的字符，当然也可以用中文的   
       
  for(var i=0;i<codeLength;i++)   
  {   
	   var charIndex = Math.floor(Math.random()*50);   
	   code +=selectChar[charIndex];      
  }     
  if(code.length == 4)
  {         
    checkCode.className="code";   
    checkCode.value = code;   
  }   
  return code;
}
//生成随机验证码  END

//判断上传文件的大小  START
function filesize(ele) {
    // 返回 KB，保留小数点后两位
    if((ele.files[0].size / 1024).toFixed(2) > 4096){//如果上传的文件大于  4M
    	alert('您选择上传的图片过大，请从新选择');
    	return false;
    }
}
//判断上传文件的大小  END


