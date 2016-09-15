<?php
/**
 * <pre>
 * User: raoliang
 * Date: 16/9/15
 * Time: 14:18
 * Desc: 被包含的文件
 * </pre>
 */
$a = 'a->2';
$a2 = 'a2->2';
echo __FILE__ . '->a2' . PHP_EOL;
function a2()
{
    echo 'a->2';
}

class A2
{

}