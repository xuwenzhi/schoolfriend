/*
*因为 如果点击完供求信息  就最好是可以不再点击  这里可以这么做 就是
*当写点击 供求信息 之后  通过ajax 将数据调取出来 就解除  供求信息的点击事件
*产品推介同样这样
*/
//点击供求信息
$(document).ready(function(){
	$("#index_product").click(function(){
		var judgeVar = $("#judgeProduct").val();
		if(judgeVar == '1'){
			
		}else{
			//将供求信息加上背景图片
			$("#index_information").attr("background", "images/1_09.jpg");
			//将产品推介去掉背景图片
			$(this).attr("background", "");
			//修改more链接
			$("#information_product_more").attr("href", "products.php");
			//这里只需通过ajax从数据库中获取到东西 然后添加到 表格中即可
			//首先清空原有的 表格中的 供求信息
			var ul1 = document.getElementById("information_product");
			while(ul1.firstChild){//通过循环来删除子节点
				 ul1.removeChild(ul1.firstChild);
			}
			//这里只需通过ajax从数据库中获取到东西 然后添加到 表格中即可
			$.ajax({
				  url:"./include/ajax/index_product.php",
				  dataType:"json",
				  success:function(json){
					  for(var one in json){
							var str='<tr><td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td><td><a href="product_con.php?product_id='+json[one]['ProductId']+'" title='+json[one]['ProductName']+'>'+json[one]['ProductName'].substring(0, 16)+"..."+'</a></td><td align=right>'+json[one]['ProductRTime']+'</td></tr>';
							$(str).appendTo("#information_product");
					  }
				  }
			  });
		}
	});
	$("#index_information").click(function(){
		var judgeVar = $("#judgeInformation").val();
		if(judgeVar == '1'){	
			//这里之所以用这个变量来判断 意思是 当这个隐藏判断值 如果是 0  点击 供求信息  就不会好使 
		}else{
			//将产品推介加上背景图片
			$("#index_product").attr("background", "images/1_09.jpg");
			//将供求信息去掉背景图片
			$(this).attr("background", "");
			
		//修改more链接
		$("#information_product_more").attr("href", "informations.php");
		//这里只需通过ajax从数据库中获取到东西 然后添加到 表格中即可
		//首先清空原有的 表格中的 产品推介信息
		var ul1 = document.getElementById("information_product");
		while(ul1.firstChild){//通过循环来删除子节点
			 ul1.removeChild(ul1.firstChild);
		}
		$.ajax({
			  url:"./include/ajax/index_information.php",
			  dataType:"json",
			  success:function(json){
				  for(var one in json){
						var str='<tr><td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td><td><a href="information_con.php?infor_id='+json[one]['InfoId']+'" title='+json[one]['InfoTitle']+'>['+json[one]['InfoType']+'] '+json[one]['InfoTitle'].substring(0, 14)+"..."+'</a></td><td align=right>'+json[one]['InfoRTime']+'</td></tr>';
						$(str).appendTo("#information_product");
				  }
			  }
		  });
		}
	});
	
});