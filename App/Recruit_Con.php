<?php
		session_start();
		require_once 'Control/SqlHelper.class.php';
		require_once 'Control/ComFunctions.php';
		$sqlHelper = new SqlHelper();
		$RecruitId = $_GET['RecruitId'];//获取ID
		//建立查询
		$sql_get_recruit_content = "Select * from t_recruit where RecruitId = $RecruitId";
		$arr_get_recruit_content = $sqlHelper->execute_dql2($sql_get_recruit_content);
		$RecruitAddTime = date("Y-m-d", strtotime($arr_get_recruit_content[0]['RecruitTime']));//添加时间
		$RecruitUserId = $arr_get_recruit_content[0]['SFUserId'];
		$RecruitWriter = getUserFromTsfuser($arr_get_recruit_content[0]['SFUserId']);//作者
		$RecruitContent = $arr_get_recruit_content[0]['RecruitPContent'];//内容
		$RecruitPosition = $arr_get_recruit_content[0]['RecruitPosition'];//职位
		$RecruitTrade = getTradeNameByTradeId($arr_get_recruit_content[0]['RecruitTrade']);//行业
		$RecruitTrade = $RecruitTrade[0]['TradeName'];
		$RecruitDegree = $arr_get_recruit_content[0]['RecruitDegree'];//学历
		$RecruitPlace = $arr_get_recruit_content[0]['RecruitLocation'];//地点
		$RecruitType = $arr_get_recruit_content[0]['RecruitType'];//是否兼职
		$RecruitClaim = $arr_get_recruit_content[0]['RecruitClaim'];//要求
		
		//下面将对该招聘信息感兴趣的人数统计出来
		$sql_get_recurit_likecount = "Select count(SFUserId) From t_accept Where RecruitId = $RecruitId";
		$arr_get_recurit_lidecount = $sqlHelper->execute_dql2($sql_get_recurit_likecount);
		$RecruitLikeCount = $arr_get_recurit_lidecount[0][0];//对该招聘信息感兴趣的人
	?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $arr_get_recruit_content[0]['RecruitTitle'];?></title>
    <meta name="viewport" content="width=device-width" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link  href="Css/jquery.mobile-1.0.1.min.css" 
           rel="Stylesheet" type="text/css" />
    <script src="Js/jquery-1.6.4.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile-1.0.1.js" 
           type="text/javascript"></script>
    <script src="Js/jquery.mobile.actionsheet.js" 
           type="text/javascript"></script>
	 <link  href="Css/jquery.mobile.actionsheet.css" 
           rel="Stylesheet" type="text/css" />
     <script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
<style>
.content-box-header {
      background: #e5e5e5 url('Images/bg-content-box.gif') top left repeat-x;
      height: 40px;
}
.RecruitLikeUserDiv{
	width:100%;
	background-color:red;
	border:thin solid #fff;
}
.content-box {
                border: 1px solid #ccc;
                margin: 0 0 20px 0;
                background: #fff;
                }

.content-box-header {
                background: #e5e5e5 url('Images/bg-content-box.gif') top left repeat-x;
                margin-top: 1px;
                height: 40px;
                }

.content-box-header h3 {
				position:relative;
                top:-20px;/*这里定位是我自己加上的    */
                padding: 8px 5px 2px;
                float: left;
                }
/************ Table ************/

 table {
                width: 100%;
                border-collapse: collapse;
                }
                
 table thead th {
                font-weight: bold;
                font-size: 15px;
                border-bottom: 1px solid #ddd;
                }
                
 tbody tr {
                background: #fff;
                }
              
 tbody tr.alt-row {
                background: #f3f3f3;
                }
 table td{
                padding-bottom: 7px;
                line-height: 1.3em;
                }        
table tfoot td .bulk-actions {
                padding: 5px 0 5px 0;
                } 
				
 table tfoot td .bulk-actions select {
                padding: 1px;
				border: 1px solid #ccc;
                }      
				
</style>
<script>
	$(function(){
		//当点击登录时
		$("#SubBtn").click(function(){
			var frmData = $("#form1").serialize();//serialize()函数可以轻松地以UserName=azxuwen&Password=123456这样的方式获取到
			$.ajax({
				type:'post',
				url:'Control/Ajax/AjaxLoginControl.php',
				cache:false,
				data:frmData,
				success:function(data){
					if(data == 'NO'){
						$("#LoginInfor").html('<font color=red>密码错误！</font>');
					}else if(data == 'NOUSER'){
						$("#LoginInfor").html('<font color=red>不存在该用户！</font>');
					}else{
						//登录成功
						$("#form1").submit();
					}
				}
			});
		});
		//点击加载更多 对该招聘信息感兴趣
		$("#RecruitLikeMore").click(function(){
        	var $RecruitUserLikeCount = 0;
        	$("tr[id='RecruitUserCount']").each(function(){
            	$RecruitUserLikeCount ++;//统计当前对该招聘信息感兴趣的人的数量 
        	});
        	var RecruitId = $("#RecruitId").val();
        	var RecruitUserLike = $RecruitUserLikeCount +'-'+ RecruitId;
        	//alert(RecruitUserLike);
        	//下面通过ajax将之后的20条数据拿出来
        	$.ajax({
        		type:'post',
				url:'Control/Ajax/AjaxGetMoreRecruitLike.php',
				dataType:'json',
				data:"RecruitUserLike="+RecruitUserLike,
				success:function(json){
    				if(json!=""){
					for(var one in json){
						var str='<tr id="RecruitUserCount"><td>姓名:</td><td>'+json[one]['SFUserId']+'</td></tr><tr><td>姓名:</td><td>'+json[one]['SFUserId']+'</td></tr><tr><td>期望薪水:</td><td>'+json[one]['AcceptSalary']+'</td></tr><tr><td>要求:</td><td>'+json[one]['AcceptClaim']+'</td></tr><tr><td>要求:</td><td>'+json[one]['AcceptTime']+'</td></tr><tr><td colspan="2"><hr width="100%"/></td></tr>';
						$(str).appendTo("#RceruitLikeTable");
					}
    				}
    				if(json == 0){
        				$("#getMoreRecruitLikeInfor").html('已经加载全部');
    				}
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
    				$(load).appendTo("#getMoreRecruitLikeLoad");
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					$("#getMoreRecruitLikeLoad").html('');
				}
            });
		});
		//检测是否该用户重复点击了对同意招聘信息感兴趣
		$("#SubBtnRecruitLike").click(function(){
			var UserId = $("#USERID").val();
			var RecruitId = $("#RecruitId").val();
			var CheckRecruitLike = UserId+"-"+RecruitId;
			$.ajax({
        		type:'post',
				url:'Control/Ajax/AjaxCheckRecruitLike.php',
				dataType:'text',
				data:"CheckRecruitLike="+CheckRecruitLike,
				success:function(json){
					$("#getMoreRecruitLikeLoad").html('');
    				if(json == 'namenull-1'){
        				$("#RecruitLikeInfor").html('<font color="red" size="1.1em">您之前已经对它感兴趣了,不能重复感兴趣噢!</font>');
        				return false;
    				}
    				if(json == 'namenull-0'){
    					$("#RecruitLikeInfor").html('<font color="red" size="1.1em">您还没有完善真实姓名,填写真实姓名,有助于审核人联系你,当然不填写不影响您的操作.</font>');
        				return false;
    				}
    				if(json == 'name-1'){
    					$("#RecruitLikeInfor").html('<font color="red" size="1.1em">您之前已经对它感兴趣了,不能重复感兴趣噢!</font>');
        				return false;
    				}
    				if(json = 'name-0'){
						var HopeSalary = $("#HopeSalary").val();//期望薪金
						var HopeClaim = $('#HopeClaim').val();//期望要求
						var RecruitType = $("#RecruitType").val();//求职类型
						var RecruitLikeInfor = RecruitId+'-'+HopeSalary+'-'+HopeClaim+'-'+RecruitType;
    					$.ajax({
    		        		type:'post',
    						url:'Control/Ajax/AjaxInsertRecruitLike.php',
    						dataType:'text',
    						data:"RecruitLikeInfor="+RecruitLikeInfor,
    						success:function(json){
    							if(json == 'OK'){
									$("#RecruitLikeInfor").html('恭喜您，成功添加信息');
								}else{
									$("#RecruitLikeInfor").html('抱歉，信息添加失败');
								}
    						},
    						beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
    							$("#RecruitLikeInfor").html('正在添加响应您的操作<img src="Images/ajax-loading.gif" width="10px" height="10px"/>');
    						},
    						complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
    							//$("#RecruitLikeInfor").html('');
    						}
    		            });
    				}
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					$("#RecruitLikeInfor").html('正在对您的信息进行检测<img src="Images/ajax-loading.gif" width="10px" height="10px"/>');
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					//$("#RecruitLikeInfor").html('');
				}
            });
		});
	});
</script>
</head>
<body>	
	<div id='page1' data-role='page' >
		<div data-role='header'  data-position='fixed'>
			<a href='#' data-rel='back' data-icon='arrow-l'>返回</a>
			<h1><?php echo $arr_get_recruit_content[0]['RecruitTitle'];//输出标题          ?></h1>
		</div>
		<div data-role='content' class='content'>
			<p><?php echo $RecruitAddTime; ?>　｜　<?php echo $RecruitWriter; ?></p>
			<?php
				echo "<h1><strong>职位信息</strong></h1>";
				echo "<strong>招聘职位:</strong>　".$RecruitPosition."<br/>";
				echo "<strong>招聘行业:</strong>　".$RecruitTrade."<br/>";
				echo "<strong>学历要求:</strong>　";
				if($RecruitDegree == ""){
					echo $RecruitDegree;
				}else{
					echo "不限";
				}
				echo "<br/>";
				
				echo "<strong>是否兼职:</strong>　";
				if($RecruitType == 1){
					echo "兼职<br/>";
				}else{
					echo "全职<br/>";
				}
				echo "<strong>发布区域:</strong>　".$RecruitPlace."<br/>";
				echo "<strong>职位要求:</strong>　";
				if($RecruitClaim != ""){
					echo $RecruitClaim;
				}else{
					echo "无要求";
				}
				echo "<h1><strong>职位描述</strong></h1>";
				if($RecruitContent != ""){
					echo $RecruitContent;
				}else{
					echo "无职位描述";
				}
				echo "<p><strong>当前已有".$RecruitLikeCount."个人感兴趣</strong></p>";
				if(isset($_SESSION['USERID']) && $RecruitUserId!=$_SESSION['USERID']){
					//登录对其感兴趣
					echo "<a href='#' data-role='actionsheet' data-sheet='LikeIt'>点击对它感兴趣</a>";
					echo "<div id='LikeIt' data-role='content' data-theme='a'>";
					echo "<form  id='LikeIt' action='Control/RecruitAddLike.php?RecruitId=".$RecruitId."'  data-ajax='false' method='post'>";
					echo "期望薪资";
					echo "<input type='number' id='HopeSalary' name='HopeSalary' placeholder='输入期望薪资，也可以不填写' data-inline='true'/><br/>";
					echo "您的基本信息";
					echo "<textarea id='HopeClaim' name='HopeClaim' placeholder='输入您的基本信息，姓名，年龄，联系方式，等等..'></textarea>";
					echo "全职/兼职";
					echo "<select id='RecruitType' name='RecruitType'  data-role='slider' >";
					echo "<option value='1'>兼职</option>";
					echo "<option value='0' selected='selected'>全职</option>";
					echo "</select>";
					echo "<div id='RecruitLikeInfor'></div>";
					echo "<input type='button' id='SubBtnRecruitLike' value='提交信息' >";
					echo "</form>";
					echo "</div>";
					//将下面两个变量隐藏起来 有助于检测 该用户是否重复点击了对它感兴趣
					echo "<input type='hidden' id='USERID' value='".$_SESSION['USERID']."'/>";//用户ID
					echo "<input type='hidden' id='RecruitId' value='".$RecruitId."'/>";//招聘信息的ID
				}
				if(isset($_SESSION['USERID']) && $RecruitUserId==$_SESSION['USERID']){
					echo "<div class='content-box'>";
					echo "<div class='content-box-header'>";
					echo "<h3>感兴趣的人</h3>";
					echo "</div>";
					echo "<table id='RceruitLikeTable'>";
					//证明这个是我发表的 我现在可以查看 现在有谁感兴趣了
					if($RecruitLikeCount > 0){
						//如果感兴趣的人 有很多  就把它们调出来
						$sql_get_recruit_like_users = "Select * from t_accept where RecruitId=$RecruitId order by AcceptId desc limit 0, 3";
						$arr_get_recruit_like_users = $sqlHelper ->execute_dql2($sql_get_recruit_like_users);
						for($i = 0; $i < count($arr_get_recruit_like_users); $i++){
							echo "<tr id='RecruitUserCount'><td>姓名:</td><td>".getUserFromTsfuser($arr_get_recruit_like_users[$i]['SFUserId'])."</td></tr>";
							echo "<tr><td>期望薪水:</td><td>";
							if($arr_get_recruit_like_users[$i]['AcceptSalary']!=""){
								echo $arr_get_recruit_like_users[$i]['AcceptSalary']."</td></tr>";
							}else{
								echo "未填写</td></tr>";
							}
							echo "<tr><td>要求:</td><td>";
							if($arr_get_recruit_like_users[$i]['AcceptClaim']!=""){
								echo $arr_get_recruit_like_users[$i]['AcceptClaim']."</td></tr>";
							}else{
								echo "未填写</td></tr>";
							}
							echo "";
							echo "<tr><td>申请时间:</td><td>".$arr_get_recruit_like_users[$i]['AcceptTime']."</td></tr>";
							echo "<tr><td colspan='2'><hr width='100%'/></td></tr>";
						}
					}else{
						echo "<tr><td colspan='2' align='center'>暂无感兴趣的人</td></tr>";
					}
					echo "</table>";
					//获取更多感兴趣的用户
					if($RecruitLikeCount > 0){
						echo "<a href='#' id='RecruitLikeMore' data-role='button'><span id='getMoreRecruitLikeInfor'>点击显示更多</span><span id='getMoreRecruitLikeLoad'></span></a>";
					}
					//这里将当前的招聘信息的 ID隐藏传递给ajax
					echo "<input type='hidden' id='RecruitId' value='".$RecruitId."'/>";
					echo "</div>";
				}
				if(!isset($_SESSION['USERID'])){
					//登录对其感兴趣
					echo "<a href='#' data-role='actionsheet' data-sheet='divsheet'>登录表示对它感兴趣吧!</a>";
					echo "<div id='divsheet' data-role='content' data-theme='a'>";
					echo "<form  id='form1' action='Control/LoginControl.php?LoginPage=Recruit_Con&Id=".$RecruitId."'  data-ajax='false' method='post'>";
					echo "<input type='text' id='UserName' name='UserName' placeholder='登录账号' data-inline='true'/><br/>";
					echo "<input type='password' id='UserPass' name='UserPass' placeholder='登录密码' data-inline='true'/>";
					echo "<div id='LoginInfor'></div>";
					echo "<input type='hidden' name='LoginPage' value='../Recruit_Con.php?RecruitId=".$RecruitId."'/>";
					echo "<input type='button' id='SubBtn' value='登录' >";
					echo "没有账号？<a href='reg.php' data-icon='plus' data-rel='dialog'>注册账号</a>";
					echo "</form>";
					echo "</div>";
				}
			?>
		</div>
		<div data-role='footer' data-position='fixed'>
			<h2><center>copyright &copy; AZXUWEN 哈尔滨理工大学</center></h2>
		</div>
	</div>
</body>
</html>