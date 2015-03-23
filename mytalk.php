<head>
<script language='JavaScript'>
	$(document).ready(function(){
		//当这里的下一页点击的时候
		$('#nextPage').click(function(){
			//当点击下一页的时候 希望这里能够 取得 该隐藏的此页面的页数
			//这里进行硬性规定 一页显示 5条
			var pageNow = parseInt($("#pageNow").val()) + 1; //当前页面的页数 +1 
			//将隐藏的当前页面的页数 增   1
			var pageNext = parseInt(pageNow);
			
			//当点击下一页已经到最后一页的时候  就要将下一页链接删除
			var pageCount = parseInt($("#pageCount").val())-1;
			if(pageCount == 0){
				return;
			}
			if(pageCount == pageNext){
				//马上出现的就是 最后一页 所以需要将 下一页的链接去掉
				$("#nextPage").html("");  //清空 下一页的链接
			}
			//如果这已经是第二页了 就添加 上一页进去  START
			if(pageNext >= 1){//如果页数  大于 第1页  就将 上一页添加上
				if($('#pre').length <=0){
				var newPageA = document.createElement('a');
				newPageA.setAttribute('href', '#pre');
				newPageA.setAttribute('id', 'pre');
				//获取到上一页的 span
				var PrePage = document.getElementById("prePage");
				PrePage.appendChild(newPageA);//将新创建的 链接 添加到 span中
				var textNode = document.createTextNode("上一页"); 
				newPageA.appendChild(textNode); //将上一页添加到 新创建的 a 中间
				}
			}
			//在分页那里加上一个类似 QQ邮箱 显示的效果 如果是第一页 一共是 5页  1/5这样的效果 START
			tempPageNow = pageNow +1;
			tempPageCount = pageCount +1;
			var likeQQEmailPage = tempPageNow +"/"+tempPageCount;
			$("#nowPage").html(likeQQEmailPage);
			//在分页那里加上一个类似 QQ邮箱 显示的效果 如果是第一页 一共是 5页  1/5这样的效果 END
			//如果这已经是第二页了 就添加 上一页进去  END
			$("#pageNow").val(pageNext);//增  1
			//下面将当前页面的页数 +1  通过ajax来获取到下一页的说说
			$.ajax({
				url:"include/ajax/getNextPageTalk.php",
				  type:"POST",
				  dataType:"json",
				  data:"pageNow="+pageNow,
				  success:function(json){
					  //将获取的信息 添加到  那个显示说说的 table中
					  //首先将原有的信息 删除
					  var ul1 = document.getElementById("personTalk");
					  while(ul1.firstChild){//通过循环来删除子节点
					  	ul1.removeChild(ul1.firstChild);
					  }
					  for(var one in json){
						var str="<tr height=60px><td  width=500px>"+json[one]['TalkContent']+"</td><td height=1px width=200px>"+json[one]['TalkTime']+"</td></td></tr>";
						$(str).appendTo("#personTalk");
					  }
				  }
			});
		});
		//当点击上一页的时候
		$("#prePage").click(function(){
			//首先判断  是否到达第一页了
			var pageNow = parseInt($("#pageNow").val())-1; //当前页数
			if(parseInt(pageNow) == 0){
				$("#prePage").html("");
			}
			//将页面中隐藏的 页数 -1 
			$("#pageNow").val(pageNow);

			//如果页面是从 最后一页 点击上一页回来的话 在最后一页 是没有 下一页链接的 所以需要判断 是不是从最后一页回来的 如果是 将下一页的链接添加上
			var pageCount = parseInt($("#pageCount").val())-1;
			if(pageCount-1 == pageNow){
				var newPageA = document.createElement('a');
				newPageA.setAttribute('href', '#next');
				newPageA.setAttribute('id', 'pageNext');
				//获取到上一页的 span
				var PrePage = document.getElementById("nextPage");
				PrePage.appendChild(newPageA);//将新创建的 链接 添加到 span中
				var textNode = document.createTextNode("下一页"); 
				newPageA.appendChild(textNode); //将上一页添加到 新创建的 a 中间
			}
			//在分页那里加上一个类似 QQ邮箱 显示的效果 如果是第一页 一共是 5页  1/5这样的效果 START
			tempPageNow = pageNow +1;
			tempPageCount = pageCount +1;
			var likeQQEmailPage = tempPageNow +"/"+tempPageCount;
			$("#nowPage").html(likeQQEmailPage);
			//在分页那里加上一个类似 QQ邮箱 显示的效果 如果是第一页 一共是 5页  1/5这样的效果 END
			//下面将该需要显示的说说  通过ajax调出来
			$.ajax({
				url:"include/ajax/getNextPageTalk.php",
				  type:"POST",
				  dataType:"json",
				  data:"pageNow="+pageNow,
				  success:function(json){
					  //将获取的信息 添加到  那个显示说说的 table中
					  //首先将原有的信息 删除
					  var ul1 = document.getElementById("personTalk");
					  while(ul1.firstChild){//通过循环来删除子节点
					  	ul1.removeChild(ul1.firstChild);
					  }
					  for(var one in json){
						var str='<tr height=60px><td width=500px>'+json[one]["TalkContent"]+'</td><td height=1px width=200px>'+json[one]['TalkTime']+'</td></tr>';
						$(str).appendTo("#personTalk");
					  }
				  }
			});
		});
		
		//点击发表说说
		$("#newTalk").click(function(){
			//弹出发表说说的层
			$(NewTalkDiv).slideDown("700");
		});
		$("#new_talk_cancel").click(function(){
			$(NewTalkDiv).slideUp("300");
		});
		$("#MyTalk").focus(function(){
			$(this).val("");
		});
		//输入框计算字数 并提示
		$("#MyTalk").keyup(function(){
			var count = $(this).val().length;
			if(count> 140){
				alert('字数限制在140字');
			}
			$("#TalkCount").html(count);
		});
		//发表说说按钮事件
		$("#PostTalk").click(function(){
			//点击后
			var UserId = $("#UserId").val();//用户ID
			var Talk = $("#MyTalk").val();//说说内容
			if(Talk.length >140){
				$("#TalkCountError").html("<font color='red'>字数超过了140</font>");
				return;
			}
			//下面通过ajax来将说说发表
			$.ajax({
				type:'post',
				url:'include/ajax/postTalk.php',//文件处理在  include/ajax/selectUniversity.php中
				dataType:"text",
				data:'TalkGroup='+UserId+"-"+Talk, /*  这里将说说  和 用户 ID传给 url   */
				success:function(data){		/*  服务器返回的数据 处理  */
					if(data == '1'){
						$("#TalkResult").hide("");
						$("#myzone").load("mytalk.php");
						alert('发表成功');
					}
				},
				beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
					$(NewTalkDiv).hide("fast");
					$("#TalkResult").show("fast");
				},
				complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
					
				}
			});
		});
	  
	});
	
</script>
</head>
<?php
header("Content-Type:text/html; charset=utf8");
require_once 'include/SqlHelper.class.php';
//该文件主要用于 myMenu中调用 通过 jQuery的load函数 显示在 myzone中 
session_start();//开启session
//在此文件中 同样能够获得session  这是一件好事  所以就可以通过session 来获取到 关于用户的各项信息

//这里要识别是不是存在用户登录 如果不是 提示非法链接 START
if(!isset($_SESSION['USER'])){
	echo '<script> alert("非法链接");location.replace("index.php")</script>';
	exit();
}
//这里要识别是不是存在用户登录 如果不是 提示非法链接 END

//将用户的登录session隐藏
echo "<input type='hidden' id='UserId' value='".$_SESSION['USERID']."'/>";

$sqlHelper = new SqlHelper();
//下面获取到该用户的说说数量 并且将它隐藏到一个表单中
$sql_get_talk_count = "Select count(TalkId) from t_talk where SFUserId = $_SESSION[USERID]";
$arr_get_talk_count = $sqlHelper->execute_dql2($sql_get_talk_count);
$pageCount = floor($arr_get_talk_count[0][0]/5)+1;
echo "<input type='hidden' id='pageCount' value=".$pageCount." />";//说说的总数量
//下面建立查询 将 该用户发表的说说调出来
$sql_get_talk = "Select * from t_talk where SFUserId = $_SESSION[USERID] order by TalkTime desc limit 0,5";
$arr_get_talk = $sqlHelper->execute_dql2($sql_get_talk);//获取该用户的说说

?>
<!-- 这里将当前页面的页数 隐藏在这里  START -->
<input type='hidden' name='pageNow' id="pageNow" value='0'/>
<!-- 这里将当前页面的页数 隐藏在这里  END -->

<!-- 这个表格用于显示 当前页面的说说  START -->
<?php 
	echo "<a href='#NewTalk' id='newTalk'><font color='blue'><strong>发表说说</strong></font></a>";

?>

<table id="personTalk" width="780" border="0" align="center" cellpadding="0" cellspacing="0" class="biaoge">
<tr><td>
	<div id='TalkResult' style="">
		<img src='images/ajax_loadding2.gif' style="margin:0 auto;width:300px;height:20px;background-color:white;display:none;position:absolute;"/>
	</div>
	<div id='TalkComplete' style="margin:0 auto;width:300px;height:20px;background-color:white;display:none;position:absolute;">
		发表成功
	</div>
	<!--   这里是发表说说的层  START    -->
    <div id='NewTalkDiv' style="margin:0 auto;width:500px;height:180px;background-color:white;border:5px solid blue;display:none;position:absolute;">
    <table width='100%' height='180px' cellpadding="0" cellspacing="0" align="center">
    	<tr height='30px' bgcolor='blue'><td valign="top"><font size='3.0em' color='white' face='黑体'>&nbsp;发表说说</font></td><td valign="top"><a href='#new_talk_cancel' id='new_talk_cancel'><img src="images/X1.jpg" width='20px' height='20px'/></a></td></tr>
        <tr height='5px'><td><span id='TalkCountError'></span></td></tr>
        <tr><td valign="top">　<textarea id='MyTalk' cols="55" rows="2"  >发表说说吧...</textarea></td><td>&nbsp;</td></tr>
        <tr height='30px'><td valign="top" align="right" colspan="2">限制140字，当前输入了<span id='TalkCount'>0</span>个字</td></tr>
        <tr><td valign="top" align="center" colspan="2"><a href='#PostTalk' id='PostTalk'><img src='images/fabiao.jpg'></a></td></tr>
    </table>
    </div>
	<!--   这里是发表说说的层  END    -->
    
    
</td></tr>
	<?php
		if(count($arr_get_talk)!=0){
			for($i = 0 ; $i<count($arr_get_talk); $i++){
				echo "<tr height='60px'>";
				echo "<td width='500px'>".$arr_get_talk[$i]['TalkContent']."</td>";
				echo "<td height='1px' width='200px'>".date("Y-m-d H:i:s",strtotime($arr_get_talk[$i]['TalkTime']))."</td>";
				
				echo "</tr>";
			}
		}else{
			echo "<tr height='330px'><td align='center'>您还未发表任何说说!现在发表吧！</td></tr>";
		}
	?> 
</table>
<!-- 这个表格用于显示 当前页面的说说 END -->
<table>
	<tr>
     	<td>
        <?php
		if(count($arr_get_talk)!=0){
     		echo "<span id='prePage'></span>　　　";
     		echo "<span id='nextPage'><a href='#next' id='pageNext'>下一页</a></span>　　";
     		echo "<span id='nowPage'>1/".$pageCount."</span>";
     		
     			//这里显示共有多少页
     			$pageCount = floor($arr_get_talk_count[0][0]/5)+1;
     			echo "　　共".$pageCount."页";
		}
     	?>
            
     	</td>
     </tr>
</table>