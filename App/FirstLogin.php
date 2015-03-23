<!-- 
	这里是介绍校友网的地方   但是通过手机进入不了这个页面 所以打算在注册完成的时候  跳入到这个页面 来介绍 
-->
<!DOCTYPE html>
<html>
<head>
    <title>jQuery Mobile 应用程序</title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.0.1.min.css" 
           rel="Stylesheet" type="text/css" />
    <script src="Js/jquery-1.6.4.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.0.1.js" 
           type="text/javascript"></script>
    <script src="Js/camera.min.js" 
           type="text/javascript"></script>
	<script src="Js/jquery.easing.1.3.js" 
           type="text/javascript"></script>
	<link  href="Css/camera.css" 
           rel="Stylesheet" type="text/css" />
    <script>
	    $(function() {
	        $('#camera_wrap_1').camera({
	                time: 1000,
	                thumbnails:false,
	                height:'100%'
	        })
	    });
    </script>
</head>
<body>
	<div id='page1' data-role='page'>
		<div data-role='header'  data-position='fixed'>
			<h1>校友网介绍</h1>
		</div>
		<div data-role='content' class='content'>
			<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
       <div data-thumb="Images/mark.jpg" 
            data-src="Images/mark.jpg">
         <div class="camera_caption fadeFromBottom">
          	 <em>校友网介绍1</em> 
         </div>
       </div>
       <div data-thumb="Images/jobs.jpg" 
            data-src="Images/jobs.jpg">
         <div class="camera_caption fadeFromBottom">
           	<em>校友网介绍2</em> 
         </div>
       </div>
     </div>
		</div>
		<div data-role='footer'  data-position='fixed'>
			<h1><a href='index.php' data-ajax='false' data-role='button'>直接进入校友网</a></h1>
		</div>
	</div>
</body>
</html>