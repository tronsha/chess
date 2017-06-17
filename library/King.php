<?php

/*
 * Copyright (C) 2015 - 2017 Stefan Hüsges
 */

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
        if ($this->getDistance($to) === 1.0) {
            return true;
        } elseif (round($this->getDistance($to) / M_SQRT2, 3) === 1.0) {
            return true;
        } elseif ($this->getDistance($to) === 2.0) {
            $board = $this->board->getArray();
            $from = $this->getPosition();
            $color = $this->getColor();
            if ($color === 0) {
                if ($from === [4, 7] && $this->board->key2ids($to) === [6, 7] && strpos($this->board->getCastling(), 'K') !== false) {
                    if ($board[7][5] !== null || $board[7][6] !== null) {
                        return false;
                    }
                    return true;
                }
                if ($from === [4, 7] && $this->board->key2ids($to) === [2, 7] && strpos($this->board->getCastling(), 'Q') !== false) {
                    if ($board[7][1] !== null || $board[7][2] !== null || $board[7][3] !== null) {
                        return false;
                    }
                    return true;
                }
            } elseif ($color === 1) {
                if ($from === [4, 0] && $this->board->key2ids($to) === [6, 0] && strpos($this->board->getCastling(), 'k') !== false) {
                    if ($board[0][5] !== null || $board[0][6] !== null) {
                        return false;
                    }
                    return true;
                }
                if ($from === [4, 0] && $this->board->key2ids($to) === [2, 0] && strpos($this->board->getCastling(), 'q') !== false) {
                    if ($board[0][1] !== null || $board[0][2] !== null || $board[0][3] !== null) {
                        return false;
                    }
                    return true;
                }
            }
        }

        return false;
    }
}
