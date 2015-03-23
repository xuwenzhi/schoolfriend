$(document).ready(function(){
	//这里对省市的二级联动进行处理
	$("#Province").live('change', function(){
		var Province = $(this).val();//获取省份ID
		var City = document.getElementById("UserLocation");
		City.length = 0;
		var str = '<option value="1111">1111</option>';
		//alert(str);
		$(str).appendTo("#UserLocation");
		$.ajax({
			type:'post',
			url:'../Control/Ajax/AjaxGetCityByProvince.php',
			data:'Province='+Province,
			dataType:'json',
			success:function(json){
				if(json != '0'){
					//将获取到的城市 添加到 id=UserLocation的下拉菜单下
					for(var one in json){
						var str='<option value='+json[one]["CityName"]+'>'+json[one]["CityName"]+'</option>';
						$(str).appendTo("#UserLocation");
					}
				}
				else{
					alert('获取失败');
				}
			},
			beforeSend:function(XMLHttpRequest){   /*  加载之前的效果   */
				//var load = "<img src='Images/loading.gif' width='20px' height='20px'/>";
				//$(load).appendTo("#getMoreNewsLoad");
			},
			complete:function(XMLHttpRequest, textStatus){    /*   加载之后    */
				//$("#getMoreNewsLoad").html('');
			}
		});
	});
});