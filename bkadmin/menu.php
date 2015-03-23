<link rel="stylesheet" href="css/accordionmenu.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery1.8.3.js"></script>
<script type="text/javascript" src="js/jmenu.js"></script>

<?php
session_start();
include_once "PubFunction.php";
if(isset($_SESSION["LoginUserName"]))
{	$m="当前用户:". $_SESSION["LoginUserName"];
    $mbgcolor="#C9DCEF";
}
else
{
	$m="当前用户 :游客";//
    $mbgcolor="#DDE9F5";
}

if(FunctionRole("701"))
	$a701="User.php";
else
	$a701="";

if(FunctionRole("702"))
	$a702="Role.php";
else
	$a702="";

if(FunctionRole("703"))
	$a703="PassFind.php";
else
	$a703="";

if(FunctionRole("704"))
	$a704="PassChange.php";
else
	$a704="";
if(FunctionRole("705"))
	$a705="Logout.php";
else
	$a705="";

if(FunctionRole("206"))

	$a206="RaceItemList.php";
else
	$a206="";



if(FunctionRole("201"))
	$a201 = "webUserInfo.php";
else
	$a201="";
	

if(FunctionRole("202"))
	$a202="AddCGT.php";
else
	$a202="";	


if(FunctionRole("203"))
	$a203="AddStuScore.php";
else
	$a203="";	
	
	
if(FunctionRole("101"))
	$a101="bknews.php";
else
	$a101="";	

if(FunctionRole("102"))
	$a102="bkthings.php";
else
	$a102="";	

if(FunctionRole("103"))
	$a103="bkinformations.php";
else
	$a103="";
if(FunctionRole("104"))
	$a104="bkproducts.php";
else
	$a104="";	

if(FunctionRole("105"))
	$a105="bkrecruits.php";
else
	$a105="";	

if(FunctionRole("106"))
	$a106="bkapplys.php";
else
	$a106="";

if(FunctionRole("107"))
	$a107="bkmiens.php";
else
	$a107="";
if(FunctionRole("301"))
	$a301="NewsList.php?id=2&type=11";  
	else{
		$a301="";
}
if(FunctionRole("302"))
	$a302="NewsList.php?id=2&type=12";
	else{
		$a302="";
}
if(FunctionRole("401"))
	$a401="NewsList.php?id=3";
	else{
		$a401="";
}
if(FunctionRole("402"))
	$a402="UploadDatafile.php";
	else{
		$a402="";
}
?>
<table width=97% bgcolor="#DDE9F5" height="100%">
<tr height="20" align="center" bgcolor="<? echo $mbgcolor; ?>"><td><? echo $m;?></td></tr>
<tr align=center bgcolor="#DDE9F5"valign=top><td>
		<ul class="accordion">
		<li id="one" class="files">
				<a href="#one">信息管理</a>
				<ul class="sub-menu">
					<li><a href="<?=$a101;?>"><em>01</em>新闻公告</a></li>
					<li><a href="<?=$a102;?>"><em>02</em>昔日趣事</a></li>
					<li><a href="<?=$a103;?>"><em>03</em>供求信息</a></li>
					<li><a href="<?=$a104;?>"><em>04</em>产品推介</a></li>
					<li><a href="<?=$a105;?>"><em>05</em>招聘应聘</a></li>
					<li><a href="<?=$a106;?>"><em>06</em>求职信息</a></li>
					<li><a href="<?=$a107;?>"><em>07</em>今昔风采</a></li>
				</ul>
			</li>
			<li id="two" class="mail">
 				<a href="#two">网站信息</a>
 				<ul class="sub-menu">
					<li><a href="<?=$a201;?>"><em>01</em>用户信息</a></li>
					<li><a href="<?=$a201;?>"><em>02</em>2</a></li>
					<li><a href="<?=$a202?>"><em>03</em>3</a></li>
					<li><a href="<?=$a203?>"><em>04</em>4</a></li>
					<li><a href="#"><em>05</em>5</a></li>
					<li><a href="#"><em>06</em>6</a></li>

			
				</ul>
			</li>
		

                     
                        
			<li id="senven" class="sign">
				<a href="#senven">用户管理</a>
			    <ul class="sub-menu">
					<li><a href="<?=$a701;?>"><em>01</em>用户管理</a></li>
					<li><a href="<?=$a702;?>"><em>02</em>权限管理</a></li>
					<li><a href="<?=$a703;?>"><em>03</em>密码查询</a></li>
					<li><a href="<?=$a704;?>"><em>04</em>修改密码</a></li>
					<li><a href="quitschool.php"><em>06</em>安全退出</a></li>
				</ul>
		    </li>

		</ul>
 </td></tr></table>