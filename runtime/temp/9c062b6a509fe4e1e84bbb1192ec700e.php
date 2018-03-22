<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/index/view/video/lister.html";i:1518948396;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>List</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="/static/index/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="/static/index/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/static/index/css/faqstyle.css" type="text/css" media="all" />
<link href="/static/index/css/medile.css" rel='stylesheet' type='text/css' />
<link href="/static/index/css/single.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="/static/index/css/contactstyle.css" type="text/css" media="all" />
<!-- news-css -->
<link rel="stylesheet" href="/static/index/news-css/news.css" type="text/css" media="all" />
<!-- //news-css -->
<!-- list-css -->
<link rel="stylesheet" href="/static/index/list-css/list.css" type="text/css" media="all" />
<!-- //list-css -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="/static/index/css/font-awesome.min.css" />
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
<!-- tables -->
<link rel="stylesheet" type="text/css" href="/static/index/list-css/table-style.css" />
<link rel="stylesheet" type="text/css" href="/static/index/list-css/basictable.css" />
<script type="text/javascript" src="/static/index/list-js/jquery.basictable.min.js"></script>
 
<!-- //tables -->
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="/"><h1>One<span>Movies</span></h1></a>
			</div>
			<div class="w3_search">
				<form action="#" method="post">
					<input type="text" name="Search" placeholder="Search" id="sou" required="" value="<?php echo $Search; ?>">
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
<!-- //nav -->
<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
			<li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>				  
		</ul>
  </nav>
</div>
<!-- faq-banner -->
	<div class="faq">
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">搜索</h4>
			<div class="container">
				<div class="agileits-news-top">
					<ol class="breadcrumb">
					  <li><a href="/">Home</a></li>
					  <li class="active">搜索</li>
					</ol>
				</div>
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="agile-news-table">
									<div class="w3ls-news-result">
										<h4>搜索结果: <span id="jieguo">25</span></h4>
									</div>
									<table id="table-breakpoint">
										< >
										  <tr>
											<th>No.</th>
											<th>电影名称</th>
											<th>上传时间</th>
											<th>浏览量</th>
											<th>下载量</th>
											<th>上传者</th>
											<th>类型</th>
										  </tr>
										</thead>
										<tbody id="table">
										  <tr>
											<td>1</td>
											<td class="w3-list-img"><a href="single.html"><img src="/static/index/images/n1.jpg" alt="" /> <span>01 Ben-Hur</span></a></td>
											<td>2014年</td>
											<td>高清</td>
											<td>英国</td>
											<td>成龙，李连杰</td>
											<td>7.0</td>
										  </tr>
										</tbody>
										<!-- 这里是ajax 的分页 -->
										<script type="text/javascript">
											var sou = $('#sou').val();
											var oTable = document.getElementById('table');
											var aA = document.getElementsByClassName('a');
											$.ajax({
												method:'get',
												url:'/index/video/cha/sou/'+sou,
												data:null,
												async:true,
												success:success
											});
											function success(data)
											{
												// console.log(data);
												oTable.innerHTML = '';
												//转化为js的对象
												var obj = JSON.parse(data);
												// console.log(obj);
												for (var i in obj.data) {
													var leix = '';
													if (obj.data[i].isvip == 1) {
														leix = 'VIP';
													} else {
														leix = '免费视频';
													}
													var oTr = document.createElement('tr');
													oTr.innerHTML = '<td>'+obj.data[i].vid+'</td><td class="w3-list-img"><a href="/index/video/single/vid/'+obj.data[i].vid+'"><img style="width:46px;height:71px;" src="'+obj.data[i].fengmian+'" /><span>'+obj.data[i].title+'</span></a></td><td>'+obj.data[i].ctime+'</td><td>'+obj.data[i].vplay+'</td><td>'+obj.data[i].vcishu+'</td><td>'+obj.data[i].username+'</td><td>'+leix+'</td>';
													oTable.appendChild(oTr);
												}
												$('#jieguo').html(obj.zongshu);
												var oPage =  obj.allPage;
												var i = 0;
												for (var name in oPage) {
													if (i == 2) {
														aA[i].innerHTML = '第'+oPage[name]+'页';
													} else {
														aA[i].href = 'javascript:test(\'' +oPage[name] +'\')';
													}
													i++;
												}
											}
											function test(url)
											{
												$.ajax({
													method:'get',
													url:url,
													async:true,
													data:null,
													success:success
												});
											}
										</script>
										<!-- 这里是ajax 的分页 -->
										
									</table>
									<div id="page" style="text-align: center">
										<a class="a" href="">首页</a>
										<a class="a" href="">上一页</a>
										<span class="a"></span>
										<a class="a" href="">下一页</a>
										<a class="a" href="">尾页</a>
									</div>
								</div>
							</div>
							
						</div>
				</div>
			</div>
	</div>
<!-- //faq-banner -->

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
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>