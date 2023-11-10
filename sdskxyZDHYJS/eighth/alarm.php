<?php
// $latestMessage='{
//     "state": [
//         {
//             "label": "报警状态",
//             "name": "AlarmState",
//             "value": "true"
//         },
//         {
//             "label": "手动报警状态",
//             "name": "ManualAlarmState",
//             "value": "false"
//         },
//         {
//             "label": "消音状态",
//             "name": "BuzzerOffState",
//             "value": "false"
//         },
//         {
//             "label": "低压自动切换",
//             "name": "AutoChangeFault",
//             "value": "false"
//         },
//         {
//             "label": "风机状态",
//             "name": "fanState",
//             "value": "1"
//         },
//         {
//             "label": "紧急切断阀",
//             "name": "POV101",
//             "value": "0"
//         },
//         {
//             "label": "氢气阀门1",
//             "name": "POV102",
//             "value": "false"
//         },
//         {
//             "label": "氢气阀门2",
//             "name": "POV103",
//             "value": "false"
//         }
//     ]
// }';
// echo $latestMessage;
require('vendor/autoload.php');
use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;
header("Access-Control-Allow-Origin: *");
$server   = 'd4d95119.ala.us-east-1.emqxsl.com';
// TLS port
$port     = 8883;
$clientId ="client ID";
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
$filePath = 'alarm.txt';
// 订阅回调函数
$subscribeCallback = function ($topic, $message) use ($filePath) {
  // 将消息写入文本文件
  file_put_contents($filePath, $message);
};
// 订阅
$mqtt->subscribe('sqdi/fc/hsms/alarms', $subscribeCallback, 0);
// 循环处理消息
$mqtt->loop(true);
// 断开连接
$mqtt->disconnect();
?>