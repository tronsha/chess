<?php

namespace Chess;

/**
 * Class Queen
 * @author Stefan Hüsges
 */

class Queen extends Chessman
{
    public function getHtml()
    {
        if ($this->color === 0) {
            return self::Q;
        } else {
            return self::q;
        }
    }

    public function __toString()
    {
        if ($this->color === 0) {
            return 'Q';
        } else {
            return 'q';
        }
    }

    public function checkMove($to)
    {
        if (in_array($this->getDistance($to), [1, 2, 3, 4, 5, 6, 7])) {
            $from = $this->getPosition();
            $to = $this->board->key2ids($to);
            $board = $this->board->getArray();
            if ($from[0] == $to[0]) {
                $x = $from[0];
                $minY = min($from[1], $to[1]);
                $maxY = max($from[1], $to[1]);
                for ($y = $minY + 1; $y < $maxY; $y++) {
                    if ($board[$y][$x] !== null) {
                        return false;
                    }
                }
            } elseif ($from[1] == $to[1]) {
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
        if (in_array(round($this->getDistance($to) / 1.4142135623731, 6), [1, 2, 3, 4, 5, 6, 7])) {
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
            } else {
                for ($x = $minX + 1, $y = $minY + 1; $x < $maxX && $y < $maxY; $x++, $y++) {
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
