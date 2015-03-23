<?php
session_start();
if(!isset($_SESSION['USERID']) || !isset($_SESSION['USER'])){
	echo '<script> alert("您还未登录"); location.replace("../Login.php")</script>';
}
require_once '../Control/SqlHelper.class.php';
require_once '../Control/ComFunctions.php';
$sqlHelper = new SqlHelper();
if(isset($_GET['ClassId'])){
	$ClassId = $_GET['ClassId'];
}else{
	$ClassId = "";
}
if(isset($_GET['ClassType'])){
	$ClassType = $_GET['ClassType'];
}else{
	$ClassType = "";
}

?>
<!DOCTYPE html>
<html>
<head>
<title>加入/关注班级</title>
<meta name="viewport" content="width=device-width" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="../Css/jquery.mobile-1.0.1.min.css"  rel="Stylesheet" type="text/css" />
<script src="../Js/jquery-1.6.4.js"  type="text/javascript"></script>
<script src="../Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="../Css/index.css" rel="Stylesheet" type="text/css" />
<script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>
<body>
<div data-role='page' data-theme='a'>
		<div data-role="content" data-theme="a">
		<h1>加入/关注班级</h1>
		<a href="ClassJoin.php?ClassJoinType=join" data-role="button" data-ajax='false' data-transition="slidedown" data-theme="b">选择班级加入</a>     
		<a href="ClassJoin.php?ClassJoinType=attention" data-role="button" data-ajax='false' data-transition="slidedown" data-theme="b">选择班级关注</a>
		<?php
			if($ClassType == 'join'){           
				echo "<a href='quitClass.php?ClassQuitType=join&ClassId=".$ClassId."' data-ajax='false' data-role='button' data-transition='slidedown' data-theme='b'>退出班级</a>";
			}else{
				echo "<a href='quitClass.php?ClassQuitType=attention&ClassId=".$ClassId."' data-ajax='false' data-role='button' data-transition='slidedown' data-theme='b'>取消关注</a>";
			}
		?>
		<a href="#" data-role="button" data-rel="back" data-theme="a">取消</a>    
		</div>
</div><!-- page -->
</body>
</html>