<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>校友网</title>
<meta name="viewport" content="width=device-width" /> 
<link  href="../Css/jquery.mobile-1.0.1.min.css" rel="Stylesheet" type="text/css" />
<script src="../Js/jquery-1.6.4.js" type="text/javascript"></script>
<script src="../Js/index_reg_login.js" type="text/javascript"></script><!-- 原本希望能直接把验证加进去 但是还是先弄别的吧 -->
<link  href="../Css/index.css" rel="Stylesheet" type="text/css" />
<script>
/*
	$(function(){
		//当点击登录时
		$("#SubBtn").click(function(){
			alert('aaa');
			var frmData = $("#form1").serialize();//serialize()函数可以轻松地以UserName=azxuwen&Password=123456这样的方式获取到
			$.ajax({
				type:'post',
				url:'Control/Ajax/AjaxUpPersonName.php',
				cache:false,
				data:frmData,
				success:function(data){
					
				}
			});
		});
	});*/
</script>
<script src="Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>

<body>
	<div id='page1' data-role='page'>
		<div data-role='header'  data-position='fixed'>
			<h1>选择所在地</h1>
		</div>
		<div data-role='content'>
			<form  id='fosrm1'  method='post'>
			<select id='Province' name=='Province'  onchange='changeProvince()'>
			<?php
				//从数据库中将各省市调出来 二级联动 先选省  再选城市  
				 require_once '../Control/ComFunctions.php';
				 require_once '../Control/SqlHelper.class.php';
				 $sqlHelper  = new SqlHelper();
				 $arr_get_province = getProvince();
				 for($i = 0; $i<count($arr_get_province); $i++){
				 	echo "<option value='".$arr_get_province[$i]['CityId']."'>".$arr_get_province[$i]['CityName']."</option>";
				 }
			?>
			</select>
			<select id='UserLocation' name='UserLocation'  ><!--  data-native-menu="false" -->
				<option value='88888'>选择城市</option>
			</select>
			<p>选择您目前的居住地</p>		
			<div id='UpdateInfor'></div>
			<input type='button' id='SubBtnLocation' value='保存' >
			</form>
		</div>

	</div>
</body>
</html>