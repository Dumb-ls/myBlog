<?php

namespace app\api\controller;

use app\common\controller\Api;
use Elasticsearch\ClientBuilder;

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
}
