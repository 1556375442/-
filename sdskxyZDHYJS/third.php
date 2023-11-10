<?php include 'alarm.php';
include 'success.php';
include 'link.php';

// include_once 'PHPMailer/email.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数据可视化demo</title>
    <link href="./third.css" rel="stylesheet">
    <link rel="stylesheet" href="./common.css">
    <script src="./jquery.min.js"></script>
    <script src="../scripts/common.js"></script>
</head>
<body>
<!--顶部-->
<header class="header left">
  <div class="left nav">
      <ul class='lis'>
      <li ><img src="zhuye.png" class='nav_1'><a href="first.php">氢气系统</a> </li>
            <li ><img src="nav_2.png" class='nav_1'><a href="second.php"  >DC/DC</a> </li>
            <li class="nav_active"><img src="nav_3.png" class='nav_1'><a href="third.php" id='o'>单片燃料电池</a> </li>
            <li><img src="history.png" class='nav_1'><a href="fourth.php">空压机</a> </li>
            <li ><img src="shezhi.png" class='nav_1'><a href="fifth.php">燃料电池电堆</a> </li>
          </li>
          </ul>
  </div>
    <div class="header_center left" style="position:relative">
        
        <h2><strong>能量管理系统</strong></h2>

    </div>
    <div class="right nav text_right">
       
           <div class="showTime"></div>
       
         <ul>
            <li><img src="accountant.png" class='nav_1'><a href="sixth.php">燃料电池发动机</a> </li>
            <li ><img src="exit.png" class='nav_1'><a href="login.php"  target="_blank">退出</a> </li>
        </ul>
    </div>

</header>
<!--内容部分-->
<div class="con left">
  <!--数据总概-->
  <div class="con_div">
      <div class="con_div_text left">
          <div class="con_div_text01 left">
              <img src="./dianchi.png" class="left text01_img"/>
              <div class="left text01_div">
                  <p>氢气出口温度(℃)</p>
                  <p class='soc' >正常</p>
              </div>
          </div>
          <div class="con_div_text01 right">
              <img src="./dianya.png" class="left text01_img"/>
              <div class="left text01_div">
                  <p>氢气进口温度(℃)</p>
                  <p class='vol' >正常</p>
              </div>
          </div>
      </div>
      <div class="con_div_text left">
          <div class="con_div_text01 left">
              <img src="./dianliu.png" class="left text01_img"/>
              <div class="left text01_div">
                  <p>空气进口温度(℃)</p>
                  <p class='current' >正常</p>
              </div>
          </div>
          <div class="con_div_text01 right">
              <img src="./resistor.png" class="left text01_img"/>
              <div class="left text01_div">
                  <p>空气出口温度(℃)</p>
                  <p >正常</p>
              </div>
          </div>
      </div>
      <div class="con_div_text left">

          <div class="con_div_text01 left">
              <img src="./wendu_bat.png" class="left text01_img"/>
              <div class="left text01_div">
                  <p>空气流量(L/min)</p>
                  <p >正常</p>
              </div>
          </div>
          <div class="con_div_text01 right">
              <img src="./temp.png" class="left text01_img"/>
              <div class="left text01_div">
                  <p>氢气流量(L/min)</p>
                  <p >正常</p>
              </div>
          </div>
      </div>
  </div>
    <!--统计分析图-->
    <div class="div_any">
        <div class="left div_any01">
            <div class="div_any_child">
                <div class="div_any_title title1"><img src="../images/title_5.png">氢气出口温度(℃)</div>
                <p id="first" class="p_chart "></p>
             
          
            </div>
            <div class="div_any_child">
                <div class="div_any_title title2"><img src="../images/title_6.png">氢气进口温度(℃)</div>
                <div id="second" class="p_chart ">
                </div>

            </div>
        </div>
        <div class="left div_any01">
            <div class="div_any_child">
                <div class="div_any_title title3"><img src="../images/title_7.png">空气进口温度(℃)</div>
                <p id="third" class="p_chart "></p>
   
            </div>
            <div class="div_any_child">
                <div class="div_any_title title4"><img src="../images/title_8.png">空气出口温度(℃)</div>
                <p id="fourth" class="p_chart "></p>
               
            </div>
        </div>
        <div class="left div_any01">
            <div class="div_any_child">
                <div class="div_any_title title5"><img src="../images/title_9.png">空气流量(L/min)</div>
                <div id="fifth" class="p_chart">
                <ul class='temp'>
                    <li class="temp1"></li>
                    <li class="temp2"></li>

                    </ul>
                </div>
             
            </div>
            <div class="div_any_child">
                <div class="div_any_title title6">氢气流量(L/min)</div>
                <p id="sixth" class="p_chart">
               
                </p>
         
            </div>
        </div>
  
        </div>
    </div>


</div>
<script src="./echarts.js"></script>
<script>
        var showtime = function () {
        var nowdate = new Date();
        var year = nowdate.getFullYear();
        month = nowdate.getMonth() + 1;
        date = nowdate.getDate();
        day = nowdate.getDay();
        week = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
        h = nowdate.getHours();
        h=h<10?'0'+h:h;
        m = nowdate.getMinutes();
        m=m<10?'0'+m:m;
        s = nowdate.getSeconds();
        s=s<10?'0'+s:s;
        // console.log(h);
        return year + "年" + month + "月" + date + "日" + week[day] + " " + h +":" + m + ":" + s;
    }   

    var time = document.querySelector(".showTime");
    // var timer=function() {
    //     time.innerHTML = showtime();
    // }
    function timer(){
        time.innerHTML = showtime();
    }
    timer();
    setInterval (timer, 1000);  //反复执行函数
    </script>
    <!-- <script> -->
 
    <script async>
  
          setInterval(function(){
 
    var myCharts=echarts.init(document.querySelector('#second'));
             $.ajax({
                url:'./thirdapi.php',
                type:'get',
                // dataType: 'json',
                success:function(data){
                  if(JSON.parse(data)[0]>500){
                   $('.vol').html('过压');
                  $('.vol').addClass('red');
                  <?php
      //  sendMail('1556375442@qq.com','警告','高压状态')
        ?>
                  }
            // console.log("nihao");}
      //   if(JSON.parse(data)[0]<200){
      //  $('.vol').html('欠压');
      //  $('.vol').addClass('red');
       <?php
      //  sendMail('1556375442@qq.com','警告','低压状态')
        ?>
      // }
       if((JSON.parse(data)[0]<=500)&&(JSON.parse(data)[0]>=200)){
       $('.vol').html('正常');
       $('.vol').removeClass('red')}

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
              return JSON.parse(data)[1];
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
         
          setInterval(function(){
             $.ajax({
                url:'./thirdapi.php',
                type:'get',
                success:function(data){ 
                  // console.log(JSON.parse(data)[6])
                  if(JSON.parse(data)[6]>90){
                   $('.soc').html('过荷');
                   $('.soc').addClass('red');
                   <?php
      //  sendMail('1556375442@qq.com','警告','超荷状态')
        ?>
                  }
            // console.log("nihao");}
        if(JSON.parse(data)[6]<20){
       $('.soc').html('欠荷');
       $('.soc').addClass('red');
       <?php
      //  sendMail('1556375442@qq.com','警告','欠荷状态')
        ?>}
       if((JSON.parse(data)[6]<=90)&&(JSON.parse(data)[6]>=20)){
       $('.soc').html('正常');
       $('.soc').removeClass('red')}
      //  $('.soc').html('正常');
      //   //   // document.querySelector('.soc').innerHTML='ZHENG';
      //   }else{
      //     $('.soc').html('正常');}
                } 
            })
        } ,1000);
          setInterval(function(){
 
            var myCharts=echarts.init(document.querySelector('#first'));
         
             $.ajax({
                url:'./thirdapi.php',
                type:'get',
                // dataType: 'json',
                success:function(data){
                
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
              return JSON.parse(data)[0];
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
 
            var myCharts=echarts.init(document.querySelector('#third'));
         
             $.ajax({
                url:'./thirdapi.php',
                type:'get',
                // dataType: 'json',
                success:function(data){
                  if(JSON.parse(data)[2]>170){
                   $('.current').html('过流');
                   $('.current').addClass('red')
                   <?php
      //  sendMail('1556375442@qq.com','警告','过流状态')
        ?>}
            // console.log("nihao");}
        if(JSON.parse(data)[3]<20){
       $('.current').html('欠流');
       $('.current').addClass('red');
       }
       if((JSON.parse(data)[3]<=170)&&(JSON.parse(data)[3]>=20)){
       $('.current').html('正常');
       $('.current').removeClass('red')}
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
                    formatter: '{value} ',
                    color: 'auto',
                    fontSize:20
                  },
                  data: [
                    {
                      value: JSON.parse(data)[2],
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
 
            var myCharts=echarts.init(document.querySelector('#fifth'));
         
             $.ajax({
                url:'./thirdapi.php',
                type:'get',
                // dataType: 'json',
                success:function(data){
               
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
                    formatter: '{value} ',
                    color: 'auto',
                    fontSize:20
                  },
                  data: [
                    {
                      value: JSON.parse(data)[4],
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
 
            var myCharts=echarts.init(document.querySelector('#fourth'));
         
             $.ajax({
                url:'./thirdapi.php',
                type:'get',
                // dataType: 'json',
                success:function(data){
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
                    formatter: function (value) {
                      return value 
                    },
                    color: 'auto'
                  },
                  data: [
                    {
                      value:JSON.parse(data)[3],
                      
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
 
          var myCharts=echarts.init(document.querySelector('#sixth'));
         
         $.ajax({
            url:'./thirdapi.php',
            type:'get',
            // dataType: 'json',
            success:function(data){
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
                    formatter: function (value) {
                      return value 
                    },
                    color: 'auto'
                  },
                  data: [
                    {
                      value:JSON.parse(data)[5],
                      
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

</body>
</html>
