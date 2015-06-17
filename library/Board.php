<?php

namespace Chess;

/**
 * Class Board
 * @author Stefan Hüsges
 */

class Board
{
    private $board = [
        [null, null, null, null, null, null, null, null],
        [null, null, null, null, null, null, null, null],
        [null, null, null, null, null, null, null, null],
        [null, null, null, null, null, null, null, null],
        [null, null, null, null, null, null, null, null],
        [null, null, null, null, null, null, null, null],
        [null, null, null, null, null, null, null, null],
        [null, null, null, null, null, null, null, null]
    ];

    private $lines = '87654321';
    private $fields = 'abcdefgh';

    private $fen = [];

    public function __construct()
    {
    }

    public function setFen($fen)
    {
        $this->fen = $fen;
        $this->setupPosition($this->fen['position']);
    }

    public function setupPosition($position)
    {
        $lines = explode('/', $position);
        foreach ($lines as $lineKey => $line) {
            $fields = str_split($line);
            $newFieldKey = 0;
            foreach ($fields as $fieldKey => $field) {
                for ($i = 0; $i < (($field >= 1 && $field <= 8) ? $field : 1); $i++) {
                    switch ($field) {
                        case('k'):
                            $this->board[$lineKey][$newFieldKey] = new King($this, 'black');
                            break;
                        case('K'):
                            $this->board[$lineKey][$newFieldKey] = new King($this, 'white');
                            break;
                        case('q'):
                            $this->board[$lineKey][$newFieldKey] = new Queen($this, 'black');
                            break;
                        case('Q'):
                            $this->board[$lineKey][$newFieldKey] = new Queen($this, 'white');
                            break;
                        case('r'):
                            $this->board[$lineKey][$newFieldKey] = new Rook($this, 'black');
                            break;
                        case('R'):
                            $this->board[$lineKey][$newFieldKey] = new Rook($this, 'white');
                            break;
                        case('b'):
                            $this->board[$lineKey][$newFieldKey] = new Bishop($this, 'black');
                            break;
                        case('B'):
                            $this->board[$lineKey][$newFieldKey] = new Bishop($this, 'white');
                            break;
                        case('n'):
                            $this->board[$lineKey][$newFieldKey] = new Knight($this, 'black');
                            break;
                        case('N'):
                            $this->board[$lineKey][$newFieldKey] = new Knight($this, 'white');
                            break;
                        case('p'):
                            $this->board[$lineKey][$newFieldKey] = new Pawn($this, 'black');
                            break;
                        case('P'):
                            $this->board[$lineKey][$newFieldKey] = new Pawn($this, 'white');
                            break;
                        default:
                            $this->board[$lineKey][$newFieldKey] = null;
                    }
                    $newFieldKey++;
                }
            }
        }
    }

    public function getPosition()
    {
        $fenPosition = '';
        $count = 0;
        foreach ($this->board as $lineKey => $line) {
            foreach ($line as $field) {
                if ($field !== null) {
                    if ($count > 0) {
                        $fenPosition .= $count;
                    }
                    $fenPosition .= $field;
                    $count = 0;
                } else {
                    $count++;
                }
            }
            if ($count > 0) {
                $fenPosition .= $count;
            }
            if ($lineKey < 7) {
                $fenPosition .= '/';
            }
            $count = 0;
        }

        return $fenPosition;
    }

    public function getNext()
    {
        return $this->fen['next'];
    }

    public function getCastling()
    {
        return $this->fen['castling'];
    }

    public function getEnpassant()
    {
        return $this->fen['enpassant'];
    }

    public function getHalfmoves()
    {
        return $this->fen['halfmoves'];
    }

    public function getFullmove()
    {
        return $this->fen['fullmove'];
    }

    public function checkMove($from, $to)
    {
        $figure = $this->getFieldFigure($from);
        if ($figure === null) {
            return false;
        }
        $color = $figure->getColor();
        if ((($color === 0 && $this->fen['next'] === 'w') || ($color === 1 && $this->fen['next'] === 'b')) === false) {
            return false;
        }
        $figure2 = $this->getFieldFigure($to);
        if ($figure2 !== null) {
            $color2 = $figure2->getColor();
            if (($color2 === 0 && $this->fen['next'] === 'w') || ($color2 === 1 && $this->fen['next'] === 'b')) {
                return false;
            }
        }

        //TODO

        return true;
    }

    public function move($from, $to)
    {
        $figure = $this->getFieldFigure($from);
        if ($figure instanceof King) {
            $color = $figure->getColor();
            if ($color === 0) {
                if ($from == 'e1' && $to == 'g1' && strpos($this->fen['castling'], 'K') !== false) {
                    $this->setToField('f1', $this->getFieldFigure('h1'));
                    $this->setToField('h1', null);
                }
                if ($from == 'e1' && $to == 'c1' && strpos($this->fen['castling'], 'Q') !== false) {
                    $this->setToField('d1', $this->getFieldFigure('a1'));
                    $this->setToField('a1', null);
                }
                $this->fen['castling'] = str_replace(array('K', 'Q'), '', $this->fen['castling']);
                if (empty($this->fen['castling'])) {
                    $this->fen['castling'] = '-';
                }
            } elseif ($color === 1) {
                if ($from == 'e8' && $to == 'g8' && strpos($this->fen['castling'], 'k') !== false) {
                    $this->setToField('f8', $this->getFieldFigure('h8'));
                    $this->setToField('h8', null);
                }
                if ($from == 'e8' && $to == 'c8' && strpos($this->fen['castling'], 'q') !== false) {
                    $this->setToField('d8', $this->getFieldFigure('a8'));
                    $this->setToField('a8', null);
                }
                $this->fen['castling'] = str_replace(array('k', 'q'), '', $this->fen['castling']);
                if (empty($this->fen['castling'])) {
                    $this->fen['castling'] = '-';
                }
            }
        }
        if ($figure instanceof Rook) {
            $color = $figure->getColor();
            if ($color === 0) {
                if ($from == 'a1') {
                    $this->fen['castling'] = str_replace(array('Q'), '', $this->fen['castling']);
                    if (empty($this->fen['castling'])) {
                        $this->fen['castling'] = '-';
                    }
                }
                if ($from == 'h1') {
                    $this->fen['castling'] = str_replace(array('K'), '', $this->fen['castling']);
                    if (empty($this->fen['castling'])) {
                        $this->fen['castling'] = '-';
                    }
                }
            } elseif ($color === 1) {
                if ($from == 'a8') {
                    $this->fen['castling'] = str_replace(array('q'), '', $this->fen['castling']);
                    if (empty($this->fen['castling'])) {
                        $this->fen['castling'] = '-';
                    }
                }
                if ($from == 'g8') {
                    $this->fen['castling'] = str_replace(array('k'), '', $this->fen['castling']);
                    if (empty($this->fen['castling'])) {
                        $this->fen['castling'] = '-';
                    }
                }
            }
        }
        if ($figure instanceof Pawn) {
            if ($this->fen['enpassant'] == $to) {
                if (substr($to, 1, 1) == 3) {
                    $this->setToField(substr($to, 0, 1) . '4', null);
                }
                if (substr($to, 1, 1) == 6) {
                    $this->setToField(substr($to, 0, 1) . '5', null);
                }
            }
            $color = $figure->getColor();
            if ($color === 0 && substr($from, 1, 1) == 2 && substr($to, 1, 1) == 4) {
                $this->fen['enpassant'] = substr($from, 0, 1) . '3';
            } elseif ($color === 1 && substr($from, 1, 1) == 7 && substr($to, 1, 1) == 5) {
                $this->fen['enpassant'] = substr($from, 0, 1) . '6';
            } else {
                $this->fen['enpassant'] = '-';
            }
        } else {
            $this->fen['enpassant'] = '-';
        }
        if ($figure instanceof Pawn || $this->getFieldFigure($to) !== null) {
            $this->fen['halfmoves'] = 0;
        } else {
            $this->fen['halfmoves']++;
        }
        if ($this->fen['next'] === 'b') {
            $this->fen['fullmove']++;
        }
        $this->fen['next'] = ($this->fen['next'] === 'w' ? 'b' : 'w');
        if ($figure instanceof Pawn && $color === 0 && substr($to, 1, 1) == 8) {
            $this->setToField($to, new Queen($this, 'white'));
        } elseif ($figure instanceof Pawn && $color === 1 && substr($to, 1, 1) == 1) {
            $this->setToField($to, new Queen($this, 'black'));
        } else {
            $this->setToField($to, $this->getFieldFigure($from));
        }
        $this->setToField($from, null);
    }

    public function getFieldFigure($field)
    {
        $ids = $this->key2ids($field);

        return $this->board[$ids[1]][$ids[0]];
    }

    public function setToField($field, $figure)
    {
        $ids = $this->key2ids($field);
        $this->board[$ids[1]][$ids[0]] = $figure;
    }

    public function getHtml()
    {
        $boardHtml = '';
        $bw = 0;
        foreach ($this->board as $lineKey => $line) {
            foreach ($line as $fieldKey => $field) {
                $boardHtml .= '<div id="' . $this->fields[$fieldKey] . $this->lines[$lineKey] . '" class="' . ($bw++ % 2 ? 'b' : 'w') . '">';
                $boardHtml .= ($this->board[$lineKey][$fieldKey] !== null ? $this->board[$lineKey][$fieldKey]->getHtml() : '');
                $boardHtml .= '</div>';
            }
            $bw++;
        }

        return $boardHtml;
    }

    public function key2ids($key)
    {
        $keyX = substr($key, 0, 1);
        $keyY = substr($key, 1, 1);
        switch ($keyX) {
            case ('a'):
                $x = 0;
                break;
            case ('b'):
                $x = 1;
                break;
            case ('c'):
                $x = 2;
                break;
            case ('d'):
                $x = 3;
                break;
            case ('e'):
                $x = 4;
                break;
            case ('f'):
                $x = 5;
                break;
            case ('g'):
                $x = 6;
                break;
            case ('h'):
                $x = 7;
                break;
        }
        switch ($keyY) {
            case (8):
                $y = 0;
                break;
            case (7):
                $y = 1;
                break;
            case (6):
                $y = 2;
                break;
            case (5):
                $y = 3;
                break;
            case (4):
                $y = 4;
                break;
            case (3):
                $y = 5;
                break;
            case (2):
                $y = 6;
                break;
            case (1):
                $y = 7;
                break;

        }

        return [$x, $y];
    }
}
