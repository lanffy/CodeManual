<?php
ini_set('date.timezone','Asia/Shanghai');
$date1 = date("Y-m-d 10:00:00");
echo $date1;

$month_begin = date('d') == 1 ? true : false;
$date2 = $month_begin ? date($value, strtotime("-1 months" . date($value, time()))) : date($value);
echo $date2;

$date3 = date('d');
var_dump($date3);
var_dump($date3 <= 3);

$monthly = date("Y\Mm", strtotime("-10 days"));
var_dump($monthly);
var_dump('---');

$now = time();
$now = strtotime('2015-12-02 10:00:00');
var_dump('now:');
var_dump($now);
$nine_hour_ago = $now - 9*60*60;
var_dump('nine hour ago:');
var_dump($nine_hour_ago);
var_dump(intval(date('d', $nine_hour_ago)));


$now = time();
$today = intval(date('d', $now));
var_dump($today);
if ($today == 1) {
    $change_start_time_str = date('Y-m-01 08:00:00');
    echo 'start str:' . $change_start_time_str . PHP_EOL;
    $change_end_time_str = date('Y-m-01 10:00:00');
    echo 'end str:' . $change_end_time_str . PHP_EOL;
    $change_start_time = strtotime($change_start_time_str);
    $change_end_time = strtotime($change_end_time_str);
    if ($now > $change_start_time && $now < $change_end_time) {
        echo 'exchange flag' . PHP_EOL;
    } else {
        echo 'not exchange flag' . PHP_EOL;
    }
}

var_dump(date('Ym', strtotime('-1 month')));
