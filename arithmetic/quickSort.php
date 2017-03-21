<?php

function quickSort($arra){
    if(count($arra) > 1) {
        $k = $arra[0];
        $smaller = [];
        $bigger = [];
        $size = count($arra);
        for($i = 1; $i < $size; $i++) {
            if($arra[$i] <= $k) {
                $smaller[] = $arra[$i];
            } else {
                $bigger[] = $arra[$i];
            }
        }
        $smaller = quickSort($smaller);
        $bigger = quickSort($bigger);
        return array_merge($smaller, [$k], $bigger);
    } else {
        return $arra;
    }
}

$a = [9,8,4,5,6,7,3,2,1,5,6,7,8,4,3,2];
var_dump($a);
$b = quickSort($a);
var_dump($b);


