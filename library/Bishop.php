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
}
