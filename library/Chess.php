<?php

namespace Chess;

/**
 * Class Chess
 * @author Stefan Hüsges
 * @link http://en.wikipedia.org/wiki/Chess
 * @link http://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation
 * @link http://www.gnu.org/software/chess/
 */

class Chess
{
    private $board;
    private $position;
    private $next;
    private $castling;
    private $enpassant;
    private $halfmoves;
    private $fullmove;


    public function __construct($fen = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1')
    {
        list($position, $next, $castling, $enpassant, $halfmoves, $fullmove) = explode(' ', $fen);

        $this->position = $position;
        $this->next = $next;
        $this->castling = $castling;
        $this->enpassant = $enpassant;
        $this->halfmoves = $halfmoves;
        $this->fullmove = $fullmove;

        $this->board = new Board($this->position);
    }

    public function getBorad()
    {
        return $this->board;
    }
}
