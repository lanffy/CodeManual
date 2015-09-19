<?php
function write_file($filename, $content)
{
    $lock = $filename . '.lock';
    $write_length = 0;
    while(true) {
        if(file_exists($lock)) {
            usleep(100);
        } else {
            touch($lock);
            $write_length = file_put_contents($filename, $content, FILE_APPEND);
            break;
        }
    }
    if(file_exists($lock)) {
        unlink($lock);
    }
    return $write_length;
}
echo write_file("iterator.php", "echo \"this content was worte by write_file funtion\";" . "\n");