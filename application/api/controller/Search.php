<?php


namespace app\api\controller;


use app\common\controller\Api;
use Elasticsearch\ClientBuilder;

class Search extends Api
{
    private $_host = ['127.0.0.1:9200'];
    private $_client = null;
    private $_index_prefix;
    private $error = '';


    public function _initialize()
    {
//        $this->setHost();
        $this->_client = ClientBuilder::create()->setHosts($this->_host)->build();
//        $this->_index_prefix = \app\common\library\Help::getEnvDiffPrefix();
    }

    /**
     * 设置配置
     */
    private function setHost()
    {
        //实例化一个客户端
        $cfg = Config::get('eshosts');
        $this->_host = [
            $cfg[0]['scheme'] . '://' . $cfg[0]['user'] . ':' . $cfg[0]['pass'] . '@' . $cfg[0]['host'] . ':' . $cfg[0]['port']
        ];
    }

    /**
     * 创建索引
     * @param string $index 文档名称
     * @param array $body 文档主体内容(数组)
     * @return mixed
     */
    public function createIndex($index ='test', $body=[])
    {
        $params = [
            'index' => $index, //索引名称
            'body' => [
                'settings' => [ //配置
                    'number_of_shards' => 3, //主分片数
                    'number_of_replicas' => 1 //主分片的副本数
                ],
                'mappings' => [  //映射
                    '_source' => [   //  存储原始文档
                        'enabled' => 'true'
                    ],
                    'properties' => [ //配置数据结构与类型
                        'title' => [ //字段1
                            'type' => 'text', //类型 text、integer、float、double、boolean、date
                            'index' => 'true', //是否索引
                            'analyzer' => 'ik_max_word' //使用中文IK分词器
                        ]
                    ]

                ],
            ]
        ];
        if ($res = $this->_client->indices()->create($params)){
            $this->success($res);
        }
    }

    public function add_doc($index, $id, $body)
    {
        $index = $index;
        try {
            $data = [
                'index' => $index,
                'body' => $body,
                'id' => $id
            ];
            if ($res = $this->_client->index($data)){
                $this->success($res);
            }
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }

        return true;
    }

    /**
     * 更新索引
     * @param string $index 文档名称
     * @param string|int $id 文档ID
     * @param array $body 文档主体内容(数组)
     * @param string $type 文档类型(默认为doc)
     * @return bool
     */
    public function updateIndex($index, $id, $body)
    {

        $chk = $this->checkParams($index, $id, $body);
        if ($chk === false) {
            return false;
        }
        $index = $index;

        try {
            $data = [
                'index' => $index,
                'id' => $id,
                'body' => [
                    'doc' => $body
                ]
            ];

            if ($res = $this->_client->update($data)){
                $this->success($res);
            }
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }

        return true;
    }

    /**
     * 检测索引是否存在,只能单个索引名称检测
     * @param string $index 索引名称
     * @return bool
     */
    public function indexExists($index)
    {

        $response = $this->_client->indices()->exists(['index' => $index]);
        return $response;
    }

    /**
     * 获取索引
     * @param string $index 文档名称
     * @param string|int $id 文档ID
     * @param string $type 文档类型(默认为doc)
     * @return mixed
     */
    public function getIndex($index, $id)
    {
        $index = $index;
        try {
            $params = [
                'index' => $index,
                'id' => $id
            ];
            $response = $this->_client->get($params);
            $this->success($response);

        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }



    /**
     * 获取索引文档数据列表
     * @param array $params 参数数组集合
     * @param string $type 文档类型(默认为doc)
     * @return mixed
     */
    public function getList($index, $keywords, $limit = 10, $page = 1)
    {
        $offset = ((int)$page - 1) * (int)$limit;
        $params = [
            'index' => $index,
            'body' => [
                'query' => [
                    'match' => [
                        'title' => $keywords
                    ]
                ],
                'sort' => [['id' => ['order' => 'desc']]],
                'from' => $offset,
                'size' => $limit
            ]
        ];
        $response = $this->_client->search($params);

        //$response['hits']['hits']是具体的数据列表
        $this->success($response);
    }

    /**
     * 删除文档(删除数据记录)
     * @param string $index 文档名称
     * @param string|int $id 文档ID
     * @param string $type 文档类型(默认为doc)
     * @return bool
     */
    public function delDoc($index, $id)
    {
        $chk = $this->checkParams($index, $id, ['def_key' => 'only_for_delete_doc']); //参数3无实际意义,仅用过能通过验证而已
        if ($chk === false) {
            return false;
        }
        $index = $index;

        try {
            $data = [
                'index' => $index,
                'id' => $id
            ];

            if ($res = $this->_client->delete($data)){
                $this->success($res);
            }
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }

        return true;
    }

    /**
     * 删除索引(相当于删除表)
     * @param string $index 文档名称
     * @return bool
     */
    public function delIndex($index)
    {
        $chk = $this->checkParams($index, '10000', ['def_key' => 'only_for_delete_doc']); //参数2,3无实际意义,仅用过能通过验证而已
        if ($chk === false) {
            return false;
        }
        $index = $index;

        try {
            $data = [
                'index' => $index
            ];

            if ($res = $this->_client->indices()->delete($data)){
                $this->success($res);
            }
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }

        return true;
    }

    /**
     * 获取ES操作实例
     */
    public function getInstance()
    {
        if (!$this->_client) {
            $this->setHost();
            $this->_client = ClientBuilder::create()->setHosts($this->_host)->build();
        }
        return $this->_client;
    }

    /**
     * 获取索引前缀
     */
    public function getIndexPrefix()
    {
        return $this->_index_prefix;
    }

    /**
     * 参数验证
     * @param string $index 索引文档的名称
     * @param string|int $id 索引文档的ID
     * @param array $body 主体内容
     * @return bool
     */
    private function checkParams($index, $id, $body)
    {

        $result = true;
        foreach ($body as $key => $value) {
            if (!isset($key) || empty($key)) {
                $result = false;
                break;
            }
        }
        if ($result === false) {
            $this->error = '索引文档的主体内容输入不正确';
            return false;
        }
        return true;
    }

    /**
     *返回异常信息
     */
    public function getError()
    {
        return $this->error;
    }
}