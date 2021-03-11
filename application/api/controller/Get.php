<?php


namespace app\api\controller;


use app\common\controller\Api;
use Predis\Client;
use Predis\Connection\Aggregate\RedisCluster;
use think\cache\driver\Redis;
use think\Db;
use think\Model;
use think\Request;

class Get extends Api
{
    protected $noNeedLogin = ['*'];
    public $model;
    //配置连接的IP、端口、以及相应的数据库
    protected $server  =  array (
                'host'      =>  '127.0.0.1',
                'port'      =>  6379
            );

    public function __construct(Request $request = null)
    {
        $this->model = \model('Ss');
    }

    public function index()
    {
        $data = $this->model::getOne(2);
        var_dump($data);
//        return $data;
    }

    public function update($id, $gender)
    {
        $ss = $this->model::get($id);
        $ss->gender = $gender;
        $res = $ss->save();
        if ($res){
            return $this->model::get($id);
        }
    }

    public function addTable()
    {
        $redis = new Client($this->server);
        $msg = $redis->set('llll','shuai');
        $data = Db::name('sign_rule')->select();
        //写入签到数据
        $today = Date('Ymd',time());
        $yesterday = Date('Ymd', strtotime('-1 day'));
        $userSignKey ='sign';//redis 用户签到日期key
        $ruleKey = 'signRule';//redis 签到规则key
        $continueDayKey = 111 . ':sign';
        $days = date('t');//当月天数
        if ($rule = $redis->get($ruleKey)){
            $rules = json_decode($rule,true);
        }else{
            $rules = $data;
            $redis->setex($ruleKey,86400*5,serialize($rules));
        }
        if ($redis->exists($userSignKey)){
            for ($i=1;$i<=28;$i++){
                $redis->hset($userSignKey,$i,serialize(['isSign'=>1,'isBox'=>1,'box'=>1]));
            }
        }

        $datas = $redis->hgetall($userSignKey);
//        $redis->hset($userSignKey,1,222);
        foreach ($datas as $k => $v){
            $datas[$k] = unserialize($v);
        }
        //初始化本月每天存入redis
        if (!$redis->exists($userSignKey)){
            for ($i=1;$i<=$days;$i++){
                $redis->hset($userSignKey,$i,serialize(['isSign'=>0,'isBox'=>0,'box'=>0]));
            }
        }


        return ($datas[1]['isSign']);
    }
    public function getMsg()
    {
        $redis = new Client($this->server);
        $yesterday = Date('Ymd', strtotime('-1 day'));
        $userSignKey ='sign';//redis 用户签到日期key
//        $signed = $redis->del($userSignKey);
//        $day = date('j',time());//当天几号
        $day = date('t');//当月天数
        $redis->set('111:sign',0);
        $date = 20190722;
        $redis->hexists($userSignKey,31);
//        return $redis->hexists($userSignKey,31);
        $this->success('成功',$date);
    }

    public function getKandian($day = null)
    {
        $redis = new Client($this->server);
        $rules = unserialize($redis->get('signRule'));
//        return json($rules);
//        foreach ($rules as $k => $v) {
//            if ($day > $v['sday'] && $v['eday'] == null) {
//                $kandian = $v['kandian'];
//                $box = rand(0, $v['box']);
//            } elseif ($day >= $v['sday'] && $day <= $v['eday']) {
//                $kandian = $v['kandian'];
//                $box = rand(0, $v['box']);
//            }
//        }
//        return [$kandian,$box];
        $i = 10;
        if (strlen($i) == 1){
            $str = '0' . $i;
        }
//        return $endThismonth=mktime(23,59,59,date('m'),date('t'),date('Y')) - time();
        return 7 - 8%7;
    }
}