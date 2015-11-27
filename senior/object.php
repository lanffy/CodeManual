<?php 
class Test{
    public $p1 = "str";

}
$testObj = new Test();
$rs = empty($testObj->p0);
var_dump($rs);
$isFalseEmpty = empty(false);
var_dump($isFalseEmpty);
