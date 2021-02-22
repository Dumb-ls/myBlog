<?php


namespace app\common\model;


use think\Model;

class Ss extends Model
{
    protected $name = 'ss';
    protected $hidden = ['realname'];
//    protected $append = [
//        'room'
//    ];

    /**
     * @param $value
     * @return string
     */
    public function getAgeAttr($value)
    {
        $value .= '岁';
        return $value;
    }

    public function setGenderAttr($value)
    {
        return '性别：' . $value;
    }

    public function getRoomAttr()
    {
        return 408;
    }

}