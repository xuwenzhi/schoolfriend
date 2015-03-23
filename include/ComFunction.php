<?php
	//函数用于判断某年某月的天数  实际上  通过年份月份来选择每月的天数 应该用二级联动来实现 会更好一些
	function dateValidate($year, $month){
		if($month == 1 || $month == 3 || $month == 5 ||$month == 7 ||$month == 8 ||$month == 10 ||$month == 12){
			return '31';
		}
		if($month == 4 ||$month == 6 ||$month == 9 ||$month == 11){
			return '30';
		}
		//判断年份是否是闰年
		if ( $year%4 == 0 && $year%100 !=0 || $year%400 == 0){
			return '29';
		}else{
			return 28;
		}
	}
	
	
	//用于通过t_class中的SFUserId  到 t_sfuser表中获取姓名
	function getUserFromT_class($userid){
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_get_username = "Select SFUserTrueName  from t_sfuser where SFUserId = $userid";
		$arr_get_username = $sqlHelper ->execute_dql2($sql_get_username);
		if(count($arr_get_username)!=0){
			return $arr_get_username[0]['SFUserTrueName'];
		}
		return "";
	}
	
	
	//输出年份的下拉菜单   从当前年份到之前的 60年
	function echoYearSelect(){
		$now_year = date("Y");
		for($i = $now_year; $i>=$now_year-60; $i--){
			echo "<option value=$i>$i</option>";
		}
	}
	
	//函数 用于判断 用户是否填写了 真实姓名
	function judgeUserTrueName($UserId){
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_judge_truename = "Select SFUserTrueName from t_sfuser where SFUserId = $UserId";
		$arr_judge_truename = $sqlHelper->execute_dql2($sql_judge_truename);
		if($arr_judge_truename[0]['SFUserTrueName']==""){
			return false;
		}else{
			return true;
		}
	}
	
	//这里写一个函数 用于 从t_basecode  中 调取 新闻公告的类别
	function get_newstype_from_t_basecode($news_type_id){
		require_once 'include/SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		//建立sql语句
		$sql_get_newstype = "Select CodeName from t_basecode where  CodeId = $news_type_id";
		$arr_get_newstype = $sqlHelper->execute_dql2($sql_get_newstype);
		return $arr_get_newstype[0]['CodeName'];
	}
	
	//一个非常通用的一个好函数  用在 t_basecode  中  通过选择类别 来获取 主键

	function get_codeid_from_category($category){
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_get_codeid = "Select CodeId, CodeName from t_basecode where CodeCategoryId = $category";
		$arr_get_codeid = $sqlHelper ->execute_dql2($sql_get_codeid);
		if(count($arr_get_codeid) != 0){
			return $arr_get_codeid;
		}else{
			return "";
		}
	}
	//获取行业的大类
	function get_tradeid_from_category() {
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_get_tradeid = "Select TradeId,TradeName From t_trade Where length(TradeId)=2";
		$arr_get_tradeid = $sqlHelper->execute_dql2($sql_get_tradeid);
		if(count($arr_get_tradeid)!=0) {
			return $arr_get_tradeid;
		}else {
			return "";
		}
	}
	//获取市
	function get_cityid_from_category() {
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_get_cityid = "Select CityId,CityName From t_idcode Where length(CityId)=2";
		$arr_get_cityid = $sqlHelper->execute_dql2($sql_get_cityid);
		if(count($arr_get_cityid)!=0) {
			return $arr_get_cityid;
		}else {
			return "";
		}
	}
	//判断用户是否加入班级 
	function judgeJoinClass($UserId){
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_judge_join_class  = "Select ClassId from t_sfuser where SFUserId = $UserId";
		$arr_judge_join_class = $sqlHelper->execute_dql2($sql_judge_join_class);
		if($arr_judge_join_class[0]['ClassId']==""){
			return 1;
		}else{
			return 0;
		}
	}
	//判断用户是否关注班级
	function judgeAttentionClass($UserId){
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_judge_join_class  = "Select ClassFriendId from t_sfuser where SFUserId = $UserId";
		echo $sql_judge_join_class;
		$arr_judge_join_class = $sqlHelper->execute_dql2($sql_judge_join_class);
		if($arr_judge_join_class[0]['ClassFriendId']==""){
			return 1;
		}else{
			return 0;
		}
	}
	
	
	/**
	 * 生成缩略图
	 * @author yangzhiguo0903@163.com
	 * @param string     源图绝对完整地址{带文件名及后缀名}
	 * @param string     目标图绝对完整地址{带文件名及后缀名}
	 * @param int        缩略图宽{0:此时目标高度不能为0，目标宽度为源图宽*(目标高度/源图高)}
	 * @param int        缩略图高{0:此时目标宽度不能为0，目标高度为源图高*(目标宽度/源图宽)}
	 * @param int        是否裁切{宽,高必须非0}
	 * @param int/float  缩放{0:不缩放, 0<this<1:缩放到相应比例(此时宽高限制和裁切均失效)}
	 * @return boolean
	 */
	function img2thumb($src_img, $dst_img, $width = 75, $height = 75, $cut = 0, $proportion = 0)
	{
		if(!is_file($src_img))
		{
			return false;
		}
		$ot = fileext($dst_img);
		$otfunc = 'image' . ($ot == 'jpg' ? 'jpeg' : $ot);
		$srcinfo = getimagesize($src_img);
		$src_w = $srcinfo[0];
		$src_h = $srcinfo[1];
		$type  = strtolower(substr(image_type_to_extension($srcinfo[2]), 1));
		$createfun = 'imagecreatefrom' . ($type == 'jpg' ? 'jpeg' : $type);
	
		$dst_h = $height;
		$dst_w = $width;
		$x = $y = 0;
	
		/**
		 * 缩略图不超过源图尺寸（前提是宽或高只有一个）
		 */
		if(($width> $src_w && $height> $src_h) || ($height> $src_h && $width == 0) || ($width> $src_w && $height == 0))
		{
			$proportion = 1;
		}
		if($width> $src_w)
		{
			$dst_w = $width = $src_w;
		}
		if($height> $src_h)
		{
			$dst_h = $height = $src_h;
		}
	
		if(!$width && !$height && !$proportion)
		{
			return false;
		}
		if(!$proportion)
		{
			if($cut == 0)
			{
				if($dst_w && $dst_h)
				{
					if($dst_w/$src_w> $dst_h/$src_h)
					{
						$dst_w = $src_w * ($dst_h / $src_h);
						$x = 0 - ($dst_w - $width) / 2;
					}
					else
					{
						$dst_h = $src_h * ($dst_w / $src_w);
						$y = 0 - ($dst_h - $height) / 2;
					}
				}
				else if($dst_w xor $dst_h)
				{
					if($dst_w && !$dst_h)  //有宽无高
					{
						$propor = $dst_w / $src_w;
						$height = $dst_h  = $src_h * $propor;
					}
					else if(!$dst_w && $dst_h)  //有高无宽
					{
						$propor = $dst_h / $src_h;
						$width  = $dst_w = $src_w * $propor;
					}
				}
			}
			else
			{
				if(!$dst_h)  //裁剪时无高
				{
					$height = $dst_h = $dst_w;
				}
				if(!$dst_w)  //裁剪时无宽
				{
					$width = $dst_w = $dst_h;
				}
				$propor = min(max($dst_w / $src_w, $dst_h / $src_h), 1);
				$dst_w = (int)round($src_w * $propor);
				$dst_h = (int)round($src_h * $propor);
				$x = ($width - $dst_w) / 2;
				$y = ($height - $dst_h) / 2;
			}
		}
		else
		{
			$proportion = min($proportion, 1);
			$height = $dst_h = $src_h * $proportion;
			$width  = $dst_w = $src_w * $proportion;
		}
	
		$src = $createfun($src_img);
		$dst = imagecreatetruecolor($width ? $width : $dst_w, $height ? $height : $dst_h);
		$white = imagecolorallocate($dst, 255, 255, 255);
		imagefill($dst, 0, 0, $white);
	
		if(function_exists('imagecopyresampled'))
		{
			imagecopyresampled($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
		}
		else
		{
			imagecopyresized($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
		}
		$otfunc($dst, $dst_img);
		imagedestroy($dst);
		imagedestroy($src);
		return true;
	}
	//添加的函数
	function fileext($file)
	{
		return pathinfo($file, PATHINFO_EXTENSION);
	}
	//生成缩略图  END
	
	//函数用于下拉框选择求职岗位
	
	function get_applyUnit(){
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
			$sql_get_applyUnit = "Select TradeName  from t_trade where length(TradeId)=2";
			$arr_get_Tradename = $sqlHelper ->execute_dql2($sql_get_applyUnit);
	
	
		if(count($arr_get_Tradename[0]) != 0){
			return $arr_get_Tradename;
		}else{
			return "";
		}
	}
	function get_applyLocation(){
		require_once 'SqlHelper.class.php';
		$sqlHelper = new SqlHelper();
		$sql_get_applycity = "Select CityName from t_idcode where length(CityId) =2";
		$arr_get_applyLocation= $sqlHelper ->execute_dql2($sql_get_applycity);
		if(count($arr_get_applyLocation) != 0){
			return $arr_get_applyLocation;
		}else{
			return "";
		}
	}
	//生成一个图片的随机名称
	function createRandName(){
		$randStr = '';
		$pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
		for($i=0 ; $i<20; $i++){
			$randStr .= $pattern[rand(0, 51)];
		}
		return $randStr;
	}
	
?>