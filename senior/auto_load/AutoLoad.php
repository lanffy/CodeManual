<?php


/**
 * <pre>
 * Date: 16/9/22
 * Time: 23:57
 * Desc:
 * </pre>
 */
class AutoLoad
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function __toString()
    {
        return 'name:' . $this->name . ';age:' . $this->age;
    }
}