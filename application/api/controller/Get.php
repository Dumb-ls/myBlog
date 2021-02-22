<?php


namespace app\api\controller;


use app\common\controller\Api;
use think\Model;
use think\Request;

class Get extends Api
{
    protected $noNeedLogin = ['*'];
    public $model;

    public function __construct(Request $request = null)
    {
        $this->model = \model('Ss');
    }

    public function index()
    {
        $data = $this->model::get(2);
        return $data;
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
}