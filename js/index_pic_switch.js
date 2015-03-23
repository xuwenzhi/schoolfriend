/*
 * 该文件主要先暂时控制 首页的产品展示图   只需要修改掉  图片的地址 即可
 */
var picCount=1;
function autoChangePic(){
	picCount++;
	if(picCount>3) picCount=1;
	$("#blImg").attr({src:"images/idxbannerL"+picCount+".jpg"});
	$("#brImg").attr({src:"images/idxbannerR"+picCount+".png"});
	$(".idx").not("#"+picCount).css({backgroundPosition:"bottom"});
	$("#"+picCount).css({backgroundPosition:"top"});
	if(picCount<2){
		$("#brsrc").attr({href:"http://www.17sucai.com"});
	}
	if(picCount>1&picCount<3){
		$("#brsrc").attr({href:"http://www.17sucai.com"});
	}
	if(picCount>2){
		$( "#brsrc" ).attr({href:"http://www.17sucai.com"});
	}
};

function clickChangePic(){
	$( "#blImg" ).attr({src:"images/idxbannerL"+picCount+".jpg"});
	$( "#brImg" ).attr({src:"images/idxbannerR"+picCount+".png"});
};

function runEffect(type,obj){
	if(type=="click"){
		setTimeout("clickChangePic()",300);
		clearInterval(t1);
		picCount=obj.id;
		if(picCount<2){
			$( "#brsrc" ).attr({href:"http://www.17sucai.com"});
		}
		if(picCount>1&picCount<3){
			$( "#brsrc" ).attr({href:"http://www.17sucai.com"});
		}
		if(picCount>2){
			$( "#brsrc" ).attr({href:"http://www.17sucai.com"});
		}
		t1=setInterval("runEffect()",5000);	
	}else{
		setTimeout("autoChangePic()",300);
	}
	$("#blImg").animate({left:"-=200px",opacity:0},300);
	$("#brImg").animate({left:"+=200px",opacity:0},300);
	$("#blImg").animate({left:"+=200px",opacity:1},300);			
	$("#brImg").animate({left:"-=200px",opacity:1},300);
};	

$(document).ready(function(){

	$("#1").css({backgroundPosition:"top"});
	t1=setInterval("runEffect()",3500);
	
	$(".idx").click(function(){							
		$(".idx").not(this).css({backgroundPosition:"bottom"});
		$(this).css({backgroundPosition:"top"});
		runEffect("click",this);
	});
	


});