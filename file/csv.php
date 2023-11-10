
<?php
$dbhost='127.0.0.1'; //数据库主机名
$dbName='battery';    //使用的数据库
$dbuser='root';      //数据库连接用户名
$dbpass='12345678';          //对应的密码
// // $dsn=":host=$host;dbname=$dbName";
// $dbhost = 'sql.s1196.vhostgo.com';  // mysql服务器主机地址
// $dbuser = 'geyun199908';            // mysql用户名
// $dbpass = '12345678'; 
// $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
// mysqli_set_charset($conn,'utf8');
// mysqli_select_db($conn,'geyun199908');

// try {
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbName);
$csvfile = 'data.csv';
if (!file_exists($csvfile)) {
    die("CSV文件不存在");
}

$csv = fopen($csvfile, 'r');
$header = fgetcsv($csv); // 获取CSV文件的第一行作为表头
$headerString = implode(', ', $header);

$array = explode(",",$headerString);

$data = array();
while (($line = fgetcsv($csv)) !== false) {
    // var_dump($line);
    $row = array();
    foreach ($array as $i => $colname) {
        $row[$colname] = $line[$i];
    }
    $data[] = $row;
}
fclose($csv);
var_dump($data);
// var_dump($data) ;
// var_dump($data);
// 将解析后的数据存入数据库
$table_name = 'my_table';
foreach ($data as $row) {
    foreach($row as $key=>$value){
    //   var_dump($key,$value);

    $sql = "insert into history (paraname,value,device) values ( '$key','$value','{$_GET['device']}')";
    $result=mysqli_query($conn, $sql);
    if($result){
    }else{
        echo mysqli_error($conn);
    }
    var_dump($result);
    }
    // $json = json_encode($row);
   
    // var_dump($json) ;
}


// mysqli_close($conn);
?>