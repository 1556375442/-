<?php
include './link.php';
$arr=array();
$sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// str_replace("\r\n",'', $row['value']);
// array_push($arr,trim($row['value']));

echo(trim($row['value']));
?>
