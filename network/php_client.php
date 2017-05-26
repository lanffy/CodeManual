<?php
$client = curl_init();

curl_setopt($client, CURLOPT_URL, '127.0.0.1:8088?p=1&q=2');
//curl_setopt($client, CURLOPT_PORT,8088);
curl_setopt($client, CURLOPT_RETURNTRANSFER,1);
curl_setopt($client, CURLOPT_HEADER,1);
$r = curl_exec($client);
curl_close($client);
var_dump($r);
