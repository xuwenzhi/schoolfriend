<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?
function admin_phpsendemail() {
		$this->autoRender = false;
		$mail = new phpmailer(); //建立邮件发送类 
		$address = isset($_POST['address'])?$_POST['address']:'songyichao74@qq.com'; 
		$content = isset($_POST['content'])?$_POST['content']:'xueersi.com';
		$mail->IsSMTP();
		$mail->CharSet='utf-8';
		$mail->AddAddress($address);
		
		$message ='用WordPress的代码发送的Email';
		$message .="<br/>";
		$message .=$content;
		$mail->Body=$message;
		
		// 设置邮件头的From字段。
		// 对于网易的SMTP服务，这部分必须和你的实际账号相同，否则会验证出错。
		$mail->From='wsblb2008@163.com';
		
		// 设置发件人名字
		$mail->FromName='bilibo';
		
		// 设置邮件标题
		$mail->Subject='Test send Mail';
		
		// 设置SMTP服务器。这里使用网易的SMTP服务器。
		$mail->Host='smtp.163.com';
		
		// 设置为“需要验证”
		$mail->SMTPAuth=true;
		
		// 设置用户名和密码，即网易邮件的用户名和密码。
		$mail->Username='**************';
		$mail->Password='***********';
		
		// 发送邮件。
		if ($mail->Send()) {
			$this->Session->setFlash(__('(*^__^*)邮件发送成功！', true));
			$this->redirect('/admin/coments/index');	
			echo('<p>成功</p>');		
		} else {
			$this->Session->setFlash(__('(*^__^*)发送失败！', true));
			$this->redirect('/admin/coments/index');
			
		}echo('<p>s</p>');	
	}
?>
</body>
</html>