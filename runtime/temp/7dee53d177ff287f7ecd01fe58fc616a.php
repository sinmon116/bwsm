<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/videoclass/bannerlb.html";i:1518948396;}*/ ?>
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
		 <link href="/static/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>轮播管理(视频)</cite></a>
              <a><cite>视频列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <xblock><button class="layui-btn layui-btn-danger" ><i class="layui-icon">&#xe640;</i>轮播图</button><button class="layui-btn" onclick="banner_add('添加用户','/admin/videoclass/banneredit','600','500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                       
                        <th>
                            ID
                        </th>
                        <th>
                            缩略图
                        </th>
                        <th>
                          链接
                        </th>
                        <th>
                            描述
                        </th>
                    
					
                        <th style="width:100px;">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="x-img">
					<?php foreach($pic as $val): ?>
                    <tr>
                      
                        <td>
                           <?php echo $val['id']; ?>
                        </td>
                        <td >
                            <img  src="<?php echo $val['photo']; ?>" width="260" height='80' alt="点击图片试试">
                        </td>
                        <td >
                          <?php echo $val['link']; ?>
                        </td>
                        <td >
                          <?php echo $val['info']; ?>
                        </td>
                    
                        <td class="td-manage">
                            <a title="删除" href="javascript:;" onclick="banner_del(this,'1')" 
                            style="text-decoration:none" class="video">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
							
							<?php if($val['isdel']==1): ?>
							<a href="/admin/videoclass/isdel2/id/<?php echo $val['id']; ?>/isdel/0">解除</a>
							<?php else: ?>
							<a href="/admin/videoclass/isdel2/id/<?php echo $val['id']; ?>/isdel/1">屏蔽</a>
							<?php endif; ?>
						
							
                        </td>
                    </tr> 
					<?php endforeach; ?>
                </tbody>
            </table>

            <div id="rows"></div>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"></script>
		 <script src="/static/admin/js/jquery-1.11.3.min.js" charset="utf-8"></script>
        <script>
            layui.use(['laydate','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;//日期插件
              lement = layui.element();//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层

              //以上模块根据需要引入

                layer.ready(function(){ //为了layer.ext.js加载完毕再执行
                  layer.photos({
                    photos: '#x-img'
                    //,shift: 5 //0-6的选择，指定弹出图片动画类型，默认随机
                  });
                }); 
              
            });
			
			//ajax删除
			$(function(){
				$('.video').click(function()
				{
					//获取想对应视频的id
					var id = this.parentNode.parentNode.children[0].innerHTML;
					var bid =parseInt(id);
				
						$.ajax({
							type:'get',
							url:'/admin/videoclass/dellb',
							data:{bid:bid},
							dataType:'json',
							success:success
						})
					})
					function success(data)
					{
						console.log(data);
					}
			})

            //批量删除提交
             function delAll () {
                layer.confirm('确认要删除吗？',function(index){
                    //捉到所有被选中的，发异步进行删除
                    layer.msg('删除成功', {icon: 1});
                });
             }
             /*添加*/
            function banner_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }
             /*停用*/
            function banner_stop(obj,id){
                layer.confirm('确认不显示吗？',function(index){
                    //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_start(this,id)" href="javascript:;" title="显示"><i class="layui-icon">&#xe62f;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">不显示</span>');
                    $(obj).remove();
                    layer.msg('不显示!',{icon: 5,time:4000});
                });
            }

            /*启用*/
            function banner_start(obj,id){
                layer.confirm('确认要显示吗？',function(index){
                    //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_stop(this,id)" href="javascript:;" title="不显示"><i class="layui-icon">&#xe601;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已显示</span>');
                    $(obj).remove();
                    layer.msg('已显示!',{icon: 6,time:1000});
                });
            }
            // 编辑
            function banner_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
            /*删除*/
            function banner_del(obj,id){
                layer.confirm('确认要删除吗？',function(index){
                    //发异步删除数据
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                });
            }
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