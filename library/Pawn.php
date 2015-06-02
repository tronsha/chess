<?php

namespace Chess;

/**
 * Class Pawn
 * @author Stefan Hüsges
 */

class Pawn extends Chessman
{
    public function __toString()
    {
        if ($this->color === 0) {
            return self::P;
        } else {
            return self::p;
        }
    }
}