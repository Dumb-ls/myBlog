<?php

namespace app\api\controller;

use app\common\controller\Api;
use Elasticsearch\ClientBuilder;
use think\Db;

/**
 * 首页接口
 */
class Index extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    protected $_es = null;

    public function __construct()
    {
        $this->_es = new Search();
    }

    public function create()
    {
        $this->_es->createIndex('test');
    }

    public function add()
    {
        $id = 1;
        $data = [
            'id' => $id,
            'title' => '我爱天安门',
        ];
        $this->_es->add_doc('test', $id, $data);
    }

    public function delete()
    {
        $this->_es->delDoc('test','1');
    }
    public function search()
    {
        $data = $this->_es->getList('test', '天安门');
//        dump($data);
    }

    public function del()
    {
        $this->_es->delIndex('test');
    }

    public function getIndex()
    {
        $this->_es->getIndex('test','1');
    }

    public function practice($nums= [2,7,11,15], $target = 9)
    {
        $res = [];
            foreach ($nums as $k => $v){
                $diff = $target - $v;
                $res[] = array_search($diff,$nums);
                $res[] = $k;

                unset($nums[$k]);
            }
        return json($res);
    }

    public function test($a,$b)
    {
        return  self::test($a,$b)."是猴王";
    }
    function yuesefu($n,$m) {
        $r=0;
        for($i=2; $i<=$n; $i++) {
            $r=($r+$m)%$i;
        }
        return $r+1;
    }

    public function killMonkey($monkeys , $m , $current = 0){
        $number = count($monkeys);
        $num = 1;
        if(count($monkeys) == 1){
            echo $monkeys[0]."成为猴王了";
            return;
        }
        else{
            while($num++ < $m){
                $current++ ;
                $current = $current%$number;
            }
            echo $monkeys[$current]."的猴子被踢掉了\n";
            array_splice($monkeys , $current , 1);
            self::killMonkey($monkeys , $m , $current);
        }


    }
    public function test2()
    {
        $monkeys = array(1 , 2 , 3 , 4 , 5 , 6 , 7, 8 , 9 , 10,11); //monkeys的编号
        $m = 3; //数到第几只猴子被踢出
        $this->killMonkey($monkeys , $m);
    }

    public function stack()
    {

    }

}
