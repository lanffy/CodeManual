<?php

/**
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/2/6
 * Time: 下午12:55
 * Desc: 激光炮类
 */
require_once 'abstract/Unit.php';
class LaserCannonUnit extends Unit {
    function bombardStrength() {
        return 44;
    }
}