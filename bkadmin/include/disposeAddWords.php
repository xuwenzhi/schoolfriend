<?php
	//该文件用于处理 (添加) 例如 新闻公告   今昔趣事 供求信息  等等等的功能
	header("Content-Type:text/html; charset=utf8");
	session_start();
	require_once 'SqlHelper.class.php';
	require_once '../PubFunction.php';
	$sqlHelper = new SqlHelper();
	if(!isset($_GET['type'])){
		echo '<script> alert("链接非法!"); location.replace("../index.php")</script>';
		exit();
	}else{
		$type = $_GET['type'];//获取需要添加文章的类型
	}
	//该页面通过 Url获取的 type 值 来确定 添加文章的类型  从而添加文章
	if(@$_POST['submitAddWords']!=""){
		//如果点击了添加
		$Title = $_POST['Title']; //标题
		$Content = $_POST['Content'];//内容
		//通过不同的$type  来构造不同的sql语句
		if($type == 1){
			//如果是新闻公告   则还会有一个  新闻公告的类型  来自 t_basecode
			$NewsCategory = $_POST['newsCategory'];
			$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']); //通过用户名来获取该用户的id
			$sql_insert_words = "Insert into t_news(NewsTitle,NewsContent,NewsCategory,NewsAddTime,SFUserId,NewsVisitTimes,NewsOrder)";
			$sql_insert_words.= "Values('".$Title."', '".$Content."','".$NewsCategory."',Now(), ".$UserId.",0,0 )";
			$insert_result = $sqlHelper->execute_dql($sql_insert_words);
			if($insert_result != ""){
				echo '<script> alert("成功添加新闻公告!"); location.replace("../bknews.php")</script>';
				exit();
			}else{
				echo '<script> alert("添加新闻公告失败，请重试!"); location.replace("../addWords.php")</script>';
				exit();
			}
		}
		if($type == 2){
			//如果是昔日趣事  构造sql添加语句
			$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']);
			$ThingHTime = $_POST['ThingHTime'];
			$sql_insert_words = "Insert into t_thing(ThingTitle,ThingContent,SFUserId,ThingTime,ThingHTime,ThingOrder,ThingVisitTimes) ";
			$sql_insert_words.= "Values('".$Title."', '".$Content."', ".$UserId.", Now(),'".$ThingHTime."',0,0)";
			$insert_result  = $sqlHelper->execute_dql($sql_insert_words);
			if($insert_result != ""){
				echo '<script> alert("成功添加昔日趣事!"); location.replace("../bkthings.php")</script>';
				exit();
			}else{
				echo '<script> alert("添加昔日趣事失败，请重试!"); location.replace("../addWords.php")</script>';
				exit();
			}
		}
		if($type == 3){
			//添加 供求信息
			$pic_dir = "../../upload/images/"; //构造图片路径
			$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']);//用户名
			$GoodsEndTime = $_POST['GoodsEndTime'];	//结束时间
			$InforType = $_POST['InforType'];
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
					echo '<script> alert("图片上传失败，请重新添加!"); location.replace("../addBusiness.php?type=product")</script>';
					exit();
				}
			
				$fileName = substr($fileName, 6, strlen($fileName));//需要存入数据库的图片的路径
				
				$sql_insert_words= "Insert into t_information(SFUserId,InfoTitle,InfoContent,InfoPictureAdd,InfoRTime,InfoETime,Visibility,InfoType,InfoVisitTimes)";
				$sql_insert_words.= " Values(".$UserId.",'".$Title."', '".$Content."','".$fileName."', now(),'".$GoodsEndTime."' ,1,'".$InforType."',0)";
				$insert_result  = $sqlHelper->execute_dql($sql_insert_words);
			}
				if($insert_result != ""){
					echo '<script> alert("成功添加供求信息!"); location.replace("../bkinformations.php")</script>';
					exit();
				}else{
					echo '<script> alert("添加供求信息失败，请重试!"); location.replace("../bkinformations.php")</script>';
					exit();
				}
			
		}
		if($type == 4){
			$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']);
			$recruitCate = $_POST['recruitCategory'];
			$Type = $_POST['recruitJob'];
			$Position = $_POST['Position'];
			$Claim = $_POST['Claim'];
			$Location = $_POST['Location'];
			$Degree = $_POST['Degree'];
			$Etime = $_POST['recruitsStartTime'];
			$sql_insert_words = "Insert into t_recruit(SFUserId,RecruitTrade,RecruitTitle,RecruitPosition,RecruitPContent,RecruitClaim,RecruitLocation,RecruitDegree,RecruitType,RecruitTime,RecruitETime)";
			$sql_insert_words.=" Values(".$UserId.",'".$recruitCate."', '".$Title."', '".$Position."', '".$Content."', '".$Claim."', '".$Location."', '".$Degree."', '".$Type."', Now(), '".$Etime."')";
			$insert_result = $sqlHelper->execute_dql($sql_insert_words);
			if($insert_result !="") {
				echo '<script> alert("成功添加招聘信息!"); location.replace("../bkrecruits.php")</script>';
				exit();
			}else {
				echo '<script> alert("添加招聘信息失败，请重试!"); location.replace("../bkrecruits.php")</script>';
				exit();
			}
		}
		
	}
	//生成图片名称函数
	function createRandName(){
		$randStr = '';
		$pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
		for($i=0 ; $i<10; $i++){
			$randStr .= $pattern[rand(0, 51)];
		}
		return $randStr;
	}
	//如果修改供求信息的按钮被点击
	if($type == 3 && @$_POST['submitUpdateInfor'] != ""){
		$Title = $_POST['Title']; //标题
		$Content = $_POST['Content'];//内容
		$inforId = $_POST['inforId']; //需要修改的文章Id
		//这里需要判断 是否对图片进行了修改
		$pic_dir = "../../upload/images/"; //构造图片路径
		$GoodsEndTime = $_POST['GoodsEndTime'];	//结束时间
		$InforType = $_POST['InforType'];
		//判断是否添加了图片 如果添加了 将图片存入服务器文件夹
		if($_FILES['information_pic']['name'] == ""){
			//如果没有添加图片
			$sql_update_information= "update t_information set InfoTitle='".$Title."',InfoContent='".$Content."',InfoETime='".$GoodsEndTime."',InfoType='".$InforType."' where InfoId = $inforId";
			
			$update_result  = $sqlHelper->execute_dql($sql_update_information);
		}else{
			//如果添加了图片  先将图片存入服务器文件夹
			$rand_file_name = createRandName();
			$rand_file_name .=".jpg";
			$_FILES['information_pic']['name'] = $rand_file_name;
			$fileName = $pic_dir.$_FILES['information_pic']['name']; //图片的路径
			if(!move_uploaded_file($_FILES['information_pic']['tmp_name'],  $fileName)){
				echo '<script> alert("图片修改失败，请重新添加!"); location.replace("../addBusiness.php?type=product")</script>';
				exit();
			}
				
			$fileName = substr($fileName, 6, strlen($fileName));//需要存入数据库的图片的路径
		
			$sql_update_information= "update t_information set InfoTitle='".$Title."',InfoContent='".$Content."',InfoPictureAdd='".$fileName."',InfoETime='".$GoodsEndTime."',InfoType='".$InforType."' where InfoId = $inforId";
			
			$update_result  = $sqlHelper->execute_dql($sql_update_information);
		}
		if($update_result != ""){
			echo '<script> alert("成功修改供求信息!"); location.replace("../bkinformations.php")</script>';
			exit();
		}else{
			echo '<script> alert("修改供求信息失败，请重试!"); location.replace("../bkinformations.php")</script>';
			exit();
		}
		
	}
	if($type == 3 && $_POST['deleteInfor']!=""){
		//如果删除供求信息的按钮被点击
		$inforId = $_POST['inforId']; //需要删除的文章Id
		$sql_delete_infor = "Delete from t_information where InfoId = $inforId";
		$result_delete_infor = $sqlHelper->execute_dql($sql_delete_infor);
		if($result_delete_infor!=""){
			echo '<script> alert("成功删除供求信息!"); location.replace("../bkinformations.php")</script>';
			exit();
		}else{
			echo '<script> alert("删除供求信息失败，请重试!"); location.replace("../bkinformations.php")</script>';
			exit();
		}
		
		
	}