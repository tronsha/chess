<?php

use Chess\Chess;

class ChessTest extends PHPUnit_Framework_TestCase
{
    public function testGetBoardHtml()
    {
        $chess = new Chess;
        $this->assertEquals('<div id="a8" class="w">&#9820;</div><div id="b8" class="b">&#9822;</div><div id="c8" class="w">&#9821;</div><div id="d8" class="b">&#9819;</div><div id="e8" class="w">&#9818;</div><div id="f8" class="b">&#9821;</div><div id="g8" class="w">&#9822;</div><div id="h8" class="b">&#9820;</div><div id="a7" class="b">&#9823;</div><div id="b7" class="w">&#9823;</div><div id="c7" class="b">&#9823;</div><div id="d7" class="w">&#9823;</div><div id="e7" class="b">&#9823;</div><div id="f7" class="w">&#9823;</div><div id="g7" class="b">&#9823;</div><div id="h7" class="w">&#9823;</div><div id="a6" class="w"></div><div id="b6" class="b"></div><div id="c6" class="w"></div><div id="d6" class="b"></div><div id="e6" class="w"></div><div id="f6" class="b"></div><div id="g6" class="w"></div><div id="h6" class="b"></div><div id="a5" class="b"></div><div id="b5" class="w"></div><div id="c5" class="b"></div><div id="d5" class="w"></div><div id="e5" class="b"></div><div id="f5" class="w"></div><div id="g5" class="b"></div><div id="h5" class="w"></div><div id="a4" class="w"></div><div id="b4" class="b"></div><div id="c4" class="w"></div><div id="d4" class="b"></div><div id="e4" class="w"></div><div id="f4" class="b"></div><div id="g4" class="w"></div><div id="h4" class="b"></div><div id="a3" class="b"></div><div id="b3" class="w"></div><div id="c3" class="b"></div><div id="d3" class="w"></div><div id="e3" class="b"></div><div id="f3" class="w"></div><div id="g3" class="b"></div><div id="h3" class="w"></div><div id="a2" class="w">&#9817;</div><div id="b2" class="b">&#9817;</div><div id="c2" class="w">&#9817;</div><div id="d2" class="b">&#9817;</div><div id="e2" class="w">&#9817;</div><div id="f2" class="b">&#9817;</div><div id="g2" class="w">&#9817;</div><div id="h2" class="b">&#9817;</div><div id="a1" class="b">&#9814;</div><div id="b1" class="w">&#9816;</div><div id="c1" class="b">&#9815;</div><div id="d1" class="w">&#9813;</div><div id="e1" class="b">&#9812;</div><div id="f1" class="w">&#9815;</div><div id="g1" class="b">&#9816;</div><div id="h1" class="w">&#9814;</div>', $chess->getBoardHtml());
    }
}
