<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/admingl/adminlist.html";i:1518948396;}*/ ?>
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
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>会员管理</cite></a>
              <a><cite>管理员列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <form class="layui-form x-center" action="" style="width:80%">
                <div class="layui-form-pane" style="margin-top: 15px;">
                  <div class="layui-form-item">
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" ><i class="layui-icon"></i>管理员列表</button><button class="layui-btn" onclick="admin_add('添加用户','/admin/admingl/adminadd','600','500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                       
                        <th>
                            ID
                        </th>
                        <th>
                            登录名
                        </th>
                        <th>
                            手机
                        </th>
                        <th>
                            邮箱
                        </th>
                        <th>
                            角色
                        </th>
                        <th>
                            加入时间
                        </th>
                      
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
				<?php foreach($auser as $val): ?>
                    <tr>
                        
                        <td>
                            <?php echo $val['id']; ?>
                        </td>
                        <td>
                            <?php echo $val['user_name']; ?>
                        </td>
                        <td >
                            <?php echo $val['phone']; ?>
                        </td>
                        <td >
                            <?php echo $val['email']; ?>
                        </td>
						<?php foreach($role as $v): ?>
						<!-- 用户的id =   user_role的id -->
						<?php if($val['id'] == $v['user_id']): ?>
                        <td ><?php echo $v['name']; ?></td>
						<?php endif; endforeach; ?>
                        
                        <td>
                           <?php echo date('Y-m-d H:i:s',$val['last_login_time']); ?>
                        </td>
						
                        <td class="td-manage">
                           
                            <a title="编辑" href="javascript:;" onclick="admin_edit('编辑','/admin/admingl/adminedit/id/<?php echo $val['id']; ?>','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="admin_del(this,'1')" 
                            style="text-decoration:none" class="btn">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
					<?php endforeach; ?>
                </tbody>
            </table>

           
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

              laypage({
                cont: 'page'
                ,pages: 100
                ,first: 1
                ,last: 100
                ,prev: '<em><</em>'
                ,next: '<em>></em>'
              }); 
              
              var start = {
                min: laydate.now()
                ,max: '2099-06-16 23:59:59'
                ,istoday: false
                ,choose: function(datas){
                  end.min = datas; //开始日选好后，重置结束日的最小日期
                  end.start = datas //将结束日的初始值设定为开始日
                }
              };
              
              var end = {
                min: laydate.now()
                ,max: '2099-06-16 23:59:59'
                ,istoday: false
                ,choose: function(datas){
                  start.max = datas; //结束日选好后，重置开始日的最大日期
                }
              };
              
              document.getElementById('LAY_demorange_s').onclick = function(){
                start.elem = this;
                laydate(start);
              }
              document.getElementById('LAY_demorange_e').onclick = function(){
                end.elem = this
                laydate(end);
              }
              
            });

             /*添加*/
            function admin_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }

           

            /*启用*/
            function admin_start(obj,id){
                layer.confirm('确认要启用吗？',function(index){
                    //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_stop(this,id)" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!',{icon: 6,time:1000});
                });
            }
            //编辑
            function admin_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
			
			<!-- ajax删除管理员 -->
				$(function(){
					var oDel = $('.btn').click(function(){
					//获取id值
					var rid = this.parentNode.parentNode.children[0].innerHTML;
						var id =parseInt(rid);
					
						$.ajax({
							type:'post',
							url:'/admin/admingl/deladmin',
							data:{id:id},
							dataType:'json',
							success:success
						});
					})
					function success(data)
					{
						console.log(data);
					}
					
				})
			
            /*删除*/
            function admin_del(obj,id){
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