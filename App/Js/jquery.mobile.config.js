/*
 * 该JS文件用于配置 jquery.mobile框架的一些配置信息 
 * 
 * */
$.extend($.mobile, {
	loadingMessage: '努力加载中...',
	 pageLoadErrorMessage: '信息加载出错，请重试！'
});
$.mobile.showPageLoadingMsg( 'a', "正在加载...", true );