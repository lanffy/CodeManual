<?php
/**
 * <pre>
 * User: raoliang
 * Date: 16/9/15
 * Time: 15:05
 * Desc:
 * </pre>
 */

function __autoload_aa() {
    echo __METHOD__ . PHP_EOL;
}

spl_autoload_register('__autoload_aa');
//
//$functions = spl_autoload_functions();
//var_dump($functions);
//spl_autoload_unregister('__autoload_aa');
//$functions = spl_autoload_functions();
//var_dump($functions);
//
//$string = 'abcdefga';
//var_dump(strrpos($string, 'a'));
//var_dump(strpos($string, 'a'));
//
//ob_start();
//__autoload_aa();
//$output = ob_get_contents();
//ob_end_clean();
//var_dump($output);

if( ! defined('CRLF')) define('CRLF', sprintf('%s%s', chr(13), chr(10)));
var_dump(CRLF);
