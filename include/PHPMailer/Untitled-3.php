<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

require_once('class.phpmailer.php');
$mail= new PHPMailer();
$body= "我终于发送邮件成功了！呵呵！goodboy xxxxxxx！<br/><a>http://news.qq.com/a/20111115/000792.htm?qq=0&ADUIN=594873950&ADSESSION=1321316731&ADTAG=CLIENT.QQ.3493_.0</a>";
//采用SMTP发送邮件
$mail->IsSMTP();
//邮件服务器
$mail->Host = "smtp.126.com";
$mail->SMTPDebug = 0;
//使用SMPT验证
$mail->SMTPAuth = true;
//SMTP验证的用户名称
$mail->Username = "xxxxxxx@126.com";
//SMTP验证的秘密
$mail->Password = "password";
//设置编码格式
$mail->CharSet = "utf-8";
//设置主题
$mail->Subject = "测试";
//$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
//设置发送者
$mail->SetFrom('songyichao74@qq.com', 'test');
//采用html格式发送邮件
$mail->MsgHTML($body);
//接受者邮件名称
$mail->AddAddress("songyichao74@qq.com", "test");//发送邮件
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}

?>
</body>
</html>