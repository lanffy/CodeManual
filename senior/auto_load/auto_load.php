<?php
/**
 * <pre>
 * User: raoliang
 * Date: 16/9/22
 * Time: 23:23
 * Desc: php中的auto_load
 * </pre>
 */

global $loaded_classes;

function __my_auto_load($class_name)
{
    if (!$class_name) {
        echo __METHOD__ . 'input class name is empty!' . PHP_EOL;
    } else {
        echo __METHOD__ . 'get input class name is ' . $class_name . PHP_EOL;
    }
    $current_file_path = realpath(dirname(__FILE__)) . '/';
    $real_file = $current_file_path . $class_name . '.php';
    if (file_exists($real_file)) {
        require_once($real_file);
        echo 'require file:' . $real_file . PHP_EOL;
    } else {
        echo 'file is not exist:' . $real_file . PHP_EOL;
    }
}

function auto_load2()
{

}

spl_autoload_register('__my_auto_load');
spl_autoload_register('auto_load2');

$classLoaders = spl_autoload_functions();
var_dump($classLoaders);
echo PHP_EOL;
foreach ($classLoaders as $classLoader) {
    echo $classLoader . PHP_EOL;
}
exit;

$a = new AutoLoad('Lanffy', 18);
var_dump($a);
echo $a;
$a->setAge(20);
var_dump($a);
echo $a;

