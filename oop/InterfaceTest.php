<?php

/**
 * <pre>
 * User: raoliang
 * Date: 2017/1/3
 * Time: 20:57
 * Desc:
 * </pre>
 */
interface A
{
    const my_static = 'A';

    public function getInstance();

    public function getSelf();
}

interface B extends A
{

}

class C implements B
{

    public function getInstance()
    {
        // TODO: Implement getInstance() method.
    }

    public function getSelf()
    {
        // TODO: Implement getSelf() method.
    }
}

$c = new C();
var_dump(C::my_static);


trait Log
{
    public function parameterCheck($parameters)
    {
        echo __METHOD__ . ' parameter check' . $parameters . PHP_EOL;
    }

    public function startLog()
    {
        echo __METHOD__ . ' public function' . PHP_EOL;
    }
}

trait Check
{
    public function parameterCheck($parameters)
    {
        echo __METHOD__ . ' parameter check' . $parameters . PHP_EOL;
    }

    public function startLog()
    {
        echo __METHOD__ . ' public function' . PHP_EOL;
    }
}

class Publish
{
    use Check, Log {
        Check::parameterCheck insteadof Log;
        Log::startLog insteadof Check;
        Check::startLog as csl;
    }

    public function doPublish()
    {
        $this->startLog();
        $this->parameterCheck('params');
        $this->csl();
    }
}

$publish = new Publish();
$publish->doPublish();

