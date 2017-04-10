<?php

/**
 * <pre>
 * Created by PhpStorm.
 * User: rlanffy
 * Date: 16/4/22
 * Time: 下午4:59
 * Desc: 数组排列组合
 * </pre>
 */
class combinationClass implements Iterator
{

    protected $c = null;
    protected $s = null;
    protected $n = 0;
    protected $k = 0;
    protected $pos = 0;

    function __construct($s, $k)
    {
        if (is_array($s)) {
            $this->s = array_values($s);
            $this->n = count($this->s);
        } else {
            $this->s = (string)$s;
            $this->n = strlen($this->s);
        }
        $this->k = $k;
        $this->rewind();
    }

    function key()
    {
        return $this->pos;
    }

    function current()
    {
        $r = array();
        for ($i = 0; $i < $this->k; $i++)
            $r[] = $this->s[$this->c[$i]];
        return is_array($this->s) ? $r : implode('', $r);
    }

    function next()
    {
        if ($this->_next())
            $this->pos++;
        else
            $this->pos = -1;
    }

    function rewind()
    {
        $this->c = range(0, $this->k);
        $this->pos = 0;
    }

    function valid()
    {
        return $this->pos >= 0;
    }

    protected function _next()
    {
        $i = $this->k - 1;
        while ($i >= 0 && $this->c[$i] == $this->n - $this->k + $i)
            $i--;
        if ($i < 0)
            return false;
        $this->c[$i]++;
        while ($i++ < $this->k - 1)
            $this->c[$i] = $this->c[$i - 1] + 1;
        return true;
    }

}

$lists = [ 509, 838, 924, 650, 604, 793, 564, 651, 697, 649, 747, 787, 701, 605, 644, ];

foreach (new combinationClass($lists, 8) as $substring)
    echo json_encode($substring) . '->>>>>-' . array_sum($substring) . PHP_EOL;