<?php
$jsonData = file_get_contents('json.json');

// 解析JSON数据为关联数组
$dataArray = json_decode($jsonData, true);
// var_dump($dataArray);
foreach($dataArray as $data){
    foreach($data as $key=>$value){
        $sql = "insert into history (paraname,value,device) values ( '$key','$value','{$_GET['device']}')";
        $result=mysqli_query($conn, $sql);
        if($result){
        }else{
            echo mysqli_error($conn);
        }
        // var_dump($result);
        
    }
}



?>