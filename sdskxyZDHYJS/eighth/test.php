<?php
class Rest{
    private $allowMethod=array('GET','POST','PUT','DELETE');

    private $resourceName;
    private $requestMethod;//请求方法
    function env($name,$value,$unit,$alarm){
      
             include '1db.php'; 
             var_dump($name,$value,$unit,$alarm);
            // $sql="insert into member2(name,password) values(:username,md5(:password))";
            $stmt = $conn->prepare("INSERT INTO env(name,value,unit,alarm) VALUES ( ?,?,?,?)");
            $stmt->bind_param("ssss", $name,$value,$unit,$alarm);
            // var_dump($name);
            if(!$stmt->execute()){
                echo "{result:'NG'}";
                $this->successLog("数据插入失败");
                // throw new Exception('NG');
            }else{
                $MSG = json_encode(array("result" => "ok",JSON_UNESCAPED_UNICODE));	
               
                // echo "result:'OK'"."DeviceID:".$DeviceID;
                $this->successLog("数据插入成功");
            return;
            };
          
        }
       
            
        
       


    private function json($message,$code){
        header('Content-Type:application/json;charset:utf-8');
        // echo json_encode(['message'=>$message,'code'=>$code]);
      
    }
    //api启动
    public function run(){
        try{
            $this->getbody();
           
        }catch(Exception $e){
            $this->json($e->getMessage(),$e->getCode());
        }
    }
   
    
    private function getbody(){
       
        $string = file_get_contents("test.json");
        $data = json_decode($string, true);
      
        foreach($data['sensors'] as $key=>$value){ 
        //    var_dump($value['name'],$value['value'],$value['unit'],$value['alarm']);
            $this->env($value['name'],$value['value'],$value['unit'],$value['alarm']);
            // var_dump($value['name'],$value['value']);
        //     if($data['Status']!=0){
        //         echo "result:TZ";

        //     }
        //     // $this->battery($data['DeviceID'],$data['Status'],$data['Lifesignal'],$value['Name'],$value['Value'],$value['Unit']);
        }
    }
    private function successLog($log)

    {
        $content = date('y-m-d H:i:s', time()) . "-----" . $log."\r\n";
        $open=fopen("api.txt","a+" );
        fwrite($open,$content);

fclose($open);

    }
}

$api=new Rest();
$api->run();
?>