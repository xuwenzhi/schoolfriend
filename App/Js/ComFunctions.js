//JS格式化时间
function formatDate(formatStr, fdate){
	 var fTime, fStr = 'ymdhis';
	 if (!formatStr)
	  formatStr= "y-m-d h:i:s";
	 if (fdate)
	  fTime = new Date(fdate);
	 else
	  fTime = new Date();
	 var formatArr = [
	 fTime.getFullYear().toString(),
	 (fTime.getMonth()+1).toString(),
	 fTime.getDate().toString(),
	 fTime.getHours().toString(),
	 fTime.getMinutes().toString(),
	 fTime.getSeconds().toString() 
	 ]
	 for (var i=0; i<formatArr.length; i++){
	  formatStr = formatStr.replace(fStr.charAt(i), formatArr[i]);
	 }
	 return formatStr;
}
//将格式化的时间转换为UNIX时间戳
function unixtime(){
	var dt = new Date()();
	var ux = Date().UTC(dt.getFullYear(),dt.getMonth(),dt.getDay(),dt.getHours(),dt.getMinutes(),dt.getSeconds())/1000;
	return ux;
}

//jquery.mobile官网提供的适应屏幕尺寸函数   暂时没有用到
function scale( width, height, padding, border ) {
    var scrWidth = $( window ).width() - 30,
        scrHeight = $( window ).height() - 30,
        ifrPadding = 2 * padding,
        ifrBorder = 2 * border,
        ifrWidth = width + ifrPadding + ifrBorder,
        ifrHeight = height + ifrPadding + ifrBorder,
        h, w;

    if ( ifrWidth < scrWidth && ifrHeight < scrHeight ) {
        w = ifrWidth;
        h = ifrHeight;
    } else if ( ( ifrWidth / scrWidth ) > ( ifrHeight / scrHeight ) ) {
        w = scrWidth;
        h = ( scrWidth / ifrWidth ) * ifrHeight;
    } else {
        h = scrHeight;
        w = ( scrHeight / ifrHeight ) * ifrWidth;  
    }

    return {
        'width': w - ( ifrPadding + ifrBorder ),
        'height': h - ( ifrPadding + ifrBorder )
    };
};