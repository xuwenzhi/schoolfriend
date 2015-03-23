<?php
session_start();
		require_once 'Control/SqlHelper.class.php';
		require_once 'Control/ComFunctions.php';
		$sqlHelper = new SqlHelper();
		$ThingId = $_GET['ThingId'];
		//建立查询
		$sql_get_thing_content = "Select * from t_thing where ThingId = $ThingId";
		$arr_get_thing_content = $sqlHelper->execute_dql2($sql_get_thing_content);
		$ThingAddTime = date("Y-m-d", strtotime($arr_get_thing_content[0]['ThingTime']));//添加时间
		$ThingWriter = getUserFromTsfuser($arr_get_thing_content[0]['SFUserId']);//作者
		$ThingContent = $arr_get_thing_content[0]['ThingContent'];//内容
		$ThingHTime = $arr_get_thing_content[0]['ThingHTime'];//发生时间
		$RelatedId = $arr_get_thing_content[0]['RelatedId'];//涉及ID
		$SFUserId = $arr_get_thing_content[0]['SFUserId'];//作者的ID  供下面查找涉及到的人的ID使用
	?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $arr_get_thing_content[0]['ThingTitle'];?></title>
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
			<a href='index.php' data-role='button' data-ajax='false' data-icon='arrow-l'>返回</a>
			<h1><?php echo $arr_get_thing_content[0]['ThingTitle'];//输出标题          ?></h1>
		</div>
		<div data-role='content' class='content'>
			<p><?php echo $ThingAddTime; ?>　｜　<?php echo $ThingWriter; ?></p>
			<?php
				
				 echo $ThingContent;
				 echo "事情发生的时间:";
				 echo $ThingHTime."<p>";
				 
				 //下面要将涉及到的人 进行处理
				 $arr_relatedid = explode(',', $RelatedId);
				 //  print_r($arr_relatedid); 数额组中存着的是 涉及到的人的ID
				 //下面通过 循环来构造 查询语句 
				 $sql_get_relatedid_thing = "select * from t_thing where ThingId != $ThingId and ( "; 
				 if(count($arr_relatedid)!= 0){
				 	if(count($arr_relatedid) > 1){
					 	for($i = 0; $i<count($arr_relatedid); $i++){
					 		if($i <= (count($arr_get_thing_content))){
					 			$sql_get_relatedid_thing .= " SFUserId = $arr_relatedid[$i] or"; 
					 		}else{
					 			$sql_get_relatedid_thing .= " SFUserId = $arr_relatedid[$i] ";
					 		}
					 	}
				 	}else{
				 		$sql_get_relatedid_thing .= " SFUserId = $arr_relatedid[0] ";
				 	}
				 }
				 $sql_get_relatedid_thing .= ") order by ThingOrder desc,ThingId desc Limit 0, 4";//构造成功的Sql语句
				 //echo $sql_get_relatedid_thing;
				 $arr_get_relatedid_thing = $sqlHelper->execute_dql2($sql_get_relatedid_thing);
				 echo "<ul data-role='listview' data-theme='c'>";
				 echo "<li data-role='list-divider'>其他有关他/她们的趣事</li>";
				 if(count($arr_get_relatedid_thing) != 0){
				 	for($i =0 ; $i<count($arr_get_relatedid_thing); $i++){
				 		echo "<li><a data-transition='flip' data-ajax='false' href='Thing_Con.php?ThingId=".$arr_get_relatedid_thing[$i]['ThingId']."'>".$arr_get_relatedid_thing[$i]['ThingTitle']."</a></li>";
				 	}
				 }else{
				 	echo "暂无其他该好友们的趣事";
				 }
				 echo "<ul>";
				 
			?>
			
		</div>
		<div data-role='footer' data-position='fixed'>
			<h2><center>copyright &copy; AZXUWEN 哈尔滨理工大学</center></h2>
		</div>
	</div>
</body>
</html>
