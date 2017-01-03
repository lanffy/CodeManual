<?php
/**
 * <pre>
 * User: raoliang
 * Date: 2017/1/3
 * Time: 20:57
 * Desc:
 * </pre>
 */

interface A {
    const my_static = 'A';
    public function getInstance();
    public function getSelf();
}

interface B extends A{

}

class C implements B {

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
