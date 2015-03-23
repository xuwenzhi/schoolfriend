<?php
session_start();
		require_once 'Control/SqlHelper.class.php';
		require_once 'Control/ComFunctions.php';
		$sqlHelper = new SqlHelper();
		$ApplyId = $_GET['ApplyId'];//获取ID
		//建立查询
		$sql_get_apply_content = "Select * from t_apply where ApplyId = $ApplyId";
		$arr_get_apply_content = $sqlHelper->execute_dql2($sql_get_apply_content);
		$ApplyAddTime = date("Y-m-d", strtotime($arr_get_apply_content[0]['ApplyTime']));//添加时间
		$ApplyWriter = getUserFromTsfuser($arr_get_apply_content[0]['SFUserId']);//作者
		$ApplyPosition = $arr_get_apply_content[0]['ApplyPosition'];//职位
		$ApplyTrade = $arr_get_apply_content[0]['ApplyTrade'];//行业
		$ApplyPlace = $arr_get_apply_content[0]['ApplyLocation'];//地点
		$ApplyType = $arr_get_apply_content[0]['ApplyType'];//是否兼职
		$ApplyClaim = $arr_get_apply_content[0]['ApplyClaim'];//要求
		$ApplySalary = $arr_get_apply_content[0]['ApplySalary'];//期望薪资
		
		//下面将对该招聘信息感兴趣的人数统计出来
		$sql_get_recurit_likecount = "Select count(SFUserId) From t_accept Where RecruitId = $RecruitId";
		$arr_get_recurit_lidecount = $sqlHelper->execute_dql2($sql_get_recurit_likecount);
		$RecruitLikeCount = $arr_get_recurit_lidecount[0][0];//对该招聘信息感兴趣的人
	?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $arr_get_apply_content[0]['ApplyUnit'];?></title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.0.1.min.css" 
           rel="Stylesheet" type="text/css" />
    <script src="Js/jquery-1.6.4.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.0.1.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile.actionsheet.js" 
           type="text/javascript"></script>
	 <link  href="Css/jquery.mobile.actionsheet.css" 
           rel="Stylesheet" type="text/css" />
<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
<script>
	$(function(){
		//当点击登录时
		$("#SubBtn").click(function(){
			var frmData = $("#form1").serialize();//serialize()函数可以轻松地以UserName=azxuwen&Password=123456这样的方式获取到
			$.ajax({
				type:'post',
				url:'Control/Ajax/AjaxLoginControl.php',
				cache:false,
				data:frmData,
				success:function(data){
					if(data == 'NO'){
						$("#LoginInfor").html('<font color=red>密码错误！</font>');
					}else if(data == 'NOUSER'){
						$("#LoginInfor").html('<font color=red>不存在该用户！</font>');
					}else{
						//登录成功
						$("#form1").submit();
					}
				}
			});
		});
	});
</script>
</head>
<body>	
	<div id='page1' data-role='page' >
		<div data-role='header'  data-position='fixed'>
			<a href='#' data-rel='back' data-icon='arrow-l'>返回</a>
			<h1><?php echo $arr_get_apply_content[0]['ApplyUnit'];//输出标题          ?></h1>
		</div>
		<div data-role='content' class='content'>
			<p><?php echo $ApplyAddTime; ?>　｜　<?php echo $ApplyWriter; ?></p>
			<?php
				echo "<h1><strong>职位信息</strong></h1>";
				echo "<strong>招聘行业:</strong>　".$ApplyTrade."<br/>";			
				echo "<strong>是否兼职:</strong>　";
				if($ApplyType == 1){
					echo "兼职";
				}else{
					echo "全职";
				}
				echo "<br/>";
				echo "<strong>期望薪资:</strong>　";
				if($ApplySalary !=""){
					echo $ApplySalary."<br/>";
				}else{
					echo "无要求<br/>";
				}
				echo "<strong>发布区域:</strong>　".$ApplyPlace."<br/>";
				echo "<h1><strong>职位描述</strong></h1>";
				if($ApplyClaim != ""){
					echo $ApplyClaim;
				}else{
					echo "无职位描述";
				}
			?>
			
		</div>
		<div data-role='footer' data-position='fixed'>
			<h2><center>copyright &copy; AZXUWEN 哈尔滨理工大学</center></h2>
		</div>
	</div>
</body>
</html>