<?php
if($argc != 2) {
    echo "Usage: php hello.php [name]" . PHP_EOL;
    exit(1);
}
$name = $argv[1];
echo "Hello, {$name}" . PHP_EOL;
