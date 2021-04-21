<?php

class Stagiaire{
    public $id;
    public $created_at;
    public $name;
    public $phone;
    public $birthday;
    public static $idnumber;

    public function __construct($name, $phone = '0123456789', $birthday){
        $this->created_at = date('Y,-m-d');
        $this->name = $name;
        $this->phone = $phone;
        $this->birthday = $birthday;
        self::$idnumber++;
        $this->id = self::$idnumber;
    }

}