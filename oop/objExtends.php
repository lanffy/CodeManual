<?php
class foo {
    public function printItem($string) {
        echo 'Foo: ', $string, PHP_EOL;
    }

    public function printPHP() {
        echo 'PHP is great.', PHP_EOL;
    }

    public static function printStr($str) {
        echo 'the input is :', $str, PHP_EOL;
    }
}

class bar extends foo {
    public function printItem($string) {
        echo 'Bar: ', $string, PHP_EOL;
    }
}

$foo = new foo();
$bar = new bar();
$foo->printItem('baz');
$foo->printPHP();
$bar->printItem('baz');
$bar->printPHP();
