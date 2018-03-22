<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"F:\bwsmtp5\public/../application/admin\view\comment\commentlist.html";i:1517823431;}*/ ?>
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
              <a><cite>评论列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            回复者
                        </th>
                        <th>
                            回复内容
                        </th>
                      
                        <th>
                            回复时间
                        </th>
                        <th>
                            父级名字
                        </th>
						 <th>
                            父级ID
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="x-link">
				<?php foreach($data as $val): ?>
                    <tr>
                        <td>
                            <input type="checkbox" value="<?php echo $val['rid']; ?>" class='.delall'>
                        </td>
                        <td>
                            <?php echo $val['rid']; ?>
                        </td>
                        <td>
                          <?php echo $val['name']; ?>
                        </td>
						
					<?php if($val['level']  == 1): ?>
					
						<td><?php echo $val['concent']; ?></td>
					<?php else: ?>
						<td>
						<?php $__FOR_START_7263__=1;$__FOR_END_7263__=$val['level'];for($i=$__FOR_START_7263__;$i < $__FOR_END_7263__;$i+=1){ ?>|---<?php } ?><?php echo $val['concent']; ?>
						</td>
					<?php endif; ?>
                      
                        <td >
                           <?php echo $val['create_time']; ?>
                        </td>
                        <td >
                            
                             <?php echo $val['uname']; ?>
                            
                        </td>
						   <td >
                            
                                <?php echo $val['pid']; ?>
                           
                        </td>
                        <td class="td-manage">
                            <a title="删除" href="javascript:;" onclick="commemt_del(this,'1')" 
                            style="text-decoration:none" class='delrel'>
                                <i class="layui-icon">&#xe640;</i>
                            </a>
							<?php if($val['isdel']==1): ?>
							<a href="/admin/comment/isdel/id/<?php echo $val['rid']; ?>/isdel/0">解除</a>
							<?php else: ?>
							<a href="/admin/comment/isdel/id/<?php echo $val['rid']; ?>/isdel/1">屏蔽</a>
							<?php endif; ?>
							
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
            layui.use(['element','laypage','layer','form'], function(){
                $ = layui.jquery;//jquery
              lement = layui.element();//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层
              form = layui.form();//弹出层


          })

              

              //以上模块根据需要引入

            //批量删除提交
             function delAll () {
                layer.confirm('确认要删除吗？',function(index){
				
				   var id = []; 
                    for(var i=0;i<$('input').size();i++){
                        if($('input').eq(i).is(':checked')){
                          id.push($('input').eq(i).val());
                        }
                        
                    }
						
					//获取
					$.ajax({
						type:'get',
                        url:'/admin/comment/delall',
                        dataType:'json',
                        data:{arid:id},
                        success:success
                  
					});
					function success(data)
					{
						if(data == 1)
						{
							layer.alert("批量删除评论成功", {icon: 6},function () {
                            // 刷新父页面
                            window.location.href = '/admin/comment/commentlist';
								
							})
						}
					}
         
  
                    //捉到所有被选中的，发异步进行删除
                    layer.msg('删除成功', {icon: 1});
                });
             }
				//ajax进行删除
				$(function(){
					$('.delrel').click(function()
					{
						//获取该条评论的id
						var id = this.parentNode.parentNode.children[1].innerHTML;
						var rid =parseInt(id);
						$.ajax({
							type:'get',
							url:'/admin/comment/delrel',
							data:{rid:rid},
							dataType:'json',
							success:success
						})
					})
					function success(data)
					{
						console.log(data);
					}
				})
            
            /*删除*/
            function commemt_del(obj,id){
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