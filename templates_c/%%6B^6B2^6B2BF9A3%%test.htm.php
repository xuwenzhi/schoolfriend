<?php /* Smarty version 2.6.26, created on 2013-08-24 14:38:56
         compiled from test.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'test.htm', 144, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>永远的同校</title>
<meta name="开发单位" content="哈尔滨理工大学" />
<meta name="keywords" content="校友|校友网|永远的同校|哈尔滨电机制造学校|哈尔滨机电专科学校|哈尔滨工业高等专科学校|

哈尔滨理工大学工业技术学院|哈尔滨科技大学|哈尔滨电工学院">
<meta name="description" content="哈尔滨理工大学">
<script src="./js/jquery1.4.2.js" type="text/javascript"> </script>
<link href="./images/css/text.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
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
</script>
<style type="text/css">
/* bigBanner */
.bigBanner{height:294px;width:640px;margin:10px auto 10px auto;border:1px solid #000;
background-color:#FFF;overflow:hidden;position:relative;}
/*外边框大小*/
.bigBanner1{height:280px;width:400px;position:relative;}/*包着左面图片的边框*/
.bigTitle{height:280px;width:300px;float:right;position:relative;}/*包着新闻和按钮的边框*/
.bigTitle #brImg{width:200px;height:240px;position:relative;margin-left:30px;}/*右侧图片边框*/
.bigBanner #brImg {
	width:250px;
	height:230px;
	/*border:1px solid red;  左边图片边框   */  
}/*右侧新闻大小*/
.bigBanner #blImg {
	width:250px;
	height:290px;
	/*border:1px solid red; 右侧图片边框 */  
}/*左侧图片大小*/
.bigTitle .button6{display:inline-block;width:200px;height:54px;line-height:26px;text-indent:-9990em;font-size:14px;background:url(images/btn_in.png) top center;color:#fff;border:none;cursor:pointer;margin-left:30px;margin-top:10px;}
.bigTitle a.button6{color:#fff;}
.bigTitle .button6:hover{text-decoration:none;background-position:bottom center;}
.bigBanner p{position:absolute;left:-70px;bottom:10px;}
.bigTitle .idx{display:inline-block;width:16px;height:30px;line-height:30px;text-indent:-9990em;font-size:14px;background:url(images/btn_idx.png) bottom center;border:none;cursor:pointer;}
</style>
</head>
<body topmargin="0" leftmargin="0">
<?php 
	require_once './top.php';
 ?>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0" class="bg1">
  <tr>
    <td height="11"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr height="294px">
    <td width="10"></td>
    <td class="border"  bgcolor="#f3f3f3"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="350px" height="294px"  bgcolor="#f3f3f3">
<div class="bigBanner">
		<img id="blImg" class="bigBanner1" src="images/idxbannerL2.jpg" style="left:0px;opacity:1;" />
		<div class="bigTitle">
			<img id="brImg" src="images/idxbannerR2.png" style="left:0px;opacity:1;" />
			<a id="brsrc" class="button6" >开始使用</a>
			<p>
				<a id="1" class="idx" style="background-position:50% 0%;">1</a>
				<a id="2" class="idx" style="background-position:50% 100%;">2</a>
				<a id="3" class="idx" style="background-position:50% 100%;">3</a>
			</p>
		</div>
	</div></td>
      </tr>
    </table></td>
    <td width="11"></td>
    <td width="325" valign="top" class="border"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="97" height="29" align="center" background="images/1_14.jpg" class="zi-bai14b">新闻公告</td>
        <td width="228" align="right" background="images/1_15.jpg"><a href="news.php"><img src="images/more.gif" 

width="44" height="13" border="0" align="absmiddle"></a>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <?php $_from = $this->_tpl_vars['index_news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['newsitem']):
?>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom"><a href='news_con.php?news_id=<?php echo $this->_tpl_vars['newsitem']['NewsId']; ?>
' title='<?php echo $this->_tpl_vars['newsitem']['NewsTitle']; ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['newsitem']['NewsTitle'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 23, "...", true) : smarty_modifier_truncate($_tmp, 23, "...", true)); ?>
</a></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?>
        </table>
        </td>
      </tr>
    </table></td>
    <td width="11"></td>
  </tr>
</table>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="11" height="11"></td>
    <td width="317"></td>
    <td width="11"></td>
    <td width="317"></td>
    <td width="11"></td>
    <td width="325"></td>
    <td width="11"></td>
  </tr>
  <tr>
    <td height="230">&nbsp;</td>
    <td valign="top" class="border"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="97" height="29" align="center" background="images/1_09.jpg" class="zi-lan14b">昔日趣事</td>
        <td width="215" align="right" background="images/1_09.jpg"><img src="images/more.gif" width="44" height="13" 

align="absmiddle">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">11行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
        </table>
        
        </td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
    <td valign="top" class="border"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="97" height="29" align="center" class="zi-lan14b">供求信息</td>
        <td width="1"><img src="images/1_11.jpg"></td>
        <td width="97" align="center" background="images/1_09.jpg" class="zi-lan14b">产品推荐</td>
        <td width="117" align="right" background="images/1_09.jpg">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">11行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"></td>
            <td align="right" valign="bottom"><img src="images/more1.gif">            </td>
          </tr>
        </table>
        
        </td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
    <td width="325" valign="top" class="border"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="97" height="29" align="center" class="zi-lan14b">招聘</td>
        <td width="1"><img src="images/1_11.jpg"></td>
        <td width="97" align="center" background="images/1_09.jpg" class="zi-lan14b">应聘</td>
        <td width="117" align="right" background="images/1_09.jpg">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">11行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3"></td>
            <td valign="bottom">10行23个字题标题标题标题标题标题标题标题标题标</td>
          </tr>
          <tr>
            <td width="15" height="22" align="center"></td>
            <td align="right" valign="bottom"><img src="images/more1.gif">            </td>
          </tr>
        </table>
        
        </td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="11" height="11"></td>
    <td width="981"></td>
    <td width="11"></td>
  </tr>
  <tr>
    <td></td>
    <td valign="top" class="border"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100" height="29" align="center" background="images/1_20.jpg" class="zi-bai14b">老照片</td>
        <td width="1"><img src="images/1_11.jpg"></td>
        <td width="90%" align="right" background="images/1_09.jpg"><a href="pic.php"><img src="images/more.gif" 

width="44" height="13" border="0" align="absmiddle"></a>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="5"></td>
          </tr>
          <tr>
            <td align="center"><a href="@"><img src="images/nophoto1.jpg" alt="标题" width="184" height="118" class="border-tp"></a>
            <a href="@"><img src="images/nophoto1.jpg" alt="标题" width="184" height="118" class="border-tp"></a>
            <a href="@"><img src="images/nophoto1.jpg" alt="标题" width="184" height="118" class="border-tp"></a>
            <a href="@"><img src="images/nophoto1.jpg" alt="标题" width="184" height="118" class="border-tp"></a>
            <a href="@"><img src="images/nophoto1.jpg" alt="标题" width="184" height="118" class="border-tp"></a>    

        </td>
          </tr>
        </table>
        
        </td>
        </tr>
    </table></td>
    <td></td>
  </tr>
  <tr>
    <td height="11"></td>
    <td></td>
    <td></td>
  </tr>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'bot.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>