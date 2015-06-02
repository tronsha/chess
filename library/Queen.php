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
}
