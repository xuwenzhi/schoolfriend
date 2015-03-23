<?php
	$str = file_get_contents("js/list.js");
	$temp_str =  "var curPic=1,nextPic=2,prePic=-1;preShowPic=-11111";
	$parrten = '/curPic=\d\,nextPic=\d/';
	$replace = "curPic=11111,nextPic=11111"; 
	$newStr = preg_replace($parrten , $replace , $str);
	echo $newStr;
?>