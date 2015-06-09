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
    private $board = null;
    private $fen = [];

    public function __construct($fen = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1')
    {
        $this->board = new Board;
        $this->setFen($fen);
    }

    public function setFen($fen)
    {
        list($position, $next, $castling, $enpassant, $halfmoves, $fullmove) = explode(' ', $fen);
        $this->fen['position'] = $position;
        $this->fen['next'] = $next;
        $this->fen['castling'] = $castling;
        $this->fen['enpassant'] = $enpassant;
        $this->fen['halfmoves'] = $halfmoves;
        $this->fen['fullmove'] = $fullmove;
        $this->board->setFen($this->fen);
    }

    public function getFen()
    {
        $this->fen['position'] = $this->board->getPosition();
        $this->fen['next'] = $this->board->getNext();
        $this->fen['castling'] = $this->board->getCastling();
        $this->fen['enpassant'] = $this->board->getEnpassant();
        $this->fen['halfmoves'] = $this->board->getHalfmoves();
        $this->fen['fullmove'] = $this->board->getFullmove();
        $fen = $this->fen['position'] . ' ' . $this->fen['next'] . ' ' . $this->fen['castling'] . ' ' . $this->fen['enpassant'] . ' ' . $this->fen['halfmoves'] . ' ' . $this->fen['fullmove'];

        return $fen;
    }

    public function setMoves($moves)
    {
        $moveArray = explode('|', $moves);
        foreach ($moveArray as $move) {
            if ($this->move($move) === false) {
                return false;
            }
        }
        return true;
    }

    public function move($move)
    {
        $from = substr($move, 0, 2);
        $to = substr($move, 2, 2);
        if ($this->board->checkMove($from, $to) === true) {
            $this->board->move($from, $to);
            return true;
        }
        return false;
    }

    public function getBoardHtml()
    {
        return $this->board->getHtml();
    }

    public function getComputerMove()
    {
        $descriptorspec = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("file", "/tmp/error-output.txt", "a")
        );
        $cwd = './';
        $chess = realpath(__DIR__ . '/../bin/chess');
        $process = proc_open($chess . ' --uci', $descriptorspec, $pipes, $cwd);
        if (is_resource($process)) {
            sleep(1);
            fwrite($pipes[0], 'position fen ' . $this->getFen() . PHP_EOL);
            sleep(1);
            fwrite($pipes[0], 'go depth 1' . PHP_EOL);
            sleep(1);
            fwrite($pipes[0], 'quit' . PHP_EOL);
            fclose($pipes[0]);
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            proc_close($process);
            if (preg_match('/bestmove\s*([0-9a-h]{4})/', $output, $matches)) {
                return $matches[1];
            }
        }
    }
}
