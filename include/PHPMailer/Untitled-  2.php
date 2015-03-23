<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
$smtpserver = "smtp.126.com";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "xxxxxx@126.com";//SMTP服务器的用户邮箱
$smtpemailto = "songyichao74@qq.com";//发送给谁
$smtpuser = "xxxxxx@126.com";//SMTP服务器的用户帐号
$smtppass = "******";//SMTP服务器的用户密码
$mailsubject = "取回密码";//邮件主题
$mailbody = "您好!";//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件   
if(@mail($to,$subject,$body,"From:$from\r\nCc: $cc")){
	echo('<p>mail成功</p>');
}else{
	echo('<p>mail失败</p>');
}
?>
</body>
</html>