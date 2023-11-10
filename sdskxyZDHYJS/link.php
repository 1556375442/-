<?php
//  $dbhost = 'localhost';  // mysql服务器主机地址
//  $dbuser = 'root';            // mysql用户名
//  $dbpass = '12345678'; 
//  $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
//  mysqli_select_db($conn,'battery');
$dbhost = '211.149.230.7';  // mysql服务器主机地址
$dbuser = 'geyun199908';            // mysql用户名
$dbpass = '12345678'; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8');
mysqli_select_db($conn,'geyun199908');

 ?>