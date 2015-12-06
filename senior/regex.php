<?php

$shou = '/shou/';
$zu = '/zu/';
$pattern = "/(zu|shou)/";
var_dump(preg_match($pattern, $shou));
var_dump(preg_match($pattern, $zu));
