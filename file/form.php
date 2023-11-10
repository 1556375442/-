<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method='post' enctype='multipart/form-data'>
        <input type="file" name='file' id='file'>
        <input type="submit" value='上传'>
</form> 
<?php
// var_dump($_FILES);
if($_FILES){
    $filename=$_FILES['file']['name'];
$filePath=$_FILES['file']['tmp_name'];
// var_dump($filename,$filePath);
if(!empty($filename)){
    $upload_path='./';
    $fileExt=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
   
    if($fileExt=='txt'){
        $filename='txt.txt';
    }
    if($fileExt=='csv'){
        $filename='data.csv';
    }
    if($fileExt=='log'){
        $filename='log.log';
    }
    if($fileExt=='xml'){
        $filename='xml.xml';
    }
    if($fileExt=='xlsx'){
        $filename='excel.xlsx';
    }
    if($fileExt=='xls'){
        $filename='xls.xls';
    }
    // var_dump($filename);
    $valid_extensions=array('txt','xls','log','csv','xml');
    if(in_array($fileExt,$valid_extensions)){
        move_uploaded_file($filePath,$upload_path.$filename);
        // var_dump($upload_path.$filename);
        echo "<script> alert('文件上传成功')</script>";
    }else{
        $errMsg=json_encode(array("message"=>"sorry,only txt,log,csv,xls,xml files are allowed"));
        echo "<script> alert('$errMsg')</script>";
    }
}
}

?>

</body>
</html>