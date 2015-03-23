<!DOCTYPE html>
<html>
<head>
<title>供求信息</title>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="Css/jquery.mobile-1.0.1.min.css"
rel="Stylesheet" type="text/css" />
<script src="Js/jquery-1.6.4.js"
type="text/javascript"></script>
<script src='Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
<script>
$(document).ready(function(){
	$("#page1").live('pagecreate', function(){
		$("#getMoreInfors").click(function(){
			//计算出当前产品推介的数量 然后通过这个数量进行加载更多
        	var $InforCount = 0;
        	$("a[id='InforTitle']").each(function(){
            	$InforCount ++;//统计当前产品推介的数量
        	});
        	//下面通过ajax将之后的15条数据拿出来
        	$.ajax({
        		type:'post',
				url:'Control/Ajax/AjaxGetMoreInfors.php',
				dataType:'json',
				data:"InforCount="+$InforCount,
				success:function(json){
    				if(json!=""){
					for(var one in json){
						var str='<li data-theme="c" class="ui-btn ui-btn-up-c ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-count"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a class="ui-link-inherit" data-transition="flip" data-ajax="false" id="InforTitle"  href="Thing_Con.php?ThingId='+json[one]["InfoId"]+'"><h1 class="ui-li-heading">'+json[one]["InfoTitle"]+'...</h1></div></a><span class="ui-li-count ui-btn-up-c ui-btn-corner-all">'+json[one]["InfoRTime"]+'</div></span><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>';
						$(str).appendTo("#InforUL");
					}
    				}
    				if(json == 0){
        				$("#getMoreInfors").html('已经加载全部');
    				}
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
    				$(load).appendTo("#getMoreInforLoad");
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					$("#getMoreInforLoad").html('');
				}
            });
		});
	});
});
</script>
<script src="Js/jquery.mobile-1.0.1.js"
type="text/javascript"></script>
<link  href="Css/index.css" rel="Stylesheet" type="text/css" />
<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>
<body>
<div id='page1' data-role='page' >
<div data-role='header'  data-position='fixed'>
	<a href='index.php' data-transition='flip' data-icon='home' data-ajax='false'>主页</a>
<h1>供求信息</h1>
	<a href='Infors.php' data-icon='refresh' data-theme='a' data-ajax='false' class='ui-btn-right'>刷新</a>
</div>
<div data-role='content' class='content'>
<ul id='InforUL' data-role='listview' data-split-theme='d' data-split-icon='arrow-r' >
<?php
	session_start();
	require_once 'Control/SqlHelper.class.php';
	require_once 'Control/ComFunctions.php';
	$sqlHelper = new SqlHelper();
	//调取产品推介的标题
	$sql_get_infors = "Select InfoId, InfoTitle, InfoRTime,InfoType from t_information order by InfoOrder desc,InfoId desc Limit 0, 15 ";//调取前15条
	$arr_get_infors = $sqlHelper->execute_dql2($sql_get_infors);
	//通过表格输出产品推介的标题
	if(count($arr_get_infors)!=0){
		for($i = 0; $i<count($arr_get_infors); $i++){
			echo "<li data-theme='c'>";
			echo "<a data-transition='flip' data-ajax='false' id='InforTitle' href='Infor_Con.php?InforId=".$arr_get_infors[$i]['InfoId']."'><h1>".utf8Substr($arr_get_infors[$i]['InfoTitle'],0,16)."...</h1>";
			//echo  "<p>".utf8Substr($arr_get_things[$i]['ThingContent'], 0, 20)."</p>";
			echo  "<span class='ui-li-count'>".date('Y-m-d',strtotime($arr_get_infors[$i]['InfoRTime']))."</span>";
			echo "</a></li>";
		}
	}else{
		echo "<tr><td><font color='red' size='6'>暂无供求信息</font></td></tr>";
	}
?>
</ul>
<?php 
if(count($arr_get_infors)!=0){
	echo "<a href='#' id='getMoreInfors' data-role='button'><span id='getMoreInfors'>点击显示更多</span><span id='getMoreInforLoad'></span></a>";
}
?>
</div><!-- content -->

<?php require_once 'footer.php';?>
</div><!-- page -->
</body>
</html>