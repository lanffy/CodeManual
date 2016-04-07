<?php

/**
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/2/9
 * Time: 下午6:05
 * Email: liangrao@anjuke.com
 * Desc:
 */
require_once 'Army.php';
require_once 'Archer.php';
require_once 'LaserCannonUnit.php';
function test()
{
    $army = new Army();
    $archer = new Archer();
    $army->addUnit($archer);
    $army->addUnit(new LaserCannonUnit());
    echo $army->bombardStrength() . PHP_EOL;

    $army->removeUnit($archer);
    echo $army->bombardStrength() . PHP_EOL;

    $army2 = new Army();
    $army2->addArmy($army);
    echo $army2->bombardStrength() . PHP_EOL;

}

test();