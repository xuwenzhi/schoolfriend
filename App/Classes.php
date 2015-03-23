<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|
	哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<meta name="viewport" content="width=device-width" /> 
<link  href="Css/jquery.mobile-1.0.1.min.css" rel="Stylesheet" type="text/css" />
<script src="Js/jquery-1.6.4.js" type="text/javascript"></script>
<script>
   
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
					//将获取到的城市 添加到 id=UserLocation的下拉菜单下
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
					$("#JoinORAttentionClassResult").html('<font color="red" size="3">您已经关注了该班级，一个班级只能存在加入或者班级一项操作...</font>');
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
<script src="Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="Css/index.css" rel="Stylesheet" type="text/css" />
<script src='Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
</head>
<body>
<div data-role='page'>
<?php require_once 'header.php';?>
<div data-role='content' id='index'>
   <?php
   session_start();
    if(!isset($_SESSION['USERID'])){
    	echo '<script> alert("您还未登录"); location.replace("Login.php")</script>';
    	exit;
    }else{
   		$UserId = $_SESSION['USERID'];
    }
   	//将用户所在班级和关注班级拿出来
   	require_once 'Control/ComFunctions.php';
   	require_once 'Control/SqlHelper.class.php';
   	$sqlHelper = new SqlHelper();
   	//建立查询 不要在意是所在班级还是关注班级  就直接拿出来就可以了
   	$sql_get_user_class = "Select ClassId, ClassFriendId from t_sfuser where SFUserId= $UserId";
   	$arr_get_user_class = $sqlHelper->execute_dql2($sql_get_user_class);
   	$UserClassId = $arr_get_user_class[0]['ClassId'];
   	$UserClassFriendId = $arr_get_user_class[0]['ClassFriendId'];
   	$UserAllClassId = "";//所在和关注 的所有班级的ID
   	if($UserClassId!=""){
   		$UserAllClassId = $UserClassId.",".$UserClassFriendId;
   	}else{
   		$UserAllClassId = $UserClassFriendId;
   	}
   	echo "<ul data-role='listview'>";
   	//下面将用户的所在班级 和 关注班级 进行展示
   	if($UserAllClassId!=""){
   		 //将所在班级的信息显示出来
   		 echo "<li data-role='divider'>所在班级</li>";
   		 if($UserClassId!=""){
   		 	$sql_get_class_infor = "select * from t_class where ";
	   		$arr_classid = explode(',', $UserClassId);//所在班级ID的数组
	   		for($i = 0; $i < count($arr_classid); $i++){
	   			if($i < count($arr_classid)-1){
	   				$sql_get_class_infor .= "ClassId = $arr_classid[$i] or ";
	   			}else{
	   				$sql_get_class_infor .= "ClassId = $arr_classid[$i] ";
	   			}
	   		}
	   		//现在将用户所在的班级显示出来 只显示名称即可
	   		$arr_get_class_infor = $sqlHelper->execute_dql2($sql_get_class_infor);
	   		for($i = 0; $i<count($arr_get_class_infor); $i++){
	   			echo "<li><a href='Class/Class_Con.php?ClassType=join&ClassId=".$arr_get_class_infor[$i]['ClassId']."' data-transition='flip' data-ajax='false'>".$arr_get_class_infor[$i]['ClassName']."</a></li>";
	   		}
   		 }else{
   		 	echo "<br/><center>您暂时没有加入班级，点击右上角的按钮可以进行添加。</center>";
   		 	echo "<a href='Class/ClassJoin.php?ClassJoinType=join'data-role='button' data-transition='flip'>现在就加入班级</a>";
   		 }
   		 //将关注班级的信息显示出来
   		 echo "<li data-role='divider'>关注班级</li>";
   		 if($UserClassFriendId!=""){
   		 	$sql_get_classfriend_infor = "select * from t_class where ";
   		 	$arr_classfriendid = explode(',', $UserClassFriendId);//所在班级ID的数组
   		 	for($i = 0; $i < count($arr_classfriendid); $i++){
   		 		if($i < count($arr_classfriendid)-1){
   		 			$sql_get_classfriend_infor .= "ClassId = $arr_classfriendid[$i] or ";
   		 		}else{
   		 			$sql_get_classfriend_infor .= "ClassId = $arr_classfriendid[$i] ";
   		 		}
   		 	}
   		 	//现在将用户关注班级显示出来 只显示名称即可
   		 	$arr_get_classfriend_infor = $sqlHelper->execute_dql2($sql_get_classfriend_infor);
   		 	for($i = 0; $i<count($arr_get_classfriend_infor); $i++){
   		 		echo "<li><a href='Class/Class_Con.php?ClassType=attention&ClassId=".$arr_get_classfriend_infor[$i]['ClassId']."' data-transition='flip'>".$arr_get_classfriend_infor[$i]['ClassName']."</a></li>";
   		 	}
   		 }else{
   		 	echo "<center>您还没有关注班级</center>";
   		 	echo "<br/><font color='red'>小提示</font><br>　　什么是关注班级:如果您在其他班级有很多熟人，也可以加入他们的班级，这就是关注班级。";
   		 	echo "<a href='Class/ClassJoin.php?ClassJoinType=attention' data-ajax='false' data-transition='flip' data-role='button'>现在就关注班级</a>";
   		 }
   	}else{
   		echo "<li><center><strong>您还未加入和关注班级</strong></center></li>";
   		echo "<a href='Class/ClassJoin.php?ClassJoinType=join' data-role='button'>点击这里选择班级，并加入</a></li>";
   	}
   ?>
</div><!-- content-->
<?php require_once 'footer.php';  ?>
</div>
</body>
</html>
