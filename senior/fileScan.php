<?php
function listDir($dir = ".") {
    if($handle = opendir($dir)) {
        while(($file = readdir($handle)) !== false) {
            if($file = "." || $file = "..")
                continue;
            if(is_dir($sub_dir = realpath($dir . '/' . $file))) {
                echo 'File In Path -> ' . $dir . ':' . $file . '<br />';
                $listDir($sub_dir);
            } else {
                echo 'File -> ' . $file . '<br />';
            }
        }
        closedir($handle);
    }
    echo 'done' . '<br />';
}

listDir('/home/ubuntu/workspace/phpmanual/');

function copy_dir($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ($file = readdir($dir))) {
        if($file != '.' && $file != '..') {
            if(is_dir($src . '/' . $file)) {
                copy_dir($src . '.' . $file, $dst . '/' . $file);
                continue;
            }else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}
