<?php
include '../link.php';
$arr=array();
ini_set ('memory_limit',  '512M');
// $dbhost='127.0.0.1'; //数据库主机名
// $dbName='battery';    //使用的数据库
// $dbuser='root';      //数据库连接用户名
// $dbpass='12345678';          //对应的密码
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from battery where Name='H2_SetFlow' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['Value']);
$sql = "select * from battery where Name='H2_SetP' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['Value']);
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from battery where Name='H2_TempInt' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['Value']);
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from battery where Name='H2_TempOut' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['Value']);
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from battery where Name='CellV01' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['Value']);
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from battery where Name='CellV02' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['Value']);
$sql = "select * from battery where Name='CellV03' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['Value']);
$sql = "select * from battery where Name='CellV04' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['Value']);
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";

// if(!$result){
//     echo ($row['value']);
// }else{
//     die(mysqli_errno($conn));
// }
// 绑定参数并执行查询
// $stmt->bind_param("s", $searchString);
// $stmt->execute();
// // 获取查询结果
// $result = $stmt->get_result();
// 打印结果
// while ($row= mysqli_fetch_assoc($stmt)) {
//     array_push($arr,$row['value']);
// }
// echo $row['value'];
// $searchString = '空气加湿罐出口温度实际';
// $query = "SELECT * FROM history WHERE paraname REGEXP ?  order by id desc limit 1";
// $stmt = $conn->prepare($query);
// // 绑定参数并执行查询
// $stmt->bind_param("s", $searchString);
// $stmt->execute();
// // 获取查询结果
// $result = $stmt->get_result();
// // 打印结果
// while ($row = $result->fetch_assoc()) {
//     array_push($arr,$row['value']);
// }
// $stmt->close();
// $searchString = '氢气进电池口温度实际';
// $query = "SELECT * FROM history WHERE paraname REGEXP ?  order by id desc limit 1";
// $stmt = $conn->prepare($query);
// // 绑定参数并执行查询
// $stmt->bind_param("s", $searchString);
// $stmt->execute();
// // 获取查询结果
// $result = $stmt->get_result();
// // 打印结果
// while ($row = $result->fetch_assoc()) {
//     array_push($arr,$row['value']);
// }
// $stmt->close();
// $searchString = '空气进电池口温度实际';
// $query = "SELECT * FROM history WHERE paraname REGEXP ?  order by id desc limit 1";
// $stmt = $conn->prepare($query);
// // 绑定参数并执行查询
// $stmt->bind_param("s", $searchString);
// $stmt->execute();
// // 获取查询结果
// $result = $stmt->get_result();
// // 打印结果
// while ($row = $result->fetch_assoc()) {
//     array_push($arr,$row['value']);
// }
// $stmt->close();
// $searchString = '空气流量实际';
// $query = "SELECT * FROM history WHERE paraname REGEXP ?  order by id desc limit 1";
// $stmt = $conn->prepare($query);
// // 绑定参数并执行查询
// $stmt->bind_param("s", $searchString);
// $stmt->execute();
// // 获取查询结果
// $result = $stmt->get_result();
// // 打印结果
// while ($row = $result->fetch_assoc()) {
//     array_push($arr,$row['value']);
// }
// $stmt->close();
// $searchString = '氢气流量实际';
// $query = "SELECT * FROM history WHERE paraname REGEXP ?  order by id desc limit 1";
// $stmt = $conn->prepare($query);
// // 绑定参数并执行查询
// $stmt->bind_param("s", $searchString);
// $stmt->execute();
// // 获取查询结果
// $result = $stmt->get_result();
// // 打印结果
// while ($row = $result->fetch_assoc()) {
//     array_push($arr,$row['value']);
// }
// $stmt->close();
// $conn->close();
echo(json_encode($arr));
?>
