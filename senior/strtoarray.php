<?php
$str = 'this is a string';
$count = strlen($str);
$array = array();
for($i = 0; $i < $count; $i++) {
    $s = $str{$i};
    if(empty(trim($s)))
        continue;
    $array[] = $s;
}
var_dump($array);

$str2 = <<<sss
fsdafasdfsaf
asf
awfawe
f
sss;
echo $str2 . "\n";
