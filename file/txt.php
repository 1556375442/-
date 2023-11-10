<?php
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

$filename = "txt.txt";
$data = file($filename);

// 解析数据并插入数据库
foreach ($data as $line) {
    list($paraname, $value) = explode(',', $line);
    
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



