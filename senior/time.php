<?php
$test_time = strtotime('today');
echo 'today is : ' . $test_time . PHP_EOL;
echo 'today date is : ' . date('Y-m-d H:i:s' ,$test_time) . PHP_EOL;
$expired_time = $test_time - 10 * 24 * 60 * 60;
echo 'expired_time is : ' . $expired_time . PHP_EOL;
echo 'expired_time date is : ' . date('Y-m-d H:i:s' ,$expired_time) . PHP_EOL;

echo time();
