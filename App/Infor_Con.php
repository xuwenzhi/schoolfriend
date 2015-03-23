<?php
session_start();
//该文件是产品推介的内容
require_once 'Control/SqlHelper.class.php';
require_once 'Control/ComFunctions.php';
$sqlHelper = new SqlHelper();
$InforId = $_GET['InforId'];//获取ID
//建立查询
$sql_get_Infor_con = "Select * from t_information where InfoId= $InforId";
$arr_get_Infor_con = $sqlHelper->execute_dql2($sql_get_Infor_con);
$InforTitle = $arr_get_Infor_con[0]['InfoTitle'];//产品标题
$InforAddTime = date("Y-m-d", strtotime($arr_get_Infor_con[0]['InfoRTime']));//添加时间
$InforWriter = getUserFromTsfuser($arr_get_Infor_con[0]['SFUserId']);//作者
$InforContent = $arr_get_Infor_con[0]['InfoContent'];//内容
$InforImg = $arr_get_Infor_con[0]['InfoPictureAdd'];//配图
$InforETime = $arr_get_Infor_con[0]['InfoETime'];//截止日期

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $InforTitle;?></title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.0.1.min.css" 
           rel="Stylesheet" type="text/css" />
    <script src="Js/jquery-1.6.4.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.0.1.js" 
           type="text/javascript"></script>
<link  href="Css/index.css" rel="Stylesheet" type="text/css" />
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
	<div id='page1' data-role='page'>
		<div data-role='header'  data-position='fixed'>
			<a href='#' data-rel='back'  data-icon='arrow-l'>返回</a>
			<h1><?php echo $InforTitle;?></h1>
		</div>
		<div data-role='content' class='content'>
			<p><?php echo $InforAddTime; ?>　|　<?php echo $InforWriter;  ?></p>
			<?php
				echo "<strong>信息介绍:</strong><br/>";
				echo $InforContent."<br/>";
				echo "<strong>配　　图:</strong><br/>";
				if($InforImg == ""){
					echo "<img src='Images/sad2.jpg'>暂无配图<br/>";
				}else{
					echo "<img src='../".$InforImg."'/><br/>";
				}
				echo "<strong>截止日期:</strong>";
				echo $InforETime;
			?>
			
		</div>
		<div data-role='footer' data-position='fixed'>
			<h2><center>copyright &copy; AZXUWEN 哈尔滨理工大学</center></h2>
		</div><!-- footer -->
	</div><!-- page -->
</body>
</html>