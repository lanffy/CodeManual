<?php
$conn = mysql_connect('localhost', 'root', '123', '2222');

if(!$conn) {
    die('connect mysql failed ' . mysql_error());
}

mysql_select_db('test', $conn);

$result = mysql_query('SELECT * FROM lng_lat LIMIT 10');

while($row = mysql_fetch_array($result)) {
    var_dump($row);
    $long = $row['longitude'] + 0;
    $latitude = $row['latitude'] + 0;
    echo '经度：' . PHP_EOL;
    var_dump($long);
    echo '纬度：' . PHP_EOL;
    var_dump($latitude);
    echo PHP_EOL;
}

mysql_close($conn);
