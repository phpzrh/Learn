<?php
return [
     'db_oracle' => [
         'type'  =>  '\think\oracle\Connection',
         'hostname' => '192.9.230.22', //���ݿ��ַ
         'database' => 'orcl', //���ݿ�SID
         'username' => 'WTQ', // �û���
         'password' => '123456', // ����
         'hostport' => '1521', //�˿ں�
         'charset'=> 'utf8', // ���ݿ����
     ],
    'db_mssql' => [
        'type' => 'Sqlsrv',
//        'hostname' => '192.9.230.15', //���ݿ��ַ
//        'database' => 'mms', //���ݿ�SID
        'username' => 'sa', // �û���
        'password' => 'It_soft', // ����
//        'hostport' => '1433', //�˿ں�
        'dsn'     => 'odbc:Driver={SQL Server};Server=192.9.230.15,1433;Database=mms',
    ]

];