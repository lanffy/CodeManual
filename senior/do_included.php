<?php
/**
 * <pre>
 * User: raoliang
 * Date: 16/9/15
 * Time: 14:19
 * Desc: 主动包含的文件
 * </pre>
 */

include_once 'included.php';

echo __FILE__ . '->b' . PHP_EOL;

echo $a . PHP_EOL;
a1();

function da() {
    include_once 'included2.php';
    echo $a . PHP_EOL;
};
da();

function get_include_contents($file_name) {
    if(is_file($file_name)) {
        ob_start();
        include_once "$file_name";
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
    return false;
}
$content = get_include_contents('included2.php');
var_dump($content);
