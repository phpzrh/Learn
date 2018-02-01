<?php
namespace app\common\model;


class Single {
    public $hash;
    static protected $ins=null;
    final protected function __construct(){
        $this->hash=rand(1,9999);
    }

    private function __clone(){

    }
    static public function getInstance(){
        if (self::$ins instanceof self) {
            return self::$ins;
        }
        self::$ins=new self();
        return self::$ins;
    }
}

$php = Single::getInstance();
$php1 = Single::getInstance();

