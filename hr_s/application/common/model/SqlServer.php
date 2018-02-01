<?php
namespace app\common\model;
use think\Model;
use PDO;
use PDOException;
class SqlServer extends Model{
    public function getSqlsrvData($database,$sql){
        $mssql = get_mssql_data();
        $dsn=$mssql['type'].":Server=".$mssql['hostname'].",".$mssql['hostport'].";database=".$database."";
        try{
            $conn = new PDO ($dsn,$mssql['username'],$mssql['password']);
        }catch (PDOException $e){
            print "sqlsrv: " . $e->getMessage() . "<br/>";
            die();
        }
        $conn->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
        $res=$conn->query($sql);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        while($row=$stmt->fetchAll()) {
           return $row;
        }
    }

}