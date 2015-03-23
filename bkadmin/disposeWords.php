<?php
	header("Content-Type:text/html; charset=utf8");
	require_once '../../include/SqlHelper.class.php';
	$sqlHelper = new SqlHelper();
	//该页面用于处理用户点击  (修改) 文章  还是( 删除)文章  按钮 进行处理
	//如果点击删除按钮
	if(@$_POST['deleteWords'] != ""){
		//取得要删除文章的类型  和id
		$word_id = $_GET['words_id']; //文章 id
		$type = $_GET['type'];	//文章类型
		//通过 不同的 type建立sql不同的删除语句
		if($type == 1){
			//如果是新闻公告
			$sql_delete_words = "Delete From t_news where NewsId = $word_id";
		}else if($type ==2){
			//如果是今昔风采
			$sql_delete_words = "Delete From t_thing where ThingId = $word_id";
		}
		//当然肯定还有其他的内容  这里先不做添加
		//下面执行删除sql语句
		$delete_result = $sqlHelper ->execute_dql($sql_delete_words);
		if($delete_result !=""){
			if($type == 1){
				echo '<script> alert("删除成功!"); location.replace("../bknews.php")</script>';
				exit();
			}else if($type ==2){
				echo '<script> alert("删除成功!"); location.replace("../bkthings.php")</script>';
				exit();
			}
		}else{
			if($type == 1){
				echo '<script> alert("删除失败,请重试!"); location.replace("../bknews.php")</script>';
				exit();
			}else if($type ==2){
				echo '<script> alert("删除失败,请重试!"); location.replace("../bkthings.php")</script>';
				exit();
			}
		}
		
	}
	//如果点击修改按钮
	if(@$_POST['submitWords'] != ""){
		//取得要修改文章的类型  和id
		$word_id = $_GET['words_id']; //文章 id
		$type = $_GET['type'];	//文章类型
		$Title = $_POST['Title'];//文章标题
		$Content = $_POST['Content']; //文章内容
		//下面根据不同的文章类型 和 id建立不同的 修改语句
		if($type == 1){
			$news_category = $_POST['newsCategory'];
			$sql_update_words = "Update t_news set NewsTitle = '".$Title."',NewsContent='".$Content."',NewsCategory=".$news_category." where NewsId = $word_id";
		}else if($type ==2){
			$sql_update_words = "Update t_thing set ThingTitle = '".$Title."',ThingContent='".$Content."' where ThingId = $word_id";
		}
		//这里还有其他类型的文章  这里先不做添加
		
		//执行修改的sql语句
		$update_result = $sqlHelper->execute_dql($sql_update_words);
		if($update_result != ""){
			if($type == 1){
				echo '<script> alert("修改成功!"); location.replace("../bknews.php")</script>';
				exit();
			}else if($type ==2){
				echo '<script> alert("修改成功!"); location.replace("../bkthings.php")</script>';
				exit();
			}
		}else{
			if($type == 1){
				echo '<script> alert("修改失败,请重试!"); location.replace("../bknews.php")</script>';
				exit();
			}else if($type ==2){
				echo '<script> alert("修改失败,请重试!"); location.replace("../bkthings.php")</script>';
				exit();
			}
		}
	}
?>