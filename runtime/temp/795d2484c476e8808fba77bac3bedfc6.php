<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/home/wwwroot/tp.chenjiangjiang.cn/public/../application/admin/view/index/welcome.html";i:1518948396;}*/ ?>
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
            <blockquote class="layui-elem-quote">
              <marquee direction="left" ><font size='+1'>欢迎来到博文尚美影视互联--后台管理</font></marquee>
            </blockquote>
           <!--  <p>登录次数：18 </p>
            <p>上次登录IP：222.35.131.79.1  上次登录时间： 2017-01-01 11:19:55</p> -->
            <fieldset class="layui-elem-field layui-field-title site-title">
              <legend><a name="default">信息统计</a></legend>
            </fieldset>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>统计</th>
                        <th>访问量</th>
                        <th>视频量</th>
                        <th>图片库</th>
                        <th>评论数</th>
                        <th>用户</th>
                        <th>管理员</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>总数</td>
                        <td><?php echo $fw; ?></td>
                        <td><?php echo $video; ?></td>
                        <td><?php echo $pic; ?></td>
                        <td><?php echo $res; ?></td>
                        <td><?php echo $data; ?></td>
                        <td><?php echo $admin; ?></td>
                    </tr>
               
                </tbody>
            </table>
        
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin//js/x-admin.js"></script>
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