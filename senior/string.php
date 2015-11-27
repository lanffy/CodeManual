<?php
$str = " This is A STRING ";
$str = str_replace(" ", "", $str);
$str = strtolower($str);
echo $str . "\n";
echo strlen($str) . "\n";
echo "===" . PHP_EOL;

$str = "123456";
var_dump(is_numeric($str));
var_dump(is_numeric(""));

