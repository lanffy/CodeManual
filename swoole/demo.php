<?php
$serv = new swoole_http_server('127.0.0.1', 11111);
$serv->on('request', function($request, $response){
    var_dump($request->get);
    var_dump($request->post);
    var_dump($request->cookie);
    var_dump($request->files);
    var_dump($request->header);
    var_dump($request->server);

    $response->cookie('TestCookie', 'swoole cookie');
    $response->header('X-Trace','swoole header');
    $response->end('Hello World');
});
$serv->start();
