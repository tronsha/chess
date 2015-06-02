<?php

namespace Chess;

/**
 * Class Chess
 * @author Stefan Hüsges
 */

class Chess
{
    private $board;

    public function __construct()
    {
        $this->board = new Board;
    }

}
