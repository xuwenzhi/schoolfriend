<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body><?php
   
$to="songyichao74@qq.com";
$from="user@yourdomain.com";
$cc=$from;
$subject = "永远同校";
$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$body=<<<BODY
尊敬的其它网用户 宋祎超：

您好！

您在人人网进行帐号验证操作的验证码为: 241400。

您也可以点击如下链接来完成帐号验证。

https://safe.renren.com/standalone/mail/check?user=741987130&token=DYTDBuRMCY29uXRNapUZqC9m8nPtCOro

如果上面的链接无法点击，您也可以复制链接，粘贴到您浏览器的地址栏内，然后按“回车”键打开预设页面，完成相应功能。

验证将会在30分钟后失效，请尽快完成身份验证，否则需要重新进行验证。

如果有其他问题，请联系我们：admin@renren.com 谢谢！

此为系统消息，请勿回复
BODY;
if(@mail($to,$subject,$body,"From:$from\r\nCc: $cc")){
	echo('<p>mail成功</p>');
}else{
	echo('<p>mail失败</p>');
}
?>
</body>
</html>