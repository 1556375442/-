<?php
include './PHPExcel-1.8.2/PHPExcel-1.8.2/Classes/PHPExcel.php';
// $dbhost='127.0.0.1'; //数据库主机名
// $dbName='battery';    //使用的数据库
// $dbuser='root';      //数据库连接用户名
// $dbpass='12345678';          //对应的密码
// $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbName);
$dbhost = 'sql.s1196.vhostgo.com';  // mysql服务器主机地址
$dbuser = 'geyun199908';            // mysql用户名
$dbpass = '12345678'; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8');
mysqli_select_db($conn,'geyun199908');
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$logFilename = "log.log"; // 日志文件路径

// 读取日志文件
$logLines = file($logFilename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 解析并插入数据到数据库
foreach ($logLines as $logLine) {
    // 解析日志数据，假设日志格式为 "timestamp - message"
    list($paraname, $value) = explode("-", $logLine);
    $paraname = $conn->real_escape_string(trim($paraname));
    $value = $conn->real_escape_string(trim($value));

    $sql = "insert into history (paraname,value,device) values ( '$paraname','$value','{$_GET['device']}')";
    
    if ($conn->query($sql) === TRUE) {
        echo "记录插入成功<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// 关闭数据库连接
$conn->close();
    ?>