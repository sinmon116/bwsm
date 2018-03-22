<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"F:\bwsmtp5\public/../application/admin\view\admingl\redit.html";i:1518158830;}*/ ?>
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
            <form action="" method="post" class="layui-form layui-form-pane">
                <div class="layui-form-item">
				<input type='hidden' value="<?php echo $info['id']; ?>" id='pid'>
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>权限名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="required" 
                        autocomplete="off" class="layui-input" value="<?php echo $info['name']; ?>">
                    </div>
                </div>
				 <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>权限规则
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="path" name="name" required="" lay-verify="required" 
                        autocomplete="off" class="layui-input" value="<?php echo $info['path']; ?>">
                    </div>
                </div>
               
              
                <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="save" id='sava'>保存</button>
              </div>
            </form>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8">
        </script>
		<script src="/static/admin/js/jquery-1.11.3.min.js" charset="utf-8"></script>
		<script>
				$('#sava').click(function(){
					//获取输入框中的元素
					var name = $('#name').val();
					var path =$('#path').val();
					var id = $('#pid').val();
					$.ajax({
						type:'get',
						url:'/admin/admingl/changeqx',
						data:{name:name,path:path,id:id},
						dataType:'json',
						successs:success
					})
				})
				
				function success(data)
				{
					   
                    console.log(data);
               
				}
		</script>
        <script>
            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;

              //监听提交
              form.on('submit(save)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("增加成功", {icon: 6},function () {
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