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

//获取班级名
$sql_get_classname = "Select ClassName from t_class where ClassId = $ClassId";
$arr_get_classname = $sqlHelper->execute_dql2($sql_get_classname);
$ClassName = $arr_get_classname[0]['ClassName'];//班级名称

//识别出是退出班级 还是 取消关注该班级
if(isset($_GET['ClassQuitType'])){
	$ClassQuitType = $_GET['ClassQuitType'];
}else{
	$ClassQuitType = "";
}

echo "<input type='hidden' id='ClassId' value='".$ClassId."'/>";
echo "<input type='hidden' id='ClassName' value='".$ClassName."'/>";
?>
<!DOCTYPE html>
<html>
<head>
<title>
<?php
	if($ClassQuitType == 'join'){
		echo "退出班级".$ClassName;
	} else{
		echo "取消关注".$ClassName;
	}
?>
</title>
<meta name="viewport" content="width=device-width" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="../Css/jquery.mobile-1.0.1.min.css"  rel="Stylesheet" type="text/css" />
<script src="../Js/jquery-1.6.4.js"  type="text/javascript"></script>
<script type="text/javascript">
function quitClass(){
	//退出班级
	var ClassId = $("#ClassId").val();//班级ID
	var ClassName = $("#ClassName").val();//班级名称
	//通过ajax来处理退出班级
	$.ajax({
		type:'post',
		url:'../Control/Ajax/AjaxQuitClass.php',
		data:'ClassId='+ClassId,
		dataType:'text',
		success:function(data){
			$("#QuitClassResult").html('');
			if(data == 'OK'){
				$("#QuitClassResult").html('<font color="red" size="3">退出班级'+ClassName+'成功</font><a href="../Classes.php">回到班级列表</a>');
			}else if(data=='NO'){
				$("#QuitClassResult").html('<font color="red" size="3">退出班级'+ClassName+'失败</font><a href="../Classes.php">回到班级列表</a>');
			}
		},
		beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
			var load = "<img src='../Images/loading.gif' width='20px' height='20px'/><font color='red'>正在处理中...</font>";
			$(load).appendTo("#QuitClassResult");
		},
		complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
			//$("#getMoreNewsLoad").html('');
		}
	});
}
//取消关注班级
function quitAttentionClass(){
	//取消关注班级
	var ClassId = $("#ClassId").val();//班级ID
	var ClassName = $("#ClassName").val();//班级名称
	//通过ajax来处理取消关注班级
	$.ajax({
		type:'post',
		url:'../Control/Ajax/AjaxQuitAttentionClass.php',
		data:'ClassId='+ClassId,
		dataType:'text',
		success:function(data){
			$("#QuitClassResult").html('');
			if(data == 'OK'){
				$("#QuitClassResult").html('<font color="red" size="3">取消关注班级'+ClassName+'成功</font><a href="../Classes.php">回到班级列表</a>');
			}else if(data=='NO'){
				$("#QuitClassResult").html('<font color="red" size="3">取消关注班级'+ClassName+'失败</font><a href="../Classes.php">回到班级列表</a>');
			}
		},
		beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
			var load = "<img src='../Images/loading.gif' width='20px' height='20px'/><font color='red'>正在处理中...</font>";
			$(load).appendTo("#QuitClassResult");
		},
		complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
			//$("#getMoreNewsLoad").html('');
		}
	});
}
</script>
<script src="../Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="../Css/index.css" rel="Stylesheet" type="text/css" />
<script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>
<body>
<div data-role='page'>
	<div data-role='header' data-position='fixed'>
	<h1><center><?php
					if($ClassQuitType == 'join'){
						echo "退出班级";
					} else{
						echo "取消关注";
					}
				?>
	</center></h1>
	</div>
	<div data-role='content'>
	<h1><?php 
			if($ClassQuitType == 'join'){
				echo "确认退出";
			}else{
				echo "确认取消关注";
			}
			echo $ClassName;
		?>
	吗?</h1>
		<fieldset data-role='controlgroup' data-type='horizontal'>
		<?php 
			if($ClassQuitType == 'join'){
				echo "<a href='#' id='confirmQuitClass' onclick='quitClass()' data-role='button'>确定</a>";
			}else{
				echo "<a href='#' id='confirmQuitClass' onclick='quitAttentionClass()' data-role='button'>确定</a>";
			}
		?>
			<a href='#' data-rel='back' data-role='button'>取消</a>
		</fieldset>
	<div id='QuitClassResult'></div>
	</div><!-- content -->
	<div data-role='footer' data-position='fixed'>
		<h1>copyright &copy; AZXUWEN 哈尔滨理工大学</h1>
	</div><!-- footer -->
</div><!-- page -->
</body>
</html>