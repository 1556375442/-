<?php
// $dbhost='127.0.0.1'; //数据库主机名
// $dbName='battery';    //使用的数据库
// $dbuser='root';      //数据库连接用户名
// $dbpass='12345678';          //对应的密码
//     $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbName);
$dbhost = 'sql.s1196.vhostgo.com';  // mysql服务器主机地址
$dbuser = 'geyun199908';            // mysql用户名
$dbpass = '12345678'; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_set_charset($conn,'utf8');
mysqli_select_db($conn,'geyun199908');

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$filename = "xml.xml"; // 外部XML文件路径

if (file_exists($filename)) {
    $xml = simplexml_load_file($filename);
}

$xmlString = '<?xml version="1.0" encoding="UTF-8"?>
<data>
    <data1>
        <paraname>soc</paraname>
        <value>80</value>
    </data1>
    <data1>
        <paraname>current</paraname>
        <value>180</value>
    </data1>
    <data1>
        <paraname>vol</paraname>
        <value>220</value>
    </data1>
</data>';

// 解析XML数据
// $xml = simplexml_load_string($xmlString);

// 插入数据到数据库
foreach ($xml->data1 as $data) {
    $name = $conn->real_escape_string($data->paraname);
    $value =  $data->value;
    $sql = "insert into history (paraname,value,device) values ( '$name','$value','{$_GET['device']}')";
    
    if ($conn->query($sql) === TRUE) {
        echo "记录插入成功<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// 关闭数据库连接
$conn->close();
?>