<!DOCTYPE html>
<html>
<head>
    <title>热点招聘</title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="../Css/jquery.mobile-1.0.1.min.css"  rel="Stylesheet" type="text/css" />
<script src="../Js/jquery-1.6.4.js"  type="text/javascript"></script>
<script src="../Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="../Css/index.css" rel="Stylesheet" type="text/css" />
<link href="../Css/jquery-webox.css" rel="stylesheet" type="text/css">
<script src="../Js/jquery-webox.js"></script>
<script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>
<body>
<div data-role='page'>
<div data-role='header' data-position='fixed'>
	<a href='#' data-rel='back' data-icon='arrow-l' data-ajax='false'>返回</a>
	<h1><center>热点招聘</center></h1>
	<!-- 暂时不要这个更多了   <a href='#' id='headerMore' data-role='button' data-icon='plus'>更多</a> -->
	<a href='hotRecruits.php' data-icon='refresh' data-theme='a' data-ajax='false' class='ui-btn-right'>刷新</a>
</div>
		<div data-role='content' class='content'>
			<div id='Newes'>
			<ul id='NewsUL' data-role='listview' data-split-theme='d' data-split-icon='arrow-r'>
			<?php
			session_start();
			require_once '../Control/SqlHelper.class.php';
			require_once '../Control/ComFunctions.php';
			$sqlHelper = new SqlHelper();
			//取得最近3天的数据 按照浏览量和置顶来取
			$sql_get_recurits = "Select RecruitId, RecruitTitle, RecruitTime From t_recruit where TO_DAYS(NOW()) - TO_DAYS(RecruitTime) <= 3  order by RecruitOrder desc,RecruitId desc Limit 0, 5";
			$arr_get_recruits = $sqlHelper->execute_dql2($sql_get_recurits);
			if(count($arr_get_recruits)!=0){
				for($i=0; $i<count($arr_get_recruits); $i++){
				echo "<li>";
				echo "<a data-transition='flip' data-ajax='false' id='RecruitTitle' href='../Recruit_Con.php?RecruitId=".$arr_get_recruits[$i]['RecruitId']."'><h1>".utf8Substr($arr_get_recruits[$i]['RecruitTitle'], 0, 16)."...</h1>";
				echo  "<span class='ui-li-count'>".date('Y-m-d',strtotime($arr_get_recruits[$i]['RecruitTime']))."</span>";
				echo "</a></li>";
				}
			}else{
				echo "<li><center>暂无最近3天的热点招聘,敬请期待</center></li>";
			}
			?>
			</table>
			</div>
		</div>
		<div data-role='footer' data-position='fixed'>
				<h1>copyright &copy; AZXUWEN 哈尔滨理工大学</h1>
		</div><!-- footer -->
</div>
</body>
</html>