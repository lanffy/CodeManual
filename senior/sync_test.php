<?php
/**
 * <pre>
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/4/25
 * Time: 下午12:03
 * Email: liangrao@anjuke.com
 * Desc: PHP中的异步调用
 * </pre>
 */

$handle = popen("php /home/www/user/usersite/app-shangpu-job/launcher.php --job_path=app-shangpu-job --class=Shangpu_Job_Uesearch_RebuildDataJob --property_ids=10010", "r");

echo 'handle type:' . gettype($handle) . PHP_EOL;

$logs = fread($handle, 1024);

while ($logs) {
    echo $logs . PHP_EOL;
    $logs = fread($handle, 1024);
}

pclose($handle);

echo "done" . PHP_EOL;