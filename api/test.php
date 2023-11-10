<?php
class Rest{
    private $allowMethod=array('GET','POST','PUT','DELETE');
    private $allowResource=array('data1','data2','company','site','gateway','device');
    private $resourceName;
    private $requestMethod;//请求方法
    function battery($DeviceID,$Status,$Lifesignal,$Name,$Value,$Unit){
        while(true){
             include '1db.php'; 
            // $sql="insert into member2(name,password) values(:username,md5(:password))";
            $stmt = $conn->prepare("INSERT INTO battery(DeviceID,Status,Lifesignal,Name,Value,Unit) VALUES ( ?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $DeviceID,$Status,$Lifesignal,$Name,$Value,$Unit);
            // var_dump($name);
            if(!$stmt->execute()){
                echo "{result:'NG'}";
                $this->successLog("数据插入失败");
                // throw new Exception('NG');
            }else{
                $MSG = json_encode(array("result" => "ok", "DeviceID" => $DeviceID,"Status"=>$Status,"Lifesignal"=>$Lifesignal,"Name"=>$Name,"Value"=>$Value,"Unit"=>$Unit),JSON_UNESCAPED_UNICODE);	
                echo $MSG.'\n';
                // echo "result:'OK'"."DeviceID:".$DeviceID;
                $this->successLog("数据插入成功");
            return;
            };
          
        }
       
            
        }
       


    private function json($message,$code){
        header('Content-Type:application/json;charset:utf-8');
        // echo json_encode(['message'=>$message,'code'=>$code]);
      
    }
    //api启动
    public function run(){
        try{
            $this->setMethod();
            $this->setResource();
        }catch(Exception $e){
            $this->json($e->getMessage(),$e->getCode());
        }
    }
    private function setMethod(){    
        $this->requestMethod=$_SERVER['REQUEST_METHOD'];
        // var_dump($this->requestMethod);
        if(!in_array($this->requestMethod,$this->allowMethod)){
            // throw new Exception(message:"请求方法不被允许",code:405);
            throw new Exception("请求方法不被允许",'405');
        }
    }
    private function setResource(){
        // var_dump($_SERVER);
        $keysname = array();
        $path=$_SERVER['REQUEST_URI'];
       if($_GET["id"]=='energy'&&$_GET['pwd']=='88888888'){
        return $this->_json($this->para());
       }else{
        var_dump('用户名或者密码错误');
       }
       
        }
          
 private function _json($array){
        header('Content-Type:application/json;charset:utf-8');
        return json_encode($array);
      
    }
    private function para(){
       
            $data=$this->getbody();
            // var_dump($data);
            if (empty($data)) {
                throw new Exception("NG");
            }
                     
        }      
                  
        
    
    private function getbody(){
        header("Content-Type: application/json");
        header("Acess-Control-Allow-Origin: *");
        header("Acess-Control-Allow-Methods: POST");
        header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");     
        $data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format          
        $fileName  =  $_FILES['data']['name'];
        $tempPath  =  $_FILES['data']['tmp_name'];
        $fileSize  =  $_FILES['data']['size'];    
        if(empty($fileName))
        {
            // $errorMSG = json_encode(array("message" => "please select file", "status" => false));	
            // echo $errorMSG;
        }
        else
        {
            $upload_path = './'; // set upload folder path 
            // var_dump(pathinfo($fileName,PATHINFO_EXTENSION));
            $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
            if($fileExt=='json'){
                $fileName='test.json';
            } 
            move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
            // var_dump($fileName);        
        }
        $string = file_get_contents("test.json");
        $data = json_decode($string, true);
        foreach($data['Data']['DeviceData'] as $key=>$value){
            if($data['Status']!=0){
                echo "result:TZ";

            }
            $this->battery($data['DeviceID'],$data['Status'],$data['Lifesignal'],$value['Name'],$value['Value'],$value['Unit']);
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