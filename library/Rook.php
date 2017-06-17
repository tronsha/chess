<?php

/*
 * Copyright (C) 2015 - 2017 Stefan Hüsges
 */

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
        if (in_array($this->getDistance($to), [1.0, 2.0, 3.0, 4.0, 5.0, 6.0, 7.0], true)) {
            $from = $this->getPosition();
            $to = $this->board->key2ids($to);
            $board = $this->board->getArray();
            if ($from[0] === $to[0]) {
                $x = $from[0];
                $minY = min($from[1], $to[1]);
                $maxY = max($from[1], $to[1]);
                for ($y = $minY + 1; $y < $maxY; $y++) {
                    if ($board[$y][$x] !== null) {
                        return false;
                    }
                }
            } elseif ($from[1] === $to[1]) {
                $y = $from[1];
                $minX = min($from[0], $to[0]);
                $maxX = max($from[0], $to[0]);
                for ($x = $minX + 1; $x < $maxX; $x++) {
                    if ($board[$y][$x] !== null) {
                        return false;
                    }
                }
            }

            return true;
        }

        return false;
    }
}
