<?php
require_once('decorate.php');
class decoratePerson implements decorator {
    private $person;

    public function __construct($person = NULL) {
        $this->person = $person;
    }

    public function decorate(){
        echo 'wear an hat before wear clothes<br />';
        if(!empty($this->person))
            $this->person->decorate();
    }
}
