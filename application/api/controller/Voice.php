<?php


namespace app\api\controller;


use app\common\controller\Api;
use Symfony\Component\Mime\Encoder\Base64Encoder;

class Voice extends Api
{
    protected $noNeedLogin = ['*'];

    public function index()
    {
        echo 'success';
    }


    //filepath 音频文件路径
    //printCutResponse 是否打印返回结果
    public function sendvoice($filepath, $printCutResponse) {
        if (empty ($filepath)) {
            echo "filepath can not be empty";
            return -1;
        }
        $reqArr = array ();
        $reqArr['appid'] = 1301062701;
        $reqArr['projectid'] = 0;
        $reqArr['sub_service_type'] = 1;
        $reqArr['engine_model_type'] = '16k_zh';
        $reqArr['res_type'] = 0;
        $reqArr['result_text_format'] = 0;
        $reqArr['voice_id'] = $this->randstr(16);
        $reqArr['needvad'] = 0;
        $reqArr['timeout'] = 20000;
        $reqArr['source'] = 0;
        $reqArr['secretid'] = 'AKID3sY3KDZPPBiqmVQ7Nlggr3CJe092t8IK';
        $reqArr['timestamp'] = time();
        $reqArr['expired'] = time() + 24 * 60 * 60;
        $reqArr['nonce'] = rand(1, 10000);
        $reqArr['voice_format'] = 14;
        $secretKey = 'Jm590iCTrP7dy4vfDsdkO0hdJkxucB2Q';
        $voicedata = file_get_contents($filepath);
        $datalen = strlen($voicedata);
        $cutlegth = 10;
        $seq = 0;
        while ($datalen > 0) {
            $end = 0;
            if ($datalen < $cutlegth)
                $end = 1;
            $serverUrl = "http://asr.cloud.tencent.com/asr/v1/";
            $reqArr['end'] = $end;
            $reqArr['seq'] = $seq;
            $serverUrl .= $reqArr['appid'] . "?";
            $serverUrl .= "projectid=" . $reqArr['projectid'] . "&";
            if (isset ($reqArr['template_name'])) {
                $serverUrl .= "template_name=" . $reqArr['template_name'] . "&";
            }
            $serverUrl .= "sub_service_type=" . $reqArr['sub_service_type'] . "&";
            $serverUrl .= "engine_model_type=" . $reqArr['engine_model_type'] . "&";
            $serverUrl .= "res_type=" . $reqArr['res_type'] . "&";
            $serverUrl .= "result_text_format=" . $reqArr['result_text_format'] . "&";
            $serverUrl .= "voice_id=" . $reqArr['voice_id'] . "&";
            $serverUrl .= "seq=" . $seq . "&";
            $serverUrl .= "end=" . $end . "&";
            $serverUrl .= "timeout=" . $reqArr['timeout'] . "&";
            $serverUrl .= "source=" . $reqArr['source'] . "&";
            $serverUrl .= "secretid=" . $reqArr['secretid'] . "&";
            $serverUrl .= "timestamp=" . $reqArr['timestamp'] . "&";
            $serverUrl .= "expired=" . $reqArr['expired'] . "&";
            $serverUrl .= "nonce=" . $reqArr['nonce'] . "&";
            $serverUrl .= "needvad=" . $reqArr['needvad'] . "&";
            $serverUrl .= "voice_format=" . $reqArr['voice_format'];
            $autho = $this->createSign($serverUrl, "POST", "asr.cloud.tencent.com", "/asr/v1/", $secretKey);
            if ($datalen < $cutlegth) {
                $data = file_get_contents($filepath, NULL, NULL, $seq * $cutlegth, $cutlegth);
            } else {
                $data = file_get_contents($filepath, NULL, NULL, $seq * $cutlegth, $cutlegth);
            }
            $seq = $seq +1;
            $datalen = $datalen - $cutlegth;

            $header = array (
                'Authorization: ' . $autho,
                'Content-Length: ' . strlen($data),
            );
            $rsp_str = "";
            $http_code = -1;
            $ret = $this->http_curl_exec($serverUrl, $data, $rsp_str, $http_code, 'POST', 10, array(), $header);
            if ($ret != 0) {
                echo "http_curl_exec failed \n";
                return false;
            }

            if($printCutResponse)
                echo "rsp_str : \n" . $rsp_str . "\n";
        }
        return $rsp_str;
    }
    public function randstr($len=6){
        $chars='abcdefghijklmnopqrstuvwxyz0123456789';
        mt_srand((double)microtime()*1000000*getmypid());
        $password='';
        while(strlen($password)<$len)
            $password.=substr($chars,(mt_rand()%strlen($chars)),1);
        return $password;
    }

    public function createSign($arr, $method, $domain, $addr, $key)
    {
        $data = base64_encode(hash_hmac($arr, $key));
    }


}