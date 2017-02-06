<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/icon.ico">

    <title>爱运动管理平台</title>

    <link href="/css/plugin/bootstrap.min.css" rel="stylesheet">
    <link href="/css/plugin/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/css/theme-default.css" rel="stylesheet">
</head>
<body>

<!--contents-->
<div id="container" class="container-fluid">
    <?php require 'common/left-sidebar.php' ?>

    <!-- right side content-->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php require 'common/top-sidebar.php' ?>
        <!-- lead line buttons-->
        <ol class="breadcrumb">
            <li><a href="#">主页</a></li>
            <li class="active">运动信息</li>
        </ol>
        <!-- page contents-->
        <div id="page-content" class="page-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="chart-title">我的运动路程</span>
                        </div>
                        <div class="panel-body">
                            <div class="chart" id="sport-chart-distance" ></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="chart-title">我的运动速度</span>
                        </div>
                        <div class="panel-body">
                            <div class="chart" id="sport-chart-speed" ></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/plugin/bootstrap.min.js"></script>
<script src="/js/plugin/echarts.min.js"></script>
<script src="/js/plugin/china.js"></script>
<script src="/js/common.js"></script>
<script src="/js/sport.js"></script>

<script type="text/javascript">

    <?php
    $times = '[';
    $distances = '[';
    $speeds = '[';
    $dates = '[';
    $size = count($all);
    for ($i = 0; $i < $size; $i++) {
        if ($i == $size - 1) {
            $times = $times . $all[$i]->time;
            $distances = $distances . $all[$i]->distance;
            $speeds = $speeds . $all[$i]->speed;
            $dates = $dates . '"' . $all[$i]->date . '"';
        } else {
            $times = $times . $all[$i]->time . ',';
            $distances = $distances . $all[$i]->distance . ',';
            $speeds = $speeds . $all[$i]->speed . ',';
            $dates = $dates . '"' . $all[$i]->date . '"'. ',';
        }
    }
    $distances = $distances . ']';
    $speeds = $speeds . ']';
    $dates = $dates . ']';

    ?>
    var myChart = echarts.init(document.getElementById("sport-chart-distance"));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: ''
        },
        tooltip: {trigger: 'axis'},
        legend: {
            data:['每日运动距离(km)']
        },
        xAxis: {
            name: "日期",
            nameGap: 5,
            data: <?php echo $dates;?>
        },
        yAxis: {
            name: "距离/km",
            boundaryGap: [0, '10%']
        },
        dataZoom: [
            {
                type: 'slider',
                xAxisIndex: 0,
                filterMode: 'empty'
            },
            {
                type: 'inside',
                xAxisIndex: 0,
                filterMode: 'empty'
            }
        ],
        series: [{
            name: '运动距离',
            type: 'bar',
            data: <?php echo $distances;?>
        }]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);


    var hotchart = echarts.init(document.getElementById("sport-chart-speed"));



    var option2 = {
        tooltip: {
            trigger: 'axis',
            position: function (pt) {
                return [pt[0], '10%'];
            }
        },
        title: {
            left: 'center',
            text: ''
        },
        legend: {
            top: 'bottom',
            data:['意向']
        },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: <?php echo $dates;?>
        },
        yAxis: {
            name: '速度(km/h)',
            type: 'value',
            boundaryGap: [0, '10%']
        },
        dataZoom: [
            {
                type: 'slider',
                xAxisIndex: 0,
                filterMode: 'empty'
            },
            {
                type: 'inside',
                xAxisIndex: 0,
                filterMode: 'empty'
            }
        ],
        series: [
            {
                name:'运动强度',
                type:'line',
                smooth:true,
                symbol: 'none',
                sampling: 'average',
                itemStyle: {
                    normal: {
                        color: '#A4d3ee'
                    }
                },
                areaStyle: {
                    normal: {
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 2, [{
                            offset: 0,
                            color: '#ffffff'
                        }, {
                            offset: 1,
                            color: '#87ceff'
                        }])
                    }
                },
                data: <?php echo $speeds;?>
            }
        ]
    };

    hotchart.setOption(option2);


</script>
</body>
</html>