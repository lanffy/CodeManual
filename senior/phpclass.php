<?php
class Stu {
    private $name;
    private $sex;
    function __construct($name = "", $sex = "") {
        $this->name = $name;
        $this->sex = $sex;
    }
    function SetName($name = "") {
        $this->name = $name;
    }

    function SetSex($sex = "") {
        $this->sex = $sex;
    }
}
$stu = new Stu("lanffy", "male");
print_r($stu);
