<?php
class Base {
    public function sayHello() {
        echo 'Hello from Base', PHP_EOL;
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'Hello from trait->SayWorld', PHP_EOL;
    }

    public function inc() {
        static $c = 0;
        $c++;
        echo $c, PHP_EOL;
    }
}

class myHelloWorld extends Base {
    use SayWorld;
}

$obj = new myHelloWorld();
var_dump($obj);
$obj->sayHello();
$obj->inc();
$obj->inc();

