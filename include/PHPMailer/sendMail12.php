<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
function randomkeys($length)
{
 $pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
 for($i=0;$i<$length;$i++)
 {
   $key.= $pattern{mt_rand(0,35)};    //生成php随机数
 }
 return $key;
}
$ma = randomkeys(5);
 echo $ma;
?>
</body>
</html>