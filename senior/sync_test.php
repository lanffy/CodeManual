<?php
/**
 * <pre>
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/4/25
 * Time: 下午12:03
 * Desc: PHP中的异步调用
 * </pre>
 */

echo 'handle type:' . gettype($handle) . PHP_EOL;

$logs = fread($handle, 1024);

while ($logs) {
    echo $logs . PHP_EOL;
    $logs = fread($handle, 1024);
}

pclose($handle);

echo "done" . PHP_EOL;