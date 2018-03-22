<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"F:\bwsmtp5\public/../application/admin\view\vip\memberlist.html";i:1518577956;}*/ ?>
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
              <a><cite>会员列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <form class="layui-form x-center" action="/admin/vip/search" style="width:800px" method="poat">
                <div class="layui-form-pane" style="margin-top: 15px;">
                  <div class="layui-form-item">
                    <div class="layui-input-inline">
                      <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" ><i class="layui-icon"></i>会员列表</button><span class="x-right" style="line-height:40px">共有数据:<?php echo $count; ?>条</span></xblock>
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
                            用户名
                        </th>
                        <th>
                            是否会员
                        </th>
                        <th>
                            手机
                        </th>
                        <th>
                            邮箱
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
				<?php foreach($list as $v): ?>
                    <tr>
                        <td>
                            <input type="checkbox" value="1" name="">
                        </td>
                        <td>
                          <?php echo $v['id']; ?>
                        </td>
                        <td>
                            <u style="cursor:pointer" onclick="member_show('张三','member-show.html','10001','360','400')">
                             <?php echo $v['user_name']; ?>
                            </u>
                        </td>
                    
						 <td >
						 <?php if($v['isvip'] == 1): ?>
							<i>否</i>
                          <?php else: ?>
							<i style="color:red;">VIP会员</i>
						  <?php endif; ?>
                        </td>
                        <td >
                          <?php echo $v['phone']; ?>
                        </td>
                        <td >
                          <?php echo $v['email']; ?>
                        </td>
                       
                        <td>
                           <?php echo $v['last_login_time']; ?>
                        </td>
                     
                        <td class="td-manage">
                        
                            <a title="删除" href="javascript:;" class='member_del' 
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
							<?php if($v['isdel']==1): ?>
							<a href="/admin/vip/isdel/id/<?php echo $v['id']; ?>/isdel/0">解除</a>
							<?php else: ?>
							<a href="/admin/vip/isdel/id/<?php echo $v['id']; ?>/isdel/1">屏蔽</a>
							<?php endif; ?>
							
                        </td>
                    </tr>
					<?php endforeach; ?>
                </tbody>
				
            </table>

            <div id="rows"><?php echo $page; ?></div>
        </div>
		<link href="/static/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"></script>
		  <script src="/static/admin/js/jquery-1.11.3.min.js" charset="utf-8"></script>
		  
		  <!-- ajax实现删除用户 -->
		  <script>
				$(function(){
					$('.member_del').click(function()
					{
						//获取用户的id
						var id = this.parentNode.parentNode.children[1].innerHTML;
						var uid = parseInt(id);
						//获取当前元素
						var oDel =  this.parentNode.parentNode;
							oDel.remove();
							
							$.ajax({
								type:'post',
								url:'/admin/vip/deluser',
								data:{id:uid},
								dataType:'json',
								success:success
							})
						})
						function success(data)
						{
							if (data == 1)
							{
								alert('删除用户成功');
							}
						}
					
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
    </body>
</html>