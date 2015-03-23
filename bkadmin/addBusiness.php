<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.8.3.js" ></script>
<script type='text/javascript' src="js/getSmallGoods.js"></script>
<script language="javascript" type="text/javascript" src="../js/DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="../include/editor/editor.js"></script>
<script type="text/javascript" src="../include/ckfinder/ckfinder.js"></script>
<script type='text/javascript' src="../include/ckeditor/ckeditor.js"></script>
<title>校友网后台管理系统</title>
</head>
<?php
	include_once "PubFunction.php";
	include_once "../include/SqlHelper.class.php";
	$sqlHelper = new SqlHelper();
	//获取需要添加的文章的类型 START
	if(!isset($_GET['type'])){
		echo '<script> alert("链接非法"); location.replace("index.php")</script>';
		exit();
	}else{
		$type = $_GET['type'];//将需要添加的文章类型 赋给  $type
	}
	//获取需要添加的文章的类型 END
	
	if($type =='product'){
		//如果添加的是产品推介
		if(isset($_GET['do']) && $_GET['do']=='update' && isset($_GET['product_id'])){
			//如果是添加产品推介中 并且是执行修改 的动作
			//需要从数据库中将该 产品推介的信息调取出来
			$sql_get_product = "Select * from t_product where ProductId = $_GET[product_id]";
			$arr_get_product = $sqlHelper->execute_dql2($sql_get_product);//获取的信息全部在 $arr_get_product中
			if(count($arr_get_product) != 0){
				$ProductName = $arr_get_product[0]['ProductName'];//产品名称
				$ProductContent = $arr_get_product[0]['ProductContent'];//产品介绍 
				$ProductFContent = $arr_get_product[0]['ProductFContent'];//产品特殊介绍
				$ProductPrice = $arr_get_product[0]['ProductPrice'];//产品价格
				$ProductUnit = $arr_get_product[0]['ProductUnit']; //单位
				$ProductPAdd = $arr_get_product[0]['ProductPAdd'];//图片地址
				$ProductETime = $arr_get_product[0]['ProductETime'];//截止时间
			}
		}else{
			$ProductName = "";//产品名称
			$ProductContent = "";//产品介绍
			$ProductFContent = "";//产品特殊介绍
			$ProductPrice = "";//产品价格
			$ProductUnit = ""; //单位
			$ProductPAdd = "";//图片地址
			$ProductETime = "";//截止时间
		}
	}

?>
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
            <td height="32" align="left" valign="top" bgcolor="#F3F8FC"><div id='mainTop4'>
            	<?php
            		if($type == 'product'){
            			echo "添加产品推介";
            		}
            	?>
            </div></td>
          </tr>
          <tr align="left" valign="top" bgcolor="#F3F8FC">
            <td height="478">	
            	<!-- 该页面用于添加文章 -->
            	<table width="85%" border="0" align="left" cellpadding="4" cellspacing="1"  bgcolor="#CBD8E1">
            	<form action="include/disposeProductAdd.php?type=<?php echo $_GET['type']; ?>" method="post"  enctype="multipart/form-data" method='post' id='uploadForm' >
    				<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >产品名称</td>
					  <td width="577"><input type="text" name="ProductName" id="advTea" value='<?php echo $ProductName; ?>'  style="width:100%"/></td>
					</tr>
   				    <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
  					  <td height="163" align="right">产品介绍</td>
    				  <td><textarea name="ProductContent" cols="80" rows="200px" id="textcontent"><?php echo $ProductContent;?></textarea></td>
				   	<!--配置ckfinder--><script type="text/javascript">
				   	var editor = CKEDITOR.replace( 'textcontent' );
				  	  CKFinder.setupCKEditor( editor, { basePath : '../include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				    </script>
					</tr>
					<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
  					  <td height="163" align="right">特殊描述</td>
    				  <td><textarea name="ProductFContent" cols="80" rows="200px" id="fcontent"><?php echo $ProductFContent;?></textarea></td>
				   	<!--配置ckfinder--><script type="text/javascript">
				   	var editor = CKEDITOR.replace( 'fcontent' );
				  	  CKFinder.setupCKEditor( editor, { basePath : '../include/ckfinder/', rememberLastFolder : false, toolbar : 'Basic' } ) ;  
				    </script>
					</tr>
					<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >价格</td>
					  <td width="577">
					  	<input type='text' name='ProductPrice'  value='<?php echo $ProductPrice ?>' style="width:100%" />
					  </td>
					</tr>
					<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >图片地址</td>
					  <td width="577"><input type="file" name="ProductPic" id="advTea" value='aaa'/>
					  	<?php 
					  		if(isset($_GET['product_id'])){
					  			echo "<input type='text' name='ProductOriginalPic' value='原图片地址为 :".$ProductPAdd."' style='width:400px'>";
					  		}
					  	?>
					  </td>
					</tr>
					<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >有效时间时间</td>
					  <td width="577"><input type='text' class='Wdate' id='FFirstDate' onClick='WdatePicker()' size='21' name='ProductEndTime' id='RaceON' value='<?php echo $ProductETime;?>'  style='width:150px'/></td>
					</tr>
					<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >单位</td>
					  <td width="577"><input type="text" name="ProductUnit" id="advTea" value='<?php echo $ProductUnit;?>'  style="width:100%"/></td>
					</tr>
					<tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
					  <td width="86" align="right" >是否推荐到广告位</td>
					  <td width="577">
					  	<select name='ProductRecommend'>
					  		<option value='0'>否</option>
					  		<option value='1'>是</option>
					  	</select>
					  </td>
					</tr>
            	<!-- 这里对信息进行 添加   /删除   /修改     END -->
			</td>
          </tr>
          <tr bgcolor="#F3F8FC" onmouseout=this.style.backgroundColor="" onmouseover=this.style.backgroundColor="#D0F2FF">
				<td colspan='2' align="center" >
				
					<?php
						if(!isset($_GET['do'])){
							echo "<input type='submit' name='submitAddProduct' value='提交产品信息' />";
						}else{
							echo "<input type='submit' name='submitUpdateProduct' value='修改产品信息' />";
						}
						 if(isset($_GET['do'])){
						 	echo "<input type='submit' name='deleteProduct' value='删除产品信息' />";
						 }
						 if(isset($_GET['product_id'])){
						 	echo "<input type='hidden' name='product_id' value='".$_GET['product_id']."' />";
						 }
					?>
				</td>
		  </tr>
          </form>
        </table>
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