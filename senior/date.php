<?php
date_default_timezone_set();
$date1 = date("Ym");
echo $date1;

$month_begin = date('d') == 1 ? true : false;
$date2 = $month_begin ? date($value, strtotime("-1 months" . date($value, time()))) : date($value);
echo $date2;

$date3 = date('d');
var_dump($date3);
var_dump($date3 <= 3);

$monthly = date("Y\Mm", strtotime("-10 days"));
var_dump($monthly);
