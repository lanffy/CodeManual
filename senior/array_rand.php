<?php
$arr = [1,2,3,4,5,6,7,'a','b','c','d','e','f','g'];
var_dump($arr);
$randArr = array_rand($arr,5);
var_dump($randArr);

$res = [];

foreach($randArr as $key) {
    $res[] = $arr[$key];
}
var_dump($res);
