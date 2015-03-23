function getSmallGood(){
	//获取商品大类ID
	var bigGoodValue = $("#GoodBigValue").val();
	if(bigGoodValue != '11111'){
		//清空商品小类
		var GoodType = document.getElementById("GoodSmallValue"); //商品小类
		GoodType.length = 0;//执行清空
		//传递ajax
		$.ajax({
			type:'post',
			url:'../include/ajax/selectGoods.php',//文件处理在  include/ajax/selectUniversity.php中
			dataType:'json',
			data:'bigGoodValue='+bigGoodValue, /*  这里将大类id传给 url   */
			success:function(json){
				if(json == ""){
					$("<option value='11111'>选择商品小类</option>").appendTo("#GoodSmallValue");
					return false;
				}
				for(var one in json){
						var str='<option value='+json[one]["GoodsId"]+'>'+json[one]["GoodName"]+'</option>';
						$(str).appendTo("#GoodSmallValue");
				}
			}
		});
	}
}
$(document).ready(function(){
	
});