<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/admingl/adminrule.html";i:1519630448;}*/ ?>
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
              <a><cite>权限规则</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <span class="layui-form x-center"  style="width:70%">
                <div class="layui-form-pane" style="margin-top: 15px;">
                  <div class="layui-form-item">
                    <div class="layui-input-inline">
                        <select name="cname" id='select'>
                            <option value="0">请选择父节点1</option>
							<?php foreach($parent as $v): ?>
							<option value='<?php echo $v['id']; ?>'><?php echo $v['name']; ?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="rules"  placeholder="模块/控制器/方法" autocomplete="off" class="layui-input" id='model'>
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="name"  placeholder="权限名称" autocomplete="off" class="layui-input" id='per1'>
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button id='btn1' class="layui-btn"  ><i class="layui-icon">&#xe608;</i>添加</button>
                    </div>
                  </div>
                </div> 
            </span>
            <xblock><button class="layui-btn layui-btn-danger" ><i class="layui-icon"></i>权限管理</button><span class="x-right" style="line-height:40px"></span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        
                        <th>
                            ID
                        </th>
                        <th>
                            权限规则
                        </th>
                        <th>
                            权限名称
                        </th>
                    
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="x-link">
				<?php foreach($limit as $val): ?>
                    <tr>
                        <td>
                            <?php echo $val['id']; ?>
                        </td>
                        <td>
                           <?php echo $val['path']; ?>
                        </td>
                         <?php if($val['level']  == 1): ?>
					
						<td><?php echo $val['name']; ?></td>
						<?php else: ?>
						<td>
						<?php $__FOR_START_33935288__=1;$__FOR_END_33935288__=$val['level'];for($i=$__FOR_START_33935288__;$i < $__FOR_END_33935288__;$i+=1){ ?>|----------<?php } ?><?php echo $val['name']; ?>
						</td>
						<?php endif; ?>
					
                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="rule_edit('编辑','/admin/admingl/redit/id/<?php echo $val['id']; ?>','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="rule_del(this,'1')" 
                            style="text-decoration:none" class='del'>
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
					<?php endforeach; ?>
                </tbody>
            </table>

            <div id="page"></div>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"></script>
		<script src="/static/admin/js/jquery-1.11.3.min.js" charset="utf-8"></script>
		<script>
			$(function(){
				$('#btn1').click(function(){
					//获取变量 
					var select = $('#select').val();
					var model1 = $('#model').val();
					var per1 = $('#per1').val();
					$.ajax({
						type:'post',
						url:'/admin/admingl/ad',
						data:{id:select,model:model1,name:per1},
						dataType:'json',
						success:success
					});
					function success(data)
					{
						   if (data == 1) {
                    layer.alert("修改成功", {icon: 6},function () {
                        // 获得frame索引
                        var index = parent.layer.getFrameIndex(window.name);
                        //关闭当前frame
                        parent.layer.close(index);                    
                    });
                     //刷新
                    window.location.reload();  
                    layer.closeAll('iframe'); 
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
			})
		</script>
        <script>
            layui.use(['element','laypage','layer','form'], function(){
                $ = layui.jquery;//jquery
              lement = layui.element();//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层
              form = layui.form();//弹出层

           
            })

              //以上模块根据需要引入
            //-编辑
            function rule_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
            
			<!-- ajax删除 -->
			
				 $('.del').click(function(){
					//获取id值
					var rid = this.parentNode.parentNode.children[0].innerHTML;
						var id =parseInt(rid);
						$.ajax({
							type:'get',
							url:'/admin/admingl/del',
							data:{id:id},
							dataType:'json',
							success:success
						})
				 })
				 
				 function success(data)
				 {
					console.log(data);
				 }
		
            /*删除*/
            function rule_del(obj,id){
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