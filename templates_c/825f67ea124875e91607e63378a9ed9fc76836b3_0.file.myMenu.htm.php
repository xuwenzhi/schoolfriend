<?php
/* Smarty version 3.1.33, created on 2020-05-19 08:16:41
  from '/data/wwwroot/school.xuwenzhi.com/templates/myMenu.htm' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ec32569309dc1_86891141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '825f67ea124875e91607e63378a9ed9fc76836b3' => 
    array (
      0 => '/data/wwwroot/school.xuwenzhi.com/templates/myMenu.htm',
      1 => 1589844701,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec32569309dc1_86891141 (Smarty_Internal_Template $_smarty_tpl) {
?><head>
<?php echo '<script'; ?>
 type="text/javascript" src="js/Personal.js" ><?php echo '</script'; ?>
>
</head>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="22" align="center" valign="middle">
      <!-- 个人头像 -->
      <img src='<?php echo $_smarty_tpl->tpl_vars['pic_way']->value;?>
' id='person_pic' width='120px' height='150px' />
    </td>
  </tr>
  <tr>
    <td height="22" align="center" valign="middle">
          等级:19级&nbsp; <a href='#update' id='up_pic' title="建议上传200*300px图片">修改头像 </a>
    </td>
  </tr>
  <tr>
  <td height="22" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="22"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="10%" height="22" align="center"><img src="images/tb1.jpg" width="3" height="3" align="absmiddle" /></td>
        <td width="90%"><a href='#myinfor' id='myinfor'>我的基本资料</a></td>
      </tr>
      <tr>
        <td height="22" align="center"><img src="images/tb1.jpg" width="3" height="3" align="absmiddle" /></td>
        <td><a href="#myjob" id='mycompany'>我的工作信息</a></td>
      </tr>
      <tr>
        <td height="22" align="center"><img src="images/tb1.jpg" width="3" height="3" align="absmiddle" /></td>
        <td><a href="#myattention" id='myattention'>我的关注</a><a href="../#myClass"></a></td>
      </tr>
      <tr>
        <td height="22" align="center"><img src="images/tb1.jpg" width="3" height="3" align="absmiddle" /></td>
        <td><a href="#myclass" id='myclass'>我的班级</a></td>
      </tr>
      <tr>
        <td height="22" align="center"><img src="images/tb1.jpg" width="3" height="3" align="absmiddle" /></td>
        <td><a href="#mytalk" id='mytalk'>我的说说</a></td>
      </tr>
      <tr>
        <td height="22" align="center"><img src="images/tb1.jpg" width="3" height="3" align="absmiddle" /></td>
        <td><a href="#passChange" id='passChange'>密码修改</a>
         
          <!-- 这里加入一个层  用于修改头像   start -->
          <div  id='update_pic_div' style="display:none;position:absolute; left:150px; width:445px; height:165px; background-color:white; top:-50px; border:5px solid blue;z-index:100;">
            <table width='100%'  cellpadding="0" cellspacing="0" align="center">
              <tr style="background-color:blue;width:100%;height:20px;">
                <td><font color='white' size='3.0em' face='黑体'>&nbsp;上传本人照片</font></td>
                <td align='right'><a href='#up_pic_cancel' id='update_pic_cancel'><img src="images/X1.jpg" width='20px' height='20px'/></a></td>
              </tr>
              <!-- 上传个人头像的表单 -->
              <form action='include/PostPersonPic.php' method='post' id='postPersonPic' enctype="multipart/form-data">
                <!-- 下面的onchange = "filesize()"函数 在ComFunction.js中   -->
                
                 <tr>
                  <td align='right' colspan='2'><table width='95%' align="center"  cellpadding="0" cellspacing="0">
                    <!-- 上传个人头像的表单 -->
                    <tr bgcolor='#E6FFFF' >
                      <td align='left'  colspan='2'>　选择电脑里的一张相片</td>
                    </tr>
                    <tr height='10px'>
                      <td></td>
                    </tr>
                    <!-- 下面的onchange = "filesize()"函数 在ComFunction.js中   -->
                    <tr>
                      <td align="left" colspan='2'><input type='file' name='perfon_pic' id='perfon_pic' bpic="bpic"' onchange="filesize(this)" style='width:100%'/></td>
                    </tr>
                    <tr height='20px'>
                      <td align='right' colspan='2'><a href='#upload_pic' style="background-color:blue;border:0;color:white;" id='update_pic_yes'><font size='2.0em'>上传头像图片</font></a></td>
                    </tr>
                    <tr>
                      <td  colspan='2'><hr width='100%' /></td>
                    </tr>
                    <tr bgcolor='#E6FFFF' height='50px'>
                      <td align='center' colspan='2'>支持JPG、JPEG、GIF和PNG文件，最大4M(建议上传：宽120*高150图片)　</td>
                    </tr>
                  </table></td>
                </tr>
              </form>
            </table>
          </div>
          <!-- 这里加入一个层  用于修改头像    end -->
          
          <!-- 这里加入一个层  用于修改密码  START -->
          <div id='PassChangeDiv' style="display:none;position:absolute;width:445px; height:110px;background-color:white;border:5px solid blue;opacity:5.2;">
          	<table width='100%' height='100px' cellpadding="0" cellspacing="0" align="center">
          		<tr><td width='30%' align='right'>登录名</td><td><input type='text' name='UserName' readonly="readonly" value='<?php echo $_smarty_tpl->tpl_vars['UserName']->value;?>
'/></td><td><a href='#cancel_update' id='cancel_update'><img src='images/X1.jpg'/></a></td></tr>
          		<tr><td width='30%' align='right'>原密码</td><td colspan='2'><input type='password' id='UserOldPass'/></td> </tr>
          		<tr><td width='30%' align='right'>新密码</td><td colspan='2'><input type='password' id='UserNewPass1' /></td></tr>
          		<tr><td width='30%' align='right'>确认密码</td><td colspan='2'><input type='password' id='UserNewPass2' /></td></tr>
          		<input type='hidden' id='HidUserId' value='<?php echo $_smarty_tpl->tpl_vars['UserId']->value;?>
' />
          		<tr bgcolor='#E6FFFF'><td colspan='3' align='center'><a href='#changePass' id='changePass' style="background-color:blue;border:0;color:white;">修改密码</a></td></tr>
          	</table>
          </div>
          <!-- 这里加入一个层 用于修改密码  END -->
          </td>
      </tr>
    </table></td>
  </tr>
</table>

<?php }
}
