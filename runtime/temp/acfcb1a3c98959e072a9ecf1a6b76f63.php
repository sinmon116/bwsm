<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\PHP\php\bwsmtp5\public/../application/index\view\user\person.html";i:1518963924;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>TV- Series</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="/static/index/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/static/index/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/static/index/css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="/static/index/css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="/static/index/css/faqstyle.css" type="text/css" media="all" />
<link href="/static/index/css/medile.css" rel='stylesheet' type='text/css' />
<!-- font-awesome icons -->
<link rel="stylesheet" href="/static/index/css/font-awesome.min.css" />
<link rel="stylesheet" href="/static/index/css/main.css">
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="/static/index/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/static/index/js/jquery-1.11.3.min.js"></script>
<!-- //js -->
<!---<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>--->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="/static/index/js/move-top.js"></script>
<script type="text/javascript" src="/static/index/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="/static/index/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="/static/index/js/owl.carousel.js"></script>
 
<!-- 弹幕 -->
<script src="/static/index/js/jquery-2.1.4.min.js"></script>
<script src="/static/index/js/jquery.shCircleLoader.js"></script>
<script src="/static/index/js/jquery.danmu.js"></script>
<script src="/static/index/js/main.js"></script>
<!-- 弹幕 -->

</head>


</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="index.html"><h1>One<span>Movies</span></h1></a>
			</div>
			<div class="w3_search">
				<form action="/index/video/lister" method="post">
					<input type="text" name="Search" placeholder="Search" required="">
					<input type="submit" value="Go">
				</form>
			</div>
			<div class="w3l_sign_in_register">
				<?php if((\think\Session::get('uname') == null)): ?>
				<ul>
					<li><a href="#" data-toggle="modal" data-target="#myModal">登 陆</a></li>
				</ul>
				<?php else: ?>
				<ul>
					<li style="width: 100%;"><a style="display: block;width: 100%;overflow: hidden;" href="/index/user/person"><?php echo \think\Session::get('uname'); ?></a><a style="float: right;margin-top: 10px;" href="/index/index/tuichu">退出</a></li>
					<!-- <li><a href="#" data-toggle="modal" data-target="#myModal">登 陆</a></li> -->
				</ul>
				<?php endif; ?>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					登 陆 & 注 册
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
							  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
								<div class="tooltip">Click Me</div>
							  </div>
							  <div class="form">
								<h3>登录到您的帐户</h3>
								<form action="\index\user\login" method="post">
								  <input type="text" name="username" placeholder="Username" required="">
								  <input type="password" name="password" placeholder="Password" required="">
								  <input type="submit" value="Login">
								</form>
								<div style="width: 100%;height: 80px;margin-top: 20px;color: #999">
									<p>其他登陆:</p>
									<div style="width: 100%;height: 30px;"><span style="margin-left: 60px;" id="hzy_fast_login"></span></div>
								</div>
								<script src="http://open.51094.com/user/myscript/15a7266469030a.html"></script>
							  </div>
							  <div class="form">
								<h3>注 册</h3>
								<form action="\index\user\register" method="post">
								  <input type="text" name="phone" placeholder="phone" id="phone" required="">
								  <span style="width: 100%;height: 30px;background: #999; color: red;display: none;text-align: center;line-height: 30px; margin-bottom: 25px;" id="pspan">123</span>
								  <input type="password" name="password" placeholder="Password" required="">
								  <input type="password" name="pwd" placeholder="Confirm password" required="">
								  <button style="width: 130px;height: 42px;float: right;line-height: 42px;text-align: center;border: 1px solid #999;background: #999;" disabled="true" id="yzm">获取验证码</button>
								  <input type="text" name="yzm" placeholder="Verification Code" required="" style="width: 200px;height: 42px;">
								  
								  <input id="zc" type="submit" value="Register">
								</form>
								<script type="text/javascript">
									$('#yzm').click(function () {
										var phone = $('#phone').val();
										$.ajax({
											type:'post',
											url:'/index/user/dx',
											data:{phone:phone},
											success:success
										});
										function success(data){
											console.log(data);
										}

										var countdown=6;
										settime(this);
										// alert(this.html);
										function settime(val) {
										    if (countdown == 0) {
										        val.removeAttribute("disabled");  
										        $('#yzm').html("获取验证码");
										        countdown = 6;  
										        return false;  
										    } else {
										        val.setAttribute("disabled", true);  
										        // alert(111);
										        $('#yzm').html("重新发送(" + countdown + ")");  
										        countdown--;  
										    }  
										    setTimeout(function() {  
										        settime(val);  
										    },1000);  
										}
									});
									$('#phone').blur(function () {
										var shang = $('#phone').val();
										// alert(shang);
										if (shang.length == 11) {

											var phone = $('#phone').val();
											$.ajax({
												type:'post',
												url:'/index/user/isPD',
												data:{phone:phone},
												success:success
											});
											function success(data)
											{
												if (data == 1) {
													$('#yzm').attr("disabled",true).css('background' , '#999');
													$('#pspan').css('display' , 'block');
													$('#pspan').html('该手机号已注册');
												}else {
													$('#yzm').attr("disabled",false).css('background' , '#f90');
													$('#pspan').css('display' , 'none');
												}
											}
										} else {
											$('#yzm').attr("disabled",true).css('background' , '#999');
										}
											
									});
									
										
										
								</script>
							  </div>
							  <div class="cta"><a href="#">Forgot your password?</a></div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms  
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
		});
	</script>
<!-- //bootstrap-pop-up -->
<!-- nav -->
	<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li><a href="/">首 页</a></li>
						<?php foreach($data3 as $val): ?>
							<li><a href="/index/video/tv/cid/<?php echo $val['cid']; ?>"><?php echo $val['classname']; ?></a></li>
						<?php endforeach; ?>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">更多分类<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
											<?php foreach($data2 as $val): ?>
												<li><a href="/index/video/tv/cid/<?php echo $val['cid']; ?>/name/<?php echo $val['classname']; ?>"><?php echo $val['classname']; ?></a></li>
											<?php endforeach; ?>
											
										</ul>
									</div>
									
									<div class="clearfix"></div>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</nav>	
		</div>
	</div>
<div class="general_social_icons">
	<nav class="social" style="bottom: 10%;">
		<ul>
			<li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
			<li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>				  
		</ul>
  </nav>
</div>
<!-- contact -->
	<div class="contact-agile">
		
		<div class="faq">
			<h4 class="latest-text w3_latest_text">个人中心</h4>
			<div class="container">
				<div class="col-md-3 location-agileinfo">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</div>
					<h3>个人信息</h3>
						<button id="per" style="width: 166px;height: 123px;display: block;margin: 0 auto;border-radius: 28px;font-size: 34px;background: #828484;color: #3a3a3a;border: 0px;">PERSON</button>
				</div>

				<div class="col-md-3 call-agileits">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</div>
					<h3>头像 </h3>
				
					<div style="width: 80px;height: 80px;margin: 0 auto;"><img style="width: 100%;height: 100%;" src="<?php echo $info['picture']; ?>"></div>
					<!-- <h4>修改</h4> -->
					<form action="/index/user/upic" method="post" enctype="multipart/form-data">
						<input type="file" name="img" required="required" style="width: 202px;display: block;height: 26px;margin-top: 13px;color: #fff;font-size: 13px;" >
						<input type="submit"  value="点击修改" id="updatebtn" style="margin-top: 1px;width: 100px;height: 30px;float: right;padding: 0;">
					</form>
				</div>
				<div class="col-md-3 mail-wthree">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<h3>会员VIP</h3>
					<button id="vper" style="width: 166px;height: 123px;display: block;margin: 0 auto;border-radius: 28px;font-size: 34px;background: #828484;color: #3a3a3a;border: 0px;">VIP</button>

					
				</div>
				<div class="col-md-3 social-w3l">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					</div>
					<h3>上传视频</h3>
					<ul>
						<button id="sc" style="width: 166px;height: 123px;display: block;margin: 0 auto;border-radius: 28px;font-size: 34px;background: #828484;color: #3a3a3a;border: 0px;">UPLOAD</button>
					</ul>
				</div>
				<div class="clearfix"></div>
				
				<!-- 个人信息 -->
				<div style="width: 98%;height:400px;-border:1px solid gray;display: none;" id='box' >
					<!-- 头像位置 -->
					<div style="width: 150px;height: 150px;background: red;float: left;margin-top:88px;margin-left: 30px;">
					<img src="<?php echo $info['picture']; ?>" style="width: 150px;height: 150px;">
					</div>
					<div style="width: 153px;/* background: red; */float: left;height: 50px;margin-left: -171px;margin-top: 288px;text-align: center;line-height: 50px;font-size: 25px;">
						
						<?php if((\think\Session::get('isvip') == 1)): ?>
							<b style="color: #95d6ea;">普通会员</b>
						<?php else: ?>
							<b style="color: #FFD700;"><img style="width: 60px;height: 60px;" src="/static/vip.jpg">VIP会员</b>
						<?php endif; ?>
					</div>

					<!-- 信息展示 -->
					<div style="width: 400px;height: 300px;-background: green;float: left;margin-left: 60px;margin-top: 50px;">
						<form action="/index/user/change" method="post">
								<span>账号来源<?php echo $info['laiyuan']; if($info['laiyuan']  != 'phone'): ?>(无法修改密码)<?php endif; ?></span><br><br>
								昵称：&nbsp;&nbsp;<input type="text" value="<?php echo $info['user_name']; ?>" id="name"><br/>
								phone：	<input type="text" value="<?php echo $info['phone']; ?>" id="phone1"><br/>
								<input type="hidden" value="<?php echo $info['phone']; ?>" id="phone2">
								<span style="width: 195px;height: 46px;background: pink;display: none;margin-left: 55px;text-align: center;line-height: 46px;" id="pspan1"></span><br />
								<?php if($info['laiyuan']  == 'phone'): ?>
								密码：	<input type="password" value="" id="pwd" 
								style="width: 200px;height: 40px;" placeholder="修改密码请输入···"><br/><br/>
								<?php else: ?>
								<input type="password" value="" id="pwd" 
								style="display: none;" placeholder="修改密码请输入···">
								<?php endif; ?>

								Email：	<input type="text" value="<?php echo $info['email']; ?>" id="email"><br/>
										<input type="submit" value="保存" 
										style="margin-left:100px; "  id="submit"><br/>
								
						</form>

					</div>
					<!-- 访问记录 -->
					<div style="width: 400px;height: 300px;-background: pink;float: left;margin-left: 33px;
					margin-top:50px;">
						<h3>访问记录</h3><div style="width: 166px;height: 32px;float: right;margin-top: -75px;"><h3><a href="/index/user/downjl">ME·足迹</a></h3></div><br>
						<table width="400" align="right" >
							<th>用户名</th>
							<th>IP</th>
							<th>时间</th>
							<?php foreach($jl as $val): ?>
							<tr>
								<td><?php echo $val['username']; ?></td>
								
								<td style="width: 100px;"><?php echo $val['ip']; ?></td>
						
								<td><?php echo $val['retime']; ?></td>
							</tr>
							<?php endforeach; ?>
						</table>
						
					</div>
					<div style="width: 450px;height: 158px;float: right;margin-top: -100px;">
						<h3>累计签到：</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(签到10天免费领7天会员哦)
						<div style="width: 300px;height: 30px;border: 1px solid #DBDBDB;border-radius: 20px;margin: 0 auto;margin-top: 10px;margin-bottom: 10px;background:#EDEEED;">
							<div style="height: 100%;background: #FFD700;border-radius: 20px;text-align: right;line-height: 30px;" id="shu">
								20%
							</div>
							<script type="text/javascript">
								tianshu();
								function tianshu(){
									$.ajax({
										type:'get',
										url:'/index/user/chaqiandao',
										data:null,
										async:false,
										success:success
									});
									function success(data)
									{
										$('#shu').remove('width').html();
										$('#shu').css('width' , (data*10)+'%').html((data*10)+'%');
									}
								}
							</script>
						</div>
						注意事项：如发现签到10次后累计签到变为0时，请勿惊慌，系统以自动将累计签到转化为7天的会员
						<button class="btn btn-info" style="float: right;margin-top: 25px;margin-right: 38px;" disabled="false" id="qd">
							签到
						</button>
						<script type="text/javascript">
							$('#qd').click(function () {
								$.ajax({
									type:'get',
									url:'/index/user/dqiandao',
									data:null,
									async:false
								});
								tianshu();
								sfqiandao();
							});
							sfqiandao();
							function sfqiandao(){
								$.ajax({
									type:'get',
									url:'/index/user/qiandao',
									data:null,
									async:false,
									success:success
								});
								function success(data)
								{
									console.log(data);
									if (data == 1) {
										$('#qd').attr('disabled' , false);
									} else {
										$('#qd').attr('disabled' , true);
										$('#qd').html('已签到');
									}
								}
							}

						</script>
					</div>

				</div>
				<!-- 获取值 -->
				<script type="text/javascript">


					$('#phone1').blur(function () {

					var shang = $('#phone1').val();
					var xia = $('#phone2').val();

					if (shang == xia) {
						$('#pspan1').css('display' , 'none');
						$('#submit').attr('disabled' , false);
					} else {
						if (shang.length == 11) {

							var phone = $('#phone1').val();

							$.ajax({
								type:'post',
								url:'/index/user/isPD',
								data:{phone:phone},
								success:success
							});
							function success(data)
							{

								if (data == 1) {
									$('#pspan1').css('display' , 'block');
									$('#pspan1').css('background' , 'red').html('该手机号已注册');
									$('#submit').attr('disabled' , true);
								}else {
									$('#pspan1').css('display' , 'none');
									$('#submit').attr('disabled' , false);
								}
							}
						} else {
							$('#pspan1').css('display' , 'block');
							$('#pspan1').css('background' , 'red').html('手机格式不正确');
							$('#submit').attr('disabled' , true);
						}
					}
						
						
				});

					$(function(){

						$('#submit').click(function(){
							//获取昵称
							var username = $('#name').val();
							var phone1 = $('#phone1').val();
							var pwd = $('#pwd').val();
							var email = $('#email').val();
							$.ajax({
								type:'post',
								url:'/index/user/change',
								data:{name:username,phone:phone1,pwd:pwd,email:email},
								dataType:'json',
								success:success

							});
							return false;
						});

						function success(data)
						{
							if(data ==1)
							{
								alert('修改成功');
							}
						}

					})
				</script>
				<!-- 个人点击显示隐藏 -->
				<script type="text/javascript">
					$('#per').click(function () {
						// alert($('#spsc').css('display'));
						if ($('#box').css('display') == 'none') {
							$('#per').html('隐藏');
							$('#box').css('display' , 'block');
						} else {
							$('#per').html('PERSON');
							$('#box').css('display' , 'none');
						}
						
					});
				
				</script>


				<!-- 会员vip信息 -->
				<div  style="width: 98%;height:288px;-border:1px solid gray;display: none;margin-top: 66px;" id='vipbox' >
					<div style="    width: 70%;height: 392px;-background: red;margin: 0 auto;">
						<h3>如果您是vip？</h3>
						<ul style="margin-top: 50px;font-size:30px;">
							<li>观看视频无广告</li>
							<li>海量高清vip视频</li>
							<li>院线大片</li>
							<li>好莱坞大电影</li>
							<li>支持在线下载</li>
						</ul>
						<div style="float: right;margin-top: -43px;margin-right: 237px;"><a href="/codepay">点击充值VIP 享受尊贵特权</a></div>
					</div>


				</div>

				<script type="text/javascript">
					$('#vper').click(function () {
						// alert($('#spsc').css('display'));
						if ($('#vipbox').css('display') == 'none') {
							$('#vper').html('隐藏');
							$('#vipbox').css('display' , 'block');
						} else {
							$('#vper').html('VIP');
							$('#vipbox').css('display' , 'none');
						}
						
					});
				
				</script>
				<!-- 上传视频的的区域 -->
				<form action="/index/video/upload" method="post" enctype="multipart/form-data" style="display: none;margin-top: 36px;" id="spsc">
					视频标题：<br/><input type="text" name="mingc"><br/>
					选择板块：<br/>
						<select name="cid">
							<?php foreach($data as $val): if($val['Count']  == 1): ?>
	                        	<option disabled="true" value="<?php echo $val['cid']; ?>"><?php echo $val['classname']; ?></option>
	                           	<?php else: ?>
	                           	<option value="<?php echo $val['cid']; ?>,<?php echo $val['pid']; ?>">---<?php echo $val['classname']; ?></option>
								<?php endif; endforeach; ?>
                        </select>
					<br/>
					<br/>
					视频简介：<textarea rows="5" cols="20" name="vinfo"></textarea><br/><br/>
					视频：<input type="file" name="file"><br/>
					<span id="span" class="uploadinfo" style="color:red;"></span><br/>
					<input type="submit" id="stj" value="上传">
				</form>

				<script type="text/javascript">
					$('#sc').click(function () {
						// alert($('#spsc').css('display'));
						if ($('#spsc').css('display') == 'none') {
							$('#sc').html('隐藏');
							$('#spsc').css('display' , 'block');
						} else {
							$('#sc').html('UPLOAD');
							$('#spsc').css('display' , 'none');
						}
						
					});
					$('#stj').click(function () {
						$('#span').html('上传中~请稍后····');
					});
				</script>
			</div>
		</div>
	</div>
				
<!-- //contact -->

	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
				<div class="col-md-6 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_left1">
						<h2>意见与反馈</h2>
						<div class="w3ls_footer_grid_left1_pos">
							<form action="/index/question/fabiao" method="post">
								<input type="text" id="yij" style="width: 100%;height: 40px;" name="text" placeholder="您的任何意见都是对我们最大的支持" required="">
								<input type="submit" id="yijian" value="Send">
							</form>
							<script type="text/javascript">
								$(function () {
									$('#yijian').click(function () {
										var yij = $('#yij').val();
										$.ajax({
											type:'post',
											url:'/index/question/fabiao',
											data:{yij:yij},
											success:success
										});
										return false;
									});
									function success(data){
										// console.log(data);
										if (data == 0) {
											alert('发表成功');
										} else if (data == 1) {
											alert('发表失败');
										} else {
											alert('您还没有登陆');
										}
									};
								});
										
							</script>
						</div>
					</div>
				</div>
				<div class="col-md-6 w3ls_footer_grid_right">
					<a href="index.html"><h2>One<span>Movies</span></h2></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>
					<a href="<?php echo $wzxx['wurl']; ?>" title="<?php echo $wzxx['info']; ?>">
						<?php echo $wzxx['wname']; ?>
					</a><br />
					Email：<?php echo $wzxx['email']; ?>&nbsp;&nbsp;&nbsp;&nbsp;QQ在线客服：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1914329427&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1914329427:51" alt="点击这里给我发消息呦！！！" title="点击这里给我发消息呦！！！"/></a><br />
					备案号：<?php echo $wzxx['number']; ?>&nbsp;&nbsp;&nbsp;&nbsp;版权：<?php echo $wzxx['ban']; ?>
				</p>
			</div>

			<div class="col-md-7 w3ls_footer_grid1_right">
				<ul>
					<?php foreach($data4 as $val): ?>
					<li>
						<a href="<?php echo $val['url']; ?>"><?php echo $val['name']; ?></a>
					</li>
					<?php endforeach; ?>
					
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->

<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->

<script src="/static/index/js/bootstrap.min.js"></script>
</body>
</html>