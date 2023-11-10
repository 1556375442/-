<?php
include './PHPExcel-1.8.2/PHPExcel-1.8.2/Classes/PHPExcel.php';
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
$objexcel=new PHPExcel();
// $objexcel=PHPExcel_IOFactory::load("excel.xlsx");
$objexcel=PHPExcel_IOFactory::load("xls.xls");
$sheet = $objexcel->getActiveSheet();
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
$columnNames = [];

// 获取参数名
for ($col = 'A'; $col <= $highestColumn; $col++) {
    $columnNames[] = $sheet->getCell($col . '1')->getValue();
}

// 解析并插入数据
for ($row = 2; $row <= $highestRow; $row++) {
    $rowData = [];
    for ($col = 'A'; $col <= $highestColumn; $col++) {
        $rowData[] = $sheet->getCell($col . $row)->getValue();
    }

    $insertValues = [];
    foreach ($rowData as $index => $value) {
        $columnName = $columnNames[$index];
        $insertValues[] = "'" . $conn->real_escape_string($value) . "'";
    }

    $sql = "INSERT INTO history (" . implode(', ', $columnNames) . ",device) VALUES (" . implode(', ', $insertValues) . ",'{$_GET["device"]}')";

    if ($conn->query($sql) === TRUE) {
        echo "记录插入成功<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// 关闭数据库连接
$conn->close();
?>