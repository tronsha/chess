<?php

namespace Chess;

/**
 * Class King
 * @author Stefan Hüsges
 */

class King extends Chessman
{
    public function getHtml()
    {
        if ($this->color === 0) {
            return self::K;
        } else {
            return self::k;
        }
    }

    public function __toString()
    {
        if ($this->color === 0) {
            return 'K';
        } else {
            return 'k';
        }
    }
}
