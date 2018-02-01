<?php
namespace app\cost\model;
use think\Model;

class ErpBom extends Model{
    protected static function getAgentIdStrAttr($value){
        //获得缓存数据
        $agent_data = cache('agent_data');
        $id_arr = explode(',',$value);
        $name = array();
        foreach($id_arr as $val){
            foreach($agent_data as $val1){
                if($val == $val1['id']){
                    $name[]= $val1['c_name'];
                }
            }
        }
        $name_str = implode(',',$name);
        return $name_str;
    }

    protected static function getPartLevelAttr($value){
        $array = array(
            '1' => 'WF',
            '2' => 'CP',
            '3' => 'PKG',
            '4' => 'FT'
        );
        return $array[$value];
    }



}