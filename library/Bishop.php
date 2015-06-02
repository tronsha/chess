<?php

namespace Chess;

/**
 * Class Bishop
 * @author Stefan Hüsges
 */

class Bishop extends Chessman
{
    public function __toString()
    {
        if ($this->color === 0) {
            return self::B;
        } else {
            return self::b;
        }
    }
}
