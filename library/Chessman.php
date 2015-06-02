<?php

namespace Chess;

/**
 * Class Chessman
 * @author Stefan Hüsges
 * @link http://en.wikipedia.org/wiki/Chess_symbols_in_Unicode
 */

class Chessman
{
    const k = '&#9818;';
    const q = '&#9819;';
    const r = '&#9820;';
    const b = '&#9821;';
    const n = '&#9822;';
    const p = '&#9823;';
    const K = '&#9812;';
    const Q = '&#9813;';
    const R = '&#9814;';
    const B = '&#9815;';
    const N = '&#9816;';
    const P = '&#9817;';

    const black = 1;
    const white = 0;

    protected $color = null;

    public function __construct($color)
    {
        if ($color === self::white || $color === 'w' || $color === 'white') {
            $this->color = self::white;
        }
        if ($color === self::black || $color === 'b' || $color === 'black') {
            $this->color = self::black;
        }
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }
}
