$(function() {
            var objSelTheme = $("#selTheme");//获取下拉菜单对象
            objSelTheme.bind("change", function() {
                //如果选择的值不为空
                if (objSelTheme.val() != "") {
                    //使用cookie保存所选择的主题
                    $.cookie("StrTheme", objSelTheme.val(), {
                        path: "/", expires: 7
                    })
                    //重新刷新一次页面，运用主题
                    window.location.reload();
                }
            })
        })
        //如果主题不为空，则运用主题
if ($.cookie("StrTheme")) {
    $.mobile.page.prototype.options.theme = $.cookie("StrTheme");
}