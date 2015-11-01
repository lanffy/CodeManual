<?php 
/**
 * My Reflection_Method class
 */

class My_Reflection_Method extends ReflectionMethod 
{
    public $visibility = array();

    public function __construct($o, $m)
    {
        parent::__construct($o, $m);
        $this->visibility = Reflection::getModifierNames($this->getModifiers());
    }
}

/**
 * Demo class #1
 *
 */

class T {
    protected function x() {}
}

/**
 * Demo class #2
 *
 */

class U extends T {
    function x() {}
}

var_dump(new My_Reflection_method('U', 'x'));
