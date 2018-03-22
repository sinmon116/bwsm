<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"F:\bwsmtp5\public/../application/index\view\video\single.html";i:1518579551;}*/ ?>
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
						<?php foreach($data1 as $val): ?>
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



<!-- single -->
<div class="single-page-agile-main">
<div class="container">
		<!-- /w3l-medile-movies-grids -->
			<div class="agileits-single-top">
				<ol class="breadcrumb">
				  <li><a href="/">Home</a></li>
				  <li class="active"><a href="/index/video/tv/cid/<?php echo $data['dcid']; ?>"><?php echo $dname; ?></a></li>
				  <li class="active"><a href="/index/video/gd/cid/<?php echo $data['xcid']; ?>"><?php echo $xname; ?></a></li>
				  <li class="active"><?php echo $data['title']; ?></li>
				</ol>
			</div>
			<div class="single-page-agile-info">
                   <!-- /movie-browse-agile -->
                           <div class="show-top-grids-w3lagile">
				<div class="col-sm-8 single-left">
					<div class="song">
						<div class="song-info">
							<h3><?php echo $data['title']; ?></h3>
					</div><!-- 视频播放的地方 -->
						<div class="video-grid-single-page-agileits">

						<input type="hidden" id="vurl" value="<?php echo $data['vurl']; ?>" />
						<input type="hidden" id="DMvid" value="<?php echo $data['vid']; ?>" />

					<!-- 判断是否是vip视频 -->
					<?php if($data['isvip']  == 1): ?>
						<!-- 判断是否是会员，只有回忆才能观看 -->
						<?php if((\think\Session::get('isvip') == 2)): ?>
							<div style="width: 100%;height: 460px;"  data-video="dLmKio67pVQ" id="video">
								<div class="demo">
					                <div id="danmup" style="margin:20px auto"></div>
					            </div>
					            
						        <script>
						        	var vurl = $('#vurl').val();
						        	var DMvid = $('#DMvid').val();
						            $("#danmup").DanmuPlayer({
						            	src: "http://"+vurl,
						                height: "420px", //区域的高度
						                width: "100%" //区域的宽度
						                , urlToGetDanmu: "/index/video/getData/vid/"+DMvid
						                , urlToPostDanmu: "/index/video/sendData/vid/"+DMvid
						            });
						        </script>
							</div>
						<?php else: ?>
							<div style="width: 100%;height: 460px;background: url(<?php echo $data['fengmian']; ?>) no-repeat #999;background-position:center center;">
								<div style='float: left;width: 390px;height: 125px;-background: red;margin: 0 auto;margin-top: 130px;margin-left: 185px;font-size: 30px;opacity: 0.9;background: #c7c7c7;'>
								您不是会员，无法观看此视频<br /><br />
								<p style="font-size: 16px; float: right;">了解详情请 <a href="/index/user/person" >查看-充值会员</a></p>
								</div>
								
							</div>
						<?php endif; ?>
						<!-- 判断是否是会员，只有回忆才能观看 -->
					<?php else: ?>
						<!-- 这里是免费视频 -->
							<div style="width: 100%;height: 460px;"  data-video="dLmKio67pVQ" id="video">
								<div class="demo">
					                <div id="danmup" style="margin:20px auto"></div>
					            </div>
					            
						        <script>
						        	var vurl = $('#vurl').val();
						        	var DMvid = $('#DMvid').val();
						        	// alert(DMvid);
						            $("#danmup").DanmuPlayer({
						            	src: "http://"+vurl,
						                height: "420px", //区域的高度
						                width: "100%" //区域的宽度
						                , urlToGetDanmu: "/index/video/getData/vid/"+DMvid
						                , urlToPostDanmu: "/index/video/sendData/vid/"+DMvid
						            });
						        </script>
							</div>
						<!-- 这里是免费视频 -->
					<?php endif; ?>
					<!-- 判断是否是vip视频 -->

						</div>
					</div>
					<!-- 收藏 -->
						<!-- 判断是否登陆，没有登陆则没有收藏页面 -->
					<?php if((\think\Session::get('uname') != null)): ?>
						<a class="btn btn-danger like" style="float: right;" href="" id="shoucang"><?php echo $sc; ?></a>
					<?php endif; ?>
					<script type="text/javascript">
						$('#shoucang').click(function () {
							var vid = $('#vid').val();
							$.ajax({
								type:'get',
								url:'/index/video/scang',
								data:{vid:vid},
								success:success1
							});
							return false;
						});
						function success1(data)
						{
							if (data == 1) {
								$('#shoucang').html('取消收藏');
							} else {
								$('#shoucang').html('收藏');
							}
						}
					</script>
					<!-- 收藏 -->

					<!-- 下载 -->
					<?php if((\think\Session::get('isvip') == 2)): ?>
					<a class="download btn btn-info" style="float: right;margin-right: 20px;" href="http://<?php echo $data['vurl']; ?>" download="http://<?php echo $data['vurl']; ?>" id="xiazai">下载</a>
					<?php endif; ?>
					
					<script type="text/javascript">
						$('#xiazai').click(function () {
							var vid = $('#vid').val();
							$.ajax({
								type:'get',
								url:'/index/video/xiazai',
								data:{vid:vid},
								success:success
							});
							return false;
						});
						function success(data)
						{
							console.log(data);
						}
					</script>
					<!-- 下载 -->
		<!-- 分享 -->
				<div class="jiathis_style" style="float: right;margin-right: 55px;margin-top: 10px;">
					<a class="jiathis_button_qzone"></a>
					<a class="jiathis_button_tsina"></a>
					<a class="jiathis_button_tqq"></a>
					<a class="jiathis_button_weixin"></a>
					<a class="jiathis_button_renren"></a>
					<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
					<a class="jiathis_counter_style"></a>
				</div>
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8">
				</script>
		<!-- 分享 -->





					<div class="song-grid-right">
						<div class="share">
						
							<h5>视频详情</h5>
							
						</div>
						<div style="width: 100%;padding: 30px;min-height: 188px;">
							<h4>描述：</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='border:1px solid gray;display:block;width:100%;height:150px;'><?php echo $data['info']; ?></span><br /><br />
							<h4 style='display:block;-background:green;width:300px;height:40px;float:left;'><b>上传时间：</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['ctime']; ?></h4>
							<h4 style='display:block;-background:red;width:260px;height:40px;float:left;'><b>作者:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['username']; ?></h4><br/><br>
							<h4 style='display:block;-background:green;width:300px;height:40px;float:left;'><b>浏览量：</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['vplay']; ?></h4>
							<h4 style='display:block;-background:green;width:300px;height:40px;float:left;'>评论量：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count; ?></h4><br/><br/>
							<h4>下载次数：</h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['vcishu']; ?>
						</div>
					</div>
					<!-- <div class="clearfix"> </div> -->

					<div class="all-comments">
					<!-- 评论表单 -->
						<div class="all-comments-info">
							<a href="#">评论：</a>
							<div class="agile-info-wthree-box">
								<form action="/index/reply/huifu" method="post">
									<!-- 视频的vnames -->
									<input type="hidden" name="vnames" value="<?php echo $data['title']; ?>">
									<!-- 视频的ID -->
									<input type="hidden" name="vid" id="vid" value="<?php echo $data['vid']; ?>">

									<textarea placeholder="Message" name="concent" required=""></textarea>
									<input type="submit" value="发表">
									<div class="clearfix"> </div>
								</form>
							</div>
						</div>

						<!-- 评论展示区域 -->
						<?php foreach($info as $val): ?>
						<div style="margin-left: <?php echo $val['Count']*5-5; ?>0px;margin-top: 10px;" class="media-grids">
							<!-- <?php echo $val['concent']; ?> -->
							<div class="media" style="margin: 0;">
								<h5><?php echo $val['name']; if(empty($val['uname']) != true): ?>
									回复：<?php echo $val['uname']; endif; ?>
								</h5>
								<div class="media-left">
									<a>
										<img style="width: 50px;height: 50px;" src="<?php echo $val['prc']; ?>" title="One movies" alt=" " />
									</a>
								</div>
								<div class="media-body">
									<p><?php echo $val['concent']; ?></p>
									<span style="float: left;">评论时间 :<a> <?php echo $val['create_time']; ?> </a><a style="margin-left: 30px;" href="javascript:;" onclick="ZK(<?php echo $val['rid']; ?>)">回复</a></span><br>
									<div class="col-lg-6 in-gp-tb" style="width: 100%;display: none;" id="kai<?php echo $val['rid']; ?>">
										<form action="/index/reply/huifu" method="post">
										<div class="input-group">
											<!-- 视频的vnames -->
											<input type="hidden" name="vnames" value="<?php echo $data['title']; ?>">
											<!-- 视频的ID -->
											<input type="hidden" name="vid" value="<?php echo $data['vid']; ?>">
											<!-- PID -->
											<input type="hidden" name="pid" value="<?php echo $val['rid']; ?>">
											<!-- uname -->
											<input type="hidden" name="uname" value="<?php echo $val['name']; ?>">

											<input type="text" class="form-control" name="concent" placeholder="In His Reply">
											<span class="input-group-btn">
												<button class="btn btn-default" type="submit">Go!</button>
											</span>
										</div><!-- /input-group -->
										</form>
									</div><!-- /.col-lg-6 -->
									<script type="text/javascript">
										function ZK(id){
											var s = '#kai'+id;
											if ($(s).css('display') == 'none') {
												$(s).css('display' , 'block');
											} else {
												$(s).css('display' , 'none');
											}
											return false;
										};
									</script>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col-md-4 single-right">
					<h3>热播排行榜</h3>
					<div class="single-grid-right">
					<?php foreach($data3 as $val): ?>
						<div class="single-right-grids">
							<div class="col-md-4 single-right-grid-left">
								<a href="/index/video/single/vid/<?php echo $val['vid']; ?>"><img style="height: 146px;" src="<?php echo $val['fengmian']; ?>" alt="" /></a>
							</div>
							<div class="col-md-8 single-right-grid-right">
								<a href="/index/video/single/vid/<?php echo $val['vid']; ?>" class="title"><?php echo $val['title']; ?></a>
								<p class="author">By <a class="author"><?php echo $val['username']; ?></a></p>
								<p class="views"><?php echo $val['ctime']; ?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
				

				
				<div class="clearfix"> </div>
			</div>
				<!-- //movie-browse-agile -->
			
						
							 
				</div>
				<!-- //w3l-latest-movies-grids -->
			</div>	
		</div>
	<!-- //w3l-medile-movies-grids -->
<!-- Bootstrap Core JavaScript -->
<script src="/static/index/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
</body>
</html>