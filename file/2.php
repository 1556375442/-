
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

// mysqli_select_db($conn,'geyun199908');

// try {
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbName);
// mysqli_set_charset($conn,'utf8');
$csvfile = '3.csv';
if (!file_exists($csvfile)) {
    die("CSV文件不存在");
}

$csv = fopen($csvfile, 'r');
$header = fgetcsv($csv); // 获取CSV文件的第一行作为表头
$header=implode(',',$header);
// $convertHeader=array_map(function($item){
//     return mb_convert_encoding($item,'UTF-8','gb2312');
// },$header);
// var_dump($convertHeader);
$header =str_replace('"', '', $header) ;
$header=explode(',',$header);
// var_dump($header);
$data = array();
$line = fgetcsv($csv) ;
// var_dump($line);
// var_dump(explode("  ",$line[0]));
// var_dump($header[0]);  

while (($line = fgetcsv($csv)) !== false) {
    $arrayValue=array_slice($line,1);
    $arrayName=array_slice($header,1);
    for($i=0;$i<count($arrayValue);$i++){
 $sql = "insert into history (paraname,value,device,time) values ( '$arrayName[$i]','$arrayValue[$i]',100,'$line[0]')";
    // $result=mysqli_query($conn, $sql);
    if ($conn->query($sql) === TRUE) {
        echo "记录插入成功<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
   
    // // var_dump($result);
    // // if(!$result){
    // //     var_dump(mysqli_connect_error());
    // // }

    
    
  
}
// var_dump($line);
// $data1=array_slice($data,2,3);
// // var_dump($data1);
// for($i=0;$i<count($data1);$i++){
//     var_dump(array_keys($data[$i]));
// }
?>