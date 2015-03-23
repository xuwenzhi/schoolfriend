<?php
//session_start();
require_once '../include/SqlHelper.class.php';
if(@$_POST["btnLogin"]!="" ){	
	$arr=array();
        $SqlHelper=new SqlHelper();
        $sql="select * from t_sfuser where SFUserLogin='" . $_POST["UserCode"]  . "' and SFUserKey='" . md5($_POST

["UserPass"]) . "' and SFUserManage = 1";// 
    $arr=$SqlHelper->execute_dql2($sql);
		if(count($arr) != 0){ 
		   $_SESSION["LoginUserCode"]=$arr[0]["SFUserLogin"];
		   $_SESSION["LoginUserName"]=$arr[0]["SFUserTrueName"];
		   // $_SESSION["LoginUserRole"]="";  //权限代码
		   header("location: index.php");
		 }
		else{
			echo '<script type="text/javascript">alert("登录未成功");location.replace("index.php")</script>';
			exit();
		}
}
?>

			<form id="form1" name="form1" method="post" action="">
              <table width="300" border="0" cellspacing="1" cellpadding="4"  bgcolor="#CBD8E1">
                <tr bgcolor="#F3F8FC" >
                  <td width="85" align="right">用户名</td>
                  <td width="215"><strong>
                    <input name="UserCode" type="text" id="UserCode" />
                  </strong></td>
                </tr>
                <tr bgcolor="#F3F8FC" >
                  <td align="right">密　码</td>
                  <td><input name="UserPass" type="password" id="UserPass" /></td>
                </tr>
                <tr bgcolor="#F3F8FC" >
                  <td colspan="2" align="center"><input type="submit" name="btnLogin" id="btnLogin" value="登录" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="reset" name="button2" id="button2" value="重置" /></td>
                </tr>
              </table>
            </form>
