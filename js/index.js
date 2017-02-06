
var myChart = echarts.init(document.getElementById("sports-chart"));

// 指定图表的配置项和数据
var option = {
    title: {
        text: ''
    },
    tooltip: {},
    legend: {
        data:['每日运动距离(km)']
    },
    xAxis: {
        name: "日期",
        nameGap: 5,
        data: ["10-20","10-21","10-22","10-23","10-24","10-25","10-26"]
    },
    yAxis: {
        name: "距离/km"
    },
    series: [{
        name: '距离',
        type: 'bar',
        data: [14.2, 12.0, 10, 6, 2.1, 2.7, 5.3]
    }]
};

// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);


var hotchart = echarts.init(document.getElementById("hot-chart"));

var base = +new Date(2016, 10, 1);
var oneDay = 24 * 3600 * 1000;
var date = [];

var data = [1000];

for (var i = 1; i < 30; i++) {
    var now = new Date(base += oneDay);
    date.push([now.getFullYear(), now.getMonth() + 1, now.getDate()].join('/'));
    data.push(Math.round((Math.random()) * 10 + data[i - 1]));
}

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
    toolbox: {
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            restore: {},
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: date
    },
    yAxis: {
        type: 'value',
        boundaryGap: [0, '100%']
    },

    series: [
        {
            name:'模拟数据',
            type:'line',
            smooth:true,
            symbol: 'none',
            sampling: 'average',
            itemStyle: {
                normal: {
                    color: 'rgb(255, 70, 131)'
                }
            },
            areaStyle: {
                normal: {
                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                        offset: 0,
                        color: 'rgb(255, 158, 68)'
                    }, {
                        offset: 1,
                        color: 'rgb(255, 70, 131)'
                    }])
                }
            },
            data: data
        }
    ]
};

hotchart.setOption(option2);