<?php
abstract class AbstractClass {
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    public function printOut() {
        echo $this->getValue() . PHP_EOL;
    }

}

class ConcreteClass1 extends AbstractClass {
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix} ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass {
    public function getValue() {
        return 'ConcreteClass2';
    }

    public function prefixValue($prefix) {
        return "{$prefix} ConcreteClass2";
    }
}

abstract class AbstractClass2 {
    // 我们的抽象方法仅需要定义需要的参数
    abstract protected function func($name);
} 

class ConcreteClass3 extends AbstractClass2 {
    // 我们的子类可以定义父类签名中不存在的可选参数
    public function func($name, $tel = '110') {
        echo 'the name is :', $name, ';the tle is : ', $tel, PHP_EOL;
    }
}


$class1 = new ConcreteClass1();
$class1->printOut();
echo $class1->prefixValue('FOO_') . PHP_EOL;

$class2 = new ConcreteClass2();
$class2->printOut();
echo $class2->prefixValue('FOO_') . PHP_EOL;

$class3 = new ConcreteClass3();
$class3->func('lanffy');
$class3->func('lanffy', '185........');
