<?php
/**
 * <pre>
 * User: raoliang
 * Date: 16/9/16
 * Time: 15:44
 * Desc:
 * </pre>
 */

define('G_LOAD_AUTO', true);

require_once '/Users/rlanffy/Documents/anjuke/www/test/system/functions.php';

$trace = format_trace(debug_backtrace());

var_dump($trace);
echo 'done', PHP_EOL;
