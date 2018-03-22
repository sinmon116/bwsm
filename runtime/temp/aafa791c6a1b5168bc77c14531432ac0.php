<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/admingl/adminedit.html";i:1518948396;}*/ ?>
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
    </head>
    
    <body>
        <div class="x-body">
            <form class="layui-form">
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">
                        <span class="x-red">*</span>登录名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="username" required="" lay-verify="required" value="<?php echo $info['user_name']; ?>" 
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>将会成为您唯一的登入名
                    </div>
                </div>
				<input type="hidden" name="num" value="<?php echo $info['id']; ?>" id="uid">
                <div class="layui-form-item">
                    <label for="phone" class="layui-form-label">
                        <span class="x-red">*</span>手机
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="phone" value="<?php echo $info['phone']; ?>" name="phone" required="" lay-verify=""
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>将会成为您唯一的登入名
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="email" name="email" required="" lay-verify="email" value="<?php echo $info['email']; ?>"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="role" class="layui-form-label">
                        <span class="x-red">*</span>角色
                    </label>
                    <div class="layui-input-inline">
                      <select name="role" id='select'>
                        <option>请选择角色</option>
                        <option value="1" >超级管理员</option>
                        <option value="2">小管理</option>
                       
                      </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="pwd" name="pass" required="" lay-verify="pass"
                        autocomplete="off" class="layui-input" >
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div>
              
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="save" lay-submit="" id="sub">
                        保存
                    </button>
                </div>
            </form>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"> </script>
		<script src="/static/admin/js/jquery-1.11.3.min.js" charset="utf-8"></script>
       
		<!-- ajax修改信息 -->
		<script>
			$(function(){
				$('#sub').click(function(){
					var username = $('#username').val();
					var phone = $('#phone').val();
					var email = $('#email').val();
					var select = $('#select').val();
					var pwd = $('#pwd').val();
					//获取id
					var id = $('#uid').val();
				
					
					
					$.ajax({
						type:'post',
						url:'/admin/admingl/editadmin',
						data:{username:username,phone:phone,email:email,select:select,pass:pwd,id:id},
						dataType:'json',
						success:success
					});
				})
				function success(data)
				{
						console.log(data);
					   if (data == 1) {
                    layer.alert("修改成功", {icon: 6},function () {
                        // 获得frame索引
                        var index = parent.layer.getFrameIndex(window.name);
                        //关闭当前frame
                        parent.layer.close(index);                    
                    });
                     //刷新
                    window.parent.location.reload();  
                    parent.layer.closeAll('iframe'); 
                } else {
                     layer.alert("修改失败", {icon: 6},function () {
                        // 获得frame索引
                        var index = parent.layer.getFrameIndex(window.name);
                        //关闭当前frame
                        parent.layer.close(index);                    
                    });
                }
				}
				
			})	
		</script>
        <script>
            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;
            
              //自定义验证规则
              <!-- form.verify({ -->
                <!-- nikename: function(value){ -->
                  <!-- if(value.length < 5){ -->
                    <!-- return '昵称至少得5个字符啊'; -->
                  <!-- } -->
                <!-- } -->
                <!-- ,pass: [/(.+){6,12}$/, '密码必须6到12位'] -->
                <!-- ,repass: function(value){ -->
                    <!-- if($('#L_pass').val()!=$('#L_repass').val()){ -->
                        <!-- return '两次密码不一致'; -->
                    <!-- } -->
                <!-- } -->
              <!-- }); -->

              //监听提交
              form.on('submit(save)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("保存成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return false;
              });
              
              
            });
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
    </body>

</html>