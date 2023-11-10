<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>能量管理系统</title>
</head>
<body>
    <div class="header">
        <div class="title">能量管理系统</div>
        <div class="modules">
            <div class="module active" onclick="navigateToModule(1)">氢气系统</div>
            <div class="module" onclick="navigateToModule(2)">DC/DC</div>
            <div class="module " onclick="navigateToModule(3)">单片燃料电池</div>
            <div class="module" onclick="navigateToModule(4)">空压机</div>
            <div class="module" onclick="navigateToModule(5)">燃料电池电堆</div>
            <div class="module" onclick="navigateToModule(6)">燃料电池发电机</div>
            <div class="module" onclick="navigateToModule(7)">热管理系统</div>
            <div class="module" onclick="navigateToModule(8)">实验室环境安全</div>
        </div>
        <div class="module-dropdown">
            <select id="moduleSelect" onchange="navigateToModule(this.value)">
                <option value="0">氢气系统</option>
                <option value="1">氢气系统</option>
                <option value="2">DC/DC</option>
                <option value="3">单片燃料电池</option>
                <option value="4">空压机</option>
                <option value="5">燃料电池电堆</option>
                <option value="6">燃料电池发电机</option>
                <option value="7">热管理系统</option>
                <option value="8">实验室环境安全</option>
            </select>
        </div>
    </div>
    <div class="content">
        <div class="chart-box">
            <div class='chart_title'>氢气压力(Mpa)</div>
            <div id="chart1" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气流量(L/min)</div>
            <div id="chart2" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气温度(℃)</div>
            <div id="chart3" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气储存量(kg)</div>
            <div id="chart4" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气湿度(%)</div>
            <div id="chart5" class="chart"></div>
        </div>
        <div class="chart-box">
             <div class='chart_title'>氢气纯度(%)</div>
            <div id="chart6" class="chart"></div>
        </div>
    </div>
    <script src="../js/echarts.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="./first.js"></script>
    <script>
      setInterval(function(){  
            var data = "temp";      
            var myChart = echarts.init(document.querySelector('#chart5'));       
             $.ajax({
                url:'./data.php',
                type:'get',
                data: {"data": data},
                // dataType: 'json',
                success:function(data){ 
                    // console.log(typeof(50));  
                    var value=Number(data.replace(/[^0-9]/ig, ''));       
                        // var value=Number(data.substring(2,4));
                    //    console.log(value);
                        var TP_value = value;
                    var kd = [];
                    var Gradient = [];
                    var leftColor = '';
                    var showValue = '';
                    var boxPosition = [65, 0];
                    var TP_txt = '';
                    // 刻度使用柱状图模拟，短设置1，长的设置3；构造一个数据
                    for(var i = 0, len = 135; i <= len; i++) {
                        if(i < 10 || i > 130) {
                            kd.push('')
                        } else {
                            if((i - 10) % 20 === 0) {
                                kd.push('-3');
                            } else if((i - 10) % 4 === 0) {
                                kd.push('-1');
                            } else {
                                kd.push('');
                            }
                        }
        
                    }
                    //中间线的渐变色和文本内容
                    if(TP_value > 80) {
                        TP_txt = '';
                        Gradient.push({
                            offset: 0,
                            color: '#93FE94'
                        }, {
                            offset: 0.5,
                            color: '#E4D225'
                        }, {
                            offset: 1,
                            color: '#E01F28'
                        })
                    } else if(TP_value > 10) {
                        TP_txt = '';
                        Gradient.push({
                            offset: 0,
                            color: '#93FE94'
                        }, {
                            offset: 1,
                            color: '#E4D225'
                        })
                    } else {
                        TP_txt = '';
                        Gradient.push({
                            offset: 1,
                            color: '#93FE94'
                        })
                    }
                  
                    leftColor = Gradient[Gradient.length - 1].color;
                    // 因为柱状初始化为0，温度存在负值，所以加上负值60和空出距离10
                    var option = {
                        // backgroundColor: '#098',
                        grid:{
                          left:"46%",
                          bottom:"20%",
                          top:"15%"
                        },
                        title: {
                            text: '温度计',
                            show: false
                        },
                         yAxis: [{
                            show: false,
                            data: [],
                            min: 0,
                            max: 135,
                            axisLine: {
                                show: false
                            }
                        }, {
                            show: false,
                            min: 0,
                            max: 50,
                        }, {
                            type: 'category',
                            data: ['', '', '', '', '', '', '', '', '', '', '°C'],
                            position: 'left',
                            offset: -80,
                            axisLabel: {
                                fontSize: 10,
                                color: 'white'
                            },
                            axisLine: {
                                show: false
                            },
                            axisTick: {
                                show: false
                            },
                        }], 
                        
                        xAxis: [{
                            show: false,
                            min: -10,
                            max: 80,
                            data: []
                        }, {
                            show: false,
                            min: -10,
                            max: 80,
                            data: []
                        }, {
                            show: false,
                            min: -10,
                            max: 80,
                            data: []
                        }, {
                            show: false,
                            min: -5,
                            max: 80,
        
                        }],
                        series: [{
                            name: '条',
                            type: 'bar',
                            // 对应上面XAxis的第一个对)象配置
                            xAxisIndex: 0,
                            data: [{
                                value: (TP_value + 30),//这个改那个颜色刻度的
                                label: {
                                    normal: {
                                        show: true,
                                        position: boxPosition,
                                        width: 20,
                                        height: 100,
                                        // formatter: '{back| ' + TP_value + ' }{unit|°C}\n{downTxt|' + TP_txt + '}',
                                        formatter: '{back| ' + TP_value + ' }',
                                        rich: {
                                            back: {
                                                align: 'center',
                                                lineHeight: 50,
                                                fontSize: 30,
                                                fontFamily: 'digifacewide',
                                                color: leftColor
                                            },
                                            unit: {
                                                fontFamily: '微软雅黑',
                                                fontSize: 15,
                                                lineHeight: 50,
                                                color: leftColor
                                            },
                                            downTxt: {
                                                lineHeight: 50,
                                                fontSize: 25,
                                                align: 'center',
                                                color: '#fff'
                                            }
                                        }
                                    }
                                }
                            }],
        
                            barWidth: 18,
                            itemStyle: {
                                normal: {
                                    color: new echarts.graphic.LinearGradient(0, 1, 0, 0, Gradient)
                                }
                            },
                            z: 2
                        }, {
                            name: '白框',
                            type: 'bar',
                            xAxisIndex: 1,
                            barGap: '-100%',
                            data: [134],
                            barWidth: 28,
                            itemStyle: {
                                normal: {
                                    color: '#0C2E6D',
                                    barBorderRadius: 50,
                                }
                            },
                            z: 1
                        }, {
                            name: '外框',
                            type: 'bar',
                            xAxisIndex: 2,
                            barGap: '-100%',
                            data: [135],
                            barWidth: 38,
                            itemStyle: {
                                normal: {
                                    color: '#4577BA',
                                    barBorderRadius: 50,
                                }
                            },
                            z: 0
                        }, {
                            name: '圆',
                            type: 'scatter',
                            hoverAnimation: false,
                            data: [0],
                            xAxisIndex: 0,
                            symbolSize: 48,
                            itemStyle: {
                                normal: {
                                    color: '#93FE94',
                                    opacity: 1,
                                }
                            },
                            z: 2
                        }, {
                            name: '白圆',
                            type: 'scatter',
                            hoverAnimation: false,
                            data: [0],
                            xAxisIndex: 1,
                            symbolSize: 60,
                            itemStyle: {
                                normal: {
                                    color: '#0C2E6D',
                                    opacity: 1,
                                }
                            },
                            z: 1
                        }, {
                            name: '外圆',
                            type: 'scatter',
                            hoverAnimation: false,
                            data: [0],
                            xAxisIndex: 2,
                            symbolSize: 70,
                            itemStyle: {
                                normal: {
                                    color: '#4577BA',
                                    opacity: 1,
                                }
                            },
                            z: 0
                        }, {
                            name: '刻度',
                            type: 'bar',
                            yAxisIndex: 0,
                            xAxisIndex: 3,
                            label: {
                                normal: {
                                    show: true,
                                    position: 'left',
                                    distance: 10,
                                    color: 'white',
                                    fontSize: 14,
                                    formatter: function(params) {
                                        if(params.dataIndex > 130 || params.dataIndex < 10) {
                                            return '';
                                        } else {
                                            if((params.dataIndex - 10) % 20 === 0) {
                                                return params.dataIndex - 30;//这个改刻度的，当减70的时候刻度是从-60开始不是从零开始
                                            } else {
                                                return '';
                                            }
                                        }
                                    }
                                }
                            },
                            barGap: '-100%',
                            data: kd,
                            barWidth: 1,
                            itemStyle: {
                                normal: {
                                    color: 'white',
                                    barBorderRadius: 120,
                                }
                            },
                            z: 0
                        }]
                    };
            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
            window.addEventListener('resize',function()
            {
              myChart.resize()
            });
                }
                })
            },1000)
</script>
<script>
        function navigateToModule(moduleNumber) {
            switch(moduleNumber){
                case 1:
                    window.location.href='../first/first.php';break;
                case 2:
                    window.location.href='../second/second.php';break;
                case 3:
                    window.location.href='../third/third.php';break;
                case 4:
                    window.location.href='../fourth/fourth.php';break;
                case 5:
                    window.location.href='../fifth/fifth.php';break;
                case 6:
                    window.location.href='../sixth/sixth.php';break;
                case 7:
                    window.location.href='../seventh/seventh.php';break;
                    case 8:
                    window.location.href='../eighth/eighth.php';break;
               
            }

            
}
const moduleSelect = document.getElementById('moduleSelect');

// 监听下拉框的选择事件
moduleSelect.addEventListener('change', function() {
    // 获取所选项的值
    const selectedModule = moduleSelect.value;

    // 根据选择项的值进行页面跳转
    if (selectedModule === "1") {
        window.location.href = "../first/first.php"; // 跳转到模块1页面
    } else if (selectedModule === "2") {
        window.location.href = "../second/second.php"; // 跳转到模块2页面
    }else if (selectedModule === "3") {
        window.location.href = "../third/third.php"; // 跳转到模块2页面
    }else if (selectedModule === "4") {
        window.location.href = "../fourth/fourth.php"; // 跳转到模块2页面
    }else if (selectedModule === "5") {
        window.location.href = "../fifth/fifth.php"; // 跳转到模块2页面
    }else if (selectedModule === "6") {
        window.location.href = "../sixth/sixth.php"; // 跳转到模块2页面
    }else if (selectedModule === "7") {
        window.location.href = "../seventh/seventh.php"; // 跳转到模块2页面
    }else if (selectedModule === "8") {
        window.location.href = "../eighth/eighth.php"; // 跳转到模块2页面
    }
    // 添加其他选项的跳转逻辑
});
    </script>
</body>
</html>
