<?php
$a = 1;
$b = 2;

function test() {
    global $b;
    echo 'the variable a is:', $a, PHP_EOL;
    echo 'the variable b is:', $b, PHP_EOL;
}

test();
