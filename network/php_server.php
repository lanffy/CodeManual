<?php
$h = '127.0.0.1';
$p = 8088;
set_time_limit(0);
$socket = socket_create(AF_INET, SOCKET_STREAM, 0) or die('could not create socket\n');
socket_bind($socket, $h ,$p);
$result = socket_listen($socket, 3) or die('could not set up socket listener\n');
$spawn = socket_accept($socket) or die('could not accept incoming connection\n');
$input = socket_read($spawn, 1) or die('could not read input\n');
$output = strrev($input);
socket_write($spawn,$output,strlen($output)) or die('could not write output\n');
socket_close($spawn);
socket_close($socket);


