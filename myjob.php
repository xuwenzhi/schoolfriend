<head>
<script language='JavaScript'>
	$(document).ready(function(){
		$("#edit_job").click(function(){
			  $("#myzone").load('myjobedit.php'); //将可以编辑的页面调过来
		  });
		//当鼠标滑过 myzone.htm中 id为myzone的div时  显示编辑链接
		  $("#myzone").hover(function(){
				$("#edit_person_infor").show("fast");
		  },function(){
				$("#edit_person_infor").hide("fast");
		  });
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
	
	$CompanyTrade = $arr_get_users_infor[0]['CompanyTrade']; //公司行业编号
	//在t_trade 中获取公司行业 START
	$sql_company_trade = "Select TradeName from t_trade where TradeId = '$CompanyTrade'";
	$arr_company_trade = $sqlHelper->execute_dql2($sql_company_trade);
	if($arr_company_trade){
		$UserCompanyTrade = $arr_company_trade[0]['TradeName'];
	}else{
		$UserCompanyTrade = "";
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
<!-- 这里放一个编辑的框 并且是隐藏的   用于编辑-->
      <div id='edit_person_infor'  style="position:absolute;left:1080px;width:100px;height:50px;">
           <a href='#job' id='edit_job'><img src="./images/edit_infor.jpg" ></a>
      </div>
<table id="person_info" width="780" border="0" align="center" cellpadding="0" cellspacing="0" class="biaoge">
     <tr>
     	<td height="25" width='20%' ><div align="right"><strong>最后学历:</strong></div></td>
     	<td width="80%" height="23" ><?=$UserLastDegree?></td>
     </tr>
     <tr>
        <td height="25" width='20%' ><div align="right"><strong>职称:</strong></div></td>
        <td height="25"><?=$UserRank?></td>
     </tr>
     <tr>
        <td height="25" width='20%' ><div align="right"><strong>职位:</strong></div></td>
        <td height="25"><?=$SFUserPosition?></td>
     </tr>
     <tr>
         <td height="25" width='20%'  ><div align="right"><strong>办公电话:</strong></div></td>
         <td height="25" ><?=$SFUserWTel?></td>
     </tr>
     <tr>
         <td height="25" width='20%' ><div align="right"><strong>就职公司:</strong></div></td>
         <td height="25" ><?=$SFUserCompany?></td>
     </tr>
     <tr>
         <td height="25" width='20%' ><div align="right"><strong>与就职公司的关系:</strong></div></td>
         <td height="25" ><?=$SFUserRelasion?></td>
     </tr>
     <tr>
         <td height="25" width='20%' ><div align="right"><strong>公司行业:</strong></div></td>
         <td height="25" ><?=$UserCompanyTrade?></td>
     </tr>
     <tr>
         <td height="28" width='20%' ><div align="right"><strong>公司类别:</strong></div></td>
         <td height="28" ><?=$UserCompanyType?></td>
     </tr>
     <tr>
        <td height="30" width='20%' ><div align="right"><strong>公司地址:</strong></div></td>
        <td height="30"><?=$CompanyAdd?></td>
     </tr>
     <tr>
        <td height="47" width='20%' ><div align="right"><strong>公司介绍:</strong></div></td>
        <td height="47">
        	<?php
        		echo $CompanyPresent;
        	?>
        </td>
     </tr>
     <tr>
        <td height="51" width='20%' ><div align="right"><strong>个人简介:</strong></div></td>
        <td height="51">
        	<?php
        		echo $SFUserExperience;
        	?>
        </td>
     </tr>
</table>