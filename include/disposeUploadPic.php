<?php
//该页面用于处理  前台用户添加 今昔风采照片  以及 后台管理员添加今昔风采照片  
	header("Content-Type:text/html; charset=utf8");
	session_start();//开启 session
	require_once '../bkadmin/PubFunction.php';
	require_once '../include/ComFunction.php';
		//证明是上传图片
	$type = $_GET['type'];  //获取上传类型
	if($type == '1'){
		//上传今昔风采的照片
		require_once '../include/SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		require_once 'UploadPic.class.php';//引图片上传的类
		$uploadImg = new UploadPic();
		//下面为对象设定变量
		$uploadImg->ImgName = &$_FILES['ImgName']; //获取图片的名称
		$uploadImg->ImgPath = '../upload/images'; //设定图片存放路径
		$uploadImg->ImgMaxSize = 4000000;   //设定图片的最大尺寸
		$uploadImg->ImgType = array('image/jpg','image/jpeg', 'image/gif', 'image/png');
		$uploadImg->checkImg();
		$uploadImg->boolWH = "0"; //是否对上传的图片进行裁剪
		$uploadImg->ImgWidth = "300px";	//设定裁剪尺寸
		$uploadImg->ImgHeight = "300px";	//设定裁剪尺寸
		$uploadImg->finishUpload();
		
		//构造存入数据库的图片路径
		$img_file_way = substr($uploadImg->dbFileName, 3, strlen($uploadImg->dbFileName));
		//会发现这上面对类的属性dbFileName  进行了截取 实际上是因为希望在数据库中得到的图片路径为 upload/images/图片名
		//而该属性 得到的会是 ../upload/images/图片名   所以这里进行了截取
		
		
		//下面生成上传图片的 缩略图
		$src_img = $uploadImg->dbFileName;//图片的路径
		$temp_img_name = substr($uploadImg->dbFileName, 0, strlen($uploadImg->dbFileName)-4)."_thumb.jpg"; 
		$dst_img = $temp_img_name;
		$stat = img2thumb($src_img, $dst_img, $width = 250, $height = 150, $cut = 1, $proportion = 0);
		if(!$stat){
			echo'<script> alert("上传失败!"); location.replace ("../bkadmin/bkmiens.php") </script>'; exit();
		}
		//缩略图 与正常图片的路径 差不多 只不过后面添加了 _thumb.jpg
		
		//下面将图片路径写入数据库
		$photoType = $_POST['photo_type'];  //照片类型
		$photoContent = $_POST['PicContent'];//照片描述
		if(isset($_SESSION['LoginUserCode'])){
			$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']); //通过用户名来获取该用户的id
		}
		if(isset($_POST['USERID'])){
			$UserId = $_POST['USERID'];
		}
		$sql_add_person_pic = "insert into t_photo(SFUserId, PhotoType,PhotoAdd,PhotoPresent,Visibility,PhotoTime,PhotoTimes, PhotoTitle)";
		$sql_add_person_pic .=" values($UserId,$photoType, '".$img_file_way."','".$photoContent."', 1, now(), 0, '')";
		$add_result = $sqlHelper->execute_dql($sql_add_person_pic);
		if($add_result){
			if(isset($_GET['do']) && $_GET['do']=='update'){
				echo'<script> alert("上传成功!"); location.replace ("../miens.php") </script>'; exit();
			}else{
				echo'<script> alert("上传成功!"); location.replace ("../bkadmin/bkmiens.php") </script>'; exit();
			}
		}else{
			echo'<script> alert("上传失败!"); location.replace ("../bkadmin/addPics.php?type=$type") </script>'; exit();
		}
	}
	if($type==3) {
		require_once '../include/SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		if($_FILES['ImgName']['name']!=""){
			//如果从新选择了照片
			require_once 'UploadPic.class.php';//引图片上传的类
			$uploadImg = new UploadPic();
			//下面为对象设定变量
			$uploadImg->ImgName = &$_FILES['ImgName']; //获取图片的名称
			$uploadImg->ImgPath = '../upload/images'; //设定图片存放路径
			$uploadImg->ImgMaxSize = 4000000;   //设定图片的最大尺寸
			$uploadImg->ImgType = array('image/jpg','image/jpeg', 'image/gif', 'image/png');
			$uploadImg->checkImg();
			$uploadImg->boolWH = "0"; //是否对上传的图片进行裁剪
			$uploadImg->ImgWidth = "300px";	//设定裁剪尺寸
			$uploadImg->ImgHeight = "300px";	//设定裁剪尺寸
			$uploadImg->finishUpload();
			
			//构造存入数据库的图片路径
			$img_file_way = substr($uploadImg->dbFileName, 3, strlen($uploadImg->dbFileName));
			//会发现这上面对类的属性dbFileName  进行了截取 实际上是因为希望在数据库中得到的图片路径为 upload/images/图片名
			//而该属性 得到的会是 ../upload/images/图片名   所以这里进行了截取

			//下面生成上传图片的 缩略图
			$src_img = $uploadImg->dbFileName;//图片的路径
			$temp_img_name = substr($uploadImg->dbFileName, 0, strlen($uploadImg->dbFileName)-4)."_thumb.jpg";
			
			$dst_img = $temp_img_name;
			$stat = img2thumb($src_img, $dst_img, $width = 300, $height = 200, $cut = 1, $proportion = 0);
			if(!$stat){
				echo'<script> alert("上传失败!"); location.replace ("../bkadmin/bkmiens.php") </script>'; exit();
			}
			
			//下面将图片路径写入数据库
			if(isset($_POST['photo_type'])){
				$photoType = $_POST['photo_type'];  //照片类型
			}
			$photoContent = $_POST['PicContent'];//照片描述
			if(isset($_SESSION['LoginUserCode'])){
				$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']); //通过用户名来获取该用户的id
			}
			if(isset($_POST['USERID'])){
				$UserId = $_POST['USERID'];
			}
			
			//点击删除按钮
			if(@$_POST['deleteWords'] != ""){ 
				//将图片删除
				$orginal_pic= $_POST['orginal_pic'];
				$orginal_pic = "../".$orginal_pic;
				unlink($orginal_pic);
				
				$word_id = $_POST['words_id']; //文章 id
				$sql_delete_words = "Delete From t_Photo where PhotoId = $word_id";
				$delete_result = $sqlHelper ->execute_dql($sql_delete_words);
				if($delete_result !="") {
					echo '<script> alert("删除成功!"); location.replace("../bkadmin/bkmiens.php")</script>';
					exit();
				}else {
					echo '<script> alert("删除失败,请重试!"); location.replace("../bkadmin/bkmiens.php")</script>';
					exit();
				}
			}
			//点击修改按钮
			if(@$_POST['submitWords'] != ""){

				//将原图片删除
				$orginal_pic= $_POST['orginal_pic'];
				$orginal_pic = "../".$orginal_pic;
				unlink($orginal_pic);
				$word_id = $_POST['words_id']; //文章 id
				$Content = $_POST['PicContent'];//获得修改的内容
				$photo_category = $_POST['photoCategory'];
				$sql_update_words = "Update t_photo set PhotoPresent='".$Content."',PhotoAdd='".$img_file_way."',PhotoType=".$photo_category." where PhotoId = $word_id";
				$update_result = $sqlHelper->execute_dql($sql_update_words);
				if($update_result != ""){
					echo '<script> alert("修改成功!"); location.replace("../bkadmin/bkmiens.php")</script>';
					exit();
				}else {
					echo '<script> alert("修改失败,请重试!"); location.replace("../bkadmin/bkmiens.php")</script>';
					exit();
				}
			}
		}else{
			//如果没有重新选择照片  
			
			//点击删除按钮
			if(@$_POST['deleteWords'] != ""){ 

				//将原图片删除
				$orginal_pic= $_POST['orginal_pic'];
				$orginal_pic = "../".$orginal_pic;
				unlink($orginal_pic);
				$word_id = $_POST['words_id']; //文章 id
				$sql_delete_words = "Delete From t_Photo where PhotoId = $word_id";
				$delete_result = $sqlHelper ->execute_dql($sql_delete_words);
				if($delete_result !="") {
					echo '<script> alert("删除成功!"); location.replace("../bkadmin/bkmiens.php")</script>';
					exit();
				}else {
					echo '<script> alert("删除失败,请重试!"); location.replace("../bkadmin/bkmiens.php")</script>';
					exit();
				}
			}
			//点击修改按钮
			if(@$_POST['submitWords'] != ""){
				$word_id = $_POST['words_id']; //文章 id
				$Content = $_POST['PicContent'];//获得修改的内容
				$photo_category = $_POST['photoCategory'];
				echo $_POST['ImgName'];
				$sql_update_words = "Update t_photo set PhotoPresent='".$Content."',PhotoType=".$photo_category." where PhotoId = $word_id";
				$update_result = $sqlHelper->execute_dql($sql_update_words);
				if($update_result != ""){
					echo '<script> alert("修改成功!"); location.replace("../bkadmin/bkmiens.php")</script>';
					exit();
				}else {
					echo '<script> alert("修改失败,请重试!"); location.replace("../bkadmin/bkmiens.php")</script>';
					exit();
				}
			}
		}
	}