<?php
//该页面用于处理 管理员添加 修改 及 删除  产品推介的的文件
header("Content-Type:text/html; charset=utf8");
session_start();
require_once 'SqlHelper.class.php';
require_once '../PubFunction.php';
$sqlHelpe = new SqlHelper();


//如果点击了 删除 产品推介的删除按钮
if(@$_POST['deleteProduct']!=""){
	//既然是删除 就必然可以得到 产品推介的id
	$product_id = $_POST['product_id'];
	//下面执行删除
	$sql_delete_product = "delete from t_product  where ProductId = $product_id";
	$result_delete_product = $sqlHelpe->execute_dql($sql_delete_product);
	if($result_delete_product!=""){
		echo '<script> alert("成功删除产品推介!"); location.replace("../bkproducts.php")</script>';
		exit();
	}else{
		echo '<script> alert("删除产品推介失败，请重试!"); location.replace("../bkproducts.php")</script>';
		exit();
	}

}
$ProductName = $_POST['ProductName'];//产品名称
$ProductContent  = $_POST['ProductContent'];//内容
$ProductFContent = $_POST['ProductFContent']; //特殊描述
$ProductPrice = $_POST['ProductPrice']; //价格
$ProductEndTime = $_POST['ProductEndTime'];//截止时间
$ProductUnit = $_POST['ProductUnit']; //单位
$ProductRecommend = $_POST['ProductRecommend'];//是否推荐到广告位

$pic_dir = "../../upload/product/"; //构造图片路径

//如果点击了 修改产品推介
if(@$_POST['submitUpdateProduct']!=""){
	//既然是修改 就必然可以得到 产品推介的id
	$product_id = $_POST['product_id'];
	//这里最麻烦的是  判断 管理员是否点击了 从新选择图片
	if($_FILES['ProductPic']['name'] == ""){
		//如果没重新选择了图片
		//下面将产品推介信息 修改		
		$sql_update_product = "Update t_product set ProductName='".$ProductName."',ProductContent='".$ProductContent."',ProductFContent='".$ProductFContent."',ProductPrice='".$ProductPrice."',ProductUnit='".$ProductUnit."',ProductETime='".$ProductEndTime."',ProductRecommend=".$ProductRecommend."";
		$sql_update_product.=" where ProductId =  $product_id";
		$result_update_product = $sqlHelpe->execute_dql($sql_update_product);
		if($result_update_product!=""){
			echo '<script> alert("成功修改产品推介!"); location.replace("../bkproducts.php")</script>';
			exit();
		}else{
			echo '<script> alert("产品推介修改失败，请重新添加!"); location.replace("../bkproducts.php")</script>';
			exit();
		}
	}else{
		//重新选择了图片  首先将图片存好
		$rand_file_name = createRandName();
		$rand_file_name .=".jpg";
		$_FILES['ProductPic']['name'] = $rand_file_name;
		$fileName = $pic_dir.$_FILES['ProductPic']['name']; //图片的路径
		if(!move_uploaded_file($_FILES['ProductPic']['tmp_name'],  $fileName)){
			echo '<script> alert("图片修改失败，请重新添加!"); location.replace("../addBusiness.php?type=product")</script>';
			exit();
		}
		//调整图片大小
		$ret = resize_image( $fileName, $fileName, '460', '240');
		if(!$ret){
			echo '<script> alert("图片修改失败，请重新添加!"); location.replace("../addBusiness.php?type=product")</script>';
			exit();
		}
		$fileName = substr($fileName, 6, strlen($fileName));//需要存入数据库的图片的路径
		//将原图片在服务器文件夹删除
		$sql_delete_orginal_pic= "select ProductPAdd from t_product where ProductId = $product_id";
		$arr_orginal_pic= $sqlHelpe->execute_dql2($sql_delete_orginal_pic);
		$orginalPic = "../../".$arr_orginal_pic[0]['ProductPAdd'];
		unlink($orginalPic);
		
		//下面执行修改
		$sql_update_product = "Update t_product set ProductName='".$ProductName."',ProductContent='".$ProductContent."',ProductFContent='".$ProductFContent."',ProductPrice='".$ProductPrice."',ProductUnit='".$ProductUnit."',ProductPAdd='".$fileName."',ProductETime='".$ProductEndTime."',ProductRecommend=".$ProductRecommend."";
		$sql_update_product.=" where ProductId =  $product_id";
		$result_update_product = $sqlHelpe->execute_dql($sql_update_product);
		if($result_update_product!=""){
			echo '<script> alert("成功修改产品推介!"); location.replace("../bkproducts.php")</script>';
			exit();
		}else{
			echo '<script> alert("产品推介修改失败，请重新添加!"); location.replace("../bkproducts.php")</script>';
			exit();
		}
		
	}
	
}

//如果点击了添加产品推介
if(@$_POST['submitAddProduct']!=""){
	//首先将图片进行存储  
	/*
	 * 因为希望将来能够将图片展示在主页上的 所以这里对图片的处理要进行一下特殊处理  
	 * 1 、尤其是名称
	 * 2、图片的大小  这里我用函数将图片处理成 宽460  高 240
	*/
	$rand_file_name = createRandName();
	$rand_file_name .=".jpg";
	$_FILES['ProductPic']['name'] = $rand_file_name;
	$fileName = $pic_dir.$_FILES['ProductPic']['name']; //图片的路径
	if(!move_uploaded_file($_FILES['ProductPic']['tmp_name'],  $fileName)){
		echo '<script> alert("图片上传失败，请重新添加!"); location.replace("../addBusiness.php?type=product")</script>';
		exit();
	}
	//调整图片大小
	$ret = resize_image( $fileName, $fileName, '460', '240');
	if(!$ret){
		echo '<script> alert("图片上传失败，请重新添加!"); location.replace("../addBusiness.php?type=product")</script>';
		exit();
	}
	$fileName = substr($fileName, 6, strlen($fileName));
	//下面将产品推介信息 存进数据库
	$UserId = getUserIdFromUserName($_SESSION['LoginUserCode']); //通过用户名来获取该用户的id
	$sql_add_product = "Insert into t_product(SFUserId,ProductName,ProductContent,ProductFContent,ProductPrice,ProductUnit,ProductPAdd,ProductRTime,ProductETime,Visibility,ProductOrder,ProductRecommend)";
	$sql_add_product.= "values(".$UserId.", '".$ProductName."', '".$ProductContent."', '".$ProductFContent."', '".$ProductPrice."', '".$ProductUnit."','".$fileName."', now(), '".$ProductEndTime."', 1, 0, ".$ProductRecommend.")";
	$result_add_product = $sqlHelpe->execute_dql($sql_add_product);
	if($result_add_product!=""){
		echo '<script> alert("成功添加产品推介!"); location.replace("../bkproducts.php")</script>';
		exit();
	}else{
		echo '<script> alert("产品推介添加失败，请重新添加!"); location.replace("../bkproducts.php")</script>';
		exit();
	}
	
}
    function createRandName(){
		$randStr = '';
		$pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
		for($i=0 ; $i<10; $i++){
			$randStr .= $pattern[rand(0, 51)];
		}
		return $randStr;
	}
	function resize_image($img_src, $new_img_path, $new_width, $new_height)
	{
		$img_info = @getimagesize($img_src);
		if (!$img_info || $new_width < 1 || $new_height < 1 || empty($new_img_path)) {
			return false;
		}
		if (strpos($img_info['mime'], 'jpeg') !== false) {
			$pic_obj = imagecreatefromjpeg($img_src);
		} else if (strpos($img_info['mime'], 'gif') !== false) {
			$pic_obj = imagecreatefromgif($img_src);
		} else if (strpos($img_info['mime'], 'png') !== false) {
			$pic_obj = imagecreatefrompng($img_src);
		} else {
			return false;
		}
	
		$pic_width = imagesx($pic_obj);
		$pic_height = imagesy($pic_obj);
	
		if (function_exists("imagecopyresampled")) {
			$new_img = imagecreatetruecolor($new_width,$new_height);
			imagecopyresampled($new_img, $pic_obj, 0, 0, 0, 0, $new_width, $new_height, $pic_width, $pic_height);
		} else {
			$new_img = imagecreate($new_width, $new_height);
			imagecopyresized($new_img, $pic_obj, 0, 0, 0, 0, $new_width, $new_height, $pic_width, $pic_height);
		}
		if (preg_match('~.([^.]+)$~', $new_img_path, $match)) {
			$new_type = strtolower($match[1]);
			switch ($new_type) {
				case 'jpg':
					imagejpeg($new_img, $new_img_path);
					break;
				case 'gif':
					imagegif($new_img, $new_img_path);
					break;
				case 'png':
					imagepng($new_img, $new_img_path);
					break;
				default:
					imagejpeg($new_img, $new_img_path);
			}
		} else {
			imagejpeg($new_img, $new_img_path);
		}
		imagedestroy($pic_obj);
		imagedestroy($new_img);
		return true;
	}

?>



