<?php
return [
     'db_oracle' => [
         'type'  =>  '\think\oracle\Connection',
         'hostname' => '192.9.230.22', //数据库地址
         'database' => 'orcl', //数据库SID
         'username' => 'WTQ', // 用户名
         'password' => '123456', // 密码
         'hostport' => '1521', //端口号
         'charset'=> 'utf8', // 数据库编码
     ],
    'db_mssql' => [
        'type' => 'Sqlsrv',
//        'hostname' => '192.9.230.15', //数据库地址
//        'database' => 'mms', //数据库SID
        'username' => 'sa', // 用户名
        'password' => 'It_soft', // 密码
//        'hostport' => '1433', //端口号
        'dsn'     => 'odbc:Driver={SQL Server};Server=192.9.230.15,1433;Database=mms',
    ]

];