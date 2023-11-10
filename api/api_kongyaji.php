<?php
// use Exception;

class Rest{
    private $allowMethod=array('GET','POST','PUT','DELETE');
    private $allowResource=array('data1');
    private $resourceName;
    private $requestMethod;//请求方法
    function kongyaji($name,$value){
        while(true){
             include '1db.php'; 
            // $sql="insert into member2(name,password) values(:username,md5(:password))";
            $stmt = $conn->prepare("INSERT INTO kongyaji (name,value,time) VALUES ( ?,?,?)");
            $stmt->bind_param("sss", $name,$value,strtotime('now'));
            // var_dump($name);
            if(!$stmt->execute()){
                throw new Exception('插入数据失败');
            }else{
                // var_dump('jjj');
                // return [
                //     'name'=>$name,
                //     'value'=>$value
                // ];
                // throw new Exception('成功插入数据');
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
        // if($this->requestResource=='bat'){
            // $this->sendinfo();

        // }
        }catch(Exception $e){
            $this->json($e->getMessage(),$e->getCode());
        }
    }
    private function setMethod(){
        
        $this->requestMethod=$_SERVER['REQUEST_METHOD'];
        if(!in_array($this->requestMethod,$this->allowMethod)){
            // throw new Exception(message:"请求方法不被允许",code:405);
            throw new Exception("请求方法不被允许",'405');
        }
    }
    private function setResource(){
        // var_dump($_SERVER);
        $keysname = array();
        $path=$_SERVER['REQUEST_URI'];
        // echo $path;
        $param=explode('/',$path);
        $paraname=explode('?',($param[3]));
        if($paraname[0]=='data'){
            // var_dump($_GET['data1']);
            return $this->_json($this->para());
        }
      
       
      
       
        }
          
 private function _json($array){
        header('Content-Type:application/json;charset:utf-8');
        return json_encode($array);
      
    }
    private function para(){
       
        if (($this->requestMethod == 'GET' )) {
            var_dump($_GET['data1']);
            $array=[];
            if($_GET['data1']){
                $chunks=str_split($_GET['data1'], 4);
                var_dump($chunks);
                foreach($chunks as $key=>$value){
                    $array[$key]=hexdec($value)/100.0;
                }
                $this->kongyaji("inlet_pressure",$array[0]);
                $this->kongyaji("outlet_pressure",$array[1]);
                $this->kongyaji("inlet_temp",$array[2]);
                $this->kongyaji("outlet_temp",$array[3]);
                $this->kongyaji("inlet_flow",$array[4]);
                $this->kongyaji("N2_pressure",$array[5]);
                $this->successLog("数据插入成功");

                var_dump($array);
              
               
            }
         
            
            }
                  
        }
    
    private function getbody(){
        $data=file_get_contents('php://input');
        // var_dump($data);
        if ($this->requestMethod == 'POST' ){
            if (strlen($data)==0) {
                var_dump("");
                $log=$data.'输入参数不得为空';
                $this->successLog($log);
            }
        }
        //  return json_decode($data,true);
        $str=json_decode($data,true);
        // var_dump($str);
        $value = $str['value'];
        // var_dump($value);
       

    }
    private function successLog($log)

    {
        $content = date('y-m-d H:i:s', time()) . "-----" . $log."\r\n";
        var_dump($content);

        // file_put_contents($file, $content, FILE_APPEND);
        $open=fopen("kongyaji_api.txt","a+" );
        // var_dump($open);

        fwrite($open,$content);

fclose($open);

    }
}

$api=new Rest();
$api->run();
?>