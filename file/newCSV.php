<?php
// 打开原始CSV文件
$sourceFile = fopen('2.csv', 'r');

// 创建新的CSV文件并打开以写入数据
$newFile = fopen('3.csv', 'w');

// 要提取的行范围（第三行到第六行）
$startRow = 0;  // 行号从0开始计数
$endRow = 5;

// 初始化计数器
$currentRow = 0;

// 逐行读取原始CSV文件并提取特定行的数据，然后写入新的CSV文件
while (($row = fgetcsv($sourceFile)) !== false) {
    if ($currentRow >= $startRow && $currentRow <= $endRow) {
        // 将提取的行数据写入新的CSV文件
        fputcsv($newFile, $row);
    }
    
    $currentRow++;
    
    if ($currentRow > $endRow) {
        break;
    }
}

// 关闭文件
fclose($sourceFile);
fclose($newFile);