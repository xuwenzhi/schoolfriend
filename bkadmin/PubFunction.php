<?php
function FunNav($ch)
{?>
      <div class="menu_nav">
        <div class="menu_nav_gonggao">
          <div><span  class="colors"></div>
        </div>
      </div>
<?php }

	function Login()
	{
		if(!LoginOK())
			include_once "LoginForm.php";
	
	}
	function LoginOK()
	{	//session_start();
		if(!isset($_SESSION["LoginUserCode"]))
			return 0;
		else{
			return 1;
		}
	}
	function Logout()
	{
		session_start();
		$_SESSION["LoginUserCode"]=null;
		$_SESSION["LoginUserName"]=null;
		$_SESSION["LoginUserRole"]=null;
		header("location: index.php");
	}


function FunctionRole($FunctionID)
{	//$FunctionID:����Ĺ���ID
	/*
	$mRole=explode(",",$_SESSION["LoginUserRole"]);  //�û�Ȩ�޵�ID
	$i=0;
	while($i<count($mRole))
	{	if($FunctionID==$mRole[$i])
			return true;
		$i++;
	}
	return false;
	*/
	return true;
}
//通过新闻的类型code 来获取其名称
function NewsCategory($NewsCategory) {
	include_once "../include/SqlHelper.class.php";
	$sqlHelper = new sqlHelper();
	$sql_cate = "Select CodeName from t_basecode Where CodeId=".$NewsCategory." ;";
	$arr = $sqlHelper->execute_dql2($sql_cate);
	if(count($arr)!=0){
		return $arr[0]['CodeName'];
	}
}
//通过登录名 来获取该用户的id
function getUserIdFromUserName($UserName){
	include_once "../include/SqlHelper.class.php";
	$sqlHelper = new sqlHelper();
	$sql_get_userid = "Select SFUserId from t_sfuser where SFUserLogin = '".$UserName."'";
	$arr_userid = $sqlHelper ->execute_dql2($sql_get_userid);
	if(count($arr_userid)!=''){
		return $arr_userid[0]['SFUserId'];
	}else{
		return '';
	}
}

//这里获取到当前数据库中在线的用户数量  START
function onlineUser(){
	global  $sqlHelper;
	$sql_get_onlineuser = "Select count(SFUserId) from t_sfuser where SFUserState = 1";
	$arr_get_onlineuser = $sqlHelper ->execute_dql2($sql_get_onlineuser);
	echo "当前在线用户有 : <font color='red'>".$arr_get_onlineuser[0][0]."</font> 个";
}
//这里获取到当前数据库中在线的用户数量  END

//定义一个函数 取得商品大类 从 t_goods表中获取  START
function getGoodsBigType(){
	global $sqlHelper;
	$sql_get_good_big_type = "Select GoodsId, GoodName from t_goods where length(GoodsId) =2";
	$arr_get_good_big_type = $sqlHelper->execute_dql2($sql_get_good_big_type);
	if(count($arr_get_good_big_type)>0){
		for($i = 0; $i<count($arr_get_good_big_type); $i++){
			echo "<option value=".$arr_get_good_big_type[$i]['GoodsId'].">".$arr_get_good_big_type[$i]['GoodName']."</option>";
		}
	}
}
//定义一个函数 取得商品大类 从 t_goods表中获取  END
//定义一个函数 取得行业类 从t_trade表中获取 START
	function getTradeType(){
		global  $arr_get_content;
		global  $sqlHelper;
		$sql_recruit_category = "Select TradeId,TradeName from t_trade where length(TradeId)=2";
		$arr_recruit_category = $sqlHelper->execute_dql2($sql_recruit_category);
		echo "<tr bgcolor='#F3F8FC' onmouseout=this.style.backgroundColor='' onmouseover=this.style.backgroundColor='#D0F2FF'>";
		//下面通过循环输出新闻公告的类型 并且用单选框显示
		echo "<td align='right'>选择行业类别</td>";
		echo "<td>";
		echo "<select name='recruitCategory' >";
		for($i = 0; $i<count($arr_recruit_category); $i++){
			if($arr_get_content[0]['RecruitTrade'] == $arr_recruit_category[$i]['TradeId']){
				echo "<option value='".$arr_recruit_category[$i]['TradeId']."'  selected='selected'/>".$arr_recruit_category[$i]['TradeName']."</option>　　　";
			}else{
				echo "<option value='".$arr_recruit_category[$i]['TradeId']."'/>".$arr_recruit_category[$i]['TradeName']."</option>　　　";
			}
		}
		echo "</select>";
		echo "</td>";
		echo "</tr>";
	}
//定义一个函数 取得行业类 从t_trade表中获取 END





?>