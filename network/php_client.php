<?php
$socket = fsockopen('127.0.0.1', 8088, $errno, $err_str, 1);
if(!$socket) {
    echo $err_str . ';code:' . $errno . PHP_EOL;
    exit;
}
socket_set_blocking($socket, false);
fwrite($socket, 'client write data to server...\r\n');
while(!feof($socket)) {
    echo fread($socket, 1024);
    flush();
    ob_flush();
    usleep(500);
}
fclose($socket);

