<?php

use Chess\Chess;

class ChessTest extends PHPUnit_Framework_TestCase
{
    public function testFigureToString()
    {
        $chess = new Chess;
        $this->assertEquals('r', $chess->getFieldFigure('a8'));
        $this->assertEquals('n', $chess->getFieldFigure('b8'));
        $this->assertEquals('b', $chess->getFieldFigure('c8'));
        $this->assertEquals('q', $chess->getFieldFigure('d8'));
        $this->assertEquals('k', $chess->getFieldFigure('e8'));
        $this->assertEquals('b', $chess->getFieldFigure('f8'));
        $this->assertEquals('n', $chess->getFieldFigure('g8'));
        $this->assertEquals('r', $chess->getFieldFigure('h8'));
        $this->assertEquals('p', $chess->getFieldFigure('a7'));
        $this->assertEquals('p', $chess->getFieldFigure('b7'));
        $this->assertEquals('p', $chess->getFieldFigure('c7'));
        $this->assertEquals('p', $chess->getFieldFigure('d7'));
        $this->assertEquals('p', $chess->getFieldFigure('e7'));
        $this->assertEquals('p', $chess->getFieldFigure('f7'));
        $this->assertEquals('p', $chess->getFieldFigure('g7'));
        $this->assertEquals('p', $chess->getFieldFigure('h7'));
        $this->assertEquals('P', $chess->getFieldFigure('a2'));
        $this->assertEquals('P', $chess->getFieldFigure('b2'));
        $this->assertEquals('P', $chess->getFieldFigure('c2'));
        $this->assertEquals('P', $chess->getFieldFigure('d2'));
        $this->assertEquals('P', $chess->getFieldFigure('e2'));
        $this->assertEquals('P', $chess->getFieldFigure('f2'));
        $this->assertEquals('P', $chess->getFieldFigure('g2'));
        $this->assertEquals('P', $chess->getFieldFigure('h2'));
        $this->assertEquals('R', $chess->getFieldFigure('a1'));
        $this->assertEquals('N', $chess->getFieldFigure('b1'));
        $this->assertEquals('B', $chess->getFieldFigure('c1'));
        $this->assertEquals('Q', $chess->getFieldFigure('d1'));
        $this->assertEquals('K', $chess->getFieldFigure('e1'));
        $this->assertEquals('B', $chess->getFieldFigure('f1'));
        $this->assertEquals('N', $chess->getFieldFigure('g1'));
        $this->assertEquals('R', $chess->getFieldFigure('h1'));
    }

    public function testGetBoardHtml()
    {
        $chess = new Chess;
        $this->assertEquals('<div id="a8" class="w">&#9820;</div><div id="b8" class="b">&#9822;</div><div id="c8" class="w">&#9821;</div><div id="d8" class="b">&#9819;</div><div id="e8" class="w">&#9818;</div><div id="f8" class="b">&#9821;</div><div id="g8" class="w">&#9822;</div><div id="h8" class="b">&#9820;</div><div id="a7" class="b">&#9823;</div><div id="b7" class="w">&#9823;</div><div id="c7" class="b">&#9823;</div><div id="d7" class="w">&#9823;</div><div id="e7" class="b">&#9823;</div><div id="f7" class="w">&#9823;</div><div id="g7" class="b">&#9823;</div><div id="h7" class="w">&#9823;</div><div id="a6" class="w"></div><div id="b6" class="b"></div><div id="c6" class="w"></div><div id="d6" class="b"></div><div id="e6" class="w"></div><div id="f6" class="b"></div><div id="g6" class="w"></div><div id="h6" class="b"></div><div id="a5" class="b"></div><div id="b5" class="w"></div><div id="c5" class="b"></div><div id="d5" class="w"></div><div id="e5" class="b"></div><div id="f5" class="w"></div><div id="g5" class="b"></div><div id="h5" class="w"></div><div id="a4" class="w"></div><div id="b4" class="b"></div><div id="c4" class="w"></div><div id="d4" class="b"></div><div id="e4" class="w"></div><div id="f4" class="b"></div><div id="g4" class="w"></div><div id="h4" class="b"></div><div id="a3" class="b"></div><div id="b3" class="w"></div><div id="c3" class="b"></div><div id="d3" class="w"></div><div id="e3" class="b"></div><div id="f3" class="w"></div><div id="g3" class="b"></div><div id="h3" class="w"></div><div id="a2" class="w">&#9817;</div><div id="b2" class="b">&#9817;</div><div id="c2" class="w">&#9817;</div><div id="d2" class="b">&#9817;</div><div id="e2" class="w">&#9817;</div><div id="f2" class="b">&#9817;</div><div id="g2" class="w">&#9817;</div><div id="h2" class="b">&#9817;</div><div id="a1" class="b">&#9814;</div><div id="b1" class="w">&#9816;</div><div id="c1" class="b">&#9815;</div><div id="d1" class="w">&#9813;</div><div id="e1" class="b">&#9812;</div><div id="f1" class="w">&#9815;</div><div id="g1" class="b">&#9816;</div><div id="h1" class="w">&#9814;</div>', $chess->getBoardHtml());
    }

    public function testSetMoves()
    {
        $chess = new Chess;
        $this->assertTrue($chess->setMoves('e2e4|e7e5|g1f3|b8c6|f1b5'));
        $this->assertEquals('<div id="a8" class="w">&#9820;</div><div id="b8" class="b"></div><div id="c8" class="w">&#9821;</div><div id="d8" class="b">&#9819;</div><div id="e8" class="w">&#9818;</div><div id="f8" class="b">&#9821;</div><div id="g8" class="w">&#9822;</div><div id="h8" class="b">&#9820;</div><div id="a7" class="b">&#9823;</div><div id="b7" class="w">&#9823;</div><div id="c7" class="b">&#9823;</div><div id="d7" class="w">&#9823;</div><div id="e7" class="b"></div><div id="f7" class="w">&#9823;</div><div id="g7" class="b">&#9823;</div><div id="h7" class="w">&#9823;</div><div id="a6" class="w"></div><div id="b6" class="b"></div><div id="c6" class="w">&#9822;</div><div id="d6" class="b"></div><div id="e6" class="w"></div><div id="f6" class="b"></div><div id="g6" class="w"></div><div id="h6" class="b"></div><div id="a5" class="b"></div><div id="b5" class="w">&#9815;</div><div id="c5" class="b"></div><div id="d5" class="w"></div><div id="e5" class="b">&#9823;</div><div id="f5" class="w"></div><div id="g5" class="b"></div><div id="h5" class="w"></div><div id="a4" class="w"></div><div id="b4" class="b"></div><div id="c4" class="w"></div><div id="d4" class="b"></div><div id="e4" class="w">&#9817;</div><div id="f4" class="b"></div><div id="g4" class="w"></div><div id="h4" class="b"></div><div id="a3" class="b"></div><div id="b3" class="w"></div><div id="c3" class="b"></div><div id="d3" class="w"></div><div id="e3" class="b"></div><div id="f3" class="w">&#9816;</div><div id="g3" class="b"></div><div id="h3" class="w"></div><div id="a2" class="w">&#9817;</div><div id="b2" class="b">&#9817;</div><div id="c2" class="w">&#9817;</div><div id="d2" class="b">&#9817;</div><div id="e2" class="w"></div><div id="f2" class="b">&#9817;</div><div id="g2" class="w">&#9817;</div><div id="h2" class="b">&#9817;</div><div id="a1" class="b">&#9814;</div><div id="b1" class="w">&#9816;</div><div id="c1" class="b">&#9815;</div><div id="d1" class="w">&#9813;</div><div id="e1" class="b">&#9812;</div><div id="f1" class="w"></div><div id="g1" class="b"></div><div id="h1" class="w">&#9814;</div>', $chess->getBoardHtml());
        $chess = new Chess;
        $this->assertFalse($chess->setMoves('e7e5'));
    }

    public function testCastling()
    {
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w KQkq - 0 1');
        $chess->move('e1g1');
        $this->assertEquals('R', $chess->getFieldFigure('f1'));
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w KQkq - 0 1');
        $chess->move('e1c1');
        $this->assertEquals('R', $chess->getFieldFigure('d1'));
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b KQkq - 0 1');
        $chess->move('e8g8');
        $this->assertEquals('r', $chess->getFieldFigure('f8'));
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b KQkq - 0 1');
        $chess->move('e8c8');
        $this->assertEquals('r', $chess->getFieldFigure('d8'));
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w - - 0 1');
        $chess->move('e1g1');
        $this->assertNull($chess->getFieldFigure('f1'));
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w - - 0 1');
        $chess->move('e1c1');
        $this->assertNull($chess->getFieldFigure('d1'));
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b - - 0 1');
        $chess->move('e8g8');
        $this->assertNull($chess->getFieldFigure('f8'));
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b - - 0 1');
        $chess->move('e8c8');
        $this->assertNull($chess->getFieldFigure('d8'));
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w KQkq - 0 1');
        $chess->move('e1g1');
        $this->assertEquals('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R4RK1 b kq - 1 1', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b KQkq - 0 1');
        $chess->move('e8g8');
        $this->assertEquals('r4rk1/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w KQ - 1 2', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w KQkq - 0 1');
        $chess->move('h1g1');
        $this->assertEquals('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K1R1 b Qkq - 1 1', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w KQkq - 0 1');
        $chess->move('a1b1');
        $this->assertEquals('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/1R2K2R b Kkq - 1 1', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b KQkq - 0 1');
        $chess->move('h8g8');
        $this->assertEquals('r3k1r1/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w KQq - 1 2', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b KQkq - 0 1');
        $chess->move('a8b8');
        $this->assertEquals('1r2k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w KQk - 1 2', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w KQ - 0 1');
        $chess->move('e1g1');
        $this->assertEquals('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R4RK1 b - - 1 1', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b kq - 0 1');
        $chess->move('e8g8');
        $this->assertEquals('r4rk1/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w - - 1 2', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w K - 0 1');
        $chess->move('h1g1');
        $this->assertEquals('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K1R1 b - - 1 1', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w Q - 0 1');
        $chess->move('a1b1');
        $this->assertEquals('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/1R2K2R b - - 1 1', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b k - 0 1');
        $chess->move('h8g8');
        $this->assertEquals('r3k1r1/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w - - 1 2', $chess->getFen());
        $chess = new Chess;
        $chess->setFen('r3k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R b q - 0 1');
        $chess->move('a8b8');
        $this->assertEquals('1r2k2r/pppppppp/8/8/8/8/PPPPPPPP/R3K2R w - - 1 2', $chess->getFen());
    }

    public function testEnpassant()
    {
        $chess = new Chess;
        $chess->setFen('4k3/4p3/8/8/3P4/8/8/4K3 w - - 0 1');
        $chess->move('d4d5');
        $chess->move('e7e5');
        $chess->move('d5e6');
        $this->assertNull($chess->getFieldFigure('e5'));
        $chess = new Chess;
        $chess->setFen('4k3/8/8/4p3/8/8/3P4/4K3 b - - 0 1');
        $chess->move('e5e4');
        $chess->move('d2d4');
        $chess->move('e4d3');
        $this->assertNull($chess->getFieldFigure('d4'));
    }

    public function testFigureTransformation()
    {
        $chess = new Chess;
        $chess->setFen('4k3/1P6/8/8/9/8/8/4K3 w - - 0 1');
        $chess->move('b7b8');
        $this->assertEquals('Q', $chess->getFieldFigure('b8'));
        $chess = new Chess;
        $chess->setFen('4k3/8/8/8/8/8/1p6/4K3 b - - 0 1');
        $chess->move('b2b1');
        $this->assertEquals('q', $chess->getFieldFigure('b1'));
    }

    public function testFigureGetPosition()
    {
        $chess = new Chess;
        $blackKing = $chess->getFieldFigure('e8');
        $this->assertEquals(array(4, 0), $blackKing->getPosition());
        $whiteQueen = $chess->getFieldFigure('d1');
        $this->assertEquals(array(3, 7), $whiteQueen->getPosition());
    }

    public function testGetNext()
    {
        $chess = new Chess;
        $chess->move('e2e4');
        $this->assertEquals('b', $chess->getNext());
        $chess->move('e7e5');
        $this->assertEquals('w', $chess->getNext());
    }

    public function testGameOver()
    {
        $chess = new Chess;
        $chess->setFen('6k1/5ppp/8/8/8/8/5PPP/R5K1 w - - 0 1');
        $chess->move('a1a8');
        $this->assertEquals('a1a1', $chess->getComputerMove());
    }

    public function testCapture()
    {
        $chess = new Chess;
        $chess->move('e2e4');
        $chess->move('d7d5');
        $this->assertTrue($chess->move('e4d5'));
    }

    public function testMove()
    {
        $chess = new Chess;
        $this->assertFalse($chess->move('e7e5'));
        $this->assertTrue($chess->move('e2e4'));
        $this->assertTrue($chess->move('e7e5'));
        $this->assertFalse($chess->move('d1d2'));
        $this->assertTrue($chess->move('d1f3'));
        $this->assertFalse($chess->move('a5a4'));
//        $this->assertFalse($chess->move('d7a4'));
    }
}
