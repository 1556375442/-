<?php

// 在 PHP 中返回最新的 MQTT 消息
// $latestMessage='{"sensors": [
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE101",
//                 "name": "GE101",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE102",
//                 "name": "GE102",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE103",
//                 "name": "GE103",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE104",
//                 "name": "GE104",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE105",
//                 "name": "GE105",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE106",
//                 "name": "GE106",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE107",
//                 "name": "GE107",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE108",
//                 "name": "GE108",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE109",
//                 "name": "GE109",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE110",
//                 "name": "GE110",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气浓度 GE111",
//                 "name": "GE111",
//                 "unit": "ppm",
//                 "value": "0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氧气浓度 GO112",
//                 "name": "GO112",
//                 "unit": "ppm",
//                 "value": "21.49"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气气瓶压力 PT1",
//                 "name": "PT1",
//                 "unit": "MPa",
//                 "value": "0.61"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氢气减压压力 PT2",
//                 "name": "PT2",
//                 "unit": "MPa",
//                 "value": "0.61"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氮气气瓶压力 PT3",
//                 "name": "PT3",
//                 "unit": "MPa",
//                 "value": "0.33"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "氮气减压压力 PT4",
//                 "name": "PT4",
//                 "unit": "MPa",
//                 "value": "-0.00"
//             },
//             {
//                 "alarm": "0",
//                 "fault": "0",
//                 "label": "流量计 FM101",
//                 "name": "FM101",
//                 "unit": "NLPM",
//                 "value": "0.00"
//             }
//         ]
//     } ';
    
// echo $latestMessage;

require('vendor/autoload.php');
// set_time_limit(0);
use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;
header("Access-Control-Allow-Origin: *");
$server   = 'd4d95119.ala.us-east-1.emqxsl.com';
// TLS port
$port     = 8883;
$clientId ="client ID1";
$username = 'iiot';
$password = 'iiot12345';
$clean_session = false;
$connectionSettings  = (new ConnectionSettings)
  ->setUsername($username)
  ->setPassword($password)
  ->setKeepAliveInterval(120)
  ->setConnectTimeout(3)
  ->setUseTls(true)
  ->setTlsSelfSignedAllowed(true);
$mqtt = new MqttClient($server, $port, $clientId, MqttClient::MQTT_3_1_1);

  $mqtt->connect($connectionSettings, $clean_session);
// 文本文件路径
$filePath = 'message_log.txt';
// 订阅回调函数
$subscribeCallback = function ($topic, $message) use ($filePath,$mqtt) {
  // echo $message;
  // 将消息写入文本文件
  file_put_contents($filePath, $message);
  $mqtt->interrupt(); 
};
// 订阅
$mqtt->subscribe('sqdi/fc/hsms/sensors', $subscribeCallback, 0);
$mqtt->interrupt(); 
// 循环处理消息
$mqtt->loop(true);
// 断开连接
$mqtt->disconnect();



?>
