<?php
session_start();
	//获取今昔风采的类别  即校友风采 什么老照片之类的
require_once 'Control/SqlHelper.class.php';
require_once 'Control/ComFunctions.php';
$sqlHelper = new SqlHelper();
$arr_get_CodeName_from_mien = getCodeNameFromt_basecode(6); //获取到今昔风采的分类
?>
<!DOCTYPE html>
<html>
<head>
    <title>今昔风采</title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.0.1.min.css" rel="Stylesheet" type="text/css" />
    <script src="Js/jquery-1.6.4.js" type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
    <link  href="Css/PicSwift.css" rel="Stylesheet" type="text/css" />
    
    <script type="text/javascript">
    $(function() {
        //这里获取设备屏幕的宽度
        var Width = $(window).width();
        //下面将各个图片的外层的li  ul  iframe 的宽度进行处理
        $(".ifrswipt0").css('width', Width-40);//设定最外层div的宽度
        $(".ifrswipt0 .inner0").css('width', Width-40);//设定第二外层div的宽度
        $(".ifrswipt0 li").css('width', Width-40);//设定每个图片外围的li的宽度
        $(".ifrswipt0 li .imgswipt0").css('width', Width-46);
        //这里先对每一个图片进行一个遍历  然后对图片的尺寸进行一下处理
        $(".ifrswipt0 li .imgswipt0").each(function(){
            if(parseInt($(this).css('height'))>300){
                $(this).css('height', 350);
                $(this).animate({top:-80}, 'slow');
            }
        });
        
          // 全局命名空间
		  var picNum = $('.imgswipt0').length;
		var swiptimg = {
			$index: 0,
			$width: Width-10,
			$swipt: 0,
			$length: 0
		}
		swiptimg['$length'] = picNum;	
		var $imgul = $("#ifrswipt0");
		//遍历每一个图片
		$(".imgswipt0").each(function() {
	   		$(this).swipeleft(function() {
		        if (swiptimg.$index < swiptimg.$length-1) {
		            swiptimg.$index++;
		            swiptimg.$swipt = -swiptimg.$index * swiptimg.$width;
		            $imgul.animate({ left: swiptimg.$swipt }, "slow");
		        }else{
			        //如果加载到当前图片的最后一张，那现在就应该到服务器上去加载图片
			        /*
		        	var imgCount = $('.imgswipt0').length;
		        	var imgType = 36;
		        	var ajaxImgInfor = imgType+"-"+imgCount;
		        	$.ajax({
		    			type:'post',
		    			url:'Control/Ajax/AjaxGetMorePhoto.php',
		    			data:'ajaxImgInfor='+ajaxImgInfor,
		    			dataType:'json',
		    			success:function(json){
			    			if(json == '0'){
				    			alert('已经没有照片了');
			    			}else{
			    				for(var one in json){
					    			var str = "<li id='BigPicLi'><a id='BigPic' href='#BigPic'><img src='../"+json[one]['PhotoAdd']+"' class='imgswipt0' title='title'/></a><p class='PhotoPresent'>"+json[one]['PhotoPresent']+"</p></li>";
						    		$(str).appendTo('#ifrswipt0');
			    				}
			    			}
		    			},
		    			beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
		    			/*	alert('正在加载');
		    			},
		    			complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
		    				//$("#getMoreNewsLoad").html('');
		    			/*}
		    		});*/
		        }
	   		}).swiperight(function() {
		        if (swiptimg.$index > 0) {
		           swiptimg.$index --;
				   swiptimg.$swipt = -swiptimg.$index*swiptimg.$width;
				   $imgul.animate({left: swiptimg.$swipt}, "slow");
		        }
	    	})
		})  //$(".imgswipt").each(function()
	})//function
	$(function() {
		 //这里获取设备屏幕的宽度
        var Width = $(window).width();
        //下面将各个图片的外层的li  ul  iframe 的宽度进行处理
        $(".ifrswipt1").css('width', Width-40);//设定最外层div的宽度
        $(".ifrswipt1 .inner1").css('width', Width-40);//设定第二外层div的宽度
        $(".ifrswipt1 li").css('width', Width-40);//设定每个图片外围的li的宽度
        $(".ifrswipt1 li .imgswipt1").css('width', Width-46);
        //这里先对每一个图片进行一个遍历  然后对图片的尺寸进行一下处理
        $(".ifrswipt1 li .imgswipt1").each(function(){            
            if(parseInt($(this).css('height'))>300){
                $(this).css('height', 350);
                $(this).animate({top:-80}, 'slow');
            }
        });
	   // 全局命名空间
		  var picNum = $('.imgswipt1').length;
		var swiptimg = {
			$index: 0,
			$width: Width-10,
			$swipt: 0,
			$length: 0
		}
		swiptimg['$length'] = picNum;	
		var $imgul = $("#ifrswipt1");
		$(".imgswipt1").each(function() {
	   		$(this).swipeleft(function() {
		        if (swiptimg.$index < swiptimg.$length-1) {
		            swiptimg.$index++;
		            swiptimg.$swipt = -swiptimg.$index * swiptimg.$width;
		            $imgul.animate({ left: swiptimg.$swipt }, "slow");
		        }
	   		}).swiperight(function() {
		        if (swiptimg.$index > 0) {
		           swiptimg.$index --;
				   swiptimg.$swipt = -swiptimg.$index*swiptimg.$width;
				   $imgul.animate({left: swiptimg.$swipt}, "slow");
		        }
	    	})
		})  //$(".imgswipt").each(function()
	})//function
	
	
	$(function() {
		//这里获取设备屏幕的宽度
        var Width = $(window).width();
        //下面将各个图片的外层的li  ul  iframe 的宽度进行处理
        $(".ifrswipt2").css('width', Width-40);//设定最外层div的宽度
        $(".ifrswipt2 .inner2").css('width', Width-40);//设定第二外层div的宽度
        $(".ifrswipt2 li").css('width', Width-40);//设定每个图片外围的li的宽度
        $(".ifrswipt2 li .imgswipt2").css('width', Width-46);
        //这里先对每一个图片进行一个遍历  然后对图片的尺寸进行一下处理
        $(".ifrswipt2 li .imgswipt2").each(function(){
            if(parseInt($(this).css('height'))>300){
                $(this).css('height', 350);
                $(this).animate({top:-80}, 'slow');
            }
        });
	   // 全局命名空间
		  var picNum = $('.imgswipt2').length;
		var swiptimg = {
			$index: 0,
			$width: Width-10,
			$swipt: 0,
			$length: 0
		}
		swiptimg['$length'] = picNum;	
		var $imgul = $("#ifrswipt2");
		$(".imgswipt2").each(function() {
			//选定图片的左滑动事件
	   		$(this).swipeleft(function() {
		        if (swiptimg.$index < swiptimg.$length-1) {
		            swiptimg.$index++;
		            swiptimg.$swipt = -swiptimg.$index * swiptimg.$width;
		            $imgul.animate({ left: swiptimg.$swipt }, "slow");
		        }
	   		}).swiperight(function() {
		        if (swiptimg.$index > 0) {
		           swiptimg.$index --;
				   swiptimg.$swipt = -swiptimg.$index*swiptimg.$width;
				   $imgul.animate({left: swiptimg.$swipt}, "slow");
		        }
	    	})
		})  //$(".imgswipt").each(function()
	})//function
	
	
	$(function() {
		//这里获取设备屏幕的宽度
        var Width = $(window).width();
        //下面将各个图片的外层的li  ul  iframe 的宽度进行处理
        $(".ifrswipt3").css('width', Width-40);//设定最外层div的宽度
        $(".ifrswipt3 .inner3").css('width', Width-40);//设定第二外层div的宽度
        $(".ifrswipt3 li").css('width', Width-40);//设定每个图片外围的li的宽度
        $(".ifrswipt3 li .imgswipt3").css('width', Width-46);
        //这里先对每一个图片进行一个遍历  然后对图片的尺寸进行一下处理
        $(".ifrswipt3 li .imgswipt3").each(function(){
            if(parseInt($(this).css('height'))>300){
                $(this).css('height', 350);
                $(this).animate({top:-80}, 'slow');
            }
        });
	   // 全局命名空间
		  var picNum = $('.imgswipt3').length;		 
		var swiptimg = {
			$index: 0,
			$width: Width-10,
			$swipt: 0,
			$length: 0
		}
		swiptimg['$length'] = picNum;	
		var $imgul = $("#ifrswipt3");
		$(".imgswipt3").each(function() {
	   		$(this).swipeleft(function() {
		        if (swiptimg.$index < swiptimg.$length-1) {
		            swiptimg.$index++;
		            swiptimg.$swipt = -swiptimg.$index * swiptimg.$width;
		            $imgul.animate({ left: swiptimg.$swipt }, "slow");
		        }
	   		}).swiperight(function() {
		        if (swiptimg.$index > 0) {
		           swiptimg.$index --;
				   swiptimg.$swipt = -swiptimg.$index*swiptimg.$width;
				   $imgul.animate({left: swiptimg.$swipt}, "slow");
		        }
	    	})
		})  //$(".imgswipt").each(function()
	})//function
	$(function() {
		//这里获取设备屏幕的宽度
        var Width = $(window).width();
        //下面将各个图片的外层的li  ul  iframe 的宽度进行处理
        $(".ifrswipt4").css('width', Width-40);//设定最外层div的宽度
        $(".ifrswipt4 .inner1").css('width', Width-40);//设定第二外层div的宽度
        $(".ifrswipt4 li").css('width', Width-40);//设定每个图片外围的li的宽度
        $(".ifrswipt4 li .imgswipt4").css('width', Width-46);
        //这里先对每一个图片进行一个遍历  然后对图片的尺寸进行一下处理
        $(".ifrswipt4 li .imgswipt4").each(function(){
            if(parseInt($(this).css('height'))>300){
                $(this).css('height', 350);
                $(this).animate({top:-80}, 'slow');
            }
        });
	   // 全局命名空间
		  var picNum = $('.imgswipt4').length;
		var swiptimg = {
			$index: 0,
			$width: Width,
			$swipt: 0,
			$length: 0
		}
		swiptimg['$length'] = picNum;	
		var $imgul = $("#ifrswipt4");
		$(".imgswipt4").each(function() {
	   		$(this).swipeleft(function() {
		        if (swiptimg.$index < swiptimg.$length-1) {
		            swiptimg.$index++;
		            swiptimg.$swipt = -swiptimg.$index * swiptimg.$width;
		            $imgul.animate({ left: swiptimg.$swipt }, "slow");
		        }
	   		}).swiperight(function() {
		        if (swiptimg.$index > 0) {
		           swiptimg.$index --;
				   swiptimg.$swipt = -swiptimg.$index*swiptimg.$width;
				   $imgul.animate({left: swiptimg.$swipt}, "slow");
		        }
	    	})
		})  //$(".imgswipt").each(function()
	})//function

</script>
    <script src='Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
    <script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>
<body>
	<div data-role='page'>
		<div data-role='header'  data-position='fixed'>
		<a href='index.php'  data-icon='home' data-ajax='false'>主页</a>
			<h1>今昔风采</h1>
		<a href='Miens.php' data-icon='refresh' data-theme='a' data-ajax='false' class='ui-btn-right'>刷新</a>
		
		</div><!-- header -->
		<div data-role='content' class='content'>
          <ul id='PhotoTypeUl' data-role='listview'>
			<?php
				if(count($arr_get_CodeName_from_mien)!=0){
					for($i = 0; $i<count($arr_get_CodeName_from_mien); $i++){
						if($i == 0){
							echo "<li data-role='divider'><center>".$arr_get_CodeName_from_mien[$i]['CodeName'].""."</center><span class='ui-li-count'><a href='Mien_Con.php?Mien_id=".$arr_get_CodeName_from_mien[$i]['CodeId']."' data-ajax='false'>更多>></a></span></li>";
						}else{
							echo "<li data-role='divider'><center>".$arr_get_CodeName_from_mien[$i]['CodeName'].""."</center><span class='ui-li-count'><a href='Mien_Con.php?Mien_id=".$arr_get_CodeName_from_mien[$i]['CodeId']."' data-ajax='false'>更多>></a></span></li>";
						}
						//这里根据图片的类别来将图片拿出来
						$sql_get_photo_by_codeid = "Select * from t_photo where PhotoType = ".$arr_get_CodeName_from_mien[$i]['CodeId']." order by PhotoTime desc limit 0, 10";
						$arr_get_photo_by_codeid = $sqlHelper->execute_dql2($sql_get_photo_by_codeid);
						if(count($arr_get_photo_by_codeid) != 0){
							//下面通过循环来将图片输出
							/* 
							 *这里耍了点小聪明 ， 因为有三类 所以如果通过手指滑动来切换图片的话 
							 *JS 只能响应第一类图片的效果 其他类的图片是没有效果的 
							 *所以这里通过循环来控制下面的两个div 的类选择器后面加了个 $i
							 *这样就需要些每一类图片的JS事件 和 CSs样式  
							 *不过会有隐患 如果后期加入了很多类的图片
							 *其他类的图片也不会有效果了
							 *所以这里真的是个隐患 
							 *我在这里先预先的填几个类的JS事件 和CSS样式
							 */
							echo "<div class='ifrswipt".$i."' >";
							echo "<div class='inner".$i."'>";
							echo "<ul id='ifrswipt".$i."'>";
							for($j = 0; $j<count($arr_get_photo_by_codeid); $j++){
								echo "<li id='BigPicLi'><a id='BigPic' href='#BigPic'><img src='../".$arr_get_photo_by_codeid[$j]['PhotoAdd']."' class='imgswipt".$i."' title='".strip_tags($arr_get_photo_by_codeid[$j]['PhotoPresent'])."'/></a><p class='PhotoPresent'>".$arr_get_photo_by_codeid[$j]['PhotoPresent']."</p></li>";
							}
							echo "</ul>";
							echo "</div>";
							echo "</div>";
						}else{
							echo $arr_get_CodeName_from_mien[$i]['CodeName']."暂无照片";
						}
					}
				}else{
					echo "<li>抱歉，暂无照片</li>";
				}
			?>

          </ul>
		</div><!-- content -->
		<?php require_once 'footer.php';?>
	</div><!-- page -->
</body>
</html>