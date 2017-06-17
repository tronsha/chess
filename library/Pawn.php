<?php

/*
 * Copyright (C) 2015 - 2017 Stefan Hüsges
 */

namespace Chess;

/**
 * Class Pawn
 * @author Stefan Hüsges
 */

class Pawn extends Chessman
{
    public function getHtml()
    {
        if ($this->color === 0) {
            return self::P;
        } else {
            return self::p;
        }
    }

    public function __toString()
    {
        if ($this->color === 0) {
            return 'P';
        } else {
            return 'p';
        }
    }

    public function checkMove($to)
    {
        $fromPos = $this->getPosition();
        $toPos = $this->board->key2ids($to);
        $distance = round($this->getDistance($to), 3);
        $board = $this->board->getArray();
        if ($distance === 1.0) {
            if ($board[$toPos[1]][$toPos[0]] === null) {
                if ($this->color === 0 && $fromPos[1] > $toPos[1]) {
                    return true;
                }
                if ($this->color === 1 && $fromPos[1] < $toPos[1]) {
                    return true;
                }
            }
        }
        if ($distance === (round(M_SQRT2, 3))) {
            if ($board[$toPos[1]][$toPos[0]] !== null || $this->board->getEnpassant() === $to) {
                if ($this->color === 0 && $fromPos[1] > $toPos[1]) {
                    return true;
                }
                if ($this->color === 1 && $fromPos[1] < $toPos[1]) {
                    return true;
                }
            }
        }
        if ($distance === 2.0) {
            if ($board[$toPos[1]][$toPos[0]] === null) {
                if ($this->color === 0 && $fromPos[1] === 6 && $toPos[1] === 4) {
                    if ($board[$toPos[1] + 1][$toPos[0]] !== null) {
                        return false;
                    }
                    return true;
                }
                if ($this->color === 1 && $fromPos[1] === 1 && $toPos[1] === 3) {
                    if ($board[$toPos[1] - 1][$toPos[0]] !== null) {
                        return false;
                    }
                    return true;
                }
            }
        }

        return false;
    }
}
