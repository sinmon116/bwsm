<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"F:\bwsmtp5\public/../application/index\view\user\email.html";i:1518507676;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>邮箱-找回密码</title>
<style type="text/css">
<!--
body {
    margin: 0 0; 
	font-size: 12px;
	font-family: Arial, "宋体", Helvetica, sans-serif;
	background: url(images/mail_01.jpg) repeat-x center top;
}

body, th, td, input, textarea, select, option {
	font-family: Arial, "宋体", Helvetica, sans-serif;font-size: 12px;color:#2D2C2C;
}

td {
	font-size: 12px;
	font-family: Arial, "宋体", Helvetica, sans-serif;
	color: #3c3c3c;
}

/*---links---*/
a {
	color: #3c3c3c;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

a img {
	border: none;
}

/*block*/

.bizmail_loginpanel{font-size:12px;width:300px;height:auto;background:#ffffff;}
.bizmail_LoginBox{padding:10px 15px;}
.bizmail_loginpanel h3{padding-bottom:5px;margin:0 0 5px 0;font-size:14px; display:none}
.bizmail_loginpanel form{margin:0;padding:0;}
.bizmail_loginpanel input.text{background:url(images/input_bg.jpg) repeat-x center top;font-size:12px;width:180px; line-height:25px; height:25px; border:1px #838383 solid;margin:0 2px;}
.bizmail_loginpanel .bizmail_column{height:28px; width:330px; padding-bottom:20px;}
.bizmail_loginpanel .bizmail_column label{display:block;float:left;width:30px;height:24px;line-height:24px;font-size:12px;}
.bizmail_loginpanel .bizmail_column .bizmail_inputArea{float:left;width:300px;}
.bizmail_loginpanel .bizmail_column span{font-size:12px;word-wrap:break-word;margin-left: 2px;line-height:200%;}
.bizmail_loginpanel .bizmail_SubmitArea{margin-left:30px;clear:both;}
.bizmail_loginpanel .bizmail_SubmitArea a{font-size:12px;margin-left:5px;}
.bizmail_loginpanel select{width:110px;height:20px;margin:0 2px;}
</style>
 

</head>
<body>

<table width="781" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="601" style="padding:40px 0 0 0;">&nbsp;</td>
		<td width="180" style="padding:40px 0 0 0;"><a href="/" target="_blank">网站首页</a> </td>
	</tr>
</table>

<table width="781" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:50px;">
	<tr>
		<td width="403" height="383" style="background:url(/static/email/mail_07.jpg) no-repeat center center;">&nbsp;</td>
		<td width="378" valign="top" style="background:url(/static/email/mail_08.jpg) no-repeat center center;">
			<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:100px;">
				<tr>
					<td colspan="3">
						<div class="bizmail_loginpanel" id="divLoginpanelVer">
							<div class="bizmail_LoginBox">
								<h3>登录邮箱</h3>
								
									<div class="bizmail_column">
										<label>邮箱:</label>
										<div class="bizmail_inputArea">
											<input type="text" value="" class="text" name="email" placeholder="输入邮箱--" id="email">
										</div>
									</div>

									<div class="bizmail_column" style="-background: red;width: 185px;height: 20px;
									margin-top: -20px;margin-left: 30px;">
										<span id="eip"></span>
									</div>
									<div class="bizmail_SubmitArea">
										<input type="submit" value="找回密码" style="width:66px;"
										 name="" class="" id="btn">
										<a target="_blank" href="#">忘记密码？</a>
									</div>
							
							</div>
						</div>
					</td>
				</tr>
			</table>
			<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="15%" height="120">&nbsp;</td>
					<td width="85%" valign="bottom">
						<table width="90%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="7%" height="20" align="center"><img src="/static/email/mail_18.gif" width="12" height="12" /></td>
								<!-- <td width="93%">电话：0391-6617230 6617232</td> -->
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
 <script src="/static/admin/js/jquery-1.11.3.min.js" charset="utf-8"></script>
 <script type="text/javascript">
 		$('#btn').click(function(){
 			//获取邮箱
 			var email = $('#email').val();
 			$.ajax({
 				type:'get',
 				url:'/index/user/doemail',
 				data:{email:email},
 				success:success
 			})
 			return false;

 			function success(data)
 			{
 				if(data == 2){
 					$('#eip').html('该邮箱未注册');
 					$('#eip').css('color','red');
 				}
 			}
 		})

 </script>


</body>
</html>
