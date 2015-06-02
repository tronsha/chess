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

    public function __construct()
    {
    }

    public function setPosition($position) {
        $lines = explode('/', $position);
        foreach ($lines as $lineKey => $line) {
            $fields = str_split($line);
            $newFieldKey = 0;
            foreach ($fields as $fieldKey => $field) {
                for ($i = 0; $i < (($field >= 1 && $field <= 8) ? $field : 1); $i++) {
                    switch ($field) {
                        case('k'):
                            $this->board[$lineKey][$newFieldKey] = new King('black');
                            break;
                        case('K'):
                            $this->board[$lineKey][$newFieldKey] = new King('white');
                            break;
                        case('q'):
                            $this->board[$lineKey][$newFieldKey] = new Queen('black');
                            break;
                        case('Q'):
                            $this->board[$lineKey][$newFieldKey] = new Queen('white');
                            break;
                        case('r'):
                            $this->board[$lineKey][$newFieldKey] = new Rook('black');
                            break;
                        case('R'):
                            $this->board[$lineKey][$newFieldKey] = new Rook('white');
                            break;
                        case('b'):
                            $this->board[$lineKey][$newFieldKey] = new Bishop('black');
                            break;
                        case('B'):
                            $this->board[$lineKey][$newFieldKey] = new Bishop('white');
                            break;
                        case('n'):
                            $this->board[$lineKey][$newFieldKey] = new Knight('black');
                            break;
                        case('N'):
                            $this->board[$lineKey][$newFieldKey] = new Knight('white');
                            break;
                        case('p'):
                            $this->board[$lineKey][$newFieldKey] = new Pawn('black');
                            break;
                        case('P'):
                            $this->board[$lineKey][$newFieldKey] = new Pawn('white');
                            break;
                        default:
                            $this->board[$lineKey][$newFieldKey] = null;
                    }
                    $newFieldKey++;
                }
            }
        }
    }

    public function __toString()
    {
        $boardHtml = '';
        $bw = 0;

        foreach ($this->board as $lineKey => $line) {
            foreach ($line as $fieldKey => $field) {
                $boardHtml .= '<div id="' . $this->fields[$fieldKey] . $this->lines[$lineKey] . '" class="' . ($bw++ % 2 ? 'b' : 'w') . '">' . ($this->board[$lineKey][$fieldKey] !== null ? $this->board[$lineKey][$fieldKey] : '') . '</div>';
            }
            $bw++;
        }

        return $boardHtml;
    }
}
