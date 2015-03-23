<?php
//该页面用于处理 前台 添加 供求信息   还有 修改和删除
header("Content-Type:text/html; charset=utf8");
session_start();
require_once 'SqlHelper.class.php';
require_once 'ComFunction.php';
$sqlHelper = new SqlHelper();
if(!isset($_SESSION['USERID'])){
	echo '<script> alert("链接非法!"); location.replace("../index.php")</script>';
	exit();
}else{
	if(@$_POST['submitAddinfor']!=""){
		$UserId = $_SESSION['USERID'];//用户ID
		$Title = $_POST['Title']; //标题
		$Content = $_POST['Content'];//内容
		$GoodsEndTime = $_POST['GoodsEndTime'];	//结束时间
		$InforType = $_POST['InforType'];
		$pic_dir = "../upload/images/"; //构造图片路径
		//判断是否添加了图片 如果添加了 将图片存入服务器文件夹
		if($_FILES['information_pic']['name'] == ""){
			//如果没有添加图片
			$sql_insert_words= "Insert into t_information(SFUserId,InfoTitle,InfoContent,InfoRTime,InfoETime,Visibility,InfoType,InfoVisitTimes)";
			$sql_insert_words.= " Values(".$UserId.",'".$Title."', '".$Content."', now(),'".$GoodsEndTime."' ,1,'".$InforType."',0)";
			$insert_result  = $sqlHelper->execute_dql($sql_insert_words);
		}else{
			//如果添加了图片  先将图片存入服务器文件夹
			$rand_file_name = createRandName();
			$rand_file_name .=".jpg";
			$_FILES['information_pic']['name'] = $rand_file_name;
			$fileName = $pic_dir.$_FILES['information_pic']['name']; //图片的路径
			if(!move_uploaded_file($_FILES['information_pic']['tmp_name'],  $fileName)){
				echo '<script> alert("图片上传失败，请重新添加!"); location.replace("../informations.php")</script>';
				exit();
			}
				
			$fileName = substr($fileName, 3, strlen($fileName));//需要存入数据库的图片的路径
		
			$sql_insert_words= "Insert into t_information(SFUserId,InfoTitle,InfoContent,InfoPictureAdd,InfoRTime,InfoETime,Visibility,InfoType,InfoVisitTimes)";
			$sql_insert_words.= " Values(".$UserId.",'".$Title."', '".$Content."','".$fileName."', now(),'".$GoodsEndTime."' ,1,'".$InforType."',0)";
			$insert_result  = $sqlHelper->execute_dql($sql_insert_words);
		}
		if($insert_result != ""){
			echo '<script> alert("成功添加供求信息!"); location.replace("../informations.php")</script>';
			exit();
		}else{
			echo '<script> alert("添加供求信息失败，请重试!"); location.replace("../informations.php")</script>';
			exit();
		}
	}
	//下面执行 用户删除自己的供求信息
	if(isset($_GET['infor_id'])){
		$infor_id = $_GET['infor_id'];//供求信息的 id
		$sql_delete_infor = "Delete from t_information where InfoId = $infor_id";
		$result_delete = $sqlHelper->execute_dql($sql_delete_infor);
		if($result_delete!=""){
			echo '<script> alert("删除成功!"); location.replace("../myGoodsInfor.php")</script>';
			exit();
		}else{
			echo '<script> alert("删除失败!"); location.replace("../myGoodsInfor.php")</script>';
			exit();
		}
	}

}