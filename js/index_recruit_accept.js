$(document).ready(function(){
	$("#index_recruit").click(function(){
		var judgeVar = $("#judgeRecruit").val();
		if(judgeVar == '0'){	
			//这里之所以用这个变量来判断 意思是 当这个隐藏判断值 如果是 0  点击 供求信息  就不会好使 
		}else{
			//将产品推介加上背景图片
			$("#index_apply").attr("background", "images/1_09.jpg");
			//将供求信息去掉背景图片
			$(this).attr("background", "");
			
		//修改more链接
		$("#recruit_apply_more").attr("href", "recruits.php");
		//这里只需通过ajax从数据库中获取到东西 然后添加到 表格中即可
		//首先清空原有的 表格中的 产品推介信息
		var ul1 = document.getElementById("recruit_apply");
		while(ul1.firstChild){//通过循环来删除子节点
			 ul1.removeChild(ul1.firstChild);
		}
		$.ajax({
			  url:"./include/ajax/index_recruit.php",
			  dataType:"json",
			  success:function(json){
				  for(var one in json){
						var str='<tr><td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td><td><a href="recruits_con.php?recruits_id='+json[one]['RecruitId']+'" title='+json[one]['RecruitPosition']+'>'+json[one]['RecruitPosition'].substring(0, 16)+"..."+'</a></td><td align=right>'+json[one]['RecruitTime']+'</td></tr>';
						$(str).appendTo("#recruit_apply");
				  }
			  }
		  });
		}
	});
	$("#index_apply").click(function(){
		var judgeVar = $("#judgeApply").val();
		if(judgeVar == '0'){	
			//这里之所以用这个变量来判断 意思是 当这个隐藏判断值 如果是 0  点击 供求信息  就不会好使 
		}else{
			//将产品推介加上背景图片
			$("#index_recruit").attr("background", "images/1_09.jpg");
			//将供求信息去掉背景图片
			$(this).attr("background", "");
			
		//修改more链接
		$("#recruit_apply_more").attr("href", "applys.php");
		//这里只需通过ajax从数据库中获取到东西 然后添加到 表格中即可
		//首先清空原有的 表格中的 产品推介信息
		var ul1 = document.getElementById("recruit_apply");
		while(ul1.firstChild){//通过循环来删除子节点
			 ul1.removeChild(ul1.firstChild);
		}
		$.ajax({
			  url:"./include/ajax/index_apply.php",
			  dataType:"json",
			  success:function(json){
				  for(var one in json){
						var str='<tr><td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td><td><a href="apply_con.php?apply_id='+json[one]['ApplyId']+'" title='+json[one]['ApplyUnit']+'>'+json[one]['ApplyUnit'].substring(0, 16)+"..."+'</a></td><td align=right>'+json[one]['ApplyTime']+'</td></tr>';
						$(str).appendTo("#recruit_apply");
				  }
			  }
		  });
		}
	});
});