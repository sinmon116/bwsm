<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\PHP\php\bwsmtp5\public/../application/admin\view\index\index.html";i:1518051821;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            博文尚美影视互联-后台
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/static/admin/css/x-admin.css" media="all">
    </head>
    <body>
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header header header-demo">
                <div class="layui-main">
                    <a class="logo" href="http://www.erdangjiade.com" target="_blank">
                       博文尚美影视互联-后台
                    </a>
                    <ul class="layui-nav" lay-filter="">
                      <li class="layui-nav-item"><img src="/static/admin/images/logo.png" class="layui-circle" style="border: 2px solid #A9B7B7;" width="35px" alt=""></li>
                      <li class="layui-nav-item">
                        <a href="javascript:;">admin</a>
                        <dl class="layui-nav-child"> <!-- 二级菜单 -->
                          <dd><a href="">个人信息</a></dd>
                          <dd><a href="">切换帐号</a></dd>
                          <dd><a href="/admin/user/logout">退出</a></dd>
                        </dl>
                      </li>
                      <!-- <li class="layui-nav-item">
                        <a href="" title="消息">
                            <i class="layui-icon" style="top: 1px;">&#xe63a;</i>
                        </a>
                        </li> -->
                      <li class="layui-nav-item x-index"><a href="/">前台首页</a></li>
                    </ul>
                </div>
            </div>
            <div class="layui-side layui-bg-black x-side">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side">
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe607;</i><cite>问题管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/admin/quest/questionlist">
                                            <cite>问题列表(留言)</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/admin/quest/questiondel">
                                            <cite>问题(访问记录)</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe62d;</i><cite>板块管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/admin/videoclass/category">
                                            <cite>添加板块</cite>
                                        </a>
                                    </dd>
									 <dd class="">
                                        <a href="javascript:;" _href="/admin/videoclass/cateedit">
                                            <cite>编辑板块</cite>
                                        </a>
                                    </dd>
                                </dd>
								
								
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe634;</i><cite>轮播管理(视频)</cite>
                            </a>

                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/admin/videoclass/bannerlist">
                                            <cite>视频列表</cite>
                                        </a>
                                    </dd>
                                </dd>
								 <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/admin/videoclass/bannerlb">
                                            <cite>首页轮播</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe642;</i><cite>订单管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="./welcome.html">
                                            <cite>订单列表（待开发）</cite>
                                        </a>
                                    </dd>
									

                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe630;</i><cite>分类管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/videoclass/category2">
                                        <cite>分类列表</cite>
                                    </a>
                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe606;</i><cite>评论管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/comment/commentlist">
                                        <cite>评论列表</cite>
                                    </a>
                                </dd>
                              
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe612;</i><cite>会员管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/vip/memberlist">
                                        <cite>会员列表</cite>
                                    </a>
                                </dd>
                               
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/vip/memberlevel">
                                        <cite>等级管理</cite>
                                    </a>
                                </dd>
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/vip/memberkiss">
                                        <cite>积分管理</cite>
                                    </a>
                                </dd>
                              
                              
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe613;</i><cite>管理员管理</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/admingl/adminlist">
                                        <cite>管理员列表</cite>
                                    </a>
                                </dd>
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/admingl/adminrole">
                                        <cite>角色管理</cite>
                                    </a>
                                </dd>
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/admingl/admincate">
                                        <cite>权限分类</cite>
                                    </a>
                                </dd>
								 <dd class="">
                                    <a href="javascript:;" _href="/admin/admingl/adminrule">
                                        <cite>权限管理</cite>
                                    </a>
                                </dd>
                             
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe629;</i><cite>系统统计</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/echarts/echarts2">
                                        <cite>柱状图</cite>
                                    </a>
                                </dd>
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/echarts/echarts4">
                                        <cite>饼图</cite>
                                    </a>
                                </dd>
								 <dd class="">
                                    <a href="javascript:;" _href="/admin/echarts/echars">
                                        <cite>网站数据统计</cite>
                                    </a>
                                </dd>
								
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe614;</i><cite>系统设置</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/sys/sysset">
                                        <cite>系统设置</cite>
                                    </a>
                                </dd>
								
                
                                <!-- <dd class=""> -->
                                    <!-- <a href="javascript:;" _href="./sys-shield.html"> -->
                                        <!-- <cite>屏蔽词</cite> -->
                                    <!-- </a> -->
                                <!-- </dd> -->
                                <dd class="">
                                    <a href="javascript:;" _href="/admin/sys/syslink">
                                        <cite>友情链接</cite>
                                    </a>
                                </dd>
								 <dd class="">
                                    <a href="javascript:;" _href="/admin/echarts/map">
                                        <cite>Map</cite>
                                    </a>
                                </dd>
                                <!-- <dd class=""> -->
                                    <!-- <a href="javascript:;" _href="./sys-qq.html"> -->
                                        <!-- <cite>第三方登录</cite> -->
                                    <!-- </a> -->
                                <!-- </dd> -->
                            </dl>
                        </li>
                        <li class="layui-nav-item" style="height: 30px; text-align: center">
                        </li>
                    </ul>
                </div>

            </div>
            <div class="layui-tab layui-tab-card site-demo-title x-main" lay-filter="x-tab" lay-allowclose="true">
                <div class="x-slide_left"></div>
                <ul class="layui-tab-title">
                    <li class="layui-this">
                        我的桌面
                        <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                    </li>
                </ul>
                <div class="layui-tab-content site-demo site-demo-body">
                    <div class="layui-tab-item layui-show">
                        <iframe frameborder="0" src="./welcome.html" class="x-iframe"></iframe>
                    </div>
                </div>
            </div>
            <div class="site-mobile-shade">
            </div>
        </div>
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/admin/js/x-admin.js"></script>
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