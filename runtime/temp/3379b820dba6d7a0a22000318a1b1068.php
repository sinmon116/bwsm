<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/vip/order.html";i:1519692539;}*/ ?>
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
		<!-- <script type="text/javascript" src="/static/admin/js/ajax.js"></script> -->
		<script src="/static/admin/js/jquery-1.11.3.min.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>会员管理</cite></a>
              <a><cite>订单列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <form class="layui-form x-center" action="" style="width:800px">
                <div class="layui-form-pane" style="margin-top: 15px;">
                </div> 
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>订单列表</button><span class="x-right" style="line-height:40px">共有数据:<?php echo $count; ?>条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <!-- <th> -->
                            <!-- <input type="checkbox" name="" value=""> -->
                        <!-- </th> -->
                        <th>
                            ID
                        </th>
                        <th>
                            Money
                        </th>
                        <th>
                            用户名字
                        </th>
                     
                        <th>
                            uid
                        </th>
                      
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody id="table"></tbody>
             
            </table>

			<div id="page1" style="text-align: center">
				<a href="" class='aa'>首页</a>
				<a href="" class='aa'>上一页</a>
				<span class="aa"></span>
				<a href="" class='aa'>下一页</a>
				<a href="" class='aa'>尾页</a>
				
			</div>
            <!-- <div id="page"></div> -->
        </div>
		<script>
			var oTable = document.getElementById('table');
			var aA   = document.getElementsByClassName('aa');
				$.ajax({
					method:'get',
					url:'/admin/vip/ajaxorder',
					data:{page:1},
					success:success
				});
				function success(data)
				{	//转化为json对象
					
					oTable.innerHTML = '';
					var obj1 = JSON.parse(data);
					var obj = obj1.data;
					for (var i in obj) {
				//创建tr
					var oTr = document.createElement('tr');
					//创建td
					var oTd1 = document.createElement('td');
					//创建td
					var oTd2 = document.createElement('td');
					var oTd3 = document.createElement('td');
					var oTd4 = document.createElement('td');
					var oTd5 = document.createElement('td');
					// 给每个td赋值
					oTd1.innerHTML = obj[i].id;
					oTd2.innerHTML = obj[i].money;
					oTd3.innerHTML = obj[i].user;
					oTd4.innerHTML = obj[i].uid;
					oTd5.innerHTML ="<a href='#'>删除</a>";
					
					//删除元素
					oTd5.onclick = function()
					{
						//获取本条的id值
						var id = this.parentNode.children[0].innerHTML;
						
							del(id);
						//获取父级元素--->删除
						var oDel2 = this.parentNode;
							oTable.removeChild(oDel2);	
					}
                            
					//然后再将td放到tr里面 //
					oTr.appendChild(oTd1);
					oTr.appendChild(oTd2);
					oTr.appendChild(oTd3);
					oTr.appendChild(oTd4);
					oTr.appendChild(oTd5);
					oTable.appendChild(oTr);
			}

			//通过obj.allPage依次给上面每个a标签的href属性设置
				var oPage =  obj1.allPage;
				var i = 0;
				for (var name in oPage) {
					//console.log(name);
					if (i == 2) {
						aA[i].innerHTML = '第'+oPage[name]+'页';
					} else {
						aA[i].href = 'javascript:test(\'' +oPage[name] +'\')';
					}
					
					i++;
				}
					
	}


					function test(url)
					{
						$.ajax({
							method:'get',
							url:url,
							async:true,
							data:null,
							success:success
						});
					}

								
				function del(id)
				{
					$.ajax({
						method:'get',
						url:'/admin/vip/delorder',
						async:true,
						data:{id:id},
						success:success
					});
					function success(data)
					{
						console.log(data);
					}
				}
			
		</script>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"></script>
    
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