<?php
session_start();
require_once '../Control/SqlHelper.class.php';
require_once '../Control/ComFunctions.php';
$sqlHelper = new SqlHelper();
if(!isset($_SESSION['USERID']) || !isset($_SESSION['USER'])){
	echo '<script> alert("您还未登录"); location.replace("../Login.php")</script>';
}else{
	$UserId = $_SESSION['USERID'];
}
if(isset($_GET['from'])){
	//如果是从班级那里过来的 就显示 点击的那个人的信息
	$UserId = $_GET['UserId'];
}

?>
<!DOCTYPE html>
<html>
<head>
<title>校友网</title>
<meta name="viewport" content="width=device-width" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="../Css/jquery.mobile-1.0.1.min.css"  rel="Stylesheet" type="text/css" />
<script src="../Js/jquery-1.6.4.js"  type="text/javascript"></script>
<script src="../Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="../Css/index.css" rel="Stylesheet" type="text/css" />
<link href="../Css/jquery-webox.css" rel="stylesheet" type="text/css">
<script src="../Js/jquery-webox.js"></script>
<script src='Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
<script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
<style>
/*   个人头像样式  */
#UserLook{
	background:red;
	color:red;
	width:80px;
	height:100px;
	position:absolute;
	right:20px;
	top:200px;
	border:3px solid white;
}
</style>
<script>
$(document).ready(function(){
	$("body").live("pagechange", function(){
		//点击发表说说
		$("#postTalk").click(function(){
			var TalkContent = $("#UserTalk").val();//获取到说说内容
			//通过ajax发表说说
			$.ajax({
				type:'post',
				url:'../Control/Ajax/AjaxPostTalk.php',
				data:'TalkContent='+TalkContent,
				dataType:'text',
				success:function(data){
					if(data == 'OK'){
						//alert('success');
						$("#loadpost").hide('fast');
						$.webox({
							height:100,
							width:160,
							bgvisibel:true,
							title:'发表说说',
							html:$("#box").html()
						});
						window.location.href = 'FriendCircle.php';
					}else{
						alert('发表失败');
					}
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					$.webox({
						height:100,
						width:160,
						bgvisibel:true,
						title:'发表说说',
						html:$("#loadpost").html()
					});
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					//$("#box").hide('fast');
					//alert();
				}
			});
		});
	});
	$("#TalkMore").click(function(){
    	var $TalkCount = 0;
    	$("tr[id='TalkContent']").each(function(){
        	$TalkCount ++;//
    	});
    	var UserAdd = $("#UserAdd").val();  //用户头像地址  	
		//获取到此页面将要显示的用户的 头像
    	//下面通过ajax将之后的20条数据拿出来
    	$.ajax({
    		type:'post',
			url:'../Control/Ajax/AjaxGetMoreTalks.php',
			dataType:'json',
			data:"TalkCount="+$TalkCount,
			success:function(json){
				if(json!=""){
					for(var one in json){
						var str='<tr id="TalkContent"><td valign="top" width="2%"><img src='+UserAdd+' width="30px" height="30px"><td width="100">'+json[one]['TalkContent']+'</td></tr><tr><td colspan="2">'+json[one]['TalkTime']+'</td></tr><tr><td colspan="2"><hr width="100%" color="#fff"/></td></tr>';
						$(str).insertBefore("#GETMORETR");
					}
				}
				if(json == 0){
    				$("#getMoreTalkInfor").html('已经加载全部');
				}
			},
			beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
				var load = "<img src='../Images/loading.gif' width='20px' height='20px'/>";
				$(load).appendTo("#getMoreTalkLoad");
			},
			complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
				$("#getMoreTalkLoad").html('');
				//window.location.href='FriendCircle.php';
			}
        });
	});
});
</script>
</head>
<body>
	<div id='page1' data-role='page'>
		<div data-role='header'  data-position='fixed'>
			<?php
				if(!isset($_GET['from'])){
					echo "<a href='../Finder.php' data-icon='arrow-l'>返回</a>";
				} else{
					echo "<a href='#' data-rel='back' data-ajax='false'>返回</a>";
				}
			?>
			<h1>朋友圈</h1>
			<?php
				if(!isset($_GET['from'])){
					echo "<a href='postTalk.php' data-role='button' data-rel='dialog' class='ui-btn-right' data-icon='star'>发表</a>";
				}
			?>
		</div>
		<div data-role='content' class='content'>
			<!-- 默认背景图片  仿效微信    这里要给这个图片一个点击事件  点击之后提示重设图片  -->
			<center><img src='../Images/kulou.jpg' width='100%' height='200px'/></center>
			<!-- 个人头像 -->
			<div id='UserLook'>
			<?php
				//这里将当前用户的 头像保存到隐藏表单中  利用JS使用
				if(getUserAddFromTsfuser($UserId)!="upload/images/defaultPhoto.jpg"){
					echo "<input type='hidden' id='UserAdd' value='../../".getUserAddFromTsfuser($UserId)."'/>";
				}else{
					echo "<input type='hidden' id='UserAdd' value='../Images/defaultlook.jpg' />";
				}
				//将用户的头像调取出来 如果没有设置过头像 就显示默认头像
				//建立查询  将头像调取出来
				$sql_get_userlook = "Select SFUserAdd from t_sfuser where SFUserId = $UserId";
				$arr_get_userlook = $sqlHelper->execute_dql2($sql_get_userlook);
				if(count($arr_get_userlook)!=0){
					$UserLook = $arr_get_userlook[0]['SFUserAdd'];//头像
					if($UserLook != "upload/images/defaultPhoto.jpg"){
						echo "<img src='../../".$UserLook."' width='80px' height='100px'/>";
					}else{
						echo "<img src='../Images/defaultlook.jpg' width='80px' height='100px'/>";
					}
				}
			?>
			</div><!-- UserLook -->
			<br/><br/>
			<!-- 朋友圈的动态      目前还没具体针对 一个会员的班级成员 而取  现在是将t_talk中的所有数据调取出来 -->
			<table border='0' width='340px' align='left'>
			<?php
				//调取说说和照片
				$sql_get_photoandtalk = "Select * from t_talk where SFUserId = $UserId order by TalkTime desc limit 0, 10";
				$arr_get_photoandtalk = $sqlHelper ->execute_dql2($sql_get_photoandtalk);
				if(count($arr_get_photoandtalk)!=0){
					for($i = 0 ; $i<count($arr_get_photoandtalk); $i++){
						echo "<tr id='TalkContent'>";
						if(getUserAddFromTsfuser($arr_get_photoandtalk[$i]['SFUserId'])!="upload/images/defaultPhoto.jpg"){
							echo "<td valign='top' width='2%'><img src='../../".getUserAddFromTsfuser($arr_get_photoandtalk[$i]['SFUserId'])."' width='30px' height='30px'/></td>";
						}else{
							echo "<td valign='top' width='2%'><img src='../Images/defaultlook.jpg' width='30px' height='30px'/></td>";
						}
						echo "<td width='10%'>".$arr_get_photoandtalk[$i]['TalkContent']."</td>";	
						echo "</tr>";
						echo "<tr><td colspan='2'>".date('m-d H:i',strtotime($arr_get_photoandtalk[$i]['TalkTime']))."</td></tr>";
						echo "<tr><td colspan='2'><hr color='#fff' width='100%'/></td></tr>";
					}
				} else {
					echo "<tr><td><font colot='red' size='5'>当前无动态</font></td></tr>";
				}
				if(count($arr_get_photoandtalk)!=0){
					echo "<tr id='GETMORETR'><td colspan='2'><a href='#' id='TalkMore' data-role='button'><span id='getMoreTalkInfor'>点击显示更多</span><span id='getMoreTalkLoad'></span></a></td></tr>";
				}
			?>
			
			</table>
		</div><!-- content -->
		<div data-role='footer' data-position='fixed'>
			<h1>copyright &copy; AZXUWEN 哈尔滨理工大学</h1>
		</div><!-- footer -->
	</div><!-- page -->
</body>
</html>