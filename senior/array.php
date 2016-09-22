<?php
$str = "";
$array = explode(",", $str);
var_dump($array);
var_dump(empty($array));
var_dump(in_array(15,$array));
var_dump(in_array(14,$array));


$a1 = ['a' => 'a1', 'b' => 'b1'];
$b1 = ['c' => 'c1', 'd' => 'd1'];

$c = array_merge($a1, $b1);
var_dump($c);
