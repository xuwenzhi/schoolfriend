$(document).ready(function(){
	//搜索框下拉的事件
	$("#newsSEOStart").mouseover(function(){
		$("#newSEO").show("2000");
	});
	//关闭新闻公告搜索框
	$("#closeNewsSeo").click(function(){
		$("#newSEO").hide("2000");
	});
	
	
	$("#LikeRecruitDiv").click(function(){
		$("#RecruitLikeDiv").show("fast");
	});
	$("#recruit_like_cancel").click(function(){
		$("#RecruitLikeDiv").hide('fast');
	});
	$("#RecruitClaim").focus(function(){
		$(this).val("");
	});
	//招聘应聘 对招聘信息感兴趣 
	$("#RecruitLike").click(function(){
		var UserId = $("#UserId").val();//当前登录用户的 ID		
		var RecruitId = $("#RecruitId").val();//当前招聘信息的ID
		var RecruitSalary = $("#RecruitLikeSalay").val();//薪水
		var RecruitClaim = $("#RecruitClaim").val(); //要求
		var RecruitType = $("input[name='RecruitType']:checked").val();
		var windowHeight = $(window).height();
		var windowWidth = $(window).width();
		windowWidth = parseInt(windowWidth)/2;
		windowHeight = parseInt(windowHeight)/2;
		$("#RecruitLikeDiv").hide('fast');
		//下面通过ajax 来将该用户的感兴趣事件 添加到数据库
		$.ajax({
			type:'post',
			url:'include/ajax/insertLikeRecruit.php',
			dataType:"text",
			data:'RecruitLike='+UserId+"-"+RecruitId+"-"+RecruitSalary+"-"+RecruitClaim+"-"+RecruitType, /*  这里将大类id传给 url   */
			success:function(data){		/*  服务器返回的数据 处理  */
				if(data == '1'){
					$("#RecruitLikeResult").html("");//清空返回层
					var result = "<img src='images/correct.jpg' height='40px' width='140px'>";
					var resultWord = "<center><font size='3'>申请成功</font></center>";
					$(result).appendTo("#RecruitLikeResult");
					$(resultWord).appendTo("#RecruitLikeResult");
				}
				if(data == 'second'){
					$("#RecruitLikeResult").html("");//清空返回层
					var resultWord = "<center><font size='3' color='red'>请不要重复申请...</font></center>";
					$(resultWord).appendTo("#RecruitLikeResult");
				}
			},
			beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
				var result = "<img src='images/loading.gif'>";
				$(result).appendTo("#RecruitLikeResult");
				var divcss = {
						      margin: '10px 0 0',
						      padding: '5px 10px',
						      border: '0px solid #CCC',
						      top:'380px',
						      left:'700px'
						};
				$("#RecruitLikeResult").css(divcss);
				var resultWord = "<p>正在添加...</p>";
				$(resultWord).appendTo("#RecruitLikeResult");
				$("#RecruitLikeResult").show('fast');
			},
			complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
				$("#RecruitLikeResult").slideUp(2000);
			}
		});
 	});
	
	
	//这里是添加昔日趣事文件  addFontThing.htm中的 JS代码
	$(function(){
		
		//移到右边
		$('#add').click(function(){
			//获取选中的选项，删除并追加给对方
			$('#select1 option:selected').appendTo('#select2');	
		});
		
		//移到左边
		$('#remove').click(function(){
			$('#select2 option:selected').appendTo('#select1');
		});
		
		//全部移到右边
		$('#add_all').click(function(){
			//获取全部的选项,删除并追加给对方
			$('#select1 option').appendTo('#select2');
		});
		
		//全部移到左边
		$('#remove_all').click(function(){
			$('#select2 option').appendTo('#select1');
		});
		
		//双击选项
		$('#select1').dblclick(function(){ //绑定双击事件
			//获取全部的选项,删除并追加给对方
			$("option:selected",this).appendTo('#select2'); //追加给对方
		});
		
		//双击选项
		$('#select2').dblclick(function(){
			$("option:selected",this).appendTo('#select1');
		});
		
	});
});
