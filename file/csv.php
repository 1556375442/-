
<?php
$dbhost='127.0.0.1'; //���ݿ�������
$dbName='battery';    //ʹ�õ����ݿ�
$dbuser='root';      //���ݿ������û���
$dbpass='12345678';          //��Ӧ������
// // $dsn=":host=$host;dbname=$dbName";
// $dbhost = 'sql.s1196.vhostgo.com';  // mysql������������ַ
// $dbuser = 'geyun199908';            // mysql�û���
// $dbpass = '12345678'; 
// $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
// mysqli_set_charset($conn,'utf8');
// mysqli_select_db($conn,'geyun199908');

// try {
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbName);
$csvfile = 'data.csv';
if (!file_exists($csvfile)) {
    die("CSV�ļ�������");
}

$csv = fopen($csvfile, 'r');
$header = fgetcsv($csv); // ��ȡCSV�ļ��ĵ�һ����Ϊ��ͷ
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
// ������������ݴ������ݿ�
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