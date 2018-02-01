<?php
namespace app\cost\controller;
set_time_limit(0);
use think\Controller;
use app\index\controller\Admin;
use think\Db;
use think\Request;



class CostPart extends Admin{


    public function index(){
        //缓存外包厂数据
        $Agent_data = Db::name('cost_agent')->select();
        cache('agent_data',$Agent_data);
//        $ERPBOM = new \app\cost\model\ErpBom();
        $ERPBOM = model('ErpBom');
//        $data_obj = $ERPBOM->select();
//        $data = array();
//        foreach($data_obj as $key => $val){
//            $temp = $val->toArray();
//            $data[] = $temp;
//        }
//        var_dump($data);die;
        $map = array();
        if(!empty($_GET['agent'])){
            $part = trim($_GET['agent']);
            $map['partno'] = ['like','%'.$part.'%'];
            $page_info['agent'] = $part;
        }
        $Data_obj = $ERPBOM->where($map)->paginate(15,false,['query' => Request::instance()->param()]);
        $data = $Data_obj->toArray();
        $page = $Data_obj->render();
        $page_info['data'] = $data['data'];
        $page_info['page'] = $page;
        return  $this->fetch('',[
            'page_info' => $page_info,
        ]);
    }

    //获得最新的BOM数据
    public function get_bom(){
        //清空表中的数据源
         $sql = 'truncate sw_erp_bom';
         Db::query($sql);
        //首先对cost_bom表进行pkg、ft进行处理
         $bom_data = Db::name('cost_bom')->where('part_level','=','3')->whereOr('part_level','=','4')->select();
         get_pkg_partno($bom_data);
         get_ft_partno($bom_data);
        //取出最新处理完cost_bom表数据
         $bom_new_data = Db::name('cost_bom')->where('part_level','<>','0')->select();
         foreach($bom_new_data as $val){
            get_cost_data($val);
         }
        echo setServerBackJson(1,"获得成功",1);
    }

    public function agent(){

        $map = array();
        $where = array();
        if(!empty($_GET['key'])){
            $part = trim($_GET['key']);
            $map['c_name'] = ['like','%'.$part.'%'];
            $where['en_name'] = ['like','%'.$part.'%'];
            $page_info['part'] = $part;
        }
        $agent_data = Db::name('cost_agent')->where($map)->whereOr($where)->paginate(15,false);
        $page = $agent_data->render();
        $data = object_change_array($agent_data);
        $page_info['data'] = $data['data'];
        $page_info['page'] = $page;

        $this->assign('page_info',$page_info);
        return $this->fetch();

    }


    //显示修改页面
    public function editAgent(){
        $id = input('id');
        $data = Db::name('cost_agent')->where('id',$id)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }

    //修改外包厂数据
    public function edit(){
        $id = $_POST['id'];
        $en_name = trim($_POST['en_name']);
        $c_name = trim($_POST['c_name']);
        $data['en_name'] = $en_name;

        $data['c_name'] = $c_name;
        if(empty($data['en_name'])){
            echo setServerBackJson(0,"英文名称必填");exit;
        }
        if(empty($data['c_name'])){
            echo setServerBackJson(0,'中文名称必填');exit;
        }
        Db::name('cost_agent')->where('id',$id)->update($data);
        echo setServerBackJson(1,"修改成功",1);
    }
    //显示添加页面
    public function addagent(){
        return $this->fetch();
    }

    public function add(){
        $data['en_name'] = trim($_POST['en_name']);
        $data['c_name'] = trim($_POST['c_name']);
        if(empty($data['en_name'])){
            echo setServerBackJson(0,"英文名称必填");exit;
        }
        if(empty($data['c_name'])){
            echo setServerBackJson(0,'中文名称必填');exit;
        }
        Db::name('cost_agent')->insert($data);
        echo setServerBackJson(1,"添加成功");
    }
}