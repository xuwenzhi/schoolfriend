<?php
session_start();
?>
<!DOCTYPE HTML>
<html manifest="cache.manifest">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<meta name="viewport" content="width=device-width" /> 
<script>
//这里用于检测服务器上是否有新版本出现，如果出现，则提示用户更新
var appCache = window.applicationCache;
//下面执行更新 会有一个询问是否更新的窗口
window.addEventListener('load', function(e) {
  window.applicationCache.addEventListener('updateready', function(e) {
    if (window.applicationCache.status == window.applicationCache.UPDATEREADY) {
     //更新本地缓存
      window.applicationCache.swapCache();
      if (confirm('已经有新数据了,是否加载新数据?')) {
        window.location.reload();
      }
    } else { 
    }
  }, false);
}, false);
</script>
<link  href="Css/jquery.mobile-1.0.1.min.css" rel="Stylesheet" type="text/css" />
<script src="Js/jquery-1.6.4.js" type="text/javascript"></script>
<script src="Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="Css/index.css" rel="Stylesheet" type="text/css" />
<script src='Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
<script>
//虽然已经对主页的导航grid进行了CSS的控制，但是如果针对屏幕很小，或者屏幕很大的设备，主页的链接按钮的大小还是无法得到具有弹性的变大或变小，所以这里对这个进行处理
$(document).ready(function(){
	var width = $(window).width();//屏幕宽度
	var height = $(window).height();//屏幕高度
	$("#index .ui-grid-a").css('margin',  '0 auto');//设置按钮外层的ui-grid居中
	$("#index .ui-bar a").css('margin', '0 auto ');  //设置链接按钮在不同块中保持居中
	//现在的目标是找到ui-grid-a 和ui-grid-a下的ui-block-a的样式 然后进行大小上的处理
	$("#index .ui-grid-a").css('width', width-40); //设置大块外层的宽度
	$("#index .ui-bar").css('width', (width-40)/2); //设置链接按钮的宽度
	$("#index .ui-bar a").css('width', (width-90)/2);//设置宽度
	//设定导航链接中的图片大小
	if((width-90)/2 < 60){
		$("#index .ui-bar a img").css('width', (width-90)/2-10);
	}
});
</script>
</head>
<body>
<div data-role='page' id='page1'>
<?php require_once 'header.php';?>
<div data-role='content' id='index'>
    <!--  主页要将校友网的所有信息类的东西展示  -->
    <div class='ui-grid-a'>
		<div class='ui-block-a'>
          <div class='ui-bar' style="width:100px;height:100px;">
			<a href='Newses.php' class='News' data-role='button' data-ajax='false' style="width:100px;height:100px;"> 
			<img src='Images/news_button.jpg' /><br/>
				新闻公告
			</a>
		  </div>
		</div>
		<div class='ui-block-b'>
		  <div class='ui-bar' style="width:100px;height:100px;">
			<a href='Products.php' class='Product' data-role='button' data-ajax='false' style="width:100px;height:100px;">
			<img src='Images/product_button.jpg' /><br/>
				产品推介
			</a>
		  </div>
		</div>
	</div>
    
    <div class='ui-grid-a'>
		<div class='ui-block-a'>
			<div class='ui-bar' style="width:100px;height:100px;" >
				<a href='Infors.php' class='Infor'  data-role='button' data-ajax='false' style="width:100px;height:100px;">
				<img src='Images/infor_button.jpg' /><br/>
					供求信息
				</a>
			</div>
		</div>
		<div class='ui-block-b'>
			<div class='ui-bar'  style="width:100px;height:100px;">
				<a href='Recuits.php' class='Recruit' data-role='button' data-ajax='false' style="width:100px;height:100px;">
				<img src='Images/recruit_button.jpg' /><br/>
					招聘应聘
				</a>
			</div>
		</div>
	</div>
    <div class='ui-grid-a'>
		<div class='ui-block-a'>
			<div class='ui-bar' style="width:100px;height:100px;">
				<a href='Things.php' class='Thing' data-role='button' data-ajax='false' style="width:100px;height:100px;">
				<img src='Images/thing_button.jpg' /><br/>
					昔日趣事
				</a>
			</div>
		</div>
		<div class='ui-block-b'>
			<div class='ui-bar' style="width:100px;height:100px;">
				<a href='Miens.php' class='Miens' data-role='button' data-ajax='false' style="width:100px;height:100px;">
				<img src='Images/mien_button.jpg' /><br/>
					今昔风采
				</a>
			</div>
		</div><!--ui-block-b-->
    </div><!--ui-grid-a-->
</div><!-- content-->
<?php require_once 'footer.php';?>
</div>
</body>
</html>
