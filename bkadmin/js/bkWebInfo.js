//通过省份获取大学
	function getUniversity(){
		var ProvinceId = $("#Province").val();//取得省份id
		var University = document.getElementById("University"); //行业小类
		University.length = 0;//清空大学
		//传递ajax
		$.ajax({
			type:'post',
			url:'../include/ajax/selectUniversity.php',//文件处理在  include/ajax/selectUniversity.php中
			dataType:'json',
			data:'ProvinceId='+ProvinceId, /*  这里将大类id传给 url   */
			success:function(json){
				if(json == ""){
					$("<option value='11111'>选择大学</option>").appendTo("#University");
					return false;
				}
				$("<option value='11111'>选择大学</option>").appendTo("#University");
				for(var one in json){
						var str='<option value='+json[one]["SchoolId"]+'>'+json[one]["SchoolName"]+'</option>';
						$(str).appendTo("#University");
				}
			}
		});
	}
$(document).ready(function(){
	//当点击筛选登录次数 框的时候
	$("#LoginTimes").focus(function(){
		$(this).val('');
	});
	$("#WebInfoButton").click(function() {
		$("#form1").submit();
	});
});