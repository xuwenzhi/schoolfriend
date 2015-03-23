<!DOCTYPE HTML>
<html manifest='cache.manifest'>
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
<script src="Js/jquery.mobile-1.0.1.js" type="text/javascript"></script>
<link  href="Css/index.css" rel="Stylesheet" type="text/css" /><!-- 自定义的CSS样式表 -->
<script src='Js/jquery.mobile.config.js' type='text/javascript'></script><!-- jquery.mobile自定义配置 -->
<script src="Js/jquery.cookie.js" type="text/javascript"></script><!-- 引jquery-cookie文件  用于设置用户主题的选择-->
<script src='Js/setTheme.js' type='text/javascript'></script><!-- 判断用户的主题选择 -->
<!-- <script src="Js/Person.js" type="text/javascript"></script> -->
<script>
//这里对省市的二级联动进行处理
function changeProvince(){
	var Province = $("#Province").val();//获取省份ID
	var City = document.getElementById("UserLocation");
	City.length = 0;
	//alert(Province);
	$.ajax({
		type:'post',
		url:'../Control/Ajax/AjaxGetCityByProvince.php',
		data:'Province='+Province,
		dataType:'json',
		success:function(json){
			if(json != '0'){
				//将获取到的城市 添加到 id=UserLocation的下拉菜单下
				for(var one in json){
					var str='<option value='+json[one]["CityName"]+'>'+json[one]["CityName"]+'</option>';
					$(str).appendTo("#UserLocation");
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
	$(document).ready(function(){
		//点击删除说说
		$("a[id='TalkDelete']").live('click', function(){
			//获取到需要删除说说的ID
			var TalkId = $(this).attr('TalkId');
			//alert($(this).parents('li').html());
			//alert(TalkId);
			//return false;
			//下面通过ajax来执行删除
			$(this).closest('#TalkLI').remove();
			$.ajax({
				type:'post',
				url:'Control/Ajax/AjaxTalkDelete.php',
				cache:false,
				data:'TalkId='+TalkId,
				success:function(data){
					if(data == 'OK'){
						//如果是成功的话 就通过操作DOM将该说说删除
						//$(this).closest('#TalkLI').remove();//将父节点的 li删除
						//alert('删除成功');
					}
					if(data == 'NO'){
						//证明删除失败
						alert('删除失败，请重试');
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
		//加载更多说说
		$("#TalkMore").click(function(){
        	//计算出当前新闻公告的数量 然后通过这个数量进行加载更多
        	var $TalkCount = 0;
        	$("a[id='TalkContent']").each(function(){
            	$TalkCount ++;
        	});
        	//下面通过ajax将之后的5条数据拿出来
        	$.ajax({
        		type:'post',
				url:'Control/Ajax/AjaxGetMoreTalk.php',
				dataType:'json',
				data:"TalkCount="+$TalkCount,
				success:function(json){
    				if(json!=""){
					for(var one in json){
						//var str='<li class="ui-btn ui-btn-icon-right ui-li ui-li-has-alt ui-btn-up-e" data-theme="e"><div class="ui-btn-inner ui-li ui-li-has-alt"><div class="ui-btn-text"><a id="TalkContent" class="ui-link-inherit" href="#">'+json[one]['TalkId']+'</a><p class="ui-li-desc">'+json[one]['TalkTime']+'</p><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>';
						var str = '<li id="TalkLI" title='+json[one]["TalkContent"]+' class="ui-btn ui-btn-up-c ui-btn-icon-right ui-li ui-li-has-alt"><div class="ui-btn-inner ui-li ui-li-has-alt"><div class="ui-btn-text"><a href="#" class="ui-link-inherit" id="TalkContent">'+json[one]["TalkContent"]+'<p class="ui-li-desc"><p class="ui-li-desc"><p class="ui-li-desc">'+json[one]['TalkTime']+'</p></a><a id="TalkDelete" class="ui-li-link-alt ui-btn ui-btn-up-c" data-transition="slideup" TalkId='+json[one]["TalkId"]+' data-ajax="false" data-rel="dialog" data-transition="slideup" title="删除该条说说"><span class="ui-btn-inner"><span class="ui-btn-text"></span><span class="ui-btn ui-btn-up-c ui-btn-icon-notext ui-btn-corner-all ui-shadow" title=""><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text"></span><span class="ui-icon ui-icon-delete ui-icon-shadow"></span></span></span></span></a></li>'; 
						$(str).appendTo("#MyTalk");
					}
    				}
    				if(json == 0){
        				$("#getMoreTalkInfor").html('已经加载全部');
    				}
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
    				$(load).appendTo("#getMoreTalkLoad");
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					$("#getMoreTalkLoad").html('');
				}
            });
    	});

    	
	});
	//这个实际上是写的updateTrueName.php中的事件，因为实在找不到在哪里写这个页面的JS事件 所以最后决定通过body的pageload事件然后触发updateTrueName.php中的事件
	$("body").live('pageload', function(){
		//修改真实姓名
		$("#SubBtnTrueName").click(function(){
			var UserTrueName = $("#UserTrueName").val();//serialize()函数可以轻松地以UserName=azxuwen&Password=123456这样的方式获取到
			$.ajax({
				type:'post',
				url:'../Control/Ajax/AjaxUpPersonName.php',
				cache:false,
				data:'UserTrueName='+UserTrueName,
				success:function(data){
					if(data == 'OK'){
						//alert('修改成功');
						window.location.href = "../Me.php";
					}else{
						alert('修改失败');
					}
				}
			});
		});
		//修改性别
		$("#SubBtnSex").click(function(){
			var UserSex = $("#UserSex").val();//serialize()函数可以轻松地以UserName=azxuwen&Password=123456这样的方式获取到
			$.ajax({
				type:'post',
				url:'../Control/Ajax/AjaxUpPersonSex.php',
				cache:false,
				data:'UserSex='+UserSex,
				success:function(data){
					if(data == 'OK'){
						//alert('修改成功');
						window.location.href = "../Me.php";
					}else{
						alert('修改失败');
					}
				}
			});
		});
		//修改Email
		$("#SubBtnEmail").click(function(){
			var UserEmail = $("#UserEmail").val();
			//alert("1/"+$("#UpdateInfor").html());
			/*if(UserEmail==''){
				alert('请填写邮箱');
				//$("#UpdateInfor'").html('请填写邮箱'); 
				return false;
			}
			这里邮箱的正则始终有问题
			
			var result=UserEmail.match("/^\w+([\.\-]\w+)*\@\w+([\.\-]\w+)*\.\w+$/");
			if(result==null) {
				alert('请填写有效邮箱');
				return false;
			}*/
			$.ajax({
				type:'post',
				url:'../Control/Ajax/AjaxUpPersonEmail.php',
				cache:false,
				data:'UserEmail='+UserEmail,
				success:function(data){
					if(data == 'OK'){
						//alert('修改成功');
						window.location.href = "../Me.php";
					}else{
						alert('修改失败');
					}
				}
			});
		});
		//修改居住地
		$("#SubBtnLocation").click(function(){
			var UserLocation = $("#UserLocation").val();
			$.ajax({
				type:'post',
				url:'../Control/Ajax/AjaxUpPersonLocation.php',
				cache:false,
				data:'UserLocation='+UserLocation,
				success:function(data){
					if(data == 'OK'){
						//alert('修改成功');
						window.location.href = "../Me.php";
					}else{
						alert('修改失败');
					}
				}
			});
		});
	});
</script>
</head>
<body>
<?php require_once 'header.php';?>
<div data-role='content' id='page1'>
    		<?php
    			session_start();
				if(!isset($_SESSION['USERID'])){
    				echo '<script> alert("您还未登录"); location.replace("Login.php")</script>';
   				}else{
   					$UserId = $_SESSION['USERID'];
    			}
    			require_once 'Control/SqlHelper.class.php';
    			require_once 'Control/ComFunctions.php';
    			$sqlHelper =  new SqlHelper();
    			//获取当前登录用户的基本信息
    			$sql_get_user_infor = "Select * from t_sfuser where SFUserId = $_SESSION[USERID]";
    			$arr_get_user_infor = $sqlHelper ->execute_dql2($sql_get_user_infor);
    			//个人信息
    			$UserLoginName = $_SESSION['USER'];//登录名
    			$UserLookAdd = $arr_get_user_infor[0]['SFUserAdd'];//头像地址
    			$UserTrueName = $arr_get_user_infor[0]['SFUserTrueName'];//真实姓名
    			$UserSex = $arr_get_user_infor[0]['SFUserSex'];//性别  1是男的 0 是女的
    			$UserHometown = $arr_get_user_infor[0]['Hometown'];//籍贯
    			$UserQq = $arr_get_user_infor[0]['SFUserQq'];//QQ
    			$UserTel = $arr_get_user_infor[0]['SFUserTel'];//个人电话
    			$UserEmail = $arr_get_user_infor[0]['SFUserEmail']; //电子邮箱
    			$UserPreAdd = $arr_get_user_infor[0]['SFUserPreAdd'];//现居地
    			//工作信息
    			$UserWorkTel = $arr_get_user_infor[0]['SFUserWTel'];//工作电话
    			$UserExperience = $arr_get_user_infor[0]['SFUserExperience'];//个人简历
    			$UserLastDegree = $arr_get_user_infor[0]['LastDegree'];//最后学历
    			$UserRank = $arr_get_user_infor[0]['SFUserRank'];//职称
    			$UserPosition = $arr_get_user_infor[0]['SFUserPosition'];//职位
    			$UserCompany = $arr_get_user_infor[0]['SFUserCompany'];//公司名称
    			$UserCompanyTrade = getTradeNameByTradeId($arr_get_user_infor[0]['CompanyTrade']);//公司行业
    			if(isset($UserCompanyTrade[0][0])){
    				$UserCompanyTrade = $UserCompanyTrade[0][0];
    			}else{
    				$UserCompanyTrade = "";
    			}
    			$UserCompanyType = $arr_get_user_infor[0]['CompanyType'];//公司类别  应该从t_basecode 中选取
    			$UserCompanyRelasion = $arr_get_user_infor[0]['SFUserRelasion'];//好友与就职公司的关系
    			$UserCompanyPresent = $arr_get_user_infor[0]['CompanyPresent'];//公司介绍
    			
    			//我的说说
    			$sql_get_user_talk = "Select * from t_talk where SFUserId = $_SESSION[USERID] order by TalkId desc limit 0, 5";
    			$arr_get_user_talk = $sqlHelper->execute_dql2($sql_get_user_talk);
    		?>
    	</a>
    <div data-role='collapsible' data-content-theme='c'>
			<h2><?php
				//个人头像 真实姓名 
				if($UserLookAdd !="upload/images/defaultPhoto.jpg"){
					echo "<img src='../".$UserLookAdd."' width='50px' height='50px'/>";
				} else {
					echo "<img src='../Images/defaultlook.jpg' widht='50px' height='50px'/>";
				}
				echo "　　　　　　$UserLoginName";//当前登录用户
			 ?></h2>
			<ul data-role='listview'>
				<li><?php
					echo "<a id='upTrueName' href='Personal/updateTrueName.php' data-transition='flip' data-rel = 'dialog' >真实姓名:";
					if($UserTrueName != ""){
						echo $UserTrueName."</a>";
					}else{
						echo "</a>";
					}
				?></li>
				<li><?php
					echo "<a href='Personal/updateSex.php' id='upSex' data-transition='flip' data-rel = 'dialog'>性别:";
					if($UserSex != ""){
						if($UserSex == 1){
							echo "男</a>";
						}
						if($UserSex == 0){
							echo "女</a>";
						}
					}else{
						echo "</a>";
					}
				?></li>
				<!-- <li><?php
					/*echo "QQ:";
					if($UserQq != ""){
						echo $UserQq;
					}else{
						echo "";
					}*/
				?></li> -->
				<li><?php
					echo "<a href='Personal/updateEmail.php' id='upEmail' data-transition='flip' data-rel = 'dialog'>Email:";
					if($UserEmail != ""){
						echo $UserEmail."</a>";
					}else{
						echo "</a>";
					}
				?></li>
				<!-- 
				<li><?php
					echo "个人电话:";
					if($UserTel != ""){
						echo $UserTel;
					}else{
						echo "";
					}
				?></li> -->
				<!-- 	<li><?php
					echo "籍贯:";
					if($UserHometown != ""){
						echo $UserHometown;
					}else{
						echo "";
					}
				?></li>-->
				<li><?php
					echo "<a  href='Personal/updateLocation.php' id='upLocation' data-transition='flip' data-rel = 'dialog'>现居地:";
					if($UserPreAdd != ""){
						echo $UserPreAdd."</a>";
					}else{
						echo "</a>";
					}
				?></li>
			</ul>
	</div>
	<div data-role='collapsible' data-content-theme='c'>
			<h2>我的工作</h2>
			<ul data-role='listview'>
				<li><?php
					echo "最后学历:";
					if($UserLastDegree != ""){
						echo getCodeNameByCodeId($UserLastDegree);
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "职称:";
					if($UserRank != ""){
						echo getCodeNameByCodeId($UserRank);
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "职位:";
					if($UserPosition != ""){
						echo $UserPosition;
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "办公电话:";
					if($UserWorkTel != ""){
						echo $UserWorkTel;
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "个人简介:";
					if($UserExperience != ""){
						echo $UserExperience;
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "就职公司:";
					if($UserCompany != ""){
						echo $UserCompany;
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "公司类别:";
					if($UserCompanyType != ""){
						echo getCodeNameByCodeId($UserCompanyType);
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "公司行业:";
					if($UserCompanyTrade != ""){
						echo $UserCompanyTrade;
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "公司地址:";
					if($UserPreAdd != ""){
						echo $UserPreAdd;
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "与就职公司的关系:";
					if($UserCompanyRelasion != ""){
						echo getCodeNameByCodeId($UserCompanyRelasion);
					}else{
						echo "";
					}
				?></li>
				<li><?php
					echo "公司介绍:";
					if($UserCompanyPresent != ""){
						echo $UserCompanyPresent;
					}else{
						echo "";
					}
				?></li>
			</ul>
	</div>
	 <div data-role='collapsible' data-content-theme='c'>
			<h1>我的说说</h1>
			<ul id='MyTalk' data-role='listview' data-split-icon='delete' data-split-theme='d'>
			<?php
					if(count($arr_get_user_talk) != 0){
						for($i = 0; $i<count($arr_get_user_talk); $i++){
							echo "<li id='TalkLI' ><a href='#' title=".$arr_get_user_talk[$i]['TalkContent']." id='TalkContent'>".$arr_get_user_talk[$i]['TalkContent']."<p><p><p>".date("m-d H:i", strtotime($arr_get_user_talk[$i]['TalkTime']))."</p></a><a id='TalkDelete' title='删除该条说说' TalkId=".$arr_get_user_talk[$i]['TalkId']."  data-ajax='false' data-rel='dialog' data-transition='slideup' ></a></li>";
						}
					}else{
						echo "<li>您没发表过说说哦!</li>";
					}
			?>
			</ul>
			<?php 
				if(count($arr_get_user_talk) != 0){
					echo "<a href='#' id='TalkMore' data-role='button'><span id='getMoreTalkInfor'>点击显示更多</span><span id='getMoreTalkLoad'></span></a>";
				}
			?>
	</div>
     <div data-role='collapsible' data-content-theme='c'>
			<h2>设置</h2>
			<ul data-role='listview'>
				<li><a href='Personal/updateTheme.php' data-ajax='false'>主题</a></li>
				<li><a href='FirstLogin.php' data-ajax='false'>关于校友网</a></li>
				<li><a href='LogOut.php' data-ajax='false'><font color='red'>退出账号</font></a></li>
			</ul>
	</div>
</div><!-- content-->

<?php require_once 'footer.php';?>
</body>
</html>

