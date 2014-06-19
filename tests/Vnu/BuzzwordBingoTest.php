<?php

namespace Vnu;

class BuzzwordBingoTest extends \PHPUnit_Framework_TestCase
{
    public function testBuzzwordBingo()
    {
        $bingo = new BuzzwordBingo();
        $this->assertEquals('bingo!', $bingo->run());
    }
}
