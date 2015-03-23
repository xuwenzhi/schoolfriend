<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
$to = "songyichao74@qq.com";
$subject = "测试邮件";
$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$message = "测试内容";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=utf-8\r\n";
$headers .= "From: leo108<root@leo108.com>\r\n";
echo mail($to,$subject,$message,$headers);
?>
</body>
</html>