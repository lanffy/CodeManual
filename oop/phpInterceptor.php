<?php
//php中拦截器方法的使用
class Person {

    private $_name;
    private $_age;
    function __get($property) {
        $method = "get{$property}";
        if(method_exists($this, $method)) {
            return $this->$method();
        }
    }

    function __isset($property) {
        $method = "get{$property}";
        return method_exists($this, $method);
    }

    function __set($property, $value) {
        $method = "get{$property}";
        if(method_exists($this, $method)) {
            return $this->$method($value);
        }
    }

    function getName() {
        return 'Lanffy';
    }

    function getAge() {
        return 24;
    }

    function setName($name) {
        if(!is_null($name)) {
            $this->_name=strtoupper($name);
        }
    }

    function setAge($age) {
        if(!is_null($age)) {
            $this->_age=strtoupper($age);
        }
    }
}


$lanffy = new Person();
echo $lanffy->name, PHP_EOL;
echo isset($lanffy->_noPro) ? $lanffy->noPro : 'noPro参数不存在', PHP_EOL;
$lanffy->_name = 'value for noPro';
echo isset($lanffy->_name) ? $lanffy->_name : 'noPro参数不存在', PHP_EOL;


