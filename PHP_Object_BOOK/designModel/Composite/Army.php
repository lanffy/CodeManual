<?php

/**
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/2/6
 * Time: 下午12:58
 * Desc:
 */
require_once 'abstract/Unit.php';
class Army extends Unit
{

    /**
     * @var array
     * Unit
     */
    private $units = array();
    private $armies = array();

    /**
     * @return mixed
     * 攻击强度
     */
    function bombardStrength()
    {
        $strength = 0;
        foreach ($this->units as $unit) {
            $strength += $unit->bombardStrength();
        }

        foreach ($this->armies as $army) {
            $strength += $army->bombardStrength();
        }

        return $strength;
    }

    public function addUnit(Unit $unit)
    {
        if (!in_array($unit, $this->units, true)) {
            array_push($this->units, $unit);
        }
    }

    public function addArmy(Army $army)
    {
        if (!in_array($army, $this->armies, true)) {
            array_push($this->armies, $army);
        }
    }

    public function removeUnit(Unit $unit)
    {
        $this->units = array_udiff($this->units, array($unit), function ($a, $b) {
            return $a === $b ? 0 : 1;
        });
    }

    public function removeArmy(Army $army)
    {
        $this->armies = array_udiff($this->armies, array($army), function ($a, $b) {
            return $a === $b ? 0 : 1;
        });
    }

}