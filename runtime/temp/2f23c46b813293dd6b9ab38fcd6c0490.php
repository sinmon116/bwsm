<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"F:\bwsmtp5\public/../application/admin\view\user\login.html";i:1518006689;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wopop</title>

<link href="/static/login/css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="login">

<div class="login_m">
	
	<div class="login_logo"><img src="/static/login/images/logo.png" width="196" height="46"></div>
	<form  action='/admin/user/dologin' method='post'>
	<div class="login_boder">
		<div class="login_padding">
			<h2>用户名</h2>
			<label>
				<input type="text" name='username' id="username" class="txt_input txt_input2" onfocus="if (value ==&#39;Your name&#39;){value =&#39;&#39;}" onblur="if (value ==&#39;&#39;){value=&#39;Your name&#39;}" value="Your name">
			</label>
			<h2>密码</h2>
			<label>
				<input type="password" name="password" id="userpwd" class="txt_input" onfocus="if (value ==&#39;******&#39;){value =&#39;&#39;}" onblur="if (value ==&#39;&#39;){value=&#39;******&#39;}" value="******">
			</label>
			<p class="forgot"><a href="javascript:void(0);">忘记密码?</a></p>
			<div class="rem_sub">
				<div class="rem_sub_l">
					<input type="checkbox" name="checkbox" id="save_me">
					<label for="checkbox">记住</label>
				</div>
				<label>
					<input type="submit" class="sub_button" name="button" id="button" value="登录" style="opacity: 0.7;">
				</label>
			</div>
		</div>
	</div><!--login_boder end-->
	</form>
</div><!--login_m end-->

<br />
<br />



</body>
</html>