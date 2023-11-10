"use strict";

(function () {
  var myChart = echarts.init(document.querySelector('#first'));
  var option = {
    tooltip: {
      trigger: 'axis',
      axisPointer: {
        type: 'cross',
        label: {
          backgroundColor: '#6a7985'
        }
      }
    },
    xAxis: {
      type: 'category',
      data: ['0s', '1s', '2s', '3s', '4s', '5s', '6s', '7s', '8s', '9s']
    },
    yAxis: {
      type: 'value',
      axisLabel: {
        formatter: '{value} V' // 设置坐标轴刻度标签的显示格式

      }
    },
    series: [{
      data: [0.5, 0.8, 1.2, 1.4, 1.5, 1.6, 1.7, 1.8, 1.9, 2.0],
      type: 'line',
      smooth: true // 平滑曲线显示

    }]
  }; // 使用刚指定的配置项和数据显示图表。

  myChart.setOption(option);
  window.addEventListener('resize', function () {
    myChart.resize();
  });
})();

(function () {
  var myChart = echarts.init(document.getElementById('second')); // 设置图表配置项和数据

  var option = {
    tooltip: {
      trigger: 'axis'
    },
    legend: {
      data: ['电流']
    },
    xAxis: {
      type: 'category',
      boundaryGap: false,
      data: ['0s', '5s', '10s', '15s', '20s', '25s', '30s']
    },
    yAxis: {
      type: 'value',
      name: '电流(A)'
    },
    series: [{
      name: '电流',
      type: 'line',
      data: [0.2, 0.4, 0.8, 1.2, 1.4, 1.6, 1.8],
      itemStyle: {
        color: 'blue'
      }
    }]
  }; // 使用配置项显示图表

  myChart.setOption(option);
  window.addEventListener('resize', function () {
    myChart.resize();
  });
})();

(function () {
  var myChart = echarts.init(document.querySelector('#third'));
  var option = {
    tooltip: {
      trigger: 'axis',
      formatter: '{b}<br/>{a}: {c} mW/cm²'
    },
    xAxis: {
      type: 'category',
      data: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1.0']
    },
    yAxis: {
      type: 'value',
      name: '功率密度(mW/cm²)',
      axisLabel: {
        formatter: '{value} mW/cm²'
      }
    },
    series: [{
      name: '功率密度',
      type: 'line',
      data: [55, 110, 170, 230, 290, 350, 410, 470, 530],
      markPoint: {
        data: [{
          type: 'max',
          name: '最大值'
        }, {
          type: 'min',
          name: '最小值'
        }]
      },
      markLine: {
        data: [{
          type: 'average',
          name: '平均值'
        }]
      }
    }]
  }; // 使用配置项显示图表

  myChart.setOption(option);
  window.addEventListener('resize', function () {
    myChart.resize();
  });
})();

(function () {
  var myChart = echarts.init(document.querySelector('#fourth'));
  var option = {
    tooltip: {},
    xAxis: {
      name: '质量密度 (g/cm^3)',
      type: 'value'
    },
    yAxis: {
      name: '功率密度 (W/g)',
      type: 'value'
    },
    series: [{
      name: '单片燃料电池',
      type: 'line',
      symbolSize: 10,
      // 设置散点的大小
      data: [[0.02, 0.1], [0.05, 0.2], [0.1, 0.4], [0.15, 0.5], [0.2, 0.6], [0.25, 0.65]]
    }]
  }; // 使用配置项显示图表

  myChart.setOption(option);
  window.addEventListener('resize', function () {
    myChart.resize();
  });
})();

(function () {
  var myCharts = echarts.init(document.querySelector('#fifth'));
  var option = {
    tooltip: {
      trigger: 'axis'
    },
    // 图例
    legend: {
      data: ['响应时间'],
      bottom: 0
    },
    // x轴
    xAxis: {
      type: 'category',
      boundaryGap: false,
      data: ['t1', 't2', 't3', 't4', 't5', 't6', 't7', 't8', 't9', 't10']
    },
    // y轴
    yAxis: {
      type: 'value',
      name: '响应时间（ms）'
    },
    // 数据
    series: [{
      name: '响应时间',
      type: 'line',
      data: [12, 15, 18, 22, 25, 28, 30, 32, 35, 38]
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
    series: [{
      type: 'gauge',
      axisLine: {
        lineStyle: {
          width: 20,
          color: [[0.2, '#2f4554'], [0.8, '#5b8c5a'], [1, '#be0000']]
        }
      },
      axisTick: {
        length: 15,
        lineStyle: {
          color: 'auto'
        }
      },
      splitLine: {
        length: 20,
        lineStyle: {
          color: 'auto'
        }
      },
      axisLabel: {
        fontSize: 15
      },
      detail: {
        valueAnimation: true,
        formatter: '{value} ℃',
        fontSize: 20
      },
      data: [{
        value: 25,
        name: '温度'
      }]
    }]
  };
  myCharts.setOption(option);
  window.addEventListener('resize', function () {
    myCharts.resize();
  });
})();