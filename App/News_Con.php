<?php
		session_start();
		require_once 'Control/SqlHelper.class.php';
		require_once 'Control/ComFunctions.php';
		$sqlHelper = new SqlHelper();
		$NewsId = $_GET['NewsId'];//获取新闻ID
		//建立查询
		$sql_get_news_content = "Select NewsTitle,NewsAddTime,NewsContent,SFUserId from t_news where NewsId = $NewsId";
		$arr_get_news_content = $sqlHelper->execute_dql2($sql_get_news_content);
		$NewsAddTime = date("Y-m-d", strtotime($arr_get_news_content[0]['NewsAddTime']));//添加时间
		$NewsWriter = getUserFromTsfuser($arr_get_news_content[0]['SFUserId']);//新闻作者
		$NewsContent = $arr_get_news_content[0]['NewsContent'];//新闻内容
	?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $arr_get_news_content[0]['NewsTitle'];?></title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.0.1.min.css" 
           rel="Stylesheet" type="text/css" />
    <script src="Js/jquery-1.6.4.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.0.1.js" 
           type="text/javascript"></script>
<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->           
    <script>
    	$(document).ready(function(){
        	//这里对内容中的图片进行处理 如果图片的宽度过宽导致屏幕无法完全获取到完整图片时，将图片的大小控制住
        	var width = $(window).width();//屏幕宽度
        	var height = $(window).height();//屏幕高度
        	$("div[data-role='page'] img").each(function(){
            	if(parseInt($(this).css('width')) > width){
                	var CurrentImgHeight = parseInt($(this).css('height'));
                	var ImgScale = CurrentImgHeight/parseInt($(this).css('width'));//原图片的高度/宽度                	
            		$(this).css('width', width-50); //将宽度设置为满屏幕宽度的-50px
            		$(this).css('height', (width-50)*ImgScale);//按照图片原比例 设置图片的高度
            	}
        	});
        });
	</script>
	
</head>
<body>	
	<div id='page1' data-role='page' >
		<div data-role='header'  data-position='fixed'>
			<a href='#' data-rel='back' data-icon='arrow-l'>返回</a>
			<h1><?php echo $arr_get_news_content[0]['NewsTitle'];//输出标题          ?></h1>
		</div>
		<div data-role='content' class='content'>
			<p><?php echo $NewsAddTime; ?>　｜　<?php echo $NewsWriter; ?></p>
			<?php
				 echo $NewsContent;
			?>
		</div>
		<div data-role='footer' data-position='fixed'>
			<h2><center>copyright &copy; AZXUWEN 哈尔滨理工大学</center></h2>
		</div>
	</div>
</body>
</html>
