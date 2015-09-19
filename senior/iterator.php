<?php
class test implements Iterator {
    private $_items = array(1,2,3,4,5,6,7);
    public function __construct() {
        ;
    }
    public function rewind() { reset($this->_items); }
    public function current() { return current($this->_items); }
    public function key() { return key($this->_items); }
    public function next() { return next($this->_items); }
    public function valid() { return ($this->current() !== false); }
}
$obj = new test();
foreach($obj as $key => $value) {
    print $key . "=>" . $value . "\n";
}