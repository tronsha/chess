<?php

namespace Chess;

/**
 * Class Queen
 * @author Stefan Hüsges
 */

class Queen extends Chessman
{
    public function getHtml()
    {
        if ($this->color === 0) {
            return self::Q;
        } else {
            return self::q;
        }
    }

    public function __toString()
    {
        if ($this->color === 0) {
            return 'Q';
        } else {
            return 'q';
        }
    }

    public function checkMove($to)
    {
        if (in_array($this->getDistance($to), [1, 2, 3, 4, 5, 6, 7])) {
            return true;
        }
        if (in_array(round($this->getDistance($to)/ 1.4142135623731, 6), [1, 2, 3, 4, 5, 6, 7])) {
            return true;
        }
        return false;
    }
}
