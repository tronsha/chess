<?php

namespace Chess;

/**
 * Class Bishop
 * @author Stefan Hüsges
 */

class Bishop extends Chessman
{
    public function getHtml()
    {
        if ($this->color === 0) {
            return self::B;
        } else {
            return self::b;
        }
    }

    public function __toString()
    {
        if ($this->color === 0) {
            return 'B';
        } else {
            return 'b';
        }
    }

    public function checkMove($to)
    {
        if (in_array(round($this->getDistance($to)/ 1.4142135623731, 6), [1, 2, 3, 4, 5, 6, 7])) {
            return true;
        }
        return false;
    }
}
