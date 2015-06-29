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

    public function checkMove($to)
    {
        if ($this->getDistance($to) == 1) {
            return true;
        } elseif (round($this->getDistance($to) / M_SQRT2, 3) == 1) {
            return true;
        } elseif ($this->getDistance($to) == 2) {
            $from = $this->getPosition();
            $color = $this->getColor();
            if ($color === 0) {
                if ($from == [4, 7] && $this->board->key2ids($to) == [6, 7] && strpos($this->board->getCastling(), 'K') !== false) {
                    return true;
                }
                if ($from == [4, 7] && $this->board->key2ids($to) == [2, 7] && strpos($this->board->getCastling(), 'Q') !== false) {
                    return true;
                }
            } elseif ($color === 1) {
                if ($from == [4, 0] && $this->board->key2ids($to) == [6, 0] && strpos($this->board->getCastling(), 'k') !== false) {
                    return true;
                }
                if ($from == [4, 0] && $this->board->key2ids($to) == [2, 0] && strpos($this->board->getCastling(), 'q') !== false) {
                    return true;
                }
            }
        }

        return false;
    }
}
