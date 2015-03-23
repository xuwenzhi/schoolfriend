<?php
	session_start();  //同样要传递session
	//处理图片上传
	require_once 'UploadPic.class.php';//引图片上传的类
	$uploadImg = new UploadPic();
	//下面为对象设定变量
	$uploadImg->ImgName = &$_FILES['perfon_pic']; //获取图片的名称
	$uploadImg->ImgPath = '../upload/images'; //设定图片存放路径
	$uploadImg->ImgMaxSize = 4000000;   //设定图片的最大尺寸
	$uploadImg->ImgType = array('image/jpg','image/jpeg', 'image/gif', 'image/png');
	$uploadImg->checkImg();
	$uploadImg->boolWH = "0"; //是否对上传的图片进行裁剪
	$uploadImg->ImgWidth = "300px";	//设定裁剪尺寸
	$uploadImg->ImgHeight = "300px";	//设定裁剪尺寸
	$uploadImg->finishUpload();

	//上面进行了对图片存入服务器文件夹 下面进行对图片的路径写入数据库
	require_once 'SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	//构造存入数据库的图片路径
	$img_file_way = substr($uploadImg->dbFileName, 3, strlen($uploadImg->dbFileName));
	//会发现这上面对类的属性dbFileName  进行了截取 实际上是因为希望在数据库中得到的图片路径为 upload/images/图片名
	//而该属性 得到的会是 ../upload/images/图片名   所以这里进行了截取
	
	//将原来的图片删除
	$sql_original_pic  = "Select SFUserAdd from t_sfuser where SFUserId = $_SESSION[USERID]";
	$arr_original_pic = $sqlHelper->execute_dql2($sql_original_pic);
	$original_pic_way = "../".$arr_original_pic[0]['SFUserAdd']; //构造删除图片的路径
	unlink($original_pic_way); //执行删除

	//下面将图片路径写入数据库
	$sql_add_person_pic = "Update t_sfuser Set SFUserAdd = '$img_file_way' Where SFUserId = $_SESSION[USERID]";
	$add_result = $sqlHelper->execute_dql($sql_add_person_pic);
	if($add_result){
		echo '<script>history.go(-1)</script>';	
		exit();
	}else{
		echo'<script> alert("修改失败!"); location.replace ("../index.php") </script>'; exit();
	}
?>
