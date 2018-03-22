<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"F:\bwsmtp5\public/../application/admin\view\echarts\echarsb.html";i:1518577645;}*/ ?>
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

      


     var   option = {
    aria: {
        show: true
    },
    title: {
        text: '',
        x: 'center'
    },
    series: [
        {
            name: '访问来源',
            type: 'pie',
            data: [
                { value: <?php echo $data; ?>, name: '用户数' },
                { value: <?php echo $fw; ?>, name: '访问量' },
                { value: <?php echo $res; ?>, name: '评论量' },
                { value: <?php echo $video; ?>, name: '视频量' },
                { value: <?php echo $pic; ?>, name: '图片库' },
                { value: <?php echo $admin; ?>, name: '管理员' }
            ]
        }
    ]
};
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
</body>
</html>