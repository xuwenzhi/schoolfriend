<?php
//该页面用于显示照片  
/*
 * 因为可能在主页 和 在 miens.php 进入该页面 如果从主页进入 会存在 照片的分类  和 照片的分类  
 * 如果从miens.php  进入该页面 只会获取到该照片的 类别 所以这里要进行一定的处理
 */
session_start();
require_once 'include/smarty/Smarty.class.php';
require_once 'include/SqlHelper.class.php';
$smarty = new Smarty();
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";
$sqlHelper = new SqlHelper();
if(!isset($_GET['phototype'])){
	//如果没有照片的类型  就说明链接非法
	echo '<script> location.replace("miens.php")</script>';
	exit();
}else{
	$photo_type = $_GET['phototype'];//获取照片类别
	if(isset($_GET['photo_id'])){
		//如果存在照片的 ID 就证明是从主页过来的
		$photo_id = $_GET['photo_id'];
		//从数据库中将照片信息提取出来
		$sql_get_photo = "Select PhotoId, PhotoAdd,PhotoPresent from t_photo where PhotoType = $photo_type order by PhotoId desc";
		$arr_get_photo = $sqlHelper ->execute_dql2($sql_get_photo);
		//将图片的缩略图信息 保存到 数组 $arr_get_photo 中
		for($i=0; $i<count($arr_get_photo);$i++){
			$arr_get_photo[$i]['PhotoThumb'] = substr($arr_get_photo[$i]['PhotoAdd'], 0, strlen($arr_get_photo[$i]['PhotoAdd'])-4)."_thumb.jpg";
		}
		//将照片信息分配给模板
		$smarty->assign("PHOTO", $arr_get_photo);
		$str = file_get_contents("js/Picture/js/list.js");
		//$str中含有 变量  用于定位到  点击的图片 所以 要找到 js文件中的 变量 然后替换 就可以了
		//要获得点击图片的编号
		for($i = 0 ; $i<count($arr_get_photo); $i++){
			if($arr_get_photo[$i]['PhotoId'] == $photo_id){
				break;
			}
		}
		$parrten = '/curPic=\d\,nextPic=\d/';
		$replace = "curPic=".$i.",nextPic=".++$i."";//将JS文件中的  当前点击的图片编号 进行修改  但是这样就已经改变了 第一个该显示的图片  如果是从
		//今昔风采 miens.php  点击 进入其中的话 就不会显示第一张了 所以在下方 else处  对其中的 JS文件进行修改回来
		$newStr = preg_replace($parrten , $replace , $str);
		file_put_contents("js/Picture/js/list.js", $newStr);
		
	}else{
		$str = file_get_contents("js/Picture/js/list.js");
		$parrten = '/curPic=\d\,nextPic=\d/';
		$replace = "curPic=0,nextPic=1";
		$newStr = preg_replace($parrten , $replace , $str);
		file_put_contents("js/Picture/js/list.js", $newStr);
		//这里将已经修改的 JS文件 修改回原样 也就是 定位到第一张图片
		
		//如果不存在照片 ID 说明是 从miens.php 中过来的
		//从数据库中将照片信息提取出来
		$sql_get_photo = "Select PhotoId, PhotoAdd,PhotoPresent from t_photo where PhotoType = $photo_type order by PhotoId desc";
		$arr_get_photo = $sqlHelper ->execute_dql2($sql_get_photo);
		//将照片信息分配给模板
		$smarty->assign("PHOTO", $arr_get_photo);
		
		
	}
}
$smarty->display("mien_con.htm");
