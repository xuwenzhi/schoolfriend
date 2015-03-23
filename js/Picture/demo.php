<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery点击缩略图片滚动切换大图片详情展示</title>
<meta name="description" content="jquery图片滚动切换展示制作点击左右按钮控制缩略图片滚动，通过点击缩略图片切换显示该大图内容详情，且设置大图详情容器左右按钮控制切换展示。" />
</head>

<body>


<div class="scrolltab">
	<span id="sLeftBtnA" class="sLeftBtnABan"></span>
	<span id="sRightBtnA" class="sRightBtnA"></span>
	<ul class="ulBigPic">
	<?php
		require_once '../include/SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_get_pic = "Select * from t_photo";
		$arr_get_pic = $sqlHelper ->execute_dql2($sql_get_pic);
		for($i=0; $i<count($arr_get_pic); $i++){
			echo "<li class='liSelected'>";
				echo "<span class='sPic'>";
						echo "<i class='iBigPic'><img src='../".$arr_get_pic[$i]['PhotoAdd']."'  width='560' height='420'/></i>";
				echo "</span>";
				echo "<span class='sSideBox'>";
				echo "<span class='sIntr'>".$arr_get_pic[$i]['PhotoPresent']."</span>";
				echo "</span>";
			echo "</li>";
		}
	?>
	</ul>
	<!--ulBigPic end-->
	<div class="dSmallPicBox">
		<div class="dSmallPic">
			<ul class="ulSmallPic" style="width:2646px;left:0px" rel="stop">
				<?php
				for($i = 0 ; $i<count($arr_get_pic); $i++){
					echo "<li>";
						echo "<span class='sPic'><img alt='东南亚民族风的家 品味跨时空异域情怀' src='../".$arr_get_pic[$i]['PhotoAdd']."' width='135px' height='100px'/>";
						echo "</span>";
						echo "<span class='sTitle'>东南亚民族风的家 品味跨时空异域情怀</span>";
					echo "</li>";
				}
				?>
			</ul>
		</div>
		<span id="sLeftBtnB" class="sLeftBtnBBan"></span>
		<span id="sRightBtnB" class="sRightBtnB"></span>
	</div><!--dSmallPicBox end-->
</div>


<link href="css/list.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/list.js"></script>
</body>
</html>