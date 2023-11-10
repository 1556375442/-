<?php
include "message.php";
include "1.php";
// include "2.php"
?>
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
            <div class="module " onclick="navigateToModule(4)">空压机</div>
            <div class="module" onclick="navigateToModule(5)">燃料电池电堆</div>
            <div class="module" onclick="navigateToModule(6)">燃料电池发电机</div>
            <div class="module" onclick="navigateToModule(7)">热管理系统</div>
            <div class="module active" onclick="navigateToModule(8)">实验室环境安全</div>
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
    <div class="statuses">
  <div class="status">
    <img src="Alarm.png" alt="报警状态" id='alarm1'>
    <p >报警状态</p>
  </div>
  <div class="status">
    <img src="alarm1.png" alt="手动报警状态" id='alarm2'>
    <p>手动报警状态</p>
  </div>
  <div class="status">
    <img src="xiaoyin.png" alt="消音状态" id='alarm3'>
    <p>消音状态</p>
  </div>
  <div class="status">
    <img src="qiehuan.png" alt="低压自动切换" id='alarm4'>
    <p>低压自动切换</p>
  </div>
  <div class="status">
    <img src="fan.png" alt="风机状态"  id='alarm5'>
    <p>风机状态</p>
  </div>
  <div class="status">
    <img src="PVC two-way ball valve.png" alt="紧急切断阀" id='alarm6'>
    <p>紧急切断阀</p>
  </div>
  <div class="status">
    <img src="famen-01.png" alt="氢气阀门1" id='alarm7'>
    <p>氢气阀门1</p>
  </div>
  <div class="status">
    <img src="famen-01.png" alt="氢气阀门2" id='alarm8'>
    <p>氢气阀门2</p>
  </div>
</div>

    <div class="content">
        <div class="chart-box">
            <div class='chart_title'> 氢气浓度 GE101(ppm)</div>
            <div id="alarmMessage1" class="alarm"></div>
            <div id="chart1" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气浓度 GE102(ppm)</div>
            <div id="alarmMessage2" class="alarm"></div>
            <div id="chart2" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气浓度 GE103(ppm)</div>
            <div id="alarmMessage3" class="alarm"></div>
            <div id="chart3" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气浓度 GE104(ppm)</div>
            <div id="alarmMessage4" class="alarm"></div>
            <div id="chart4" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气浓度 GE105(ppm)</div>
            <div id="alarmMessage5" class="alarm"></div>
            <div id="chart5" class="chart"></div>
        </div>
        <div class="chart-box">
             <div class='chart_title'>氢气浓度 GE106(ppm)</div>
             <div id="alarmMessage6" class="alarm"></div>
            <div id="chart6" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'> 氢气浓度 GE107(ppm)</div>
            <div id="alarmMessage7" class="alarm"></div>
            <div id="chart7" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气浓度 GE108(ppm)</div>
            <div id="alarmMessage8" class="alarm"></div>
            <div id="chart8" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气浓度 GE109(ppm)</div>
            <div id="alarmMessage9" class="alarm"></div>
            <div id="chart9" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气浓度 GE110(ppm)</div>
            <div id="alarmMessage10" class="alarm"></div>
            <div id="chart10" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气浓度 GE111(ppm)</div>
            <div id="alarmMessage11" class="alarm"></div>
            <div id="chart11" class="chart"></div>
        </div>
        <div class="chart-box">
             <div class='chart_title'>氢气浓度 GE112(ppm)</div>
             <div id="alarmMessage12" class="alarm"></div>
            <div id="chart12" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气气瓶压力 PT1(MPa)</div>
            <div id="alarmMessage13" class="alarm"></div>
            <div id="chart13" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气气瓶压力 PT2(MPa)</div>
            <div id="alarmMessage14" class="alarm"></div>
            <div id="chart14" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气气瓶压力 PT3(MPa)</div>
            <div id="alarmMessage15" class="alarm"></div>
            <div id="chart15" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>氢气气瓶压力 PT4(MPa)</div>
            <div id="alarmMessage16" class="alarm"></div>
            <div id="chart16" class="chart"></div>
        </div>
        <div class="chart-box">
            <div class='chart_title'>流量计 FM101(NLPM)</div>
            <div id="alarmMessage17" class="alarm"></div>
            <div id="chart17" class="chart"></div>
        </div>
    </div>
    <script src="../js/echarts.js"></script>
    <script src="../js/jquery.min.js"></script>
    <!-- <script>
        const fan = document.getElementById('fan');

// 根据风机状态设置旋转角度
function setFanRotation(isRotating) {
  const rotation = isRotating ? 'rotate(180deg)' : 'rotate(0deg)';
  fan.style.transform = rotation;
}

// 示例：假设风机正在旋转
setFanRotation(true);
    </script> -->
    <script>
      setInterval(function(){
         
     $.ajax({
        url:'./alarm.txt',
        type:'get',
        // dataType: 'json',
        success:function(data){
          var flag=false;
        //  console.log(JSON.parse(data).state[0].value,JSON.parse(data).state[0].value!=="false",flag,JSON.parse(data).state[0].value!=="false"&&!flag);
          var alertImage = document.getElementById('alarm1'); 
          // console.log(JSON.parse(data));
         
                      if(JSON.parse(data).state[0].value!=="false"&&!flag){
                        console.log( alertImage,flag);
                        // console.log(alertImage);
                        alertImage.src = "_Alarm.png";
                        
 
           <?php
            // message("报警");
            ?>
               flag=1;
            }else if(JSON.parse(data).state[0].value!=="true"){
            
             console.log(flag);
                 if(flag){
                  console.log(JSON.parse(data).state[0].value,JSON.parse(data).state[0].value!=="false",flag,JSON.parse(data).state[0].value!=="false"&&!flag);
           <?php
            // message("报警   取消");
            ?>
               flag=0;
        }
       
              alertImage.src = "Alarm.png";
            
            }
            
            var alertImage = document.getElementById('alarm2');
            if(JSON.parse(data).state[1].value!=='false'){

alertImage.src = "_alarm1.png";
                        <?php
                        // message("手动报警");
                        ?>
            }else{
              alertImage.src = "alarm1.png";
            }
            var alertImage = document.getElementById('alarm3');
            if(JSON.parse(data).state[2].value!=='false'){

alertImage.src = "_xiaoyin.png";
            }else{
              alertImage.src = "xiaoyin.png";
            }
            var alertImage = document.getElementById('alarm4');
            if(JSON.parse(data).state[3].value!=='false'){

alertImage.src = "_qiehuan.png";
                      
            }else{
              alertImage.src = "qiehuan.png";
            }
            var alertImage = document.getElementById('alarm5');
            if(JSON.parse(data).state[4].value!=='0'){
              alertImage.classList.add('fan');
              // alertImage.src = "_阀门系统.png";
            }else{
              alertImage.classList.remove('fan');
              // alertImage.src = "PVC two-way ball valve.png";
            }
            var alertImage = document.getElementById('alarm6');
            if(JSON.parse(data).state[5].value!=='0'){

alertImage.src = "_famenxitong.png";
                      
            }else{
              alertImage.src = "PVC two-way ball valve.png";
            }
            var alertImage = document.getElementById('alarm7');
            if(JSON.parse(data).state[6].value!=='false'){

alertImage.src = "_famen-01.png";
                      
            }else{
              alertImage.src = "famen-01.png";   
            }
            var alertImage = document.getElementById('alarm8');
            if(JSON.parse(data).state[7].value!=='false'){

alertImage.src = "_famen-01.png";  
                      
            }else{
              alertImage.src = "famen-01.png";  
            }
          
            }
        });
} ,1000)
       
    </script>
    <!-- <script>
      const jsonData = {
"sensors": [
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE101",
            "name": "GE101",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE102",
            "name": "GE102",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE103",
            "name": "GE103",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE104",
            "name": "GE104",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE105",
            "name": "GE105",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE106",
            "name": "GE106",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE107",
            "name": "GE107",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE108",
            "name": "GE108",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE109",
            "name": "GE109",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE110",
            "name": "GE110",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气浓度 GE111",
            "name": "GE111",
            "unit": "ppm",
            "value": "0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氧气浓度 GO112",
            "name": "GO112",
            "unit": "ppm",
            "value": "21.49"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气气瓶压力 PT1",
            "name": "PT1",
            "unit": "MPa",
            "value": "0.61"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氢气减压压力 PT2",
            "name": "PT2",
            "unit": "MPa",
            "value": "0.61"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氮气气瓶压力 PT3",
            "name": "PT3",
            "unit": "MPa",
            "value": "0.33"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "氮气减压压力 PT4",
            "name": "PT4",
            "unit": "MPa",
            "value": "-0.00"
        },
        {
            "alarm": "0",
            "fault": "0",
            "label": "流量计 FM101",
            "name": "FM101",
            "unit": "NLPM",
            "value": "0.00"
        }
    ]
} 
// console.log(jsonData.sensors[0].alarm)

// 遍历 JSON 数据中的传感器信息
// jsonData.sensors.forEach(sensor => {
//   console.log("传感器名称:", sensor.label);
//   console.log("传感器值:", sensor.value);
//   console.log("传感器单位:", sensor.unit);
//   console.log("传感器告警:", sensor.alarm);
//   console.log("传感器故障:", sensor.fault);
//   console.log("------------------------");
// });
    </script> -->
    <script >
  
  setInterval(function(){
var myCharts=echarts.init(document.querySelector('#chart2'));
     $.ajax({
        url:'message_log.txt',
        type:'get',
        // dataType: 'json',
        success:function(data){
          // console.log(data);
          // console.log(JSON.parse(data));
          var alarmMessageElement2 = document.getElementById("alarmMessage2");
          var flag=0;
                      // console.log(JSON.parse(data).sensors[3].alarm)
          if(JSON.parse(data).sensors[1].alarm!=='0'&&!flag){
            alarmMessageElement2.style.display = "block";
            <?php
            // message("氢气浓度102报警");
             ?> 
              flag=1;
          }else{
           if (JSON.parse(data).sensors[1].alarm==='0')
        if(flag){
           <?php
            // message("氢气浓度102报警   取消");
            ?>
               flag=0;
        }
             alarmMessageElement2.style.display = "none";
              }
          // console.log(JSON.parse(data).sensors[0].value)
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
      return JSON.parse(data).sensors[1].value;
    }
    option = {
      animationEasing: _animationEasingUpdate,
      animationDuration: _animationDuration,
      animationDurationUpdate: _animationDurationUpdate,
      animationEasingUpdate: _animationEasingUpdate,
      dataset: {
        source: [[177, 300]]
        
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
        url:'./message_log.txt',
        type:'get',
        // dataType: 'json',
        success:function(data){
          var alarmMessageElement1 = document.getElementById("alarmMessage1");
          // console.log(JSON.parse(data).sensors[0].alarm);
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      var flag1=0;
                      if(JSON.parse(data).sensors[0].alarm!=='0'&&!flag1){

                        alarmMessageElement1.style.display = "block";
                        <?php
            // message("氢气浓度101报警");
             ?> 
              flag1=1;
                      }else {
                        if (JSON.parse(data).sensors[0].alarm==='0')
        if(flag1){
            <?php
            // message("氢气浓度101报警   取消");
            ?>
               flag1=0;
        }
                // 隐藏报警区域
                alarmMessageElement1.style.display = "none";
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
      return JSON.parse(data).sensors[0].value;
    }
    option = {
      animationEasing: _animationEasingUpdate,
      animationDuration: _animationDuration,
      animationDurationUpdate: _animationDurationUpdate,
      animationEasingUpdate: _animationEasingUpdate,
      dataset: {
        source: [[177, 300]]
        
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
        url:'./message_log.txt',
        type:'get',
        // dataType: 'json',
        success:function(data){       
                          var value=JSON.parse(data).sensors[2].value;
                          var alarmMessageElement3 = document.getElementById("alarmMessage3");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[2].alarm!='0'){
                        alarmMessageElement3.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement3.style.display = "none";
            }
                        var formatter1=function (value) {return value}
    
           <?php
//  sendMail('1556375442@qq.com','警告','过流状态')
?>
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
        url:'./message_log.txt',
        type:'get',
        // dataType: 'json',
        success:function(data){   
                          var value=JSON.parse(data).sensors[4].value;
                          var alarmMessageElement5= document.getElementById("alarmMessage5");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[4].alarm!='0'){
                        alarmMessageElement5.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement5.style.display = "none";
            }
                        var formatter1=function (value) {
          return value ;
        };

       
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

    var myCharts=echarts.init(document.querySelector('#chart7'));
 
     $.ajax({
        url:'./message_log.txt',
        type:'get',
        // dataType: 'json',
        success:function(data){
                          var value=JSON.parse(data).sensors[6].value;
                          var alarmMessageElement7 = document.getElementById("alarmMessage7");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[6].alarm!='0'){
                        alarmMessageElement7.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement7.style.display = "none";
            }
                        var formatter1=function (value) {
          return value;
        };

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

  var myCharts=echarts.init(document.querySelector('#chart8'));
 
 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
  
                          var value=JSON.parse(data).sensors[7].value;
                          var alarmMessageElement8 = document.getElementById("alarmMessage8");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[7].alarm!='0'){
                        alarmMessageElement8.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement8.style.display = "none";
            }
                        var formatter1=function (value) {
          return value ;
        };
                  
      
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

var myCharts=echarts.init(document.querySelector('#chart9'));

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[8].value;
                      // console.log(JSON.parse(data).sensors[8]);
                      var alarmMessageElement9 = document.getElementById("alarmMessage9");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[8].alarm!='0'){
                        alarmMessageElement9.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement9.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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

var myCharts=echarts.init(document.querySelector('#chart10'));

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[9].value;
                      var alarmMessageElement10 = document.getElementById("alarmMessage10");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[9].alarm!='0'){
                        alarmMessageElement10.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement10.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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

var myCharts=echarts.init(document.querySelector('#chart11'));

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[10].value;
                      var alarmMessageElement11 = document.getElementById("alarmMessage11");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[10].alarm!='0'){
                        alarmMessageElement11.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement11.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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

var myCharts=echarts.init(document.querySelector('#chart12'));

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[11].value;
                      var alarmMessageElement12 = document.getElementById("alarmMessage12");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[11].alarm!='0'){
                        alarmMessageElement12.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement12.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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

var myCharts=echarts.init(document.querySelector('#chart13'));

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[12].value;
                      var alarmMessageElement13 = document.getElementById("alarmMessage13");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[12].alarm!='0'){
                        alarmMessageElement13.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement13.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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

var myCharts=echarts.init(document.querySelector('#chart14'));

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[13].value;
                      var alarmMessageElement14 = document.getElementById("alarmMessage14");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[13].alarm!='0'){
                        alarmMessageElement14.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement14.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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

var myCharts=echarts.init(document.querySelector('#chart15'));

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[14].value;
                      var alarmMessageElement15 = document.getElementById("alarmMessage15");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[14].alarm!='0'){
                        alarmMessageElement15.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement15.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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

var myCharts=echarts.init(document.querySelector('#chart16'));

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
      // console.log(JSON.parse(data).sensors);
      // console.log(JSON.parse(data).sensors[15].alarm);
      // 
                      var value=JSON.parse(data).sensors[15].value;
                      var alarmMessageElement16 = document.getElementById("alarmMessage16");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[15].alarm!='0'){
                        alarmMessageElement16.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement16.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[5].value;
                      var alarmMessageElement6 = document.getElementById("alarmMessage6");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[5].alarm!='0'){
                        alarmMessageElement6.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement6.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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

var myCharts=echarts.init(document.querySelector('#chart17'));

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[16].value;
                      var alarmMessageElement17 = document.getElementById("alarmMessage17");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[16].alarm!='0'){
                        alarmMessageElement17.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement17.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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

var myCharts=echarts.init(document.querySelector('#chart4'));
var alarmMessageElement4 = document.getElementById("alarmMessage4");

 $.ajax({
    url:'./message_log.txt',
    type:'get',
    // dataType: 'json',
    success:function(data){
                      var value=JSON.parse(data).sensors[3].value;
                      var alarmMessageElement4 = document.getElementById("alarmMessage4");
                      // console.log(JSON.parse(data).sensors[3].alarm)
                      if(JSON.parse(data).sensors[3].alarm!='0'){
                        alarmMessageElement4.style.display = "block";
                      }else {
                // 隐藏报警区域
                alarmMessageElement4.style.display = "none";
            }
                    var formatter1=function (value) {
      return value;
    };

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
