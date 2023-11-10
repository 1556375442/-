"use strict";

// (function(){
//     var myChart = echarts.init(document.querySelector('#fifth'));        
//             var TP_value = 40;
//                     var kd = [];
//                     var Gradient = [];
//                     var leftColor = '';
//                     var showValue = '';
//                     var boxPosition = [65, 0];
//                     var TP_txt = ''
//                     // 刻度使用柱状图模拟，短设置1，长的设置3；构造一个数据
//                     for(var i = 0, len = 135; i <= len; i++) {
//                         if(i < 10 || i > 130) {
//                             kd.push('')
//                         } else {
//                             if((i - 10) % 20 === 0) {
//                                 kd.push('-3');
//                             } else if((i - 10) % 4 === 0) {
//                                 kd.push('-1');
//                             } else {
//                                 kd.push('');
//                             }
//                         }
//                     }
//                     //中间线的渐变色和文本内容
//                     if(TP_value > 80) {
//                         TP_txt = '';
//                         Gradient.push({
//                             offset: 0,
//                             color: '#93FE94'
//                         }, {
//                             offset: 0.5,
//                             color: '#E4D225'
//                         }, {
//                             offset: 1,
//                             color: '#E01F28'
//                         })
//                     } else if(TP_value > 10) {
//                         TP_txt = '';
//                         Gradient.push({
//                             offset: 0,
//                             color: '#93FE94'
//                         }, {
//                             offset: 1,
//                             color: '#E4D225'
//                         })
//                     } else {
//                         TP_txt = '';
//                         Gradient.push({
//                             offset: 1,
//                             color: '#93FE94'
//                         })
//                     }
//                    /*  if(TP_value > 62) {
//                         showValue = 62
//                     } else {
//                         if(TP_value < -60) {
//                             showValue = -60
//                         } else {
//                             showValue = TP_value
//                         }
//                     }
//                     if(TP_value < -10) {
//                         boxPosition = [65, -120];
//                     } */
//                     leftColor = Gradient[Gradient.length - 1].color;
//                     // 因为柱状初始化为0，温度存在负值，所以加上负值60和空出距离10
//                     var option = {
//                         // backgroundColor: '#098',
//                         grid:{
//                           left:"46%",
//                           bottom:"20%",
//                           top:"15%"
//                         },
//                         title: {
//                             text: '温度计',
//                             show: false
//                         },
//                          yAxis: [{
//                             show: false,
//                             data: [],
//                             min: 0,
//                             max: 135,
//                             axisLine: {
//                                 show: false
//                             }
//                         }, {
//                             show: false,
//                             min: 0,
//                             max: 50,
//                         }, {
//                             type: 'category',
//                             data: ['', '', '', '', '', '', '', '', '', '', '°C'],
//                             position: 'left',
//                             offset: -80,
//                             axisLabel: {
//                                 fontSize: 10,
//                                 color: 'white'
//                             },
//                             axisLine: {
//                                 show: false
//                             },
//                             axisTick: {
//                                 show: false
//                             },
//                         }], 
//                         xAxis: [{
//                             show: false,
//                             min: -10,
//                             max: 80,
//                             data: []
//                         }, {
//                             show: false,
//                             min: -10,
//                             max: 80,
//                             data: []
//                         }, {
//                             show: false,
//                             min: -10,
//                             max: 80,
//                             data: []
//                         }, {
//                             show: false,
//                             min: -5,
//                             max: 80,
//                         }],
//                         series: [{
//                             name: '条',
//                             type: 'bar',
//                             // 对应上面XAxis的第一个对)象配置
//                             xAxisIndex: 0,
//                             data: [{
//                                 value: (TP_value + 30),//这个改那个颜色刻度的
//                                 label: {
//                                     normal: {
//                                         show: true,
//                                         position: boxPosition,
//                                         width: 20,
//                                         height: 100,
//                                         // formatter: '{back| ' + TP_value + ' }{unit|°C}\n{downTxt|' + TP_txt + '}',
//                                         formatter: '{back| ' + TP_value + ' }',
//                                         rich: {
//                                             back: {
//                                                 align: 'center',
//                                                 lineHeight: 50,
//                                                 fontSize: 30,
//                                                 fontFamily: 'digifacewide',
//                                                 color: leftColor
//                                             },
//                                             unit: {
//                                                 fontFamily: '微软雅黑',
//                                                 fontSize: 15,
//                                                 lineHeight: 50,
//                                                 color: leftColor
//                                             },
//                                             downTxt: {
//                                                 lineHeight: 50,
//                                                 fontSize: 25,
//                                                 align: 'center',
//                                                 color: '#fff'
//                                             }
//                                         }
//                                     }
//                                 }
//                             }],
//                             barWidth: 18,
//                             itemStyle: {
//                                 normal: {
//                                     color: new echarts.graphic.LinearGradient(0, 1, 0, 0, Gradient)
//                                 }
//                             },
//                             z: 2
//                         }, {
//                             name: '白框',
//                             type: 'bar',
//                             xAxisIndex: 1,
//                             barGap: '-100%',
//                             data: [134],
//                             barWidth: 28,
//                             itemStyle: {
//                                 normal: {
//                                     color: '#0C2E6D',
//                                     barBorderRadius: 50,
//                                 }
//                             },
//                             z: 1
//                         }, {
//                             name: '外框',
//                             type: 'bar',
//                             xAxisIndex: 2,
//                             barGap: '-100%',
//                             data: [135],
//                             barWidth: 38,
//                             itemStyle: {
//                                 normal: {
//                                     color: '#4577BA',
//                                     barBorderRadius: 50,
//                                 }
//                             },
//                             z: 0
//                         }, {
//                             name: '圆',
//                             type: 'scatter',
//                             hoverAnimation: false,
//                             data: [0],
//                             xAxisIndex: 0,
//                             symbolSize: 48,
//                             itemStyle: {
//                                 normal: {
//                                     color: '#93FE94',
//                                     opacity: 1,
//                                 }
//                             },
//                             z: 2
//                         }, {
//                             name: '白圆',
//                             type: 'scatter',
//                             hoverAnimation: false,
//                             data: [0],
//                             xAxisIndex: 1,
//                             symbolSize: 60,
//                             itemStyle: {
//                                 normal: {
//                                     color: '#0C2E6D',
//                                     opacity: 1,
//                                 }
//                             },
//                             z: 1
//                         }, {
//                             name: '外圆',
//                             type: 'scatter',
//                             hoverAnimation: false,
//                             data: [0],
//                             xAxisIndex: 2,
//                             symbolSize: 70,
//                             itemStyle: {
//                                 normal: {
//                                     color: '#4577BA',
//                                     opacity: 1,
//                                 }
//                             },
//                             z: 0
//                         }, {
//                             name: '刻度',
//                             type: 'bar',
//                             yAxisIndex: 0,
//                             xAxisIndex: 3,
//                             label: {
//                                 normal: {
//                                     show: true,
//                                     position: 'left',
//                                     distance: 10,
//                                     color: 'white',
//                                     fontSize: 14,
//                                     formatter: function(params) {
//                                         if(params.dataIndex > 130 || params.dataIndex < 10) {
//                                             return '';
//                                         } else {
//                                             if((params.dataIndex - 10) % 20 === 0) {
//                                                 return params.dataIndex - 30;//这个改刻度的，当减70的时候刻度是从-60开始不是从零开始
//                                             } else {
//                                                 return '';
//                                             }
//                                         }
//                                     }
//                                 }
//                             },
//                             barGap: '-100%',
//                             data: kd,
//                             barWidth: 1,
//                             itemStyle: {
//                                 normal: {
//                                     color: 'white',
//                                     barBorderRadius: 120,
//                                 }
//                             },
//                             z: 0
//                         }]
//                     };
//             // 使用刚指定的配置项和数据显示图表。
//             myChart.setOption(option);
//             window.addEventListener('resize',function()
//             {
//               myChart.resize()
//             });
// })();
(function () {
  var myChart = echarts.init(document.getElementById('first')); // 设置图表配置项和数据

  var option = {
    grid: {
      left: "26%",
      bottom: "15%",
      top: "20%"
    },
    tooltip: {
      trigger: 'axis',
      axisPointer: {
        type: 'cross'
      }
    },
    xAxis: {
      type: 'category',
      data: ['0秒', '1秒', '2秒', '3秒', '4秒', '5秒']
    },
    yAxis: {
      type: 'value',
      min: 0,
      max: 100,
      axisLabel: {
        formatter: '{value} MPa'
      }
    },
    series: [{
      data: [60, 80, 90, 75, 85, 95],
      type: 'line',
      smooth: true
    }]
  }; // 使用配置项显示图表

  myChart.setOption(option);
  window.addEventListener('resize', function () {
    myChart.resize();
  });
})();

(function () {
  var myChart = echarts.init(document.querySelector('#third')); // 设置图表配置项和数据

  var option = {
    tooltip: {
      trigger: 'axis',
      axisPointer: {
        type: 'shadow'
      }
    },
    grid: {
      left: "26%",
      bottom: "15%",
      top: "20%"
    },
    xAxis: {
      type: 'category',
      data: ['时间1', '时间2', '时间3', '时间4', '时间5']
    },
    yAxis: {
      type: 'value',
      min: 0,
      max: 100,
      axisLabel: {
        formatter: '{value} L/min'
      }
    },
    series: [{
      data: [60, 80, 90, 75, 85],
      type: 'bar'
    }]
  }; // 使用配置项显示图表

  myChart.setOption(option);
  window.addEventListener('resize', function () {
    myChart.resize();
  });
})();

(function () {
  var myChart = echarts.init(document.querySelector('#second'));
  var option = {
    tooltip: {
      trigger: 'axis',
      axisPointer: {
        type: 'cross'
      }
    },
    xAxis: {
      type: 'category',
      data: ['时间1', '时间2', '时间3', '时间4', '时间5']
    },
    yAxis: {
      type: 'value',
      min: 0,
      max: 100,
      axisLabel: {
        formatter: '{value} kg'
      }
    },
    series: [{
      data: [50, 60, 70, 80, 90],
      type: 'line',
      smooth: true
    }]
  }; // 使用配置项显示图表

  myChart.setOption(option);
  window.addEventListener('resize', function () {
    myChart.resize();
  });
})();

(function () {
  var myCharts = echarts.init(document.querySelector('#fourth'));
  var option = {
    tooltip: {
      formatter: '{a} <br/>{b} : {c}%'
    },
    series: [{
      name: '氢气湿度',
      type: 'gauge',
      detail: {
        formatter: '{value}%'
      },
      data: [{
        value: 50,
        name: '湿度'
      }],
      axisLine: {
        lineStyle: {
          width: 20,
          color: [[0.2, '#228B22'], [0.8, '#48b'], [1, '#ff4500']]
        }
      },
      axisLabel: {
        textStyle: {
          fontWeight: 'bolder',
          fontSize: 18,
          color: '#333'
        }
      },
      splitLine: {
        length: 20,
        lineStyle: {
          width: 2,
          color: '#999'
        }
      },
      pointer: {
        width: 5
      }
    }]
  }; // 使用配置项显示图表

  myCharts.setOption(option);
  myCharts.setOption(option);
  window.addEventListener('resize', function () {
    myCharts.resize();
  });
})();

(function () {
  var myCharts = echarts.init(document.querySelector('#sixth'));
  var option = {
    tooltip: {
      formatter: "{a} <br/>{b} : {c}%"
    },
    series: [{
      name: '氢气纯度',
      type: 'gauge',
      detail: {
        formatter: '{value}%'
      },
      data: [{
        value: 78,
        name: '氢气纯度'
      }]
    }]
  };
  myCharts.setOption(option);
  window.addEventListener('resize', function () {
    myCharts.resize();
  });
})();