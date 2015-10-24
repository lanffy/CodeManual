<?php

function getMaxProfilt(array $arr) {
    $len = count($arr);
    $array_tmp = array();
    echo '辅助数组：', '<br />';
    for($i = 0; $i < $len; $i++) {
        for($j = 0; $j < $len; $j++) {
            $array_tmp[$i][$j] = $arr[$j] - $arr[$i];
            echo $array_tmp[$i][$j] . ' ';
        }
        echo '<br />';
    }
    $maxProfit_i = 1;
    $maxProfit_j = 2;
    $maxProfit = $array_tmp[1][2];
    for($i = 1; $i < $len; $i++) {
        for($j = 2; $j < $len; $j++) {
            if($array_tmp[$i][$j] > $maxProfit && $j > $i) {
                $maxProfit = $array_tmp[$i][$j];
                $maxProfit_i = $i;
                $maxProfit_j = $j;
            }
        }
    }
    echo 'maxProfit is :', $maxProfit, '; maxProfit_i is:', $maxProfit_i, '; maxProfit_j is :', $maxProfit_j, '<br />';
    $secondProfit = $array_tmp[0][1];
    $secondProfit_i = 0;
    $secondProfit_j = 1;
    for($i = 0; $i < $maxProfit_i; $i++) {
        //这里控制第二手买入要在第一手卖出的情况下才能买入
        for($j = 1; $j < $maxProfit_i; $j++) {
            if($array_tmp[$i][$j] > $secondProfit && $j > $i) {
                $secondProfit = $array_tmp[$i][$j];
                $secondProfit_i = $i;
                $secondProfit_j = $j;
            }
        }
    }
    echo 'second profit is : ', $secondProfit, '; secondProfit_i is :', $secondProfit_i, '; secondProfit_j is :', $secondProfit_j, '<br />';    
    return $maxProfit + $secondProfit;
}

// $array = [3, 8, 5, 1, 7, 8];
// $array = [1,2,3,4,5,6,7,8];
$array = [2,9,1,9,2,4,8,6,2];

echo getMaxProfilt($array);