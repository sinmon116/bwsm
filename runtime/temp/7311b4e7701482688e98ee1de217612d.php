<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"F:\bwsmtp5\public/../application/admin\view\echarts\echars.html";i:1518577702;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
    <!-- 引入 echarts.js -->
    <script src="./echarts.min.js"></script>
	 <script src="//cdn.bootcss.com/echarts/3.3.2/echarts.min.js" charset="utf-8"></script>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width: 600px;height:400px;"></div>
    <script type="text/javascript">
        // // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '网站数据统计 '
            },
            tooltip: {},
            legend: {
                data:['销量']
            },
            xAxis: {
                data: ["浏览量","用户数","管理员","评论量","视频量","图片库"]
            },
            yAxis: {},
            series: [{
                name: '数据',
                type: 'bar',
                data: [<?php echo $fw; ?>, <?php echo $data; ?>, <?php echo $admin; ?>, <?php echo $res; ?>, <?php echo $video; ?>, <?php echo $pic; ?>]
            }]
        };


//      var   option = {
//     aria: {
//         show: true
//     },
//     title: {
//         text: '某站点用户访问来源',
//         x: 'center'
//     },
//     series: [
//         {
//             name: '访问来源',
//             type: 'pie',
//             data: [
//                 { value: 335, name: '直接访问' },
//                 { value: 310, name: '邮件营销' },
//                 { value: 234, name: '联盟广告' },
//                 { value: 135, name: '视频广告' },
//                 { value: 1548, name: '搜索引擎' }
//             ]
//         }
//     ]
// };
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
</body>
</html>