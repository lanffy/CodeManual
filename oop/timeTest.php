<?php
date_default_timezone_set('Asia/Shanghai');
$stamp = strtotime('-1 hour');
echo $stamp, PHP_EOL;
$oneHourAgo = date('Y-m-d H:i:s', $stamp);
echo time(), PHP_EOL;
echo $oneHourAgo, PHP_EOL;
echo (time() - $oneHourAgo)/3600;
