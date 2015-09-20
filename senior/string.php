<?php
$str = " This is A STRING ";
$str = str_replace(" ", "", $str);
$str = strtolower($str);
echo $str . "\n";
echo strlen($str) . "\n";
