<?php
class Factory{
    public $name = 'factory';
    public static $sname = 's factory';
    public static function workers() {
        return __METHOD__;
    }

    public function sw() {
        return $this->name . '->' . static::$sname . ';' . static::workers();
    }
}

class ServiceFactory extends Factory{
    public $name = 'service factory';
    public static $sname = 's service factory';
    public static function workers() {
        return __METHOD__;
    }
    public function production() {
        $sf = new self();
    }
}

$f = new ServiceFactory();
//var_dump($f->workers());
$f->production();
