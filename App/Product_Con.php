<?php
session_start();
//该文件是产品推介的内容
require_once 'Control/SqlHelper.class.php';
require_once 'Control/ComFunctions.php';
$sqlHelper = new SqlHelper();
$ProductId = $_GET['ProductId'];//获取ID
//建立查询
$sql_get_product_con = "Select * from t_product where ProductId= $ProductId";
$arr_get_producg_con = $sqlHelper->execute_dql2($sql_get_product_con);
$ProductTitle = $arr_get_producg_con[0]['ProductName'];//产品标题
$ProductAddTime = date("Y-m-d", strtotime($arr_get_producg_con[0]['ProductRTime']));//添加时间
$ProductWriter = getUserFromTsfuser($arr_get_producg_con[0]['SFUserId']);//作者
$ProductContent = $arr_get_producg_con[0]['ProductContent'];//内容
$ProductImg = $arr_get_producg_con[0]['ProductPAdd'];//配图
$ProductFContent = $arr_get_producg_con[0]['ProductFContent'];//特殊描述
$ProductPrice = $arr_get_producg_con[0]['ProductPrice'];//价格
$ProduceUnit = $arr_get_producg_con[0]['ProductUnit'];//单位
$ProductETime = $arr_get_producg_con[0]['ProductETime'];//截止日期

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $ProductTitle;?></title>
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
	<div id='page1' data-role='page' data-add-back-btn='true'>
		<div data-role='header'  data-position='fixed'>
			<a href='#' data-rel='back' data-icon='arrow-l'>返回</a>
			<h1><?php echo $ProductTitle;?></h1>
		</div>
		<div data-role='content' class='content'>
			<p><?php echo $ProductAddTime; ?>　|　<?php echo $ProductWriter;  ?></p>
			<?php
				echo "<strong>商品介绍:</strong>";
				echo $ProductContent;
				echo "<strong><br/>特殊描述:</strong>";
				echo $ProductFContent; 
				echo "<strong><br/>配　　图:</strong>";
				if($ProductImg != ""){
					echo "<br/><img src='../".$ProductImg."'/><br/>";
				}else{
					echo "暂无配图<br/>";
				}
				echo "<strong>价　　格:</strong>";
				echo $ProductPrice."<br/>";
				echo "<strong>单　　位:</strong>";
				echo $ProduceUnit."<br/>";
				echo "<strong>截止日期:</strong>";
				echo $ProductETime;
			?>
			
		</div>
		<div data-role='footer' data-position='fixed'>
			<h2><center>copyright &copy; AZXUWEN 哈尔滨理工大学</center></h2>
		</div>
	</div>
</body>
</html>