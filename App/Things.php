<!DOCTYPE html>
<html>
<head>
    <title>昔日趣事</title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.0.1.min.css" rel="Stylesheet" type="text/css" />
    <script src="Js/jquery-1.6.4.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.0.1.js" 
           type="text/javascript"></script>
    <script src="Js/ComFunctions.js" 
           type="text/javascript"></script>
    <link  href="Css/index.css" rel="Stylesheet" type="text/css" />
<script src='Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
    <script>
    	$(document).ready(function(){
        	$("#ThingMore").click(function(){
            	//计算出当前新闻公告的数量 然后通过这个数量进行加载更多
            	var $ThingCount = 0;
            	$("a[id='ThingTitle']").each(function(){
                	$ThingCount ++;//统计当前新闻公告的数量
            	});
            	//下面通过ajax将之后的20条数据拿出来
            	$.ajax({
            		type:'post',
    				url:'Control/Ajax/AjaxGetMoreThings.php',
    				dataType:'json',
    				data:"ThingCount="+$ThingCount,
    				success:function(json){
        				if(json!=0){
	    					for(var one in json){
	    						var str='<li data-theme="c" class="ui-btn ui-btn-up-c ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-count"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a class="ui-link-inherit" data-transition="flip" data-ajax="false" id="ThingTitle"  href="Thing_Con.php?ThingId='+json[one]["ThingId"]+'"><h1 class="ui-li-heading">'+json[one]["ThingTitle"]+'...</h1></div></a><span class="ui-li-count ui-btn-up-c ui-btn-corner-all">'+json[one]["ThingTime"]+'</div></span><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>';
	    						$(str).appendTo("#ThingUL");
	    					}
        				}
        				if(json == 0){
            				$("#getMoreThingInfor").html('已经加载全部');
        				}
    				},
    				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
    					var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
        				$(load).appendTo("#getMoreThingLoad");
    				},
    				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
    					$("#getMoreThingLoad").html('');
    				}
                });
        	});
    	});
    </script>
</head>
<body>
<div data-role='page'>
<div data-role='header' data-position='fixed'>
	<a href='index.php'  data-icon='home' data-ajax='false'>主页</a>
	<h1><center>昔日趣事</center></h1>
	<!-- 暂时不要这个更多了   <a href='#' id='headerMore' data-role='button' data-icon='plus'>更多</a> -->
	<a href='Things.php' data-icon='refresh' data-theme='a' data-ajax='false' class='ui-btn-right'>刷新</a>
</div>
		<div data-role='content' class='content'>
			<!-- 将新闻公告调出来 -->
			<div id='Things'>
			<ul id='ThingUL' data-role='listview' data-split-theme='d' data-split-icon='arrow-r'>
			<?php
			session_start();
			require_once 'Control/SqlHelper.class.php';
			require_once 'Control/AssPage.class.php';
			require_once 'Control/ComFunctions.php';
			$sqlHelper = new SqlHelper();
			$sql_get_things = "Select ThingId, ThingTitle,ThingContent, ThingTime from t_thing order by ThingOrder desc,ThingId desc Limit 0, 15";//调取前15条
			$arr_get_things = $sqlHelper->execute_dql2($sql_get_things);
			for($i=0; $i<count($arr_get_things); $i++){
				echo "<li data-theme='c'>";
				echo "<a data-transition='flip' data-ajax='false' id='ThingTitle' href='Thing_Con.php?ThingId=".$arr_get_things[$i]['ThingId']."'><h1>".utf8Substr($arr_get_things[$i]['ThingTitle'], 0, 16)."...</h1>";
				//echo  "<p>".utf8Substr($arr_get_things[$i]['ThingContent'], 0, 20)."</p>"; 
				echo  "<span class='ui-li-count'>".date('Y-m-d',strtotime($arr_get_things[$i]['ThingTime']))."</span>";
				echo "</a></li>";
			}
			?>
			</ul>
			</div>
			<a href='#' id='ThingMore' data-role='button'><span id='getMoreThingInfor'>点击显示更多</span><span id='getMoreThingLoad'></span></a>
		</div>

<?php require_once 'footer.php';?>
</div><!-- page -->
</body>
</html>