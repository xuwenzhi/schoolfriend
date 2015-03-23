<?php
//这个页面我要加入 jquery.mobile 1.3.2 Popup特性
		session_start();
		require_once 'Control/SqlHelper.class.php';
		require_once 'Control/ComFunctions.php';
		$sqlHelper = new SqlHelper();
		if(!isset($_GET['Mien_id'])){
			echo '<script> alert("信息加载出错，请重试"); location.replace("Miens.php")</script>';
			exit;
		}
		$Mien_id = $_GET['Mien_id'];
		//获取到当前类别的照片分类名称
		$PhotoTypeName = getCodeNameByCodeId($Mien_id);//照片分类名称 
	?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $PhotoTypeName; ?></title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.3.2.css" rel="Stylesheet" type="text/css" />
    <script src="Js/jquery.js" type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.3.2.min.js" type="text/javascript"></script>
	<script src="Js/klass.min.js" type="text/javascript"></script>
	<script src="Js/photoswipe.js" type="text/javascript"></script>
	<link  href="Css/photoswipe.css" rel="Stylesheet" type="text/css" />
	<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
	<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
	<script>   
	$( document ).on( "pageinit", function() {//documen绑定pageinit事件
        $( ".photopopup" ).on({    //一个类选择器为photopopup的 div的upbeforeposition 事件
            popupbeforeposition: function() {
                var maxHeight = $( window ).height() - 60 + "px"; //将图片的最大尺寸设置成屏幕的最大宽度-60px
                $( ".Pop img" ).css( "max-height", maxHeight );
            }
        });
    });        
    
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
	<style>
		#Page{
			position:absolute;
			right:10px;
		}
	</style>
</head>
<body>	
	<div id='miens' data-role='page' >
		<div data-role='header'  data-position='fixed'>
			<a href='Miens.php' data-ajax='false' data-icon='arrow-l'>返回</a>
			<h1><?php echo $PhotoTypeName; ?></h1>
		</div>
		<div data-role='content' class='content'>
			<?php
				require_once 'Control/Asspage.class.php';
				$assPage = new AssPage();
				$assPage->pageSize = 5; //每页显示20个
				//下面查看是否存在pageNow
				if(isset($_GET['pageNow'])){
					$assPage->pageNow = $_GET['pageNow'];
				}else{
					$assPage->pageNow = 1;
				}
				$aa = ($assPage->pageNow-1)*$assPage->pageSize;//每一页的起始位置
				$bb = $aa+$assPage->pageSize;
				$sql_all_photo_count = "Select count(PhotoId) From t_photo where PhotoType=$Mien_id";
				//建立查询获取当前类别的照片
				$sql_get_photo = "Select * from t_photo where PhotoType = $Mien_id limit $aa,$bb";
				$arr_get_photo = $sqlHelper->execute_dql2($sql_get_photo);
				$sqlHelper->excute_dql_asspage($sql_all_photo_count, $sql_get_photo, $assPage);
				if(count($arr_get_photo) != 0){
					echo "<ul class='gallery'>";
					for( $i = 0 ; $i < count($assPage->pageArr); $i++ ){
						echo "<li><a href='#popup".$i."' data-rel='popup'><img src='../".$assPage->pageArr[$i]['PhotoAdd']."' alt='' title=''/></a></li>";
						echo "<div data-role='popup' id='popup".$i."' class='Pop' data-position-to='window'>";
						echo "<img src='../".$assPage->pageArr[$i]['PhotoAdd']."'/>";
						echo "<br/>".$assPage->pageArr[$i]['PhotoPresent']."";
						echo "</div>";
					}
					echo "</ul>";
					
					//下面是分页
					echo "<div id='Page'>";
						if($assPage->pageNow>1){
							$prePage = $assPage->pageNow-1;
							echo "<a id='prePage' data-role='button' data-inline='true' href='Mien_Con.php?pageNow=".$prePage."&Mien_id=".$Mien_id."'>上一页</a>　";
						}
						if($assPage->pageNow<$assPage->pageCount){
							$nextPage = $assPage->pageNow+1;
							echo "<a id='nextPage' data-role='button' data-inline='true' href='Mien_Con.php?pageNow=".$nextPage."&Mien_id=".$Mien_id."'>下一页　</a>";
						}
						echo "$assPage->pageNow / $assPage->pageCount 页";
					echo "</div>";
					
					
				}else{
					echo "当前分类无照片";
				}
				
			?>
		</div>
		<div data-role='footer' data-position='fixed'>
			<h2><center>copyright &copy; AZXUWEN 哈尔滨理工大学</center></h2>
		</div>
	</div>
</body>
</html>
