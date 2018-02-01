<?php
namespace app\sys\controller;
set_time_limit(0);
ini_set("memory_limit","-1");

use think\Controller;
use think\Db;
use think\Model;
use app\index\controller\Admin;
use PDO;
class Access extends Admin{
	
	//角色->权限设定
    public function index(){
//        $sql = 'select * from DATA.AAC_FILE';
//        $oracle = Db::connect('db_oracle')->table('DATA.AAC_FILE')->select();
//        var_dump($oracle);die;
//以下三个mssqldriver,使用任意一个都可以


//        $mssqldriver = '{ODBC Driver 11 for SQL Server}';

//        $hostname='192.9.230.22,1433';
//
//        $dbname='mms';
//
//        $username='sa';
//
//        $password='It_soft';

//        //使用ODBC方式连接
//        $dbDB = new PDO("odbc:Driver=$mssqldriver;Server=$hostname;Database=$dbname", $username, $password);
//
//
//        $sql = "SELECT * FROM dbo.pp_cost";
//
//        $data = $dbDB->query($sql);
//        var_dump($data);die;

//        $dsn="sqlsrv:Server=$hostname;database=$dbname";
//        $conn = new PDO ($dsn,$username,$password);
//        $sql = "SELECT * FROM dbo.pp_cost where id < 100";
////        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//        $conn->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
//
//
//        $res=$conn->query($sql);
////        $res->fetch(PDO::FETCH_ASSOC);
//        $res->setFetchMode(PDO::FETCH_ASSOC);
//
//        $stmt=$conn->prepare($sql);
//        $stmt->execute();
//        while ($row=$stmt->fetchAll()) {
//            print_r($row);
//        }




//        $dsn_con="oci:dbname=//192.9.230.22:1521/ORCL;charset=UTF8";
//        try{
//            $dbh= new PDO($dsn_con,"WTQ","123456",array(PDO::ATTR_PERSISTENT => true));
//        } catch (PDOException $e) {
//            print "oci: " . $e->getMessage() . "<br/>";
//            die();
//        }
//        $sql="select * from DATA.AAC_FILE";
//        $dbh->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
//        $rs=$dbh->prepare($sql);
//        $rs->execute();
//        $rs->setFetchMode(PDO::FETCH_ASSOC);
//        $result_arr = $rs->fetchAll();


          //$sql = "select * from T_SHSINO.PRODUCTSTOCK";
          //$result_arr = model('Oracle')->getOracleData($sql);
          //var_dump($result_arr);die;

//        $sql = "select * from dbo.pp_cost where id <100";
//        $result = model('SqlServer')->getSqlsrvData('mms',$sql);
//        var_dump($result);
//        die;






    	/*
    	header("Content-type: text/html; charset=utf-8");

    	
//     	exit;
    	
//     	set_entry_status(array('2017-08-01','2017-08-05'));
//     	echo 'over';exit;
//     	exit;
    	
//     	echo cal_sick_leave(581,35);
//     	exit;
    	
    	
//     	$hr_sec_range=config('hr_sec_range');
//     	$hr_work_time=config('hr_work_time')*60*60-$hr_sec_range;
    	
//     	$hr_work_time_cal=get_user_work_time(1,11517355,'2017-07-21');
//     	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> ';
//     	echo '正常工作时间,8小时59分,对应秒数--'.$hr_work_time.',实际计算后秒数'.$hr_work_time_cal.'<br>';
//     	//echo get_user_work_time_more();
//     	exit;
    	
    	
    	$month_arr[0]='2017-09-01';
    	$month_arr[1]='2017-09-31';
    	
    	$date='2017-09-01';
    	$site_id=1;
    	$cal_flag='';
    	$user_arr=db('sys_user')->where('status=1 and hr_status in (1) and id in (103)  and user_status=1 and site_id='.$site_id)->select();
    	$month_arr=get_begin_last_date($date);
    	
    	db()->query('truncate table sw_sys_temp_log');
    	
    	if($site_id==1){
    		//规避非有效打卡记录
    		//set_entry_status($month_arr);
    	}
//     	echo 'over-'.rand(1,10000);
//     	exit;
    	
    	foreach ($user_arr as $key=>$val){
    		$month_hr_table_arr=calculate_user_hr_table($site_id,$date,$val['id'],$cal_flag);
    		
    		foreach ($month_hr_table_arr as $k=>$v){
    			//判断本条记录在hr_table中是否存在,如果存在,则更新,如果不存在,则插入
    			$hr_table_id=db('hr_table')->where('user_id='.$v['user_id']." and hr_date='".$v['hr_date']."'")->value('id');
    			if($hr_table_id){
    				$v['id']=$hr_table_id;
    				db('hr_table')->update($v);
    			}else{
    				unset($v['id']);
    				db('hr_table')->insert($v);
    			}
    		}
    	}
    	
    	echo 'over-'.rand(1,10000);
    	exit;
    	*/







         //首先对cost_bom表进行pkg、ft进行处理
//         $bom_data = Db::name('cost_bom')->where('part_level','=','3')->whereOr('part_level','=','4')->select();
//         get_pkg_partno($bom_data);
//         get_ft_partno($bom_data);

         //取出最新处理完cost_bom表数据
//         $bom_new_data = Db::name('cost_bom')->where('part_level','<>','0')->select();
//         foreach($bom_new_data as $val){
//            get_cost_data($val);
//         }

//         var_dump('1231');die;
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL,"https://github.com/search?q=react");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        //echo output
        echo $output;

        // close curl resource to free up system resources
        curl_close($ch);














        /*取出所有的角色*/
        $role = new \app\sys\model\Role();
        $data = $role->getTree();
        $roleResult = object_change_array($data);
        /*角色*/
        foreach($roleResult as $k => $v){
            $role .= '<option value="'.$v['id'].'">'.str_repeat('&nbsp;', 8*$v['level']).$v['role_name'].'</option>';
        }
        /*取出所有的权限*/
        $privilegeData = db('privilege')->field('pri_name as name,id,parent_id')->select();
        $privilegeData = _reSort($privilegeData);
        $privilegeData = make_tree($privilegeData);

        /*输出复选框树形结构*/
//        $tree = set_MakeTree($privilegeData);

        /*无限极复选框打印*/
        $tree = setMakeTree($privilegeData);
        $this->assign('tree',$tree);

        $this->assign('list',$privilegeData);
        $this->assign('roleResult',$roleResult);
        $this->assign('role',$role);
        return $this->fetch();
    }

    public function addPrivilege(){
        $roleId = $_POST['roleid'];
        $pridArr = $_POST['idData'];

        if(empty($pridArr)){
            db('role_privilege')->where('role_id',$roleId)->delete();
            echo setServerBackJson(1,"修改权限成功");exit;
        }

        $pridArr = explode(',',$pridArr);
        //先删除原先所有的权限//
        db('role_privilege')->where('role_id',$roleId)->delete();
        foreach ($pridArr as $k => $v){
            $insert['role_id'] =  $roleId ;
            $insert['pri_id'] = $v;
            $save[] = $insert;
        }
        /*链接数据库，添加数据*/
        db('role_privilege')->insertAll($save);
        echo setServerBackJson(1,"修改权限成功");

    }
    public function getPrivilege(){
        $id = $_POST['id'];
        if(empty($id)){
            echo setServerBackJson(0,"没有获得部门组别id");exit;
        }
        /*取出所有的权限id和权限名称*/
        $pri_id = Db::query("select pri_id from sw_role_privilege where role_id = {$id}");

        $privilegeData = db('privilege')->field('pri_name as name,id,parent_id')->select();
        $privilegeData = _reSort($privilegeData);
        $privilegeData =  make_tree($privilegeData);

        /*三级循环打印*/
//        $result = set_MakeTree($privilegeData,$pri_id,'pri_id');
        /*无限极循环打印*/
//        $result = setMakeTree($privilegeData,$pri_id,'pri_id');
        $result = setMakeTree($privilegeData,'pri_id',$pri_id,'pri_id');
        echo json_encode($result);
    }
    //批量赋予权限
    public function addBatchPri(){
        //取出所有的权限
        $privilegeData = Db::name('privilege')->field('pri_name as name,id,parent_id')->select();
        $privilegeData = _reSort($privilegeData);
        $privilegeData = make_tree($privilegeData);
        $pri_tree = setMakeTree($privilegeData,'pri',array(),'',true,1);

        //取出角色所有的数据
        $roleData = Db::name('role')->field('c_group_name as name,id,parent_id')->select();
        $roleData = _reSort($roleData);
        $roleData = make_tree($roleData);
        $role_tree = setMakeTree($roleData,'role',array(),'',true,1);
        $this->assign('role_tree',$role_tree);
        $this->assign('pri_tree',$pri_tree);
        return $this->fetch();
    }

    public function addbatch(){
         //只能选择一个权限
        $auth_id_str = $_POST['pri'];
        $role_id_str = $_POST['role'];
        if(empty($auth_id_str)){
            echo setServerBackJson(0,"请选择相应的权限信息");exit;
        }
        $role_id_arr = explode(',',$role_id_str);
        //先删除当前权限的所有的角色
        db('role_privilege')->where('pri_id',$auth_id_str)->delete();
        //查出所有的
        foreach($role_id_arr as $val){
            //判断当前角色下有无这个权限
            $result = db('role_privilege')->where('role_id',$val)->where('pri_id',$auth_id_str)->select();
            if(!$result){
                //如果查询数据库没有此权限，则添加
                $insert_arr = array();
                $insert_arr['role_id'] = $val;
                $insert_arr['pri_id'] = $auth_id_str;
                db('role_privilege')->insert($insert_arr);
            }
        }
        echo setServerBackJson(1,"添加成功");

    }

    public function getrole(){
        $pri_id = $_POST['pri'];
       //查找当前权限的角色
 
        $sql = "select role_id from sw_role_privilege where pri_id = ".$pri_id;
        $result = Db::query($sql);
        echo json_encode($result);
    }

//查看权限组别
    public function checkRoleUser(){
        /*取出所有的角色*/
        $role = new \app\sys\model\Role();
        $data = $role->getTree();
        $roleResult = object_change_array($data);
        /*角色*/
        foreach($roleResult as $k => $v){
            $role .= '<option value="'.$v['id'].'">'.str_repeat('&nbsp;', 8*$v['level']).$v['role_name'].'</option>';
        }

        $this->assign('role',$role);
        return $this->fetch();
    }


    //获得权限组下面的成员
    public function get_user(){
        $id = $_POST['id'];
        $user_data = Db::name('user_role')->where('role_id',$id)->select();
        $user_str = '';
        foreach($user_data as $k => $v){
            $nickname = get_cache_data('user_info',$v['user_id'],'nickname');
            $user_str .= '<button class="btn btn-primary btn-xs" name="sys_user_edit" user_id="'.$v['user_id'].'">'.$nickname.'</button>';
        }
        return $user_str;
    }
    
    public function product_excel_out(){
    	set_time_limit(0);
    	ini_set("memory_limit","-1");
    	$and_sql="select
						nx.*,'nx' as type
					from
						prd_info_nx as nx
					union all
					select
						*,'wx' as type
					from
						prd_info_wx as wx
					union all
					select
						*,'xa' as type
					from
						prd_info_xa as x";
    	$repeat_sql="SELECT
					*,COUNT(0) as shu,sum(SITE_FLAG) as he
				FROM
					( ".$and_sql." ) as a
				GROUP BY
					product_fullname
				HAVING COUNT(product_fullname)";
    	$field_sql="select CONCAT(COLUMN_NAME,',') as name from information_schema.COLUMNS where table_name = 'prd_info_wx' and COLUMN_NAME!='SITE_FLAG' and COLUMN_NAME!='WAFER_PRICE' and table_schema='".\think\Config::get('database')['database']."';";
    	$field_arr=db()->query($field_sql);
    
    	$field='';
    	foreach ($field_arr as $p){
    		$field=$field.$p['name'];
    	}
    	$sql="SELECT ".$field."
				(CASE
						WHEN shu=1 THEN type
						WHEN shu=2 THEN
							(CASE
								WHEN he=3 THEN 'nx,wx'
								WHEN he=4 THEN 'nx,xa'
								WHEN he=5 THEN 'wx,xa' END)
						WHEN shu=3 THEN 'nx,wx,xa' END )
				as end_type
			FROM
				( ".$repeat_sql." ) as b;";
    	
    	echo $repeat_sql; exit;
    	
    	$product_arr=db()->query($sql);
    	//dump($product_arr);
    	$data=array();
    
    	$title=array('产品线ID','产品线名称','产品ID','产品名称','产品名称2','TYPE ID','产品客户名称','产品完整名称','ROUTE ID','GROSS die','Family ID','FAMILY NAME','MATERIAL_MASTER_ID','MATERIAL_SUP_ID','FAMILY_ROOT_ID','第一次出货时间','第一次出货单号','最后一次出货时间','最后一次出货单号','第一次PO操作时间','第一次PO操作单号','最后一次PO时间','最后一次PO单号','第一次出库时间','最后一次出库时间','库存数量','所属站点');
    	//$data[0]['data'][]=$title;
    	$data[0]['style']['sheet']='全部';
    	$data[0]['style']['style']=array('style');
    	$data[0]['data']=$product_arr;
    	array_unshift($data[0]['data'],$title);
    
    	$data[1]['data'][]=$title;
    	$data[1]['style']['sheet']='FXXX';
    	$data[1]['style']['style']=array('style');
    
    	$data[2]['data'][]=$title;
    	$data[2]['style']['sheet']='SSXXX';
    	$data[2]['style']['style']=array('style');
    
    	$data[3]['data'][]=$title;
    	$data[3]['style']['sheet']='SHXXX';
    	$data[3]['style']['style']=array('style');
    
    	$data[4]['data'][]=$title;
    	$data[4]['style']['sheet']='其他';
    	$data[4]['style']['style']=array('style');
    
    	foreach ($product_arr as $p){
    		$PRD_NO=substr(trim($p['PRD_NO']),0,2);
    		if($PRD_NO=='SS'){
    			$data[2]['data'][]=$p;
    		}else if($PRD_NO=='SH'){
    			$data[3]['data'][]=$p;
    		}else{
    			$PRD_NO=substr(trim($PRD_NO),0,1);
    			if($PRD_NO=='F'){
    				$data[1]['data'][]=$p;
    			}else{
    				$data[4]['data'][]=$p;
    			}
    
    		}
    	}
    	$data['style']=array(
    			'freezePane'=>'1',
    			'ret'=>'1',
    			'cell'=>array(
    					'A'=>array('width'=>40),'C'=>array('width'=>40),'K'=>array('width'=>40),'M'=>array('width'=>40),'N'=>array('width'=>40),'O'=>array('width'=>40),
    					'D'=>array('width'=>21),'G'=>array('width'=>21),'H'=>array('width'=>21),'L'=>array('width'=>21),
    					'F'=>array('width'=>13.5)
    			)
    	);
    	foreach(range('P','Y') as $v){
    		$data['style']['cell'][$v]=array('width'=>19.5);
    	}
    	/*foreach (range('B','Z') as $v){
    	 $data['style']['cell'][$v]['backgroundcolor']='00CC00FF';
    	 }*/
    	$data['name']='ERP产品信息表';
    	excel_css($data);
    }
    

    //关闭所有用户的修改功能
    public function closeEdit(){
        $sql = "update sw_sys_user set is_edit = 0 where id not in (1)";
        Db::query($sql);
        echo setServerBackJson(1,"设置成功");
    }

    //全部开放用户的修改功能
    public function openEdit(){
        $sql = "update sw_sys_user set is_edit = 1 where id not in (1)";
        Db::query($sql);
        echo setServerBackJson(1,"设置成功");
    }

    //部分开发人员的修改功能
    public function editPart(){
        $id_array = $_POST['id'];
        $id_str = implode(',',$id_array);
        Db::name('sys_user')->where('id','in',$id_str)->setField('is_edit',1);
        echo setServerBackJson(1,"设置成功");

    }

    public function closePartEdit(){
        $id_array = $_POST['id'];
        $id_str = implode(',',$id_array);
        Db::name('sys_user')->where('id','in',$id_str)->setField('is_edit',0);
        echo setServerBackJson(1,"设置成功");
    }


    public function get_partno($data){
        foreach($data as $k => $v){
            $arr = explode('-',$v['partno']);
            $str = $arr[0];
            $str_1 = explode('_',$str);
            $str_1 = $str_1[0];
            $str_check = substr($str_1,-1);
            if(!is_numeric($str_check)){
                $str_1 = substr($str_1,0,-1);
            }
            $num = substr($str_1,-1);
            if(!is_numeric($num)){
                $str_1 = substr($str_1,0,-1);
            }
            $str_1 = explode('/',$str_1);
            $str_1 = $str_1[0];
            $check_str = substr($str_1,-1);
            if(!is_numeric($check_str)){
                $str_1 = substr($str_1,0,-1);
            }

            $check_str1 = substr($str_1,-1);
            if(!is_numeric($check_str1)){
                $str_1 = substr($str_1,0,-1);
            }
            $check_str2 = substr($str_1,-1);
            if(!is_numeric($check_str2)){
                $str_1 = substr($str_1,0,-1);
            }
            Db::name('cost_bom')->where('id',$v['id'])->setField('partno_p',$str_1);
       }
    }

//    public function get_cost_data($data){
//        if($data['part_level'] == 1 ){
//            //wf阶段的料号
//            $mother = $data['mo'];
//            $BOM_data = Db::name('cost_cost')->where('type','like','%'.$mother,'%')->field('id,by58,WF')->select();
//            if($BOM_data){
//                $price = array();
//                $id_arr = array();
//                $agent = array();
//                foreach($BOM_data as $key => $val){
//                    if($val['WF'] != 0){
//                        $price[] = $val['WF'];
//                    }
//                    $id_arr[] = $val['id'];
//                    $agent[] = $val['by58'];
//                }
//                //costid字符串
//                $id_str = implode(',',$id_arr);
//                $agent = array_unique($agent);
//                $temp = array();
//                foreach($agent as $val){
//                    $id =  Db::name('cost_agent')->where('en_name',$val)->value('id');
//                    $temp[] = $id;
//                }
//                $agent_str = implode(',',$temp);
//                //清除O价格
//                $price = array_unique($price);
//                $price_str = implode(',',$price);
//                //准备插入的数据
//                $inset_data['partno'] = $data['partno'];
//                $inset_data['agent_id_str'] =  $agent_str;
//                $inset_data['cost_id_str'] = $id_str;
//                $inset_data['price'] = $price_str;
//                $inset_data['mother'] = $data['mo'];
//                $inset_data['part_level'] = $data['part_level'];
//                $inset_data['pri_id'] = $data['pri_id'];
//                Db::name('erp_bom')->insert($inset_data);
//            }
//        }else if($data['part_level'] == 2){
//            $mother = $data['mo'];
//            $BOM_data  =  Db::name('cost_cost')->where('type','like','%'.$mother.'%')->field('id,CP_factory,CP_Pcs')->select();
//            if($BOM_data){
//                $price = array();
//                $id_arr = array();
//                $agent = array();
//                foreach($BOM_data as $key => $val){
//                    if($val['CP_Pcs'] != 0){
//                        $price[] = $val['CP_Pcs'];
//                    }
//                    $id_arr[] = $val['id'];
//                    $agent[] = $val['CP_factory'];
//                }
//                //costid字符串
//                $id_str = implode(',',$id_arr);
//                $agent = array_unique($agent);
//                $temp = array();
//                foreach($agent as $val){
//                    $id =  Db::name('cost_agent')->where('en_name',$val)->value('id');
//                    $temp[] = $id;
//                }
//                $agent_str = implode(',',$temp);
//                $price = array_unique($price);
//                $price_str = implode(',',$price);
//                //准备插入的数据
//                $inset_data['partno'] = $data['partno'];
//                $inset_data['agent_id_str'] =  $agent_str;
//                $inset_data['cost_id_str'] = $id_str;
//                $inset_data['price'] = $price_str;
//                $inset_data['mother'] = $data['mo'];
//                $inset_data['part_level'] = $data['part_level'];
//                $inset_data['pri_id'] = $data['pri_id'];
//                Db::name('erp_bom')->insert($inset_data);
//
//            }
//        }else if($data['part_level'] == 3){
//            $type_no = $data['partno_p'];
//            $bom_data =  Db::name('cost_cost')->where('prdno','like','%'.$type_no.'%')->field('id,Assy_ab,PUG')->select();
//            if($bom_data) {
//                $price = array();
//                $id_arr = array();
//                $agent = array();
//                foreach ($bom_data as $key => $val) {
//                    if($val['PUG'] != 0){
//                        $price[] = $val['PUG'];
//                    }
//                    $id_arr[] = $val['id'];
//                    $agent[] = $val['Assy_ab'];
//                }
//                //costid字符串
//                $id_str = implode(',', $id_arr);
//                $agent = array_unique($agent);
//                $temp = array();
//                foreach ($agent as $val) {
//                    $id = Db::name('cost_agent')->where('en_name', $val)->value('id');
//                    $temp[] = $id;
//                }
//                $agent_str = implode(',', $temp);
//                $price = array_unique($price);
//                $price_str = implode(',', $price);
//                //准备插入的数据
//                $inset_data['partno'] = $data['partno'];
//                $inset_data['agent_id_str'] = $agent_str;
//                $inset_data['cost_id_str'] = $id_str;
//                $inset_data['price'] = $price_str;
//                $inset_data['mother'] = $data['mo'];
//                $inset_data['part_level'] = $data['part_level'];
//                $inset_data['pri_id'] = $data['pri_id'];
//                Db::name('erp_bom')->insert($inset_data);
//
//            }
//
//        }else if($data['part_level'] == 4){
//            $type_no = $data['partno_p'];
//            $bom_data =  Db::name('cost_cost')->where('prdno','like','%'.$type_no.'%')->field('id,F_T_Out,FT_sjjg')->select();
//            if($bom_data){
//                $price = array();
//                $id_arr = array();
//                $agent = array();
//                foreach ($bom_data as $key => $val) {
//                    if($val['FT_sjjg'] != 0){
//                        $price[] = $val['FT_sjjg'];
//                    }
//                    $id_arr[] = $val['id'];
//                    $wf[] = $val['F_T_Out'];
//                }
//                //costid字符串
//                $id_str = implode(',', $id_arr);
//                $agent = array_unique($agent);
//                $temp = array();
//                foreach ($agent as $val) {
//                    $id = Db::name('cost_agent')->where('en_name', $val)->value('id');
//                    $temp[] = $id;
//                }
//                $agent_str = implode(',', $temp);
//                $price = array_unique($price);
//                $price_str = implode(',', $price);
//                //准备插入的数据
//                $inset_data['partno'] = $data['partno'];
//                $inset_data['agent_id_str'] = $agent_str;
//                $inset_data['cost_id_str'] = $id_str;
//                $inset_data['price'] = $price_str;
//                $inset_data['mother'] = $data['mo'];
//                $inset_data['part_level'] = $data['part_level'];
//                $inset_data['pri_id'] = $data['pri_id'];
//                Db::name('erp_bom')->insert($inset_data);
//            }
//        }
//    }





}