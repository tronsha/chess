<?php

namespace Chess;

/**
 * Class Rook
 * @author Stefan Hüsges
 */

class Rook extends Chessman
{
    public function __toString()
    {
        if ($this->color === 0) {
            return self::R;
        } else {
            return self::r;
        }
    }
}
