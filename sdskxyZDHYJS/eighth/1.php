<?php
require('vendor/autoload.php');
use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;
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
$filePath = 'message_log.txt';
// 订阅回调函数
$subscribeCallback = function ($topic, $message) use ($filePath,$mqtt) {
  // 将消息写入文本文件
  file_put_contents($filePath, $message);
  $mqtt->interrupt(); 
};
// 订阅
$mqtt->subscribe('sqdi/fc/hsms/sensors', $subscribeCallback, 0);

// 循环处理消息
$mqtt->loop(true);
// 断开连接
$mqtt->disconnect();