<?php

namespace Chess;

/**
 * Class Chessman
 * @author Stefan Hüsges
 */

class Chessman
{

    private $color;

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }

}
