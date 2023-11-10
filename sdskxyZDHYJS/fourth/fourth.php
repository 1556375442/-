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
            <div class="module " onclick="navigateToModule(1)">氢气系统</div>
            <div class="module" onclick="navigateToModule(2)">DC/DC</div>
            <div class="module " onclick="navigateToModule(3)">单片燃料电池</div>
            <div class="module active" onclick="navigateToModule(4)">空压机</div>
            <div class="module" onclick="navigateToModule(5)">燃料电池电堆</div>
            <div class="module" onclick="navigateToModule(6)">燃料电池发电机</div>
            <div class="module" onclick="navigateToModule(7)">热管理系统</div>
            <div class="module" onclick="navigateToModule(8)">实验室环境安全</div>
        </div>
        <div class="module-dropdown">
            <select id="moduleSelect" onchange="navigateToModule(this.value)">
                <option value="0">空压机</option>
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
            <div class='chart_title'>空压机进口压力(Mpa)</div>
            <div id="chart1" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>空压机出口压力(Mpa)</div>
            <div id="chart2" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>空压机进口温度(℃)</div>
            <div id="chart3" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>空压机出口温度(℃)</div>
            <div id="chart4" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>空压机进口流量(L/min)</div>
            <div id="chart5" class="chart"></div>
        </div>
        <div class="chart-box">
             <div class='chart_title'>氮气气源压力(Mpa)</div>
            <div id="chart6" class="chart"></div>
        </div>
    </div>
    <script src="../js/echarts.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script >
  
  setInterval(function(){
var myCharts=echarts.init(document.querySelector('#chart2'));
     $.ajax({
        url:'./fourthapi.php',
        type:'get',
        // dataType: 'json',
        success:function(data){

        switch (JSON.parse(data)[6]){
                        case 1:
                          var value=JSON.parse(data)[1];
                        var formatter1=function (value) {
          return value ;
        };

                            break;
                        case 0: 
                          var formatter1='---';
                          var value='---';
                            break;
                    }
//           <?php
// //  sendMail('1556375442@qq.com','警告','高压状态')
// ?>
//           }
<?php
//  sendMail('1556375442@qq.com','警告','低压状态')
?>
// }

var ROOT_PATH = 'https://echarts.apache.org/examples';
    
    var option;
    
    var _panelImageURL = ROOT_PATH + '/data/asset/img/custom-gauge-panel.png';
    var _animationDuration = 1000;
    var _animationDurationUpdate = 1000;
    var _animationEasingUpdate = 'quarticInOut';
    var _valOnRadianMax =300;
    var _outerRadius = 130;
    var _innerRadius = 110;
    var _pointerInnerRadius = 40;
    var _insidePanelRadius = 100;
    var _currentDataIndex = 0;
    function renderItem(params, api) {
      var valOnRadian = api.value(1);
      var coords = api.coord([api.value(0), valOnRadian]);
      var polarEndRadian = coords[3];
      var imageStyle = {
        image: _panelImageURL,
        x: params.coordSys.cx - _outerRadius,
        y: params.coordSys.cy - _outerRadius,
        width: _outerRadius * 2,
        height: _outerRadius * 2
      };
      return {
        type: 'group',
        children: [
          {
            type: 'image',
            style: imageStyle,
            clipPath: {
              type: 'sector',
              shape: {
                cx: params.coordSys.cx,
                cy: params.coordSys.cy,
                r: _outerRadius,
                r0: _innerRadius,
                startAngle: 0,
                endAngle: -polarEndRadian,
                transition: 'endAngle',
                enterFrom: { endAngle: 0 }
              }
            }
          },
          {
            type: 'image',
            style: imageStyle,
            clipPath: {
              type: 'polygon',
              shape: {
                points: makePionterPoints(params, polarEndRadian)
              },
              extra: {
                polarEndRadian: polarEndRadian,
                transition: 'polarEndRadian',
                enterFrom: { polarEndRadian: 0 }
              },
              during: function (apiDuring) {
                apiDuring.setShape(
                  'points',
                  makePionterPoints(params, apiDuring.getExtra('polarEndRadian'))
                );
              }
            }
          },
          {
            type: 'circle',
            shape: {
              cx: params.coordSys.cx,
              cy: params.coordSys.cy,
              r: _insidePanelRadius
            },
            style: {
              fill: '#fff',
              shadowBlur: 25,
              shadowOffsetX: 0,
              shadowOffsetY: 0,
              shadowColor: 'rgba(76,107,167,0.4)'
            }
          },
          {
            type: 'text',
            extra: {
              valOnRadian: valOnRadian,
              transition: 'valOnRadian',
              enterFrom: { valOnRadian: 0 }
            },
            style: {
              text: makeText(valOnRadian),
              // text:80,
              fontSize: 50,
              fontWeight: 700,
              x: params.coordSys.cx,
              y: params.coordSys.cy,
              fill: 'rgb(0,50,190)',
              align: 'center',
              verticalAlign: 'middle',
              enterFrom: { opacity: 0 }
            },
            during: function (apiDuring) {
              apiDuring.setStyle(
                'text',
                makeText(apiDuring.getExtra('valOnRadian'))
              );
            }
          }
        ]
      };
    }
    function convertToPolarPoint(renderItemParams, radius, radian) {
      return [
        Math.cos(radian) * radius + renderItemParams.coordSys.cx,
        -Math.sin(radian) * radius + renderItemParams.coordSys.cy
      ];
    }
    function makePionterPoints(renderItemParams, polarEndRadian) {
      return [
        convertToPolarPoint(renderItemParams, _outerRadius, polarEndRadian),
        convertToPolarPoint(
          renderItemParams,
          _outerRadius,
          polarEndRadian + Math.PI * 0.03
        ),
        convertToPolarPoint(renderItemParams, _pointerInnerRadius, polarEndRadian)
      ];
    }
    function makeText(valOnRadian) {
      // Validate additive animation calc.
      if (valOnRadian < -10) {
        alert('illegal during val: ' + valOnRadian);
      }
      // return ((valOnRadian / _valOnRadianMax) * 100).toFixed(0) + '%';
      return value;
    }
    option = {
      animationEasing: _animationEasingUpdate,
      animationDuration: _animationDuration,
      animationDurationUpdate: _animationDurationUpdate,
      animationEasingUpdate: _animationEasingUpdate,
      dataset: {
        source: [[177, JSON.parse(data)[1]]]
        
      },
      data: [
        {
          value: 50,
          
        },
        
      ],
      tooltip: {},
      angleAxis: {
        type: 'value',
        startAngle: 0,
        show: false,
        min: 0,
        max: _valOnRadianMax
      },
      radiusAxis: {
        type: 'value',
        show: false
      },
      polar: {},
      series: [
        {
          type: 'custom',
          coordinateSystem: 'polar',
          renderItem: renderItem
        }
      ]
    };            
  myCharts.setOption(option);
  window.addEventListener('resize',function(){
      myCharts.resize();
  })
            }
        });
        

} ,1000)
 
 
         
           <?php
//  sendMail('1556375442@qq.com','警告','超荷状态')
?>

    // console.log("nihao");}

<?php
//  sendMail('1556375442@qq.com','警告','欠荷状态')
?>

  setInterval(function(){

    var myCharts=echarts.init(document.querySelector('#chart1'));
 
     $.ajax({
        url:'./fourthapi.php',
        type:'get',
        // dataType: 'json',
        success:function(data){
          console.log(JSON.parse(data)[6]);
          switch (JSON.parse(data)[6]){
                        case 1:
                          var value=JSON.parse(data)[0];
                        var formatter1=function (value) {
          return value ;
        };
                        // var formatter1= ' {value.toFixed(1)} V';
                          
                   
                            break;
                        case 0:
             
                          var formatter1='---';
                          var value='---';
                            break;
                    }
        
          var ROOT_PATH = 'https://echarts.apache.org/examples';
    
    var option;
    
    var _panelImageURL = ROOT_PATH + '/data/asset/img/custom-gauge-panel.png';
    var _animationDuration = 1000;
    var _animationDurationUpdate = 1000;
    var _animationEasingUpdate = 'quarticInOut';
    var _valOnRadianMax =300;
    var _outerRadius = 130;
    var _innerRadius = 110;
    var _pointerInnerRadius = 40;
    var _insidePanelRadius = 100;
    var _currentDataIndex = 0;
    function renderItem(params, api) {
      var valOnRadian = api.value(1);
      var coords = api.coord([api.value(0), valOnRadian]);
      var polarEndRadian = coords[3];
      var imageStyle = {
        image: _panelImageURL,
        x: params.coordSys.cx - _outerRadius,
        y: params.coordSys.cy - _outerRadius,
        width: _outerRadius * 2,
        height: _outerRadius * 2
      };
      return {
        type: 'group',
        children: [
          {
            type: 'image',
            style: imageStyle,
            clipPath: {
              type: 'sector',
              shape: {
                cx: params.coordSys.cx,
                cy: params.coordSys.cy,
                r: _outerRadius,
                r0: _innerRadius,
                startAngle: 0,
                endAngle: -polarEndRadian,
                transition: 'endAngle',
                enterFrom: { endAngle: 0 }
              }
            }
          },
          {
            type: 'image',
            style: imageStyle,
            clipPath: {
              type: 'polygon',
              shape: {
                points: makePionterPoints(params, polarEndRadian)
              },
              extra: {
                polarEndRadian: polarEndRadian,
                transition: 'polarEndRadian',
                enterFrom: { polarEndRadian: 0 }
              },
              during: function (apiDuring) {
                apiDuring.setShape(
                  'points',
                  makePionterPoints(params, apiDuring.getExtra('polarEndRadian'))
                );
              }
            }
          },
          {
            type: 'circle',
            shape: {
              cx: params.coordSys.cx,
              cy: params.coordSys.cy,
              r: _insidePanelRadius
            },
            style: {
              fill: '#fff',
              shadowBlur: 25,
              shadowOffsetX: 0,
              shadowOffsetY: 0,
              shadowColor: 'rgba(76,107,167,0.4)'
            }
          },
          {
            type: 'text',
            extra: {
              valOnRadian: valOnRadian,
              transition: 'valOnRadian',
              enterFrom: { valOnRadian: 0 }
            },
            style: {
              text: makeText(valOnRadian),
              // text:80,
              fontSize: 50,
              fontWeight: 700,
              x: params.coordSys.cx,
              y: params.coordSys.cy,
              fill: 'rgb(0,50,190)',
              align: 'center',
              verticalAlign: 'middle',
              enterFrom: { opacity: 0 }
            },
            during: function (apiDuring) {
              apiDuring.setStyle(
                'text',
                makeText(apiDuring.getExtra('valOnRadian'))
              );
            }
          }
        ]
      };
    }
    function convertToPolarPoint(renderItemParams, radius, radian) {
      return [
        Math.cos(radian) * radius + renderItemParams.coordSys.cx,
        -Math.sin(radian) * radius + renderItemParams.coordSys.cy
      ];
    }
    function makePionterPoints(renderItemParams, polarEndRadian) {
      return [
        convertToPolarPoint(renderItemParams, _outerRadius, polarEndRadian),
        convertToPolarPoint(
          renderItemParams,
          _outerRadius,
          polarEndRadian + Math.PI * 0.03
        ),
        convertToPolarPoint(renderItemParams, _pointerInnerRadius, polarEndRadian)
      ];
    }
    function makeText(valOnRadian) {
      // Validate additive animation calc.
      if (valOnRadian < -10) {
        alert('illegal during val: ' + valOnRadian);
      }
      // return ((valOnRadian / _valOnRadianMax) * 100).toFixed(0) + '%';
      return value;
    }
    option = {
      animationEasing: _animationEasingUpdate,
      animationDuration: _animationDuration,
      animationDurationUpdate: _animationDurationUpdate,
      animationEasingUpdate: _animationEasingUpdate,
      dataset: {
        source: [[177, JSON.parse(data)[0]]]
        
      },
      data: [
        {
          value: 50,
          
        },
        
      ],
      tooltip: {},
      angleAxis: {
        type: 'value',
        startAngle: 0,
        show: false,
        min: 0,
        max: _valOnRadianMax
      },
      radiusAxis: {
        type: 'value',
        show: false
      },
      polar: {},
      series: [
        {
          type: 'custom',
          coordinateSystem: 'polar',
          renderItem: renderItem
        }
      ]
    };
    
    myCharts.setOption(option);
      window.addEventListener('resize',function(){
          myCharts.resize();
      })

            }
        })

        

} ,1000)
 
    
  setInterval(function(){

    var myCharts=echarts.init(document.querySelector('#chart3'));
 
     $.ajax({
        url:'./fourthapi.php',
        type:'get',
        // dataType: 'json',
        success:function(data){
          switch (JSON.parse(data)[6]){
                        case 1:
                          var value=JSON.parse(data)[2];
                        var formatter1=function (value) {
          return value ;
        };
                            break;
                        case 0:
             
                          var formatter1='---';
                          var value='---';
                            break;
                    }
          if(JSON.parse(data)[2]>170){
           <?php
//  sendMail('1556375442@qq.com','警告','过流状态')
?>}
    // console.log("nihao");}

          option = {
      series: [
        {min:0,
        max:300,
          type: 'gauge',
          radius:'80%',
          axisLine: {
            lineStyle: {
              width: 30,
              color: [
                [0.3, '#67e0e3'],
                [0.7, '#37a2da'],
                [1, '#fd666d']
              ]
            }
          },
          pointer: {
            itemStyle: {
              color: 'auto'
            }
          },
          axisTick: {
            distance: -30,
            length: 8,
            lineStyle: {
              color: '#fff',
              width: 2
            }
          },
          splitLine: {
            distance: -30,
            length: 30,
            lineStyle: {
              color: '#fff',
              width: 4
            }
          },
          axisLabel: {
            color: 'auto',
            distance: 40,
            fontSize: 10
          },
          detail: {
            valueAnimation: true,
            formatter: formatter1,
            color: 'auto',
            fontSize:20
          },
          data: [
            {
              value: value,
              title:{
                fontSize:15,
                color:'white'
              }
            }
          ]
        }
      ]
    };
    
    myCharts.setOption(option);
    window.addEventListener('resize',function(){
        myCharts.resize();
    })
  

        }
        })

} ,1000)



  setInterval(function(){

    var myCharts=echarts.init(document.querySelector('#chart5'));
 
     $.ajax({
        url:'./fourthapi.php',
        type:'get',
        // dataType: 'json',
        success:function(data){
          switch (JSON.parse(data)[6]){
                        case 1:
                          var value=JSON.parse(data)[4];
                        var formatter1=function (value) {
          return value ;
        };
                        // var formatter1= ' {value.toFixed(1)} V';
                          
                   
                            break;
                        case 0:
             
                          var formatter1='---';
                          var value='---';
                            break;
                    }
       
          option = {
      series: [
        {min:0,
        max:300,
          type: 'gauge',
          radius:'80%',
          axisLine: {
            lineStyle: {
              width: 30,
              color: [
                [0.3, '#67e0e3'],
                [0.7, '#37a2da'],
                [1, '#fd666d']
              ]
            }
          },
          pointer: {
            itemStyle: {
              color: 'auto'
            }
          },
          axisTick: {
            distance: -30,
            length: 8,
            lineStyle: {
              color: '#fff',
              width: 2
            }
          },
          splitLine: {
            distance: -30,
            length: 30,
            lineStyle: {
              color: '#fff',
              width: 4
            }
          },
          axisLabel: {
            color: 'auto',
            distance: 40,
            fontSize: 10
          },
          detail: {
            valueAnimation: true,
            formatter: formatter1,
            color: 'auto',
            fontSize:20
          },
          data: [
            {
              value: value,
              // name:'hhh',
              title:{
                fontSize:15,
                color:'white'
              }
            }
          ]
        }
      ]
    };

    myCharts.setOption(option);
    window.addEventListener('resize',function(){
        myCharts.resize();
    })
  

        }
        })

} ,1000)
  setInterval(function(){

    var myCharts=echarts.init(document.querySelector('#chart4'));
 
     $.ajax({
        url:'./fourthapi.php',
        type:'get',
        // dataType: 'json',
        success:function(data){
          switch (JSON.parse(data)[6]){
                        case 1:
                          var value=JSON.parse(data)[3];
                        var formatter1=function (value) {
          return value;
        };
                        
                   
                            break;
                        case 0:
             
                          var formatter1='---';
                          var value='---';
                            break;
                    }
          option = {
      series: [
        {
          center:['50%','60%'],
          type: 'gauge',
          startAngle: 180,
          endAngle: 0,
          min: 0,
          max: 200,
          splitNumber: 8,
          axisLine: {
            lineStyle: {
              width: 6,
              color: [
                [0.25, ' #7CFFB2'],
                [0.5, '#58D9F9'],
                [0.75, ' #FDDD60'],
                [1, 'red']
              ]
            }
          },
          pointer: {
            icon: 'path://M12.8,0.7l12,40.1H0.7L12.8,0.7z',
            length: '12%',
            width: 20,
            offsetCenter: [0, '-60%'],
            itemStyle: {
              color: 'auto'
            }
          },
          axisTick: {
            length: 12,
            lineStyle: {
              color: 'auto',
              width: 2
            }
          },
          splitLine: {
            length: 20,
            lineStyle: {
              color: 'auto',
              width: 5
            }
          },
          axisLabel: {
            color: '#464646',
            fontSize: 20,
            distance: -60,
            formatter: function (value) {
              if (value === 0.875) {
                return 'A';
              } else if (value === 0.625) {
                return 'B';
              } else if (value === 0.375) {
                return 'C';
              } else if (value === 0.125) {
                return 'D';
              }
              return '';
            }
          },
          title: {
            offsetCenter: [0, '-20%'],
            fontSize: 15
          },
          detail: {
            fontSize: 40,
            offsetCenter: [0, '30%'],
            valueAnimation: true,
            formatter: formatter1,
            color: 'auto'
          },
          data: [
            {
              value:value,
              
            }
          ]
        }
      ]
    };

    myCharts.setOption(option);
    window.addEventListener('resize',function(){
        myCharts.resize();
    })
        }
        })
      } ,1000)
  setInterval(function(){

  var myCharts=echarts.init(document.querySelector('#chart6'));
 
 $.ajax({
    url:'./fourthapi.php',
    type:'get',
    // dataType: 'json',
    success:function(data){
      switch (JSON.parse(data)[6]){
                        case 1:
                          var value=JSON.parse(data)[5];
                        var formatter1=function (value) {
          return value ;
        };
                        // var formatter1= ' {value.toFixed(1)} V';
                          
                   
                            break;
                        case 0:
             
                          var formatter1='---';
                          var value='---';
                            break;
                    }
      
      option = {
      series: [
        {
          center:['50%','60%'],
          type: 'gauge',
          startAngle: 180,
          endAngle: 0,
          min: 0,
          max: 200,
          splitNumber: 8,
          axisLine: {
            lineStyle: {
              width: 6,
              color: [
                [0.25, ' #7CFFB2'],
                [0.5, '#58D9F9'],
                [0.75, ' #FDDD60'],
                [1, 'red']
              ]
            }
          },
          pointer: {
            icon: 'path://M12.8,0.7l12,40.1H0.7L12.8,0.7z',
            length: '12%',
            width: 20,
            offsetCenter: [0, '-60%'],
            itemStyle: {
              color: 'auto'
            }
          },
          axisTick: {
            length: 12,
            lineStyle: {
              color: 'auto',
              width: 2
            }
          },
          splitLine: {
            length: 20,
            lineStyle: {
              color: 'auto',
              width: 5
            }
          },
          axisLabel: {
            color: '#464646',
            fontSize: 20,
            distance: -60,
            formatter: function (value) {
              if (value === 0.875) {
                return 'A';
              } else if (value === 0.625) {
                return 'B';
              } else if (value === 0.375) {
                return 'C';
              } else if (value === 0.125) {
                return 'D';
              }
              return '';
            }
          },
          title: {
            offsetCenter: [0, '-20%'],
            fontSize: 15
          },
          detail: {
            fontSize: 40,
            offsetCenter: [0, '30%'],
            valueAnimation: true,
            formatter: formatter1,
            color: 'auto'
          },
          data: [
            {
              value:value,
              
            }
          ]
        }
      ]
    };
    myCharts.setOption(option);
    window.addEventListener('resize',function(){
        myCharts.resize();
    })
    }
    })

} ,1000)
 
    </script>
 <!-- <script src='./fourth.js'></script> -->
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
