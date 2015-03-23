<?php
//此文件用于修改供求信息 昔日趣事 产品推介的 信息的 显示顺序 也就是 置顶
/*
 * 该文件完成几项内容的 置顶
 * 当获取到的$type_id  == 1 时  置顶 新闻公告  ==2时  置顶昔日趣事   ==4 修改产品推介的置顶信息
 */
header("Content-Type:text/html; charset=utf8");
require_once 'SqlHelper.class.php';
$sqlHelper = new SqlHelper();
$type_id  = $_GET['type_id'];
if($type_id == 1){
	//如果type_id == 1 修改新闻公告的置顶信息
	$order_number = $_POST['ordername'];
	$news_id = $_POST['news_id'];
	//建立修改置顶数的查询
	$sql_update_news_order = "update t_news set NewsOrder = $order_number where NewsId =$news_id ";
	//执行昔日趣事的置顶
	$update_result = $sqlHelper->execute_dql($sql_update_news_order);
	if($update_result != ""){
		echo '<script> alert("置顶成功!"); location.replace("../bknews.php")</script>';
		exit();
	}else{
		echo '<script> alert("置顶失败，请重试!"); location.replace("../bknews.php")</script>';
		exit();
	}
}else if($type_id == 2){
	//如果type_id == 2  修改昔日趣事的置顶信息
	$order_number = $_POST['ordername'];
	$thing_id = $_POST['thing_id'];
	//建立修改置顶数的查询
	$sql_update_thing_order = "update t_thing set ThingOrder = $order_number where ThingId =$thing_id ";
	//执行昔日趣事的置顶
	$update_result = $sqlHelper->execute_dql($sql_update_thing_order);
	if($update_result != ""){
		echo '<script> alert("置顶成功!"); location.replace("../bkthings.php")</script>';
		exit();
	}else{
		echo '<script> alert("置顶失败，请重试!"); location.replace("../bkthings.php")</script>';
		exit();
	}
}else if($type_id == 3){
	//如果type_id == 3  修改供求信息
	$order_number = $_POST['ordername'];
	$information_id = $_POST['information_id'];
	//建立修改置顶数的查询
	$sql_update_product_order = "update t_information set InfoOrder = $order_number where InfoId =$information_id ";
	//执行昔日趣事的置顶
	$update_result = $sqlHelper->execute_dql($sql_update_product_order);
	if($update_result != ""){
		echo '<script> alert("置顶成功!"); location.replace("../bkinformations.php")</script>';
		exit();
	}else{
		echo '<script> alert("置顶失败，请重试!"); location.replace("../bkinformations.php")</script>';
		exit();
	}
}else if($type_id == 4){
	//如果type_id == 2  修改产品推介的置顶信息
	$order_number = $_POST['ordername'];
	$product_id = $_POST['product_id'];
	//建立修改置顶数的查询
	$sql_update_product_order = "update t_product set ProductOrder = $order_number where ProductId =$product_id ";
	//执行昔日趣事的置顶
	$update_result = $sqlHelper->execute_dql($sql_update_product_order);
	if($update_result != ""){
		echo '<script> alert("置顶成功!"); location.replace("../bkproducts.php")</script>';
		exit();
	}else{
		echo '<script> alert("置顶失败，请重试!"); location.replace("../bkproducts.php")</script>';
		exit();
	}
}else if($type_id == 5){
	//如果type_id == 2  修改招聘应聘的置顶信息
	$order_number = $_POST['ordername'];
	$recruit_id = $_POST['recruit_id'];
	//建立修改置顶数的查询
	$sql_update_recruit_order = "update t_recruit set RecruitOrder = $order_number where RecruitId =$recruit_id ";
	//执行昔日趣事的置顶
	$update_result = $sqlHelper->execute_dql($sql_update_recruit_order);
	if($update_result != ""){
		echo '<script> alert("置顶成功!"); location.replace("../bkrecruits.php")</script>';
		exit();
	}else{
		echo '<script> alert("置顶失败，请重试!"); location.replace("../bkrecruits.php")</script>';
		exit();
	}
}
?>