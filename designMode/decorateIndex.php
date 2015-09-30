<?php
require_once('person.php');
require_once('decoratePerson.php');
function index() {
    $person = new person('lanffy');
    $decoratePerson = new decoratePerson($person);
    $decoratePerson->decorate();
}

index();
