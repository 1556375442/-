<?php
function message($message){
    $params = array(
        'MchId' => '1032780',
        'AppId' => '10011692251669472',
        'Version' => '1.1.0',
        'SignType' => 'MD5',
        'Timestamp' => time() * 1000, // 转换为毫秒级时间戳
        'Type' => '1',
        'SignName' => '【'.$message.'】',
        // 'SignName' =>"【jjj】",
        'SessionContext' => '报警',
        'PhoneNumberSet' => array('19862172616'),
    );
    
    // 计算数字签名
    $key = 'ac206c3612194dbdbfeb339e485a0626'; // 这里替换为实际的 appkey
    ksort($params); // 按照参数名排序
    $noSignKey = array("Signature", "ContextParamSet", "TemplateParamSet", "SessionContextSet", "PhoneNumberSet", "SessionContext", "PhoneList", "phoneSet");
    $signStr = '';
    foreach ($params as $k => $value) {
        if(!in_array($k, $noSignKey)) {
            $signStr .= "{$k}={$value}&";
        }
    }
    $signStr .= "key={$key}";
    // print_r($signStr);
    $signature = strtoupper(md5($signStr));
    $params['Signature'] = $signature;
    
    // 发送请求
    $url = 'http://api.shlianlu.com/sms/trade/normal/send';
    $headers = array('Content-Type: application/json');
    $data = json_encode($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    // var_dump('jjj');
    // 处理响应
    $result = json_decode($response, true);
    // echo($result['status']);
    if ($result['status'] == '00') {
        // echo "短信发送成功,任务ID:{$result['taskId']}\n";
    } else {
        // echo "短信发送失败，错误信息：{$result['message']}\n";
    }
}


?>