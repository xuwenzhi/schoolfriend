<?php
session_start();
if(!isset($_SESSION['USERID']) || !isset($_SESSION['USER'])){
	echo '<script> alert("您还未登录"); location.replace("../Login.php")</script>';
}
require_once '../Control/SqlHelper.class.php';
require_once '../Control/ComFunctions.php';
$sqlHelper = new SqlHelper();
//获取到班级ID
if(isset($_GET['ClassId'])){
	$ClassId = $_GET['ClassId'];
}else{
	echo '<script> alert("您还未登录"); location.replace("Login.php")</script>';
}
//将班级信息调取出来
$sql_get_class_infor = "Select * from t_class where ClassId = $ClassId";
$arr_get_class_infor = $sqlHelper->execute_dql2($sql_get_class_infor);
if(count($arr_get_class_infor)<1){
	echo '<script> alert("信息加载出错，请重试"); location.replace("Login.php")</script>';
}else{
	//下面将班级的信息拿到  存入变量中
	$ClassName = $arr_get_class_infor[0]['ClassName'];//班级名称
	$SchoolName = getSchoolNameById($arr_get_class_infor[0]['SchoolId']);//学校名称
	$ClassGoTime = $arr_get_class_infor[0]['GoSTime'];//入学年份
	$CollegeName = $arr_get_class_infor[0]['CollegeName'];//所属学院
	$MajorName = $arr_get_class_infor[0]['MajorName'];//所属系
	$ClassCDate = $arr_get_class_infor[0]['ClassCDate'];//创建时间
	$ClassContent = $arr_get_class_infor[0]['ClassContent'];//班级介绍
	$ClassCreateUser = getUserFromTsfuser($arr_get_class_infor[0]['SFUserId']);//创建人
	$ClassCreateUserId = $arr_get_class_infor[0]['SFUserId'];//创建人ID也就是班级管理员
	$ClassCreateUserAdd = getUserAddFromTsfuser($ClassCreateUserId);
	
	$judgeUserBelongClass = judgeUserBelongClass($_SESSION['USERID'], $ClassId);//该变量用于辨认该用户是否加入或者关注了该班级
	
	if(isset($_GET['ClassType'])){
		$ClassType = $_GET['ClassType'];
	}else{
		$ClassType = "";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $ClassName."-----------".$SchoolName;?></title><!-- 标题样式   班级名称----------学校名称 -->
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="../Css/jquery.mobile-1.0.1.min.css"  rel="Stylesheet" type="text/css" />
<script src="../Js/jquery-1.6.4.js"  type="text/javascript"></script>
<script src="../Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="../Css/index.css" rel="Stylesheet" type="text/css" />
<script src='../Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
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

</head>
<body>
<div data-role='page'>
<div data-role='header' data-position='fixed'>
	<a href='#' data-rel='back' data-icon='arrow-l' data-ajax='false'>返回</a>
	<h1><center><?php echo $ClassName; ?></center></h1>
	<?php
		if($judgeUserBelongClass){
			if($ClassType == 'join'){
				echo "<a href='ClassJoinDialog.php?ClassType=join&ClassId=".$ClassId."' data-icon='plus' data-theme='a' data-transition='slidedown' class='ui-btn-right'>更多</a>";
			}else{
				echo "<a href='ClassJoinDialog.php?ClassType=attention&ClassId=".$ClassId."' data-icon='plus' data-theme='a' data-transition='slidedown' class='ui-btn-right'>更多</a>";
			}
		} else{
			echo "<a href='ClassJoinDialog.php' data-icon='plus' data-theme='a' class='ui-btn-right'>加入/关注</a>";
		}
	?>
</div>
		<div data-role='content' class='content'>
			<div id='ClassInfor'>
			<?php
				echo "<b>所属学校:</b>　";
				echo $SchoolName."";
				echo "<br/><b>所属学院:</b>　";
				if($CollegeName!=""){
					echo $CollegeName;
				}else{
					echo "未填写";
				}
				echo "<br/><b>所属系:</b>　";
				if($MajorName !=""){
					echo $MajorName;
				}else{
					echo "未填写";
				}
				echo "<br/><b>入学年份:</b>　";
				echo $ClassGoTime;
				echo "<br/><b>班级创建人:</b>　";
				echo $ClassCreateUser;
				echo "<br/><b>班级创建时间:</b>　";
				echo $ClassCDate."<br/>";
				echo "<hr width='100%'/>";
				//这里应该做一个判断 如果该用户没有加入这个班级或者关注这个班级 只可以看到班级信息 无法查看 班级的成员 
				if($judgeUserBelongClass){
					echo "<ul data-role='listview' data-inset=true>";
					echo "<li data-role='list-divider'>班级成员</li>";
					//下面将班级中的成员拿出来
					$sql_get_classmember = "Select SFUserId,SFUserAdd, SFUserTrueName from t_sfuser where locate('".$ClassId."', ClassID)<>0 and SFUserId <> $ClassCreateUserId";
					$arr_get_classmember = $sqlHelper->execute_dql2($sql_get_classmember);
					if(count($arr_get_classmember) != 0){
						if($ClassCreateUserAdd == 'upload/images/defaultPhoto.jpg'){
						echo "<li data-theme='c'><a data-ajax='false' href='../Finder/FriendCircle.php?from=class&UserId=".$ClassCreateUserId."' data-transition='flip'><img src='../../".$ClassCreateUserAdd."' width='70px' height='70px'>".$ClassCreateUser."(班级管理员)</a></li>";
						}else{
							echo "<li data-theme='c'><a data-ajax='false' href='../Finder/FriendCircle.php?from=class&UserId=".$ClassCreateUserId."' data-transition='flip'><img src='../Images/defaultlook.jpg' width='70px' height='70px'>".$ClassCreateUser."(班级管理员)</a></li>";
						}
						for($i =0 ; $i < count($arr_get_classmember); $i++){
							//如果没有真实头像 就还上个默认头像
							if($arr_get_classmember[$i]['SFUserAdd']!="upload/images/defaultPhoto.jpg"){
								echo "<li data-theme='c'><a data-ajax='false' href='../Finder/FriendCircle.php?from=class&UserId=".$arr_get_classmember[$i]['SFUserId']."' data-transition='flip'><img src='../../".$arr_get_classmember[$i]['SFUserAdd']."' width='70px' height='70px'>".$arr_get_classmember[$i]['SFUserTrueName']."</a></li>";
							}else{
								echo "<li data-theme='c'><a data-ajax='false' href='../Finder/FriendCircle.php?from=class&UserId=".$arr_get_classmember[$i]['SFUserId']."' data-transition='flip'><img src='../Images/defaultlook.jpg' width='70px' height='70px'>".$arr_get_classmember[$i]['SFUserTrueName']."</a></li>";
							}
						}
					}else{
						echo $ClassName."暂无成员";
					}
					echo "</ul>";
					//关注的成员拿出来？
					$sql_get_classfuns = "Select SFUserAdd,SFUserId, SFUserTrueName from t_sfuser where locate('".$ClassId."', ClassFriendId)<>0";
					$arr_get_classfuns = $sqlHelper->execute_dql2($sql_get_classfuns);
					echo "<ul data-role='listview' data-inset=true>";
					echo "<li data-role='list-divider'>关注班级校友</li>";
					if(count($arr_get_classfuns) != 0){
						for($i =0 ; $i < count($arr_get_classfuns); $i++){
							if($arr_get_classfuns[$i]['SFUserAdd']!="upload/images/defaultPhoto.jpg"){
								echo "<li data-theme='c'><a data-ajax='false' href='../Finder/FriendCircle.php?from=class&UserId=".$arr_get_classfuns[$i]['SFUserId']."' data-transition='flip'><img src='../../".$arr_get_classfuns[$i]['SFUserAdd']."' width='70px' height='70px'>".$arr_get_classfuns[$i]['SFUserTrueName']."</a></li>";
							}else{
								echo "<li data-theme='c'><a data-ajax='false' href='../Finder/FriendCircle.php?from=class&UserId=".$arr_get_classfuns[$i]['SFUserId']."' data-transition='flip'><img src='../Images/defaultlook.jpg' width='70px' height='70px'>".$arr_get_classfuns[$i]['SFUserTrueName']."</a></li>";
							}
						}
					}else{
						echo "暂无校友关注".$ClassName;
					}
					echo "</ul>";
				}else{
					echo "您还未加入或者关注该班级，无法查看班级成员，您可以通过右上角的按钮申请加入。";
				}
			?>
			</div>
			
		</div><!-- content -->
		<div data-role='footer' data-position='fixed'>
				<h1>copyright &copy; AZXUWEN 哈尔滨理工大学</h1>
			</div><!-- footer -->
</div><!-- page -->
</body>
</html>