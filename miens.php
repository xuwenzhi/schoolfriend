<?php
	session_start();
	require_once 'include/init.php';
	require_once 'include/ComFunction.php';
	require_once 'include/SqlHelper.class.php';
	
	$smarty->left_delimiter = "<{";
	$smarty->right_delimiter = "}>";
	$sqlHelper = new SqlHelper();
	//建立一个数组 将分类 以及分类下的图片 存储在该数组中
	$arr_photo_miens = array();
	
	//取得今昔风采的分类 来自 t_basecode 
	$arr_get_miens_type = get_codeid_from_category(6);
	//将今昔风采的分类 通过循环来存储在 $arr_photo_miens数组中
	for($i = 0; $i<count($arr_get_miens_type); $i++){
		$arr_photo_miens[$i]['CodeId'] = $arr_get_miens_type[$i]['CodeId'];
		$arr_photo_miens[$i]['CodeName'] = $arr_get_miens_type[$i]['CodeName'];
	}
	//现在的$arr_photo_miens 数组 已经存放好了 分类名称 和 ID
	//下面通过循环构造Sql语句 并且将获取到的图片的路径 存放给 $arr_photo_miens中
	for($i = 0 ; $i<count($arr_get_miens_type); $i++){
		//通过不同分类构造Sql语句
		$sql_get_type_photo_add = "Select PhotoAdd,PhotoTime from t_photo where PhotoType = ".$arr_get_miens_type[$i]['CodeId']." order by PhotoId desc, PhotoTimes desc limit 0, 1";
		$arr_get_type_photo_add = $sqlHelper->execute_dql2($sql_get_type_photo_add);//不同分类下的 图片信息 已经在了$arr_get_type_photo_add中
		//下面将 $arr_get_type_photo_add 中的信息 存放到 $arr_photo_miens中		
		//因为只显示一张图片 所以 只通过一次赋值即可
		$arr_photo_miens[$i]['PhotoAdd'] = $arr_get_type_photo_add[0]['PhotoAdd']; //最新一张图片地址复制
		$sql_get_old_phototime = "Select min(PhotoTime) from t_photo where PhotoType = ".$arr_get_miens_type[$i]['CodeId']."";
		$arr_get_old_phototime = $sqlHelper ->execute_dql2($sql_get_old_phototime);
		$arr_photo_miens[$i]['PhotoTime'] = $arr_get_old_phototime[0][0];//最早一张图片上传的时间
		//下面获取到相册的 上传的最早上传的一张图片的 时间
	}
	//现在的 $arr_photo_miens 中 已经有 各个类别 以及各个类别下的 访问量最高的 第一张图片 来作为封面
	
	//将$arr_photo_miens 分配给模板
	$smarty->assign("JXFC", $arr_photo_miens);
	//这里还是同时获取到 该类相册的第一个张最新的图片 为好 然后组合进一个数组中
	
	$smarty->display("miens.htm");
?>