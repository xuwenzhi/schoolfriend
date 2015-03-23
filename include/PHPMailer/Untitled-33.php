<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php    
    $to = "songyichao74@qq.com";  
	
	$user = "Gonn";
	$date = date("Y年m月d日");
	
	$headers  = 'MIME-Version: 1.0' . "rn";
	$headers .= 'Content-type: text/html; charset=utf-8' . "rn";
	$headers .= "To: $to rn"; 
	$headers .= "Cc: 252211974@qq.com rn"; 
	$headers .= 'From: gonnsai@163.com' . "rn";
    $subject = "珠海生活圈";  
	$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
 
    $content = '亲爱的'."$user".'：'.'<br />';  
	$content .= '<br />';  
	$content .= "感谢您注册珠海生活圈，精彩的生活从珠海生活圈开始！".'<br />';  
    $content .= "在珠海生活圈，您可以：".'<br />';  
	$content .= "查询珠海的商家情况，方便您生活与娱乐。".'<br />';  
	$content .= "了解最近珠海举行的活动，让您的生活更加丰富。".'<br />';  
	$content .= "浏览新闻热点，扩展知识面。".'<br />';  
	$content .= '<br />';  
	$content .= "珠海生活圈 -- 为建成珠海最大的商家数据库而不断努力着。 ".'<a href="http://www.zhuhailife.net" target="_blank">www.zhuhailife.net</a>'.'<br />'; 
	$content .= '<br />';  
	$content .= "珠海生活圈团队".'<br />'; 
	$content .= "$date".'<br />';  
    $result = mail($to, $subject,$content,"From:$from\r\nCc: $cc");  
	
	if($result)
	{
		echo '邮件发送成功！';
	}
	
?>  
</body>
</html>