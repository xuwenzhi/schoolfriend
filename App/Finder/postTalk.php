<!DOCTYPE html>
<html>
<head>
    <title>发表说说</title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="../Css/jquery.mobile-1.0.1.min.css" 
           rel="Stylesheet" type="text/css" />
    <script src="../Js/jquery-1.6.4.js" 
           type="text/javascript"></script>
    <script src="../Js/jquery.mobile-1.0.1.js" 
           type="text/javascript"></script>
    <script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
<style>
.mainlist{padding:10px;}
.mainlist li{height:28px;line-height:28px;font-size:12px;}
.mainlist li span{margin:0 5px 0 0;font-family:"宋体";font-size:12px;font-weight:400;color:#ddd;}
</style>
</head>
<body>
	<div id='page1' data-role='page'>
		<div data-role='header'  data-position='fixed'>
			<h1>发表说说</h1>
		</div>
		<div data-role='content' class='content'>
		<!-- 这里是输入文本框 -->
			<textarea id='UserTalk' name='UserTalk' cols='100'>
				
			</textarea>
			<a href='#' data-role='button' id='postTalk' class='ui-btn-right' data-icon='check' data-mini='true' data-inline='true'>发布</a>
		<div id="box" style="display:none;position:absolutely;">
		<div class="mainlist" >
			<center><font size='6'><b>已发表</b></font></center>
		</div>
		</div>
		<div id="loadpost" style="display:none;position:absolutely;">
		<div class="mainlist" >
			<center><img src='../Images/ajax-loading.gif' /></center>
			<center><font size='6'><b>正在发送</b></font></center>
		</div>
		</div>
		</div>
	</div>
</body>
</html>