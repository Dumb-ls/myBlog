<?php


namespace app\api\controller;


use app\common\controller\Api;
use MongoDB\Collection;
use MongoDB\Driver\Manager;
use Predis\Client  as pclient;
use Predis\Connection\Aggregate\RedisCluster;
use MongoDB\Client;
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

    public function getKandian($day = 0)
    {
        $redis = new pclient($this->server);
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
        $i = 1;
//        if (strlen($i) == 1){
//            $str = '0' . $i;
//        }
//        return $endThismonth=mktime(23,59,59,date('m'),date('t'),date('Y')) - time();
//        $redis->set('qq','b');
//        $redis->expire('qq',40);
//        $redis->hset('qq','c','a');
//        $redis->hset('qq','d','a');
        $redis->hset('qq','e','gss');
//        $redis->hset('qq','w','a');
        $date = date('Y-m-d',time());
//        Db::table('ss')->where(['username'=>'ls'])->update(['age'=>18]);
//        $a = Date('Y-m-d',strtotime('2021-03-18 --0 day'));
//        $a = null;
//        $b = 0;
//        is_null($a) && $b = 1;
//
//        $today = date('j');
//        $userSignKey = 'sign:';//redis 用户签到key
////        $ruleKey = 'signRule';//redis 签到规则key
//        $days = date('t');//当月天数
//        $time = intval($days-$today);
//
//        $redis->expire($userSignKey,86400*$time);
//        $redis->setex('a',30,'1332133');
//        $s = $redis->ttl('a')>0 ?: 86400*5 ;
        $mongo = new Client("mongodb://127.0.0.1:27017");
        $collection = $mongo->test->user;
//        $collection = $mongo->test->user;
//        $time = date('Y-m-d',strtotime('yesterday'));
//        $s = strtotime('yesterday');
//        $e = strtotime($time . ' 23:59:59');
//        $a = ['dadas','dadsad'];
//        for ($i=0;$i<10;$i++){
//            $redis->set('sign:'.$i,$i);
//        }
//        $count = $redis->keys('sign:*');
//        $time = strtotime(date('Y-m-01',strtotime('first day of +1 month'))) - time();
//        $redis->expire('qq',$time);
//        return   $time . "+" . "".time() . "=" . ($time + time());

//        $m = $redis->pfadd('A',4);

//        return $redis->pfcount('A');
//        if (time() < strtotime('2021-04-03 7:00:00')){
//            echo 120;
//        }
//        return time() . "----" . strtotime('2021-04-03 7:00:00');
        $yesterday = '2021-04-01';
        $s = $yesterday . ' 00:00:00';
        $e = $yesterday . ' 23:59:59';
        $where = ['createTime'=>array('$gte'=>$s,'$lte'=>$e),'channel_id' => 14609];
        $etime = ['createTime'=>array('$lte'=>$e)];
        $data = $collection->find($where)->toArray();
        $data = json_decode(json_encode($data,true),true);
//        array_unique($data);
//        var_dump($data);die();
//        echo $data[0]->commentContent;
        echo " \n";
//        print_r($collection->countDocuments($where));
        $datas = $collection->distinct('commentContent');
//        $str = "db.student.distinct("name",{"age" : 18}).length";
        $pippe = [
            [
                '$group' => ['commentContent' => 'five']
            ],
            [
                '$project' => ['createTime'=>array('$gte'=>$s,'$lte'=>$e),'count' => '$count']

            ]
        ];
        $group = ['_id'=>'$commentContent','total'=> ['$sum' => 1]];
        $count = $collection->aggregate([['$match'=>$where],['$group' => $group]]);
//        $count = json_decode(json_encode($count),true);
        $total = 0;
//        foreach ($count as $c){
//            $total++;
//            echo $c['_id'] . '  :   ' . $c['total'];
//            echo " \n";
//        }
//        echo $total;
//        print_r($count);
        $a = 0;
        for ($i=0;$i<100000;$i++){
            $a++;
        }
        $n = 0.356;
//        echo sprintf("%01.2f", $n*100).'%'; ;
        $flag = 1;
        $time = '20210318' . " -$flag day";
        $date = date('Y-m-d', strtotime($time));
//        echo date_diff(date_create('2021-03-18'),date_create('2021-04-12'))->format('%a');
//        echo date_diff(date_create(date('Ymd His',1610342550)),date_create(date('Ymd His',1618376565)))->format('%a');

//        echo intval((1618376565-1610342550)/86400);
//        for ($date = strtotime("2021-03-18"); $date < strtotime(date('Y-m-d')); $date = strtotime("+1 day", $date)) {
//            echo date("Ymd", $date)."<br />";
//        }
//        echo strtotime(date('Y-m-d'));
//        echo ((date('Y-m-d',1618396567)));
        $arr = range(0,10);
//        print_r($arr);
        $box =35;
        $num = rand(0,100);
//        echo $num . " \n";
//        echo $box += $num;
        echo $day;
    }
}