<?php
$url = 'http://www.phpddt.com.cn/abc/de/fg.php?id=1';
$basename = basename($url);
var_dump($basename);
$fileNameArray = explode('?', $basename);
var_dump($fileNameArray);
$file_name = $fileNameArray[0];
echo 'the file name is :' . $file_name . "\n";
$resultArray = explode('.', $file_name);
var_dump($resultArray);
$ext = $resultArray[1];
echo 'the extend of the file is:'. $ext . "\n";

echo '第二种方法：'. "\n";
$pathInfo = pathinfo($url);
var_dump($pathInfo);
$extension = $pathInfo['extension'];
$markIndex = strpos($extension, '?');
$ext2 = substr($extension, 0, $markIndex);
echo 'the extend of the file is:'. $ext2 . "\n";

echo '第3种方法：'. "\n";
$url3 = parse_url($url);
var_dump($url3);
$result = pathinfo($url3['path']);
var_dump($result);
$result = pathinfo($url3['path'], PATHINFO_EXTENSION);
echo 'the extend of the file is:'. $result . "\n";
