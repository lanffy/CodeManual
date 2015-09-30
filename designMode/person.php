<?php
require_once('decorate.php');
class person implements decorator {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public function decorate() {
        echo 'Hello, My Name is :' . $this->name . '<br />';
        echo 'wear clothes<br />';
    }
}
