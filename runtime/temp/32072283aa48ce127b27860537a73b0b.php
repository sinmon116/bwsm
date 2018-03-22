<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/quest/questiondel.html";i:1518948396;}*/ ?>
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
		 <script src="/static/admin/js/jquery-1.11.3.min.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>会员管理</cite></a>
              <a><cite>问题/资讯列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><span class="x-right" style="line-height:40px">共有数据:<?php echo $shu; ?> 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" value="">
                        </th>
                        <th>
                            ID
                        </th>
						<?php if(empty($bc) != true): else: ?>
						<th>
                            详情
                        </th>
						<?php endif; ?>
                        <th>
                            用户名
                        </th>
                        <th>
                            IP
                        </th>
                        <th>
                            访问时间
                        </th>
							<?php if(empty($bc) != true): else: ?>
                        <th>
                            浏览次数
                        </th>
						<?php endif; ?>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
				<?php foreach($list as $val): ?> 
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" value="1" name="">
                        </td>
                        <td>
                            <?php echo $val['id']; ?>
                        </td>
						<?php if(empty($bc) != true): else: ?>
                        <td>
                            <u style="cursor:pointer" onclick="question_show()">
                                
								<a href="/admin/quest/questiondel/a/<?php echo $val['uid']; ?>">记录</a>
                            </u>
                        </td>
						<?php endif; ?>
                        <td >
                            <?php echo $val['username']; ?>
                        </td>
                        <td >
                           <?php echo $val['ip']; ?>
                        </td>
                        <td >
                           <?php echo $val['retime']; ?>
                        </td>
						<?php if(empty($bc) != true): else: ?>
                        <td >
                            <?php echo $val['brows']; ?>
                        </td>
						<?php endif; ?>
                        <td class="td-manage">
                            <a style="text-decoration:none" onclick="question_recover(this,'10001')" href="javascript:;" title="恢复">
                                <i class="layui-icon">&#xe618;</i>
                            </a>
                            <a title="删除" href="javascript:;"  
                            style="text-decoration:none" class="delk">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                </tbody>
				<?php endforeach; ?>
				
            </table>
			 <div class="container">
					<div id="rows"><?php echo $page; ?></div>
				 </div>
        </div>
		 
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"></script>
	
			<!-- 用ajax实现对访问记录表的删除 -->
				<script>
				$(function(){
					$('.delk').click(function()
					{
						var oDel = this.parentNode.parentNode;
						oDel.remove();
						var id= this.parentNode.parentNode.children[1].innerHTML; 
						var lid = parseInt(id);
					
						$.ajax({
							type:'post',
							url:'/admin/quest/delfw',
							data:{id:lid},
							dataType:'json',
							success:success
						})
					});
					
					function success(data)
					{
						
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