<?php
include '../link.php';
$arr=array();
ini_set ('memory_limit',  '512M');
$searchString = '氢气加湿罐出口温度实际';
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from kongyaji where name='inlet_pressure' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['value']);
$sql = "select * from kongyaji where name='outlet_pressure' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['value']);
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from kongyaji where name='inlet_temp' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['value']);
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from kongyaji where name='outlet_temp' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['value']);
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from kongyaji where name='inlet_flow' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['value']);
// $query = "SELECT * FROM history WHERE paraname REGEXP  ? order by id desc limit 1";
$sql = "select * from kongyaji where name='N2_pressure' order by id desc limit 1 ";
// $sql = "select * from history where paraname='{$_GET['data']}' order by id desc limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
array_push($arr,$row['value']);
$time2 = strtotime('now');
// var_dump($time2);
// var_dump( $row['time']);

// echo explode(".", $row['time']);
if($time2-$row['time']>=15){
    array_push($arr,0);
    
    }else{
    array_push($arr,1);
    }
echo(json_encode($arr));
?>
