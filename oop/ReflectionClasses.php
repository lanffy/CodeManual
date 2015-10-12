<?php
include_once('objExtends.php');
class refClass {

    /**
     * @var foo
     */
    protected $foo_class;

    public function test() {
        foo::printStr('test function');
        var_dump($foo_class);
        $this->foo_class->printItem('aaaaa');
//        $this->foo_class::printStr('test');
    }
}

$ref = new refClass();
$ref->test();
