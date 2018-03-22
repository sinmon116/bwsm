<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"F:\bwsmtp5\public/../application/admin\view\sys\sysset.html";i:1517378785;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            二当家的Lay1.0
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/static/admin/css/x-admin.css" media="all">
		  <script src="/static/admin/js/jquery-1.11.3.min.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>会员管理</cite></a>
              <a><cite>基本设置</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
              <ul class="layui-tab-title">
                <li class="layui-this">网站设置</li>
                <li>关闭网站</li>
              </ul>
              <div class="layui-tab-content" >
                <div class="layui-tab-item layui-show">
					<?php foreach($data as $val): ?>
                    <form class="layui-form layui-form-pane" action="/admin/sys/changezd" method="post">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>网站名称
                            </label>
                            <div class="layui-input-block">
                                <input type="text" id="wname" autocomplete="off" placeholder=""
                                class="layui-input" value="<?php echo $val['wname']; ?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>URL
                            </label>
                            <div class="layui-input-block">
                                <input type="text" id="url" autocomplete="off" placeholder="http:://" value="<?php echo $val['wurl']; ?>" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>描述
                            </label>
                            <div class="layui-input-block">
                                <input type="text" id="info" autocomplete="off" placeholder="空制在80个汉字，160个字符以内" value="<?php echo $val['info']; ?>"
                                class="layui-input">
                            </div>
                        </div>
                    
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>底部版权信息
                            </label>
                            <div class="layui-input-block">
                                <input type="text" id="ban" autocomplete="off" placeholder="&copy; 2016 X-admin" value="<?php echo $val['ban']; ?>"
                                class="layui-input">
                            </div>
                        </div>
						  <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>Email
                            </label>
                            <div class="layui-input-block">
                                <input type="text" id="email" autocomplete="off" placeholder="liumeng9516@163.com" value="<?php echo $val['email']; ?>"
                                class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <span class='x-red'>*</span>备案号
                            </label>
                            <div class="layui-input-block">
                                <input type="text" id="number" autocomplete="off" placeholder="京ICP备00000000号" value="<?php echo $val['number']; ?>"
                                class="layui-input">
                            </div>
                        </div>
                     
                        <div class="layui-form-item">
                            <button class="layui-btn" lay-submit="" lay-filter="*" id="zd">
                                保存
                            </button>
                        </div>
                    </form>
                    <div style="height:100px;"></div>
                </div>
				 <!-- 修改站点信息的js -->
				<script>
					$(function(){
						$('#zd').click(function(){
					
						//读取input框中的value值
					var wname = $('#wname').val();
					var wurl = $('#url').val();
					var email = $('#email').val();
					var info = $('#info').val();
					var ban = $('#ban').val();
					var number = $('#number').val();
						
					<!-- 用ajax把数据传给后台php -->
					$.ajax({
						type:'post',
						url:'/admin/sys/changezd',
						data:{wname:wname,wurl:wurl,email:email,ban:ban,number:number,info:info},
						dataType:'json',
						success:success
					});
					
						})
						
					function success(data)
					{
						console.log(data);
					}
					});
				</script><!-- 修改站点信息结束 -->
				
              <?php endforeach; ?>
               
                <div class="layui-tab-item">
                    <form class="layui-form" action="/admin/sys/close" method="post">
                        <div class="layui-form-item">
                            <label for="AppId" class="layui-form-label">
                                <span class="x-red">*</span>是否开启
                            </label>
							 <select name="city" lay-verify="" style="width:100px;" id="kg">
							  <option value="">请选择开启或者关闭</option>
							  <option value="0">开启</option>
							  <option value="1">关闭</option>
								</select> 
						<br />
                        <div class="layui-form-item">
                            <label for="L_repass" class="layui-form-label">
                            </label>
                            <button  class="layui-btn" lay-filter="*" lay-submit="" 
							id='open1'>
                                保存
                            </button>
                        </div>
                    </form>
						<!-- 关闭站点的js -->
					<script>
						$(function(){
							//添加点击事件
							$('#open1').click(function(){
								var key = $('#kg').val();
								
								//将key通过ajax传到后台
								$.ajax({
									type:'post',
									url:'/admin/sys/closezd',
									data:{key:key},
									dataType:'json',
									success:success
								})
							})
							function success(data)
							{
								console.log(data);
							}
						
						});
					</script><!-- 关闭站点结束 -->
					
                </div>
              </div>
            </div> 
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"></script>
		
		  
		 
        <script>
            layui.use(['element','layer','form'], function(){
                $ = layui.jquery;//jquery
              lement = layui.element();//面包导航
              layer = layui.layer;//弹出层
              form = layui.form()
            

              
             //监听提交
              form.on('submit(*)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("保存成功", {icon: 6});
                return false;
              });

              })
            </script>
            <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
		<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1914329427&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1914329427:51" alt="点击这里给我发消息呦！！！" title="点击这里给我发消息呦！！！"/></a>
    </body>
</html>