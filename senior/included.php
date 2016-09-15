<?php
/**
 * <pre>
 * User: raoliang
 * Date: 16/9/15
 * Time: 14:18
 * Desc: 被包含的文件
 * </pre>
 */
$a = 'a->1';
echo __FILE__ . '->a1' . PHP_EOL;

function a1()
{
    echo 'a->1';
}
