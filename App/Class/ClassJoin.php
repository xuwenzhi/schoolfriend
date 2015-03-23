<?php
session_start();
if(!isset($_SESSION['USERID']) || !isset($_SESSION['USER'])){
	echo '<script> alert("您还未登录"); location.replace("../Login.php")</script>';
}
require_once '../Control/SqlHelper.class.php';
require_once '../Control/ComFunctions.php';
$sqlHelper = new SqlHelper();
if(isset($_GET['ClassJoinType'])){
	$ClassJoinType = $_GET['ClassJoinType'];
} else{
	echo '<script> alert("信息加载出错，请重试..."); location.replace("../Login.php")</script>';
}

$arr_get_provinces = getProvinces(); //获取省份数组
$arr_years = getYears(62, 0);//获取年份

?>
<!DOCTYPE html>
<html>
<head>
<title>
    <?php if($ClassJoinType == 'join'){
    	echo "加入班级";
    }else if($ClassJoinType == 'attention'){
    	echo "关注班级";
    }
    ?>
</title>
<meta name="viewport" content="width=device-width" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="../Css/jquery.mobile-1.0.1.min.css"  rel="Stylesheet" type="text/css" />
<script src="../Js/jquery-1.6.4.js"  type="text/javascript"></script>
<script>
    //省份的改变事件
    function changeProvince(){
        var ProvinceId = $("#Province").val();//获取到选择的省份的ID
        //将之前的大学清空
        var School =  document.getElementById('School');
        School.length = 0;
        //下面通过ajax来通过省份来获取学校
        $.ajax({
			type:'post',
			url:'../Control/Ajax/AjaxGetSchoolByProvince.php',
			data:'ProvinceId='+ProvinceId,
			dataType:'json',
			success:function(json){
				if(json != '0'){
					var selectFirstOption = '<option value="0">请选择下列大学</option>';
					$(selectFirstOption).appendTo('#School');
					for(var one in json){
						var str='<option value='+json[one]["SchoolId"]+'>'+json[one]["SchoolName"]+'</option>';
						$(str).appendTo("#School");
					}
				}
				else{
					alert('获取失败');
				}
			},
			beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
				//var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
				//$(load).appendTo("#getMoreNewsLoad");
			},
			complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
				//$("#getMoreNewsLoad").html('');
			}
		});
    }
    //选择完年份 就应该开始调这个学校 这一年的所有班级了
    function getClass(){
        var SchoolId = $("#School").val();  //学校ID
        var Year = $("#Year").val();//年份
        //下面将这个学校这一年 所有的班级调取出来
        var JoinClassId = SchoolId+"-"+Year;
        //清空当前班级信息
        document.getElementById('Class').length = 0;
        //下面通过ajax来通过学校和年份来获取班级
        $.ajax({
			type:'post',
			url:'../Control/Ajax/AjaxGetClass.php',
			data:'JoinClassId='+JoinClassId,
			dataType:'json',
			success:function(json){
				if(json != '0'){
					for(var one in json){
						var str='<option value='+json[one]["ClassId"]+'>'+json[one]["ClassName"]+'</option>';
						$(str).appendTo("#Class");
					}
					//如果加载完成了 将查看班级信息 和加入或者关注的信息 加入DOM中
					$("#JoinClass").slideDown('fast');
				}
				else{
					//alert('获取失败');
					var str = "<option value=''>此年度该学校无任何班级</option>";
					$(str).appendTo('#Class');
				}
			},
			beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
				//var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
				//$(load).appendTo("#getMoreNewsLoad");
			},
			complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
				//$("#getMoreNewsLoad").html('');
			}
		});
    }
    function CheckClassInfor(){
          //当点击了查看班级信息后  
          var ClassId = $("#Class").val();
          //将用户要看的班级 获取到 
          //window.location.href = 'Class_Con.php?ClassId='+ClassId;
          $.mobile.changePage("Class_Con.php?ClassId="+ClassId,{ },"flip", false, false);
         
    }
    //处理点击加入班级
    function JoinClass(){
        //获取班级ID
        var ClassId = $("#Class").val();
        //下面通过ajax来将加入处理
        $.ajax({
			type:'post',
			url:'../Control/Ajax/AjaxJoinClass.php',
			data:'ClassId='+ClassId,
			dataType:'text',
			success:function(data){
				if(data == 'ClassIDRepeat'){
					$("#JoinORAttentionClassResult").html('<font color="red" size="3">您之前已经加入此班级了，无需重复加入...</font>');
				}else if(data == 'ClassFriendIDRepeat'){
					$("#JoinORAttentionClassResult").html('<font color="red" size="3">您已经关注了该班级，一个班级只能存在加入或者班级一项操作...</font>');
				}else if(data == 'OK'){
					$("#JoinORAttentionClassResult").html('<font color="red" size="3">加入班级成功...</font>');
				}else{
					$("#JoinORAttentionClassResult").html('<font color="red" size="3">加入班级失败，请重试...</font>');
				}
			},
			beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
				//var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
				//$(load).appendTo("#getMoreNewsLoad");
			},
			complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
				//$("#getMoreNewsLoad").html('');
			}
		});
    }
    function AttentionClass(){
    	//获取班级ID
        var ClassFriendId = $("#Class").val();
        //下面通过ajax来将关注处理
        $.ajax({
			type:'post',
			url:'../Control/Ajax/AjaxAttentionClass.php',
			data:'ClassFriendId='+ClassFriendId,
			dataType:'text',
			success:function(data){
				if(data == 'ClassFriendIDRepeat'){
					$("#JoinORAttentionClassResult").html('<font color="red" size="3">您之前已经关注此班级了，无需重复加入...</font>');
				}else if(data == 'ClassIDRepeat'){
					$("#JoinORAttentionClassResult").html('<font color="red" size="3">您已经加入了该班级，一个班级只能存在加入或者班级一项操作...</font>');
				}else if(data == 'OK'){
					$("#JoinORAttentionClassResult").html('<font color="red" size="3">关注班级成功...</font>');
				}else{
					$("#JoinORAttentionClassResult").html('<font color="red" size="3">关注班级失败，请重试...</font>');
				}
			},
			beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
				//var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
				//$(load).appendTo("#getMoreNewsLoad");
			},
			complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
				//$("#getMoreNewsLoad").html('');
			}
		});
    }
</script>
<script src="../Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="../Css/index.css" rel="Stylesheet" type="text/css" />
<script src="../Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='../Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>
<body>
<div data-role='page'>
<div data-role='header' data-position='fixed'>
	<a href='#' data-rel='back' data-icon='arrow-l' data-ajax='false'>返回</a>
	<h1><center>
		<?php 
			if($ClassJoinType == 'join'){
	    		echo "加入班级";
		    }else if($ClassJoinType == 'attention'){
		    	echo "关注班级";
		    }
   		 ?>
	</center></h1>
</div>
		<div data-role='content' class='content'>
			<?php
					//好几级联动  1省份  2大学  3年份  4 班级
					echo "<fieldset data-role='controlgroup'>";
					echo "<select id='Province'  onchange='changeProvince()'>";
					for($i = 0; $i<count($arr_get_provinces); $i++){
						echo "<option value='".$arr_get_provinces[$i]['CityId']."'>".$arr_get_provinces[$i]['CityName']."</option>";
					}
					echo "</select>";
					echo "<select id='School'>";
						echo "<option value='88888'>大学</option>";
					echo "</select>";
					echo "<select id='Year' onchange='getClass()'>";
					echo $arr_years[0];
					echo "<option value=''>入学年份</option>";
					for($i = 0; $i<count($arr_years); $i++){
						echo "<option value='".$arr_years[$i]."'>".$arr_years[$i]."</option>";
					}
					echo "</select>";
					echo "<select id='Class'>";
					echo "<option value=''>班级</option>";
					echo "</select>";
					echo "</fieldset>";

				echo "<div id='JoinORAttentionClassResult'></div>";//这里用于显示用户点击加入班级后的结果
				echo "<fieldset id='JoinClass' style='margin:0;display:none;position:absolute;' data-role='controlgroup' data-type='horizontal'>";
				echo "<a id='CheckClassInfo' onclick='CheckClassInfor()' href='#' data-role='button'>查看该班级信息</a>";

				if($ClassJoinType == 'join'){
					echo "<a id='JoinClass' onclick='JoinClass()' href='#' data-role='button'>加入</a>";
				}
				if($ClassJoinType == 'attention'){
					echo "<a id='AttentionClass' onclick='AttentionClass()' href='#' data-role='button'>关注</a>";
				}
				echo "</fieldset>";
				
			?>
		</div><!-- content -->
<div data-role='footer' data-position='fixed'>
	<h1>copyright &copy; AZXUWEN 哈尔滨理工大学</h1>
</div><!-- footer -->
</div><!-- page -->
</body>
</html>