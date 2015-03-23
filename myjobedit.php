<head>
<script language='JavaScript'>
	//行业二级联动的功能START
	function getSmallTrade(){
		//首先获取行业大类的id
		var BigTradeId = $("#CompanyBigTrade").val();//行业大类的ID
		var TradeSmall = document.getElementById("CompanyTrade"); //行业小类
			//将行业小类清空
			TradeSmall.length = 0;
			//传递ajax
			$.ajax({
				type:'post',
				url:'include/ajax/selectTrade.php',
				dataType:'json',
				data:'bigTradeId='+BigTradeId, /*  这里将大类id传给 url   */
				success:function(json){		
					for(var one in json){
							var str='<option value='+json[one]["TradeId"]+'>'+json[one]["TradeName"]+'</option>';
							$(str).appendTo("#CompanyTrade");
					}
				}
			});
	}
	//行业二级联动的功能END
	$(document).ready(function(){
		//编辑个人工作信息 就不要加入验证了   太多自己要填写的东西

		 //上面验证完毕  下面通过jQuery和ajax来将信息保存   START
		 $("#per_job_protect").click(function(){
			 //将表单中的信息都获取出来
			var UserDegree = $("#UserDegree").val();//最后学历
			var UserRank = $("#UserRank").val();//职称
			var UserPosition  = $("#UserPosition").val(); //职位
			var UserWPhone = $("#UserWPhone").val();  //办公电话
			var UserCompany = $("#UserCompany").val(); //就职公司
			var UserRealtion = $("#UserRelation").val();//与就职公司之间的关系
			var CompanyTrade = $("#CompanyTrade").val(); //公司行业
			var CompanyType = $("#UserCompanyType").val(); //公司类别
			var CompanyAdd = $("#CompanyAdd").val();	//公司地址
			var CompanyInstr = $("#CompanyIntro").val();//公司介绍
			var UserExprience = $("#UserExperience").val(); //个人简介
			var ajaxUserJob = UserDegree+"="+UserRank+"="+UserPosition+"="+UserWPhone+"="+UserCompany+"="+UserRealtion+"="+CompanyTrade;
			ajaxUserJob+="="+CompanyType+"="+CompanyAdd+"="+CompanyInstr+"="+UserExprience;
			//下面将ajaxUserJob这个变量发送给一个文件
			$.ajax({
				type:"POST",   /*   设置传送方式为POST  */
				url: "include/ajax/EditPersonalJob.php",			/*   处理文件   */
				data: "userJob="+ajaxUserJob,	/*   这里是将文本框中的值传递给 username */
				success:function(data){		/*  服务器返回的数据 处理  */
					$("#update_user_result").html("<font color='blue' size='2' face='宋体'>保存成功!</font>");//这里清空 显示层不好使
					$("#update_user_result").slideUp(700);
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					var result = "<img src='images/loading.gif'>";
					$(result).appendTo("#update_user_result");
					$("#update_user_result").show('fast');
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					var result = "<img src='images/loading.gif'>";
					//$("#update_user_result").html("");//这里清空 显示层不好使
					//$("").appendTo("#update_user_result");
				}
			});
		 });
		 //通过jQuery和ajax来将信息保存   END
		 //如果点击取消编辑  START
		 $("#per_job_cancel").click(function(){
			 $("#myzone").load("myjob.php");
		 });
		//如果点击取消编辑  END
		//我的基本资料部分  END
});
</script>
</head>
<?php
	header("Content-Type:text/html; charset=utf8");
	require_once 'include/SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	session_start();
	//这里要识别是不是存在用户登录 如果不是 提示非法链接 START
	if(!isset($_SESSION['USER'])){
		echo '<script> alert("非法链接");location.replace("index.php")</script>';
		exit();
	}
	//这里要识别是不是存在用户登录 如果不是 提示非法链接 END
	//用户基本信息的查询  START
	$sql_get_users_infor = "Select * from t_sfuser Where SFUserId = $_SESSION[USERID]";
	//用户基本信息的查询  END
	
	//获取用户基本信息
	$arr_get_users_infor = $sqlHelper->execute_dql2($sql_get_users_infor);
	
	//获取到工作信息 START
	$LastDegree = $arr_get_users_infor[0]['LastDegree'];//最后学历   来自 t_basecode
	//在t_basecode中来获取学历 START
	$sql_user_degree = "Select CodeName from t_basecode where CodeCategoryId  = 2 and CodeId = $LastDegree ";
	$arr_user_degree = $sqlHelper->execute_dql2($sql_user_degree);
	if($arr_user_degree){
		$UserLastDegree = $arr_user_degree[0]['CodeName'];
	}else{
		$UserLastDegree = "";
	}
	//在t_basecode中来获取学历 END
	$SFUserRank = $arr_get_users_infor[0]['SFUserRank'];//职称   来自 t_basecode
	//在t_basecode中来获取职称start
	$sql_user_rank = "Select CodeName from t_basecode where CodeCategoryId=1 and CodeId=$SFUserRank";
	$arr_user_rank = $sqlHelper->execute_dql2($sql_user_rank);
	if($arr_user_rank){
		$UserRank = $arr_user_rank[0]['CodeName'];
	}else{
		$UserRank = "";
	}
	//在t_basecode中来获取职称 END
	$SFUserPosition = $arr_get_users_infor[0]['SFUserPosition']; //职位
	$SFUserWTel = $arr_get_users_infor[0]['SFUserWTel']; //办公电话
	$SFUserCompany = $arr_get_users_infor[0]['SFUserCompany']; //就职公司
	$SFUserRelasion = $arr_get_users_infor[0]['SFUserRelasion'];//与就职公司的关系
	//在t_basecode中获得该用户与就职公司之间的关系 START
	$sql_user_companyrelation = "Select CodeName from t_basecode where CodeCategoryId=4 and CodeId = $SFUserRelasion";
	$arr_user_companyrelation = $sqlHelper ->execute_dql2($sql_user_companyrelation);
	if($arr_user_companyrelation){
		$SFUserRelasion = $arr_user_companyrelation[0]['CodeName'];
	}else{
		$SFUserRelasion = "";
	}
	//在t_basecode中获得该用户与就职公司之间的关系 END
	
	$CompanyTrade = $arr_get_users_infor[0]['CompanyTrade']; //公司行业代码  在t_trade中的TradeName 而且是4位的 
	/*
	 * 这里应该做成二级联动的效果
	 */
	
	/*
	 * 为了能在edit的时候，行业大小类都能显示出来 这里将行业的小类的ID 以及 行业小类的名称 保存在一个隐藏表单中
	 */
	//获取已选定的小类的名称
	$sql_alreadySelectTrade = "Select TradeName from t_trade where TradeId = $CompanyTrade";
	$arr_alreadySelectTrade = $sqlHelper->execute_dql2($sql_alreadySelectTrade);
	//在t_trade 中获取公司行业 START
	$companyTradeId = substr($CompanyTrade, 0, 2);//四位行业的上级  两位
	//获取行业大类函数
	function getTradeBigType(){
		global $companyTradeId;
		global $sqlHelper;
		$sql_company_trade = "Select * from t_trade where length(TradeId) = 2 ";
		$arr_company_trade = $sqlHelper->execute_dql2($sql_company_trade);
		for($i= 0 ; $i<count($arr_company_trade); $i++){
			if($companyTradeId == $arr_company_trade[$i]['TradeId']){
				echo "<option value=".$arr_company_trade[$i]['TradeId']." selected='selected'>".$arr_company_trade[$i]['TradeName']."</option>";
			}else{
				echo "<option value=".$arr_company_trade[$i]['TradeId'].">".$arr_company_trade[$i]['TradeName']."</option>";
			}
		}
	}
	
	//在t_trade 中获取公司行业 END
	$companyType = $arr_get_users_infor[0]['CompanyType'];
	//这里获取公司所属类别  START
	$sql_company_type = "Select * from t_basecode where CodeCategoryId = 3 and CodeId = $companyType";
	$arr_company_type = $sqlHelper->execute_dql2($sql_company_type);
	if($arr_company_type){
		$UserCompanyType = $arr_company_type[0]['CodeName'];
	}else{
		$UserCompanyType = "";
	}
	//这里获取公司所属类别  END
	$CompanyAdd = $arr_get_users_infor[0]['CompanyAdd']; //公司地址
	$CompanyPresent = $arr_get_users_infor[0]['CompanyPresent']; //公司介绍
	$SFUserExperience = $arr_get_users_infor[0]['SFUserExperience']; //个人简介
	//获取到工作信息 END
?>
<body>
<table id="person_info" width="780" border="0" align="center" cellpadding="0" cellspacing="0" class="biaoge">
     <tr>
     <!-- 这里加入一个层 用于显示 点击保存之后的效果 -->
	<center>
	<div id='update_user_result' style="display:none;position:absolutely;top:-10px;background-color:white;width:100px; height:100px;">
	</div>
	</center>
     	<td height="26" width='18%' ><div align="right"><strong>最后学历:</strong></div></td>
     	<td width="82%" height="26" >
     		<select name='UserDegree' id="UserDegree" style="width:50%;height:25px;">
     		<option value='1111'>选择学历</option>
     		<?php
     			//最后学历   将t_basecode表中的几个学历拿进来即可
     			 $sql_degrees = "Select * from t_basecode where CodeCategoryId  = 2";
     			 $arr_degrees = $sqlHelper ->execute_dql2($sql_degrees);//获取到学历的数组
     			 //下面通过下拉菜单来表现
     			 for($i = 0 ; $i< count($arr_degrees); $i++){
     			 	if(strcmp($arr_degrees[$i]['CodeName'] , $UserLastDegree) == 0){
     			 		echo "<option value=".$arr_degrees[$i]['CodeId']." selected='selected'>".$arr_degrees[$i]['CodeName']."</option>";
     			 	}else{
     			 		echo "<option value=".$arr_degrees[$i]['CodeId'].">".$arr_degrees[$i]['CodeName']."</option>";
     			 	}
     			 }
     			 
     		?>
     		</select>
     	</td>
     </tr>
     <tr>
        <td height="26" width='18%' ><div align="right"><strong>职称:</strong></div></td>
        <td height="26">
        	<select name='UserRank' id='UserRank' style="width:50%;height:25px;" >
        	<option value='1111'>选择职称</option>
        		<?php
        			//这里存放用户的职称  同样在t_basecode 表中 通过下拉菜单来体现
        			$sql_ranks = "Select * from t_basecode where CodeCategoryId  = 1";
        			$arr_ranks = $sqlHelper ->execute_dql2($sql_ranks);//获取到职称的数组
        			//下面通过下拉菜单来表现
        			for($i = 0 ; $i< count($arr_ranks); $i++){
        				if(strcmp($arr_ranks[$i]['CodeName'] , $UserRank) == 0){
        					echo "<option value=".$arr_ranks[$i]['CodeId']." selected='selected'>".$arr_ranks[$i]['CodeName']."</option>";
        				}else{
        					echo "<option value=".$arr_ranks[$i]['CodeId'].">".$arr_ranks[$i]['CodeName']."</option>";
        				}
        			}
        		?>
        	</select>
        </td>
     </tr>
     <tr>
        <td height="26" width='18%' ><div align="right"><strong>职位:</strong></div></td>
        <td height="26"><input type ='text' name='UserPosition' id='UserPosition' value='<?=$SFUserPosition?>' style="width:50%;height:25px;"/></td>
     </tr>
     <tr>
         <td height="26" width='18%'><div align="right"><strong>办公电话:</strong></div></td>
         <td height="26" ><input type='text' name='UserWPhone' id='UserWPhone' value='<?=$SFUserWTel?>' style="width:50%;height:25px;" /><span id='UserWPhoneCheck'></span></td>
     </tr>
     <tr>
         <td height="26" width='18%' ><div align="right"><strong>就职公司:</strong></div></td>
         <td height="26" ><input type='text' name='UserCompany' id='UserCompany' value='<?=$SFUserCompany?>' style="width:50%;height:25px;"/></td>
     </tr>
     <tr>
         <td height="26" width='18%' ><div align="right"><strong>与就职公司的关系:</strong></div></td>
         <td height="26" >
         	<select id='UserRelation' id='UserRelation' style="width:50%;height:25px;">
         	<option value='1111'>选择雇佣关系</option>
         		<?php
         			//这里从数据库 t_basecode中获取 用户与就职公司的关系
         			$sql_user_relation = "Select * from t_basecode where CodeCategoryId  = 4";
         			$arr_user_ralation = $sqlHelper->execute_dql2($sql_user_relation);
         			//通过下拉菜单来体现就职关系
         			for($i = 0; $i<count($arr_user_ralation); $i++){
	         			if(strcmp($arr_user_ralation[$i]['CodeName'],$SFUserRelasion )==0){
	         				echo "<option value=".$arr_user_ralation[$i]['CodeId']." selected='selected'>".$arr_user_ralation[$i]['CodeName']."</option>"; 
	         			}else{
	         				echo "<option value=".$arr_user_ralation[$i]['CodeId'].">".$arr_user_ralation[$i]['CodeName']."</option>";
	         			} 
         			}
         		?>
         	</select>
         </td>
     </tr>
     <tr>
         <td height="26" width='18%' ><div align="right"><strong>公司行业:</strong></div></td>
         <td height="26" >
         	<!--  这里要放行业的类别的二级下拉菜单 -->
         	<select id='CompanyBigTrade' name='CompanyBigTrade' onChange="getSmallTrade()"style="width:40%;height:25px;"><!-- 行业大类 -->
         		<?php getTradeBigType();?>
         	</select>
         	<select id='CompanyTrade' name='CompanyTrade'style="width:40%;height:25px;">
         		<?php 
         			echo "<option value=".$companyTradeId.">".$arr_alreadySelectTrade[0]['TradeName']."</option>";
         		?>
         	</select>
         </td>
     </tr>
      <tr>
         <td height="26" width='18%' ><div align="right"><strong>公司类别:</strong></div></td>
         <td height="26" >
         	<select name='UserCompanyType' id='UserCompanyType' style="width:50%;height:25px;">
         		<option value='1111'>选择公司类别</option>
       	 		<?php
         			//这里从数据库 t_basecode中获取 公司类别  私企 国企 之类的
         			$sql_company_type = "Select * from t_basecode where CodeCategoryId  = 3";
         			$arr_company_type = $sqlHelper->execute_dql2($sql_company_type);
         			//通过下拉菜单来体现就职关系
         			for($i = 0; $i<count($arr_company_type); $i++){
	         			if(strcmp($arr_company_type[$i]['CodeName'],$UserCompanyType )==0){
	         				echo "<option value=".$arr_company_type[$i]['CodeId']." selected='selected'>".$arr_company_type[$i]['CodeName']."</option>"; 
	         			}else{
	         				echo "<option value=".$arr_company_type[$i]['CodeId'].">".$arr_company_type[$i]['CodeName']."</option>";
	         			} 
         			}
         		?>
        	</select>
         </td>
     </tr>
     <tr>
        <td height="26" width='18%' ><div align="right"><strong>公司地址:</strong></div></td>
        <td><input type='text' name='CompanyAdd' id='CompanyAdd' value='<?=$CompanyAdd?>'style="width:50%" /></td>
     </tr>
     <tr>
        <td height="26" width='18%' ><div align="right"><strong>公司介绍:</strong></div></td>
        <td>
        	<!-- 公司介绍    通过 一个小型的  textarea 来达到目的 -->
        	<textarea id='CompanyIntro' name='CompanyIntro' cols='40' rows='3'>
        		<?=$CompanyPresent;?>
        	</textarea>
        </td>
     </tr>
     <tr>
        <td height="26" width='18%' ><div align="right"><strong>个人简介:</strong></div></td>
        <td height="26">
        	<!-- 这里同样通过一个小型的 textarea来达到目的 -->
        	<textarea name='UserExperience' id='UserExperience'  cols='40' rows='3' >
        		<?=$SFUserExperience;?>
        	</textarea>
        </td>
     </tr>
      <tr>
     <!-- 点击保存 后者 取消 -->
     <td height="26" colspan='2'  align="center"><a href='#submit' id='per_job_protect'><img src='images/protect_btn.jpg'></a>
        <a href='#cancel' id='per_job_cancel'><img src='images/cancel_pro.jpg'></a>  
     </tr>
</table>
</body>
