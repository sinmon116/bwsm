<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/videoclass/banneradd.html";i:1519815676;}*/ ?>
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
            <form class="layui-form" action='/admin/videoclass/upload' method='post'  enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>视频
                    </label>
                    <div class="layui-input-inline">
                      <div class="site-demo-upbar">
                        <input type="file" name="file"  >
                      </div>
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="title" name="title" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>描述
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="desc" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
				
				  <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>VIP
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="vip" required="" lay-verify="required"
                        autocomplete="off" class="layui-input" placeholder='vip--1  非vip---0'>
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
				
				
					 <label class="layui-form-label" style="width:60px">所属分类</label>
                    <div class="layui-input-inline" style="width:120px;text-align: left">
                        <div class="layui-input-inline">
							<select name="cid">
                                 <option  value="kg">广告</option>
                            <?php foreach($data as $val): if($val['Count']  == 1): ?>
                                <option disabled="true" value="<?php echo $val['cid']; ?>"><?php echo $val['classname']; ?></option>
                                <?php else: ?>
                                <option value="<?php echo $val['cid']; ?>,<?php echo $val['pid']; ?>">---<?php echo $val['classname']; ?></option>
                                <?php endif; endforeach; ?>
                        </select>
						</div>
                    </div>
					
					
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="" type='submit'>
                        增加
                    </button>
                </div>
            </form>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8">
        </script>
          <script>
            layui.use(['form','layer','upload'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;


             
            

              <!-- //监听提交 -->
              <!-- form.on('submit(add)', function(data){ -->
                <!-- console.log(data); -->
                <!-- //发异步，把数据提交给php -->
                <!-- layer.alert("增加成功", {icon: 6},function () { -->
                    <!-- // 获得frame索引 -->
                    <!-- var index = parent.layer.getFrameIndex(window.name); -->
                    <!-- //关闭当前frame -->
                    <!-- parent.layer.close(index); -->
                <!-- }); -->
                <!-- return false; -->
              <!-- }); -->
              
              
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