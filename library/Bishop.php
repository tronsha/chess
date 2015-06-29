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

    public function checkMove($to)
    {
        if (in_array(round($this->getDistance($to) / M_SQRT2, 3), [1, 2, 3, 4, 5, 6, 7])) {
            $from = $this->getPosition();
            $to = $this->board->key2ids($to);
            $board = $this->board->getArray();
            $minX = min($from[0], $to[0]);
            $maxX = max($from[0], $to[0]);
            $minY = min($from[1], $to[1]);
            $maxY = max($from[1], $to[1]);
            if (($from[0] < $to[0] && $from[1] > $to[1]) || ($from[0] > $to[0] && $from[1] < $to[1])) {
                for ($x = $minX + 1, $y = $maxY - 1; $x < $maxX && $y > $minY; $x++, $y--) {
                    if ($board[$y][$x] !== null) {
                        return false;
                    }
                }
            } elseif (($from[0] < $to[0] && $from[1] < $to[1]) || ($from[0] > $to[0] && $from[1] > $to[1])) {
                for ($x = $minX + 1, $y = $minY + 1; $x < $maxX && $y < $maxY; $x++, $y++) {
                    if ($board[$y][$x] !== null) {
                        return false;
                    }
                }
            } else {
                return false;
            }

            return true;
        }

        return false;
    }
}
