<?php

namespace Chess;

/**
 * Class Knight
 * @author Stefan Hüsges
 */

class Knight extends Chessman
{
    public function getHtml()
    {
        if ($this->color === 0) {
            return self::N;
        } else {
            return self::n;
        }
    }

    public function __toString()
    {
        if ($this->color === 0) {
            return 'N';
        } else {
            return 'n';
        }
    }
}
