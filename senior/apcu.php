<?php
if (!extension_loaded("apcu")) die("skip APCU extension not loaded");

$set_v = apcu_store('key', 'value');
var_dump($set_v);
$get_v = apcu_fetch('key');
var_dump($get_v);
var_dump(apcu_exists('key'));
sleep(10);
var_dump(apcu_exists('key'));

//require_once(dirname(__FILE__) . '/apcu_get.php');
//test_get('key');
