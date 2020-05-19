<?php
//今昔风采  主要是 上传的图片 之类的事情

include_once "../include/SqlHelper.class.php";
include_once "../include/AssPage.class.php";
include_once '../include/ComFunction.php';
$sqlHelper = new SqlHelper();
$assPage = new AssPage();
$assPage->pageSize=3; //每页显示3张
if (isset($_GET['pageNow'])) {
	$assPage->pageNow = $_GET['pageNow'];
} else {
	$assPage->pageNow = 0;
}

//查询出昔日趣事的个数
$sql_count = "Select count(PhotoId) from t_photo";
//下面建立查询当前页中显示数据
$aa = $assPage->pageNow*$assPage->pageSize;
$pageCount = $assPage->pageNow*$assPage->pageSize;
$temp_page = $assPage->pageNow*$assPage->pageSize;
$sql_Photo_pageNow= "Select * from t_photo  order by PhotoId desc,PhotoTime desc limit $temp_page , $assPage->pageSize";
$sqlHelper->excute_dql_asspage($sql_count, $sql_Photo_pageNow, $assPage);
//这里获取本页面中的今夕往事的数据

//函数 getThings() 用于获取本页面中的 今昔往事 START
function getPhotos(){
	global $assPage;
	for($i=0; $i<count($assPage->pageArr); $i++){
		echo "<tr  bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
		echo "<td align='center'>".NewsCategory($assPage->pageArr[$i]['PhotoType'])."</td>";
		echo "<td align=left><img src='../".$assPage->pageArr[$i]['PhotoAdd']."' width='240px' height='130px'/></td>";
		echo "<td valign='top'>".$assPage->pageArr[$i]['PhotoPresent']."</td>";
		echo "<td align='center'>".getUserFromT_class($assPage->pageArr[$i]['SFUserId'])."</td>";
		echo "<td align='center'>".$assPage->pageArr[$i]['PhotoTimes']."</td>";
		echo "<td align='center'>".$assPage->pageArr[$i]['PhotoTime']."</td>";
		echo "<td align='center'><a href='addPics.php?words_id=".$assPage->pageArr[$i]['PhotoId']."&type=3'><font color='red'>修改/删除</font></a></td>";
		//这里要对这个修改删除 链接进行处理  希望能做到 公用 
		echo "</tr>";
	}
}
//函数 getThings() 用于获取本页面中的 今昔往事 END
//分页  START
function getPage(){
	global $assPage;
	echo "<a href='bkmiens.php?pageNow=0'>首页</a>　";
	if($assPage->pageNow>0){
		$prePage = $_GET['pageNow']-1;
		echo "<a href='bkmiens.php?pageNow=".$prePage."'>上一页</a>　";
	}else{
		echo "上一页　";
	}
	$first_page = $assPage->pageNow-$assPage->pageNow%10;
	for($i=0; $i<10; $i++){
		$now_page = $first_page+$i;
		$temp_page = $now_page+1;
		if($now_page <= $assPage->pageCount-1){
			echo "<a href='bkmiens.php?pageNow=".$now_page."'>[".$temp_page."]</a>　";
		}
	}
	if($assPage->pageNow<$assPage->pageCount-1){
		if(isset($_GET['pageNow'])){
			$nextPage = $_GET['pageNow']+1;
		}else{
			$nextPage = 1;
		}
		echo "<a href='bkmiens.php?pageNow=".$nextPage."'>下一页　</a>";
	}else{
		echo "　下一页　";
	}
	if($assPage->pageCount-1 >=0){
		$temp_page_last = $assPage->pageCount-1;
	}else{
		$temp_page_last = 0;
	}
	echo "<a href=bkmiens.php?pageNow=$temp_page_last>末页</a>　";
	echo "共 $assPage->pageCount 页";
}
	//分页  END
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin_style.css" rel="stylesheet" type="text/css" />
<title>校友网后台管理系统</title>
</head>
<body>
<table width=100% border=0 align=center cellpadding=0 cellspacing=0 height="620">
  <tr>
    <td height="120" colspan="2" align="center">
     <div class="header_resize">
      <div class="logo"><img src="../images/1_03.jpg" width='100%' height="150px"/></div>
      <div class="clr"></div>                                      
    </td>
  </tr>
  <tr>
    <td width="140" height="524" align="center" bgcolor="#B8D1E5" valign="top">
    <?php include_once "menu.php";
    		//这里对管理员是否登录进行验证 	START
    	if(!LoginOK()){
			echo '<script> alert("您还未登录,无权限"); location.replace("index.php")</script>';
		exit();
		//这里对管理员是否登录进行验证 	END
    }
	?>
    </td>
    <td width="1128" height="404" align="center" valign="top"><table width="99%" border="0" cellspacing="1" cellpadding="4"  bgcolor="#CBD8E1">
      <tr bgcolor="#F3F8FC">
        <td height="510" align="center" valign="top">
        <table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
          <tr bgcolor="#F3F8FC">
            <td height="32" align="left" valign="top" bgcolor="#F3F8FC"><div id='mainTop4'>今昔风采</div></td>
          </tr>
          
          	<!-- 这里是进行添加和管理今夕风采的链接  START -->
        	  <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
    		    <td>　　<a href='addPics.php?type=1'><font color='red' size='4'><b>添加风采</b></font></a>　　　　　　　　 <a href="bkmiens.php"><font color='red' size='4'><b>管理风采</b></font></a></td>
    		    <!-- 这里将 addPics.php?type =1  意味添加今昔风采的图片   -->
    		  </tr>
    		<!-- 这里是进行添加和管理今夕风采的链接  END -->
          <tr align="left" valign="top" bgcolor="#F3F8FC">
            <td height="478">
            
            <!-- 这里添加今夕风采的详细信息列表  START-->
            	<table  width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
                	<tr  bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
                    	<td align="center" width="81">分类</td>
                        <td width="155" align="center">今昔风采</td>
                        <td width="443" align="center">图片描述</td>
                        <td width="62" align='center'>作者</td>
                        <td width="40" align="center">浏览量</td>
                        <td width="89" align="center">添加时间</td>
                        <td width="65" align="center">修改/删除</td>
                    </tr>
					<?php getPhotos();?>
                </table>
             <!-- 这里添加今夕风采的详细信息列表  END--> 
             
             <!-- 分页start -->
             	<div id="Page">
                    <?php
						getPage();
                    ?>
                </div>
               <!-- 分页end -->
			</td>
          </tr>
        </table>
        </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="100" colspan="2" align="center" background="../images/icon/adminbg.jpg"><?include_once "bot.htm"?></td>
  </tr>
</table>
</body>
</html>