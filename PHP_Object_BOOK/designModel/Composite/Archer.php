<?php

/**
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/2/6
 * Time: 下午12:55
 * Desc: 射手类
 */

require_once 'abstract/Unit.php';
class Archer extends Unit {
    function bombardStrength() {
        return 4;
    }
}