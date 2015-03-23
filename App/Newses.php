<!DOCTYPE html>
<html manifest="cache.manifest">
<head>
    <title>新闻公告</title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.0.1.min.css" 
           rel="Stylesheet" type="text/css" />
    <script src="Js/jquery-1.6.4.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.0.1.js" 
           type="text/javascript"></script>
    <script src="Js/ComFunctions.js" 
           type="text/javascript"></script>
    <link  href="Css/index.css" 
           rel="Stylesheet" type="text/css" />
	<script src='Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
	<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
    <script>
    	$(document).ready(function(){
        	$("#NewsMore").click(function(){
            	//计算出当前新闻公告的数量 然后通过这个数量进行加载更多
            	var $NewsCount = 0;
            	$("a[id='NewsTitle']").each(function(){
                	$NewsCount ++;//统计当前新闻公告的数量
            	});
            	//下面通过ajax将之后的20条数据拿出来
            	$.ajax({
            		type:'post',
    				url:'Control/Ajax/AjaxGetMoreNews.php',
    				dataType:'json',
    				data:"NewsCount="+$NewsCount,
    				success:function(json){
        				if(json!=""){
    					for(var one in json){
    						var str='<li data-theme="c" class="ui-btn ui-btn-up-c ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-count"><div class="ui-btn-inner ui-li"><div class="ui-btn-text"><a class="ui-link-inherit" data-transition="flip" data-ajax="false" id="NewsTitle"  href="News_Con.php?NewsId='+json[one]["NewsId"]+'"><h1 class="ui-li-heading">'+json[one]["NewsTitle"]+'...</h1></div></a><span class="ui-li-count ui-btn-up-c ui-btn-corner-all">'+json[one]["NewsAddTime"].substr(0, 10)+'</div></span><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>';
    						$(str).appendTo("#NewsUL");
    					}
        				}
        				if(json == 0){
            				$("#getMoreNewsInfor").html('已经加载全部');
        				}
    				},
    				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
    					var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
        				$(load).appendTo("#getMoreNewsLoad");
    				},
    				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
    					$("#getMoreNewsLoad").html('');
    				}
                });
        	});
        	//点击屏幕上方的更多
        	$("#headerMore").click(function(){
            	//这里希望能够将新闻公告的内容拿出来 做一个筛选     暂时先放到这里
       		  $(this).simpledialog({
                 'mode': 'bool',
                 'prompt': '确定删除吗?',//用户将要看到的对话框内容
                 'useModal': true,
                 'buttons': {//设置对话框中显示的按钮S  可以为多个  
                     '确定': {//第一个为 '确定'
                         click: function() {//这里为这个确定按钮的  click事件  并且通过{}括起来
                             var $delId = "li" + index;
								//alert(index);
                             $("#" + $delId).remove();
                         }
                     },
                     '取消': {//第二个为取消
                         click: function() {
                             //编写点击取消按钮事件
                         },
                         icon: "delete",//取消按钮的图标
                         theme: "c"//风格为c
                     }
                 }
              })
        	});
    	});
    </script>
</head>
<body>
<div data-role='header' data-position='fixed'>
	<a href='#' data-rel='back' data-icon='home' data-ajax='false'>主页</a>
	<h1><center>新闻公告</center></h1>
	<!-- 暂时不要这个更多了   <a href='#' id='headerMore' data-role='button' data-icon='plus'>更多</a> -->
	<a href='Newses.php' data-icon='refresh' data-theme='a' data-ajax='false' class='ui-btn-right'>刷新</a>
</div>
		<div data-role='content' class='content'>
			<!-- 将新闻公告调出来 -->
			<div id='Newes'>
			<ul id='NewsUL' data-role='listview' data-split-theme='d' data-split-icon='arrow-r'>
			<?php
			session_start();
			require_once 'Control/SqlHelper.class.php';
			require_once 'Control/ComFunctions.php';
			$sqlHelper = new SqlHelper();
			
			$sql_get_news = "Select NewsId,NewsContent, NewsTitle, NewsAddTime,NewsCategory,SFUserId From t_news order by NewsOrder desc,NewsId desc,NewsAddTime desc Limit 0, 15";
			$arr_get_news = $sqlHelper->execute_dql2($sql_get_news);
			for($i=0; $i<count($arr_get_news); $i++){
				echo "<li data-theme='c'>";
				echo "<a data-transition='flip' id='NewsTitle' data-ajax='false' href='News_Con.php?NewsId=".$arr_get_news[$i]['NewsId']."'><h1>".utf8Substr($arr_get_news[$i]['NewsTitle'], 0, 16)."...</h1>";
				//echo  "<p>".utf8Substr($arr_get_things[$i]['ThingContent'], 0, 20)."</p>";
				echo  "<span class='ui-li-count'>".date('Y-m-d',strtotime($arr_get_news[$i]['NewsAddTime']))."</span>";
				echo "</a></li>";
			}
			?>
			</table>
			</div>
			<?php 
				if(count($arr_get_news)!=0){
					echo "<a href='#' id='NewsMore' data-role='button'><span id='getMoreNewsInfor'>点击显示更多</span><span id='getMoreNewsLoad'></span></a>";
				}
			?>
		</div>

<?php require_once 'footer.php';?>
</body>
</html>