<head>
<script language='JavaScript'>
	//通过省份获取大学
	function getUniversity(){
		//当从新选择 省份的时候  余下的 年份 和 选择班级 也要清空
		var Class = document.getElementById("ClassId");
		Class.length = 0;
		$("<option value='11111'>选择班级</option>").appendTo("#ClassId");
		var ProvinceId = $("#Province").val();//取得省份id
		var University = document.getElementById("University"); //行业小类
		University.length = 0;//清空大学
		//传递ajax
		$.ajax({
			type:'post',
			url:'include/ajax/selectUniversity.php',//文件处理在  include/ajax/selectUniversity.php中
			dataType:'json',
			data:'ProvinceId='+ProvinceId, /*  这里将大类id传给 url   */
			success:function(json){
				if(json == ""){
					$("<option value='11111'>选择大学</option>").appendTo("#University");
					return false;
				}
				$("<option value='11111'>选择大学</option>").appendTo("#University");
				for(var one in json){
						var str='<option value='+json[one]["SchoolId"]+'>'+json[one]["SchoolName"]+'</option>';
						$(str).appendTo("#University");
				}
			}
		});
	}
	//用于创建班级的层div中
	function getUniversityTemp(){
		//当从新选择 省份的时候  余下的 年份 和 选择班级 也要清空
		var Class = document.getElementById("ClassId");
		Class.length = 0;
		$("<option value='11111'>选择班级</option>").appendTo("#ClassId");
		var ProvinceId = $("#ProvinceId").val();//取得省份id
		var University = document.getElementById("UniversityId"); //行业小类
		University.length = 0;//清空大学
		//传递ajax
		$.ajax({
			type:'post',
			url:'include/ajax/selectUniversity.php',//文件处理在  include/ajax/selectUniversity.php中
			dataType:'json',
			data:'ProvinceId='+ProvinceId, /*  这里将大类id传给 url   */
			success:function(json){
				if(json == ""){
					$("<option value='11111'>选择大学</option>").appendTo("#UniversityId");
					return false;
				}
				$("<option value='11111'>选择大学</option>").appendTo("#UniversityId");
				for(var one in json){
					
						var str='<option value='+json[one]["SchoolId"]+'>'+json[one]["SchoolName"]+'</option>';
						$(str).appendTo("#UniversityId");
				}
			}
		});
	}
	//二级联动  选择完年份 则通过之前的 大学 和年份  定位到当年的班级
	function getClassFromYear(){
		var UniversityId = $("#University").val(); //获取大学ID
		var GoSchoolYear = $("#GoSchoolYear").val(); //入学年份
		var ClassId = document.getElementById("ClassId");;
		ClassId.length = 0;
		var Year_SchoolId =GoSchoolYear+"="+UniversityId;
		//传递ajax
		$.ajax({
			type:'post',
			url:'include/ajax/selectClass.php',//文件处理在  include/ajax/selectUniversity.php中
			dataType:'json',
			data:'Year_SchoolId='+Year_SchoolId, /*  这里将大类id传给 url   */
			success:function(json){
				if(json == ""){
					$("<option value='-11111'>选择班级</option>").appendTo("#ClassId");
					return false;
				}
				$("<option value='-11111'>选择班级</option>").appendTo("#ClassId");
				for(var one in json){
					var str='<option value='+json[one]["ClassId"]+'>'+json[one]["ClassName"]+'</option>';
					$(str).appendTo("#ClassId");
				}
			}
		});
		
	}
	//当点击选中的班级   在层中显示  班级的信息
	function getClassInfor(){
		var ClassId = $("#ClassId").val();//班级ID
		if(ClassId != '-11111'){
			//将ClassId 通过ajax传递
			$.ajax({
				type:'post',
				url:'include/ajax/getClassInfor.php',//文件处理在  include/ajax/selectUniversity.php中
				dataType:"html",
				data:'ClassId='+ClassId, /*  这里将大类id传给 url   */
				success:function(data){
					//将之前的信息删除
					var table1 = document.getElementById("ClassInfor");
					while(table1.firstChild){//通过循环来删除子节点
						table1.removeChild(table1.firstChild);
	                }
	                $("#dealjoin").show('fast');
					$(data).appendTo("#ClassInfor");
				}
			});
		}
	}

	$(document).ready(function(){
		//jQuery事件
		$("#addClass").click(function(){
			//这里添加用户选择班级的层
			$("#addClassDiv").show(300);
		});
		//点击取消加入班级按钮
		$("#join_class_cancel").click(function(){
			$("#addClassDiv").hide("normal");
			$("#myzone").load("myclass.php");
		});
		//点击 加入班级链接
		$("#join").click(function(){
			var UserId = $("#HidUserId").val();//用户 ID
			var ClassId = $("#ClassId").val();//班级ID

			//首先判断该用户是否已经输入了真实姓名
			var judge_user_truename = 1;
			$.ajax({
				type:"POST",
				dataType:"text",
				async:false,
				data:"UserId="+UserId,
				url:"include/ajax/judgeUserTruenameExists.php",
				success:function(data){
					if(data == '1'){
						alert('您还未填写真实姓名，加入班级需要填写真实姓名');
						judge_user_truename = 0;
					}
				}
			});
			if(judge_user_truename == 0){
				return false;
			}
			//接下来的工作是 将用户的添加到 班级中
			var joinClass = UserId +"="+ClassId;
			
			//这里需要判断一下  该同学是否重复加入该班级
			var judgeTempVar = 1;
			$.ajax({
				type:"POST",
				dataType:"text",
				async:false,
				data:"judgeClassExists="+"judgeJoin="+joinClass,
				url:"include/ajax/judgeUserClassExists.php",
				success:function(data){
					if(data == '1'){
						alert('您已经加入该班级，请不要重新加入');
						judgeTempVar = 0;
					}
				}
			});
			if(judgeTempVar == 0){
				return false;
			}
			//接下来执行 同学加入班级
			$.ajax({
				type:'post',
				url:'include/ajax/insertClassMember.php',//文件处理在  include/ajax/selectUniversity.php中
				dataType:"text",
				data:'joinClass='+joinClass, /*  这里将大类id传给 url   */
				success:function(data){		/*  服务器返回的数据 处理  */
					$("#join_class_result").html("<font color='red' size='2' face='宋体'>加入成功!</font>");//这里清空 显示层不好使
					$("#join_class_result").slideUp(2000);
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					var result = "<img src='images/loading.gif'>";
					$(result).appendTo("#join_class_result");
					$("#join_class_result").show('fast');
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					
				}
			});
		});
		//点击关注班级之后的ajax事件处理
		$("#att").click(function(e){
			var UserId = $("#HidUserId").val();//用户 ID
			var ClassId = $("#ClassId").val();//班级ID

			//首先判断该用户是否已经输入了真实姓名
			var judge_user_truename = 1;
			$.ajax({
				type:"POST",
				dataType:"text",
				async:false,
				data:"UserId="+UserId,
				url:"include/ajax/judgeUserTruenameExists.php",
				success:function(data){
					if(data == '1'){
						alert('您还未填写真实姓名，关注班级需要填写您的真实姓名.');
						judge_user_truename = 0;
					}
				}
			});
			if(judge_user_truename == 0){
				return false;
			}
			
			//接下来的工作是 将用户的添加到 班级中
			var joinClass = UserId +"="+ClassId;
			//接下来的工作是 将用户的添加到 班级中
			var joinClass = UserId +"="+ClassId;
			var judgeTempVar = '1';
			//这里需要判断一下  该同学是否重复加入该班级
			$.ajax({
				type:"POST",
				dataType:"text",
				async:false,
				data:"judgeClassExists="+"judgeAtt="+joinClass,
				url:"include/ajax/judgeUserClassExists.php",
				success:function(data){
					if(data == '1'){
						alert('您已经关注该班级，请不要重新关注');
						judgeTempVar = 0;
					}
				}
			});
			if(judgeTempVar == 0){
				return false;
			}
			$.ajax({
				type:'post',
				url:'include/ajax/insertClassFriendMember.php',//文件处理在  include/ajax/selectUniversity.php中
				dataType:"text",
				data:'joinClass='+joinClass, /*  这里将大类id传给 url   */
				success:function(data){		/*  服务器返回的数据 处理  */
					$("#join_class_result").html("<font color='red' size='2' face='宋体'>关注成功!</font>");//这里清空 显示层不好使
					$("#join_class_result").slideUp(2000);
					$("#myzone").load('myclass');
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					var result = "<img src='images/loading.gif'>";
					$(result).appendTo("#join_class_result");
					$("#join_class_result").show('fast');
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					
				}
			});
		});
		//当点击创建班级
		$("#buildClass").click(function(){
			//点击创建班级链接
			$("#addClassDiv").hide('fast');
			//还是再来一个页面来创建班级
			$("#BuildClassDiv").show('fast');
		});
		//取消创建班级链接
		$("#build_class_cancel").click(function(){			
			$("#BuildClassDiv").hide('normal');
			$("#addClassDiv").show('normal');
		});
		//点击完善信息
		$("#addInfor").click(function(){
			$("#myzone").load("myinforedit.php");
		});
		//点击创建班级
		$("#build").click(function(ev){
			var JudgeUserTrueName = $("#JudgeUserTrueName").val(); //此文件中用于识别用户有没有填写真实姓名
			if(JudgeUserTrueName == '0'){
				alert('您还没有完善您的真实姓名，请完善');
				$("#myzone").load("myinforedit.php");
				ev.preventDefault();
				return false;
			}
			var ClassName = $("#ClassName").val();
			var SchoolId = $("#UniversityId").val();
			var GoSchoolYearTemp = $("#GoSchoolYearTemp").val();
			var CollegeName = $("#CollegeName").val();
			var MajorName = $("#MajorName").val();
			var ClassContent = $("#ClassContent").val();
			var UserId = $("#HidUserId").val();//用户ID
			
			if(ClassName.length <= 0){
				alert('请填写班级名称');
				ev.preventDefault();
				return false;
			}
			if(ClassName.length>30){
				alert('您输入班级名过长');
				ev.preventDefault();
				return false;
			}
			if(SchoolId == '-11111'){
				alert('请选择大学');
				ev.preventDefault();
				return false;
			}
			if(GoSchoolYearTemp == '11111'){
				alert('请选择入学年份');
				ev.preventDefault();
				return false;
			}
			//构造ajax变量
			var buildClassVar = UserId+"="+ClassName+"="+SchoolId+"="+GoSchoolYearTemp+"="+CollegeName+"="+MajorName+"="+ClassContent;
			$.ajax({
				type:'post',
				url:'include/ajax/buildClass.php',//文件处理在  include/ajax/selectUniversity.php中
				dataType:"text",
				data:'buildClassVar='+buildClassVar, /*  这里将大类id传给 url   */
				success:function(data){		/*  服务器返回的数据 处理  */
						$("#build_class_result").html("<font color='red' size='2' face='宋体'>创建成功!</font>");//这里清空 显示层不好使
						$("#build_class_result").slideUp(2000);
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					var result = "<img src='images/loading.gif'>";
					$(result).appendTo("#build_class_result");
					$("#build_class_result").show('fast');
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					
				}
			});
			
		});
		
		//当点击本页面中的 显示出来的班级时  希望显示 该班级的成员信息
		$("#myClassInfo").click(function(){
			//点击某个班级  
			var ClassId = $(this).attr("href");
			alert(ClassId);
		});
	}); 		
</script>
</head>
<?php
	header("Content-Type:text/html; charset=utf8");
	require_once 'include/SqlHelper.class.php';
	require_once 'include/ComFunction.php';
	$sqlHelper = new SqlHelper();
	session_start();
	//这里要识别是不是存在用户登录 如果不是 提示非法链接 START
	if(!isset($_SESSION['USER'])){
		echo '<script> alert("非法链接");location.replace("index.php")</script>';
		exit();
	}
	//这里要识别是不是存在用户登录 如果不是 提示非法链接 END
	//用户基本信息的查询  START
	$sql_get_users_infor = "Select ClassID,ClassFriendId from t_sfuser Where SFUserId = $_SESSION[USERID]";
	//用户基本信息的查询  END
	//获取用户基本信息
	$arr_get_users_infor = $sqlHelper->execute_dql2($sql_get_users_infor);
	$classID = $arr_get_users_infor[0]['ClassID']; //所属班级 IDes
	$classFriendId = $arr_get_users_infor[0]['ClassFriendId'];//关注班级  IDes
	/*
	 * 这里需要注意的问题是  一个用户的学校和班级 都会不止一个
	 */
	//将所属班级信息分散成一个数组
	$ClassIdes = explode(',', $classID);
	$sql_UserClassInfor = "Select * from t_class where "; //构造用户班级的查询
	for($i = 0 ; $i<count($ClassIdes); $i++){
		if($i < count($ClassIdes)-1){
			$sql_UserClassInfor .= "ClassId = ".$ClassIdes[$i]." or ";
		}else{
			$sql_UserClassInfor .= "ClassId = ".$ClassIdes[$i];
		}
	}
	$arr_user_classes = $sqlHelper->execute_dql2($sql_UserClassInfor);//用户所属班级的全部信息在这里
	//将关注班级信息分散成一个数组
	$classFriendIdes = explode(",", $classFriendId);
	$sql_userClassFriendInfor = "Select * from t_class where";
	for($i = 0 ; $i<count($classFriendIdes); $i++){
		if($i < count($classFriendIdes)-1){
			$sql_userClassFriendInfor .= " ClassId = ".$classFriendIdes[$i]." or ";
		}else{
			$sql_userClassFriendInfor .= " ClassId = ".$classFriendIdes[$i];
		}
	}
	$arr_userClassFriendInfor = $sqlHelper->execute_dql2($sql_userClassFriendInfor);//用户关注的班级全部信息
	
	
	//看来这里要好几联动啊
	//获取省份（从数据库中获取）
	function getClassFromProvince(){
		global  $sqlHelper;
		$sql_get_provinces = "Select * from t_idcode where length(CityId) = 2";//从 t_idcode中获取省份
		$arr_get_provinces = $sqlHelper->execute_dql2($sql_get_provinces);//保存着省份的数组
		for($i = 0; $i<count($arr_get_provinces); $i++){
			echo "<option value=".$arr_get_provinces[$i]['CityId'].">".$arr_get_provinces[$i]['CityName']."</option>";
		}
	}
	//将用户ID存放在  <input hidden  中
	echo "<input type='hidden' id='HidUserId' value=".$_SESSION['USERID']." />";
	
	//如果用户还没有加入或者关注班级 就这样提示
	if(count($arr_user_classes) == 0 && count($arr_userClassFriendInfor) == 0){
?>
<!-- 当用户还没有  加入班级  或者 关注班级的话  -->
<table height='320px' width="780" border="0" align="center" cellpadding="0" cellspacing="0" class="biaoge">
	<tr>
		<td align='center'>您还没有<a href='#joinclass' id='addClass' ><font color='blue'>加入/关注</font></a>班级噢!</td>
	</tr>
</table>
<?php }else{?>
<!-- 当用户已经  加入了班级 或者关注了班级的话 -->
<table  width="780" border="1" align="center" cellpadding="0" cellspacing="0" class="biaoge">
     <tr>
     	<td height="326" valign='top' width='100' >
     		<?php 
     			//这里应该 有    该用户 属于的班级     关注的班级  并且   当定位到某个班级的时候  应该将该班级的说说 或者照片显示出来
     			echo "我的班级（所属）<br>";
     			for($i = 0; $i<count($arr_user_classes); $i++){
     				echo "<a id='myClassInfo' href='#class".$arr_user_classes[$i]['ClassId']."' >".$arr_user_classes[$i]['ClassName']."</a><br>";
     			}
     			echo "我的班级（关注）<br>";
     			for($i = 0; $i<count($arr_userClassFriendInfor); $i++){
     				echo "<a id='myClassAttenInfo' href='#class".$arr_user_classes[$i]['ClassId']."' >".$arr_userClassFriendInfor[$i]['ClassName']."</a><br>";
     			}
     			echo "<a href='#joinclass' id='addClass' ><font color='blue'>加入/关注NEW班级</font></a>";
     		?>
     	</td>
     	<td>
     		<!-- 这里用于显示  用户点击班级的 班级中成员发表的说说 和上传的照片 -->
     		<table id='classMemberInfo' width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="biaoge">
     			<!--   当点击左边的班级的时候  这里会显示相应的信息 我觉得应该显示班级的成员 然后点击成员 就能访问了  -->
     		</table>
     	</td>
     </tr>   
</table>

<?php
 }
?>

<!-- 用户添加班级的层   START-->
<div id='addClassDiv' style="display:none;width:600px;height:380px;border:5px solid blue;background-color:white;position:absolute;top:200px;">
	<!-- 用户点击加入  成功之后的效果 -->
			<div id='join_class_result' style="display:none; z-index=200;position:absolute;top:350px;left:20px;">
		
			</div>
	<!-- 这里要先选择     省份 -> 大学  ->  年份  ->   班级 -->
	<table width='100%' height='200px' cellpadding="0" cellspacing="0" align="center">
		<tr height='30px' bgcolor='blue'><td colspan='2'>
			<font size='3.0em' color='white' face='黑体'>&nbsp;加入班级 /关注友情班级</font></td>
            <td  colspan='2' align='right'><a href='#join_class_cancel' id='join_class_cancel'><img src="images/X1.jpg" width='20px' height='20px'/></a>
        </td></tr>
        <tr  bgcolor='#E6FFFF' height='20px'>
			<td align='left' colspan='4'>点击选中班级，可以查看班级信息</td>
		</tr>
		<tr><td>
			<select id='Province' name='Province' onchange="getUniversity()">
			<option value='11111'>选择省份</option>
			<?php
				//省份的二级联动
				getClassFromProvince();
			?>
			</select>
		</td>
		<td>
			<select id='University' name='University' onchange='getClassFromYear()' >
				<option value='11111'>选择大学</option>
			</select>
		</td>
		<td>
			<select id='GoSchoolYear' name='GoSchoolYear' onchange="getClassFromYear()"  >
				<option value='11111'>选择入学年份</option>
				<?php
					echoYearSelect();
				?>
			</select>
		</td>
		<td>
		<select id='ClassId' name='ClassId' onchange="getClassInfor()">
			<option value='-11111'>选择班级</option>
		</select>
		</td>
		</tr>
		
		<tr height='250px'>
			<td align='right' colspan='4'>
				<table id='ClassInfor' width='100%' height='180px' cellpadding="0" cellspacing="0" align="center">
				</table>
			</td>
		</tr>
		<tr height='20px'>
			<td align='center' colspan='4'>
				<div id='dealjoin' style='display:none;'><a id='join' href='#join'>加入班级</a>　　　<a id='att' href='#att'>关注班级</a></div>
			</td>
		</tr>
		<tr bgcolor='#E6FFFF'>
			<td align='right' colspan='4'>如果没有找到您要加入或关注的班级，您可以进行<a href='#bulidClass' id='buildClass'>点击这里创建</a></td>
		</tr>
	</table>
</div>
<!-- 用户添加班级的层   END-->

<!-- 用户创建班级的层  START-->
<div id='BuildClassDiv' style="display:none;width:600px;height:380px;border:5px solid blue;background-color:white;position:absolute;top:200px;">
	<!-- 用户点击加入  成功之后的效果 -->
			<div id='build_class_result' style="display:none; z-index=200;position:absolute;top:350px;left:20px;">
		
			</div>
	<!-- 这里要先选择     省份 -> 大学  ->  年份  ->   班级 -->
	<table width='100%' height='200px' cellpadding="1" cellspacing="0" align="center">
		<tr height='30px' bgcolor='blue'>
		<td width='150px' align='center'>
			<font size='3.0em' color='white' face='黑体'>&nbsp;创建班级</font></td>
            <td   align='right'><a href='#build_class_cancel' id='build_class_cancel'><img src="images/X1.jpg" width='20px' height='20px'/></a>
        </td></tr>
		<tr>
			<td  align='center'>*班级名称</td><td><input type='text' name='ClassName' id='ClassName'  />(例如:信管11-1)</td>
		</tr>
		<tr>
			<td  align='center'>*所属学校</td><td>
			<select id='ProvinceId' name='ProvinceId' onchange="getUniversityTemp()">
				<option value='11111'>选择省份</option>
				<?php
				//省份的二级联动
					getClassFromProvince();
				?>
			</select>
			<select id='UniversityId' name='UniversityId' onchange='getClassFromYear()' >
				<option value='-11111'>选择大学</option>
			</select></td>
		</tr>
		<tr>
			<td  align='center'>
				*入学年份
			</td>
			<td>
				<select id='GoSchoolYearTemp'>
				<option value='11111'>选择入学年份</option>
					<?php  echoYearSelect();//函数来自 ComFunction.php ?>
				</select>
			</td>
		</tr>
		<tr>
			<td  align='center'>
				所属学院
			</td>
			<td>
				<input type='text' id='CollegeName' name='CollegeName' />
			</td>
		</tr>
		<tr>
			<td  align='center'>
				所属系
			</td>
			<td>
				<input type='text' id='MajorName' name='MajorName' />
			</td>
		</tr>
		<tr>
			<td  align='center'>
				班级介绍
			</td>
			<td>
				<textarea id='ClassContent' name='ClassContent' cols='50' rows='6'>
				</textarea>
			</td>
		</tr>
		<tr height='20px'>
			<td align='center' colspan='2'>
				<a id='build' href='#build'>创建班级</a>
			</td>
		</tr>
		<?php
			//这里用于在点击创建班级的时候  判断 用户是否填写了真实姓名
			if(!judgeUserTrueName($_SESSION['USERID'])==1){
				echo "<input type='hidden' id='JudgeUserTrueName' value='0' />";
			}else{
				echo "<input type='hidden' id='JudgeUserTrueName' value='1' />";
			}
		?>
		<?php if(!judgeUserTrueName($_SESSION['USERID'])){?>
		<tr>
			<td colspan ='2' align='right'>创建班级需要您完善信息，真实姓名一定要填写，现在就去<a href='#addInfor' id='addInfor'>完善</a></td>
		</tr>
		<?php } ?>
		<tr bgcolor='#E6FFFF'>
			<td align='right' colspan='2'>创建班级，有助于同学们找到这里，同时增加您的积分</td>
		</tr>
	</table>
</div>
<!-- 用户创建班级的层  START-->