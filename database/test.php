<?php
$conn = mysql_connect('localhost', 'root', '123', '2222');
if(!$conn) {
    die('database connect failed' . mysql_error());
}

mysql_select_db('test', $conn);

$long = '116.441454';
$lat = '39.947892';
$sqlstr = 'INSERT INTO lng_lat(longitude, latitude) VALUES(' . $long . ',' . $lat . ')';
echo 'begin excute:' . $sql . PHP_EOL;
mysql_query($sqlstr);

mysql_close($conn);
