<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/videoclass/cateedit.html";i:1518948396;}*/ ?>
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
        <div class="x-body">
            <form class="layui-form">
                <div class="layui-form-item">
                    
                </div>
                <div class="layui-form-item">
                    <label for="cname" class="layui-form-label">
                        <span class="x-red">*</span>新名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="cname" name="cname" required="" lay-verify="required"
                        autocomplete="off" class="layui-input" >
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">被修改板块</label>
                    <div class="layui-input-inline" >
                        <select name="fid" id='option' >
						<?php foreach($data as $val): ?>	
                            <option value="<?php echo $val['cid']; ?>"><?php echo $val['classname']; ?></option> 
                           
						<?php endforeach; ?>			 			
                        </select>
                    </div>
                </div>
				
				
                
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="save"  id="btn">
                        保存
                    </button>
                </div>
            </form>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8">
        </script>
		
		<script>
			$(function(){
				$('#btn').click(function(){
					
					var oBk = $('#cname').val(); //新名字
					var aBk =$('option').val(); //通过板块名获得
					
					$.ajax({
						type:'post',
						url:'/admin/videoclass/changebk',
						data:{cname:oBk,cid:aBk},
						dataType:'json',
						success:success
					})
					return false;
				})
				
				function success(data)
				{
					if (data == 1)
					{
						alert('修改成功');
					}
				}
				
				
			})
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