<?php
session_start();
if(!isset($_SESSION['USER']) || !isset($_SESSION['USERID'])){
	echo '<script> alert("您还未登录"); location.replace("Login.php")</script>';
	exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|
	哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<meta name="viewport" content="width=device-width" /> 
<link  href="Css/jquery.mobile-1.0.1.min.css" rel="Stylesheet" type="text/css" />
<script src="Js/jquery-1.6.4.js" type="text/javascript"></script>
<script src="Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="Css/index.css" rel="Stylesheet" type="text/css" />
<script src='Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
<style>
/* 因为这些链接都是通过 data-ajax来调出来的 甭管是JS 还是 CSS 都需要在本页就写好    */
/*   个人头像样式  */
#UserLook{
	background:red;
	color:red;
	width:80px;
	height:100px;
	position:absolute;
	right:20px;
	top:200px;
	border:3px solid white;
}
</style>

</head>
<body  manifest='cache.manifset'>
<div data-role='page'>
<div data-role='header' data-position='fixed'>
	<h1><center>校友网</center></h1>
</div>
<div data-role='content' id='index'>
   	<ul data-role='listview'>
   		<li>
   			<a href='Finder/FriendCircle.php' data-ajax='false' data-transition='slide'>朋友圈</a><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>
   		</li>
   	</ul>
   	<br/>	<br/><br/><br/>
   	<ul data-role='listview'>
   		<li>
   			<a href='Finder/HotNews.php' data-transition='slide' data-ajax='false'>热点新闻</a><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>
   		</li>
   		<li>
   			<a href='Finder/HotInfors.php' data-transition='slide' data-ajax='false'>热点供求</a><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>
   		</li>
   		<li>
   			<a href='Finder/HotRecruits.php' data-transition='slide' data-ajax='false'>热点招聘</a><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>
   		</li>
   		<li>
   			<a href='Finder/HotApplys.php' data-transition='slide' data-ajax='false'>热点应聘</a><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span>
   		</li>
   	</ul>
</div><!-- content-->
<?php require_once 'footer.php';?>
</div>
</body>
</html>