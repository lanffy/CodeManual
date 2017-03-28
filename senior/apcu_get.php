<?php

//function test_get($key) {
    $get_v = apcu_fetch('key');
    var_dump($get_v);
    var_dump(apcu_exists('key'));
    var_dump(apcu_delete('key'));

//}

