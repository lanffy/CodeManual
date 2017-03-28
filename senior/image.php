<?php
$price = $_GET['price'];
$len = strlen($price);
$len = $len * 9;
//var_dump($len);exit;
header("Content-type: image/png");
$im = @imagecreate($len, 16) or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 235, 95, 0);
imagestring($im, 500, 0, 0,  $price, $text_color);
imagepng($im);
imagedestroy($im);
