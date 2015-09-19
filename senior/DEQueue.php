<?php
class DEQueue
{
    private $_array = array();
    //入头
    public function unshift($element) {
        return array_unshift($this->_array, $element);
    }
    
    //出头
    public function shift() {
        return array_shift($this->_array);
    }
    
    //入尾
    public function push($element) {
        return array_push($this->_array, $element);
    }
    
    //出尾
    public function pop() {
        return array_pop($this->_array);
    }
    
    //长度
    public function length() {
        return count($this->_array);
    }
}