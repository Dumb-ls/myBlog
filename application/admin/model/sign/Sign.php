<?php

namespace app\admin\model\sign;

use think\Model;


class Sign extends Model
{

    

    

    // 表名
    protected $table = 'sign_data';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];
    

    







}
