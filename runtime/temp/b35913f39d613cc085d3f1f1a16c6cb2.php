<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/videoclass/category.html";i:1518948396;}*/ ?>
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
              <a><cite>分类管理</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
		<!-- 增加板块 -->
        <div class="x-body">
             <form class="layui-form x-center" action="" style="width:55%">
                <div class="layui-form-pane" style="margin-top: 15px;">
                  <div class="layui-form-item">
                    <label class="layui-form-label" style="width:60px">所属分类</label>
                    <div class="layui-input-inline" style="width:120px;text-align: left">
                        <select name="fid" id="fenlei">
							<option value="0">不选择</option>
							<?php foreach($data as $val): if($val['Count']  == 1): ?>
	                        	<option  value="<?php echo $val['cid']; ?>"><?php echo $val['classname']; ?></option>
	                           	<?php else: ?>
	                           	<option disabled="true" value="<?php echo $val['cid']; ?>,<?php echo $val['pid']; ?>">---<?php echo $val['classname']; ?></option>
								<?php endif; endforeach; ?>
                        </select>
                    </div>
                    <div class="layui-input-inline" style="width:120px">
                        <input type="text" name="name" id="fenlm"  placeholder="分类名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:120px">
                        <input type="text" name="name" id="paixu" placeholder="排序" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" id="tianjia" lay-filter="add"><i class="layui-icon">&#xe608;</i>增加</button>
                    </div>
                  </div>
                </div> 
            </form>
		
            <xblock><button class="layui-btn layui-btn-danger" ><i class="layui-icon">&#xe640;</i>板块详情</button><span class="x-right" style="line-height:40px"></span></xblock>
			<table class="layui-table">
			<thead>
                    <tr>
                       
                        <th>
                            CID
                        </th>
                        <th>
                            显示排序
                        </th>
                        <th>
                            板块名
                        </th>
                        <th>
                            父类
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
			</table>
            <table class="layui-table" id="table">
                
                <tbody id="x-link">
                    <tr>
                       
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td class="td-manage">
                            <a title="编辑" href="javascript:;" onclick="cate_edit('编辑','/admin/videoclass/cateedit','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="javascript:;") 
                            style="text-decoration:none" class="links">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                </tbody>
				
            </table>
        </div>
		<!-- 增加板块 -->
			<script>
                var oTable =document.getElementById('table');
                var oSel =document.getElementById('fenlei');
                
                cha();
                function cha(){
                    $.ajax({
                        type:'get',
                        url:'/admin/videoclass/zhanshi',
                        data:null,
                        success:success
                    });
                }
                function success(data) {
                    oTable.innerHTML = '';
                    var s = '';
                    
                    var data = JSON.parse(data);
                    for (var i = 0; i < data.length; i++) {
                        // oA2为编辑
                        //创建tr元素
                        var oTr = document.createElement('tr');
                        //创建最后一个td元素
                        var oTd = document.createElement('td');
                        var oA1 = document.createElement('a');
                        var oA2 = document.createElement('a');

                        oA1.id = data[i].cid;
                        oA2.id = data[i].cid;

                        oA1.href = '#';
                        oA2.href = '#';

                        oA1.setAttribute('class' , 'ml-5');
                        oA2.setAttribute('onclick' , "cate_edit('编辑','/admin/videoclass/cateedit','4','','510')");
                        oA2.setAttribute('class' , 'links');

                        oA1.innerHTML = '<i class="layui-icon">&#xe640;</i>';
                        oA2.innerHTML = '<i class="layui-icon">&#xe642;</i>';

                        oA1.onclick = function ()
                        {
                            shan(this.id);
                        }

                        oA2.onclick = function()
                        {
                            xiugai(this.id);
                        }
						// 按照查出来的等级来进行排版
						s = '';
						for (var j = 1; j < data[i].Count ; j++) {
							s += '|---------------';
						}
						
                        oTd.setAttribute('class' , 'td-manage');
                        // oTd.innerHTML = '123';
                        oTr.innerHTML = '<td>'+data[i].cid+'</td><td>'+data[i].ordeby+'</td><td>'+s+data[i].classname+'</td><td>'+data[i].pid+'</td>';

                        


                        oTd.appendChild(oA2);
                        oTd.appendChild(oA1);
                        oTr.appendChild(oTd);
                        oTable.appendChild(oTr);
                    }
                }
                function shan(data1){
                    $.ajax({ 
                        type:'get',
                        url:'/admin/videoclass/delbk',
                        data:{id:data1},
                        success:success
                    });
                    function success(data)
                    {
                        cha();
                    }
                }
                function xiugai(data1){
                    <!-- alert(data1); --> 
                }

                $('#tianjia').click(function () {
                    var fenlm = $('#fenlm').val();
                    var option = $('#fenlei').val();
				
                    var paixu = $('#paixu').val();
                    console.log(fenlm , option , paixu);
                    $.ajax({ 
                        type:'post',
                        url:'/admin/videoclass/addbk',
                        data:{name:fenlm,ordeby:paixu,pid:option},
                        success:success
                    });
                    function success(data)
                    {
                        if (data == 1) {
                            // alert('添加成功');
                            $('#fenlm').val('');
                            $('#paixu').val('');
                        }
                        cha();
                    }
                    return  false;
                });




				
		
		</script>
		
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['element','layer','form'], function(){
                $ = layui.jquery;//jquery
              lement = layui.element();//面包导航
              layer = layui.layer;//弹出层
              form = layui.form();

              //监听提交 -->
              // form.on('submit(add)', function(data){
              //   console.log(data);
              //   //发异步，把数据提交给php
              //   layer.alert("增加成功", {icon: 6});
              //   $('#x-link').prepend('<tr><td>1</td><td>1</td><td>'+data.field.name+'</td><td class="td-manage"><a title="编辑"href="javascript:;"onclick="cate_edit(\'编辑\',\'cate-edit.html\',\'4\',\'\',\'510\')"class="ml-5"style="text-decoration:none"><i class="layui-icon">&#xe642;</i></a><a title="删除"href="javascript:;"onclick="cate_del(this,\'1\')"style="text-decoration:none"><i class="layui-icon">&#xe640;</i></a></td></tr>');
              //  return false;
              // });


            })



              
            //批量删除提交
             function delAll () {
                layer.confirm('确认要删除吗？',function(index){
                    //捉到所有被选中的，发异步进行删除
                    layer.msg('删除成功', {icon: 1});
                });
             }

             //-编辑
            function cate_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
           
            /*-删除*/
            <!-- function cate_del(obj,id){ -->
                <!-- layer.confirm('确认要删除吗？',function(index){ -->
                    <!-- //发异步删除数据 -->
				
                    <!-- $(obj).parents("tr").remove(); -->
                    <!-- layer.msg('已删除!',{icon:1,time:1000}); -->
                <!-- }); -->
            <!-- } -->
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