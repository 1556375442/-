
<?php
ini_set ('memory_limit',  '512M');
$dbhost='127.0.0.1'; //数据库主机名
$dbName='battery';    //使用的数据库
$dbuser='root';      //数据库连接用户名
$dbpass='12345678';          //对应的密码
// $dsn=":host=$host;dbname=$dbName";
// $dbhost = 'sql.s1196.vhostgo.com';  // mysql服务器主机地址
// $dbuser = 'geyun199908';            // mysql用户名
// $dbpass = '12345678'; 
// $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
// mysqli_set_charset($conn,'utf8');
// mysqli_select_db($conn,'geyun199908');

// try {
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbName);
// $searchString = '空气出口温度';
// $query = "SELECT * FROM history WHERE paraname LIKE '%$searchString%'";
// $result = $conn->query($query);
// var_dump($result);
$keyword = '空气背压';
// SQL 查询，使用 LIKE 子句
$query = "SELECT * FROM history WHERE paraname LIKE ?";

// 创建预处理语句
$searchPattern = '%' . $keyword . '%'; // 添加通配符以进行模糊搜索
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $searchPattern);

// 执行查询
$stmt->execute();

// 获取查询结果
$result = $stmt->get_result();

// 打印结果
while ($row = $result->fetch_assoc()) {
    echo "Parameter Name: " . $row['paraname'] . "<br>";
    echo "Parameter Value: " . $row['value'] . "<br><br>";
}
// $query = "SELECT * FROM history WHERE paraname REGEXP ? order by id desc limit 1";

// // 创建预处理语句
// $stmt = $conn->prepare($query);

// // 绑定参数并执行查询
// $stmt->bind_param("s", $searchString);
// $stmt->execute();

// // 获取查询结果
// $result = $stmt->get_result();
// var_dump($result);
// 打印结果
// while ($row = $result->fetch_assoc()) {
//     var_dump( $row);
// }

// 关闭连接和预处理语句
$conn->close();
?>

