<?php
	include_once "PubFunction.php";
	include_once "../include/SqlHelper.class.php";
	include_once "../include/AssPage.class.php";
	include_once '../include/ComFunction.php';
		$sqlHelper = new SqlHelper();
		$assPage = new AssPage();
		$assPage->pageSize=15;
		if(isset($_GET['pageNow'])){
			$assPage->pageNow = $_GET['pageNow'];
		}else{
			$assPage->pageNow = 0;
		}
		//查询出竞赛公告的个数
		$sql_count = "Select count(NewsId) from t_news ";
		//下面建立查询当前页中显示数据
		$aa = $assPage->pageNow*$assPage->pageSize;
		$pageCount = $assPage->pageNow*$assPage->pageSize;
		$temp_page = $assPage->pageNow*$assPage->pageSize;
		$sql_News_pageNow= "Select * from t_news order by NewsOrder desc,NewsId desc limit $temp_page , $assPage->pageSize";

		$sqlHelper->excute_dql_asspage($sql_count, $sql_News_pageNow, $assPage);
		
		function getNewList(){
			global $assPage;
			for($i=0; $i<count($assPage->pageArr); $i++){
				echo "<tr height='1px' height='10px' bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
				echo "<td>";
				echo "<form action='include/updateOrder.php?type_id=1' method='post'>";
				if($assPage->pageArr[$i]['NewsOrder']==""){
					echo "<input type='text' name='ordername' value='0' style='width:25px' /><input type='submit'  style='width:50px;' value='更改'/>";
				}else{
					echo "<input type='text' name='ordername' style='width:25px' value='".$assPage->pageArr[$i]['NewsOrder']."'/><input type='submit' style='width:50px'  value='更改'/>";
				}
				echo "<input type='hidden' name='news_id' value=".$assPage->pageArr[$i]['NewsId']." >";
				echo "</form>";
				echo "</td>";
					
				echo "<td align='center'>";
				echo NewsCategory($assPage->pageArr[$i]['NewsCategory']);
				echo "</td>";
				echo "<td align=left>".$assPage->pageArr[$i]['NewsTitle']."</td>";
				echo "<td align='center'>".getUserFromT_class($assPage->pageArr[$i]['SFUserId'])."</td>";
				echo "<td align='center'>".$assPage->pageArr[$i]['NewsVisitTimes']."</td>";
				echo "<td align='center'>".date("Y-m-d",strtotime($assPage->pageArr[$i]['NewsAddTime']))."</td>";
				echo "<td align='center'><a href='dispose.php?words_id=".$assPage->pageArr[$i]['NewsId']."&type=1'><font color='red'>修改/删除</font></a></td>";
				echo "</tr>";
			}
		}
	
		function getPage(){
			global $assPage;
			echo "<a href='bknews.php?pageNow=0'>首页</a>　";
			if($assPage->pageNow>0){
				$prePage = $_GET['pageNow']-1;
				echo "<a href='bknews.php?pageNow=".$prePage."'>上一页</a>　";
			}else{
				echo "上一页　";
			}
			$first_page = $assPage->pageNow-$assPage->pageNow%10;
			for($i=0; $i<10; $i++){
				$now_page = $first_page+$i;
				$temp_page = $now_page+1;
				if($now_page <= $assPage->pageCount-1){
					echo "<a href='bknews.php?pageNow=".$now_page."'>[".$temp_page."]</a>　";
				}
			}
			if($assPage->pageNow<$assPage->pageCount-1){
				if(isset($_GET['pageNow'])){
					$nextPage = $_GET['pageNow']+1;
				}else{
					$nextPage = 1;
				}
				echo "<a href='bknews.php?pageNow=".$nextPage."'>下一页　</a>";
			}else{
				echo "　下一页　";
			}
		if($assPage->pageCount-1 >=0){
			$temp_page_last = $assPage->pageCount-1;
		}else{
			$temp_page_last = 0;
		}
			echo "<a href=bknews.php?pageNow=$temp_page_last>末页</a>　";
			echo "共 $assPage->pageCount 页";
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin_style.css" rel="stylesheet" type="text/css" />
<title>校友网后台管理系统</title>
</head>
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
	?></td>
    <td width="1128" height="404" align="center" valign="top"><table width="99%" border="0" cellspacing="1" cellpadding="4"  bgcolor="#CBD8E1">
      <tr bgcolor="#F3F8FC">
        <td height="510" align="center" valign="top">
        <table width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
          <tr bgcolor="#F3F8FC">
            <td height="32" align="left" valign="top" bgcolor="#F3F8FC"><div id='mainTop4'>新闻公告</div></td>
          </tr>
          <!-- 这里是进行添加和管理新闻公告的链接  START -->
        	  <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
        	  <!-- 这里 添加新闻的地方  addWords.php?type=1  这里希望能够做活了 最好一个页面添加任何信息都可以    -->
    		    <td>　　<a href='addWords.php?type=1'><font color='red' size='4'><b>添加新闻</b></font></a>　　　　　　　　 <a href="bknews.php"><font color='red' size='4'><b>管理新闻</b></font></a></td>
    		  </tr>
    		<!-- 这里是进行添加和管理新闻公告的链接  END -->
          <tr align="left" valign="top" bgcolor="#F3F8FC">
            <td height="478">
            	<!--   添加东西位置  -->
                  <table  width="100%" border="0" cellspacing="1" cellpadding="1"  bgcolor="#CBD8E1">
                	<tr  bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
                    	<td align="center" width="100">置顶级别</td>
                    	<td align="center" width="103">分类</td>
                        <td width="683" align="center">公告名称</td>
                        <td width="78" align='center'>作者</td>
                        <td width="50" align="center">浏览量</td>
                        <td width="114" align="center">添加时间</td>
                        <td width="77" align="center">修改/删除</td>
                    </tr>
                	<?php  getNewList(); ?>
                </table>
                <div id="Page">
                    <?php
						getPage();
                    ?>
                </div>
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
