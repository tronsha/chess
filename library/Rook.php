<?php

namespace Chess;

/**
 * Class Rook
 * @author Stefan Hüsges
 */

class Rook extends Chessman
{
    public function getHtml()
    {
        if ($this->color === 0) {
            return self::R;
        } else {
            return self::r;
        }
    }

    public function __toString()
    {
        if ($this->color === 0) {
            return 'R';
        } else {
            return 'r';
        }
    }

    public function checkMove($to)
    {
        if (in_array($this->getDistance($to), [1, 2, 3, 4, 5, 6, 7])) {
            return true;
        }
        return false;
    }
}
