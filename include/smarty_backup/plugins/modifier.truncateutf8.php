<?php
/**
*  smarty插件
   作用截取UTF-8字符串，代替truncate
   原创来源：安徽PHP社区http://bbs.hfphp.org
   author： bjk
*/
/**
   @string   要截取的字符串
   @length  要截取的字符数  （）默认长度为80
   @etc    截取后替换的东东
 */
function smarty_modifier_truncateutf8($string, $length = 80, $etc = "...")
{
    if ($length == 0)
        return "";
    if (mb_strlen($string,"UTF-8") > $length) {
  $string = mb_substr($string,0,$length,"UTF-8");
  return $string.$etc;
 }else{
  return $string;
 }
}
?>