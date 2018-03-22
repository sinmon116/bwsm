<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\PHP\php\bwsmtp5\public/../application/admin\view\admingl\adminrole.html";i:1517985907;}*/ ?>
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
              <a><cite>角色管理</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="role_add('添加用户','/admin/admingl/roleadd','900','500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        
                        <th>
                            ID
                        </th>
                        <th>
                            角色名
                        </th>
                        <th>
                            拥有权限规则
                        </th>
                        <th>
                            描述
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="table"> </tbody>
            </table>

            <div id="page"></div>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"></script>
		<!-- ajax数据 -->
		<script>
			//获取元素
			var oTable=document.getElementById('table');
				
			cha();
				function cha(){
					$.ajax({
						type:'get',
						url:'/admin/admingl/role',
						data:null,
						dataType:'json',
						success:success
					})
				}
				function success(data)
				{
					for (var i in data)
					{
						//创建tr
						var oTr =document.createElement('tr');
						//创建td
						
						var oTd2=document.createElement('td');
						var oTd3=document.createElement('td');
						var oTd4=document.createElement('td');
						var oTd5=document.createElement('td');
						var oTd6=document.createElement('td');
						//将数据写进td
					
						oTd2.innerHTML=data[i].id;
						oTd3.innerHTML=data[i].name;
						oTd4.innerHTML='1';
						oTd5.innerHTML=data[i].description;
						oTd6.innerHTML='<a>删除</a>';
						
						//然后再将td放到tr里面 //
				
						oTr.appendChild(oTd2);
						oTr.appendChild(oTd3);
						oTr.appendChild(oTd4);
						oTr.appendChild(oTd5);
						oTr.appendChild(oTd6);
						oTable.appendChild(oTr);
						
					}
					
				}
				
			
		</script>
        <script>
            layui.use(['laydate','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;//日期插件
              lement = layui.element();//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层

              //以上模块根据需要引入
            });

            //批量删除提交
             function delAll () {
                layer.confirm('确认要删除吗？',function(index){
                    //捉到所有被选中的，发异步进行删除
                    layer.msg('删除成功', {icon: 1});
                });
             }
             /*添加*/
            function role_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }

             
            //编辑
            function role_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
            /*删除*/
            function role_del(obj,id){
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