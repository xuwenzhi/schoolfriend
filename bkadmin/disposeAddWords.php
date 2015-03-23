<?php
	//该文件用于处理 (添加) 例如 新闻公告   今昔趣事 供求信息  等等等的功能
	header("Content-Type:text/html; charset=utf8");
	session_start();
	require_once 'SqlHelper.class.php';
	require_once '../PubFunction.php';
	$sqlHelper = new SqlHelper();
	//该页面通过 Url获取的 type 值 来确定 添加文章的类型  从而添加文章
	if($_POST['submitAddWords']!=""){
		//如果点击了添加
		if(!isset($_GET['type'])){
			echo '<script> alert("链接非法!"); location.replace("../index.php")</script>';
			exit(); 
		}else{
			$type = $_GET['type'];//获取需要添加文章的类型
		}
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
		}else if($type == 2){
			//如果是今昔风采  构造sql添加语句
			$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']);
			$sql_insert_words = "Insert into t_thing(ThingTitle,ThingContent,SFUserId,ThingTime,ThingOrder,ThingVisitTimes) ";
			$sql_insert_words.= "Values('".$Title."', '".$Content."', ".$UserId.", Now(),0,0)";
			$insert_result  = $sqlHelper->execute_dql($sql_insert_words);
			if($insert_result != ""){
				echo '<script> alert("成功添加今昔趣事!"); location.replace("../bkthings.php")</script>';
				exit();
			}else{
				echo '<script> alert("添加今昔趣事失败，请重试!"); location.replace("../addWords.php")</script>';
				exit();
			}
		}else if($type == 3){
			//如果是今昔风采  构造sql添加语句
			$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']);
			$GoodsType = $_POST['GoodSmallValue'];
			//获取供求信息中 商品的时间
			$GoodsStartTime = $_POST['GoodsStartTime']; // 起始时间
			$GoodsEndTime = $_POST['GoodsEndTime'];	//结束时间
			$sql_insert_words= "Insert into t_information(SFUserId,InfoTitle,InfoContent,InfoRTime,InfoETime,Visibility,InfoType,InfoVisitTimes)";
			$sql_insert_words.= " Values(".$UserId.",'".$Title."', '".$Content."', '".$GoodsStartTime."','".$GoodsEndTime."' ,1,'".$GoodsType."',0)";
			$insert_result  = $sqlHelper->execute_dql($sql_insert_words);
			if($insert_result != ""){
				echo '<script> alert("成功添加供求信息!"); location.replace("../bkinformations.php")</script>';
				exit();
			}else{
				echo '<script> alert("添加供求信息失败，请重试!"); location.replace("../bkinformations.php")</script>';
				exit();
			}
		}else if($type == 4){
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